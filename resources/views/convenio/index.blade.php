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

        
        <div style="width:100%; max-width: 1100px; margin:0px auto;">
        @include('intranet.menu')
         
        <div style="width:100%; max-width: 1100px; float: right; position:relative;">
        <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                  <div id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" style="display: inline;">
                        @can('convenio')
                      <li  class="active"><a href="/convenio">Todos</a></li>
                      @endcan
                   
                      @can('convenio.cotizarconvenio')
                    <li>
                            <li ><a href="/convenio/cotizarconvenio">Nuevo Convenio</a></li>	
                    </li>
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
                    	<div class="table-responsive">	
                  <table class="table" id="example" style="width:100%;">
                      <thead>
                          <tr>
                                <th>RUT Cliente</th>
                                <th>Nombre Cliente</th>
                              <th>Fecha Inicio</th>
                              <th>Fecha Termino</th>
                   
                              <th>Acciones</th>
                          </tr>

                      </thead>
                      <tbody>
                            @foreach($convenio as $convenio)
                              <tr>


                                <td>{{ $convenio->NOMBRE_PERSONA_ACARGO }}</td>
                                <td>{{ $convenio->NOMBRE_COMPLETO }}</td>
                                <td>{{ $convenio->FECHA_INICIO }}</td>
                                <td>{{ $convenio->FECHA_TERMINO }}</td>
                               
                                <td>
                                    @can('producto.index2')
                                    <a href="/producto/index2/{{$convenio->ID_CONVENIO}}"><img src="images/png/productos.png" alt="" style="width:20px;"></a>
                                    @endcan
                                    @can('convenio.show')
                                    <a href="/convenio/show/{{ $convenio->ID_CONVENIO }}"><img src="/images/png/ver.png" style="width:20px;" alt=""></a>    
                                    @endcan
                                    @can('convenio.edit')
                                    <a href="/convenio/edit/{{ $convenio->ID_CONVENIO }}"><img src="/images/png/editar.png"style="width:20px;" alt=""></a>
                                    @endcan
                                   
                                    @can('convenio.guia')
                                    <a href="/convenio/guia/{{$convenio->ID_CONVENIO}}"><img src="/images/png/orden.png"style="width:20px;" alt=""></a>      
                                    @endcan
                                </td>
                                
                              </tr>
                              @endforeach
                      </tbody>
                  </table>
                    	</div>
                </div>
            </div>
          @if(Session::has('message'))
            <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
        @endif
        </div>
        </div>
        

    
</body>
</html>