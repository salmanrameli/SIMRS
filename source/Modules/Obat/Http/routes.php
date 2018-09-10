<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Obat\Http\Controllers'], function()
{
    Route::get('/obat', [
        'as' => 'obat.index',
        'uses' => 'ObatController@showAllObat'
    ]);

    Route::post('/obat', [
        'as' => 'obat.store',
        'uses' => 'ObatController@saveNewObat'
    ]);

    Route::patch('/obat/simpan_perubahan_obat', [
        'as' => 'obat.update',
        'uses' => 'ObatController@updateObat'
    ]);
});
