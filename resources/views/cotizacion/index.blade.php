<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cotizaciones</title>
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
<body >
	<div style="width: 1100px; margin:20px auto;">
		<div style="width: 200px; float:left;  position:relative;">
		@include('intranet.menu')
		</div>
	<div style="width: 850px; float: right; position:relative;"> 
        <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                    </div>
                  <div  id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                          <li class="active"><a href="/cotizacion">Todos</a></li>
                          <li><a href="/cotizacion/create">Nuevo</a></li>
                      </ul>
                  </div>
              </div>
          </nav>

          <div class="panel panel-success">
                <div class="panel-heading">
                    <h4>Lista de Cotizaciones</h4>
                </div>
      
                <div class="panel-body">
                  <table class="table ">
                      <thead>
                          <tr>
                              <th>Cod Petición</th>
                              <th>Cliente</th>
                              <th>Entrega Cotizaciòn</th>
                              <th>Fecha Cotizaciòn</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($cotizacion as $cotizacion)
                              <tr>
                                <td>{{ $cotizacion->COD_PETICION_OFERTA }}</td>
                                  <td>{{ $cotizacion->RUT_CLIENTE }}</td>
                                  <td>{{ $cotizacion->FECHA_RESPUESTA_COTIZACION }}</td>

                                  <td>{{ $cotizacion->FECHA_LLEGADA }}</td>
                             
                                  
                                  <td>
                                      <a href="/cotizacion/show/{{ $cotizacion->ID_COTIZACION }}"><span class="label label-info">Ver</span></a>
                                      <a href="/cotizacion/edit/{{ $cotizacion->ID_COTIZACION }}"><span class="label label-success">Editar</span></a>
                                      <a href="/producto/verproductos/{{ $cotizacion->ID_COTIZACION }}"><span class="label label-success">Ver Producto</span></a>
                                      
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