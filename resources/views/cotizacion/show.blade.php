<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cotizaciones</title>

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
  			<h4>Información Cotizaciòn</h4>
  		</div>

  		<div class="panel-body">
  			
				<p>
					CLIENTE : <strong>{{$cotizacion ->RUT_CLIENTE}}</strong>
					</p>
					<p>
						COD. PETICIÒN: <strong>{{$cotizacion ->COD_PETICION_OFERTA}}</strong>
					</p>
					<p>
						FECHA DE COTIZACIÒN: <strong>{{$cotizacion ->FECHA_LLEGADA}}</strong>
					</p>
					<p>
							FECHA LIMITE DE RESPUESTA: <strong>{{$cotizacion ->FECHA_RESPUESTA_COTIZACION}}</strong>
						</p>
						<p>
								DESCRIPCIÒN: <strong>{{$cotizacion ->DESCRIPCION}}</strong>
							</p>
							<p>
									ESTADO: <strong>{{$cotizacion ->ESTADO}}</strong>
								</p>
								

        <a href="/cotizacion" class="btn btn-default">Regresar</a>
		</div>
	</div>
		</div>
		</div>
</body>
</html>