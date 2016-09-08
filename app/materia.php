<?php namespace Aliadas;

use Illuminate\Database\Eloquent\Model;

class materia extends Model {

	protected $table = 'materias';
	protected $fillable = ['nombre_materia', 'user_id'];
	
	public function user() {
	    return $this->belongsTo('Aliadas\user'); //user_id para todos los belongsTO
	}

	public function cursos() {
    	return $this->belongsToMany('Aliadas\curso', 'curso_materia', 'materia_id', 'curso_id');
    }

	public function profesors() {
    	return $this->belongsToMany('Aliadas\profesor', 'materia_profesor', 'materia_id', 'profesor_id');
    }  
	
	public function personas() {
	    return $this->belongsToMany('Aliadas\persona','materia_persona', 'materia_id', 'persona_id'); //user_id para todos los belongsTO
	}  
}
