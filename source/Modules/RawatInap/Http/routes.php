<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\RawatInap\Http\Controllers'], function()
{
    Route::get('kamar', [
        'as' => 'ranap.kamar',
        'uses' => 'RawatInapController@indexKamar'
    ]);

    //Route::resource('ranap', 'RawatInapController');

    Route::get('/ranap', [
        'as' => 'ranap.index',
        'uses' => 'RawatInapController@showAllRawatInap'
    ]);

    Route::get('/ranap/create', [
        'as' => 'ranap.create',
        'uses' => 'RawatInapController@createNewRawatInap'
    ]);

    Route::post('/ranap', [
        'as' => 'ranap.store',
        'uses' => 'RawatInapController@saveNewRawatInap'
    ]);

    Route::get('/ranap/{id}', [
        'as' => 'ranap.show',
        'uses' => 'RawatInapController@showDetailRawatInap'
    ]);

    Route::get('/ranap/{id}/edit', [
        'as' => 'ranap.edit',
        'uses' => 'RawatInapController@editRawatInap'
    ]);

    Route::patch('/ranap/{id}', [
        'as' => 'ranap.update',
        'uses' => 'RawatInapController@updateRawatInap'
    ]);

    //Route::resource('ranap/{id}/perjalanan_penyakit', 'PerjalananPenyakitController');

    Route::get('/ranap/{id}/perjalanan_penyakit', [
        'as' => 'perjalanan_penyakit.index',
        'uses' => 'PerjalananPenyakitController@showAllPerjalananPenyakitPasien'
    ]);

    Route::get('/ranap/{id}/perjalanan_penyakit/create', [
        'as' => 'perjalanan_penyakit.create',
        'uses' => 'PerjalananPenyakitController@createNewPerjalananPenyakitPasien'
    ]);

    Route::post('/ranap/{id}/perjalanan_penyakit', [
        'as' => 'perjalanan_penyakit.store',
        'uses' => 'PerjalananPenyakitController@saveNewPerjalananPenyakitPasien'
    ]);

    Route::get('/ranap/{id}/perjalanan_penyakit/{perjalanan_penyakit}', [
        'as' => 'perjalanan_penyakit.show',
        'uses' => 'PerjalananPenyakitController@showDetailPerjalananPenyakitPasien'
    ]);

    Route::get('/ranap/{id}/perjalanan_penyakit/{perjalanan_penyakit}/edit', [
        'as' => 'perjalanan_penyakit.edit',
        'uses' => 'PerjalananPenyakitController@editPerjalananPenyakitPasien'
    ]);

    Route::patch('/ranap/{id}/perjalanan_penyakit/{perjalanan_penyakit}', [
        'as' => 'perjalanan_penyakit.update',
        'uses' => 'PerjalananPenyakitController@updatePerjalananPenyakitPasien'
    ]);

    Route::resource('ranap/{id}/perintah_dokter_dan_pengobatan', 'PerintahDokterDanPengobatanController');

    Route::get('ranap/{id}/perintah_dokter_dan_pengobatan/{perintah}/create', [
        'as' => 'perintah_dokter_dan_pengobatan.create',
        'uses' => 'PerintahDokterDanPengobatanController@create'
    ]);

    Route::resource('ranap/{id}/catatan_harian_perawatan', 'CatatanHarianPerawatanController');

    Route::get('/ranap/kamar/{id}', [
        'as' => 'ranap.kamar.show',
        'uses' => 'RawatInapController@showKamar'
    ]);
});

Route::group(['middleware' => 'web'], function ()
{
    Route::get('ranap/pasien/cari', [
        'as' => 'ranap.pasien.cari',
        'uses' => 'Modules\Pasien\Http\Controllers\PasienController@cariPasien'
    ]);

    Route::get('ranap/pasien/index', [
        'as' => 'ranap.pasien.index',
        'uses' => 'Modules\Pasien\Http\Controllers\PasienController@showAllPasien'
    ]);

    Route::get('ranap/pasien/create', [
        'as' => 'ranap.pasien.create',
        'uses' => 'Modules\Pasien\Http\Controllers\PasienController@createNewPasien'
    ]);

    Route::get('ranap/pasien/{id}', [
        'as' => 'ranap.pasien.show',
        'uses' => 'Modules\Pasien\Http\Controllers\PasienController@showDetailPasien'
    ]);



});
