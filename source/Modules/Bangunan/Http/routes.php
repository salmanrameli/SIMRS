<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Bangunan\Http\Controllers'], function()
{
    //Route::resource('bangunan', 'BangunanController');

    Route::get('/bangunan', [
        'as' => 'bangunan.index',
        'uses' => 'BangunanController@showAllLantai'
    ]);

    //Route::resource('bangunan/lantai', 'LantaiController');

    Route::get('/bangunan/lantai/create', [
        'as' => 'lantai.create',
        'uses' => 'BangunanController@addNewLantai'
    ]);

    Route::post('/bangunan/lantai', [
        'as' => 'lantai.store',
        'uses' => 'BangunanController@saveNewLantai'
    ]);

    Route::get('/bangunan/lantai/{lantai}/edit', [
        'as' => 'lantai.edit',
        'uses' => 'BangunanController@editLantai'
    ]);

    Route::patch('/bangunan/lantai/{lantai}', [
        'as' => 'lantai.update',
        'uses' => 'BangunanController@updateLantai'
    ]);

    //Route::resource('bangunan/lantai/kamar', 'KamarController');

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
});
