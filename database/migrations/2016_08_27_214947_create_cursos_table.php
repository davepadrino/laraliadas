<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cursos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre_curso');
			$table->date('incio_curso');
			$table->date('fin_curso');
			$table->string('tipo_curso');
			$table->string('estado_curso');
			$table->string('descripcion_curso');
			$table->nullableTimestamps();
			$table->integer('sede_id')->unsigned();
			$table->integer('user_id')->unsigned();

			$table->foreign('sede_id')
					->references('id')
					->on('sedes');
			$table->foreign('user_id')
					->references('id')
					->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cursos');
	}

}
