<?php

Route::group(['middleware' => 'web', 'prefix' => 'saya', 'namespace' => 'Modules\Saya\Http\Controllers'], function()
{
    Route::get('/', 'SayaController@index');
});
