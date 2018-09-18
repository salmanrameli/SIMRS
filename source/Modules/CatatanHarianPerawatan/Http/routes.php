<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\CatatanHarianPerawatan\Http\Controllers'], function()
{
    Route::get('ranap/{id}/catatan_harian_perawatan', [
        'as' => 'catatan_harian_perawatan.index',
        'uses' => 'CatatanHarianPerawatanController@showAllCatatanHarianDanPerawatan'
    ]);

    Route::get('ranap/{id}/catatan_harian_perawatan/create', [
        'as' => 'catatan_harian_perawatan.create',
        'uses' => 'CatatanHarianPerawatanController@createNewCatatanHarianDanPerawatan'
    ]);

    Route::post('store_catatan_harian_perawatan', [
        'as' => 'catatan_harian_perawatan.store',
        'uses' => 'CatatanHarianPerawatanController@storeCatatanHarianDanPerawatan'
    ]);

    Route::patch('update_catatan_harian_perawatan', [
        'as' => 'catatan_harian_perawatan.update',
        'uses' => 'CatatanHarianPerawatanController@updateCatatanHarianDanPerawatan'
    ]);

    Route::get('/ranap/{id}/catatan_harian_perawatan/{catatan_harian_perawatan}/revisi', [
        'as' => 'catatan_harian_perawatan.revisi',
        'uses' => 'CatatanHarianPerawatanController@lihatRevisiCatatanHarianDanPerawatan'
    ]);
});
