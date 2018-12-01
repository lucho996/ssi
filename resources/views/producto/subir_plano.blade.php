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
        <div style="width:100%; max-width: 1100px; margin:0px auto;">
            @include('intranet.menu')
         
        <div style="width:100%; max-width: 1100px; float: right; position:relative;">
        <div class="panel panel-success" style="margin-top:20px;">
                <div class="panel-heading">
                    <h4>Modificar o Subir Plano</h4>
                </div>
               
                <div class="panel-body">
                <form action="{{ route('producto.update_p', $producto->ID_PRODUCTO)}}" method="POST" enctype="multipart/form-data">
               
                          {{ csrf_field() }}
                          <input name="_method" type="hidden" value="PUT">

<p>
                                <input type="file" name="plano" id="plano"value="{{$producto->PLANO_PRODUCTO}}" class="custom-file"  required>
                            </p>
            
                            
                      
                            <input type="submit" value="Actualizar" class="btn btn-success">
                            <a href="javascript:history.back(-1);" class="btn btn-default">Volver</a>
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