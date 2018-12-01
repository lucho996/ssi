@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cargos</title>
</head>
<body>
        <div style="width:100%; max-width: 1100px; margin:0px auto;">
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
                            <th>Cargo</th>
                            <th>Descripción</th>
                            <th>Fecha Cargo</th>
                            <th>Acción</th>

                        </thead>
                        <tbody>
                            @foreach($cargos as $cargos)
                        
                            <tr>
                            <td>{{$cargos->CARGO}}</td>
                                <td>{{$cargos->DESCRIPCION}}</td>
                                <td>{{$cargos->FECHA_CARGO}}</td>
                             
                                <td>
                                {!! Form::open(['route' =>['personal.destroy_c', $cargos->ID_CARGO_PERSONAL],
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
       
                <form  action="{{ action('PersonalController@store_cargos')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="rutpu" value="{{$personal->RUTP}}" >
                <p>
                    
                    <select name="cargoss" class="form-control" style="height:35px ;">
                    @foreach ($carg as $carg)
                    <option value="{{$carg->ID_CARGO}}">{{$carg->CARGO}}</option> 
                    @endforeach
                </select>
                </p>

             
                    <input type="submit" value="Guardar" name="guardar" class="btn btn-success">
                    <a href="/personal/edit/{{$personal->RUTP}}" class="btn btn-default">Volver</a>
                </p>
            </form>
    </div>
</div>
            </body>

 <script type="text/javascript" src="{{ URL::asset('js/live.js') }}"></script>

</html>