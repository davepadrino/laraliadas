<?php namespace Aliadas\Http\Controllers;

use Aliadas\Http\Requests;
use Aliadas\Http\Controllers\Controller;
use DB;
use Session;
use Redirect;
use Illuminate\Http\Request;

class sedeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sedes = \Aliadas\sede::All();
		return view('manage_sedes', compact('sedes'));	
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
		\Aliadas\sede::create([
			'nombre_sede'=> $request['name'],
			'ciudad_sede'=> $request['city'],
			]);
			//Session::flash('flash_message', 'Usuario creado satisfactoriamente!');
		$sedes = \Aliadas\sede::All();
		return view('manage_sedes', compact('sedes'));	
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
		$sedes = \Aliadas\sede::find($id);
		$sedes->fill($request->all());
		$sedes-> save();
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
		\Aliadas\sede::destroy($id);
		return redirect()->back();	}

}
