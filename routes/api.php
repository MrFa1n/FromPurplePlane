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

Route::get('/list_all','App\Http\Controllers\BooksApi@index_api');
Route::post('/record_book','App\Http\Controllers\BooksApi@create_record_about_book');
Route::delete('/delete/{id}','App\Http\Controllers\BooksApi@delete_book');
Route::put('/update/{id}','App\Http\Controllers\BooksApi@update_book');
