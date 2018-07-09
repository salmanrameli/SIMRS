<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\RawatInap\Http\Controllers'], function()
{
    Route::get('/ranap', [
        'as' => 'ranap.index',
        'uses' => 'RawatInapController@showAllRawatInap'
    ]);

    Route::get('/ranap/create', [
        'as' => 'ranap.create',
        'uses' => 'RawatInapController@createNewRawatInap'
    ]);

    Route::post('/ranap', [
        'as' => 'ranap.store',
        'uses' => 'RawatInapController@saveNewRawatInap'
    ]);

    Route::get('/ranap/{id}', [
        'as' => 'ranap.show',
        'uses' => 'RawatInapController@showDetailRawatInap'
    ]);

    Route::get('/ranap/{id}/edit', [
        'as' => 'ranap.edit',
        'uses' => 'RawatInapController@editRawatInap'
    ]);

    Route::patch('/ranap/{id}', [
        'as' => 'ranap.update',
        'uses' => 'RawatInapController@updateRawatInap'
    ]);
});

Route::group(['middleware' => 'web'], function ()
{
    Route::get('ranap/pasien/cari', [
        'as' => 'ranap.pasien.cari',
        'uses' => 'Modules\Pasien\Http\Controllers\PasienController@cariPasien'
    ]);

    Route::get('ranap/pasien/index', [
        'as' => 'ranap.pasien.index',
        'uses' => 'Modules\Pasien\Http\Controllers\PasienController@showAllPasien'
    ]);

    Route::get('ranap/pasien/create', [
        'as' => 'ranap.pasien.create',
        'uses' => 'Modules\Pasien\Http\Controllers\PasienController@createNewPasien'
    ]);

    Route::get('ranap/pasien/{id}', [
        'as' => 'ranap.pasien.show',
        'uses' => 'Modules\Pasien\Http\Controllers\PasienController@showDetailPasien'
    ]);
});
