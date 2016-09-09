@extends('layouts.layout')
@section('title', 'Materias')
@section('content')
			<!-- Validar Errores en el servidor-->
				@include('alerts.request')
				<!-- mensaje de creacion de usuario-->
				@if(Session::has('flash_message'))
				    <div class="alert alert-success alert-dismissible" role="alert">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					       {{ Session::get('flash_message') }}
					</div>

				@endif
				<!-- mensaje de edicion de usuario-->
				@if(Session::has('message'))
				    <div class="alert alert-success alert-dismissible" role="alert">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					       {{ Session::get('message') }}
					</div>
				@endif
				<div>
					<h2> Administrar Materias </h2>
				</div>
				<div class="row">
					<div id = "addMats" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div>
							<div>
								<h3> Crear Materia</h3>
							</div>
						{!! Form::open(['route'=>'materias.store', 'method'=>'post'])!!}
							<table id="form">
									<tr>
				                        <td>
											{!! Form::label('Nombre')!!}
											{!! Form::text('nombre_materia',null,['class'=>'form-control', 'placeholder'=>'Nombre'])!!}
				                        </td>
				                    </tr>		                                        
				                    <tr>
				                        <td>
								            <div class="addField">
											{!! Form::submit('Crear Materia', ['class'=>'btn btn-success'])!!}
								            </div>
				                        </td>
				                    </tr>				                    
				            </table>
						{!! Form::close() !!}
				        </div>
						
					</div>
					<div id = "showMats" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						 <div>
						    <h1>Materias</h1>
						        <table class="table table-striped table-hover" >
							            <thead>
							                <th class="text-center">Nombre</th>
							                <th class="text-center">Editar</th>
							                <th class="text-center">Eliminar</th>
							            </thead>
									@foreach($mats as $mat)
						            <tbody>
						                <td class="text-center">{{ $mat->nombre_materia }}</td>
						                <td class="text-center"><button id ="edit" class="btn glyphicon glyphicon-pencil btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalMate{{$mat->id}}" data-id="{{ $mat->id }}" ></button></td>
						                <td class="text-center"><button class="btn glyphicon glyphicon-remove btn-danger btn-sm" type="button" data-toggle="modal" data-target="#modalDeleteMate{{$mat->id}}" ></button></td>
						            </tbody>
									@endforeach 
						        </table>
						        {!! $mats->render() !!}
								@foreach($mats as $mat)
								<div id="modalMate{{$mat->id}}" class="modal fade" tabindex="-1" role="dialog">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title">Editar Usuario: {{ $mat-> nombre_materia}}</h4>
									      </div>
									      <div class="modal-body">
									      {!! Form::model($mat,['route'=> ['materias.update',$mat->id], 'method'=>'put'])!!}

									      		{!! Form::label('Nombre')!!}
												{!! Form::text('nombre_materia',$mat->nombre_materia,['class'=>'form-control'])!!}
										
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									        {!! Form::submit('Editar', ['class'=>'btn btn-primary'])!!}
									        
									      </div>
									     {!! Form::close() !!}
									    </div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- /.modal -->	
								@endforeach	

								@foreach($mats as $mat)
								<div id="modalDeleteMate{{$mat->id}}" class="modal fade" tabindex="-1" role="dialog">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title">Eliminar Materia: {{ $mat-> nombre_materia }}</h4>
									      </div>
									      {!! Form::open(['route'=> ['materias.update',$mat->id], 'method'=>'delete'])!!}
									      <div class="modal-body">
									      ¿Desea eliminar el Materia?
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									        {!! Form::submit('Eliminar', ['class'=>'btn btn btn-danger'])!!}
									        
									      </div>
									     {!! Form::close() !!}
									    </div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- /.modal -->	
								@endforeach							
						    </div>
					</div>
				</div>	
@stop