@extends('layouts.admin_layout')
@section('content')	
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
	<div>
		<h2> Administrar Sedes </h2>
	</div>
	<div class="row">
		<div id = "addSede" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div>
				<div>
					<h3> Crear Sede</h3>
				</div>
			{!! Form::open(['route'=>'sedes.store', 'method'=>'post'])!!}
				<table id="form">
					<tr>
                        <td>
							{!! Form::label('Nombre')!!}
							{!! Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Nombre'])!!}
                        </td>
                    </tr>		                    
                   	<tr>
                        <td>
                        	{!! Form::label('Ciudad')!!}
                        	{!! Form::select('city',
								array(
								'Caracas' => 'Caracas',
								'Valencia' => 'Valencia',
								'Maracaibo' => 'Maracaibo',
								'Barquisimeto' => 'Barquisimeto',
								'General' => 'General'), null, ['class'=>'form-control', 'id'=>'city']
                        	)!!}
                        </td>
                    </tr>				                  
                    <tr>
                        <td>
				            <div class="addField">
								{!! Form::submit('Crear Sede', ['class'=>'btn btn-success'])!!}
					            </div>
	                        </td>
                    </tr>				                    
            	</table>
				{!! Form::close() !!}
			</div>						
		</div>
		<div id = "showSede" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div>
			    <h1>Sedes</h1>
			        <table class="table table-striped table-hover" >
			            <thead>
			                <th class="text-center">Sede</th>
			                <th class="text-center">Ciudad</th>
			                <th class="text-center">Editar</th>
			                <th class="text-center">Eliminar</th>
			            </thead>
						@foreach($sedes as $sede)
			            <tbody>
			                <td class="text-center">{{ $sede->nombre_sede }}</td>
			                <td class="text-center">{{ $sede->ciudad_sede}}</td>
			                <td class="text-center"><button id ="edit" class="btn glyphicon glyphicon-pencil btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalSede{{$sede->id}}" data-id="{{ $sede->id }}" data-name="{{ $sede->name }}" data-email="{{ $sede->city }}"></button></td>                
						    <td class="text-center"><button class="btn glyphicon glyphicon-remove btn-danger btn-sm" type="button" data-toggle="modal" data-target="#modalDeleteSede{{$sede->id}}" ></button></td>
					    </tbody>
						@endforeach 
					</table>					
			</div>
		</div>	<!-- Final Show Sedes -->
		<!-- Inicio Modal Edicion -->
	@foreach($sedes as $sede)
	<div id="modalSede{{$sede->id}}" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				    <h4 class="modal-title">Editar Sede: {{ $sede-> nombre_sede }}</h4>
				</div>
				<div class="modal-body">
				{!! Form::model($sede,['route'=> ['sedes.update',$sede->id], 'method'=>'put'])!!}
					{!! Form::label('Nombre')!!}
					{!! Form::text('nombre_sede',null,['class'=>'form-control', 'placeholder'=>'Nombre'])!!}

                   	{!! Form::label('Ciudad')!!}
                   	{!! Form::select('ciudad_sede',
						array(
						'Caracas' => 'Caracas'), null, ['class'=>'form-control', 'id'=>'ciudad_sede']
                     	)!!}
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
		<!-- Inicio Modal de borrado -->
		@foreach($sedes as $sede)
		<div id="modalDeleteSede{{$sede->id}}" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
			        <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title">Eliminar Sede: {{ $sede-> nombre_sede }}</h4>
			        </div>
				      {!! Form::open(['route'=> ['sedes.update',$sede->id], 'method'=>'delete'])!!}
			    	<div class="modal-body">
					    ¿Desea eliminar la sede "{{ $sede-> nombre_sede }}"?
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
@stop