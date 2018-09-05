<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Pasien\Http\Controllers'], function()
{
    Route::get('/pasien/find', 'PasienController@find');

    Route::get('/pasien/cari', [
        'as' => 'pasien.cari',
        'uses' => 'PasienController@cariPasien'
    ]);

    Route::get('/pasien', [
        'as' => 'pasien.index',
        'uses' => 'PasienController@showAllPasien'
    ]);

    Route::get('/pasien/create', [
        'as' => 'pasien.create',
        'uses' => 'PasienController@createNewPasien'
    ]);

    Route::post('/pasien', [
        'as' => 'pasien.store',
        'uses' => 'PasienController@saveNewPasien'
    ]);

    Route::get('/pasien/{id}', [
        'as' => 'pasien.show',
        'uses' => 'PasienController@showDetailPasien'
    ]);

    Route::get('/pasien/{id}/edit', [
        'as' => 'pasien.edit',
        'uses' => 'PasienController@editPasien'
    ]);

    Route::patch('/pasien/{id}', [
        'as' => 'pasien.update',
        'uses' => 'PasienController@updatePasien'
    ]);

    /*
    Route::delete('/pasien/{id}', [
        'as' => 'pasien.destroy',
        'uses' => 'PasienController@destroy'
    ]);
    */
});
