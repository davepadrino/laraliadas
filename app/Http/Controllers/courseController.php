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
			'tipo_curso'=> $request['type'],
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


	public function  emprendedoras(){

	}

	public function  taller(){
		
	}

	public function  hacedoras(){
		
	}
}
