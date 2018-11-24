@extends('layouts.app')
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
	@section('content')
		

		<div style="width: 1100px; margin:0px auto;">
			<div style="width: 200px; float:left;  position:relative;">
					@include('intranet.menu')
			</div>    
		<div style="width: 850px; float: right; position:relative;">

	<div class="panel panel-success" style="margin-top: 20px;">
  		<div class="panel-heading">
  			<h4>Información Cliente</h4>
  		</div>

  		<div class="panel-body">
				
				@if(!@empty($convenio))

		<table class="table table-bordered">
			<tbody>
					<thead>
							<td style="text-align:right;"><strong>NOMBRE PERSONA A CARGO:</strong> </td>
							<td style="text-align:right;"><strong>Rut:</strong> </td>
							<td style="text-align:right;"><strong>Rut:</strong> </td>
							<td style="text-align:right;"><strong>Rut:</strong> </td>
							<td style="text-align:right;"><strong>Rut:</strong> </td>
							<td style="text-align:right;"><strong>Rut:</strong> </td>>
							<td style="text-align:right;"><strong>Rut:</strong> </td>
							<td style="text-align:right;"><strong>Rut:</strong> </td>
							<td style="text-align:right;"><strong>Rut:</strong> </td>
							   <!--<input type="button" value="Agregar" class="addRow"/>-->
						   
					   </thead>
				<tr>
					
					
					<td>{{$convenio->NOMBRE_PERSONA_ACARGO}}</td>
					<td>{{$convenio->FECHA_INICIO}}</td>
					<td>{{$convenio->FECHA_TERMINO}}</td>
					<td>{{$convenio->TOTAL}}</td>
					<td>{{$convenio->NETO}}</td>
					<td>{{$convenio->N_CONVENIO}}</td>
					<td>{{$convenio->FECHA_EMISION}}</td>
					<td>{{$convenio->CONDICION_PAGO}}</td>
					<td>{{$convenio->NUMERO_PERSONA}}</td>
					<td>{{$convenio->CORREO_PERSONA}}</td>

			
			</tbody>
		</table>

		@else
		<p>No existe el cliente</p>		
		@endif
        <a href="/convenio" class="btn btn-default">Regresar</a>
		</div>
	</div>
		</div>
		</div>
		@endsection
</body>
</html>