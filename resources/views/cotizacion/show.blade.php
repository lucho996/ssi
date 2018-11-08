@include('layouts.app')
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

</head>
<body >
		<div style="width: 1100px; margin:0px auto;">
			<div style="width: 200px; float:left;  position:relative;">
			@include('intranet.menu')
			</div>    
		<div style="width: 850px; float: right; position:relative;">

	<div class="panel panel-success" style="margin-top: 20px;">
  		<div class="panel-heading">
  			<h4>Información Cotizaciòn</h4>
  		</div>

  		<div class="panel-body">
			  
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td style="text-align:right;"><strong>Cliente:</strong> </td>
							<td>{{$cotizacion ->RUT_CLIENTE}}</td>
							<td style="text-align:right;"><strong>Fecha Limite Respuesta:</strong> </td>
							<td>{{$cotizacion ->FECHA_RESPUESTA_COTIZACION}}</td>	
						</tr>
						<tr>
							<td style="text-align:right;"><strong>Codigo Petición:</strong> </td>
							<td>{{$cotizacion ->COD_PETICION_OFERTA}}</td>
							<td style="text-align:right;"><strong>Descripción:</strong> </td>
							<td>{{$cotizacion ->DESCRIPCION}}</td>	
						</tr>
						<tr>
							<td style="text-align:right;"><strong>Fecha de Ingreso:</strong> </td>
							<td>{{$cotizacion ->FECHA_LLEGADA}}</td>
							<td style="text-align:right;"><strong>Estado:</strong> </td>
							<td>{{$cotizacion ->ESTADO}}</td>	
						</tr>
					</tbody>
				</table>


								

        <a href="/cotizacion" class="btn btn-default">Regresar</a>
		</div>
	</div>
		</div>
		</div>
</body>
</html>