<?php

Route::group(['middleware' => 'web', 'prefix' => 'jabatan', 'namespace' => 'Modules\Jabatan\Http\Controllers'], function()
{
    Route::get('/', 'JabatanController@index');
});
