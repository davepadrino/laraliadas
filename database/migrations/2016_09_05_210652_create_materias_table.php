<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('materias', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre_materia');
			$table->nullableTimestamps();
		});
	}

	public function curso() {
	    return $this->belongsToMany('Aliadas\curso');
	}

	public function profesor() {
	    return $this->belongsToMany('Aliadas\profesor');
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('materias');
	}

}
