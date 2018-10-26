
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <title>Modificar Cliente</title>
</head>
<div style="width: 1100px;
margin: 0px auto;
background: #cccccc;
padding: 35px;">
</div>
        <body >
                <div style="width: 1100px; margin:20px auto;">
                    <div style="width: 200px; float:left;  position:relative;">
                    @include('intranet.menu')
                    </div>    
                <div style="width: 850px; float: right; position:relative;">
        <div class="panel panel-success">
                <div class="panel-heading">
                    <h4>Modificar cliente</h4>
                </div>
               
                <div class="panel-body">
                <form action="{{ route('clientes.update', $clientes->RUT_CLIENTE)}}" method="POST">
               
                          {{ csrf_field() }}
                          <input name="_method" type="hidden" value="PUT">
                      <p>   
                          <input type="text" name="rut" value="{{ $clientes->RUT_CLIENTE }}" placeholder="Rut" class="form-control" onkeypress='return validaNumericos(event)' maxlength="9" minlength="9" required>
                      </p>
                      <p>
                          <input type="text" name="nombre" value="{{ $clientes->NOMBRE_COMPLETO }}" placeholder="Nombre" maxlength="50" class="form-control" onkeypress='return validar(event)' required>
                      </p>
                      <p>
                          <input type="text" name="direccion" value="{{ $clientes->DIRECCION }}" placeholder="Dirección" maxlength="50" class="form-control" required>
                      </p>	
                      <p>
                          <input type="text" name="ciudad" value="{{ $clientes->CIUDAD }}" placeholder="Ciudad" maxlength="50" class="form-control" onkeypress='return validar(event)'>
                      </p>
                      <p>
                          <input type="text" name="comuna" placeholder="Comuna" value="{{ $clientes->COMUNA }}"class="form-control" onkeypress='return validar(event)'>
                      </p>
                      <p>
                          <input type="text" name="giro" placeholder="Giro" value="{{ $clientes->GIRO }}" class="form-control" onkeypress='return validar(event)' required>
                      </p>
                      <p>
                          <input type="text" name="telefono" placeholder="Telefono" value="{{ $clientes->TELEFONO }}" maxlength="9" minlength="9" class="form-control" onkeypress='return validaNumericos(event)'>
      
                      </p>
                      <p>
                          <select name="tipo" class="form-control" value="{{ $clientes->TIPO}}" >
      
                                

                                <option >{{$clientes->TIPO}}</option>
                                <option >FIJO</option>
                                <option >ESPORADICO</option>
                               
                              
                          </select>
                          
                      </p>
                      <p>
                          <input type="submit" value="Guardar" class="btn btn-success">
                          <a href="/clientes" class="btn btn-default">Regresar</a>
                      </p>
                      
               
              </div>
          </div>

          @if(Session::has('message'))
          <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
      @endif
                </div>
                </div>
  </form>

</body>
</html>