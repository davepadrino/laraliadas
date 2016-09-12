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

Route::get('/cursos/emprendedoras-en-cadena', 'courseController@emprendedoras'); 
Route::get('/cursos/emprendedoras-en-cadena/{id}', array('as'=>'emprendedoras', 'uses'=>'courseController@emprendedorasNamed')); 


Route::get('/cursos/escuela-taller', 'courseController@taller'); 
Route::get('/cursos/escuela-taller/{id}', array('as'=>'esctaller', 'uses'=>'courseController@tallerNamed')); 

Route::get('/cursos/mujeres-hacedoras', 'courseController@hacedoras'); 
Route::get('/cursos/mujeres-hacedoras/{id}', array('as'=>'hacedoras', 'uses'=>'courseController@hacedorasNamed'));  

//Route::resource('/', 'userController');

Route::resource('admin', 'userController');
Route::resource('sedes', 'sedeController');
Route::resource('cursos', 'courseController');
Route::resource('profesores', 'profesorController');
Route::resource('materias', 'materiaController');
Route::get('{id}/personas', array('as'=>'personas', 'uses'=>'personaController@index'));
Route::any('{curso_id}/personas/{alumn_id}', array('as'=>'personaDelCurso', 'uses'=>'personaController@delete_course'));
/******/
Route::get('{id}/personas/alumnos', array('as'=>'getAlumno', 'uses'=>'personaController@getAlumnos'));
/*******/
Route::resource('personas', 'personaController');






Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
