<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'Index@index'); 
Route::get('/recuperar-contraseña', 'Index@recover_psw'); 
Route::get('/principal', 'Index@principal'); 
Route::get('/agregar-curso', 'Index@add_course'); 
Route::get('/editar-usuario', 'Index@edit_user'); 
Route::get('/editar-curso', 'Index@edit_course'); 
Route::get('/cursos', 'Index@course'); 


















Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
