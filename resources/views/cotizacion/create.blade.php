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
	        <nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
			
					  <div  id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav" style="display: inline;">
								@can('cotizacion')
							  <li class="active"><a href="/cotizacion">Todos</a></li>
							  @endcan
							  @can('cotizacion.create')
							  <li><a href="/cotizacion/create">Nuevo</a></li>				  
							  @endcan
							
						  </ul>
					  </div>
				  </div>
			  </nav>
	
			
{!!Form::open(array('route'=>'store', 'id'=>'frmsave', 'method'=>'post','files'=>true))!!}
@if(Session::has('message'))
<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
@endif
					{{ csrf_field() }}
		<div class="panel panel-success"style="width:100%;">
				<div class="panel-heading">
				<h4>Datos de cotizaciòn</h4>
					</div>
			
				<div class="panel-body">

				<p>
					<select name="cliente" style="height:30px ;" class="form-control" >
							@foreach($clientes as $cliente)
								<option value="{{$cliente->RUT_CLIENTE}}">{{$cliente->NOMBRE_COMPLETO}}</option>
							@endforeach
			
					</select>				
				</p>
				<p>
					<input type="text" name="codigo_pet_oferta" placeholder="Cod. Petición" maxlength="11" class="form-control" onkeypress='return validarNumericos(event)' required>
				</p>
                <p>
					<input type="text" name="fecha_resp_coti" placeholder="Fecha respuesta de cotización" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" id="fecha_llegada" class="form-control" required>

				</p>
				<p>
					<input type="text" name="descripcion_cot" class="form-control" placeholder="Descripcion" onkeypress='return validar(event)' required >
				</p>

			</div>
		</div>
		
			<br><div class="panel panel-success" style="width:100%;"> 
					<div class="panel-heading">
					<h4>Datos de Producto</h4>
						</div>
					<div class="panel-body">
								
					<div class="form-group">
						<table class="table">
												<thead>
													
														<th>Descripción</th>
														<th>Tipo</th>
														<th>Plano</th>
														<th>Fecha Entrega</th>
														<th><a href="#" class="addRow"><img src="/images/png/mas.png" style="width:40px; height:35px;" alt=""></a></th>
														<!--<input type="button" value="Agregar" class="addRow"/>-->
													
												</thead>
												<tbody>
													<tr>
														<td><input type="text" name="descripcion[]"  placeholder="Descripción" class="form-control descripcion" maxlength="50"  required>
														</td>
														<td><select name="tipo[]" style="height:35px;" class="form-control tipo">
	
																<option>Normal</option>
																
																<option>Emergencia</option>	
																
													</select></td>
														<td>
																<input type="file" name="plano[]" accept="application/pdf" class="plano">
														</td>
														<td>	<input type="date"  name="fecha_entrega[]"    class="form-control fecha_entrega" required></td>
														<td><a href="#" class="btn btn-danger remove"> <i class="glyphicon glyphicon-remove"></i></a>
															</td>
													</tr>
												</tbody>
												
											</table>
										</div>
									
								
							


							</div>
						
				
					<p>
						<input type="submit" value="Guardar" class="btn btn-success">
					</p>
					
			{!!Form::close()!!}
		</div>
	</div>	

	


</body>

<script type="text/javascript" src="{{ URL::asset('js/solo_num.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/solo_letras.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/live.js') }}"></script>






<script type="text/javascript">
$('tbody').delegate('')
$('.addRow').on('click',function() {
	addRow();
});
function addRow() {
	var tr='<tr>'+
			'<tr>'+
			'<td><input type="text" name="descripcion[]"  placeholder="Descripción" class="form-control descripcion" maxlength="50"  required>'+
			'</td>'+
			'<td><select name="tipo[]" style="height:30px ;" class="form-control tipo">'+
					'<option>Normal</option>'+
					
					'<option>Emergencia</option>'+
					
		'</select></td>'+
			'<td>'+
					'<input type="file" name="plano[]" accept="application/pdf" class="custom-file plano">'+
			'</td>'+
			'<td>	<input type="date"  name="fecha_entrega[]"  class="form-control fecha_entrega" required></td>'+
			'<td><a href="#" class="btn btn-danger remove"> <i class="glyphicon glyphicon-remove"></i></a>'+
				'</td>'+
		'</tr>';
			$('tbody').append(tr);
};
$('.remove').live('click', function() {
	var l=$('tbody tr').length;
	if (l==1) {
		alert('No se puede eliminar');
	}else{
	$(this).parent().parent().remove();
	}
	
});
</script>
	
</html>