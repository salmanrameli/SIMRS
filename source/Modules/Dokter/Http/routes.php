<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Dokter\Http\Controllers'], function()
{
    Route::get('dokter/cari', [
        'as' => 'dokter.cari',
        'uses' => 'DokterController@cariDokter'
    ]);

    Route::get('/dokter', [
        'as' => 'dokter.index',
        'uses' => 'DokterController@showAllDokter'
    ]);

    Route::get('/dokter/create', [
        'as' => 'dokter.create',
        'uses' => 'DokterController@createNewDokter'
    ]);

    Route::post('/dokter', [
        'as' => 'dokter.store',
        'uses' => 'DokterController@saveNewDokter'
    ]);

    Route::get('/dokter/{id}', [
        'as' => 'dokter.show',
        'uses' => 'DokterController@showDetailDokter'
    ]);

    Route::get('/dokter/{id}/edit', [
        'as' => 'dokter.edit',
        'uses' => 'DokterController@editDokter'
    ]);

    Route::patch('/dokter/{id}', [
        'as' => 'dokter.update',
        'uses' => 'DokterController@updateDokter'
    ]);
});
