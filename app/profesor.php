<?php namespace Aliadas;

use Illuminate\Database\Eloquent\Model;

class profesor extends Model {
	protected $table = 'profesors';
	protected $fillable = ['nombre_profesor', 'ci_profesor', 'numero_telefonico_profesor','email_profesor', 'user_id'];
	
	public function user() {
	    return $this->belongsTo('Aliadas\user'); //user_id para todos los belongsTO
	}

	public function materia() {
    	return $this->belongsToMany('Aliadas\materia', 'materia_profesor', 'profesor_id', 'materia_id');
    }
}
