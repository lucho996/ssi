<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Clientes</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

	<style>
		.badge {
			float: right;
		}
	</style>
</head>
<div style="width: 1100px;
margin: 0px auto;
background: #cccccc;
padding: 35px;">
</div>
<body>
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
  			<h4>Información Cliente</h4>
  		</div>

  		<div class="panel-body">
				
				@if(!@empty($clientes))
				<p>
					RUT: <strong>{{$clientes ->RUT_CLIENTE}}</strong>
				</p>
				<p>
					NOMBRE: <strong>{{$clientes ->NOMBRE_COMPLETO}}</strong>
				</p>
				<p>
					DIRECCION: <strong>{{$clientes ->DIRECCION}}</strong>
				</p>
				<p>
					CIUDAD: <strong>{{$clientes ->CIUDAD}}</strong>
				</p>
				<p>
					COMUNA: <strong>{{$clientes ->COMUNA}}</strong>
				</p>
				<p>
					GIRO: <strong>{{$clientes ->GIRO}}</strong>
				</p>
				<p>
					Telefono: <strong>{{$clientes ->TELEFONO}}</strong>
				</p>
				<p>
					Tipo: <strong>{{$clientes ->TIPO}}</strong>
				</p>

		@else
		<p>No existe el cliente</p>		
		@endif
        <a href="/clientes" class="btn btn-default">Regresar</a>
		</div>
	</div>
		</div>
		</div>
</body>
</html>