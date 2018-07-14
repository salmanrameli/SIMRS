<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\PerjalananPenyakit\Http\Controllers'], function()
{
    Route::get('/ranap/{id}/perjalanan_penyakit', [
        'as' => 'perjalanan_penyakit.index',
        'uses' => 'PerjalananPenyakitController@showAllPerjalananPenyakitPasien'
    ]);

    Route::post('/ranap/simpan_perjalanan_penyakit', [
        'as' => 'perjalanan_penyakit.store',
        'uses' => 'PerjalananPenyakitController@saveNewPerjalananPenyakitPasien'
    ]);

    Route::get('/ranap/{id}/perjalanan_penyakit/{perjalanan_penyakit}', [
        'as' => 'perjalanan_penyakit.show',
        'uses' => 'PerjalananPenyakitController@showDetailPerjalananPenyakitPasien'
    ]);

    Route::patch('/ranap/update_perjalanan_penyakit', [
        'as' => 'perjalanan_penyakit.update',
        'uses' => 'PerjalananPenyakitController@updatePerjalananPenyakitPasien'
    ]);
});
