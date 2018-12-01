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

<body>
<body >
		<div style="width:100%; max-width: 1100px; margin:20px auto;">
					@include('intranet.menu')
		   
		<div style="width:100%; max-width:1100px; float: right; position:relative;">
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
				
				@if(!@empty($user))
				<p>
					RUT: <strong>{{$user ->name}}</strong>
				</p>
				<p>
					NOMBRE: <strong>{{$user ->email}}</strong>
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