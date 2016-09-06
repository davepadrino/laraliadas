<?php namespace Aliadas\Http\Controllers;

use Aliadas\Http\Requests;
use Aliadas\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use Illuminate\Http\Request;

class profesorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$profs = \Aliadas\profesor::All();
		return  view('profesor', compact('profs'));
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
			'tipo_curso'=> $request['ci_profesor'],
			'numero_telefonico_profesor'=> $request['telef_profesor'],
			'email_profesor'=> $request['email_profesor'],
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
		\Aliadas\profesor::destroy($id);
		Session::flash('message', 'Profesor eliminado Correctamente');
		return redirect()->back();
	}

}
