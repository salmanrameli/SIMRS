<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Dokter\Http\Controllers'], function()
{
    Route::get('dokter/cari', [
        'as' => 'dokter.cari',
        'uses' => 'DokterController@cari'
    ]);

    Route::resource('dokter', 'DokterController');

});
