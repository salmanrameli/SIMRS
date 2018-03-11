<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::resource('user/setting', 'SettingController');

    Route::get('/user/setting/{id}/edit/password', [
        'as' => 'setting.edit_password',
        'uses' => 'SettingController@editPassword'
    ]);

    Route::post('/user/setting/update_password', [
        'as' => 'setting.update_password',
        'uses' => 'SettingController@updatePassword'
    ]);

    Route::get('/user/cari', [
        'as' => 'user.cari',
        'uses' => 'UserController@cari'
    ]);

    Route::resource('user', 'UserController');

    Route::resource('jabatan', 'JabatanController');

});
