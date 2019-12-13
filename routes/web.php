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

/*Route::get('/', function () {
    return view('welcome');
});*/




Route::get('/', function () {
    return view('post.index');
});

Route::get('/', 'PostController@index');
Route::resource('posts','PostController');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Route::get('/writer/post', 'PostController@getFormPost')->name('post.form')->middleware('auth'); //get the from 
Route::post('/writer/post', 'PostController@createPost')->name('post.form'); //post the request
Route::get('/post/detail/{id}', 'PostController@show')->name('post.detail');
//Route::get('/post/{id}', 'PostController@show')->name('post.single');
Route::get('/post/{slug}', 'PostController@show')->name('post.single');
Route::get('/writer/post/edit/{id}', 'PostController@edit')->name('post.edit')->middleware('auth');
Route::post('/writer/post/edit/{id}', 'PostController@update')->name('post.update')->middleware('auth');
Route::get('/writer/post/delete/{id}', 'PostController@destroy')->name('post.delete')->middleware('auth');

//Static routes 

Route::get('/about-me', 'PagesController@about');
Route::get('/portfolio', 'PagesController@portfolio');
Route::get('/contact', 'PagesController@contactPage');
Route::get('/resume', 'PagesController@resume');

// 404 Route Handler
Route::any('{url_param}', function() {
    abort(404, '404 Error. Page not found!');
})->where('url_param', '.*');
