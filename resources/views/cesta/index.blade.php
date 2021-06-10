@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Articulo</th>
                <th scope="col">Botella de Vino</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio Unidad</th>
                <th scope="col">Precio Total</th>
                <th scope="col">Borrar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($productos as $producto)
                <span id="{{$importe += $producto->precio_total}}" hidden></span>

                <tr>
                    <td scope="row">{{$producto->id}}</td>
                    <td scope="row"><img class="rounded" height="75px" width="75px"
                                         src="{{asset($url.$producto->vino->imagen)}}"></td>
                    <td scope="row">{{$producto->vino->nombre}}</td>
                    <td scope="row">{{$producto->cantidad}}</td>
                    <td scope="row">{{$producto->precio_unidad}} €</td>
                    <td scope="row">{{$producto->precio_total}} €</td>
                    <td>
                        <a class="btn btn-danger" href="#{{$contador++}}" data-toggle="modal"
                           data-target="#borrarArticulo{{$contador}}"><i class="fas fa-trash"></i></a>
                        <div class="modal " id="borrarArticulo{{$contador}}" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center">Borrar Articulo</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Quiere usted borrar este artículo?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secundary" data-dismiss="modal"
                                                autofocus>
                                            Cancelar
                                        </button>
                                        <form action="{{url('cesta/'.$producto->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" name="borrar">
                                                Borrar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <form action="{{url('cesta/'."all")}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" name="borrar">
                Vaciar cesta
            </button>
        </form>
        <a class="btn btn-success" href="#" data-toggle="modal"
           data-target="#comprar">Comprar</a>
        <div class="modal " id="comprar" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">Comprar Articulos</h5>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5><strong>Dirección de envio:</strong></h5>
                        <p>{{$user->nombre .' '. $user->apellidos}}<br>
                            {{$user->direccion}}, {{$user->cp}}<br>
                            {{$user->telefono}}</p>
                        <h5><strong>Método de pago:</strong></h5>
                        @foreach($cuentas as $cuenta)
                            @if($cuenta->iban == null)
                                <p class=" col-8 alert alert-danger text-center" role="alert">
                                    No has añadido métodoo de pago
                                </p>
                            @else
                                <p><strong>Cuenta Bancaria: </strong>{{$cuenta->iban}}</p>
                                <p><strong>Saldo: </strong>{{$cuenta->saldo}} €</p>
                                @if($cuenta->saldo < $importe)
                                    <p class=" col-8 alert alert-danger text-center" role="alert">
                                        No tienes saldo suficiente
                                    </p>
                                @endif
                            @endif
                        @endforeach
                        <h5 class="float-right"><strong>Importe total: {{$importe}}€</strong></h5>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secundary" data-dismiss="modal"
                                autofocus>
                            Cancelar
                        </button>
                        <form action="{{url('cesta/'."comprar")}}" method="post">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-success" name="Comprar"
                                    @foreach($cuentas as $cuenta)
                                    @if($cuenta->iban == null || $cuenta->saldo < $importe) disabled @endif
                                    @endforeach >
                                Comprar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
