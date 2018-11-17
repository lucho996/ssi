@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Convenios</title>
    <style>
		.badge {
			float: right;
		}
	</style>
</head>

<body>

        
        <div style="width: 1100px; margin:0px auto;">
        <div style="width: 200px; float:left; position:relative;">
        @include('intranet.menu')
        </div>    
        <div style="width: 850px; float: right; position:relative;">
        <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                  <div id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" style="display:inline; float:right;">
                        @can('convenio')
                        <li class="active"><a href="/convenio">Todos</a></li>
                        @endcan
                        @can('convenio.create')
                            <li><a href="/convenio/create">Nuevo</a></li>
                            @endcan
                        </ul>
                  </div>
              </div>
          </nav>

          <div class="panel panel-success">
                <div class="panel-heading">
                    <h4>Lista de Convenios</h4>
                </div>
      
                <div class="panel-body">
                  <table class="table" id="example">
                      <thead>
                          <tr>
                                <th>RUT Cliente</th>
                                <th>Nombre Cliente</th>
                              <th>Fecha Inicio</th>
                              <th>Fecha Termino</th>
                              <th>Total</th>
                              <th>Acciones</th>
                          </tr>

                      </thead>
                      <tbody>
                            @foreach($convenio as $convenio)
                              <tr>


                                <td>{{ $convenio->RUT_CLIENTE }}</td>
                                <td>{{ $convenio->NOMBRE_COMPLETO }}</td>
                                <td>{{ $convenio->FECHA_INICIO }}</td>
                                <td>{{ $convenio->FECHA_TERMINO }}</td>
                                <td>{{ $convenio->TOTAL }}</td>
                                <td>
                                    @can('convenio.show')
                                    <a href="/convenio/show/{{ $convenio->ID_CONVENIO }}" ><img src="images/png/ver.png" alt="" style="width:20px;"></a>
                                    @endcan
                                    @can('convenio.edit')
                                    <a href="/convenio/edit/{{$convenio->ID_CONVENIO}}"><img src="images/png/editar.png" alt="" style="width:20px;"></a>
                                    @endcan
                                </td>
                                
                              </tr>
                              @endforeach
                      </tbody>
                  </table>
                </div>
            </div>
          @if(Session::has('message'))
            <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
        @endif
        </div>
        </div>

    
</body>
</html>