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
				<h4>Datos Del Producto</h4>
					</div>
			
				<div class="panel-body">

				<p>
					<input type="text" name="descripcion" placeholder="descripcion" disabled="false" value="{{$producto->DESCRIPCION}}" class="form-control">			
				</p>
				<p>
					<input type="text" value="{{$producto->TIPO_PRODUCTO}}"name="tipo" placeholder="Cod. Petición" maxlength="11" class="form-control" onkeypress='return validarNumericos(event)' required disabled="false">
				</p>
				<p>
						<input type="text" value="{{$producto->PLANO_PRODUCTO}}"name="PLANO" placeholder="Cod. Petición" maxlength="11" class="form-control" onkeypress='return validarNumericos(event)' required disabled="false">
					</p>
				
					<p>
							<input type="text" value="{{$producto->FECHA_DE_ENTREGA_PRODUCTO}}"name="FECHA" placeholder="Cod. Petición" maxlength="11" class="form-control" onkeypress='return validarNumericos(event)' required disabled="false">
						</p>
			</div>
		</div>
		
			<br><div class="panel panel-success" style="width:100%;"> 
					<div class="panel-heading">
					<h4>Cotizar Materiales</h4>
						</div>
					<div class="panel-body">
								
					<div class="form-group">
						<table class="table" id="material">
												<thead>
														<th>Proveedor</th>
														<th>Descripción</th>
														<th>Cantidad</th>
														<th>Precio unitario</th>
														<th>Valor total</th>
														<th><a href="#" class="addRow"><img src="/images/png/mas.png" style="width:40px; height:35px;" alt=""></a></th>
														<!--<input type="button" value="Agregar" class="addRow"/>-->
													
												</thead>
												<tbody>
													<tr>
															<td><select name="proveedor[]" >	<option>prueba</option></select>
															</td>
														<td><input type="text" name="descripcion[]"  placeholder="Descripción" class="form-control descripcion" maxlength="50"  required>
														</td>
														<td><input name="cantidad[]" style="height:35px;" class="form-control tipo" type="text" placeholder="Cantidad">


																
													</td>
														<td>
																<input type="text" name="preciounitario[]" placeholder="Precio unitario" class="form-control preciounitario">
														</td>
														<td>	<input type="text"  name="valortotal[]"    class="form-control valortotal" required disabled></td>
														<td><a href="#" class="btn btn-danger remove"> <i class="glyphicon glyphicon-remove"></i></a>
															</td>
													</tr>
												</tbody>
												
											</table>
										</div>
									
								
							


							</div>
							</div>
	
	
							<br><div class="panel panel-success" style="width:100%;"> 
								<div class="panel-heading">
								<h4>Cotizar Mano de obra</h4>
									</div>
								<div class="panel-body">
											
								<div class="form-group">
									<table class="table" id="manodeobra">
															<thead>
																
																	<th>Persona</th>
																	<th>Cargo</th>
																	<th>Cantidad de horas</th>
																	<th>Valor Hora Hombre</th>
																	<th>Valor Total</th>
																	<th><a href="#" class="addmano"><img src="/images/png/mas.png" style="width:40px; height:35px;" alt=""></a></th>
																	<!--<input type="button" value="Agregar" class="addRow"/>-->
																
															</thead>
															<tbody>
																<tr>
																	
																	<td><select name="persona[]" >	<option>prueba</option></select>
																	</td>
																	<td><select name="cargo[]" >	<option>prueba</option></select>
			
			
																			
																</td>
																	<td>
																			<input type="text" name="cantidadhoras[]" placeholder="Precio unitario" class="form-control cantidadhoras">
																	</td>
																	<td>	<input type="text"  name="valorhh[]"    class="form-control valorhh" required></td>
																	<td>	<input type="text"  name="valortotal[]"    class="form-control valortotal" required disabled></td>
																	<td><a href="#" class="btn btn-danger remove"> <i class="glyphicon glyphicon-remove"></i></a>
																		</td>
																</tr>
															</tbody>
															
														</table>
													</div>
								</div>
								</div>
	
											
										
			
			
									
										<br><div class="panel panel-success" style="width:100%;"> 
											<div class="panel-heading">
											<h4>Cotizar Equipos y herramientas</h4>
												</div>
											<div class="panel-body">
														
											<div class="form-group">
												<table class="table" id="equiposyherramientas">
																		<thead>
																			
																				<th>Equipo</th>
																				<th>Cantidad</th>
																				<th>Precio unitario</th>
																				<th>Valor total</th>
																				<th><a href="#" class="addhr"><img src="/images/png/mas.png" style="width:40px; height:35px;" alt=""></a></th>
																				<!--<input type="button" value="Agregar" class="addRow"/>-->
																			
																		</thead>
																		<tbody>
																			<tr>
																					<td><select name="equipo[]" >	<option>prueba</option></select>
																					</td>
																				<td><input name="cantidad[]" style="height:35px;" class="form-control tipo" type="text" placeholder="Cantidad">
						
						
																						
																			</td>
																				<td>
																						<input type="text" name="preciounitario[]" placeholder="Precio unitario" class="form-control preciounitario">
																				</td>
																				<td>	<input type="text"  name="valortotal[]"    class="form-control valortotal" required disabled></td>
																				<td><a href="#" class="btn btn-danger remove"> <i class="glyphicon glyphicon-remove"></i></a>
																					</td>
																			</tr>
																		</tbody>
																		
																	</table>
																</div>
															
											</div>
											

													
						
						
													</div>

													<br><div class="panel panel-success" style="width:100%;"> 
														<div class="panel-heading">
														<h4>Cotizar Equipos y servicios arrendados</h4>
															</div>
														<div class="panel-body">
																	
														<div class="form-group">
															<table class="table" id="equiposyserviciosarrendados">
																					<thead>
																						
																							<th>Nombre</th>
																							<th>Marca</th>
																							<th>Precio unitario</th>
																							<th>Unidad</th>
																							<th>Cantidad</th>
																							<th>Valor Total</th>
																							<th><a href="#" class="addes"><img src="/images/png/mas.png" style="width:40px; height:35px;" alt=""></a></th>
																							<!--<input type="button" value="Agregar" class="addRow"/>-->
																						
																					</thead>
																					<tbody>
																						<tr>
																							<td><input type="text" name="nombre[]"  placeholder="Descripción" class="form-control nombre" maxlength="50"  required>
																							</td>
																							<td><input name="marca[]" style="height:35px;" class="form-control tipo" type="text" placeholder="marca">
									
									
																									
																						</td>
																							<td>
																									<input type="text" name="preciounitario[]" placeholder="Precio unitario" class="form-control preciounitario">
																							</td>
																							<td>	<input type="text"  name="unidad[]"    class="form-control unidad" required></td>
																							<td>	<input type="text"  name="cantidad[]"    class="form-control cantidad" required></td>
																							<td>	<input type="text"  name="valortotal[]"  disabled  class="form-control valortotal" required></td>
																						
																							<td><a href="#" class="btn btn-danger remove"> <i class="glyphicon glyphicon-remove"></i></a>
																								</td>
																						</tr>
																					</tbody>
																					
																				</table>
																			</div>
																		
														</div>
														
			
																
									
									
																</div>
				
					<p>
						<input type="submit" value="Guardar" class="btn btn-success">
					</p>
					
			{!!Form::close()!!}
		</div>
	</div>	

