<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\CatatanHarianPerawatan\Http\Controllers'], function()
{
    Route::get('ranap/{id}/catatan_harian_perawatan', [
        'as' => 'catatan_harian_perawatan.index',
        'uses' => 'CatatanHarianPerawatanController@showAllCatatanHarianDanPerawatan'
    ]);


    Route::post('ranap/store_catatan_harian_perawatan', [
        'as' => 'catatan_harian_perawatan.store',
        'uses' => 'CatatanHarianPerawatanController@storeCatatanHarianDanPerawatan'
    ]);

    Route::patch('ranap/update_catatan_harian_perawatan', [
        'as' => 'catatan_harian_perawatan.update',
        'uses' => 'CatatanHarianPerawatanController@updateCatatanHarianDanPerawatan'
    ]);
});
