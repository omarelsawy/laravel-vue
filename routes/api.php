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

Route::post('/quote' , [
  'uses' => 'QuoteController@postQuote',
  'middleware' => 'auth.jwt'
]);

Route::get('/quotes' , [
  'uses' => 'QuoteController@getQuotes'
]);

Route::put('/quote/{id}' , [
  'uses' => 'QuoteController@putQuote'
]);

Route::delete('/quote/{id}' , [
  'uses' => 'QuoteController@deleteQuote'
]);

Route::post('/user' , [
  'uses' => 'UserController@signUp'
]);

Route::post('/user/signIn' , [
  'uses' => 'UserController@signIn'
]);
















