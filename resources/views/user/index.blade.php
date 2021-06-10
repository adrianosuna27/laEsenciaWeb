@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Datos del Usuario <a class="float-right" href="{{url('user/'.$user->id.'/edit')}}">
                        <small><i class="fas fa-user-edit"></i></small>
                    </a></h2>
                <div class="form-group">
                    <label for="nombre">Nombre del Usuario</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del Usuario"
                           value="{{$user->nombre}}" disabled>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Apellidos"
                           value="{{$user->apellidos}}" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" name="email" placeholder="Correo Electrónico"
                           value="{{$user->email}}" disabled>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Direccion"
                           value="{{$user->direccion}}" disabled>
                </div>
                <div class="form-group">
                    <label for="cp">Código Postal</label>
                    <input type="text" class="form-control" name="cp" placeholder="Codigo Postal"
                           value="{{$user->cp}}" disabled>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" placeholder="Nº Telefono"
                           value="{{$user->telefono}}" disabled>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h2>Datos de la Cuenta</h2>
                        @foreach($cuentas as $cuenta)
                            @if($cuenta->iban == null)
                                <div class=" col-8 alert alert-danger text-center" role="alert">
                                    No has añadido tu cuenta
                                </div>
                                <a class="btn btn-success" href="#" data-toggle="modal"
                                   data-target="#cuenta">Añadir Cuenta</a>
                                <div class="modal " id="cuenta" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center">Añadir una cuenta bancaria</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('user.store')}}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="cuenta">IBAN de la cuenta</label>
                                                        <input type="text" class="form-control" name="cuenta"
                                                               placeholder="IBAN de la cuenta" maxlength="9">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="saldo">Saldo de la cuenta</label>
                                                        <input type="text" class="form-control" name="saldo"
                                                               placeholder="Saldo de la cuenta" maxlength="4">
                                                    </div>
                                                    <button type="submit" class="btn btn-success float-right"
                                                            name="añadir">
                                                        Añadir Cuenta
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="cuenta">IBAN de la cuenta</label>
                                    <input type="text" class="form-control" name="cuenta"
                                           placeholder="IBAN de la cuenta"
                                           value="{{$cuenta->iban}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="saldo">Saldo de la cuenta</label>
                                    <input type="text" class="form-control" name="saldo"
                                           placeholder="Saldo de la cuenta"
                                           value="{{$cuenta->saldo}}" disabled>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @if($user->bodega == true)
                        <div class="col-6">
                            <h2>Datos de la Bodega</h2>
                            <div class="form-group">
                                <label for="nombre_bod">Nombre de la Bodega</label>
                                <input type="text" class="form-control" name="nombre_bod"
                                       placeholder="Nombre de la Bodega"
                                       value="{{$user->nom_bodega}}" disabled>
                            </div>
                        </div>

                    @endif

                </div>
                <a href="{{url('home')}}" class="btn btn-secondary">Volver al Inicio</a>

            </div>
        </div>
    </div>
@endsection
