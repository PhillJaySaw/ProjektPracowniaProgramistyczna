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

// TEST


// ARTICLES

Route::get('articles', 'ArticlesController@index');

Route::get('articles/{article}', 'ArticlesController@show');

Route::post('articles', 'ArticlesController@store');

Route::put('articles/{article}', 'ArticlesController@update');

Route::delete('articles/{article}', 'ArticlesController@delete');


// COLLECTIONS

Route::get('collections', 'CollectionsController@index');
 
Route::get('collections/{collection}', 'CollectionsController@show');
 
Route::post('collections','CollectionsController@store');
 
Route::put('collections/{collection}','CollectionsController@update');
 
Route::delete('collections/{collection}', 'CollectionsController@delete');


// AUTHOR 

Route::get('authors', 'AuthorsController@index');
 
Route::get('authors/{author}', 'AuthorsController@show');
 
Route::post('authors','AuthorsController@store');
 
Route::put('authors/{author}','AuthorsController@update');
 
Route::delete('authors/{author}', 'AuthorsController@delete');

// CATEGORY

Route::get('categories', 'CategoriesController@index');
 
Route::get('categories/{category}', 'CategoriesController@show');
 
Route::post('categories','CategoriesController@store');
 
Route::put('categories/{category}','CategoriesController@update');
 
Route::delete('categories/{category}', 'CategoriesController@delete');
