<?php namespace Aliadas;

use Illuminate\Database\Eloquent\Model;

class persona extends Model {

	//
	protected $table = 'personas';
	protected $fillable = ['nombre_persona', 'ci_persona', 'genero_persona','numero_telefonico_persona','email_persona','direccion_persona', 'fecha_nacimiento_persona', 'materia_id'];
	
	public function materias()
    {
        return $this->hasMany('Aliadas\materias');
    }

}
