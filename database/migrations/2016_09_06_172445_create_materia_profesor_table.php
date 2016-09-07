<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriaProfesorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('materia_profesor', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('materia_id');
			$table->integer('profesor_id');


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('materia_profesor');
	}

}
