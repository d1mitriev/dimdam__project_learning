<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::get('posts', 'PostsController@index');
Route::get('tags', 'TagsController@index');
Route::post('login', 'LoginController@index');
Route::post('register', 'RegisterController@index');
Route::post('me', 'MeController@index');
Route::get('xml', 'XmlController@index');