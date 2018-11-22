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
	
.btn-file {
  position: relative;
  overflow: hidden;

  }
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
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
							  <li ><a href="/cotizacion">Todos</a></li>
							  @endcan
							  @can('cotizacion.create')
							  <li class="active"><a href="/cotizacion/create">Nuevo</a></li>				  
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
					<select name="cliente" style="height:30px ;" id="cliente" class="form-control" required >
						<option value="" disable="true" selected="true">Seleccione Cliente</option>
							@foreach($clientes as $cliente)
								<option value="{{$cliente->RUT_CLIENTE}}">{{$cliente->NOMBRE_COMPLETO}}</option>
							@endforeach
			
					</select>				
				</p>
				<p>	
					<input type="text"  name="codigo_pet_oferta" id="input" placeholder="Cod. Petición" maxlength="11" class="form-control" onkeypress='return validaNumericos(event)' required>
				</p>
                <p>
					<input type="text" max="2099-01-01" name="fecha_resp_coti" placeholder="Fecha respuesta de cotización" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" id="fecha_llegada" class="form-control" required>

				</p>
				<p>
					<input type="text" name="descripcion_cot" class="form-control" placeholder="Descripcion" maxlength="50" required >
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
														<th>Cod Sap</th>
														<th>Unidad</th>
														<th>Cantidad</th>
														<th>Descripción</th>
														<th>Tipo</th>
														<th>Plano</th>
														<th>Fecha Entrega</th>
														<th><input type="button"  id="boton"  class="addRow"></th>
													
														
														<!--<input type="button" value="Agregar" class="addRow"/>-->
													
												</thead>
												<tbody>
													<tr>
														<td><input type="text" name="codsap[]" style="width: 70px;" class="form-control codsap" onkeypress="return validaNumericos(event)" maxlength="11"></td>
														<td><input type="text" name="unidad[]" style="width: 50px;" class="form-control unidad" onkeypress="return validar(event)" maxlength="30" required></td>
														<td><input type="text" name="cantidad[]" class="form-control cantidad"  onkeypress="return validaNumericos(event)" maxlength="11" required></td>
														<td><input type="text" name="descripcion[]"  class="form-control descripcion" maxlength="50"  required>
														</td>
														<td><select name="tipo[]" style="width:100px ;height:35px; "class="form-control tipo">
																<option>Normal</option>
																<option>Emergencia</option>	
														</select></td>
														<td>	
															<input type="file"  name="plano[]" id="plano" style="width: 140px;" accept="application/pdf"  class="plano">		
														</td>
														<td>	<input type="date"max="2099-01-01" name="fecha_entrega[]" style="width: 160px;"   class="form-control fecha_entrega" required></td>
														<td><input type="button" class="btn btn-danger remove" value="X"></td>
													</tr>
												</tbody>
												
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


<script>
$( function() {
    $("#cliente").change( function() {
        if ($(this).val() != "946370002") {
            $("#input").prop("disabled", true);
        } else {
            $("#input").prop("disabled", false);
        }
    });
});
</script>



<script type="text/javascript">
$('tbody').delegate('')
$('.addRow').on('click',function() {
	addRow();
});
function addRow() {
	var tr='<tr>'+
			'<td><input type="text" name="codsap[]" style="width: 70px;" class="form-control codsap" onkeypress= "return validaNumericos(event)" maxlength="11"></td>'+
			'<td><input type="text" name="unidad[]" style="width: 50px;" class="form-control unidad" onkeypress="return validar(event)" maxlength="30" required></td>'+
			'<td><input type="text" name="cantidad[]" class="form-control cantidad"  onkeypress="return validaNumericos(event)" maxlength="11" required></td>'+
			'<td><input type="text" name="descripcion[]"  class="form-control descripcion" maxlength="50"  required>'+
			'</td>'+
			'<td><select name="tipo[]" style="width:100px ;height:35px; "class="form-control tipo">'+
					'<option>Normal</option>'+
					'<option>Emergencia</option>'+	
			'</select></td>'+
			'<td>	'+
			'<input type="file"  name="plano[]" id="plano" style="width: 140px;" accept="application/pdf"  class="plano" >		'+
			'</td>'+
			'<td>	<input type="date"max="2099-01-01"  name="fecha_entrega[]" style="width: 160px;"   class="form-control fecha_entrega" required></td>'+
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