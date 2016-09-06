<?php namespace Aliadas\Http\Requests;

use Aliadas\Http\Requests\Request;

class UserCreateRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		// se debe autorizar el request colocando un true en este retorno
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name'=> 'required',
			'email'=> 'required|email|unique:users', // unico en la tabla 'users'
			'password'=> 'required',
			'rol'=> 'required',
		];
	}

}
