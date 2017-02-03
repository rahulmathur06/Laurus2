<?php


Route::group(['namespace' => 'Modules\Flota\Http\Controllers','middleware'=>'authSentinel'], function()
{
    // flota
    //Route::resource('utilizacion','FlotaController@utilizacion');
    //Route::resource('vehiculos','FlotaController@anyData');
    Route::group(['prefix' => 'flota'], function()
    {
        Route::resource('reportes2','ReporteInventarioController@anyData');
        Route::resource('crear', 'FlotaController@create');
        Route::resource('editar','FlotaController@edit');
        Route::resource('eliminar','FlotaController@destroy');
        Route::resource('repush','FlotaController@Repush');
        Route::resource('editar-save','FlotaController');
        Route::resource('almacenar','FlotaController');
    });
    
    Route::post('fueraservicio/movetoperdida','FueraServicioController@moveToPerdidaTotal')->name('fueraservicio.move');
    Route::resource('fueraservicio','FueraServicioController');
    Route::resource('perdida','PerdidaTotalController');


    Route::get('citytobranch','PerdidaTotalController@getCityToBranch');
    Route::get('carcodetodescription','FueraServicioController@getCarcodeToDescription');
});


Route::controller('flota/reportes/Inventario', 'Modules\Flota\Http\Controllers\ReporteInventarioController', [
    'anyData' => 'InventarioController.data',
    'getIndex' => 'InventarioController'
]);

Route::controller('flota/reportes/Disponibilidad', 'Modules\Flota\Http\Controllers\ReporteDisponibilidadController', [
    'anyData' => 'DisponibilidadController.data',
    'getIndex' => 'DisponibilidadController'
]);


Route::controller('flota/vehiculos', 'Modules\Flota\Http\Controllers\FlotaController', [
    'anyData'  => 'FlotaController.data',
    'getIndex' => 'FlotaController'
]);






























