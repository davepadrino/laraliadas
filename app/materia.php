<?php namespace Aliadas;

use Illuminate\Database\Eloquent\Model;

class materia extends Model {

	protected $table = 'materias';
	protected $fillable = ['nombre_materia', 'user_id'];
	
	public function user() {
	    return $this->belongsTo('Aliadas\user'); //user_id para todos los belongsTO
	}

	public function curso() {
    	return $this->belongsToMany('Aliadas\curso', 'curso_materia', 'materia_id', 'curso_id');
    }

	public function profesor() {
    	return $this->belongsToMany('Aliadas\profesor', 'materia_profesor', 'materia_id', 'profesor_id');
    }  
	
	public function persona() {
	    return $this->belongsTo('Aliadas\persona'); //user_id para todos los belongsTO
	}  
}
