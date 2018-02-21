<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Dokter\Http\Controllers'], function()
{
    Route::resource('dokter', 'DokterController');
});
