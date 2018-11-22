@include('layouts.app')
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

</head>
<body >
		<div style="width: 1100px; margin:0px auto;">
			<div style="width: 200px; float:left;  position:relative;">
			@include('intranet.menu')
			</div>    
		<div style="width: 850px; float: right; position:relative;">


	<div class="panel panel-success" style="margin-top:20px ;">
  		<div class="panel-heading">
  			<h4>Información Producto</h4>
  		</div>

  		<div class="panel-body">
			<table class="table table-bordered">
			<tbody>
			<tr>

				<td style="text-align:right;"><strong>Descripción:</strong> </td>
				<td>{{$producto->DESCRIPCION}}</td>
				<td style="text-align:right;"><strong>Tipo de Producto:</strong> </td>
				<td>{{$producto->TIPO_PRODUCTO}}</td>
			</tr>
			<tr>
					<td style="text-align:right;"><strong>Fecha de entrega:</strong> </td>
					<td>{{$producto->FECHA_DE_ENTREGA_PRODUCTO}}</td>
					<td style="text-align:right;"><strong>Estado:</strong> </td>
					<td>{{$producto->ESTADO}}</td>
				</tr>
			<tr>
				@if($producto->PLANO_PRODUCTO != null)
				<td style="text-align:right;"><strong>Plano del Producto:</strong> </td>
				<td><a href="/planos/{{$producto->PLANO_PRODUCTO }}"><img src="/images/png/pdf.png" style="width:30px;" alt=""></a></td>
				@else 
				<td style="text-align:right;"><strong>Plano del Producto:</strong> </td>
				<td><em>Sin Plano</em></td>
				@endif
				<td style="text-align:right;"><strong>Cod Sap:</strong> </td>
				<td>{{$producto->CODIGO_SAP}}</td>				
			</tr>
			
			

	
			</tbody>	
			</table> 
			
			<table class="table table-bordered">
					<tbody>
					
					<tr>
							@if($producto->GASTOS_GENERALES != null)
							<td style="text-align:right;"><strong>Gastos Generales:</strong> </td>
							<td>${{$producto->GASTOS_GENERALES }}</td>
							@else 
							<td style="text-align:right;"><strong>Gastos Generales:</strong> </td>
							<td><em>Sin Cotizar</em></td>
							@endif
		
							@if($producto->UTILIDADES != null)
							<td style="text-align:right;"><strong>Utilidades:</strong> </td>
							<td>${{$producto->UTILIDADES }}</td>
							@else 
							<td style="text-align:right;"><strong>Utilidades:</strong> </td>
							<td><em>Sin Cotizar</em></td>
							@endif
							
						</tr>
						<tr>
								@if($producto->TOTAL != null)
								<td style="text-align:right;"><strong>Total:</strong> </td>
								<td>${{$producto->TOTAL }}</td>
								@else 
								<td style="text-align:right;"><strong>Total:</strong> </td>
								<td><em>Sin Cotizar</em></td>
								@endif
						</tr>
			
					</tbody>	
					</table>  






			

		
								<a href="javascript:history.back(-1);" class="btn btn-default" title="Ir la página anterior">Regresar</a>
		</div>
	</div>
		</div>
		</div>
</body>
</html>