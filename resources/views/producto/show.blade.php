<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Producto</title>

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
  			<h4>Información Producto</h4>
  		</div>

  		<div class="panel-body">
  			
				<p>
					ID: <strong>{{$producto ->ID_PRODUCTO}}</strong>
					</p>
					<p>
					DESCRIPCIÓN: <strong>{{$producto ->DESCRIPCION}}</strong>
					</p>
					<p>
					TIPO: <strong>{{$producto ->TIPO_PRODUCTO}}</strong>
					</p>
					<p>
					PLANO: <strong><a href="/planos/{{$producto->PLANO_PRODUCTO }}"><img src="/images/png/pdf.png" style="width:30px;" alt=""></a></strong>
						</p>
						<p>
					FECHA DE ENTREGA: <strong>{{$producto ->FECHA_DE_ENTREGA_PRODUCTO}}</strong>
							</p>
							<p>
					ESTADO: <strong>{{$producto ->ESTADO}}</strong>
								</p>
								<a href="javascript:history.back(-1);" class="btn btn-default" title="Ir la página anterior">Regresar</a>
		</div>
	</div>
		</div>
		</div>
</body>
</html>