</div>
</div>


</body>

<script type="text/javascript" src="{{ URL::asset('js/solo_num.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/solo_letras.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/live.js') }}"></script>






<script type="text/javascript">
$('#material').delegate('')
$('.addRow').on('click',function() {
	addRow();
});
function addRow() {
	var tr='<tr>'+
				'<td><select name="proveedor[]" >	<option>prueba</option></select>'+
				'</td>'+
			'<td><input type="text" name="descripcion[]"  placeholder="Descripción" class="form-control descripcion" maxlength="50"  required>'+
			'</td>'+
			'<td><input name="cantidad[]" style="height:35px;" class="form-control tipo" type="text" placeholder="Cantidad">'+


					
		'</td>'+
			'<td>'+
					'<input type="text" name="preciounitario[]" placeholder="Precio unitario" class="form-control preciounitario">'+
			'</td>'+
			'<td>	<input type="text"  name="valortotal[]"    class="form-control valortotal" required></td>'+
			'<td><a href="#" class="btn btn-danger remove"> <i class="glyphicon glyphicon-remove"></i></a>'+
				'</td>'+
         '</tr>';
			$('#material').append(tr);
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

<script type="text/javascript">
$('#manodeobra').delegate('')
$('.addmano').on('click',function() {
	addmo();
});

function addmo() {
	var tr='<tr>'+
			
			'<td><select name="persona[]" >	<option>prueba</option></select>'+
			'</td>'+
			'<td><select name="cargo[]" >	<option>prueba</option></select>'+
					
		'</td>'+
			'<td>'+
					'<input type="text" name="cantidadhoras[]" placeholder="Precio unitario" class="form-control cantidadhoras">'+
	'</td>'+
			'<td>	<input type="text"  name="valorhh[]"    class="form-control valorhh" required></td>'+
			'<td>	<input type="text"  name="valortotal[]"    class="form-control valortotal" required></td>'+
			'<td><a href="#" class="btn btn-danger remove"> <i class="glyphicon glyphicon-remove"></i></a>'+
				'</td>'+
		'</tr>';
			$('#manodeobra').append(tr);
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
<script type="text/javascript">
$('#equiposyherramientas').delegate('')
$('.addhr').on('click',function() {
	addher();
});
function addher() {
	var tr='<tr>'+
			'<td><select name="equipo[]" >	<option>prueba</option></select>'+
			'</td>'+
		'<td><input name="cantidad[]" style="height:35px;" class="form-control tipo" type="text" placeholder="Cantidad">'+
		'</td>'+
		'<td>'+
				'<input type="text" name="preciounitario[]" placeholder="Precio unitario" class="form-control preciounitario">'+
		'</td>'+
		'<td>	<input type="text"  name="valortotal[]"    class="form-control valortotal" required></td>'+
		'<td><a href="#" class="btn btn-danger remove"> <i class="glyphicon glyphicon-remove"></i></a>'+
			'</td>'+
	'</tr>';
			$('#equiposyherramientas').append(tr);
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
<script type="text/javascript">
	$('#equiposyserviciosarrendados').delegate('')
	$('.addes').on('click',function() {
		addesa();
	});
	function addesa() {
		var tr='<tr>'+
			'<td><input type="text" name="nombre[]"  placeholder="Descripción" class="form-control nombre" maxlength="50"  required>'+
			'</td>'+
			'<td><input name="marca[]" style="height:35px;" class="form-control tipo" type="text" placeholder="marca">'+


					
		'</td>'+
			'<td>'+
					'<input type="text" name="preciounitario[]" placeholder="Precio unitario" class="form-control preciounitario">'+
			'</td>'+
			'<td>	<input type="text"  name="unidad[]"    class="form-control unidad" required></td>'+
			'<td>	<input type="text"  name="cantidad[]"    class="form-control cantidad" required></td>'+
			'<td>	<input type="text"  name="valortotal[]"    class="form-control valortotal" required></td>'+
		
			'<td><a href="#" class="btn btn-danger remove"> <i class="glyphicon glyphicon-remove"></i></a>'+
				'</td>'+
		'</tr>';
				$('#equiposyserviciosarrendados').append(tr);
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
	<script>
	</script>
</html>