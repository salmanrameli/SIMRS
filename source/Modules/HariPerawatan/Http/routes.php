<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\HariPerawatan\Http\Controllers'], function()
{
    Route::post('ranap/simpan_hari_perawatan', [
        'as' => 'hari_perawatan.store',
        'uses' => 'HariPerawatanController@storeRincianHariPerawatan'
    ]);

    Route::patch('ranap/simpan_perubahan_keterangan_obat', [
        'as' => 'konsumsi_obat.update_keterangan',
        'uses' => 'KonsumsiObatController@ubahKeteranganObat'
    ]);
});
