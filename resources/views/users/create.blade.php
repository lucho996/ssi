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
                   
                <div style="width:100%; max-width:1100px; float: right; position:relative;">
                        <nav class="navbar navbar-default" role="navigation">
                                <div class="container-fluid">
 
                                  <div id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav" style="display: inline;">
                                          @can('users')
                                          <li ><a href="/users">Todos</a></li>  
                                          @endcan
                                          @can('users.create')
                                          <li class="active"><a href="/users/create">Nuevo</a></li>   
                                          @endcan
                                        
                                      </ul>
                                  </div>
                              </div>
                          </nav>
        <div class="panel panel-success" style="margin-top:20px;">
                <div class="panel-heading">
                    <h4>Crear Usuario</h4>
                </div>
               
                <div class="panel-body">
                        <form method="POST" action="{{ route('users.store') }}">
                                @csrf
        
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
        
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
        
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success" >
                                            {{ __('Registrar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
            @if(Session::has('message'))
            <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
        @endif
        </div>
    </div>

</body>
</html>