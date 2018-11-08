@include('layouts.app')
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Productos</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

	<style>
		.badge {
			float: right;
		}
	</style>
</head>
<body>
		<div style="width: 1100px; margin:0px auto;">
				<div style="width: 200px; float:left; position:relative;">
				@include('intranet.menu')
				</div>    
				<div style="width: 850px; float: right; position:relative;">
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
    		<div id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav" style="display: inline;">
				@can('inventario')
				
					<li><a href="/inventario">Todos</a></li>
					@endcan
					@can('inventario.create')
        			<li class="active"><a href="/inventario/create">Nuevo</a></li>
					@endcan
				</ul>
        	</div>
        </div>
    </nav>

	<div class="panel panel-success" style="margin-top:20px;">
  		<div class="panel-heading">
  			<h4>Nuevo Equipo y/o Herramienta</h4>
  		</div>

  		<div class="panel-body">
  			<form  action="{{ action('InventarioController@store')}}" method="post">
					{{ csrf_field() }}
                <p>
                    <input type="text" name="nombre" placeholder="Nombre" maxlength="50" class="form-control" onkeypress='return validar(event)' required>
                </p>
			    <p>
					<input type="text" name="marca" placeholder="Marca" maxlength="50" class="form-control" onkeypress='return validar(event)' required>
                </p>	
				<p>
					<select name="ubicacion" style="height:35px ;" class="form-control" >
						<option>Taller Abastible</option>
						<option>Taller Petroquim</option>
						<option>Taller</option>          
					</select>
				</p>

                <p>
                    <input type="text" name="valor" placeholder="Valor" maxlength="9" class="form-control" onkeypress='return validaNumericos(event)' required>
                </p>

                <p>
                    <select name="estado" style="height:35px ;" class="form-control" >
                                <option>Defectuoso</option>
								<option>En uso</option>
								<option>Disponible</option>        
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
</body>
<script type="text/javascript" src="{{ URL::asset('js/solo_num.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/solo_letras.js') }}"></script>
</html>