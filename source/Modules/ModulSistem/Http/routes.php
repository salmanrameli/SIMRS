<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\ModulSistem\Http\Controllers'], function()
{
    Route::get('/modul', [
        'as' => 'modul.index',
        'uses' => 'ModulSistemController@showAllModul']
    );

    Route::post('/modul/tambah_hak_akses', [
        'as' => 'modul.add_hak_akses',
        'uses' => 'ModulSistemController@tambahHakAksesModul'
    ]);

    Route::post('/modul/simpan_permission', [
        'as' => 'modul.simpan_permission',
        'uses' => 'ModulSistemController@aturPermissionModul'
    ]);

    Route::delete('/modul/{id_modul}/hapus/{id_jabatan}', [
        'as' => 'modul.hapus_jabatan',
        'uses' => 'ModulSistemController@hapusHakAksesModul'
    ]);
});
