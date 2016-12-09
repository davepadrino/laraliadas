<?php namespace Aliadas\Http\Controllers;

use Aliadas\Http\Requests;
use Aliadas\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use Input;
use Illuminate\Http\Request;
use DateTime;

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
		return view('add_alumn/add_alumn', compact('alumnos','curso'));
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
				Session::flash('error_message', 'El alumno ya esta inscrito en el curso!');
				return redirect()->back();
			}
		}
		foreach ($alumnos_total as $alumn) {
			if($request['ci_persona'] == $alumn->ci_persona){
				Session::flash('error_message', 'El alumno existe en base de datos! Proceda a una búsqueda en la seccion "Buscar Alumno"');
				return redirect()->back();
			}
		}

		$request['fecha_nacimiento_persona'] = DateTime::createFromFormat('d/m/Y', $request['fecha_nacimiento_persona'])->format('Y-m-d');

		$persona = \Aliadas\persona::create([
			'ci_persona'=> $request['ci_persona'],
			'nombre_persona'=> $request['nombre_persona'],
			'numero_telefonico_persona'=> $request['numero_telefonico_persona'],
			'genero_persona'=> $request['genero_persona'],
			'fecha_nacimiento_persona'=> $request['fecha_nacimiento_persona'],
			'direccion_persona'=> $request['direccion_persona'],
			'email_persona'=> $request['email_persona'],
			]);
		$persona->cursos()->attach($curso->id);	
		Session::flash('flash_message', 'Alumno ha sido creado e inscrito al curso!');
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
		$term= $request->term; //jQuery
		$data = \Aliadas\persona::where('ci_persona', 'LIKE', $term.'%')
		->take(10)
		->get();
		$results = array();
		foreach ($data as $key => $val) {
			$results[] = ['value'=>$val->ci_persona];
		}
		return response()->json($results);

	}	

	public function addAlumnos($curso_id, $ci){

		$persona = \Aliadas\persona::where('ci_persona', 'LIKE', $ci)->get();
		$persona = $persona[0];
		$curso = \Aliadas\curso::find($curso_id);
		$personas_en_curso = $curso->personas;
		foreach ($personas_en_curso as $pc) {
			if($persona['ci_persona'] == $pc->ci_persona){
				Session::flash('error_message', 'El alumno ya esta inscrito en el curso!');
				return redirect()->back();
			}
		}		
		Session::flash('flash_message', 'Alumno y agregado al curso!');
		$persona = \Aliadas\persona::find($persona['id']);
		$materias = $curso->materias;
		foreach ($materias as $materia) {
			$persona->materias()->attach($materia);
		}
		$persona->cursos()->attach($curso->id);
		return redirect()->back();
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
	public function update($id, Request $request)
	{
		$request->fecha_nacimiento_persona = DateTime::createFromFormat('d/m/Y', $request->fecha_nacimiento_persona)->format('Y-m-d');
		$persona = \Aliadas\persona::find($id);
		$persona->fill($request->all());
		$persona->fecha_nacimiento_persona = $request->fecha_nacimiento_persona;
		/*$persona->ci_persona = $request->ci_persona;
		$persona->nombre_persona = $request->nombre_persona;
		$persona->numero_telefonico_persona = $request->numero_telefonico_persona;
		$persona->genero_persona = $request->genero_persona;
		$persona->fecha_nacimiento_persona = $request->fecha_nacimiento_persona;
		$persona->direccion_persona = $request->direccion_persona;
		$persona->email_persona = $request->email_persona;*/
		$persona-> save();
		Session::flash('message', 'Alumno Editado Correctamente');
		return redirect()->back();
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
		$persona->materias()->detach();
		\Aliadas\persona::destroy($id);
		Session::flash('Delmessage', 'Alumno eliminado Correctamente');
		return view('principal/principal');
	}

}
