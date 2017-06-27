<?php
/**
 * web.php
 * Created by @anonymoussc on 6/27/2017 12:26 PM.
 */

Route::group(['middleware' => 'web', 'prefix' => 'onsigbaar', 'namespace' => 'App\Components\Onsigbaar\Http\Controllers'], function () {
    Route::get('/', 'OnsigbaarController@index');
});