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




Route::group(['middleware' => ['web', 'auth']], function(){
    Route::get('/dashboard', 'AdminController@index');
    Route::get('/add-category', 'SuperAdminController@admin_form');

    Route::post('/save-category', 'AdminController@addCategories');

    Route::get('/manage-category', 'AdminController@retrive');
    Route::get('data-delete/{id}', 'AdminController@delete');
    Route::get('update-form/{id}', 'AdminController@update');
    Route::post('/update-category', 'AdminController@updateCategories');

    Route::get('/add-new-post', 'PostsController@addPosts');
    Route::post('/save-post', 'PostsController@insertPosts');

    Route::get('/manage-post', 'PostsController@managePost');
    Route::get('delete-post/{id}', 'PostsController@deletePost');
    Route::get('update-post/{id}', 'PostsController@getUpdatePost');
    Route::post('/update-post', 'PostsController@updatePost');

    // Route::get('/test', 'SuperAdminController@test');
    // Route::get('/admin','AdminController@index');
    // Route::get('/logout', 'SuperAdminController@logout');
});

Route::get('/', 'MyController@indexx');
Route::get('/index', 'MyController@indexx');
Route::get('/gallery', 'MyController@gallery');
Route::get('/categories', 'MyController@categories');
Route::get('/archives', 'MyController@archives');
Route::get('/about', 'MyController@about');
Route::get('/contact', 'MyController@contact');
Route::get('blog-details/{id}', 'PostsController@blogDetails');
Route::get('/blog-posts/{categories_name}', 'PostsController@blogDetailsCategory');
Route::post('add-comment', 'PostsController@addComment');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
