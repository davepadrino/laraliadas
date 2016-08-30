<?php namespace Aliadas\Http\Controllers;

use Aliadas\Http\Requests;
use Aliadas\Http\Controllers\Controller;
use DB;
use Session;
use Illuminate\Http\Request;
use Redirect;

class userController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$users = \Aliadas\user::All();
		return view('manage_users', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
			//return DB::table('sedes')->where('id', '=', '1')->get();
			//$users = DB::table('users')->get();
			//return $users; 
    		return view('manage_users', compact('users'));
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
			]);
			Session::flash('flash_message', 'Usuario creado satisfactoriamente!');
		$users = \Aliadas\user::All();


    	return view('manage_users', compact('users'));
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
		$user = \Aliadas\user::find($id);
		$user->fill($request->all());
		$user-> save();
		Session::flash('message', 'Usuario Editado Correctamente');
		//return Redirect::to('/admin');
		//return view('manage_users');
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
		\Aliadas\user::destroy($id);
		Session::flash('message', 'Usuario eliminado Correctamente');
		return redirect()->back();
	}

}
