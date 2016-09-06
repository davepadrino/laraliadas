<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profesors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre_profesor');
			$table->integer('ci_profesor');
			$table->string('numero_telefonico_profesor');
			$table->string('email_profesor');
			$table->nullableTimestamps();
		});
	}
	public function materia() {
	    return $this->belongsToMany('Aliadas\materia', 'sede');
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profesors');
	}

}
