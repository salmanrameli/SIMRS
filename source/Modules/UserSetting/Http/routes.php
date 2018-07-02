<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\UserSetting\Http\Controllers'], function()
{
    Route::get('/setting', [
        'as' => 'setting.index',
        'uses' => 'UserSettingController@showAkun'
    ]);

    Route::get('/setting/{id}/edit', [
        'as' => 'setting.edit',
        'uses' => 'UserSettingController@editAkun'
    ]);

    Route::patch('/setting/{id}/', [
        'as' => 'setting.update',
        'uses' => 'UserSettingController@updateAkun'
    ]);

    Route::get('/setting/{id}/edit/password', [
        'as' => 'setting.edit_password',
        'uses' => 'UserSettingController@editPassword'
    ]);

    Route::patch('/setting/{id}/update_password', [
        'as' => 'setting.update_password',
        'uses' => 'UserSettingController@updatePassword'
    ]);

});
