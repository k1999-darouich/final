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


use App\Mail\NewUserWelcomeMail;


Auth::routes();

Route::get('/email', function(){
    return new NewUserWelcomeMail();
});
Route::get('/contact', 'ContactFormController@create');
Route::post('/contact', 'ContactFormController@store');

Route::get('/', 'PostsController@index');
Route::get('/home', 'PostsController@index');
Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/p/{post}', 'PostsController@show');
Route::get('/p/{post}/edit', 'PostsController@edit')->name('post.edit');
Route::patch('/p/{post}', 'PostsController@update')->name('post.update');
Route::delete('/p/{post}', 'PostsCOntroller@destroy');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
Route::delete('/profile/{user}', 'ProfilesController@destroy')->name('profile.destroy');

Route::get('/profile/{user}/editUser', 'UserController@edit')->name('user.edit');
Route::post('/profile/{user}/editUser', 'UserController@update')->name('user.update');

Route::post('comments/{post_id}','CommentsController@store')->name('comment.store');
Route::post('/search', 'SearchController@index');
Route::get('/welcome' , function(){
    return view('welcome');
});