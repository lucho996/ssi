<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal</title>
</head>
<div style="width: 1100px;
margin: 0px auto;
background: #cccccc;
padding: 35px;">
</div>
</head>
<body >
        <div style="width: 1100px; margin:20px auto;">
            <div style="width: 200px; float:left;  position:relative;">
            @include('intranet.menu')
            </div>    
        <div style="width: 850px; float: right; position:relative;">
        <div class="panel panel-success">
                <div class="panel-heading">
                    <h4>Modificar Personal</h4>
                </div>
               
                <div class="panel-body">
                <form action="{{ route('personal.update', $personal->RUTP)}}" method="POST">
               
                          {{ csrf_field() }}
                          <input name="_method" type="hidden" value="PUT">
                          <tr><div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5>Datos Personales</h5>
                                </div></tr>
                        <table class="table" id="tablapersonal">
        
                    
                        <tr>
                        <td style="width: 300px;"><input type="text" disabled title="Rut de personal"  value="{{$personal->RUTP}}" name="rutp" placeholder="Rut" class="form-control" onkeypress='return validaNumericos(event)' maxlength="9" minlength="9" required></td>
                            <td style="width: 200px;"><input type="text" name="ciudad" placeholder="Ciudad" title="Ciudad"  value="{{$personal->CIUDAD}}" maxlength="30" class="form-control" onkeypress='return validar(event)' required></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="nombre" placeholder="Nombre" title="Nombre del personal"  value="{{$personal->NOMBREP}}" maxlength="30" class="form-control" onkeypress='return validar(event)' required></td>
                            <td><select name="estado_civil" class="form-control" >
                                <option>{{$personal->ESTADO_CIVIL}}</option>  
                                <option>Soltero/a</option>	
                                    <option>Casado/a</option>			
                                    <option>Separado/a</option>
                                    <option>Viudo/a</option>		
                            </select></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="apellido" title="Apellido del personal"  value="{{$personal->APELLIDOP}}" placeholder="Apellido" maxlength="30" class="form-control" onkeypress='return validar(event)' required></td>
                            <td><input type="text" name="telefono" title="Telefono del personal"  value="{{$personal->TELEFONOP}}" placeholder="Telefono" maxlength="9" minlength="9" class="form-control" onkeypress='return validaNumericos(event)'></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="titulos" title="Titulo del personal"  value="{{$personal->TITULO}}" onkeypress='return validar(event)' placeholder="Titulo" class="form-control" ></td>
                            <td><input type="text" name="correo" title="Correo del personal"  value="{{$personal->CORREOP}}" placeholder="Correo" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="fecha_nac" class="form-control"title="Fecha nacimiento del personal"  value="{{$personal->FECHANACIMIENTO}}"  placeholder="Fecha de nacimiento" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" required></td>
                            <td><input type="text" name="direccion" class="form-control"title="Dirección del personal"  value="{{$personal->DIRECCION}}" placeholder="Dirección"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="nombre_conyuge" class="form-control" title="Nombre conyuge del personal"  value="{{$personal->NOMBRE_CONYUGE}}" placeholder="Nombre Conyuge" onkeypress='return validar(event)'></td>
                            <td><input type="text" name="telefono_conyuge" class="form-control" title="Telefono conyuge del personal"  value="{{$personal->TELEFONO_CONYUGE}}" placeholder="Telefono Conyuge" onkeypress='return validarNumericos(event)'></td>
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
                            <th><a href="#" class="add" style="margin-left:8px; "><span class="btn btn-primary">+</span></a></th>
        
                        
                    </thead>
                    
                    
                    <tbody>
                    @foreach ($carga as $item)
                    <tr>
                    <td><input type="text" name="rut[]" value="{{$item->RUT}}" class="form-control rut" placeholder="RUT"></td>
                    <td><input type="text" name="nombre_completo[]" value="{{$item->NOMBRE}}" class="form-control nombre_completo" placeholder="Nombre Completo" </td>
                    <td><input type="date" name="fecha_nacimiento[]"value="{{$item->FECHA_NACIMIENTO}}" class="form-control fecha_nacimiento" placeholder="Fecha Nacimiento" ></td>
                        <td><a href="#" class="btn btn-danger removee">X</a></td>
                    </tr>
                    @endforeach
                    </tbody>
        
        
                    </table>
                </div>
                    
                            <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5>Datos del Contrato</h5>
                                    </div>
        
        
                                
                                    <br>
                
                                    
                <a href="#" class="addRow" style="margin-left:8px; "><span class="btn btn-success">Agregar Cargo</span></a>
                                            
                                        
                    <table class="table " id="tablacargo" style="width: 350px;">
                            <tr>
                                    <td>
                                        
                                    <select name="cargo[]"  class="form-control cargo" required>
                                    @foreach ($cargo as $item)
                                    <option value="{{$item->ID_CARGO}}">{{$item->CARGO}}</option>

                                    @endforeach
                                    </select>
                                    </td>
                                    <td>
                                    <a href="#" class="btn btn-danger remove">X</a>
                                    </td>
                    
                                    </tr>
                    
                    </table>
                
        
        
                    <table class="table">
                            <tr>
                            <td style="width: 200px;">
                            <select name="lugar_trabajo"  class="form-control" >
                                    <option>{{$personal->LUGAR_TRABAJO}}</option>
                                    <option>Taller</option>	
                                    <option>Taller Abastible</option>			
                                    <option>Taller Petroquim</option>		
                            </select></td>
                            <td style="width: 200px;"><input type="text" title="AFP del personal"  value="{{$personal->AFP}}" name="afp" placeholder="AFP" maxlength="30" class="form-control"  required></td>
                            <td style="width: 200px;"> <input type="text" name="prevision" title="Previsión del personal"  value="{{$personal->PREVISION}}" class="form-control" placeholder="Previción" ></td>
                            </tr>
                            <tr>
                                <td><input type="text" title="Sueldo base del personal"  value="{{$personal->SUELDO_BASE}}" name="sueldo_base" placeholder="Sueldo Base"  maxlength="11" class="form-control" onkeypress='return validarNumerico(event)' required></td>
                                <td><input type="text" name="gratificacion" title="Gratificación del personal"  value="{{$personal->GRATIFICACION}}" placeholder="Gratificación"  maxlength="30" class="form-control" onkeypress='return validarNumerico(event)' required></td>
                                <td><input type="text" name="movilizacion" title="Movilización del personal"  value="{{$personal->MOVILIZACION}}" placeholder="Movilización"  maxlength="30" class="form-control" onkeypress='return validarNumeric(event)' required></td>
        
                            </tr>
                            <tr>
                                <td><input type="text"title="Colación del personal"  value="{{$personal->COLACION}}"  name="colacion" placeholder="Colación" maxlength="30" class="form-control" onkeypress='return validarNumerico(event)' required></td>
                                <td><input type="text" name="fecha_inicio_c"title="Fecha inicio de contrato del personal"  value="{{$personal->FECHA_INICIO_CONTRATO}}" class="form-control" placeholder="Inicio de Contrato" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" required></td>
                                <td><input type="text" title="Fecha termino de contrato del personal"  value="{{$personal->FECHA_TERMINO_CONTRATO}}" name="fecha_termino_c" class="form-control" placeholder="Final de Contrato" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" required></td>
        
                            </tr>
                            <tr>
                                <td><input type="text" name="talla_ropa" title="Talla de ropa del personal"  value="{{$personal->TALLA_ROPA}}"   placeholder="Talla de la ropa" class="form-control" ></td>
                                <td><input type="text" name="num_zapato" title="Numero de zapatos del personal"  value="{{$personal->NZAPATO}}"placeholder="Numero De Zapatos" class="form-control"></td>
                            </tr>
                            
                            
                        </table>
            </div>
                        
                            
            <input type="submit" value="Guardar" class="btn btn-success">
                      
                </form>
              </div>
          </div>

          @if(Session::has('message'))
          <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
      @endif
  
</div>
</div>
</body>
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
                                        
                '<select name="cargo[]"  class="form-control cargo" required>'+
                '@foreach ($cargo as $item)'+
                '<option value="{{$item->ID_CARGO}}">{{$item->CARGO}}</option>'+

                '@endforeach'+
                '</select>'+
                '</td>'+
                '<td>'+
                '<a href="#" class="btn btn-danger remove">X</a>'+
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
				'<td><a href="#" class="btn btn-danger removee">X</a>'+
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