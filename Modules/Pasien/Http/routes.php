<?php

Route::group(['middleware' => 'web', 'prefix' => 'pasien', 'namespace' => 'Modules\Pasien\Http\Controllers'], function()
{
    Route::get('/', 'PasienController@index');
});
