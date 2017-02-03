<?php

namespace Modules\Permissions\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Modules\Permissions\Entities\Module;
use Modules\Roles\Entities\Rol;
use Illuminate\Support\Facades\DB;
use Modules\Permissions\Entities\ModuleMenu;

class PermissionsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
//        $role = Sentinel::findRoleById(1);
//        $roles = Rol::get();
//        foreach($roles as $role){
//            $role->removePermission(0);
//            $role->removePermission(1);
//            $role->save();
//        }
//        dd(Sentinel::getUser()->hasAccess('sds'));
//        dd(\Modules\Permissions\Entities\ModulePermission::where('module_id', 10)->where('permission', 'like', '%.view')->orderBy('menu_id')->lists('permission')->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {

        if (Sentinel::hasAccess(['role.permissions'])) {
            // Execute this code if the user has permission
            //find role by id
            $roles = Sentinel::findRoleById($id);
            // find all package with his permissions
            $modules = Module::with('menus.permissions', 'permissions')->get()->toArray();

            return view('permissions::create', compact('modules', 'roles'));
        } else {

            alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request) {

        // find role by id
        $role = Sentinel::findRoleById($id);
        // inputs
        $data = $request->get('data');
        $value = $request->get('value');
        $type = $request->get('type');
        
        //minor improvement to prevent inserting unwated values
        if(!(string)$value)
            return "failed";
        
        switch ($type) {
            case 'single':
                if (isset($role->permissions[$value])) {
                    $role->updatePermission($value, ($data == 'true') ? true : false);
                    $role->save();
                    return "update";
                } else {
                    $role->addPermission($value, ($data == 'true') ? true : false);
                    $role->save();
                    return "add";
                }
            case 'menu':
                $menu = ModuleMenu::find($value);
                if ($menu) {
                    foreach ($menu->permissions as $permission) {
                        $permission_name = $permission->permission;
                        if (isset($role->permissions[$permission_name])) {
                            $role->updatePermission($permission_name, ($data == 'true') ? true : false);
                        } else {
                            $role->addPermission($permission_name, ($data == 'true') ? true : false);
                        }
                    }
                    $role->save();
                    return "success";
                }
                return "failed";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
