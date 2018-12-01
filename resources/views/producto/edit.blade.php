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
                    <h4>Modificar Productos</h4>
                </div>
               
                <div class="panel-body">
                <form action="{{ route('producto.update', $producto->ID_PRODUCTO)}}" method="POST" enctype="multipart/form-data">
               
                          {{ csrf_field() }}
                          <input name="_method" type="hidden" value="PUT">

                            <p>
                                <input type="text" name="fecha_entrega" value="{{$producto->FECHA_DE_ENTREGA_PRODUCTO}}"placeholder="Fecha entrega producto" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" id="fecha_llegada" class="form-control" required>
                            </p>
                            <p>
                                <input type="text" name="descripcion" value="{{$producto->DESCRIPCION}}" placeholder="Descripción" class="form-control" maxlength="50"  required>
                            </p>
                            <p>
                            <a href="/producto/subir_plano/{{$producto->ID_PRODUCTO}}" class="btn btn-primary">Subir o Modificar Plano</a>
                               
                            </p>
            
                            <p>
                                <select name="tipo" style="height: 35px;" class="form-control" >
                                <option value="Normal" @if($producto->TIPO_PRODUCTO =='Normal') selected @endif>Normal</option>
                                <option value="Emergencia" @if($producto->TIPO_PRODUCTO == 'Emergencia') selected @endif>Emergencia</option>           
                                </select>					
                            </p>
                            <p>
                                <input type="submit" value="Actualizar" class="btn btn-success">
                                <a href="javascript:history.back(-1);" class="btn btn-default" title="Ir la página anterior">Regresar</a>
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