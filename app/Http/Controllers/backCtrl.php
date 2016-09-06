<?php namespace Aliadas\Http\Controllers;

use Aliadas\Http\Requests;
use Aliadas\Http\Controllers\Controller;

use Illuminate\Http\Request;

class backCtrl extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sedes = \Aliadas\sede::find(1);
		if ($sedes == null){
			\Aliadas\sede::create([
			'nombre_sede' => 'General',
			'ciudad_sede' => 'General',
			]);
			$data = $sedes->lists('nombre_sede', 'id');
			return view('backAccess',compact('data'));		
		}else{
			$data = $sedes->lists('nombre_sede', 'id');
			return view('backAccess',compact('data'));		}
		//\Aliadas\sede::create(['nombre_sede' => 'General','ciudad_sede' => 'General',]);

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

		\Aliadas\user::create([
			'name'=> $request['name'],
			'email'=> $request['email'],
			'password'=> $request['password'],
			'rol'=> $request['rol'],
			'sede_id' => 1,
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

}
