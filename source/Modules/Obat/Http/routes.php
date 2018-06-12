<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Obat\Http\Controllers'], function()
{
    //Route::resource('/obat', 'ObatController');

    Route::get('/obat', [
        'as' => 'obat.index',
        'uses' => 'ObatController@showAllObat'
    ]);

    Route::get('/obat/create', [
        'as' => 'obat.create',
        'uses' => 'ObatController@registerNewObat'
    ]);

    Route::post('/obat', [
        'as' => 'obat.store',
        'uses' => 'ObatController@saveNewObat'
    ]);

    Route::get('/obat/{id}', [
        'as' => 'obat.show',
        'uses' => 'ObatController@showDetailObat'
    ]);

    Route::get('/obat/{id}/edit', [
        'as' => 'obat.edit',
        'uses' => 'ObatController@editObat'
    ]);

    Route::patch('/obat/{id}', [
        'as' => 'obat.update',
        'uses' => 'ObatController@updateObat'
    ]);
});
