@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carga Familiar</title>
</head>
<body>
        <div style="width:100%; max-width:1100px; margin:0px auto;">
                @include('intranet.menu')
             
            <div style="width:100%; max-width: 1100px; float: right; position:relative;">
            <div class="panel panel-success" style="margin-top:20px;">
                    <div class="panel-heading">
                        <h4>Carga Familiar del Personal</h4>
                    </div>
                   
                    <div class="panel-body">
                        	<div class="table-responsive">	
                    <table class="table ">
                        <thead>
                            <th>RUT</th>
                            <th>Nombre</th>
                            <th>Fecha Nacimiento</th>
                            <th>Acción</th>

                        </thead>
                        <tbody>
                            @foreach($cargas as $cargas)
                        
                            <tr>
                            <td>{{$cargas->RUT}}</td>
                                <td>{{$cargas->NOMBRE}}</td>
                                <td>{{$cargas->FECHA_NACIMIENTO}}</td>
                             
                                <td>
                                <a href="/personal/modificar_carga/{{$cargas->ID_CARGA_FAMILIAR}}"><img src="/images/png/editar.png" style="width: 25px;" alt=""></a>
                                {!! Form::open(['route' =>['personal.destroy', $cargas->ID_CARGA_FAMILIAR],
                                    'method'=>'DELETE', 'onsubmit' => 'return confirm("¿Estas Seguro si desea ELIMINAR?")'])!!}
                                    <button >
                                    <img src="/images/png/borrar.png" style="width:20px; float:left; " alt="">
                                </button>
                                    {!!Form::close()!!}
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                        	</div>

               

                    </div>
            </div>
            <div class="panel panel-success" style="margin-top:20px;">
                    <div class="panel-heading">
                        <h4>Agregar Nueva Carga</h4>
                    </div>
                   
                    <div class="panel-body">        
       
                <form  action="{{ action('PersonalController@store_carga')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="rutpu" value="{{$personal->RUTP}}" >
                <p>
                    <input type="text" name="rut" placeholder="RUT" maxlength="50" class="form-control" onkeypress='return validar(event)' required>
                </p>
			    <p>
					<input type="text" name="nombre" placeholder="Nombre" maxlength="50" class="form-control" onkeypress='return validar(event)' required>
                </p>	
				<p>
                    <input type="date" name="fecha_nacimiento" placeholder="Marca" maxlength="50" class="form-control" onkeypress='return validar(event)' required>
				</p>

                <p>
             
                    <input type="submit" value="Guardar" name="guardar" class="btn btn-success">
                    <a href="/personal/edit/{{$personal->RUTP}}" class="btn btn-default">Volver</a>
                </p>
            </form>
    </div>
</div>
            </body>

 <script type="text/javascript" src="{{ URL::asset('js/live.js') }}"></script>

</html>