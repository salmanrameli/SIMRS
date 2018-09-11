<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Jabatan\Http\Controllers'], function()
{
    Route::get('/jabatan', [
        'as' => 'jabatan.index',
        'uses' => 'JabatanController@showAllJabatan'
    ]);

    Route::post('/jabatan', [
        'as' => 'jabatan.store',
        'uses' => 'JabatanController@saveNewJabatan'
    ]);

    Route::patch('/jabatan/simpan_perubahan_jabatan', [
        'as' => 'jabatan.update',
        'uses' => 'JabatanController@updateJabatan'
    ]);

    Route::delete('/jabatan/hapus_jabatan', [
        'as' => 'jabatan.delete',
        'JabatanController@deleteJabatan'
    ]);
});
