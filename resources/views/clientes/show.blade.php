@extends('layouts.app')
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Clientes</title>
	

	<style>
		.badge {
			float: right;
		}
	</style>
</head>
<body>
<body >
	@section('content')
		

		<div style="width:100%; max-width: 1100px; margin:0px auto;">
					@include('intranet.menu')
		    
		<div style="width:100%; max-width: 1100px; float: right; position:relative;">

	<div class="panel panel-success" style="margin-top: 20px;">
  		<div class="panel-heading">
  			<h4>Información Cliente</h4>
  		</div>

  		<div class="panel-body">
		
				@if(!@empty($clientes))
				<div class="table-responsive">	
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td style="text-align:right;"><strong>Rut:</strong> </td>
					<td>{{$clientes ->RUT_CLIENTE}}</td>
					<td style="text-align:right;"><strong>Comuna:</strong> </td>
					<td>{{$clientes ->COMUNA}}</td>		
				</tr>
				<tr>
					<td style="text-align:right;"><strong>Nombre:</strong> </td>
					<td>{{$clientes ->NOMBRE_COMPLETO}}</td>
					<td style="text-align:right;"><strong>Giro:</strong> </td>
					<td>{{$clientes ->GIRO}}</td>		
				</tr>
				<tr>
					<td style="text-align:right;"><strong>Dirección:</strong> </td>
					<td>{{$clientes ->DIRECCION}}</td>
					<td style="text-align:right;"><strong>Telefono:</strong> </td>
					<td>{{$clientes ->TELEFONO}}</td>		
				</tr>
				<tr>
					<td style="text-align:right;"><strong>Ciudad:</strong> </td>
					<td>{{$clientes ->CIUDAD}}</td>
					<td style="text-align:right;"><strong>Tipo:</strong> </td>
					<td>{{$clientes ->TIPO}}</td>		
				</tr>
			</tbody>
		</table>
	</div>
		@else
		<p>No existe el cliente</p>		
		@endif

        <a href="/clientes" class="btn btn-default">Regresar</a>
		</div>
	</div>
		</div>
		</div>
		@endsection
</body>
</html>