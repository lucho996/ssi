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
		thead th input { 
	background:url('/images/png/mas.png' ) no-repeat; border:none;  width:40px; height:40px;; 
	background-size: 40px;}
	</style>
</head>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

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
							  <li ><a href="/cotizacion">Todos</a></li>
							  @endcan
							  @can('cotizacion.create')
							  <li class="active"><a href="/cotizacion/create">Nuevo</a></li>				  
							  @endcan
							
						  </ul>
					  </div>
				  </div>
			  </nav>
	
			
{!!Form::open(array('route'=>'store5', 'id'=>'frmsave', 'method'=>'post','files'=>true))!!}
@if(Session::has('message'))
<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
@endif
					{{ csrf_field() }}
					
                    <input type="hidden" name="idproducto" value="{{$producto->ID_PRODUCTO}}" >
                    <div class="panel panel-success"style="width:100%;">
                            <div class="panel-heading">
                            <h4>Cotización De Producto</h4>
                                </div>
                        
                            <div class="panel-body">
                         
                                        @if($producto->CODIGO_SAP!= null)
                                        <p>
                                            <input type="text" name="CODIGO_SAP" class="form-control" value="{{$producto->CODIGO_SAP}}" readonly>
                                        </p>
                                        @else 
                                        <p>
                                            <input type="text" name="CODIGO_SAP" class="form-control" value="Sin Codigo Sap" readonly>
                                        </p>
                                        @endif
          
                            <p>
                                <input type="text" name="descripcion" placeholder="descripcion" readonly value="{{$producto->DESCRIPCION}}" class="form-control">			
                            </p>
                            <p>
                                <input type="text" value="{{$producto->UNIDAD}}"name="unidad" placeholder="Unidad" maxlength="11" class="form-control" onkeypress='return validarNumericos(event)' required readonly>
                            </p>
                           <P>
                                <input type="text" value="{{$producto->CANTIDAD}}"name="cantidad" placeholder="Cantidad" maxlength="11" class="form-control" onkeypress='return validarNumericos(event)' required readonly>
                           </P>
                               
                                    
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
								<th><input type="button"  id="boton"  class="addRow"></th>
								<!--<input type="button" value="Agregar" class="addRow"/>-->
							
						</thead>
						<tbody>
							<tr>
									<td><select name="proveedor[]" class="form-control proveedor" style="width:130px; height: 35px;"required >
										<option value="" selected="true" disabled="true">Seleccione Proveedor</option>
										@foreach($proveedor as $key =>$value)
										<option value="{{$value->RUT}}">{{$value->NOMBRE}}</option>
										@endforeach
								</select>
									</td>
								<td><input type="text" name="descripcion[]"  placeholder="Descripción" class="form-control descripcion" maxlength="50"  required>
								</td>
								<td><input name="cantidadm[]" style="height:35px;" class="form-control cantidadm" type="text" placeholder="Cantidad" required onkeypress="return validaNumericos(event);">


										
							</td>
								<td>
										<input type="text" name="preciounitariom[]" placeholder="Precio unitario" class="form-control preciounitariom" required  onkeypress="return validaNumericos(event);">
								</td>
								<td>	<input type="text"  name="valortotalm[]" id="valorM"  class="form-control valortotalm"  readonly></td>
								<td><input type="button" class="btn btn-danger remove" value="X"></td>
									</td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td style="border: none;"></td>
								<td style="border: none;"></td>
								
								<td style="border: none;"></td>
								<td><b>Total</b></td>
								<td>$<b class="totalmater" ></b></td>
								<td></td>
							</tr>
						</tfoot>
						
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
																
																	<th>Cargo</th>
																	<th>Persona</th>
																	<th>Cantidad de horas</th>
																	<th>Valor Hora Hombre</th>
																	<th>Valor Total</th>
																	<th><input type="button"  id="boton"  class="addmano"></th>
																	
																	<!--<input type="button" value="Agregar" class="addRow"/>-->
																
															</thead>
															<tbody>
																<tr>
																		
																		<td><select name="cargop[]" class="form-control cargop" style="width:150px; height: 35px;" required>
																				<option value="" disable="true" selected="true">Seleccione Cargo</option>
																			@foreach($cargo as $key => $value)
																		<option value="{{$value->ID_CARGO}}">{{$value->CARGO}}</option>
																		@endforeach
																	</select>
																		
			
			
																			
																		</td>
																		
																	<td><select name="persona[]"  class="form-control persona" style="height: 35px;"required>	
																			<option value="" disable="true" selected="true" >Seleccione Persona</option>
																		</select>
																	</td>
																	
																	<td>
																			<input type="text" name="cantidadhorasma[]" placeholder="Cantidad Horas" class="form-control cantidadhorasma" onkeypress="return validaNumericos(event);" required>
																	</td>
																	<td>	<input type="text"  name="valorhhma[]"    class="form-control valorhhma" required ></td>
																	<td>	<input type="text"  name="valortotalma[]"    class="form-control valortotalma" required readonly ></td>
																	<td><input type="button" class="btn btn-danger removemano" id="removemano" value="X"></td>
																		</td>
																</tr>
															</tbody>
															<tfoot>
																<tr>
																	<td style="border: none;"></td>
																	<td style="border: none;"></td>

																	<td style="border: none;"></td>
																	<td><b>Total</b></td>
																	<td>$<b class="totalma" ></b></td>
																	<td></td>
																</tr>
															</tfoot>
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
																				<th>Unidad</th>
																				<th>Cantidad</th>
																				<th>Precio unitario</th>
																				<th>Valor total</th>
																				<th><input type="button"  id="boton"  class="addhr"></th>
																				
																				<!--<input type="button" value="Agregar" class="addRow"/>-->
																			
																		</thead>
																		<tbody>
																				<tr>
																					<td><select name="equipo[]" class="form-control equipo"  style="height:35px;" id="equipo" required>
																					<option value="" disable="true" selected="true">Seleccione Inventarios</option>	
																					@foreach($inventario as $key =>$value)
																					<option value="{{$value->ID_INVENTARIO}}">{{$value->NOMBRE}}</option>
																					@endforeach</select>
																				</td>
																					<td><input type="text" name="unidadeq[]" class="form-control unidadeq" placeholder="Unidad"  onkeypress="return validar(event);" required></td>
																					<td><input type="text" name="cantidad[]" style="height:35px;"  class="form-control cantidad"  onkeypress="return validaNumericos(event);" placeholder="Cantidad" required></td>
																					<td><input type="text" name="preciounitario[]" placeholder="Precio unitario" class="form-control preciounitario"  onkeypress="return validaNumericos(event);" readonly required></td>
																					<td><input type="text" name="valortotal[]" id="totalHe"   class="form-control valortotal" required readonly></td>
																					<td><input type="button" class="btn btn-danger remove" value="X"></td>
																				</tr>
																		</tbody>
																		<tfoot>
																			<tr>
																				<td style="border: none;"></td>
																				<td style="border: none;"></td>
																		
																				<td style="border: none;"></td>
																				<td><b>Total</b></td>
																				<td>$<b class="total" ></b></td>
																				<td></td>
																			</tr>
																		</tfoot>
																		
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
																							<th>Unidad</th>
																							<th>Cantidad</th>
																							<th>Nombre</th>
																							<th>Marca</th>
																							
																							<th>Precio unitario</th>
																							
																							<th>Valor Total</th>
																							<th><input type="button"  id="boton"  class="addes"></th>
																							
																							<!--<input type="button" value="Agregar" class="addRow"/>-->
																						
																					</thead>
																					<tbody>
																						<tr>
																								<td>	<input type="text"  name="unidad[]"    class="form-control unidad" placeholder="Unidad"  onkeypress="return validar(event);" required></td>

																								<td>	<input type="text"  name="cantidada[]"  placeholder="Cantidad"  onkeypress="return validaNumericos(event);"  class="form-control cantidada" required></td>

																							<td><input type="text" name="nombre[]"  placeholder="Descripción" class="form-control nombre" maxlength="50"  required>
																							</td>
																							<td><input name="marca[]" style="height:35px;" class="form-control tipo" type="text" placeholder="marca" required>
																						</td>
																							
																							<td>
																								<input type="text" name="preciounitarioa[]"  placeholder="Precio unitario"  onkeypress="return validaNumericos(event);" class="form-control preciounitarioa">
																						</td>
																							<td>	<input type="text"  name="valortotala[]" id="valorAr"   class="form-control valortotala" required readonly></td>
																							<td><input type="button" class="btn btn-danger remove" value="X"></td>
																							
																								</td>
																						</tr>
																					</tbody>
																					<tfoot>
																						<tr>
																							<td style="border: none;"></td>
																							<td style="border: none;"></td>
																	
																							<td style="border: none;"></td>
																							<td style="border: none;"></td>
																							<td><b>Total</b></td>
																							<td>$<b class="totalaa" ></b></td>
																							<td></td>
																						</tr>
																					</tfoot>
																				</table>
																			</div>
																		
														</div>
														
			
																
									
									
																</div>

																<br><div class="panel panel-success" style="width:100%;"> 
																	<div class="panel-heading">
																	<h4>Detalle general</h4>
																		</div>
																	<div class="panel-body">
																				
																	<div class="form-group">
																		<table class="table" id="detalle">
																		<thead>
																		<td><b>Total Material</b></td>
																		<td><b>Total Mano De Obra</b></td>
																		<td><b>Total equiposyherramientas</b></td>
																		<td><b>Total equipos y herramientas arrendados</b></td>
																		<td><b>Total Cotizacion</b></td>
																		</thead>
																		<!--<td>$<b class="totalcoti " id="cotizar" ></b></td>-->
																								
																							
																		<tbody>
																			<td>$<b class="totalmater"></b></td>
																			<td>$<b class="totalma"></b></td>
																			<td>$<b class="total"></b></td>
																			<td>$<b class="totalaa"></b></td>
																			<td>$<b class="totalcoti"></b></td>
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
	@if(Session::has('message'))
		<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
