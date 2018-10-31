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
<div style="width: 1100px;
margin: 0px auto;
background: #cccccc;
padding: 35px;">
</div>
<body >
	<div style="width: 1100px; margin:20px auto;">
		<div style="width: 200px; float:left;  position:relative;">
		@include('intranet.menu')
		</div>
	<div style="width: 850px; float: right; position:relative;"> 
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
    		<div  id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
        			<li><a href="/cotizacion">Todos</a></li>
        			<li class="active"><a href="/cotizacion/create">Nuevo</a></li>
        		</ul>
        	</div>
        </div>
    </nav>

	<article id="main">
			
{!!Form::open(array('route'=>'store', 'id'=>'frmsave', 'method'=>'post'))!!}
			
					{{ csrf_field() }}
		<div class="panel panel-success"style="width:100%;">
				<div class="panel-heading">
				<h4>Datos de cotizaciòn</h4>
					</div>
			
				<div class="panel-body">

				<p>
					<select name="cliente" class="form-control" >
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
							{!!Form::submit('Save',array('class'=>'btn btn-success'))!!}
						<table class="table table-bordered">
												<thead>
													
														<th>Descripción</th>
														<th>Tipo</th>
														<th>Plano</th>
														<th>Fecha</th>
														<th><a href="#" class="addRow">+</a></th>
														<!--<input type="button" value="Agregar" class="addRow"/>-->
													
												</thead>
												<tbody>
													<tr>
														<td><input type="text" name="descripcion[]"  placeholder="Descripción" class="form-control descripcion" maxlength="50"  required>
														</td>
														<td><select name="tipo[]" class="form-control tipo">
	
																<option>Emergencia</option>
																
																<option>Normal</option>	
																
													</select></td>
														<td>
																<input type="file" name="plano[]"  class="custom-file plano">
														</td>
														<td>	<input type="text"  name="fecha_entrega[]" placeholder="Fecha entrega producto" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}"  class="form-control fecha_entrega" required></td>
														<td><a href="#" class="btn btn-danger remove"> <i class="glyphicon glyphicon-remove"></i></a>
															</td>
													</tr>
												</tbody>
												
											</table>
										</div>
									
								
								<br> 
								<br>
								<br>
							</div>
						
					</article>
					<p>
						<input type="submit" value="Guardar" class="btn btn-success">
					</p>
				</div>
			</div>
			{!!Form::close()!!}
		

	</div>

	@if(Session::has('message'))
		<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
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
			'<td><select name="tipo[]" class="form-control tipo">'+
					'<option>Emergencia</option>'+
					
					'<option>Normal</option>'+
					
		'</select></td>'+
			'<td>'+
					'<input type="file" name="plano[]"  class="custom-file plano">'+
			'</td>'+
			'<td>	<input type="date"  name="fecha_entrega[]" placeholder="Fecha entrega producto" class="form-control fecha_entrega" required></td>'+
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