@include('layouts.app')
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Clientes</title>

</head>
<style>
		thead th input { 
	background:url('/images/png/mas.png' ) no-repeat; border:none;  width:40px; height:40px;; 
	background-size: 40px;}
</style>
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
									@can('convenio')
								  <li  ><a href="/convenio">Todos</a></li>
								  @endcan
								  @can('convenio.create')
								  <li class="active"><a href="/convenio/create">Nuevo</a></li>				  
								  @endcan
								
							  </ul>
						  </div>
					  </div>
				  </nav>
		
				
	{!!Form::open(array('route'=>'store3', 'id'=>'frmsave', 'method'=>'post','files'=>true))!!}
	@if(Session::has('message'))
	<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
						{{ csrf_field() }}
			


				
			<div class="panel panel-success"style="width:100%;">
					<div class="panel-heading">
					<h4>Datos de Convenio</h4>
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
						<input type="text" name="fecha_inicio" placeholder="Fecha inicio de convenio" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" id="fecha_inicio" class="form-control" required>
					</p>
					<p>
						<input type="text" name="fecha_final" placeholder="Fecha final de convenio" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" id="fecha_inicio" class="form-control">
		
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
															<th>Plano</th>
															<th>Precio Unitario</th>
															<th>Cantidad</th>
															<th>Total</th>
															<th><input type="button"  id="boton"  class="addRow"></th>															<!--<input type="button" value="Agregar" class="addRow"/>-->
														
													</thead>
													<tbody>
														<tr>
															<td><input type="text" name="descripcion[]"  placeholder="Descripción" class="form-control descripcion" maxlength="50"  required></td>
															<td><input type="file" name="plano[]" accept="application/pdf" class="plano"></td>
															<td><input type="text" name="precio_unitario[]"  placeholder="Precio unitario" class="form-control precio_unitario" maxlength="50"  required></td>
															<td><input type="text" name="cantidad[]"  placeholder="Cantidad" class="form-control cantidad" maxlength="50"  required></td>
				
															<td><input type="text" name="total[]"  placeholder="Total" class="form-control total" maxlength="50"  disabled  required></td>
															<td><input type="button" class="btn btn-danger remove" value="X"></td>
														</tr>
	
													</tbody>
													<tfoot>
															<tr>
																<td></td>
																<td></td>
																<td></td>
																<td><strong>Total</strong> </td>
																<td><strong>$</strong><label class="total" >0</label></td>
																</tr>
													</tfoot>
												</table>
											</div>
										
									
								
											<p>
													<input type="submit" value="Guardar" class="btn btn-success">
												</p>
	
								</div>
							
					
					
						
				{!!Form::close()!!}

			</div>
		</div>	
	

</body>
<script type="text/javascript" src="{{ URL::asset('js/solo_num.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/solo_letras.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/live.js') }}"></script>






<script type="text/javascript">

$('tbody').delegate('.cantidad,.precio_unitario','keyup', function(){
var tr =$(this).parent().parent();
var cantidad = tr.find('.cantidad').val();
var precio_unitario = tr.find('.precio_unitario').val();
var suma = (cantidad * precio_unitario);
tr.find('.total').val(suma);
total();
});
function total(){
	var total = 0;
	$('.total').each(function(i,e){
		var suma = $(this).val()-0;
		total += suma;
	})
	$('.total').html(total);
};
$('.addRow').on('click',function() {
	addRow();
});
function addRow() {
	var tr=		'<tr>'+
				'<td><input type="text" name="descripcion[]"  placeholder="Descripción" class="form-control descripcion" maxlength="50"  required></td>'+
				'<td><input type="file" name="plano[]" accept="application/pdf" class="plano"></td>'+
				'<td><input type="text" name="precio_unitario[]"  placeholder="Precio unitario" class="form-control precio_unitario" maxlength="50"  required>'+
				'<td><input type="text" name="cantidad[]"  placeholder="Cantidad" class="form-control cantidad" maxlength="50"  required>'+
				'<td><input type="text" name="total[]"  placeholder="Total" class="form-control total"  disabled maxlength="50"  required>'+
				'<td><input type="button" class="btn btn-danger remove" value="X"></td>'+
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