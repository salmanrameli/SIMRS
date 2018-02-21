<?php

Route::group(['middleware' => 'web', 'prefix' => 'dokter', 'namespace' => 'Modules\Dokter\Http\Controllers'], function()
{
    Route::get('/', 'DokterController@index');
});
