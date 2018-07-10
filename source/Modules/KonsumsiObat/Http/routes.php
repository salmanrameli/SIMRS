<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\KonsumsiObat\Http\Controllers'], function()
{
    Route::get('ranap/{id}/konsumsi_obat', [
        'as' => 'konsumsi_obat.index',
        'uses' => 'KonsumsiObatController@showAllKonsumsiObat'
    ]);

    Route::get('ranap/{id}/konsumsi_obat/create', [
        'as' => 'konsumsi_obat.create',
        'uses' => 'KonsumsiObatController@createNewKonsumsiObat'
    ]);

    Route::post('ranap/{id}/konsumsi_obat', [
        'as' => 'konsumsi_obat.store',
        'uses' => 'KonsumsiObatController@storeKonsumsiObat'
    ]);

    Route::get('ranap/{id}/konsumsi_obat/{konsumsi_obat}', [
        'as' => 'konsumsi_obat.show',
        'uses' => 'KonsumsiObatController@showKonsumsiObat'
    ]);

    Route::get('ranap/{id}/konsumsi_obat/{konsumsi_obat}/edit', [
        'as' => 'konsumsi_obat.edit',
        'uses' => 'KonsumsiObatController@editKonsumsiObat'
    ]);

    Route::patch('ranap/{id}/konsumsi_obat/{konsumsi_obat}', [
        'as' => 'konsumsi_obat.update',
        'uses' => 'KonsumsiObatController@updateKonsumsiObat'
    ]);
});
