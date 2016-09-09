<?php namespace Aliadas\Http\Controllers;

use Aliadas\Http\Requests;
use Aliadas\Http\Requests\LoginRequest;
use Aliadas\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use Illuminate\Http\Request;


class Index extends Controller {

	public function __construct(){
		$this->middleware('auth', ['only'=>'admin']);
	}
	/**

	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('index');
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
	public function store(LoginRequest $request)
	{
		if(Auth::attempt(['email'=> $request['email'], 'password' => $request['password']])){
			if(Auth::user()->rol == 'Administrador'){
				return Redirect::to('admin');
			}else{
				return Redirect::to('/principal');
			}
		}else{
			Session::flash('message-error', "Sus datos son incorrectos");
			return Redirect::to('/');
		}
	}


	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');	
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
		if (\Hash::check($request->password, $user->password)){
			if($request->newPass1 != '' || $request->newPass2 != '' ){
				if($request->newPass1==$request->newPass2){
					$user->password = $request->newPass1;
					$user->name = $request->name;
					$user-> save();
					Session::flash('message', 'Usuario Editado Correctamente');
					return redirect()->back();
				}else{
					Session::flash('error-message', 'Contraseñas nuevas no coinciden');
					return redirect()->back();
				}
			}else{
				$user->name = $request->name;
				$user-> save();
				Session::flash('message', 'Usuario Editado Correctamente');
				return redirect()->back();
			}
		}
		Session::flash('error-message2', 'Contraseña incorrecta');
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
		//
	}



	public function principal()
	{
		$sedes = \Aliadas\sede::All();
		$data = $sedes->lists('nombre_sede', 'id');
		$cursos = \Aliadas\curso::orderBy('created_at', 'desc')->paginate(10);
		
		//$cursos = \Aliadas\curso::where('sede_id', '=', 3)->get();
		return  view('principal', compact('cursos','data'));
	}

	public function add_course()
	{
		$sedes = \Aliadas\sede::All();
		$data = $sedes->lists('nombre_sede', 'id');
		return  view('add_course', compact('data'));
	}

	public function edit_user()
	{
		$username = Auth::user();
		return  view('edit_user', compact('username'));
	}

	public function edit_course()
	{
		return view('edit_course');
	}

	public function course()
	{
		return view('course');
	}

	public function recover_psw()
	{
		return  view('recover_password');
	}

}
