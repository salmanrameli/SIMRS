<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Bangunan\Http\Controllers'], function()
{
    Route::get('/bangunan', [
        'as' => 'bangunan.index',
        'uses' => 'BangunanController@showAllLantai'
    ]);

    Route::get('/bangunan/lantai/create', [
        'as' => 'lantai.create',
        'uses' => 'BangunanController@addNewLantai'
    ]);

    Route::post('/bangunan/lantai', [
        'as' => 'lantai.store',
        'uses' => 'BangunanController@saveNewLantai'
    ]);

    Route::patch('/bangunan/simpan_perubahan_lantai', [
        'as' => 'lantai.update',
        'uses' => 'BangunanController@updateLantai'
    ]);

    Route::delete('/bangunan/lantai/{lantai}', [
        'as' => 'lantai.delete',
        'uses' => 'BangunanController@deleteLantai'
    ]);

    Route::get('/bangunan/lantai/kamar/create', [
        'as' => 'kamar.create',
        'uses' => 'BangunanController@addNewKamar'
    ]);

    Route::post('/bangunan/lantai/kamar', [
        'as' => 'kamar.store',
        'uses' => 'BangunanController@saveKamar'
    ]);

    Route::get('/bangunan/lantai/kamar/{kamar}', [
        'as' => 'kamar.show',
        'uses' => 'BangunanController@showDetailKamar'
    ]);

    Route::get('/bangunan/lantai/kamar/{kamar}/edit', [
        'as' => 'kamar.edit',
        'uses' => 'BangunanController@editKamar'
    ]);

    Route::patch('/bangunan/lantai/kamar/{kamar}', [
        'as' => 'kamar.update',
        'uses' => 'BangunanController@updateKamar'
    ]);

    Route::delete('/bangunan/lantai/kamar/{kamar}', [
        'as' => 'kamar.delete',
        'uses' => 'BangunanController@deleteKamar'
    ]);
});
