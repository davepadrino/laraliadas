<?php namespace Aliadas;

use Illuminate\Database\Eloquent\Model;

class profesor extends Model {
	protected $table = 'profesors';
	protected $fillable = ['nombre_profesor', 'ci_profesor', 'numero_telefonico_profesor','email_profesor'];
}
