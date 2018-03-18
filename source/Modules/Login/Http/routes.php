<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Login\Http\Controllers'], function()
{
    Route::get('/', 'LoginController@home');
});
