<?php namespace Aliadas;

use Illuminate\Database\Eloquent\Model;

class sede extends Model {

	//
	protected $table = 'sedes';
	protected $fillable = ['nombre_sede', 'ciudad_sede'];

	public function user()
    {
        return $this->hasMany('Aliadas\user');
    }

}
