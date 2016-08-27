@extends('layouts.layout')
@section('title', 'Editar Usuario')
@section('content')
<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			</div>

			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				<div>
					<h3> Editar Mi Usuario</h3>
				</div>
				<div class="row">
					<div class=" col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
					<div class=" col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<form action="principal.html">
							<table id="form">
								<tr>
				                    <td>
				                      	<label for="name">Nombre</label>
				                        <input type="text" class="form-control" name="name" value = "Nombre" required>
				                    </td>
				                </tr>
								<tr>
				                    <td>
				                      	<label for="email">Email</label>
				                        <input type="email" class="form-control" name="email" value = "usuario@dominio.com" readonly>
				                    </td>
				                </tr>				                
								<tr>
									<td>
										<label for="pass1">Escriba Contraseña actual</label>
										<input type="password" class="form-control" id= "currentPass" name="pass1">
									</td>
								</tr>
								<tr>
									<td>
										<label for="newPass1">Indique nueva contraseña</label>
										<input type="password" class="form-control" id="newPass1" name="newPass1">
									</td>
								</tr>
								<tr>
									<td>
										<label for="newPass2">Indique nuevamente Contraseña</label>
										<input type="password" class="form-control" id="newPass2" name="newPass2">
										<span id="confirmMessage">  </span>
									</td>
								</tr>
								<tr>
									<td>
										<button type="submit" class="btn btn-primary"> Aceptar </button>
									</td>
								</tr>
							</table>
						</form>
					</div>
					<div class=" col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
				</div>
			</div>
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			</div>
		</div>
@stop