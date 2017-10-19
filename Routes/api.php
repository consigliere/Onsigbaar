<?php
/**
 * api.php
 * Created by @anonymoussc on 6/27/2017 12:27 PM.
 */

Route::group(['middleware' => 'api', 'prefix' => '', 'namespace' => 'App\Components\Onsigbaar\Http\Controllers\Auth'], function () {
    Route::post('/login', 'LoginController@login');
    Route::post('/login/refresh', 'LoginController@refresh');
});

Route::group(['middleware' => 'auth:api', 'prefix' => '', 'namespace' => 'App\Components\Onsigbaar\Http\Controllers\Auth'], function () {
    Route::post('/logout', 'LoginController@logout');
});

Route::group(['middleware' => 'api', 'prefix' => 'onsigbaar', 'namespace' => 'App\Components\Onsigbaar\Http\Controllers'], function () {
    //
});
