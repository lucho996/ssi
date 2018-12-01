
@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventario</title>
    <style>
		.badge {
			float: right;
		}
	</style>
</head>
<body>
        <div style="width:100%; max-width: 1100px; margin:0px auto;">
                @include('intranet.menu')
             
        <div style="width:100%; max-width: 1100px; float: right; position:relative;">
        <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
 
                  <div  id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" style="display: inline;">
                            @can('inventario')
                          <li class="active"><a href="/inventario">Todos</a></li>
                          @endcan
                          @can('inventario.create')
                          <li><a href="/inventario/create">Nuevo</a></li>
                          @endcan
                      </ul>
                  </div>
              </div>
          </nav>

          <div class="panel panel-success" style="margin-top:20px;">
                <div class="panel-heading">
                    <h4>Lista de Inventario</h4>
                </div>
      
                <div class="panel-body">
                    	<div class="table-responsive">	
                  <table class="table" id="example">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Nombre</th>
                              <th>Ubicación</th>
                              <th>Estado</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($inventario as $inventario)
                              <tr>
                                  <td>{{ $inventario->ID_INVENTARIO }}</td>
                                  <td>{{ $inventario->NOMBRE }}</td>
                                  <td>{{ $inventario->UBICACION }}</td>
                                  <td>{{ $inventario->ESTADO }}</td>
                                  <td>
                                      @can('inventario.show')
                                      <a href="/inventario/show/{{ $inventario->ID_INVENTARIO }}"><img src="images/png/ver.png" alt="" style="width:20px;"></a>                                       
                                      @endcan
                                      @can('inventario.edit')
                                      <a href="/inventario/edit/{{ $inventario->ID_INVENTARIO }}"><img src="images/png/editar.png" alt="" style="width:20px;"></a>                                         
                                      @endcan
                                   </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
                    	</div>
                </div>
            </div>

        </div>
        </div>
</body>
</html>