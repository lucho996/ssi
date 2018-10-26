<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                    <h4>Modificar Equipos o Herramientas</h4>
                </div>
               
                <div class="panel-body">
                <form action="{{ route('inventario.update', $inventario->ID_INVENTARIO)}}" method="POST">
               
                          {{ csrf_field() }}
                          <input name="_method" type="hidden" value="PUT">
                      <p>   
                          <input type="text" name="codigo" value="{{ $inventario->ID_INVENTARIO }}" placeholder="Codigo" class="form-control" onkeypress='return validaNumericos(event)' maxlength="9" minlength="9" required>
                      </p>
                      <p>   
                            <input type="text" name="nombre" value="{{ $inventario->NOMBRE }}" placeholder="Nombre" class="form-control" onkeypress='return validaNumericos(event)' maxlength="20"  required>
                        </p>
                      <p>
                          <input type="text" name="marca" value="{{ $inventario->MARCA }}" placeholder="Marca" maxlength="50" class="form-control" onkeypress='return validar(event)' required>
                      </p>
                      <p>
                            <select name="ubicacion" class="form-control" >
                                <option>Taller Abastible</option>
                                <option>Taller Petroquim</option>
                                <option>Taller</option>          
                            </select>
                        </p>
        
                        <p>
                            <input type="text" name="valor" value="{{ $inventario->VALOR }}" placeholder="Valor" maxlength="9" class="form-control" onkeypress='return validaNumericos(event)' required>
                        </p>
        
                        <p>
                            <select name="estado" class="form-control" >
                                        <option>Defectuoso</option>
                                        <option>En uso</option>
                                        <option>Disponible</option>        
                            </select>
                        </p>
                      <p>
                          <input type="submit" value="Guardar" class="btn btn-success">
                          <a href="/inventario" class="btn btn-default">Regresar</a>
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