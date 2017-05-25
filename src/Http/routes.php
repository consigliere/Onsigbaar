<?php

Route::group(['middleware' => 'web', 'prefix' => 'onsigbaar', 'namespace' => 'App\\Components\Onsigbaar\Http\Controllers'], function()
{
    Route::get('/', 'OnsigbaarController@index');
    Route::get('/oauth2', 'OnsigbaarController@oauth2')->middleware('admin.user');
});

Route::group(['middleware' => ['web']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
    });
});