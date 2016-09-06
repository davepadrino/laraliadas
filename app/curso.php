<?php namespace Aliadas;

use Illuminate\Database\Eloquent\Model;

class curso extends Model {

	//
	protected $table = 'cursos';
	protected $fillable = ['nombre_curso', 'incio_curso', 'fin_curso','tipo_curso','estado_curso','descripcion_curso', 'sede_curso'];

}
