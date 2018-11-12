@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal</title>
</head>

</head>
<body >
        <div style="width: 1100px; margin:0px auto;">
            <div style="width: 200px; float:left;  position:relative;">
            @include('intranet.menu')
            </div>    
        <div style="width: 850px; float: right; position:relative;">
        <div class="panel panel-success" style="margin-top:20px;">
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
                            <td><select name="estado_civil" style="height: 35px;" class="form-control" >
                                    <option value="Solero/a" @if($personal->ESTADO_CIVIL =='Solero/a') selected @endif>Solero/a</option>
                                    <option value="Casado/a" @if($personal->ESTADO_CIVIL =='Casado/a') selected @endif>Casado/a</option>
                                    <option value="Separado/a" @if($personal->ESTADO_CIVIL =='Separado/a') selected @endif>Separado/a</option>
                                    <option value="Viudo/a" @if($personal->ESTADO_CIVIL =='Viudo/a') selected @endif>Viudo/a</option>  
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

        
        <!--tabla carga-->
            <a href="/personal/carga_familiar/{{$personal->RUTP}}" class="btn btn-success">Modificar Cargas familiares</a>  
                 <a href="/personal/cargos/{{$personal->RUTP}}" class="btn btn-success">Modificar Cargos</a>   

              
                   
                            <div class="panel panel-default" style="margin-top:20px;">
                                    <div class="panel-heading">
                                        <h5>Datos del Contrato</h5>
                                    </div>
        
        
                                
                                    <br>
                
  <!-- Tabla CARGOS-->
                
        
        
                    <table class="table">
                            <tr>
                            <td style="width: 200px;">
                                    <select name="lugar_trabajo" style="height: 35px;" class="form-control" >
                                            <option value="Taller" @if($personal->LUGAR_TRABAJO =='Taller') selected @endif>Taller</option>
                                            <option value="Taller Abastible" @if($personal->LUGAR_TRABAJO =='Taller Abastible') selected @endif>Taller Abastible</option>
                                            <option value="Taller Petroquim" @if($personal->LUGAR_TRABAJO =='Taller Petroquim') selected @endif>Taller Petroquim</option> 
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
                        
                            
            <input type="submit" value="Actualizar" class="btn btn-success">
            <a href="/personal" class="btn btn-default">Volver</a>
                      
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
<!---->
</html>