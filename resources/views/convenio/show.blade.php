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
								<td style="text-align:right;"><strong>Fecha de Ingreso:</strong> </td>
								<td>{{$cotizacion ->FECHA_LLEGADA}}</td>
							<td style="text-align:right;"><strong>Descripción:</strong> </td>
							<td>{{$cotizacion ->DESCRIPCION}}</td>	
						</tr>

						<tr>
							
							
						
			
						
							
							@if($cotizacion ->COD_PETICION_OFERTA != null)
							<td style="text-align:right;"><strong>Codigo Petición:</strong> </td>
							<td>{{$cotizacion ->COD_PETICION_OFERTA}}</td>
							@else 
							<td style="text-align:right;"><strong>Codigo Petición:</strong> </td>
							<td>Sin Codigo Petición</td>
							@endif
	
						</tr>
						<tr>
	

								<td style="text-align:right;"><strong>Estado:</strong> </td>
								<td>{{$cotizacion ->ESTADO}}</td>	
								
								
							</tr>
					</tbody>
				</table>


				<table class="table table-bordered" style="width: 430px; float:right;">
						<tbody>
								<tr>
										@foreach ($iva as $iva)
										@if($iva->IVA != null)
										<td style="text-align:right;"><strong>+IVA:</strong> </td>
										<td id="number">{{$iva->IVA}}%</td>
										@else 
										<td style="text-align:right;"><strong>IVA:</strong> </td>
										<td>Sin Cotizar</td>
										@endif
										@endforeach
										@if($cotizacion ->VALOR_NETO != null)
										<td style="text-align:right;"><strong>Valor Neto:</strong> </td>
										<td >$<div id="number5" style="display: inline;">{{$cotizacion ->VALOR_NETO}}</div></td>
										@else 
										<td style="text-align:right;"><strong>Valor Neto:</strong> </td>
										<td><em>Sin Cotizar</em></td>	
										@endif
	
										
			
								</tr>

								<tr>
										@if($cotizacion ->PORC_DESCUENTO != null)
										<td style="text-align:right;"><strong>Porcentaje Desc:</strong> </td>
										<td>{{$cotizacion ->PORC_DESCUENTO}}</td>
										@else 
										<td style="text-align:right;"><strong>Porcentaje Desc:</strong> </td>
										<td><em>N/A</em></td>
										@endif
										@if($cotizacion ->VALOR_TOTAL != null)
										<td style="text-align:right;"><strong>Valor Total:</strong> </td>
										<td >$<div id="number6" style="display: inline;">{{$cotizacion ->VALOR_TOTAL}}</div></td>
										@else 
										<td style="text-align:right;"><strong>Valor Total:</strong> </td>
										<td><em>Sin Cotizar</em></td>
										@endif
		
								</tr>
							
								
								
						</tbody>
						
					</table>			

					
		</div>
		<td><a href="/cotizacion" class="btn btn-default">Regresar</a></td>
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
    $("#number5").prettynumber();   
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#number6").prettynumber();   
	});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#number7").prettynumber();   
		});
		</script>
</html>