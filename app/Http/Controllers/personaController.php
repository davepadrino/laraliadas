<?php namespace Aliadas\Http\Controllers;

use Aliadas\Http\Requests;
use Aliadas\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use Illuminate\Http\Request;

class personaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($course_id)
	{
		//$alumnos = \Aliadas\persona::All();
		$alumnos = \Aliadas\curso::find($course_id)->personas;
		$curso = \Aliadas\curso::find($course_id);
		//$roles = User::find(1)->roles;
		//return $curso; 
		return view('add_alumn', compact('alumnos','curso'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	//public function store($course_id, Request $request)
	public function store(Request $request)
	{
		// Una vez agregadas materias deben incluirse aca para relacionarlas con el alumno y el ID de las materias q verá
		$curso = \Aliadas\curso::find($request->course_id);
		$persona = \Aliadas\persona::create([
			'ci_persona'=> $request['ci_persona'],
			'nombre_persona'=> $request['nombre_persona'],
			'numero_telefonico_profesor'=> $request['numero_telefonico_profesor'],
			'genero_persona'=> $request['genero_persona'],
			'fecha_nacimiento_persona'=> $request['fecha_nacimiento_persona'],
			'direccion_persona'=> $request['direccion_persona'],
			'email_persona'=> $request['email_persona'],
			]);

		$persona->cursos()->attach($curso->id);
		
		return redirect()->back();
		//return $request->course_id;

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
