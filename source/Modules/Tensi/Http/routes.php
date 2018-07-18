<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Tensi\Http\Controllers'], function()
{
    Route::get('ranap/{id}/tensi', [
        'as' => 'tensi.index',
        'uses' => 'TensiController@showAllTensi'
    ]);

    Route::post('ranap/simpan_tensi', [
        'as' => 'tensi.store',
        'uses' => 'TensiController@storeTensiPasien'
    ]);
});
