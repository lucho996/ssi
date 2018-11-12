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
        <div style="width: 1100px; margin:0px auto;">
                <div style="width: 200px; float:left;  position:relative;">
                @include('intranet.menu')
                </div>    
            <div style="width: 850px; float: right; position:relative;">
            <div class="panel panel-success" style="margin-top:20px;">
                    <div class="panel-heading">
                        <h4>Carga Familiar del Personal</h4>
                    </div>
                   
                    <div class="panel-body">

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
                                    <a href=""><img src="/images/png/editar.png" style="width: 25px;" alt=""></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                

               

                    </div>
            </div>
            <div class="panel panel-success" style="margin-top:20px;">
                    <div class="panel-heading">
                        <h4>Agregar Nueva Carga</h4>
                    </div>
                   
                    <div class="panel-body">        
       
            <form  action="{{ action('PersonalController@store_carga')}}" method="post">
            {{ csrf_field() }}
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
                </p>
            </form>
    </div>
</div>
            </body>

 <script type="text/javascript" src="{{ URL::asset('js/live.js') }}"></script>

</html>