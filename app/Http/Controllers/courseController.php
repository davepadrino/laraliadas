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
		\Aliadas\curso::destroy($id);
		Session::flash('message', 'Curso eliminado Correctamente');
		return redirect()->back();
	}


	public function  emprendedoras(){
		$cursos = \Aliadas\curso::where('tipo_curso', '=', 'Emprendedoras en Cadena')->get();
		$nombre = "Emprendedoras en Cadena";
		return view('courses_panel', compact('cursos', 'nombre'));
	}

	public function  taller(){
		$cursos = \Aliadas\curso::where('tipo_curso', '=', 'Escuela Taller')->get();
		$nombre = "Escuela - Taller";
		return view('courses_panel', compact('cursos', 'nombre'));
	}

	public function  hacedoras(){
		$cursos = \Aliadas\curso::where('tipo_curso', '=', 'Mujeres Hacedoras')->get();
		$nombre = "Mujeres Hacedoras";
		return view('courses_panel', compact('cursos', 'nombre'));	
	}


	public function  emprendedorasNamed($id){
		$tipo_curso = "Emprendedoras en Cadena";
		$current_curso = \Aliadas\curso::find($id);
		$nombre_curso = $current_curso['nombre_curso'];
		return view('course_info', compact('current_curso', 'tipo_curso'));
	}

	public function  tallerNamed($id){
		$tipo_curso = "Escuela - Taller";
		$current_curso = \Aliadas\curso::find($id);
		$nombre_curso = $current_curso['nombre_curso'];
		return view('course_info', compact('current_curso', 'tipo_curso'));	
	}

	public function  hacedorasNamed($id){
		$tipo_curso = "Mujeres Hacedoras";
		$current_curso = \Aliadas\curso::find($id);
		$nombre_curso = $current_curso['nombre_curso'];
		return view('course_info', compact('current_curso', 'tipo_curso'));	
	}






}
