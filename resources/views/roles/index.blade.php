@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
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
                                <ul class="nav navbar-nav" style="display: inline;">
                                  @can('roles')
                                  <li class="active"><a href="/roles">Todos</a></li>  
                                  @endcan
                                  @can('roles.create')
                                  <li><a href="/roles/create">Nuevo</a></li>   
                                  @endcan
                                
                              </ul>
                          </div>
                      </div>
                  </nav>

          <div class="panel panel-success">
                <div class="panel-heading">
                    <h4>Lista de Roles</h4>
                </div>
      
                <div class="panel-body">
                  <table class="table" id="example">
                      <thead>
                          <tr>
                              <th>Nombre Rol</th>
                              <th>Tipo</th>
                              <th>Tipo de acceso</th>
                              <th>Acciones</th>
                          </tr>

                      </thead>
                      <tbody>
                          @foreach($roles as $roles)
                              <tr>
                                  <td>{{ $roles->name }}</td>
                                  <td>{{ $roles->slug }}</td>
                                  <td>{{ $roles->special }}</td>
                               
                                  <td>
                                @can('roles.edit')
                                <a href="{{route('roles.edit', $roles->id)}}"><img src="images/png/editar.png" alt="" style="width:20px; float:left;"></a>  
                                @endcan
                                @can('roles.destroy')
                                {!! Form::open(['route' =>['roles.destroy', $roles->id],
                                'method'=>'DELETE', 'onsubmit' => 'return confirm("¿Estas Seguro si desea ELIMINAR?")'])!!}
                                <button >
                                <img src="/images/png/borrar.png" style="width:25px; float:left; margin-left:5px;" alt="">
                            </button>
                                {!!Form::close()!!}  
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