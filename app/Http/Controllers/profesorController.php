<?php namespace Aliadas\Http\Controllers;
use Aliadas\Http\Requests;
use Aliadas\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use DB;
use Illuminate\Http\Request;
class profesorController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		if(!(Auth::user())){
			return Redirect::to('/');
		}

		$profs = \Aliadas\profesor::paginate(6);
		return  view('profesor/profesor', compact('profs'));
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
		\Aliadas\profesor::create([
			'nombre_profesor'=> $request['nombre_profesor'],
			'ci_profesor'=> $request['ci_profesor'],
			'numero_telefonico_profesor'=> $request['numero_telefonico_profesor'],
			'email_profesor'=> $request['email_profesor'],
			'user_id' => Auth::user()->id,
			]);
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

		if(!(Auth::user())){
			return Redirect::to('/');
		}
		
		$inforPersonal = \Aliadas\profesor::find($id);
		//return $result;
		$cursosDados = DB::table('curso_materia_profesors')
				->select('curso_id','materia_id')
				->where('profesor_id', $id)
				->get();

		$nombreCursos = \Aliadas\curso::all();


		$nombreMaterias = \Aliadas\materia::all();


		return view('profesor/profesor_view',compact('inforPersonal','cursosDados','nombreCursos','nombreMaterias'));
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
		$profs = \Aliadas\profesor::find($id);
		$profs->fill($request->all());
		$profs-> save();
		Session::flash('message', 'Profesor Editado Correctamente');
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
		$profesor = \Aliadas\profesor::find($id);	
		//$profesor->materias()->detach();
		\Aliadas\profesor::destroy($id);
		Session::flash('message', 'Profesor eliminado Correctamente');
		return redirect('/profesores');
	}

}