<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Pasien\Http\Controllers'], function()
{
    Route::resource('pasien', 'PasienController');
});
