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
			$table->string('sede_course');	
			$table->nullableTimestamps();
		});
	}
	public function curso() {
	    return $this->belongsToMany('Aliadas\materia');
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
