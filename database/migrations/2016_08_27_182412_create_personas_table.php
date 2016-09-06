<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre_persona');
			$table->integer('ci_persona');
			$table->string('genero_persona');
			$table->string('numero_telefonico_persona');
			$table->string('email_persona');
			$table->string('direccion_persona');
			$table->date('fecha_nacimiento_persona');
			$table->nullableTimestamps();
			$table->integer('materia_id')->unsigned();

			$table->foreign('materia_id')
					->references('id')
					->on('materias');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('personas');
	}

}
