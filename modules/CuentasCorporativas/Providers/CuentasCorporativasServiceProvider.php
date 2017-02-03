<?php

namespace Modules\CuentasCorporativas\Providers;

use Illuminate\Support\ServiceProvider;
use Menu,Input,File;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Support\Facades\Validator;

class CuentasCorporativasServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     * 
     * @return void
     */
    public function boot() {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerMenu();
        $this->registerValidater();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Register config.
     * 
     * @return void
     */
    protected function registerConfig() {
        $this->publishes([
            __DIR__ . '/../Config/config.php' => config_path('cuentascorporativas.php'),
        ]);
        $this->mergeConfigFrom(
                __DIR__ . '/../Config/config.php', 'cuentascorporativas'
        );
    }

    /**
     * Register views.
     * 
     * @return void
     */
    public function registerViews() {
        $viewPath = base_path('resources/views/modules/cuentascorporativas');

        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
                            return $path . '/modules/cuentascorporativas';
                        }, \Config::get('view.paths')), [$sourcePath]), 'cuentascorporativas');
    }

    /**
     * Register translations.
     * 
     * @return void
     */
    public function registerTranslations() {
        $langPath = base_path('resources/lang/modules/cuentascorporativas');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'cuentascorporativas');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'cuentascorporativas');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return array();
    }

    /**
     * Register all the menus for the module
     */
    public function registerMenu() {

        if (!Sentinel::check()) {
            return redirect('login');
        }
        if (Sentinel::hasAccess('cuentascorporativas.view')) {
            $menu = Menu::instance('sidebar-menu');

            //Main menu of the module (Will be displayed as menu group title)
            $menu->dropdown('Cuentas Corporativas', function ($sub) {

                
                //check access
                if (Sentinel::hasAccess('cuentascorporativas.config.checklist.view') || Sentinel::hasAccess('cuentascorporativas.config.empresas.view') || Sentinel::hasAccess('cuentascorporativas.config.personas.view')) {

                    $sub->dropdown('Configuracion', function ($sub) {
                        //configuration->checklist
                        if (Sentinel::hasAccess('cuentascorporativas.config.checklist.view'))
                            $sub->route('checklist.index', 'Checklist', [], 1, ['icon' => 'fa fa-circle-o']);
                        //configuration->Enterprise Types
                        if (Sentinel::hasAccess('cuentascorporativas.config.empresas.view'))
                            $sub->route('tipoempresas.index', 'Tipos de Empresas', [], 2, ['icon' => 'fa fa-circle-o']);
                        //configuration->Person Types 
                        if (Sentinel::hasAccess('cuentascorporativas.config.personas.view'))
                            $sub->route('tipopersonas.index', 'Tipos de Personas', [], 3, ['icon' => 'fa fa-circle-o']);
                    });
                }

                //Submenu Enterprise
                //check access
                if (Sentinel::hasAccess('cuentascorporativas.empresas.view') || Sentinel::hasAccess('cuentascorporativas.empresas.externas.view')) {

                    $sub->dropdown('Empresas', function ($sub) {
                        //Enterprise->Enterprises Main Listing
                        if (Sentinel::hasAccess('cuentascorporativas.empresas.view'))
                            $sub->route('empresas.index', 'Listado de Empresas', [], 1, ['icon' => 'fa fa-circle-o']);
                        //Enterprise->empresasExternas
                        if (Sentinel::hasAccess('cuentascorporativas.empresas.externas.view'))
                            $sub->route('empresasExternas.index', 'EmpresasExternas', [], 2, ['icon' => 'fa fa-circle-o']);
                    });
                }
                
                //Submenu Setup
                $sub->dropdown('Convenios Corporativos', function ($sub) {
                    $sub->route('convenios.index', 'Listado de Convenios', [], 1, ['icon' => 'fa fa-circle-o']);
                    $sub->route('dropoffcostos.index', 'Autorización de Convenios', [], 2, ['icon' => 'fa fa-circle-o']);
                    $sub->route('dropoffcostos.index', 'Convenios Externos', [], 3, ['icon' => 'fa fa-circle-o']);
                });

                //Submenu Agreements
                //check access
                if (false) {//Sentinel::hasAccess('convenios.view')) {
                    $sub->dropdown('Convenios', function ($sub) {
                        //Enterprise->Main Listing
                        $sub->route('locacion.index', 'Listado de Convenios', [], 1, ['icon' => 'fa fa-circle-o']);
                        //Enterprise->Due Agreements
                        $sub->route('destino.index', 'ConveniosVencidos', [], 2, ['icon' => 'fa fa-circle-o']);
                        //Enterprise->Pending Agreements
                        $sub->route('ciudad.index', 'Pendientes de Autorización', [], 3, ['icon' => 'fa fa-circle-o']);
                        //Enterprise->Internal Agreements
                        $sub->route('ciudad.index', 'ConveniosInternos', [], 3, ['icon' => 'fa fa-circle-o']);
                    });
                }

                //Submenu Productivity
                //check access
                if (false) {//Sentinel::hasAccess('productividad.view')) {
                    $sub->dropdown('Productividad', function ($sub) {
                        //Productivity->Customer Productivity
                        $sub->route('locacion.index', 'Productividad de Clientes', [], 1, ['icon' => 'fa fa-circle-o']);
                        //Productivity->Executive Productivity
                        $sub->route('destino.index', 'Productividad de Ejecutivos', [], 2, ['icon' => 'fa fa-circle-o']);
                    });
                }
                
            }, 7, ['icon' => 'fa fa-user-secret']);
        }
    }

    private function registerValidater() {
        Validator::extend('checkRequired', function ($attribute, $value, $parameters, $validator) {
            if(isset($value)){ 
            foreach ($value as $key => $val) {
                if(isset($val['required']) && $val['required']==1){
                    if (empty($val['id'])) return false; 
                    if (!isset($val['vigencia'])) return false; 
                    if(!isset($val['nomarchivo_old'])){ if (!isset($val['nomarchivo'])) return false;
                     $ext = $val['nomarchivo']->getClientOriginalExtension();
                    if ($ext=='txt' || $ext=='docx' || $ext=='doc' || $ext=='pdf') return true; else return false;
                    }
                }
            }
            }
            return true;
        }, 'Por favor rellene el formulario requerido');
    }
    
}
