<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inventario</title>
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
	padding: 35px;"></div>
</head>
<body >
		<div style="width: 1100px; margin:20px auto;">
			<div style="width: 200px; float:left;  position:relative;">
			@include('intranet.menu')
			</div>    
		<div style="width: 850px; float: right; position:relative;">
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
    		<div id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
        			<li><a href="#">Todos</a></li>
        			<li><a href="#">Nuevo</a></li>
        		</ul>
        	</div>
        </div>
    </nav>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Información de inventario</h4>
  		</div>

  		<div class="panel-body">
  			@if(!@empty($inventario))
				<p>
						CODIGO : <strong>{{$inventario ->ID_INVENTARIO}}</strong>
					</p>
					<p>
						NOMBRE: <strong>{{$inventario ->NOMBRE}}</strong>
					</p>
					<p>
						MARCA: <strong>{{$inventario ->MARCA}}</strong>
					</p>
					<p>
						UBICACION: <strong>{{$inventario ->UBICACION}}</strong>
					</p>
					<p>
						VALOR: <strong>{{$inventario ->VALOR}}</strong>
					</p>
					<p>
						ESTADO: <strong>{{$inventario ->ESTADO}}</strong>
					</p>
	@else
					<p>No existe el inventario</p>
					@endif
        <a href="/inventario" class="btn btn-default">Regresar</a>
		</div>
	</div>
		</div>
		</div>
</body>
</html>