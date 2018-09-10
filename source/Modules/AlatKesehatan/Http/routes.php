<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\AlatKesehatan\Http\Controllers'], function()
{
    Route::get('/alat_kesehatan', [
        'as' => 'alat_kesehatan.index',
        'uses' => 'AlatKesehatanController@showAllAlatKesehatan'
    ]);

    Route::post('/alat_kesehatan', [
        'as' => 'alat_kesehatan.store',
        'uses' => 'AlatKesehatanController@saveNewAlatKesehatan'
    ]);

    Route::patch('/alat_kesehatan/simpan_perubahan_alat_kesehatan', [
        'as' => 'alat_kesehatan.update',
        'uses' => 'AlatKesehatanController@updateAlatKesehatan'
    ]);
});
