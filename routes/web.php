<?php

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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'SitesController@index');
Route::get('/add', 'SitesController@add');
Route::get('/about', 'SitesController@about');
Route::post('/save', ['uses' => 'SitesController@save','as' => 'sites.save'])->middleware('auth');
Route::resource('/site','SitesController');
Auth::routes();

Route::get('/site/{site}', [
    'uses' => 'SitesController@show',
    'as' => 'sites.show'
]);

Route::delete('/site/{id}','SitesController@destroy');
Route::get('/home', 'HomeController@index')->name('home');