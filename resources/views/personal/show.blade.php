<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Personal</title>

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
  			<h4>Información Personal</h4>
  		</div>

  		<div class="panel-body">
  			
				<p>
						RUT : <strong>{{$personal ->RUTP}}</strong>
					</p>
					<p>
						NOMBRE: <strong>{{$personal ->NOMBREP}}</strong>
					</p>
					<p>
						APELLIDO: <strong>{{$personal ->APELLIDOP}}</strong>
					</p>
					<p>
							TELEFONO: <strong>{{$personal ->TELEFONOP}}</strong>
						</p>
						<p>
								CORREO: <strong>{{$personal ->CORREOP}}</strong>
							</p>
							<p>
									HORA HOMBRE: <strong>{{$personal ->HORAHOMBRE}}</strong>
								</p>
								<p>
										FECHA NACIMIENTO: <strong>{{$personal ->FECHANACIMIENTO}}</strong>
									</p>
									<p>
											DIRECCIÒN: <strong>{{$personal ->DIRECCION}}</strong>
										</p>
										<p>
												TIPO: <strong>{{$personal ->TIPO}}</strong>
											</p>

        <a href="/personal" class="btn btn-default">Regresar</a>
		</div>
	</div>
		</div>
		</div>
</body>
</html>