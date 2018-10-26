<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proveedor</title>

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
  			<h4>Información Proveedor</h4>
  		</div>

  		<div class="panel-body">
  			@if(!@empty($proveedor))
				<p>
						RUT : <strong>{{$proveedor ->RUT}}</strong>
					</p>
					<p>
						NOMBRE: <strong>{{$proveedor ->NOMBRE}}</strong>
					</p>
					<p>
						DIRECCIÒN: <strong>{{$proveedor ->DIRECCION}}</strong>
					</p>
					<p>
							CIUDAD: <strong>{{$proveedor ->CIUDAD}}</strong>
						</p>
						<p>
								TELEFONO: <strong>{{$proveedor ->TELEFONO}}</strong>
							</p>
							<p>
									CORREO: <strong>{{$proveedor ->CORREO}}</strong>
								</p>
	@else
	<p>No existe proveedor</p>
	@endif
	<p>
			<a href="/proveedor" class="btn btn-default">Regresar</a>
		</p>
		</div>
	</div>
		</div>
		</div>
</body>
</html>