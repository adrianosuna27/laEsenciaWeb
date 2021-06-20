@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>TUS PEDIDOS REALIZADOS</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div id="accordion">
                    @foreach($pedidos as $pedido)
                        @if($pedido->fecha_pedido != null)
                            <span id="{{$pedidoVacio++}}" hidden></span>
                            <div class="card">
                                <div class="card-header w-100" id="heading{{$contador++}}">
                                    <h5 data-toggle="collapse" data-target="#collapse{{$contador}}" aria-expanded="true"
                                        aria-controls="collapse{{$contador}}">
                                        <span><strong>#{{$contador}}</strong>  Pedido realizado el día {{$pedido->fecha_pedido}}</span>
                                        <span class="float-right"><strong>Importe:</strong> {{$pedido->precio_total}} €</span>
                                    </h5>
                                </div>
                                <div id="collapse{{$contador}}" class="collapse" aria-labelledby="heading{{$contador}}"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Articulo</th>
                                                <th scope="col">Botella de Vino</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Precio Unidad</th>
                                                <th scope="col">Precio Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($lineas as $l)
                                                @if($l->id_pedido == $pedido->id)
                                                    <tr>
                                                        <td scope="row"><img class="rounded" height="75px" width="75px"
                                                                             src="{{asset($url.$l->vino->imagen)}}" alt="vinos">
                                                        </td>
                                                        <td scope="row">{{$l->vino->nombre}}</td>
                                                        <td scope="row">{{$l->cantidad}}</td>
                                                        <td scope="row">{{$l->precio_unidad}} €</td>
                                                        <td scope="row">{{$l->precio_total_producto}} €</td>
                                                    </tr>

                                                @endif
                                            @endforeach
                                            <tr>
                                                <td scope="row"></td>
                                                <td scope="row"></td>
                                                <td scope="row"></td>
                                                <td scope="row"></td>
                                                <td scope="row">
                                                    <div class="mb-3">
                                                        <a class="btn btn-outline-dark float-right"
                                                           href="{{url('pedidos/'.$pedido->id.'/edit')}}">
                                                            <i class="far fa-file-alt"></i> Visualizar Factura
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        @elseif($pedido->fecha_pedido == null && $pedidoVacio == 0)
                            <div class="alert alert-danger text-center" role="alert">
                                No has realizado ninguna compra
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
