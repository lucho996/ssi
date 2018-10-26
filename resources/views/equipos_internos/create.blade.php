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
	<div style="width: 1100px;
	margin: 0px auto;
	background: #cccccc;
	padding: 35px;">
	</div>
</head>
<body>
		<div style="width: 1100px; margin:20px auto;">
				<div style="width: 200px; float:left; position:relative;">
				@include('intranet.menu')
				</div>    
				<div style="width: 850px; float: right; position:relative;">
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
    		<div id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
        			<li><a href="/equipos_internos">Todos</a></li>
        			<li class="active"><a href="/equipos_internos/create">Nuevo</a></li>
        		</ul>
        	</div>
        </div>
    </nav>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Agregar equipos a utilizar</h4>
  		</div>

  		<div class="panel-body">
  			<form  action="{{ action('Equipo_internoController@store')}}" method="post">
					{{ csrf_field() }}
					<p>
					<select class="form-control" name="producto">
							@foreach($producto as $producto)
								<option value="{{$producto->ID_PRODUCTO}}">{{$producto->DESCRIPCION}}</option>
							@endforeach

						</select>
					</p>
					<p>
							<select class="form-control" name="inventario">
									@foreach($inventario as $inventario)
										<option value="{{$inventario->ID_INVENTARIO}}">{{$inventario->NOMBRE}}</option>
									@endforeach
		
								</select>
							</p>	
				<p>
					<input type="text" name="cantidad" placeholder="Cantidad de dias a utilizar" maxlength="9" class="form-control" onkeypress='return validaNumericos(event)' required>
                <p>
                    <input type="text" name="valor" placeholder="Total" disabled maxlength="9" class="form-control" onkeypress='return validaNumericos(event)' required>
                </p>

                <p>
					<input type="submit" value="Guardar" class="btn btn-success">
					<input type="submit" value="Calcular" class="btn btn-success">
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