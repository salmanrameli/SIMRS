<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\RawatInap\Http\Controllers'], function()
{
    Route::get('/kamar', [
        'as' => 'ranap.kamar',
        'uses' => 'RawatInapController@indexKamar'
    ]);

    Route::resource('/ranap', 'RawatInapController');

    Route::get('/ranap/kamar/{id}', [
        'as' => 'ranap.kamar.show',
        'uses' => 'RawatInapController@showKamar'
    ]);
});

Route::group(['middleware' => 'web'], function ()
{
    Route::get('ranap/pasien/cari', [
        'as' => 'ranap.pasien.cari',
        'uses' => 'Modules\Pasien\Http\Controllers\PasienController@cari'
    ]);

    Route::get('ranap/pasien/index', [
        'as' => 'ranap.pasien.index',
        'uses' => 'Modules\Pasien\Http\Controllers\PasienController@index'
    ]);

    Route::get('ranap/pasien/create', [
        'as' => 'ranap.pasien.create',
        'uses' => 'Modules\Pasien\Http\Controllers\PasienController@create'
    ]);

    Route::get('ranap/pasien/{id}', [
        'as' => 'ranap.pasien.show',
        'uses' => 'Modules\Pasien\Http\Controllers\PasienController@show'
    ]);



});
