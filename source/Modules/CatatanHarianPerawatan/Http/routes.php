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

    Route::post('ranap/{id}/catatan_harian_perawatan', [
        'as' => 'catatan_harian_perawatan.store',
        'uses' => 'CatatanHarianPerawatanController@storeCatatanHarianDanPerawatan'
    ]);

    Route::get('ranap/{id}/catatan_harian_perawatan/{catatan_harian_perawatan}', [
        'as' => 'catatan_harian_perawatan.show',
        'uses' => 'CatatanHarianPerawatanController@show'
    ]);

    Route::get('ranap/{id}/catatan_harian_perawatan/{catatan_harian_perawatan}/edit', [
        'as' => 'catatan_harian_perawatan.edit',
        'uses' => 'CatatanHarianPerawatanController@editCatatanHarianDanPerawatan'
    ]);

    Route::patch('ranap/{id}/catatan_harian_perawatan/{catatan_harian_perawatan}', [
        'as' => 'catatan_harian_perawatan.update',
        'uses' => 'CatatanHarianPerawatanController@updateCatatanHarianDanPerawatan'
    ]);
});
