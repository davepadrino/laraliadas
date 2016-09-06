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


Route::resource('/backAccessXyZ', 'backCtrl'); 
Route::resource('/', 'Index');
Route::resource('logout', 'Index@logout');
Route::get('/principal', 'Index@principal'); 
Route::get('/editar-usuario', 'Index@edit_user'); 
Route::resource('update', 'Index@update');
Route::get('/recuperar-contraseña', 'Index@recover_psw'); 
Route::get('/agregar-curso', 'Index@add_course'); 

//Route::resource('/', 'userController');

Route::resource('admin', 'userController');
Route::resource('sedes', 'sedeController');
Route::resource('cursos', 'courseController');
Route::resource('profesores', 'profesorController');
Route::resource('materias', 'materiaController');





Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
