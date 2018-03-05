<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\RawatInap\Http\Controllers'], function()
{
    Route::resource('/ranap', 'RawatInapController');
});
