<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriaPersonaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('materia_persona', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('materia_id');
			$table->integer('persona_id');
			$table->string('calificacion');
			$table->string('asistencia');
			$table->string('area_proyecto');
				
			$table->nullableTimestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('materia_persona');
	}

}
