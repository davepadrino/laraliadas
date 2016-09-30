<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoPersonaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('curso_persona', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('curso_id');
			$table->integer('persona_id');
			$table->string('nota_final');
			$table->string('asistencia');
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
		Schema::drop('curso_persona');
	}

}
