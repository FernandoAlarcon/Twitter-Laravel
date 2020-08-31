<?php

use Illuminate\Support\Facades\Route;
use App\OAuthProvider;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/mistwits', function () {
    return view('layouts/datos');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('twitts', 'TwitterController@List');
Route::get('TwittsNew', 'TwitterController@CreateTwits');

Route::get('TwitsType', 'TwitterController@ListMine');
Route::get('DeleteTw', 'TwitterController@DeleteData');
Route::get('UploadData', 'TwitterController@UploadData');

/// USER ///

Route::get('DataType', 'UserController@InfoPartner');


//DataType TwitsType
