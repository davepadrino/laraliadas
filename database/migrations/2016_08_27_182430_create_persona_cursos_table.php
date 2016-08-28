<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaCursosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('persona_cursos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('curso_id')->unsigned();
			$table->foreign('curso_id')->references('id')->on('cursos'); 
			$table->integer('persona_id')->unsigned();
			$table->foreign('persona_id')->references('id')->on('personas');
			$table->integer('nota_final');
			$table->string('proyecto_final');
			$table->string('observacion');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('persona_cursos');
	}

}
