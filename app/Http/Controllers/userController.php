<?php namespace Aliadas\Http\Controllers;

use Aliadas\Http\Requests;
use Aliadas\Http\Requests\UserCreateRequest;
use Aliadas\Http\Requests\UserUpdateRequest;
use Aliadas\Http\Controllers\Controller;
use DB;
use Session;
use Illuminate\Http\Request;
use Redirect;

class userController extends Controller {

	public function __construct(){
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$users = \Aliadas\user::paginate(6);
		$sedes = \Aliadas\sede::All();
		$data = $sedes->lists('nombre_sede', 'id');
		return view('users_admin/manage_users', compact('users','data'));
		//return \Aliadas\user::with('sede')->get();

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    		return view('users_admin/manage_users', compact('users'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserCreateRequest $request)
	{
		\Aliadas\user::create([
			'name'=> $request['name'],
			'email'=> $request['email'],
			'password'=> $request['password'],
			'rol'=> $request['rol'],
			'sede_id' => $request['sede_id'],
			]);
			Session::flash('flash_message', 'Usuario creado satisfactoriamente!');
		$users = \Aliadas\user::All();
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
	public function update($id, UserUpdateRequest $request)
	{
		$user = \Aliadas\user::find($id);
		$user->fill($request->all());
		$user-> save();
		Session::flash('message', 'Usuario Editado Correctamente');
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
