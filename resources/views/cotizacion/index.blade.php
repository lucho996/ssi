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

                  <table class="table table-hover table-striped" id="example"> 
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
                          @foreach($cotizacion as $cot)
                              <tr>

                                <td>{{ $cot->COD_PETICION_OFERTA }}</td>
                                  <td>{{ $cot->NOMBRE_COMPLETO }}</td>
                                  <td>{{ $cot->FECHA_RESPUESTA_COTIZACION }}</td>

                                  <td>{{ $cot->FECHA_LLEGADA }}</td>
                             
                                  
                                  <td>
                                      <a href="/cotizacion/show/{{ $cot->ID_COTIZACION }}"><img src="/images/png/ver.png" style="width:20px;" alt=""></a>
                                      <a href="/cotizacion/edit/{{ $cot->ID_COTIZACION }}"><img src="/images/png/editar.png"style="width:20px;" alt=""></a>
                                  <a href="/producto/index/{{$cot->ID_COTIZACION}}"><img src="/images/png/productos.png"style="width:20px;" alt=""></a>
                      
                                      
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