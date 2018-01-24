<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::group(['middleware' => 'checkRole:administrator'], function() {
        Route::resource('user', 'UserController');
    });
});
