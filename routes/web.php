<?php

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


/*Route::get('/mail',function(){
    return view('welcome');
});
*/


Route::redirect('/','/posts');
Route::redirect('/home', '/posts');
Route::get('/posts','PostController@index');
Route::get('/posts/create','PostController@create');
Route::post('/posts','PostController@store');
Route::get('/posts/myPosts','PostController@userPosts');
Route::get('/posts/{id}','PostController@show')->name('post');
Route::post('/comments','CommentController@store');
Route::get('/notificaciones', function () {
    return view('posts.notificaciones',);
})->name('notificaciones');

Route::post('/posts/myPosts','PostController@delete');

Route::get('/edit','UserController@edit');
Route::put('/edit','UserController@update');
Route::post('/edit','UserController@delete');

Auth::routes();



















/*

Route::get('/','PostController@index');
Route::view('/posts/create','create');
Route::post('/posts/create','PostController@create');
Route::get('/posts/{id}','PostController@show')->name('post');
Route::get('/today', 'PostController@today');
--------------

Route::get('/', 'PostController@index');

//Route::get('/posts/{id}', 'PostController@show');

Auth::routes();

Route::get('/home', 'UserController@index')->name('home');


Route::get('/comentarios', 'PostController@comentarios');
*/
/*Rutas del laboratorio anterior

Route::get("/", "MiControlador@inicio");

Route::get("/arequipa", "MiControlador@arequipa");

Route::get("/huacachina", "MiControlador@huacachina");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
