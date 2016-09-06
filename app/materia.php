<?php namespace Aliadas;

use Illuminate\Database\Eloquent\Model;

class materia extends Model {

	protected $table = 'materias';
	protected $fillable = ['nombre_materia'];
}
