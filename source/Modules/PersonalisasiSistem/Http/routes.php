<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\PersonalisasiSistem\Http\Controllers'], function()
{
    Route::get('/personalisasi', [
        'as' => 'personalisasi.index',
        'uses' => 'PersonalisasiSistemController@showPersonalisasiSistem'
    ]);

    Route::post('/personalisasi/ganti_logo', [
        'as' => 'personalisasi.ganti_logo',
        'uses' => 'PersonalisasiSistemController@gantiLogo'
    ]);

    Route::post('/personalisasi/ganti_nama', [
        'as' => 'personalisasi.ganti_nama',
        'uses' => 'PersonalisasiSistemController@gantiNama'
    ]);
});
