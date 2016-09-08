<?php namespace Aliadas;

use Illuminate\Database\Eloquent\Model;

class persona extends Model {

	//
	protected $table = 'personas';
	protected $fillable = ['nombre_persona', 'ci_persona', 'genero_persona','numero_telefonico_persona','email_persona','direccion_persona', 'fecha_nacimiento_persona'];
	
	public function materias()
    {
        return $this->belongsToMany('Aliadas\materia','materia_persona', 'persona_id', 'materia_id');
    }

	public function cursos()
    {
        return $this->belongsToMany('Aliadas\curso','curso_persona', 'persona_id', 'curso_id');
    }

}
