<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Saya\Http\Controllers'], function()
{
    //Route::get('/', 'SayaController@index');

    Route::resource('/saya', 'SayaController');

    Route::get('/saya/{id}/edit/password', [
        'as' => 'saya.edit_password',
        'uses' => 'SayaController@editPassword'
    ]);

    Route::post('/saya/update_password', [
        'as' => 'saya.update_password',
        'uses' => 'SayaController@updatePassword'
    ]);
});