</div>
</div>


</body>
<script type="text/javascript" src="{{ URL::asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/solo_num.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/solo_letras.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/live.js') }}"></script>





<!--Material-->
<script type="text/javascript">
$('.addRow').on('click',function() {
	addRow();
});
$('#material').delegate('.cantidadm,.preciounitariom','keyup', function(){
	var tr =$(this).parent().parent();
	var cantidad = tr.find('.cantidadm').val();
	var preciounitario = tr.find('.preciounitariom').val();
	var suma = (cantidad * preciounitario);
	tr.find('.valortotalm').val(suma);
	totalmater();
	
	});
function addRow() {
	var tr='<tr>'+
			'<td><select name="proveedor[]" class="form-control proveedor" style="width:130px; height: 35px;" required >'+
			'<option value="" selected="true" disabled="true">Seleccione Proveedor</option>'+
				'@foreach($proveedor as $key =>$value)'+
				'<option value="{{$value->RUT}}">{{$value->NOMBRE}}</option>'+
				'@endforeach'+
			'</select>'+
			'</td>'+
			'<td><input type="text" name="descripcion[]"  placeholder="Descripción" class="form-control descripcion" maxlength="50"  required>'+
			'</td>'+
			'<td><input name="cantidadm[]" style="height:35px;" class="form-control cantidadm" required onkeypress="return validaNumericos(event);"  type="text" placeholder="Cantidad" required>	'+		
			'</td>'+
			'<td>'+
			'<input type="text" name="preciounitariom[]" placeholder="Precio unitario" required onkeypress="return validaNumericos(event);" class="form-control preciounitariom" required>'+
			'</td>'+
			'<td><input type="text"  name="valortotalm[]" id="valorM"  class="form-control valortotalm" readonly ></td>'+
			'<td><input type="button" class="btn btn-danger remove" value="X"></td>'+
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
function totalmater(){
	var totalmater = 0;
	$('.valortotalm').each(function(i,e){
		var suma = $(this).val()-0;
		totalmater += suma;
	})
	$('.totalmater').html(totalmater);
};
</script>




<!--Mano de obra -->
<script type="text/javascript">
$('#manodeobra').delegate('.cantidadhorasma,.valorhhma','keyup', function(){
	var tr =$(this).parent().parent();
	var cantidad = tr.find('.cantidadhorasma').val();
	var preciounitario = tr.find('.valorhhma').val();
	var suma = (cantidad * preciounitario);
	tr.find('.valortotalma').val(suma);
	totalmano();
	
	});
$('.addmano').on('click',function() {
	addmo();
});
function addmo() {
	var tr='<tr>'+														
			'<td><select name="cargop[]" class="form-control cargop" style="height: 35px;"required>'+
				'<option value="" disable="true" selected="true">Seleccione Cargo</option>'+
				'@foreach($cargo as $key => $value)'+
				'<option value="{{$value->ID_CARGO}}">{{$value->CARGO}}</option>'+
				'@endforeach</select>'+
			'</td>'+
			
			'<td><select name="persona[]" class="form-control persona" style="height: 35px;"required>	'+
				'<option value="" disable="true" selected="true">Seleccione Persona</option>'+
			'</select>'+
			'</td>'+
		
			'<td>'+
			'<input type="text" name="cantidadhorasma[]" placeholder="Cantidad Horas"onkeypress="return validaNumericos(event);" class="form-control cantidadhorasma">'+
			'</td>'+
			'<td><input type="text"  name="valorhhma[]"    class="form-control valorhhma" required></td>'+
			'<td><input type="text"  name="valortotalma[]"    class="form-control valortotalma" required readonly></td>'+
			'<td><input type="button" class="btn btn-danger removemano" id="removemano"value="X"></td>'+
			'</tr>';
	$('#manodeobra').append(tr);
			
};
$('#manodeobra').delegate('.persona','change',function(){
	var tr = $(this).parent().parent();
	var id= tr.find('.persona').val();
	console.log(id);
	var dataId={'id':id};
	$.ajax({
	type : 'GET',
	url :	'{!!URL::route('findPrice2')!!}',
	dataType:'json',
	data: dataId,
	success:function(data){
		
		tr.find('.valorhhma').val(data.SUELDO_BASE);
	}
	});
});
$('#manodeobra').delegate('.cargop','change', function(e){
		
	 	var tr = $(this).parent().parent();
		 var id_cargo= tr.find('.cargop').val();
	  //var id_cargo = e.target.value;
	  $.get('/json-personalcargo?id_cargo=' + id_cargo,function(data) {
		
		tr.find($('.persona')).empty();
		tr.find($('.persona')).append('<option value="" disable="true" selected="true">Seleccione Persona</option>');
	
		$.each(data, function(index, regenciesObj){
		  tr.find($('.persona')).append('<option value="'+ regenciesObj.RUTP +'">'+ regenciesObj.NOMBREP +'</option>');
		  
		})
	  });
	});
$('.removemano').live('click', function() {
	var l=$('#manodeobra tbody tr').length;
	if (l==1) {
		alert('No se puede eliminar');
	}else{
	$(this).parent().parent().remove();
	}
	
});
function totalmano(){
	var totalmano = 0;
	$('.valortotalma').each(function(i,e){
		var suma = $(this).val()-0;
		totalmano += suma;
	})
	$('.totalma').html(totalmano);
};
</script>






<!--Equipos o herramientas Internos -->
<script type="text/javascript">
$('#equiposyherramientas').delegate('.equipo','change',function(){
	var tr = $(this).parent().parent();
	var id= tr.find('.equipo').val();
	var dataId={'id':id};
	$.ajax({
	type : 'GET',
	url :	'{!!URL::route('findPrice')!!}',
	dataType:'json',
	data: dataId,
	success:function(data){
		
		tr.find('.preciounitario').val(data.VALOR);
	}
	});
});
$('#equiposyherramientas').delegate('.equipo','change',function(){
	var tr = $(this).parent().parent();
	tr.find('.cantidad').focus();
});
$('#equiposyherramientas').delegate('.cantidad,.preciounitario','keyup', function(){
var tr =$(this).parent().parent();
var cantidad = tr.find('.cantidad').val();
var preciounitario = tr.find('.preciounitario').val();
var suma = (cantidad * preciounitario);
tr.find('.valortotal').val(suma);
total();
});
$('.addhr').on('click',function() {
	addher();
});
function total(){
	var total = 0;
	$('.valortotal').each(function(i,e){
		var suma = $(this).val()-0;
		total += suma;
	})
	$('.total').html(total);
};
function addher() {
	var tr='<tr>'+
		'<td><select name="equipo[]" class="form-control equipo"  style="height:35px;" id="equipo" required>'+
		'<option value="" disable="true" selected="true">Seleccione Inventario</option>	'+
		'@foreach($inventario as $key =>$value)'+
		'<option value="{{$value->ID_INVENTARIO}}">{{$value->NOMBRE}}</option>'+
		'@endforeach</select>'+
		'</td>'+
		'<td><input type="text" name="unidadeq[]" class="form-control unidadeq" placeholder="Unidad"  onkeypress="return validar(event);" required></td>'+
		'<td><input type="text" name="cantidad[]" style="height:35px;" class="form-control cantidad" placeholder="Cantidad" required onkeypress="return validaNumericos(event);"></td>'+
		'<td><input type="text" name="preciounitario[]" placeholder="Precio unitario" class="form-control preciounitario" readonly></td>'+
		'<td><input type="text" name="valortotal[]" id="totalHe"   class="form-control valortotal" required readonly></td>'+
		'<td><input type="button" class="btn btn-danger remove" value="X"></td>'+
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
	total();
});
</script>



