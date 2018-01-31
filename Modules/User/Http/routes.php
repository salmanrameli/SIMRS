<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::group(['middleware' => 'checkRole:administrator'], function() {
        Route::get('/user/cari', [
            'as' => 'user.cari',
            'uses' => 'UserController@cari'
        ]);

        Route::resource('user', 'UserController');
    });
});
