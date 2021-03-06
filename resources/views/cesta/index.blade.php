@extends('layouts.app')

@section('content')
    <div class="container">
        @if($productos == "[]")
            <div class="col-12 alert alert-danger text-center" role="alert">
                No has añadido artículos a la cesta
            </div>
        @else
            <table class="table">
                <thead>
                <tr>
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
                        <td scope="row"><img class="rounded" height="75px" width="75px"
                                             src="{{asset($url.$producto->vino->imagen)}}" alt="vinos"></td>
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
            <div class="row">
                <div class="col-6 float-left">
                    <form action="{{url('cesta/'."all")}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" name="borrar">
                            Vaciar cesta
                        </button>
                    </form>
                </div>
                <div class="col-6">
                    <a class="btn btn-success float-right" href="#" data-toggle="modal"
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
                                            <p>
                                                <span class="alert alert-danger text-center" role="alert">No has añadido métodoo de pago</span>
                                                <a class="btn btn-outline-dark" href="{{url("user")}}">Añadir</a>
                                            </p>
                                        @else
                                            <p><strong>Tarjeta de Crédito: </strong>{{$cuenta->iban}}</p>
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
                                                @if($cuenta->iban == null) disabled @endif
                                                @endforeach >
                                            Comprar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif


@endsection