<!--Equipos o herramientas arrendados -->
<script type="text/javascript">
	$('#equiposyserviciosarrendados').delegate('')
	$('.addes').on('click',function() {
		addesa();
	});
	$('#equiposyserviciosarrendados').delegate('.cantidada,.preciounitarioa','keyup', function(){
var tr =$(this).parent().parent();
var cantidad = tr.find('.cantidada').val();
var preciounitario = tr.find('.preciounitarioa').val();
var suma = (cantidad * preciounitario);
tr.find('.valortotala').val(suma);
totalal();
});
	function addesa() {
var tr='<tr>'+
		'<td>	<input type="text"  name="unidad[]"   placeholder="Unidad" class="form-control unidad" required></td>'+
		'<td>	<input type="text"  name="cantidada[]"  placeholder="Cantidad"  class="form-control cantidada" required></td>'+
			'<td><input type="text" name="nombre[]"  placeholder="Descripción" class="form-control nombre" maxlength="50"  required>'+
			'</td>'+
			'<td><input name="marca[]" style="height:35px;" class="form-control tipo" type="text" placeholder="Marca">'+
		'</td>'+
			
			
			'<td>'+
				'<input type="text" name="preciounitarioa[]" placeholder="Precio unitario" class="form-control preciounitarioa">'+
		'</td>'+
			
			'<td>	<input type="text"  name="valortotala[]" id="valorAr"   class="form-control valortotala" required></td>'+
		
			'<td><input type="button" class="btn btn-danger remove" value="X"></td>'+
				
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
	function totalal(){
	var totalal = 0;
	$('.valortotala').each(function(i,e){
		var suma = $(this).val()-0;
		totalal += suma;
	})
	$('.totalaa').html(totalal);
	};
</script>





	
	<script type="text/javascript" src="jquery.dataTables.js"></script>

</html>