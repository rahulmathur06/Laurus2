<?php

Route::group(['namespace' => 'Modules\Reservaciones\Http\Controllers', 'middleware' => ['authSentinel', 'checkPermission']], function() {
    Route::resource('convenio', 'ConvenioController');
    Route::resource('acceso', 'AccesoController');
    Route::resource('ciudad', 'CiudadController');
    Route::get('ciudad-destino-create/{id}', ['as' => 'ciudad.createDestino', 'uses' => 'CiudadController@createDestino']);
    Route::post('ciudad-destino-store', ['as' => 'ciudad.storeDestino', 'uses' => 'CiudadController@storeDestino']);
    Route::put('ciudad-destino-update/{id}', ['as' => 'ciudad.updateDestino', 'uses' => 'CiudadController@updateDestino']);



    // categorias
    Route::resource('categorias', 'AutosCategoriaController');
    Route::get('categoria-traducciones/{id}', ['as' => 'categoriatranslate.index', 'uses' => 'AutosCategoriaController@indexTranslate']);
    Route::get('categoria-traduccion-create/{id}', ['as' => 'categoriatranslate.create', 'uses' => 'AutosCategoriaController@createTranslate']);
    Route::post('categoria-traduccion-store', ['as' => 'categoriatranslate.store', 'uses' => 'AutosCategoriaController@storeTranslate']);
    Route::get('categoria-traduccion-edit/{id}', ['as' => 'categoriatranslate.edit', 'uses' => 'AutosCategoriaController@editTranslate']);
    Route::put('categoria-traduccion-update/{id}', ['as' => 'categoriatranslate.update', 'uses' => 'AutosCategoriaController@updateTranslate']);
    Route::delete('categoria-traduccion-delete/{id}', ['as' => 'categoriatranslate.destroy', 'uses' => 'AutosCategoriaController@destroyTranslate']);

    Route::resource('anticipacion', 'AnticipacionController');
    Route::get('getClases/{id}', 'AnticipacionController@getClases');
    Route::resource('restriccion', 'RestriccionController');
    Route::resource('flotilla', 'FlotillaController');
    Route::resource('grupo', 'GrupoSegurosController');
    Route::resource('seguros-tarifa', 'SeguroTarifasController');
    // localizaciones
    Route::resource('locacion', 'LocacionController');
    Route::get('locacion-traducciones/{id}', ['as' => 'locaciontranslate.index', 'uses' => 'LocacionController@indexTranslate']);
    Route::get('locacion-traduccion-create/{id}', ['as' => 'locaciontranslate.create', 'uses' => 'LocacionController@createTranslate']);
    Route::post('locacion-traduccion-store', ['as' => 'locaciontranslate.store', 'uses' => 'LocacionController@storeTranslate']);
    Route::get('locacion-traduccion-edit/{id}', ['as' => 'locaciontranslate.edit', 'uses' => 'LocacionController@editTranslate']);
    Route::put('locacion-traduccion-update/{id}', ['as' => 'locaciontranslate.update', 'uses' => 'LocacionController@updateTranslate']);
    Route::delete('locacion-traduccion-delete/{id}', ['as' => 'locaciontranslate.destroy', 'uses' => 'LocacionController@destroyTranslate']);
    Route::get('locacion-autos-create/{id}', ['as' => 'locacionclases.create', 'uses' => 'LocacionController@createClases']);
    Route::post('locacion-autos-store', ['as' => 'locacionclases.store', 'uses' => 'LocacionController@storeClases']);
    Route::put('locacion-autos-update/{id}', ['as' => 'locacionclases.update', 'uses' => 'LocacionController@updateClases']);

    // Destino
    Route::resource('destino', 'DestinoController');
    Route::get('destino-traducciones/{id}', ['as' => 'destinotranslate.index', 'uses' => 'DestinoController@indexTranslate']);
    Route::get('destino-traduccion-create/{id}', ['as' => 'destinotranslate.create', 'uses' => 'DestinoController@createTranslate']);
    Route::post('destino-traduccion-store', ['as' => 'destinotranslate.store', 'uses' => 'DestinoController@storeTranslate']);
    Route::get('destino-traduccion-edit/{id}', ['as' => 'destinotranslate.edit', 'uses' => 'DestinoController@editTranslate']);
    Route::put('destino-traduccion-update/{id}', ['as' => 'destinotranslate.update', 'uses' => 'DestinoController@updateTranslate']);
    Route::delete('destino-traduccion-delete/{id}', ['as' => 'destinotranslate.destroy', 'uses' => 'DestinoController@destroyTranslate']);
    // cobertura
    Route::resource('cobertura', 'CoberturaController');
    Route::get('cobertura-traducciones/{id}', ['as' => 'coberturatranslate.index', 'uses' => 'CoberturaController@indexTranslate']);
    Route::get('cobertura-traduccion-create/{id}', ['as' => 'coberturatranslate.create', 'uses' => 'CoberturaController@createTranslate']);
    Route::post('cobertura-traduccion-store', ['as' => 'coberturatranslate.store', 'uses' => 'CoberturaController@storeTranslate']);
    Route::get('cobertura-traduccion-edit/{id}', ['as' => 'coberturatranslate.edit', 'uses' => 'CoberturaController@editTranslate']);
    Route::put('cobertura-traduccion-update/{id}', ['as' => 'coberturatranslate.update', 'uses' => 'CoberturaController@updateTranslate']);
    Route::delete('cobertura-traduccion-delete/{id}', ['as' => 'coberturatranslate.destroy', 'uses' => 'CoberturaController@destroyTranslate']);

    // catalogos
    Route::resource('catalogo', 'CatalogoController');
    Route::get('catalogo-traducciones/{id}', ['as' => 'catalogotranslate.index', 'uses' => 'CatalogoController@indexTranslate']);
    Route::get('catalogo-traduccion-create/{id}', ['as' => 'catalogotranslate.create', 'uses' => 'CatalogoController@createTranslate']);
    Route::post('catalogo-traduccion-store', ['as' => 'catalogotranslate.store', 'uses' => 'CatalogoController@storeTranslate']);
    Route::get('catalogo-traduccion-edit/{id}', ['as' => 'catalogotranslate.edit', 'uses' => 'CatalogoController@editTranslate']);
    Route::put('catalogo-traduccion-update/{id}', ['as' => 'catalogotranslate.update', 'uses' => 'CatalogoController@updateTranslate']);
    Route::delete('catalogo-traduccion-delete/{id}', ['as' => 'catalogotranslate.destroy', 'uses' => 'CatalogoController@destroyTranslate']);

    // clases
    Route::resource('clases', 'AutosClasesController');
    Route::get('clases-traducciones/{id}', ['as' => 'clasetranslate.index', 'uses' => 'TraduccionesClasesController@index']);
    Route::get('clases-traduccion-create/{id}', ['as' => 'clasetranslate.create', 'uses' => 'TraduccionesClasesController@create']);
    Route::post('clases-traduccion-store', ['as' => 'clasetranslate.store', 'uses' => 'TraduccionesClasesController@store']);
    Route::get('clases-traduccion-edit/{id}', ['as' => 'clasetranslate.edit', 'uses' => 'TraduccionesClasesController@edit']);
    Route::put('clases-traduccion-update/{id}', ['as' => 'clasetranslate.update', 'uses' => 'TraduccionesClasesController@update']);
    Route::delete('clases-traduccion-delete/{id}', ['as' => 'clasetranslate.destroy', 'uses' => 'TraduccionesClasesController@destroy']);

    // promociones
    Route::resource('promociones', 'PromocionController');
    Route::get('promociones-traducciones/{id}', ['as' => 'promotranslate.index', 'uses' => 'PromocionController@indexTranslate']);
    Route::get('traduccion-create/{id}', ['as' => 'promotranslate.create', 'uses' => 'PromocionController@createTranslate']);
    Route::post('traduccion-store', ['as' => 'promotranslate.store', 'uses' => 'PromocionController@storeTranslate']);
    Route::get('traduccion-edit/{id}', ['as' => 'promotranslate.edit', 'uses' => 'PromocionController@editTranslate']);
    Route::put('traduccion-update/{id}', ['as' => 'promotranslate.update', 'uses' => 'PromocionController@updateTranslate']);



    Route::get('getlocationtocars', 'RangosController@getLocationToCars');

    //Url to get latitude and longitude from location_id
    Route::post('ubicaciones/getposition', 'DropOffUbicacionesController@getPosition')->name('ubicaciones.get_position');
    //Url to get html for details section of rates
    Route::post('tarifas/getdetail', 'TarifasController@getDetail')->name('tarifas.get_detail');

    //resource dropOff cost
    Route::resource('dropoffcostos', 'DropOffCostosController');
    //resource dropOff Ubicaciones
    Route::resource('ubicaciones', 'DropOffUbicacionesController');
    //resource for extra rentals
    Route::resource('extras', 'ExtrasController');

    Route::resource('rangos', 'RangosController');

    Route::get('tarifas/auth', 'TarifasAuthController@index')->name('tarifa_auth.index');
    Route::get('tarifas/auth/{id}', 'TarifasAuthController@show')->name('tarifa_auth.show');
    Route::put('tarifas/auth/{id}', 'TarifasAuthController@update')->name('tarifa_auth.update');

    Route::resource('tarifas', 'TarifasController');

    Route::post('promo-locaciones/getclases', 'PromoAssignmentController@getClases')->name('promo-locaciones.getclases');
    Route::resource('promo-locaciones', 'PromoAssignmentController');
    Route::resource('promos', 'PromoListController');
    Route::resource('impuestos', 'ImpuestosController');
    Route::resource('cierres', 'CierresController');
});
