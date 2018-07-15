<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\AlatKesehatan\Http\Controllers'], function()
{
    //Route::resource('/alat_kesehatan', 'AlatKesehatanController');

    Route::get('/alat_kesehatan', [
        'as' => 'alat_kesehatan.index',
        'uses' => 'AlatKesehatanController@showAllAlatKesehatan'
    ]);

    Route::get('/alat_kesehatan/create', [
        'as' => 'alat_kesehatan.create',
        'uses' => 'AlatKesehatanController@createNewAlatKesehatan'
    ]);

    Route::post('/alat_kesehatan', [
        'as' => 'alat_kesehatan.store',
        'uses' => 'AlatKesehatanController@saveNewAlatKesehatan'
    ]);

    Route::get('/alat_kesehatan/{id}', [
        'as' => 'alat_kesehatan.show',
        'uses' => 'AlatKesehatanController@showDetailAlatKesehatan'
    ]);

    Route::get('/alat_kesehatan/{id}/edit', [
        'as' => 'alat_kesehatan.edit',
        'uses' => 'AlatKesehatanController@editAlatKesehatan'
    ]);

    Route::patch('/alat_kesehatan/simpan_perubahan_alat_kesehatan', [
        'as' => 'alat_kesehatan.update',
        'uses' => 'AlatKesehatanController@updateAlatKesehatan'
    ]);
});
