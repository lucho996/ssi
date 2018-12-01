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
        <div style="width:100%; max-width:1100px; margin:0px auto;">
        @include('intranet.menu')
       
        <div style="width:100%; max-width:1100px; float: right; position:relative;">
                <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">

                          <div id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav" style="display: inline;">
                                  @can('users')
                                  <li class="active"><a href="/users">Todos</a></li>  
                                  @endcan
                                  @can('users.create')
                                  <li><a href="/users/create">Nuevo</a></li>   
                                  @endcan
                                
                              </ul>
                          </div>
                      </div>
                  </nav>

          <div class="panel panel-success" style="margin-top:20px;">
                <div class="panel-heading">
                    <h4>Lista de Usuarios</h4>
                </div>
      
                <div class="panel-body">
                        <div class="table-responsive">
                  <table class="table" id="example">
                      <thead>
                          <tr>
                              <th>Nombre Usuario</th>
                              <th>Correo</th>
                            
                              <th>Acciones</th>
                          </tr>

                      </thead>
                      <tbody>
                          @foreach($user as $user)
                              <tr>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->email }}</td>
                               
                                  <td>
                                
                                  <a href="{{route('users.edit', $user->id)}}"><img src="images/png/editar.png" alt="" style="width:20px; float:left;"></a>
                                    {!! Form::open(['route' =>['users.destroy', $user->id],
                                    'method'=>'DELETE', 'onsubmit' => 'return confirm("¿Estas Seguro si desea ELIMINAR?")'])!!}
                                    <button >
                                    <img src="/images/png/borrar.png" style="width:25px; float:left; margin-left:5px;" alt="">
                                </button>
                                    {!!Form::close()!!}
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