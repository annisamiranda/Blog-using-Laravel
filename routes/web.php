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

/* Route::get('/', function () {
    return view('layouts.main');
}); */
Route::get('/','BlogController@index');

/**
 * All route artikel
 */
Route::resource('artikel', 'ArtikelController');

/**
 * All route master Kategori
 */
Route::resource('kategori', 'KategoriController');

/**
 * All route master Tag
 */
Route::resource('tag', 'TagController')->except(['show']);

/**
 * All route master Author
 */
Route::resource('author', 'AuthorController');

/**
 * All route master User
 */
Route::resource('users', 'UserController');

/**
 * All route master Comment
 */
Route::resource('comment', 'CommentController');
Auth::routes();

Route::get('/blog', 'BlogController@index')->name('blog');
