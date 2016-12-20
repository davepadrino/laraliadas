<?php namespace Aliadas\Http\Controllers;

use Aliadas\Http\Requests;
use Aliadas\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use Illuminate\Http\Request;

class materiaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		// si no es un usuario válido
		if(!(Auth::user())){
			return Redirect::to('/');
		}
		
		// si no es coordinadora
		if(Auth::user()->rol != 'Coordinadora'){
			return Redirect::to('/principal');
		}
		
		$mats = \Aliadas\materia::paginate(6);
		return  view('materias/materias', compact('mats'));
		
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
		\Aliadas\materia::create([
			'nombre_materia'=> $request['nombre_materia'],
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
		$mats = \Aliadas\materia::find($id);		
		$mats->fill($request->all());
		$mats-> save();
		Session::flash('message', 'Materia Editada Correctamente');
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
		$materia = \Aliadas\materia::find($id);	
		//$materia->cursos()->detach();
		//$materia->personas()->detach();
		//$materia->profesors()->detach();
		\Aliadas\materia::destroy($id);
		Session::flash('message', 'Materia eliminado Correctamente');
		return redirect()->back();
	}

}
