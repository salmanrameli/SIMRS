<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::get('/user/cari', [
        'as' => 'user.cari',
        'uses' => 'UserController@cariStaff'
    ]);

    Route::get('/user', [
        'as' => 'user.index',
        'uses' => 'UserController@showAllStaff'
    ]);

    Route::get('/user/create', [
        'as' => 'user.create',
        'uses' => 'UserController@createNewStaff'
    ]);

    Route::post('/user', [
        'as' => 'user.store',
        'uses' => 'UserController@saveNewStaff'
    ]);

    Route::get('/user/{id}', [
        'as' => 'user.show',
        'uses' => 'UserController@showDetailStaff'
    ]);

    Route::get('/user/{id}/edit', [
        'as' => 'user.edit',
        'uses' => 'UserController@editStaff'
    ]);

    Route::patch('/user/{id}', [
        'as' => 'user.update',
        'uses' => 'UserController@updateStaff'
    ]);

    Route::delete('/user/{id}', [
        'as' => 'user.delete',
        'uses' => 'UserController@deleteStaff'
    ]);
});
