<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
    <style>
		.badge {
			float: right;
		}
	</style>
</head>
<div style="width: 1100px;
margin: 0px auto;
background: #cccccc;
padding: 35px;">
</div>
<body>
        <div style="width: 1100px; margin:20px auto;">
                <div style="width: 200px; float:left; position:relative;">
                @include('intranet.menu')
                </div>    
        <div style="width: 850px; float: right; position:relative;">
        <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                    </div>
                  <div  id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                          <li class="active"><a href="/inventario">Todos</a></li>
                          <li><a href="/inventario/create">Nuevo</a></li>
                      </ul>
                  </div>
              </div>
          </nav>

          <div class="panel panel-success">
                <div class="panel-heading">
                    <h4>Lista de Inventario</h4>
                </div>
      
                <div class="panel-body">
                  <table class="table ">
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
                                      <a href="/inventario/show/{{ $inventario->ID_INVENTARIO }}"><span class="label label-info">Ver</span></a>
                                      <a href="/inventario/edit/{{ $inventario->ID_INVENTARIO }}"><span class="label label-success">Editar</span></a>
                                   </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
                </div>
            </div>

        </div>
        </div>
</body>
</html>