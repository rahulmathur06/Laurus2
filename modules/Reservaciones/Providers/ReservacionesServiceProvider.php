<?php

namespace Modules\Reservaciones\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Permissions\Entities\Module;
use Menu;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Support\Facades\Validator;
use Input,
    DB;

class ReservacionesServiceProvider extends ServiceProvider {

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
        $this->registerConfig();
        $this->registerTranslations();
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
            __DIR__ . '/../Config/config.php' => config_path('reservaciones.php'),
        ]);
        $this->mergeConfigFrom(
                __DIR__ . '/../Config/config.php', 'reservaciones'
        );
    }

    /**
     * Register views.
     * 
     * @return void
     */
    public function registerViews() {
        $sourcePath = base_path('views/modules/reservaciones');

        $viewPath = __DIR__ . '/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom([$viewPath, $sourcePath], 'reservaciones');
    }

    /**
     * Register translations.
     * 
     * @return void
     */
    public function registerTranslations() {
        $langPath = base_path('resources/lang/modules/reservaciones');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'reservaciones');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'reservaciones');
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

    public function registerMenu() {

        if (!Sentinel::check()) {
            return redirect('login');
        }
        
        if (Sentinel::hasAnyAccess(config('reservaciones.module_menu_permissions'))) {
            $menu = Menu::instance('sidebar-menu');
            $menu->dropdown('Motor de reservaciones', function ($sub) {
                if (Sentinel::hasAnyAccess(['locacion.view', 'destino.view', 'ciudade.view']))
                    $sub->dropdown('Locaciones', function ($sub) {
                        if (Sentinel::hasAccess('locacion.view'))
                            $sub->route('locacion.index', 'Oficinas', [], 1, ['icon' => 'fa fa-circle-o']);
                        if (Sentinel::hasAccess('destino.view'))
                            $sub->route('destino.index', 'Destinos', [], 2, ['icon' => 'fa fa-circle-o']);
                        if (Sentinel::hasAccess('ciudad.view'))
                            $sub->route('ciudad.index', 'Ciudades', [], 3, ['icon' => 'fa fa-circle-o']);
                    });

                if (Sentinel::hasAnyAccess(['categorias.view', 'clases.view', 'flotilla.view', 'cierres.view']))
                    $sub->dropdown('Autos', function ($sub) {
                        if (Sentinel::hasAccess('categorias.view'))
                            $sub->route('categorias.index', 'Categorias', [], 1, ['icon' => 'fa fa-circle-o']);
                        if (Sentinel::hasAccess('clases.view'))
                            $sub->route('clases.index', 'Clases', [], 2, ['icon' => 'fa fa-circle-o']);
                        if (Sentinel::hasAccess('flotilla.view'))
                            $sub->route('flotilla.index', 'Flotillas', [], 3, ['icon' => 'fa fa-circle-o']);
                        if (Sentinel::hasAccess('cierres.view'))
                            $sub->route('cierres.index', 'Cierres', [], 4, ['icon' => 'fa fa-circle-o']);
                    });

                if (Sentinel::hasAnyAccess(['anticipacion.view', 'restriccion.view']))
                    $sub->dropdown('Horarios', function ($sub) {
                        if (Sentinel::hasAccess('anticipacion.view'))
                            $sub->route('anticipacion.index', 'Anticipación', [], 1, ['icon' => 'fa fa-circle-o']);
                        if (Sentinel::hasAccess('restriccion.view'))
                            $sub->route('restriccion.index', 'Restricción', [], 2, ['icon' => 'fa fa-circle-o']);
                    });

                if (Sentinel::hasAnyAccess(['grupo.view', 'catalogo.view', 'cobertura.view', 'seguros-tarifa.view']))
                    $sub->dropdown('Seguros', function ($sub) {
                        if (Sentinel::hasAccess('grupo.view'))
                            $sub->route('grupo.index', 'Grupos', [], 1, ['icon' => 'fa fa-circle-o']);
                        if (Sentinel::hasAccess('catalogo.view'))
                            $sub->route('catalogo.index', 'Catalogos', [], 2, ['icon' => 'fa fa-circle-o']);
                        if (Sentinel::hasAccess('cobertura.view'))
                            $sub->route('cobertura.index', 'Coberturas', [], 3, ['icon' => 'fa fa-circle-o']);
                        if (Sentinel::hasAccess('seguros-tarifa.view'))
                            $sub->route('seguros-tarifa.index', 'Tarifas', [], 4, ['icon' => 'fa fa-circle-o']);
                    });

                if (Sentinel::hasAccess('acceso.view'))
                    $sub->route('acceso.index', 'Accesos', [], 3);

                if (Sentinel::hasAnyAccess(['rangos.view', 'tarifas.view', 'tarifa_auth.view', 'impuestos.view']))
                    $sub->dropdown('Tarifas', function ($sub) {
                        if (Sentinel::hasAccess('rangos.view'))
                            $sub->route('rangos.index', 'Rangos Mínimo-Máximo', [], 1, ['icon' => 'fa fa-circle-o']);
                        if (Sentinel::hasAccess('tarifas.view'))
                            $sub->route('tarifas.index', 'Captura de Tarifas', [], 2, ['icon' => 'fa fa-circle-o']);
                        if (Sentinel::hasAccess('tarifa_auth.view'))
                            $sub->route('tarifa_auth.index', 'Autorización de Tarifas', [], 3, ['icon' => 'fa fa-circle-o']);
                        if (Sentinel::hasAccess('impuestos.view'))
                            $sub->route('impuestos.index', 'Impuestos', [], 4, ['icon' => 'fa fa-circle-o']);
                    });

                if (Sentinel::hasAnyAccess(['promos.view', 'promo-locaciones.view']))
                    $sub->dropdown('Promociones', function ($sub) {
                        if (Sentinel::hasAccess('promos.view'))
                            $sub->route('promos.index', 'Listado', [], 1, ['icon' => 'fa fa-circle-o']);
                        if (Sentinel::hasAccess('promo-locaciones.view'))
                            $sub->route('promo-locaciones.index', 'Asignación', [], 2, ['icon' => 'fa fa-circle-o']);
                    });

                if (Sentinel::hasAnyAccess(['dropoffcostos.view', 'ubicaciones.view']))
                    $sub->dropdown('DropOff', function ($sub) {
                        if (Sentinel::hasAccess('ubicaciones.view'))
                            $sub->route('ubicaciones.index', 'Lista de Ubicaciones DropOff', [], 1, ['icon' => 'fa fa-circle-o']);
                        if (Sentinel::hasAccess('dropoffcostos.view'))
                            $sub->route('dropoffcostos.index', 'Costos de DropOff', [], 2, ['icon' => 'fa fa-circle-o']);
                    });

                if (Sentinel::hasAccess('extras.view'))
                    $sub->dropdown('Extras', function ($sub) {
                        $sub->route('extras.index', 'Lista de Extras', [], 1, ['icon' => 'fa fa-circle-o']);
                    });
            }, 3, ['icon' => 'fa fa-building-o']);
        }
    }

    private function registerValidater() {
        Validator::extend('ArrayValidater', function ($attribute, $value, $parameters, $validator) {
            foreach ($value as $key => $val) {
                if (empty($val))
                    return false;
            }
            return true;
        }, ':attribute son requeridos');

        Validator::extend('maxValidator', function ($attribute, $value, $parameters, $validator) {
            foreach ($value as $key => $val) {
                if ($attribute == 'max_precio') {
                    $other = Input::get('min_precio');
                    if ($val > $other[$key]) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            return true;
        }, 'El max precio debe ser mayor que el min precio ');

        Validator::extend('RangeValidiation', function ($attribute, $value, $parameters, $validator) {
            $input = Input::all();
            $fecha_ini = $input['fecha_ini'];
            $fecha_fin = $input['fecha_fin'];
            $costos = DB::select("SELECT COUNT(*) AS record FROM `mv3_locaciones_dropoff_costos` WHERE (fecha_ini BETWEEN '" . $fecha_ini . "' AND '" . $fecha_fin . "') OR (fecha_fin BETWEEN '" . $fecha_ini . "' AND '" . $fecha_fin . "')");
            if ($costos[0]->record == 0) {
                return true;
            } else {
                return false;
            }
            return true;
        }, 'Your date already added..');

        Validator::extend('PriceValidater', function ($attribute, $value, $parameters, $validator) {
            foreach ($value as $key => $val) {
                if (empty((float) $val) && ($parameters[0] == 1 || $parameters[0] == 2))
                    return false;
            }
            return true;
        }, 'Precios para todas las clases son requeridos y deben ser mayor a cero');

        Validator::extend('TempValidater', function ($attribute, $value, $parameters, $validator) {

            foreach ($value as $key => $val) {
                $v = Validator::make($val, [
                            'nombre_temporada' => 'required|string',
                            'fecha_inicio' => 'required|date_format:Y-m-d',
                            'fecha_fin' => 'required|date_format:Y-m-d|after:fecha_inicio',
                            'precio_rack_id' => 'required'
                ]);
                if ($v->fails())
                    return false;
            }
            return true;
        }, 'Ingrese los datos de Temporadas válidos');
    }

}
