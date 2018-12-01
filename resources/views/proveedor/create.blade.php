@include('layouts.app')
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proveedor</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

	<style>
		.badge {
			float: right;
		}
	</style>
</head>

<body>
	<div style="width:100%; max-width: 1100px; margin:0px auto;">
				@include('intranet.menu')
		   
				<div style="width:100%; max-width: 1100px; float: right; position:relative;">
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
    		<div  id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav" style="display: inline;">
					@can('proveedor')
					<li><a href="/proveedor">Todos</a></li>	
					@endcan
					@can('proveedor.create')
					<li class="active"><a href="/proveedor/create">Nuevo</a></li>	
					@endcan
        			
        			
        		</ul>
        	</div>
        </div>
    </nav>

	<div class="panel panel-success" style="margin-top:20px;">
  		<div class="panel-heading">
  			<h4>Ingresar Nuevo Proveedor</h4>
  		</div>

  		<div class="panel-body">
  			<form  action="{{ action('ProveedorController@store')}}" method="post">
					{{ csrf_field() }}
				<p>
					<input type="text" name="rut" placeholder="Rut" maxlength="9" minlength="9" class="form-control" onkeypress='return validaNumericos(event)' required>
				</p>
                <p>
                    <input type="text" name="nombre" placeholder="Nombre" maxlength="50" class="form-control" onkeypress='return validar(event)' required>
                </p>
			    <p>
					<input type="text" name="direccion" placeholder="Dirección" maxlength="50" class="form-control" required>
				</p>
				<p>
					<input type="text" name="ciudad" placeholder="Ciudad" maxlength="50" class="form-control" onkeypress='return validar(event)' required>
				</p>
				<p>
					<input type="text" name="telefono" placeholder="Telefono" maxlength="9" minlength="9" class="form-control" onkeypress='return validaNumericos(event)' >
				</p>
				<p>
					<input type="email" name="correo" placeholder="Correo" maxlength="50" class="form-control" >
				</p>
				<p>
						<input type="text" name="nom_contact" placeholder="Nombre Contacto" maxlength="30" class="form-control" >
					</p>
					<p>
							<input type="text" name="tel_contact" placeholder="Telefono Contacto" maxlength="9" minlength="9" class="form-control" onkeypress='return validaNumericos(event)'  >
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
</body>
<script type="text/javascript" src="{{ URL::asset('js/solo_num.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/solo_letras.js') }}"></script>
</html>