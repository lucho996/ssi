@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
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
                        @can('clientes')
                        <li class="active"><a href="/clientes">Todos</a></li>
                        @endcan
                        @can('clientes.create')
                            <li><a href="/clientes/create">Nuevo</a></li>
                            @endcan
                        </ul>
                  </div>
              </div>
          </nav>

          <div class="panel panel-success">
                <div class="panel-heading">
                    <h4>Lista de Clientes</h4>
                </div>
      
                <div class="panel-body">
                  <table class="table" id="example">
                      <thead>
                          <tr>
                              <th>Rut</th>
                              <th>Nombre</th>
                              <th>Tipo</th>
                              <th>Acciones</th>
                          </tr>

                      </thead>
                      <tbody>
                          @foreach($clientes as $clientes)
                              <tr>
                                  <td>{{ $clientes->RUT_CLIENTE }}</td>
                                  <td>{{ $clientes->NOMBRE_COMPLETO }}</td>
                                  <td>{{ $clientes->TIPO }}</td>
                                  <td>
                                    @can('clientes.show')
                                    <a href="/clientes/show/{{ $clientes->RUT_CLIENTE }}" ><img src="images/png/ver.png" alt="" style="width:20px;"></a>
                                    @endcan
                                    @can('clientes.edit')
                                    <a href="/clientes/edit/{{$clientes->RUT_CLIENTE}}"><img src="images/png/editar.png" alt="" style="width:20px;"></a>
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