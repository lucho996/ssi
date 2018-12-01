
@include('layouts.app')
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



    

<body>
 
    <div style="width:100%; max-width: 1100px; margin:0px auto;">
    @include('intranet.menu')
  
    <div style="width:100%; max-width: 1100px; float: right; position:relative;">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                  <div id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" style="display:inline; float:left;">
                                @can('personal')
                                <li  class="active"><a href="/personal">Todos</a></li>	
                                @endcan
                                @can('personal.create')
                                <li><a href="/personal/create">Nuevo</a></li>
                                @endcan
                                @can('personal.createc')
                                <li><a href="/personal/createc">Nuevo Cargo</a></li>
                                @endcan	
                        </ul>
                  </div>
              </div>
          </nav>

          <div class="panel panel-success">
                <div class="panel-heading">
                    <h4>Lista de Personal</h4>
                </div>
      
                <div class="panel-body">
                    	<div class="table-responsive">	
                  <table class="table" id="example">
                      <thead>
                          <tr>
                              <th>Rut</th>
                              <th>Nombre</th>
                              <th>Apellido</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($personal as $personal)
                              <tr>
                                  <td>{{ $personal->RUTP }}</td>
                                  <td>{{ $personal->NOMBREP }}</td>
                                  <td>{{ $personal->APELLIDOP }}</td>
                                  <td>
                                      @can('personal.show')
                                      <a href="/personal/show/{{ $personal->RUTP }}"><img src="images/png/ver.png" alt="" style="width:20px;"></a>
                                      @endcan
                                      @can('personal.edit')
                                      <a href="/personal/edit/{{ $personal->RUTP }}"><img src="images/png/editar.png" alt="" style="width:20px;"></a>
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