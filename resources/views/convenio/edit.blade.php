
@extends('layouts.app')
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

        <body >
            @section('content')
                
            
                <div style="width: 1100px; margin:0px auto;">
                    <div style="width: 200px; float:left;  position:relative;">
                    @include('intranet.menu')
                    </div>    
                <div style="width: 850px; float: right; position:relative;">
        <div class="panel panel-success" style="margin-top: 20px;">
                <div class="panel-heading">
                    <h4>Modificar cliente</h4>
                </div>
               
                <div class="panel-body">
                <form action="{{ route('convenio.update', $convenio->ID_CONVENIO)}}" method="POST">
               
                          {{ csrf_field() }}
                          <input name="_method" type="hidden" value="PUT">
                          <p>
                                <select name="cliente" style="height:30px ;" class="form-control" >
                                        @foreach($clientes as $cliente)
                                            <option value="{{$cliente->RUT_CLIENTE}}">{{$cliente->NOMBRE_COMPLETO}}</option>
                                        @endforeach
                        
                                </select>				
                            </p>
                            <p>
                                <input type="text" name="numero_convenio"placeholder="N° convenio" class="form-control" required>
                            </p>
                            <p>
                                <input type="text" name="fecha_emision"placeholder="Fecha Emision" class="form-control"onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" id="fecha_emision"  required>
                            </p>
                            <p>
                                <input type="text" name="fecha_inicio" placeholder="Fecha inicio de convenio" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" id="fecha_inicio" class="form-control" required>
                            </p>
                            <p>
                                <input type="text" name="fecha_final" placeholder="Fecha final de convenio" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" id="fecha_inicio" class="form-control">
                
                            </p>
                            <p>
                                <input type="text" name="condicion_pago"placeholder="Condiciones de pago" class="form-control" required>
                            </p>
                            <p>
                                <input type="text" name="nombre_persona"placeholder="Nombre de persona a cargo" class="form-control" required>
                            </p>
                            <p>
                                <input type="text" name="telefono_persona"placeholder="Télefono de persona a cargo" class="form-control" required>
                            </p>
                            <p>
                                <input type="text" name="correo_persona"placeholder="Correo de persona a cargo" class="form-control" required>
                            </p>
                      <p>
                          <input type="submit" value="Actualizar" class="btn btn-success">
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
  @endsection
</body>
</html>