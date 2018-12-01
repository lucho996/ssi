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
		<div style="width:100%; max-width: 1100px;  margin:0px auto;">
			@include('intranet.menu')
		  
		<div style="width:100%; max-width: 1100px;  float: right; position:relative;">

	<div class="panel panel-success"  margin-top: 20px;">
  		<div class="panel-heading" >
  			<h4>Información Cotizaciòn</h4>
  		</div>

  		<div class="panel-body">
				<div class="table-responsive">	
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td style="text-align:right;"><strong>Cliente:</strong> </td>
							<td>{{$cotizacion ->NOMBRE_COMPLETO}}</td>
							<td style="text-align:right;"><strong>Numero Convenio:</strong> </td>
							<td>{{$cotizacion ->N_CONVENIO}}</td>	
						</tr>
						<tr>
							<td style="text-align:right;"><strong>Fecha Inicio:</strong> </td>
							<td>{{$cotizacion ->FECHA_INICIO}}</td>	
							<td style="text-align:right;"><strong>Fecha Termino:</strong> </td>
							<td>{{$cotizacion ->FECHA_TERMINO}}</td>
							
						</tr>

						<tr>		
							<td style="text-align:right;"><strong>Persona a Cargo:</strong> </td>
							<td>{{$cotizacion ->NOMBRE_PERSONA_ACARGO}}</td>

							<td style="text-align:right;"><strong>Numero Persona a Cargo:</strong> </td>
							<td>{{$cotizacion ->NUMERO_PERSONA}}</td>
							
	
						</tr>
						<tr>
	

								<td style="text-align:right;"><strong>Correo Persona a Cargo:</strong> </td>
								<td>{{$cotizacion ->CORREO_PERSONA}}</td>	
								
								
							</tr>
					</tbody>
				</table>
				</div>

				<div class="table-responsive">	
				<table class="table table-bordered" style="width:100%;  float:right;">
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
										@if($cotizacion ->NETO != null)
										<td style="text-align:right;"><strong>Valor Neto:</strong> </td>
										<td >$<div id="number5" style="display: inline;">{{$cotizacion ->NETO}}</div></td>
										@else 
										<td style="text-align:right;"><strong>Valor Neto:</strong> </td>
										<td><em>Sin Cotizar</em></td>	
										@endif
	
										
			
								</tr>

								<tr>
										
										@if($cotizacion ->TOTAL != null)
										<td style="text-align:right;"><strong>Valor Total:</strong> </td>
										<td >$<div id="number6" style="display: inline;">{{$cotizacion ->TOTAL}}</div></td>
										@else 
										<td style="text-align:right;"><strong>Valor Total:</strong> </td>
										<td><em>Sin Cotizar</em></td>
										@endif
		
								</tr>
							
								
								
						</tbody>
					</table>
					<td><a href="/convenio" class="btn btn-default">Regresar</a></td>

				</div>		

					
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