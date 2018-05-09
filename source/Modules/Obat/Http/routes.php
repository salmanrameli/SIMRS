<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Obat\Http\Controllers'], function()
{
    Route::resource('/obat', 'ObatController');
});
