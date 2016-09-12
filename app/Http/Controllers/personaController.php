<?php namespace Aliadas\Http\Controllers;

use Aliadas\Http\Requests;
use Aliadas\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use Input;
use Illuminate\Http\Request;

class personaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($course_id)
	{
		$alumnos = \Aliadas\curso::find($course_id)->personas()->paginate(6);
		$curso = \Aliadas\curso::find($course_id);
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
		$alumnos = \Aliadas\curso::find($curso->id)->personas;
		$alumnos_total = \Aliadas\persona::All();
		// Validacion de existencia en BD
		foreach ($alumnos as $alumn) {
			if($request['ci_persona'] == $alumn->ci_persona){
				Session::flash('error_message', 'El usuario ya agregado al curso!');
				return redirect()->back();
			}
		}
		foreach ($alumnos_total as $alumn) {
			if($request['ci_persona'] == $alumn->ci_persona){
				Session::flash('error_message', 'Usuario existe en base de datos! Proceda a una búsqueda en la seccion "Buscar Alumno"');
				return redirect()->back();
			}
		}

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
			Session::flash('flash_message', 'Usuario creado y agregado al curso!');
			return redirect()->back();
			
				

	}


	/**
	 * delete the specified resource from pivot table.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete_course($curso_id, $alumn_id)
	{	
		$persona = \Aliadas\persona::find($alumn_id); //obtengo el objeto persona
		$persona->cursos()->detach($curso_id); //referencio la relacion con curso a traves de "cursos" y elimino la relacion
		//return "curso ".$curso_id ."alumno: ".$alumn_id;
		return redirect()->back();
	}

	public function getAlumnos(Request $request){
		/*
		if(Request::ajax()){
			return "carga bien";
		}
		$alumnos = \Aliadas\persona::all();
		return response()->json(
			$alumnos->toArray()
		);
		*/
		$term= $request->term; //jQuery
		$data = \Aliadas\persona::where('ci_persona', 'LIKE', '%'.$term.'%')
		->take(10)
		->get();
		$result = array();
		foreach ($data as $key => $val) {
			$results[] = ['value'=>$val->ci_persona];
		}
		return response()->json($results);

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
		$persona = \Aliadas\persona::find($id);	
		$persona->cursos()->detach();
		//$persona->materias()->detach();
		\Aliadas\persona::destroy($id);
		Session::flash('message', 'Curso eliminado Correctamente');
		return redirect()->back();
	}

}
