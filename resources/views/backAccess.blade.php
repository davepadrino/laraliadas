@extends('layouts.index_layout')
@section('title', 'Acceso ')
@section('content')
<div class="login col-xs-8 col-sm-6 col-md-6 col-lg-4">
	{!! Form::open(['route'=>'backAccessXyZ.store', 'method'=>'post'])!!}
	<table id="form">
			<tr>
                <td>
					{!! Form::label('Nombre')!!}
					{!! Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Nombre'])!!}
                </td>
            </tr>		                    
           	<tr>
                <td>
                	{!! Form::label('Correo Electrónico')!!}
					{!! Form::text('email',null,['class'=>'form-control', 'placeholder'=>'correo@dominio.com'])!!}
                </td>
            </tr>
            <tr>
                <td>
                	{!! Form::label('Contraseña')!!}
					{!! Form::password('password',['class'=>'form-control', 'placeholder'=>'*******'])!!}				
                </td>
            </tr>
            <tr>
                <td>
                	{!! Form::label('Rol')!!}
                	{!! Form::select('rol',
						array(
						'Administrador' => 'Administrador',), null, ['class'=>'form-control','placeholder'=>'seleccione']
                	)!!}
                </td>
            </tr>	
            <tr>
                <td>
                	{!! Form::label('Sede')!!}					
					{!! Form::select('sede',
						$data, 
						 null, ['class'=>'form-control', 'id'=>'sede']
                	)!!}
                </td>
            </tr>				                    		                    
            <tr>
                <td>
		            <div class="addField">
					{!! Form::submit('Crear Usuario', ['class'=>'btn btn-success'])!!}
		            </div>
                </td>
            </tr>				                    
    </table>
	{!! Form::close() !!}
</div>
@stop