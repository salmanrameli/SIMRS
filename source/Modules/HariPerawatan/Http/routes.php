<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\HariPerawatan\Http\Controllers'], function()
{
    Route::post('ranap/simpan_hari_perawatan', [
        'as' => 'hari_perawatan.store',
        'uses' => 'HariPerawatanController@storeRincianHariPerawatan'
    ]);
});
