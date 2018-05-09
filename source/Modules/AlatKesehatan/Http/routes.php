<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\AlatKesehatan\Http\Controllers'], function()
{
    Route::resource('/alat_kesehatan', 'AlatKesehatanController');
});
