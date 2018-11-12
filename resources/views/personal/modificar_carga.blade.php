@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar Carga</title>
</head>
<body>
    <div style="width: 1100px; margin:0px auto;">
        <div style="width: 200px; float:left;  position:relative;">
        @include('intranet.menu')
        </div>    
    <div style="width: 850px; float: right; position:relative;">
    <div class="panel panel-success" style="margin-top:20px;">
            <div class="panel-heading">
                <h4>Modificar Carga Familiar</h4>
            </div>
           
            <div class="panel-body">
            <form action="{{ route('personal.updatee', $carga_familiar->ID_CARGA_FAMILIAR)}}" method="POST">
           
                      {{ csrf_field() }}
                      <input name="_method" type="hidden" value="PUT">

                      <p>
                      <input type="text" name="rut" placeholder="RUT" value="{{$carga_familiar->RUT}}" maxlength="50" class="form-control" onkeypress='return validar(event)' required>
                    </p>
                    <p>
                        <input type="text" name="nombre" placeholder="Nombre" value="{{$carga_familiar->NOMBRE}}" maxlength="50" class="form-control" onkeypress='return validar(event)' required>
                    </p>	
                    <p>
                        <input type="date" name="fecha_nacimiento" placeholder="Marca" value="{{$carga_familiar->FECHA_NACIMIENTO}}" maxlength="50" class="form-control" onkeypress='return validar(event)' required>
                    </p>
    
                    <p>
                 
                        <input type="submit" value="Guardar" name="guardar" class="btn btn-success">
                        <a href="javascript:history.go(-2);" class="btn btn-default">Volver</a>
                    </p>
                    

            </form>
            </div>
    </div>
    @if(Session::has('message'))
    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
@endif
    </div>

    </div>
    
</body>
</html>