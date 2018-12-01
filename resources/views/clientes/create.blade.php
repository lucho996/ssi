@extends('layouts.app')
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Clientes</title>

</head>

<body >
	@section('content')
	<div style="width:100%; max-width: 1100px; margin:0px auto;">
		
		@include('intranet.menu')
		  
	<div style="width:100%; max-width: 1100px; float: right; position:relative;">
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
    		<div id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav" style="display:inline; float:left;">
					@can('clientes')
					<li><a href="/clientes">Todos</a></li>
					@endcan
					@can('clientes.create')
					<li class="active"><a href="/clientes/create">Nuevo</a></li>
					@endcan
        		</ul>
        	</div>
        </div>
    </nav>

	<div class="panel panel-success" style="margin-top: 20px;">
  		<div class="panel-heading">
  			<h4>Nuevo Cliente</h4>
  		</div>

  		<div class="panel-body">
  			<form  action="{{ action('ClientesController@store')}}" method="post">
					{{ csrf_field() }}
				<p>
					<input type="text" name="rut" placeholder="Rut" class="form-control" onkeypress='return validaNumericos(event)' maxlength="9" minlength="9" required>
                </p>
                <p>
                    <input type="text" name="nombre" placeholder="Nombre" maxlength="50" class="form-control" onkeypress='return validar(event)' required>
                </p>
			    <p>
					<input type="text" name="direccion" placeholder="Dirección" maxlength="50" class="form-control" required>
                </p>	
                <p>
                    <input type="text" name="ciudad" placeholder="Ciudad" maxlength="50" class="form-control" onkeypress='return validar(event)'>
                </p>
                <p>
                    <input type="text" name="comuna" placeholder="Comuna" class="form-control" onkeypress='return validar(event)'>
                </p>
                <p>
                    <input type="text" name="giro" placeholder="Giro" class="form-control" onkeypress='return validar(event)' required>
                </p>
                <p>
					<input type="text" name="telefono" placeholder="Telefono" maxlength="9" minlength="9" class="form-control" onkeypress='return validaNumericos(event)'>

				</p>
				<p>
						<input type="text" name="nombre_contacto" placeholder="Nombre Contacto" maxlength="50" class="form-control" onkeypress='return validar(event)' required>
					</p>
				<p>
						<input type="text" name="telefono_contacto" placeholder="Telefono Contacto" maxlength="9" minlength="9" class="form-control" onkeypress='return validaNumericos(event)'>
	
					</p>
                <p>
                    <select name="tipo" style="height:30px ;" class="form-control" >

                                <option>Fijo</option>
                                
                                <option>Temporal</option>       
                    </select>
                </p>
                <p>
					<input type="submit" value="Guardar" class="btn btn-success">
				</p>
			</form>
		</div>
	</div>

	@if(Session::has('message'))
		<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
	</div>
	</div>
	@endsection
</body>
<script type="text/javascript" src="{{ URL::asset('js/solo_num.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/solo_letras.js') }}"></script>
</html>