
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
                <div style="width:100%; max-width: 1100px; margin:0px auto;">
                    @include('intranet.menu')
                  
                <div style="width:100%; max-width: 1100px; float: right; position:relative;">
        <div class="panel panel-success" style="margin-top:20px;">
                <div class="panel-heading">
                    <h4>Modificar roles</h4>
                </div>
               
                <div class="panel-body">
                    {!! Form::model($role,['route' => ['roles.update', $role->id],
                    'method' => 'PUT'])!!}
               
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
                        {{ Form::submit('Actualizar', ['class' =>'btn btn-sm btn-success'])}}
                    <a href="/roles" class="btn btn-default">Volver</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</body>
</html>