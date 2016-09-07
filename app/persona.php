<?php namespace Aliadas;

use Illuminate\Database\Eloquent\Model;

class persona extends Model {

	//
	protected $table = 'personas';
	protected $fillable = ['nombre_persona', 'ci_persona', 'genero_persona','numero_telefonico_persona','email_persona','direccion_persona', 'fecha_nacimiento_persona'];
	
	public function materias()
    {
        return $this->belongsToMany('Aliadas\materias','materia_persona', 'persona_id', 'materia_id');
    }

}
