@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <title>Modificar Usuario</title>
</head>

        <body >
                <div style="width:100%; max-width: 1100px; margin:0px auto;">
                    @include('intranet.menu')
                  
                <div style="width:100%; max-width: 1100px; float: right; position:relative;">
        <div class="panel panel-success" style="margin-top:20px;">
                <div class="panel-heading">
                    <h4>Modificar Usuarios</h4>
                </div>
               
                <div class="panel-body">
                    {!! Form::model($user,['route' => ['users.update', $user->id],
                    'method' => 'PUT'])!!}
                    <div class="form-group">
                    {{Form::label('name','Nombre')}}
                    {{Form::text('name',null, ['class'=>'form-control'])}}
                    </div>
                    <hr>
                    <h3>Lista de roles</h3>
                    <div class="form-group">
                        <ul class="list-unstyled">
                            @foreach ($roles as $role)
                                <li>
                                    <label>
                                        {{Form::checkbox('roles[]',$role->id, null)}}
                                        {{$role->name}}
                                    <em>{{$role->description ?: 'Sin descripción'}}</em>
                                    </label>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="form-group">
                        {{ Form::submit('Guardar', ['class' =>'btn btn-sm btn-success'])}}
                    <a href="/users" class="btn btn-default">Volver</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</body>
</html>