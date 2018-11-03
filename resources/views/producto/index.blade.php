<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal</title>
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
                          <li class="active"><a href="/producto">Todos</a></li>
                          <li><a href="/producto/create">Nuevo</a></li>
                      </ul>
                  </div>
              </div>
          </nav>

          <div class="panel panel-success">
                <div class="panel-heading">
                    <h4>Lista de Cotizaciones</h4>
                </div>
      
                <div class="panel-body">
                  <table class="table" id="example">
                      <thead>
                          <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                            <th>Plano</th>
                            <th>Fecha de entrega</th>
                            <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($producto as $producto)
                              <tr>
                                <td>{{ $producto->ID_PRODUCTO }}</td>
                                <td>{{ $producto->DESCRIPCION }}</td>
                                <td>{{ $producto->TIPO_PRODUCTO }}</td>
                                <td><a href="planos/{{ $producto->PLANO_PRODUCTO }}"><img src="images/png/pdf.png" style="width:30px;" alt=""></a></td>

                                <td>{{ $producto->FECHA_DE_ENTREGA_PRODUCTO }}</td>
                             
                                  
                                  <td>
                                      <a href="/producto/show/{{ $producto->ID_PRODUCTO }}">Ver<img src="images/png/ver.png" alt="" style="width:20px;"></a>
                                      <a href="/producto/edit/{{ $producto->ID_PRODUCTO }}">Editar<img src="images/png/editar.png" alt="" style="width:20px;"></a>
                                      
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