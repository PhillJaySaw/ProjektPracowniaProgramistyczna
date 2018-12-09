<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/** RESTful routes cheatsheet **
**Route::get($uri, $callback);
**Route::post($uri, $callback);
**Route::put($uri, $callback);
**Route::delete($uri, $callback);
**
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('articles', 'ArticlesController@index');

Route::get('articles/{article}', 'ArticlesController@show');

Route::post('articles', 'ArticlesController@store');

Route::put('articles/{article}', 'ArticlesController@update');

Route::delete('articles/{article}', 'ArticlesController@delete');
