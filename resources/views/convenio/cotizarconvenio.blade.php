@include('layouts.app')
<!doctype html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Clientes</title>

</head>
<style>
		thead th input { 
	background:url('/images/png/mas.png' ) no-repeat; border:none;  width:40px; height:40px;; 
	background-size: 40px;}
</style>
<body >

	<div style="width:100%; max-width: 1100px; margin:0px auto;">
			@include('intranet.menu')
		
		<div style="width:100%; max-width: 1100px; float: right; position:relative;"> 
				<nav class="navbar navbar-default" role="navigation">
						<div class="container-fluid">
				
						  <div  id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav" style="display: inline;">
                                        @can('convenio')
                                      <li ><a href="/convenio">Todos</a></li>
                                      @endcan
                                      
                                      @can('convenio.cotizarconvenio')
                                    
                                            <li class="active"><a href="/convenio/cotizarconvenio">Nuevo Convenio</a></li>	
                                    
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
						<input type="text" name="numero_convenio" maxlength="11" placeholder="N° convenio" class="form-control" required>
					</p>
					<p>
						<input type="text" name="fecha_emision"placeholder="Fecha Emision" class="form-control"onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" id="fecha_emision"  required>
					</p>
					<p>
						<input type="text" name="fecha_inicio" placeholder="Fecha inicio de convenio" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" id="fecha_inicio" class="form-control" required>
					</p>
					<p>
						<input type="text" name="fecha_final" placeholder="Fecha final de convenio" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" id="fecha_inicio" class="form-control">
		
					</p>
					<p>
						<input type="text" name="condicion_pago" maxlength="50" placeholder="Condiciones de pago" class="form-control" required>
					</p>
					<p>
						<input type="text" name="nombre_persona" maxlength="50" placeholder="Nombre de persona a cargo" class="form-control" required>
					</p>
					<p>
						<input type="text" name="telefono_persona" maxlength="9" minlength="9" placeholder="Télefono de persona a cargo" class="form-control" required>
					</p>
					<p>
						<input type="email" name="correo_persona"placeholder="Correo de persona a cargo" class="form-control" required>
					</p>
				</div>
			</div>
			
				<br><div class="panel panel-success" style="width:100%;"> 
						<div class="panel-heading">
						<h4>Datos de Producto</h4>
							</div>
						<div class="panel-body">
									
						<div class="form-group">
								<div class="table-responsive">	
								<table class="table" style="width:100%">
										<thead>
                                                <th>Cod Sap</th>
                                                <th>Descripción</th>
                                                <th>Unidad</th>
                                                <th>Cantidad</th>
                                                
                                              
                                                <th>Plano</th>
                                             
												
												<th><input type="button"  id="boton"  class="addRow"></th>
											
												
												<!--<input type="button" value="Agregar" class="addRow"/>-->
											
										</thead>
										<tbody style="width:100%;">
											<tr>
													<td><input type="text" name="codsap[]" style="width:100%; max-width: 70px;" class="form-control codsap" onkeypress="return validaNumericos(event)" maxlength="11"></td>
                                                    <td><input type="text" name="descripcion[]"  class="form-control descripcion" maxlength="50"  required>
													</td>
                                                    <td><input type="text" name="unidad[]" style="width:100%; max-width: 50px;" class="form-control unidad" onkeypress="return validar(event)" maxlength="30" required></td>
                                                    <td><input type="text" name="cantidad[]" style="width:100%;"class="form-control cantidad"  onkeypress="return validaNumericos(event)" maxlength="11" required></td>
												
													
													
													
													
												
												<td>	
													<input type="file"  name="plano[]" id="plano" style="width:100%; max-width: 140px;" accept="application/pdf"  class="plano">		
												</td>
												
												<td><input type="button" style="width:100%;" class="btn btn-danger remove" value="X"></td>
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
var tr=	'<tr>'+
		'<td><input type="text" name="codsap[]" style="width:100%; max-width: 70px;" class="form-control codsap" onkeypress="return validaNumericos(event)" maxlength="11"></td>'+
		'<td><input type="text" name="descripcion[]"  class="form-control descripcion" maxlength="50"  required>'+
		'</td>'	+	
		'<td><input type="text" name="unidad[]" style="width:100%; max-width: 50px;" class="form-control unidad" onkeypress="return validar(event)" maxlength="30" required></td>'+
		'<td><input type="text" name="cantidad[]" style="width:100%;"class="form-control cantidad"  onkeypress="return validaNumericos(event)" maxlength="11" required></td>'+
	'<td>	'+
		'<input type="file"  name="plano[]" id="plano" style="width:100%; max-width: 140px;" accept="application/pdf"  class="plano">'	+
	'</td>'+
	
	'<td><input type="button" style="width:100%;" class="btn btn-danger remove" value="X"></td>'+
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