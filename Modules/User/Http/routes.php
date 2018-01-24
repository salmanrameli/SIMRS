<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\User\Http\Controllers', 'as' => 'admin.'], function()
{
    //Route::get('/', 'UserController@index');

    Route::group(['middleware' => 'checkRole:administrator'], function() {
        Route::resource('user', 'UserController');
    });
});
