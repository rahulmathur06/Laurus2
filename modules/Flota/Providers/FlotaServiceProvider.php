<?php namespace Modules\Flota\Providers;


use Illuminate\Support\ServiceProvider;
use Menu;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class FlotaServiceProvider extends ServiceProvider {

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
	public function boot()
	{
		$this->registerConfig();
		$this->registerTranslations();
		$this->registerViews();
        $this->registerMenu();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{		
		//
	}

	/**
	 * Register config.
	 * 
	 * @return void
	 */
	protected function registerConfig()
	{
		$this->publishes([
		    __DIR__.'/../Config/config.php' => config_path('flota.php'),
		]);
		$this->mergeConfigFrom(
		    __DIR__.'/../Config/config.php', 'flota'
		);
	}

	/**
	 * Register views.
	 * 
	 * @return void
	 */
	public function registerViews()
	{
		$viewPath = base_path('views/modules/flota');

		$sourcePath = __DIR__.'/../Resources/views';

		$this->publishes([
			$sourcePath => $viewPath
		]);

		$this->loadViewsFrom([$viewPath, $sourcePath], 'flota');
	}

	/**
	 * Register translations.
	 * 
	 * @return void
	 */
	public function registerTranslations()
	{
		$langPath = base_path('resources/lang/modules/flota');

		if (is_dir($langPath)) {
			$this->loadTranslationsFrom($langPath, 'flota');
		} else {
			$this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'flota');
		}
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

    public function registerMenu()
    {

        if (!Sentinel::check()) {
            return redirect('login');
        }
        if(	Sentinel::hasAccess('vehiculos.view') ||
            Sentinel::hasAccess('disponibilidad.view') ||
            Sentinel::hasAccess('inventario.view')) {


            $menu = Menu::instance('sidebar-menu');

            $menu->dropdown('Flota', function ($sub) {
                if (Sentinel::hasAccess('vehiculos.view')) {
                    //$sub->route('flota.vehiculos.index', 'Vehiculos', [], 1, ['icon' => 'fa fa-circle-o']);
                    $sub->url('flota/vehiculos', 'Vehiculos',  ['icon' => 'fa fa-circle-o']);
                }
                if(Sentinel::hasAccess('disponibilidad.view')) {
                    $sub->dropdown('Reportes', function ($sub2) {
                        if(Sentinel::hasAccess('disponibilidad.view')) {
                            $sub2->url('flota/reportes/Disponibilidad', 'Disponibilidad',  ['icon' => 'fa fa-circle-o']);
                    
                        }
                        if(Sentinel::hasAccess('inventario.view')) {
                    
                            $sub2->url('flota/reportes/Inventario', 'Inventario',  ['icon' => 'fa fa-circle-o']);
                        }

                    }, ['icon' => 'fa fa-database']);
                }
                $sub->dropdown('SINIESTROS', function ($sub) {
                    $sub->route('fueraservicio.index', 'Fuera de Servicio', [], 1, ['icon' => 'fa fa-circle-o']);
                    $sub->route('perdida.index', 'Perdida Total', [], 2, ['icon' => 'fa fa-circle-o']);
                 
                });

            }, 2, ['icon' => 'fa fa-car']);

        }

    }

}
