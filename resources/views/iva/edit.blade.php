@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

</head>
<body >
        <div style="width:100%; max-width: 1100px; margin:0px auto;">
            @include('intranet.menu')
         
        <div style="width:100%; max-width: 1100px; float: right; position:relative;">
        <div class="panel panel-success" style="margin-top:20px;">
                <div class="panel-heading">
                    <h4>Modificar IVA</h4>
                </div>
               
                <div class="panel-body">
                <form action="{{ route('iva.update', $iva->ID_IVA)}}" method="POST">
               
                          {{ csrf_field() }}
                          <input name="_method" type="hidden" value="PUT">
                          <p>
                          <input type="text" name="iva" value="{{$iva->IVA}}" placeholder="Rut" maxlength="9" minlength="9" class="form-control" onkeypress='return validaNumericos(event)' required>
                            </p>
                            <p>
                                <input type="text" name="nombre" value="{{$proveedor->NOMBRE}}" placeholder="Nombre" maxlength="50" class="form-control" onkeypress='return validar(event)' required>
                            </p>
                           <p>
                                <input type="submit" value="Actualizar" class="btn btn-success">
                                <a href="/proveedor" class="btn btn-default">Regresar</a>
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