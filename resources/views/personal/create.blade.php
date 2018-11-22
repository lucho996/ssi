@include('layouts.app')
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Personal</title>
	<style>
		.badge {
			float: right;
		}
		thead th input { 
	background:url('/images/png/mas.png' ) no-repeat; border:none;  width:40px; height:40px;; 
	background-size: 40px;}
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
    		<div id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav" style="display: inline;">
					@can('personal')
					<li><a href="/personal">Todos</a></li>	
					@endcan
					@can('personal.create')
					<li class="active"><a href="/personal/create">Nuevo</a></li>
					@endcan
					@can('personal.createc')
					<li><a href="/personal/createc">Nuevo Cargo</a></li>
					@endcan	
        		</ul>
        	</div>
        </div>
    </nav>

	<div class="panel panel-success" style="margin-top:20px;">
  		<div class="panel-heading">
  			<h4>Nuevo personal</h4>
  		</div>

  		<div class="panel-body">
				{!!Form::open(array('route'=>'store2', 'id'=>'frmsave2', 'method'=>'post'))!!}
				{{ csrf_field() }}
				<tr><div class="panel panel-default">
						<div class="panel-heading">
							<h5>Datos Personales</h5>
						</div></tr>
				<table class="table" id="tablapersonal">

			
				<tr>
					<td style="width: 300px;"><input type="text" name="rutp" placeholder="Rut" class="form-control" onkeypress='return validaNumericos(event)' maxlength="9" minlength="9" required></td>
					<td style="width: 200px;"><input type="text" name="ciudad" placeholder="Ciudad" maxlength="30" class="form-control" onkeypress='return validar(event)' required></td>
				</tr>
				<tr>
					<td><input type="text" name="nombre" placeholder="Nombre"  maxlength="30" class="form-control" onkeypress='return validar(event)' required></td>
					<td><select name="estado_civil" style="height: 35px;" class="form-control" >
							<option>Soltero/a</option>	
							<option>Casado/a</option>			
							<option>Separado/a</option>
							<option>Viudo/a</option>		
					</select></td>
				</tr>
				<tr>
					<td><input type="text" name="apellido" placeholder="Apellido" maxlength="30" class="form-control" onkeypress='return validar(event)' required></td>
					<td><input type="text" name="telefono" placeholder="Telefono" maxlength="9" minlength="9" class="form-control" onkeypress='return validaNumericos(event)'></td>
				</tr>
				<tr>
					<td><input type="text" name="titulos"  onkeypress='return validar(event)' placeholder="Titulo" class="form-control" ></td>
					<td><input type="text" name="correo" placeholder="Correo" class="form-control"></td>
				</tr>
				<tr>
					<td><input type="text" name="fecha_nac" class="form-control" placeholder="Fecha de nacimiento" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" required></td>
					<td><input type="text" name="direccion" class="form-control" placeholder="Dirección"></td>
				</tr>
                <tr>
					<td><input type="text" name="nombre_conyuge" class="form-control" placeholder="Persona Emergencia" onkeypress='return validar(event)'></td>
					<td><input type="text" name="telefono_conyuge" class="form-control" placeholder="Telefono Emergencia" onkeypress='return validarNumericos(event)'></td>
				</tr>
			

			</table>

			
		</div>
		<div class="panel panel-default">
				<div class="panel-heading">
					<h5>Carga Familiar</h5>
				</div>


			
			

		<table class="table " id="tabla_cargos_familiar">
			<thead>
				
					<th>Rut</th>
					<th>Nombre</th>
					<th>Fecha Nacimiento</th>
					<th><input type="button"  id="boton"  class="add"></th>

				
			</thead>
			
			
			<tbody>
			<tr>
				<td><input type="text" name="rut[]" class="form-control rut" placeholder="RUT"></td>
				<td><input type="text" name="nombre_completo[]"class="form-control nombre_completo" placeholder="Nombre Completo" </td>
				<td><input type="date" name="fecha_nacimiento[]"class="form-control fecha_nacimiento" placeholder="Fecha Nacimiento" ></td>
				<td><input type="button" class="btn btn-danger remove" value="X"></td>
			</tr>
			</tbody>


			</table>
		</div>
			
					<div class="panel panel-default">
							<div class="panel-heading">
								<h5>Datos del Contrato</h5>
							</div>


						
							<br>
		
							
							
									
								
			<table class="table " id="tablacargo" style="width: 350px;">
					<tr>
							<td><input type="button"  value="Agregar Cargo"  class="btn btn-success addRow"></td>
					</tr>
				<tr>
							<td>
							<select name="cargo[]" style="height: 35px;"  class="form-control cargo" required>
							<option value="" selected="true" disabled="true">Seleccionar Cargos</option>
							@foreach($cargo as $key => $c)
									<option value="{!!$key!!}">{!!$c!!}</option>
									@endforeach
							</select>
							</td>
							<td>
							<input type="button" class="btn btn-danger remove" value="X">
							</td>
			
							</tr>
			
			</table>
		


			<table class="table">

					
					<tr>
					<td style="width: 200px;"><select name="lugar_trabajo"  style="height: 35px;"   class="form-control" >
									<option>Taller</option>	
									<option>Taller Abastible</option>			
									<option>Taller Petroquim</option>		
					</select></td>
					
					<td style="width: 200px;"><input type="text" name="afp" placeholder="AFP" maxlength="30" class="form-control"  required></td>
					<td style="width: 200px;"> <input type="text" name="prevision" class="form-control" placeholder="Previción" ></td>
					</tr>
					<tr>
						<td><input type="text" name="sueldo_base" placeholder="Sueldo Base"  maxlength="11" class="form-control" onkeypress='return validarNumerico(event)' required></td>
						<td><input type="text" name="gratificacion" placeholder="Gratificación"  maxlength="30" class="form-control" onkeypress='return validarNumerico(event)' required></td>
						<td><input type="text" name="movilizacion" placeholder="Movilización"  maxlength="30" class="form-control" onkeypress='return validarNumeric(event)' required></td>

					</tr>
					<tr>
						<td><input type="text" name="colacion" placeholder="Colación" maxlength="30" class="form-control" onkeypress='return validarNumerico(event)' required></td>
						<td><input type="text" name="fecha_inicio_c" class="form-control" placeholder="Inicio de Contrato" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" required></td>
						<td><input type="text" name="fecha_termino_c" class="form-control" placeholder="Final de Contrato" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" required></td>

					</tr>
					<tr>
						<td><input type="text" name="talla_ropa"   placeholder="Talla de la ropa" class="form-control" ></td>
						<td><input type="text" name="num_zapato" placeholder="Numero De Zapatos" class="form-control"></td>
					</tr>
					
					
				</table>
	</div>
                
					
	<input type="submit" value="Guardar" class="btn btn-success">
	{!!Form::close()!!}
		</div>
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


	$('#tablacargo').delegate('')
	$('.addRow').on('click',function() {
		addRow();
	});
	
	function addRow() {
		var tr=
				'<tr>'+
				'<td>'+
				'<select name="cargo[]" style="height: 35px;"   class="form-control cargo" >'+
				'<option value="" selected="true" disabled="true">Seleccionar Cargos</option>'+
				'@foreach($cargo as $key => $c)'+
						'<option value="{!!$key!!}">{!!$c!!}</option>'+
						'@endforeach'+
				'</select>'+
				'</td>'+
				'<td>'+
				'<input type="button" class="btn btn-danger remove" value="X">'+
				'</td>'+

				'</tr>';
				

				$('#tablacargo').append(tr);
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


	$('#tabla_cargos_familiar').delegate('')
	$('.add').on('click',function() {
		add();
	});
	
	function add() {
		var trr=
				'<tr>'+
				'<td><input type="text" name="rut[]" class="form-control rut" placeholder="RUT"></td>'+
				'<td><input type="text" name="nombre_completo[]"class="form-control nombre_completo" placeholder="Nombre Completo" </td>'+
				'<td><input type="date" name="fecha_nacimiento[]"class="form-control fecha_nacimiento" placeholder="Fecha Nacimiento" ></td>'+
				'<td><input type="button" class="btn btn-danger remove" value="X">'+
				'</tr>';
				

				$('#tabla_cargos_familiar').append(trr);
	};
	$('.removee').live('click', function() {
		var l=$('tbody tr').length;
		if (l==1) {
			alert('No se puede eliminar');
		}else{
		$(this).parent().parent().remove();
		}
		

 });
	</script>
</html>