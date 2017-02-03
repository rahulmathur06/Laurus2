<?php

namespace Modules\Reservaciones\Http\Middleware;

use Closure;
use Illuminate\Routing\Route;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Modules\Permissions\Entities\Module;

class CheckPermission {

    protected $overides = [];

    /**
     * handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * @author Parantap Parashar
     */
    public function handle($request, Closure $next) {
        if (Sentinel::hasAccess($this->getPermissionName($request->route())))
            return $next($request);
        
        //send failed response for ajax
        if ($request->ajax())
            return response()->json(['msg' => 'No tiene permisos para acceder a esta area.'], 203);

        //send failed response for http
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    /**
     * function to get the permission name for given route
     * 
     * @param Route $route
     * @return array permission array for the route 
     * @author Parantap Parashar
     */
    protected function getPermissionName(Route $route) {
        $routeName = $route->getName();
        //get all the permissions for the module
        $modulePermissions = Module::findOrFail(config('reservaciones.module_id'))->permissions()->lists('permission')->toArray();
        //pass if route don't have a name or permission does not exist
        if(!$routeName)
            return[];
        
        if (array_key_exists($routeName, $this->overides))
            return $this->overides[$routeName];

        $routeNameResolved = $this->resolveRoute($routeName);

        switch($routeNameResolved['method']) {
            case 'index':
            case 'show':
                $permissionName = $routeNameResolved['resource'].'.view';
                return in_array($permissionName, $modulePermissions) ? $permissionName : [];
            case 'edit':
            case 'update':
                $permissionName = $routeNameResolved['resource'].'.edit';
                return in_array($permissionName, $modulePermissions) ? $permissionName : [];
            case 'create':
            case 'store':
                $permissionName = $routeNameResolved['resource'].'.create';
                return in_array($permissionName, $modulePermissions) ? $permissionName : [];
            case 'destroy':
                $permissionName = $routeNameResolved['resource'].'.delete';
                return in_array($permissionName, $modulePermissions) ? $permissionName : [];
            default:
                return [];
        } 
    }
    
    /**
     * function to resolve the route name 
     * 
     * @param type $routeName
     * @return type
     * @author Parantap Parashar
     */
    protected function resolveRoute($routeName) {
        $routeName = explode('.', $routeName);
        return count($routeName) === 2 ? ['resource' => $routeName[0], 'method' => $routeName[1]] : ['resource' => '', 'method' => ''];
    }

}
