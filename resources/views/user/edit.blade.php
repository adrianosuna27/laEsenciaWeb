@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{url('user/'.$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="nombre">Nombre del Usuario</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" placeholder="Nombre del Usuario"
                               value="{{$user->nombre}}">
                        @error('nombre')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" placeholder="Apellidos"
                               value="{{$user->apellidos}}">
                        @error('apellidos')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" name="email" value="{{$user->email}}" hidden>
                        <input type="email" class="form-control" name="email2" placeholder="Correo Electrónico"
                               value="{{$user->email}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" placeholder="Direccion"
                               value="{{$user->direccion}}">
                        @error('direccion')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cp">Código Postal</label>
                        <input type="text" class="form-control @error('cp') is-invalid @enderror" name="cp" placeholder="Codigo Postal"
                               value="{{$user->cp}}">
                        @error('cp')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" placeholder="Nº Telefono"
                               value="{{$user->telefono}}">
                        @error('telefono')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <a href="{{url('user')}}" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>

                </form>
            </div>
        </div>
    </div>
@endsection
