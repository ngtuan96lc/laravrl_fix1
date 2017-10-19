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

Route::get('/', 'PagesController@getIndex')->name('index');
Route::view('/about', 'statics.about');
Route::view('/contact', 'statics.contact');
Route::get('/blog/{slug}','PagesController@getSingle')->where('slug','[\d\w_-]+')->name('single');
Route::post('/guest/contacts','ContactController@store')->name('guest.contacts');

Route::group(['prefix'=>'admin','middleware' => 'auth'], function(){
	Route::get('/','PagesController@getAdmin');
	Route::resource('posts','PostController');
	Route::resource('catagories','CatagoriesController',['only' => ['index','store','destroy','show']]);
	Route::resource('tags','TagController',['only' => ['index','store','destroy','show']]);
	Route::resource('contacts','ContactController',['only' => ['index','show','destroy']]);
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
