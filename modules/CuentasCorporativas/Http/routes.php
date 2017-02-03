<?php
//use Illuminate\Support\Facades\DB;

Route::group(['namespace' => 'Modules\CuentasCorporativas\Http\Controllers', 'middleware' => 'authSentinel'], function() {
    Route::post('empresas/{id}/markcomplete', 'EmpresasController@markTaskAsCompleted')->name('empresas.completed');
    Route::post('empresas/{id}/markcancelled', 'EmpresasController@markTaskAsCancelled')->name('empresas.cancelled');
    Route::put('empresas/authorize', 'EmpresasController@authorize')->name('empresas.authorize');
    Route::post('empresas/assigntask', 'EmpresasController@assignTask')->name('empresas.assigntask');
    Route::resource('checklist', 'CheckListController');
    Route::resource('tipoempresas', 'TipoEmpresasController');
    Route::resource('tipopersonas', 'TipoPersonasController');
    Route::resource('empresas', 'EmpresasController');
    Route::resource('empresasExternas', 'EmpresasExternasController');
    Route::get('statetocity', 'CuentasCorporativasController@getStateToCity');
    Route::resource('convenios', 'ConveniosController');
    Route::post('convenios/getDetail', 'ConveniosController@getDetail');

});
