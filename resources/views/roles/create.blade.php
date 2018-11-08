@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <title>Modificar roles</title>
</head>

        <body >
                <div style="width: 1100px; margin:0px auto;">
                    <div style="width: 200px; float:left;  position:relative;">
                    @include('intranet.menu')
                    </div>    
                <div style="width: 850px; float: right; position:relative;">
                        <nav class="navbar navbar-default" role="navigation">
                                <div class="container-fluid">
 
                                  <div id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav" style="display: inline;">
                                          @can('roles')
                                          <li ><a href="/roles">Todos</a></li>  
                                          @endcan
                                          @can('roles.create')
                                          <li class="active"><a href="/roles/create">Nuevo</a></li>   
                                          @endcan
                                        
                                      </ul>
                                  </div>
                              </div>
                          </nav>
        <div class="panel panel-success" style="margin-top:20px;">
                <div class="panel-heading">
                    <h4>Modificar roles</h4>
                </div>
               
                <div class="panel-body">
                    {!! Form::open(['route' => 'roles.store'])!!}
               
               <div class="form-group">
                    {{Form::label('name','Nombre')}}
                    {{Form::text('name',null, ['class'=>'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::label('slug','URL Amigable')}}
                    {{Form::text('slug',null, ['class'=>'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::label('description','Descripción')}}
                    {{Form::textarea('description',null, ['class'=>'form-control'])}}
                </div>


                    <hr>
                    <h3>Permiso Especial</h3>
                    <div class="form-group">
                    <label>{{Form::radio('special','all-access')}} Acceso Total</label>
                    <label>{{Form::radio('special','no-access')}}Ningun Acceso</label>
                    </div>


                    <hr>
                    <h3>Lista de permisos</h3>
                    <div class="form-group">
                        <ul class="list-unstyled">
                            @foreach ($permissions as $permission)
                                <li>
                                    <label>
                                        {{Form::checkbox('permissions[]',$permission->id, null)}}
                                        {{$permission->name}}
                                    <em>{{$permission->description ?: 'Sin descripción'}}</em>
                                    </label>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="form-group">
                        {{ Form::submit('Guardar', ['class' =>'btn btn-sm btn-success'])}}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</body>
</html>