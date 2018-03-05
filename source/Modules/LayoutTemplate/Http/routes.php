<?php

Route::group(['middleware' => 'web', 'prefix' => 'layouttemplate', 'namespace' => 'Modules\LayoutTemplate\Http\Controllers'], function()
{
    Route::get('/', 'LayoutTemplateController@index');
});
