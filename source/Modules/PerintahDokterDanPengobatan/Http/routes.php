<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\PerintahDokterDanPengobatan\Http\Controllers'], function()
{
    Route::get('/ranap/{id}/perintah_dokter_dan_pengobatan', [
        'as' => 'perintah_dokter_dan_pengobatan.index',
        'uses' => 'PerintahDokterDanPengobatanController@showAllPerintahDokterDanPengobatanPasien'
    ]);

    Route::get('ranap/{id}/perintah_dokter_dan_pengobatan/{perintah}/create', [
        'as' => 'perintah_dokter_dan_pengobatan.create',
        'uses' => 'PerintahDokterDanPengobatanController@createPerintahDokterDanPengobatanPasien'
    ]);

    Route::post('/ranap/simpan_perintah_dokter_dan_pengobatan', [
        'as' => 'perintah_dokter_dan_pengobatan.store',
        'uses' => 'PerintahDokterDanPengobatanController@savePerintahDokterDanPengobatanPasien'
    ]);

    Route::get('/ranap/{id}/perintah_dokter_dan_pengobatan/{perintah_dokter_dan_pengobatan}', [
        'as' => 'perintah_dokter_dan_pengobatan.show',
        'uses' => 'PerintahDokterDanPengobatanController@showDetailPerintahDokterDanPengobatanPasien'
    ]);

    Route::get('/ranap/{id}/perintah_dokter_dan_pengobatan/{perintah_dokter_dan_pengobatan}/edit', [
        'as' => 'perintah_dokter_dan_pengobatan.edit',
        'uses' => 'PerintahDokterDanPengobatanController@editPerintahDokterDanPengobatanPasien'
    ]);

    Route::patch('/ranap/update_perintah_dokter_dan_pengobatan', [
        'as' => 'perintah_dokter_dan_pengobatan.update',
        'uses' => 'PerintahDokterDanPengobatanController@updatePerintahDokterDanPengobatanPasien'
    ]);
});
