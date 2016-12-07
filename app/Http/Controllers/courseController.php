<?php namespace Aliadas\Http\Controllers;

use Aliadas\Http\Requests;
use Aliadas\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use DB;
use Input;
use Illuminate\Http\Request;
use DateTime;

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

		$request['startDate'] = DateTime::createFromFormat('d/m/Y', $request['startDate'] )->format('Y-m-d');
		$request['endDate'] = DateTime::createFromFormat('d/m/Y', $request['endDate'] )->format('Y-m-d');

		if(strtotime($request['endDate']) < strtotime($request['startDate']) ){
			Session::flash('date_validator', 'Fecha de finalización debe ser mayor que fecha de inicio');
			return redirect()->back();
		}else{
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

		$request->incio_curso = DateTime::createFromFormat('d/m/Y', $request->incio_curso )->format('Y-m-d');
		$request->fin_curso = DateTime::createFromFormat('d/m/Y', $request->fin_curso)->format('Y-m-d');

		if(strtotime($request->fin_curso) < strtotime($request->incio_curso)){
			Session::flash('date_validator', 'Fecha de finalización debe ser mayor que fecha de inicio');
			return redirect()->back();
		}else{
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
		echo "#hlsasasasas";
		return view('courses_panel', compact('cursos', 'nombre'));
	}

	public function  taller(){
		$cursos = \Aliadas\curso::where('tipo_curso', '=', 'Escuela Taller')->
			orderBy('created_at', 'desc')->paginate(10);
		$nombre = "Escuela - Taller";
		return view('courses_panel', compact('cursos', 'nombre'));
	}

	public function  hacedoras(){
		$cursos = \Aliadas\curso::where('tipo_curso', '=', 'Mujeres Hacedoras')->
			orderBy('created_at', 'desc')->paginate(10);
		$nombre = "Mujeres Hacedoras";
		return view('courses_panel', compact('cursos', 'nombre'));	
	}


	public function  emprendedorasNamed($id){
		$recordsArray = array();
		$courseArray = array();
		$tipo_curso = "Emprendedoras en Cadena";
		$current_curso = \Aliadas\curso::find($id);
		$nombre_curso = $current_curso['nombre_curso'];
		$alumnos = $current_curso->personas;
		$materias = $current_curso->materias;
		/* Enlazar materias-alumnos */
		foreach ($alumnos as $alumno) {
			foreach ($materias as $materia) {
				$data = array();
				$data['persona_id'] = $alumno->id;
				$data['materia_id'] = $materia->id;
				/* Validar que la dupla no se repita en el curso */		
				$result = DB::table('materia_persona')
				->where('persona_id', $alumno->id)
				->where('materia_id', $materia->id)
				->get();
				if(count($result) == 0){ // Verifica que el registro NO esté
					DB::table('materia_persona')->insert($data);
					$result = DB::table('materia_persona')
					->where('persona_id', $alumno->id)
					->where('materia_id', $materia->id)
					->get();
					$recordsArray[] = $result[0];
				}else{ // en caso que si esté
					$recordsArray[] = $result[0];
				}
			}
			$result2 = DB::table('curso_persona')
				->where('curso_id', $current_curso->id)
				->where('persona_id', $alumno->id)
				->get();
			$courseArray[] = $result2[0];
		}
		return view('course_info/course_info', compact('current_curso', 'tipo_curso', 'alumnos', 'materias', 'recordsArray', 'courseArray'));
		//return $recordsArray;
	}

	public function  tallerNamed($id){
		$recordsArray = array();
		$courseArray = array();
		$tipo_curso = "Escuela - Taller";
		$current_curso = \Aliadas\curso::find($id);
		$nombre_curso = $current_curso['nombre_curso'];
		$alumnos = $current_curso->personas;
		$materias = $current_curso->materias;
		/* Enlazar materias-alumnos */
		foreach ($alumnos as $alumno) {
			foreach ($materias as $materia) {
				$data = array();
				$data['persona_id'] = $alumno->id;
				$data['materia_id'] = $materia->id;
				/* Validar que la dupla no se repita en el curso */		
				$result = DB::table('materia_persona')
				->where('persona_id', $alumno->id)
				->where('materia_id', $materia->id)
				->get();
				if(count($result) == 0){ // Verifica que el registro NO esté
					DB::table('materia_persona')->insert($data);
					$result = DB::table('materia_persona')
					->where('persona_id', $alumno->id)
					->where('materia_id', $materia->id)
					->get();
					$recordsArray[] = $result[0];
				}else{ // en caso que si esté
					$recordsArray[] = $result[0];
				}
			}
			$result2 = DB::table('curso_persona')
				->where('curso_id', $current_curso->id)
				->where('persona_id', $alumno->id)
				->get();
			$courseArray[] = $result2[0];
		}		
		return view('course_info/course_info', compact('current_curso', 'tipo_curso', 'alumnos', 'materias', 'recordsArray', 'courseArray'));	
	}

	public function  hacedorasNamed($id){
		$recordsArray = array();	
		$courseArray = array();	
		$tipo_curso = "Mujeres Hacedoras";
		$current_curso = \Aliadas\curso::find($id);
		$nombre_curso = $current_curso['nombre_curso'];
		$alumnos = $current_curso->personas;
		$materias = $current_curso->materias;	
		/* Enlazar materias-alumnos */
		foreach ($alumnos as $alumno) {
			foreach ($materias as $materia) {
				$data = array();
				$data['persona_id'] = $alumno->id;
				$data['materia_id'] = $materia->id;
				/* Validar que la dupla no se repita en el curso */		
				$result = DB::table('materia_persona')
				->where('persona_id', $alumno->id)
				->where('materia_id', $materia->id)
				->get();
				if(count($result) == 0){ // Verifica que el registro NO esté
					DB::table('materia_persona')->insert($data);
					$result = DB::table('materia_persona')
					->where('persona_id', $alumno->id)
					->where('materia_id', $materia->id)
					->get();
					$recordsArray[] = $result[0];
				}else{ // en caso que si esté
					$recordsArray[] = $result[0];
				}
			}
			$result2 = DB::table('curso_persona')
				->where('curso_id', $current_curso->id)
				->where('persona_id', $alumno->id)
				->get();
			$courseArray[] = $result2[0];			
		}		
		return view('course_info/course_info', compact('current_curso', 'tipo_curso', 'alumnos', 'materias', 'recordsArray', 'courseArray'));	
	}


	public function  viewProfMat($curso_id){
		$current_curso = \Aliadas\curso::find($curso_id);
		$z=0;
		$results = DB::table('curso_materia_profesors')->where('curso_id', $curso_id)->paginate(7);
		for ($i = 0; $i<count($results); $i++ ){
			$id = $results[$i]->id;
			$materia_id = $results[$i]->materia_id;
			$profesor_id = $results[$i]->profesor_id;
			$materia_obj = \Aliadas\materia::find($materia_id);
			$profesor_obj = \Aliadas\profesor::find($profesor_id);
			$results[$i] = ['id' => $id,
							'materia'=>$materia_obj, 
							'profesor'=>$profesor_obj ];
		}
		return view('materias_profesores', compact('current_curso','results'));
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


	public function addProfMat(Request $request){
		$data = array();
		$curso = \Aliadas\curso::find($request->course_id); 
		$profesor = \Aliadas\profesor::where('nombre_profesor', 'LIKE', $request->profName.'%')
		->get();
		$profesor = $profesor[0];
		$materia = \Aliadas\materia::where('nombre_materia', 'LIKE', $request->matName.'%')
		->get();
		$materia = $materia[0];
		/*****************************************/
		/* Arreglo de profesores en el curso */
		$profesoresArray = array();
		foreach ($curso->profesors as $cp) {
			$profesoresArray[] = $cp->id;
		}
		/* Si el prof no esta en el curso se agrega */
		if (!in_array($profesor['id'], $profesoresArray)){
			$curso->profesors()->attach($profesor['id']);
		}
		/* Arreglo de materias en el curso */
		$materiasArray = array();
		foreach ($curso->materias as $cm) {
			$materiasArray[] = $cm->id;
		}
		/* Si la materia no esta en el curso se agrega */
		if (!in_array($materia['id'], $materiasArray)){
			$curso->materias()->attach($materia['id']);
		}
		/*****************************************/
		/* Para insertar data en la tabla pivot */		
		$data['curso_id'] = $curso->id;
		$data['profesor_id'] = $profesor['id'];
		$data['materia_id'] = $materia['id'];
		/* Validar que la dupla no se repita en el curso */		
		$result = DB::table('curso_materia_profesors')
		->where('curso_id', $curso->id)
		->where('profesor_id', $profesor['id'])
		->where('materia_id', $materia['id'])
		->get();
		if(count($result) == 0){
			DB::table('curso_materia_profesors')->insert($data);
			Session::flash('addSuccess', 'Registro añadido Correctamente');
		}else{
			Session::flash('addFail', 'Registro ya existente en el curso');
		}
		
		return redirect()->back();
	}	

	public function delProfMat($id){
		$relation = DB::table('curso_materia_profesors')
		->where('id', $id)
		->delete();
		Session::flash('delMessage', 'Relación eliminada correctamente');
		return redirect()->back();
	}

	public function califMateria(Request $request, $materia_id, $alumn_id){
		$data = array();
		$alumno = \Aliadas\persona::find($alumn_id);
		$materia = \Aliadas\materia::find($materia_id);
		$result = DB::table('materia_persona')
		->where('persona_id', $alumno->id)
		->where('materia_id', $materia->id)
		->update(['calificacion' => $request->nota_materia, 'asistencia' => $request->asistencia]); //Falta asistencia
		return redirect()->back();
		//return "alumno ".$alumno." materia ".$materia. "NOTA: ".$request->nota_materia." Asistencias: ".$request->asistencia;
	}

	public function califCurso(Request $request, $course_id, $alumn_id){
		$data = array();
		$alumno = \Aliadas\persona::find($alumn_id);
		$curso = \Aliadas\curso::find($course_id);
		//$data['asistencia'] = $request->asistencia;
		$result = DB::table('curso_persona')
		->where('persona_id', $alumno->id)
		->where('curso_id', $curso->id)
		->update(['nota_final' => $request->nota_final, 'asistencia' => $request->asistencia]); //Falta asistencia
		return redirect()->back();
		//return "alumno ".$alumno." materia ".$materia. "NOTA: ".$request->nota_materia." Asistencias: ".$request->asistencia;
	}		


}
