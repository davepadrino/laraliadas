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
			$table->string('email_profesor')->unique();
			$table->nullableTimestamps();
			$table->integer('user_id')->unsigned();

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
		Schema::drop('profesors');
	}

}
