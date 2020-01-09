<?php
Route::get('/', function () {
    return view('/home');
});

Route::get('/', 'PostController@index');
Route::resource('posts','PostController');

Auth::routes();


// posts controller 
Route::get('/admin', 'HomeController@index')->name('home');

Route::get('/admin/list', 'HomeController@index')->name('post.list');

Route::get('/admin/post', 'PostController@getFormPost')->name('post.form')->middleware('auth'); //get the from 
Route::post('/admin/post', 'PostController@createPost')->name('post.form'); //post the request
Route::get('/admin/post/detail/{id}', 'PostController@show')->name('post.detail');
Route::get('/post/{slug}', 'PostController@show')->name('post.single');
Route::get('/admin/post/edit/{id}', 'PostController@edit')->name('post.edit')->middleware('auth');
Route::post('/admin/post/edit/{id}', 'PostController@update')->name('post.update')->middleware('auth');
Route::get('/admin/post/delete/{id}', 'PostController@destroy')->name('post.delete')->middleware('auth');


// Category routes

Route::get('/admin/post', 'CategoryController@index_')->name('post.form'); //get the from 


Route::get('/admin/category-list', 'CategoryController@index')->name('category.list');
Route::get('/admin/category/new', 'CategoryController@new')->name('category.new')->middleware('auth');
Route::post('/admin/category/add', 'CategoryController@add_category')->name('category.add_category')->middleware('auth');
Route::get('/admin/category/edit/{id}', 'CategoryController@edit_category')->name('category.edit_category')->middleware('auth');
Route::get('/admin/category/delete/{id}', 'CategoryController@delete_category')->name('category.delete_category')->middleware('auth');
Route::post('/admin/category/edit/{id}', 'CategoryController@update_category')->name('category.update_category')->middleware('auth');

// get posts by category 
Route::get('posts-category', 'CategoryController@get_post_by_category')->name('posts.category');


//sending mail routes
Route::get('/contact', 'ContactController@send')->name('contact');
Route::post('/contact', 'ContactController@store');



//Static routes 
Route::get('/about-me', 'PagesController@about');
Route::get('/portfolio', 'PagesController@portfolio');
//Route::get('/contact', 'PagesController@contactPage');
Route::get('/resume', 'PagesController@resume');

// 404 Route Handler
Route::any('{url_param}', function() {
    abort(404, '404 Error. Page not found!');
})->where('url_param', '.*');
