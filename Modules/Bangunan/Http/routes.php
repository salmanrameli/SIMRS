<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Bangunan\Http\Controllers'], function()
{
    Route::resource('bangunan', 'BangunanController');

    Route::resource('bangunan/lantai', 'LantaiController');

    Route::resource('bangunan/lantai/kamar', 'KamarController');
});
