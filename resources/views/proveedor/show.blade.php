@include('layouts.app')
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

</head>
<body >
		<div style="width:100%; max-width: 1100px; margin:0px auto;">
			@include('intranet.menu')
		   
		<div style="width:100%; max-width: 1100px; float: right; position:relative;">


	<div class="panel panel-success" style="margin-top: 20px;">
  		<div class="panel-heading">
  			<h4>Información Proveedor</h4>
  		</div>

  		<div class="panel-body">
			  @if(!@empty($proveedor))
			  <div class="table-responsive">	
			  <table class="table table-bordered">
				  <tbody>
					<tr>
						<td style="text-align:right;"><strong>Rut:</strong> </td>
						<td>{{$proveedor->RUT}}</td>
						<td style="text-align:right;"><strong>Nombre:</strong> </td>
						<td>{{$proveedor->NOMBRE}}</td>
					</tr>
					<tr>
							<td style="text-align:right;"><strong>Dirección:</strong> </td>
						<td>{{$proveedor->DIRECCION}}</td>
						<td style="text-align:right;"><strong>Ciudad:</strong> </td>
						<td>{{$proveedor->CIUDAD}}</td>
						
					</tr>
					<tr>
							<td style="text-align:right;"><strong>Telefono:</strong> </td>
						<td>{{$proveedor->TELEFONO}}</td>
						<td style="text-align:right;"><strong>Correo:</strong> </td>
						<td>{{$proveedor->CORREO}}</td>
						
					</tr>
				  </tbody>
			  </table>
			  </div>
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