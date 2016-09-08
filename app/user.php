<?php namespace Aliadas;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class user extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';



	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password','rol', 'sede_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


	
	// Para no tener que colocarle el bcrypt al password cada vez que se cree
	public function setPasswordAttribute($valor){
		if(!empty($valor)){
			$this->attributes['password'] = \Hash::make($valor);
		}
	}

	public function sede() {
	    return $this->belongsTo('Aliadas\sede'); //sede_id para todos los belongsTO
	}

	public function cursos() {
	    return $this->hasMany('Aliadas\curso'); //sede_id para todos los belongsTO
	}

	public function materias() {
	    return $this->hasMany('Aliadas\materia'); //sede_id para todos los belongsTO
	}
}
