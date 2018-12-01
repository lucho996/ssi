@include('layouts.app')
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Orden de Compra</title>
	<style>
		.badge {
			float: right;
		}
	</style>
</head>
<body >
	<div style="width:100%; max-width: 1100px; margin:0px auto;">
		@include('intranet.menu')
	
	<div style="width:100%; max-width: 1100px; float: right; position:relative;"> 
            {!!Form::open(array('route'=>'store_orden', 'id'=>'frmsave', 'method'=>'post','files'=>true))!!}
                                {{ csrf_field() }}
                    <div class="panel panel-success"style="width:100%; margin-top:20px;">
                            <div class="panel-heading">
                            <h4>Agregar Orden de Compra</h4>
                                </div>
                        
                            <div class="panel-body">
                            <input type="hidden" name="run_c" value="{{$cotizacion->RUT_CLIENTE}}">
                            <input type="hidden" name="id_cot" value="{{$cotizacion->ID_COTIZACION}}">
                            <p>
                                <input type="text" name="num_orden" placeholder="Numero de orden" maxlength="11" class="form-control" onkeypress='return validarNumericos(event)' required>
                            </p>
                            
                            <p>
                                <input type="file" required name="ruta" >
                            </p>
                            <input type="submit" value="Guardar" class="btn btn-success">
                            <a href="/cotizacion" class="btn btn-default">Volver</a>
            
    </div>
    @if(Session::has('message'))
    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
@endif
    </div>
    


                  
    </body>
</html>