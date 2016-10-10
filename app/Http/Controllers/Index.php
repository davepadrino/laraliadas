<?php namespace Aliadas\Http\Controllers;

use Aliadas\Http\Requests;
use Aliadas\Http\Requests\LoginRequest;
use Aliadas\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use Input;
use DB;
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


	public function getAlumnos(Request $request){
		$term= $request->term; //jQuery
		$data = \Aliadas\persona::where('ci_persona', 'LIKE', $term.'%')
		->take(10)
		->get();
		$results = array();
		foreach ($data as $key => $val) {
			$results[] = ['value'=>$val->ci_persona];
		}
		$result = response()->json($results);

		return $result;
	}

	public function getAlumnosView(){
		$buscar = Input::get('buscar');
		$data = \Aliadas\persona::where('ci_persona', 'LIKE', $buscar)->get();
		$data = $data[0]['id'];
		$result = \Aliadas\persona::find($data);
		$id_curso =  $result->cursos[0]['id'];
		$result2 = DB::table('curso_persona')
				->where('curso_id', $id_curso )
				->where('persona_id', $data)
				->get();
		$recordsArray[] = $result2[0];

		/*[{"id":1,"curso_id":25,"persona_id":9,"nota_final":"A","asistencia":"10","created_at":null,"updated_at":null}]*/

		/*{"id":9,"nombre_persona":"424","ci_persona":424,"genero_persona":"Masculino","numero_telefonico_persona":"2424","email_persona":"user23@gmail.com","direccion_persona":"424","fecha_nacimiento_persona":"2016-10-04","created_at":"2016-10-08 17:43:08","updated_at":"2016-10-08 17:43:08","cursos":[{"id":25,"nombre_curso":"prueba10","incio_curso":"2016-10-08","fin_curso":"2016-10-19","tipo_curso":"Emprendedoras en Cadena","estado_curso":"En curso","descripcion_curso":"","created_at":"2016-10-08 17:33:48","updated_at":"2016-10-08 17:33:48","sede_id":1,"user_id":3,"pivot":{"persona_id":9,"curso_id":25}}]}*/


		return view('search_results', compact('result','recordsArray'));
	}
}
