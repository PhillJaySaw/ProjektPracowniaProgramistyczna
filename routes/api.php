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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('articles', function () {
    return response(['Article 1', 'Article 2', 'Article 3'], 200);
});

Route::get('articles/{article}', function ($articleId) {
    return response()->json(['articleId' => "{$articleId}"], 200);
});

Route::post('articles', function() {
    return response()->json([
        'message' => 'Create success'
    ], 201);
});

Route::put('articles/{article}', function() {
    return response()->json([
        'message' => 'Update success'
    ], 200);
});

Route::delete('products/{product}', function() {
    return response()->json(null, 204);
});
