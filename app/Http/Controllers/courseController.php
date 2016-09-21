<?php namespace Aliadas\Http\Controllers;

use Aliadas\Http\Requests;
use Aliadas\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use Illuminate\Http\Request;

class courseController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function store(Request $request)
	{	
    	$cursos = \Aliadas\curso::All();
		\Aliadas\curso::create([
			'nombre_curso'=> $request['name'],
			'tipo_curso'=> $request['tipo_curso'],
			'estado_curso'=> $request['state'],
			'incio_curso'=> $request['startDate'],
			'fin_curso'=> $request['endDate'],
			'sede_id' => $request['sede_id'],
			'user_id' => Auth::user()->id,
			]);
		return Redirect::to('/principal');
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
	public function update($id, Request $request )
	{
		$curso = \Aliadas\curso::find($id);		
		$curso->nombre_curso = $request->nombre_curso;
		$curso->incio_curso = $request->incio_curso;
		$curso->fin_curso = $request->fin_curso;
		$curso->estado_curso = $request->state;
		$curso->descripcion_curso = $request->descriptionCourse;
		$curso-> save();
		Session::flash('flash_message', 'Curso Editado Correctamente');
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
		$curso = \Aliadas\curso::find($id);	
		$curso->personas()->detach();
		$curso->materias()->detach();
		\Aliadas\curso::destroy($id);
		Session::flash('message', 'Curso eliminado Correctamente');
		return redirect()->back();
	}


	public function  emprendedoras(){
		$cursos = \Aliadas\curso::where('tipo_curso', '=', 'Emprendedoras en Cadena')->orderBy('created_at', 'desc')->paginate(10);
		$nombre = "Emprendedoras en Cadena";
		return view('courses_panel', compact('cursos', 'nombre'));
	}

	public function  taller(){
		$cursos = \Aliadas\curso::where('tipo_curso', '=', 'Escuela Taller')->orderBy('created_at', 'desc')->paginate(10);
		$nombre = "Escuela - Taller";
		return view('courses_panel', compact('cursos', 'nombre'));
	}

	public function  hacedoras(){
		$cursos = \Aliadas\curso::where('tipo_curso', '=', 'Mujeres Hacedoras')->orderBy('created_at', 'desc')->paginate(10);
		$nombre = "Mujeres Hacedoras";
		return view('courses_panel', compact('cursos', 'nombre'));	
	}


	public function  emprendedorasNamed($id){
		$tipo_curso = "Emprendedoras en Cadena";
		$current_curso = \Aliadas\curso::find($id);
		$nombre_curso = $current_curso['nombre_curso'];
		$alumnos = $current_curso->personas;
		$materias = $current_curso->materias;
		return view('course_info', compact('current_curso', 'tipo_curso', 'alumnos', 'materias'));
	}

	public function  tallerNamed($id){
		$tipo_curso = "Escuela - Taller";
		$current_curso = \Aliadas\curso::find($id);
		$nombre_curso = $current_curso['nombre_curso'];
		$alumnos = $current_curso->personas;
		$materias = $current_curso->materias;
		return view('course_info', compact('current_curso', 'tipo_curso', 'alumnos', 'materias'));	
	}

	public function  hacedorasNamed($id){
		$tipo_curso = "Mujeres Hacedoras";
		$current_curso = \Aliadas\curso::find($id);
		$nombre_curso = $current_curso['nombre_curso'];
		$alumnos = $current_curso->personas;
		$materias = $current_curso->materias;
		return view('course_info', compact('current_curso', 'tipo_curso', 'alumnos', 'materias'));	
	}


	public function  viewProfMat($curso_id){
		$current_curso = \Aliadas\curso::find($curso_id);
		$curso_materias = $current_curso->materias;
		$curso_profesores = $current_curso->profesors;
		$results = array();
		for ($i = 0; $i<count($curso_materias); $i++ ){
			for ($j = 0; $j<count($curso_profesores); $j++){
				if ($curso_materias[$i]['pivot']['curso_id'] == $curso_profesores[$j]['pivot']['curso_id']){
					//echo "si coincide";
					$results[$j] = ['materia'=>$curso_materias[$i], 
								'profesor'=>$curso_profesores[$j]];
				}
			}
		}
		//return $results[0]['materia']['nombre_materia'];

		//$curso_prof = $current_curso->profesors;
		//$materias_profesores = $current_curso->materias;
		return view('materias_profesores', compact('current_curso','results'));	
		//return $curso_materia;

	}


	public function getProf(Request $request){
		$term= $request->term; //jQuery
		$data = \Aliadas\profesor::where('nombre_profesor', 'LIKE', $term.'%')
		->take(10)
		->get();
		$results = array();
		foreach ($data as $key => $val) {
			$results[] = ['value'=>$val->nombre_profesor];
		}
		return response()->json($results);
	}

	public function getMat(Request $request){
		$term= $request->term; //jQuery
		$data = \Aliadas\materia::where('nombre_materia', 'LIKE', $term.'%')
		->take(10)
		->get();
		$results = array();
		foreach ($data as $key => $val) {
			$results[] = ['value'=>$val->nombre_materia];
		}
		return response()->json($results);
	}

	/*
	public function addProfMat($profName, $matName){
		return "prof: ".$profName." materia: ".$matName;
	}	
	*/
	public function addProfMat(Request $request){
		$curso = \Aliadas\curso::find($request->course_id); 
		$profesor = \Aliadas\profesor::where('nombre_profesor', 'LIKE', $request->profName.'%')
		->get();
		$profesor = $profesor[0];
		$materia = \Aliadas\materia::where('nombre_materia', 'LIKE', $request->matName.'%')
		->get();
		$materia = $materia[0];
		$curso->materias()->attach($materia['id']);
		$curso->profesors()->attach($profesor['id']);
		$profesor->materias()->attach($materia['id']);
		return redirect()->back();
	}	



}
