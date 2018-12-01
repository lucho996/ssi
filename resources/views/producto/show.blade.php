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
		<div style="width:100%; max-width: 1100px; margin:0px auto;">
			@include('intranet.menu')
		
		<div style="width:100%; max-width: 1100px; float: right; position:relative;">


	<div class="panel panel-success" style="margin-top:20px ;">
  		<div class="panel-heading">
  			<h4>Información Producto</h4>
  		</div>

  		<div class="panel-body">
				<div class="table-responsive">	
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
			<tr>
					
					<td style="text-align:right;"><strong>Cantidad:</strong> </td>
					<td>{{$producto->CANTIDAD}}</td>				
				</tr>
			
			

	
			</tbody>	
			</table> 
				</div>

			<div class="panel panel-default" style="margin-top:20px ;">
					<div class="panel-heading">
						<h5><em>Mano de Obra</em></h4>
					</div>
		  
					<div class="panel-body">
							<div class="table-responsive">	
			<table class="table table-bordered">
				<thead>
					<th>Rut Personal</th>
					<th>Hora Hombre</th>
					<th>Cantidad Horas</th>
					<th>Total</th>
				</thead>
					<tbody>
							
					@foreach ($mano_obra as $mano_obra)
							
					
					<tr>
					<td>{{$mano_obra->RUTP}}</td>
					<td>{{$mano_obra->H_H}}</td>
					<td>{{$mano_obra->CANTIDAD_HORAS}}</td>
					<td>{{$mano_obra->TOTAL_MANO_OBRA}}</td>
					</tr>	
					@endforeach
					
					
		
			
					</tbody>	
					</table> 
							</div>
					</div>
				</div>

				<div class="panel panel-default" style="margin-top:20px ;">
						<div class="panel-heading">
							<h5><em>Material</em></h4>
						</div>
			  
						<div class="panel-body">
								<div class="table-responsive">	
				<table class="table table-bordered">
					<thead>
						<th>RUT</th>
						<th>Nombre</th>
						<th>Telefono</th>

						<th>Acción</th>
					</thead>
						<tbody>
								
						@foreach ($material as $material)
								
						
						<tr>
						<td>{{$material->RUT}}</td>
						<td>{{$material->NOMBRE}}</td>
						<td>{{$material->TELEFONO}}</td>

						<td>
						<a href="/producto/orden_compra_m/{{$material->RUT}}/{{$producto->ID_PRODUCTO}}">Orden de Compra</a>
						</td>
						</tr>	
						@endforeach
						
						
			
				
						</tbody>	
						</table> 
								</div>
						</div>
					</div>

					<div class="panel panel-default" style="margin-top:20px ;">
							<div class="panel-heading">
								<h5><em>Herramienta o Equipos</em></h4>
							</div>
				  
							<div class="panel-body">
									<div class="table-responsive">	
					<table class="table table-bordered">
						<thead>
							<th>Equipo</th>
							<th>Unidad</th>
							<th>Cantidad</th>
							<th>Precio Unitario</th>
							<th>Total</th>
							
						</thead>
							<tbody>
									
							@foreach ($equipo as $equipo)
									
							
							<tr>
							<td>{{$equipo->NOMBRE}}</td>
							<td>{{$equipo->UNIDAD_E}}</td>
							<td>{{$equipo->CANTIDAD_DIAS_E}}</td>
							<td>{{$equipo->PRECIO_UNITARIO}}</td>
							<td>{{$equipo->VALOR_TOTAL_E}}</td>
							
							</tr>	
							@endforeach
							
							
				
					
							</tbody>	
							</table> 
									</div>
							</div>
						</div>

						<div class="panel panel-default" style="margin-top:20px ;">
								<div class="panel-heading">
									<h5><em>Herramienta o Equipos Arrendados</em></h4>
								</div>
					  
								<div class="panel-body">
										<div class="table-responsive">	
						<table class="table table-bordered">
							<thead>
									<th>Equipo</th>
									<th>Unidad</th>
									<th>Cantidad</th>
									<th>Precio Unitario</th>
									<th>Total</th>
							</thead>
								<tbody>
										
								@foreach ($equipoa as $equipoa)
										
								
								<tr>
								<td>{{$equipoa->NOMBRE}}</td>
								<td>{{$equipoa->UNIDAD}}</td>
								<td>{{$equipoa->CANTIDAD}}</td>
								<td>{{$equipoa->VALOR}}</td>
								<td>{{$equipoa->VALOR_TOTAL}}</td>

								</tr>	
								@endforeach
								
								
					
						
								</tbody>	
								</table> 
										</div>
								</div>
							</div>

						
<center>
		<div class="table-responsive">	
			<table class="table table-bordered" style="width:40% ;">
				
					<tbody>
							<tr>
									@if($producto->TOTAL != null)
									<td style="text-align:right;"><strong>Total Neto:</strong> </td>
							<td >$<p style="display: inline;" id="number3">{{$producto->TOTAL}}</p></td>
									@else 
									<td style="text-align:right;"><strong>Total Neto:</strong> </td>
									<td><em>Sin Cotizar</em></td>
									@endif
							</tr>

							<tr>
									@if($producto->TOTAL != null)
									<td style="text-align:right;"><strong>Total:</strong> </td>
							<td >$<p style="display: inline;" id="number2">{{$producto->TOTAL * $producto->CANTIDAD}}</p></td>
									@else 
									<td style="text-align:right;"><strong>Total Neto:</strong> </td>
									<td><em>Sin Cotizar</em></td>
									@endif
							</tr>

			
					</tbody>	
					</table>  
		</div>
				
			




			

		
								<a href="javascript:history.back(-1);" class="btn btn-default" title="Ir la página anterior">Regresar</a>
							</center>
							</div>
	</div>
		</div>
		</div>
</body>
<script type="text/javascript" >
	(function($) {
		$.fn.prettynumber = function(options) {
			var opts = $.extend({}, $.fn.prettynumber.defaults, options);
			return this.each(function() {
				$this = $(this);
				var o = $.meta ? $.extend({}, opts, $this.data()) : opts;
				var str = $this.html();
				$this.html($this.html().toString().replace(new RegExp("(^\\d{"+($this.html().toString().length%3||-1)+"})(?=\\d{3})"),"$1"+o.delimiter).replace(/(\d{3})(?=\d)/g,"$1"+o.delimiter));
			});
		};
		$.fn.prettynumber.defaults = {
			delimiter       : '.'	
		};
	})(jQuery);
	</script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#number").prettynumber();   
	});
	</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#number2").prettynumber();   
			});
			</script>
				<script type="text/javascript">
					$(document).ready(function(){
						$("#number3").prettynumber();   
					});
					</script>
									<script type="text/javascript">
										$(document).ready(function(){
											$("#number4").prettynumber();   
										});
										</script>
</html>