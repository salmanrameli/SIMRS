<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\PerintahDokterDanPengobatan\Http\Controllers'], function()
{
    Route::get('/ranap/{id}/perintah_dokter_dan_pengobatan', [
        'as' => 'perintah_dokter_dan_pengobatan.index',
        'uses' => 'PerintahDokterDanPengobatanController@showAllPerintahDokterDanPengobatanPasien'
    ]);

    Route::post('/simpan_perintah_dokter_dan_pengobatan', [
        'as' => 'perintah_dokter_dan_pengobatan.store',
        'uses' => 'PerintahDokterDanPengobatanController@savePerintahDokterDanPengobatanPasien'
    ]);

    Route::get('/ranap/{id}/perintah_dokter_dan_pengobatan/{perintah_dokter_dan_pengobatan}', [
        'as' => 'perintah_dokter_dan_pengobatan.show',
        'uses' => 'PerintahDokterDanPengobatanController@showDetailPerintahDokterDanPengobatanPasien'
    ]);

    Route::patch('/update_perintah_dokter_dan_pengobatan', [
        'as' => 'perintah_dokter_dan_pengobatan.update',
        'uses' => 'PerintahDokterDanPengobatanController@updatePerintahDokterDanPengobatanPasien'
    ]);

    Route::get('/ranap/{id}/perintah_dokter_dan_pengobatan/{perintah_dokter_dan_pengobatan}/revisi', [
        'as' => 'perintah_dokter_dan_pengobatan.revisi',
        'uses' => 'PerintahDokterDanPengobatanController@lihatRevisiPerintahDokter'
    ]);
});
