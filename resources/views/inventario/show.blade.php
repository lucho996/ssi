@include('layouts.app')
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

</head>
<body >
		<div style="width: 1100px; margin:0px auto;">
			<div style="width: 200px; float:left;  position:relative;">
			@include('intranet.menu')
			</div>    
		<div style="width: 850px; float: right; position:relative;">

	<div class="panel panel-success" style="margin-top:20px;">
  		<div class="panel-heading">
  			<h4>Información de inventario</h4>
  		</div>

  		<div class="panel-body">
			  @if(!@empty($inventario))
			  

		<table class="table table-bordered">
			<tbody>
					<tr>
						<td style="text-align:right;"><strong>Codigo:</strong> </td>
						<td>{{$inventario ->ID_INVENTARIO}}</td>
						<td style="text-align:right;"><strong>Ubicación:</strong> </td>
						<td>{{$inventario ->UBICACION}}</td>	
					</tr>
					<tr>
						<td style="text-align:right;"><strong>Nombre:</strong> </td>
						<td>{{$inventario ->NOMBRE}}</td>
						<td style="text-align:right;"><strong>Valor:</strong> </td>
						<td>{{$inventario ->VALOR}}</td>	
					</tr>
					<tr>
						<td style="text-align:right;"><strong>Marca:</strong> </td>
						<td>{{$inventario ->MARCA}}</td>
						<td style="text-align:right;"><strong>Estado:</strong> </td>
						<td>{{$inventario ->ESTADO}}</td>	
					</tr>
			</tbody>
		</table>

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