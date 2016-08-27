@extends('layouts.layout')
@section('title', 'Agregar Curso')
@section('content')
		<div class="row">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			</div>

			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<div>
					<h2> Crear Curso </h2>
				</div>
				<form action="add_alumn.html">
					<table id="form">
						<tr>
							<td>
								<label for = "nameCourse" >Nombre de Curso</label>
								<input type="text" class="form-control" name="nameCourse" placeholder="Nombre" required>
							</td>
						</tr>

						<tr>
							<td>
								<label for = "courseType" >Tipo de Curso</label>
								<select class="form-control" name = "courseType">
									<option value="" disabled selected="selected">Seleccione...</option>
									<option value="emprendedoras">Mujeres Emprendedoras</option>
									<option value="talleres">Escuela Taller</option>
									<option value="hacedoras">Mujeres Hacedoras</option>
								</select> 
							</td>
						</tr>
						<tr>
							<td>
								<label for = "startDate" >Fecha de Inicio</label>
		                        <span class="glyphicon glyphicon-calendar"></span>
			                    <input type='date' class="form-control" />
							</td>
						</tr>
						<tr>
							<td>
								<button type="submit" class="btn btn-primary"> Agregar Curso </button>
							</td>
						</tr>

					</table>
				</form>

			</div>

			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			</div>
		</div>
@stop