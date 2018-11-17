@include('layouts.app')
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

<body >
	<div style="width: 1100px; margin:0px auto;">
		<div style="width: 200px; float:left;  position:relative;">
		@include('intranet.menu')
		</div>
	<div style="width: 850px; float: right; position:relative;"> 
	        <nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
			
					  <div  id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav" style="display: inline;">
								@can('cotizacion')
							  <li class="active"><a href="/cotizacion">Todos</a></li>
							  @endcan
							  @can('cotizacion.create')
							  <li><a href="/cotizacion/create">Nuevo</a></li>				  
							  @endcan
							
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
                              <th>Entrega Cotización</th>
                              <th>Fecha Cotización</th>
                              <th>Estado</th>
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
                                    <td>{{$cot->ESTADO}}</td>
                             
                                  
                                  <td>
                                      @can('cotizacion.show')
                                      <a href="/cotizacion/show/{{ $cot->ID_COTIZACION }}"><img src="/images/png/ver.png" style="width:20px;" alt=""></a>    
                                      @endcan
                                      @can('cotizacion.edit')
                                      <a href="/cotizacion/edit/{{ $cot->ID_COTIZACION }}"><img src="/images/png/editar.png"style="width:20px;" alt=""></a>
                                      @endcan
                                      @can('producto')
                                      <a href="/producto/index/{{$cot->ID_COTIZACION}}"><img src="/images/png/productos.png"style="width:20px;" alt=""></a>      
                                      @endcan
                                      @can('cotizacion.guia')
                                      <a href="/cotizacion/guia/{{$cot->ID_COTIZACION}}"><img src="/images/png/orden.png"style="width:20px;" alt=""></a>      
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
    
</body>

</html>