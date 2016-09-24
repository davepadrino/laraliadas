<?php namespace Aliadas;

use Illuminate\Database\Eloquent\Model;

class curso extends Model {

	//
	protected $table = 'cursos';
	protected $fillable = ['nombre_curso', 'incio_curso', 'fin_curso','tipo_curso','estado_curso','descripcion_curso', 'sede_id', 'user_id'];
	
	public function sede() {
	    return $this->belongsTo('Aliadas\sede'); //sede_id para todos los belongsTO
	}

	public function user() {
	    return $this->belongsTo('Aliadas\user'); //user_id para todos los belongsTO
	}

	public function materias() {
        return $this->belongsToMany('Aliadas\materia', 'curso_materia', 'curso_id', 'materia_id');
    }

	public function personas()
    {
        return $this->belongsToMany('Aliadas\persona','curso_persona', 'curso_id', 'persona_id');
    }

	public function profesors() {
    	return $this->belongsToMany('Aliadas\profesor', 'curso_profesor', 'curso_id', 'profesor_id');
    }  

}
