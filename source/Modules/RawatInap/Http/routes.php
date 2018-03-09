<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\RawatInap\Http\Controllers'], function()
{
    Route::get('ranap/kamar/', 'RawatInapController@back');

    Route::resource('/ranap', 'RawatInapController');

    Route::get('/ranap/kamar/{id}', [
        'as' => 'ranap.kamar.show',
        'uses' => 'RawatInapController@showKamar'
    ]);

});
