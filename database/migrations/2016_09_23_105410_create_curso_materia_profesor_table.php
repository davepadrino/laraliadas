<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoMateriaProfesorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('curso_materia_profesors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('curso_id');
			$table->integer('profesor_id');
			$table->integer('materia_id');
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
		Schema::drop('curso_materia_profesors');
	}

}
