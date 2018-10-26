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
                          <p>
                                <input type="text" name="rut" placeholder="Rut" value=" {{$personal->RUTP}}" class="form-control" onkeypress='return validaNumericos(event)' maxlength="9" minlength="9" required>
                            </p>
                            <p>
                                <input type="text" name="nombre" placeholder="Nombre" value=" {{$personal->NOMBREP}}" maxlength="30" class="form-control" onkeypress='return validar(event)' required>
                            </p>
                            <p>
                                <input type="text" name="apellido" placeholder="Apellido" value=" {{$personal->APELLIDOP}}" maxlength="30" class="form-control" onkeypress='return validar(event)' required>
                            </p>	
                            <p>
                                <input type="text" name="telefono" placeholder="Telefono" value=" {{$personal->TELEFONOP}}" maxlength="9" minlength="9" class="form-control" onkeypress='return validaNumericos(event)'>
                            </p>
                            <p>
                                <input type="text" name="correo" placeholder="Correo" value=" {{$personal->CORREOP}}" class="form-control">
                            </p>
                            <p>
                                <input type="text" name="hh" placeholder="Hora Hombre" value=" {{$personal->HORAHOMBRE}}" class="form-control" onkeypress='return validaNumericos(event)' required>
                            </p>
                            <p>
                                <input type="text" name="fecha_nac" class="form-control" value=" {{$personal->FECHANACIMIENTO}}" placeholder="Fecha de nacimiento" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" required>
                            </p>
                            <p>
                                <input type="text" name="direccion" placeholder="Dirección"  value=" {{$personal->DIRECCION}}"class="form-control" required>
                            </p>
                            <p>
                                <select name="tipo" class="form-control" >
            
                                            <option>Taller</option>
                                            
                                            <option>Abastible</option>
                                            
                                            <option>Petroquim</option>
                                            
                                </select>
                           

                            </p>
                            <p>
                                <input type="submit" value="Guardar" class="btn btn-success">
                          <a href="/personal" class="btn btn-default">Regresar</a>
                      </p>
                      
               
              </div>
          </div>

          @if(Session::has('message'))
          <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
      @endif
  </form>
</div>
</div>
</body>
</html>