@extends('layouts.app')

@section('content')
    <div class="container">

        @if($user->bodega == false)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="font-weight-bold card-header text-center">{{ __('Registra tu Bodega') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{url('producto/'.'nueva')}}">
                                @csrf
                                @method('put')
                                <div class="form-group row">
                                    <label for="nombre"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Nombre de la Bodega') }}</label>

                                    <div class="col-md-6">
                                        <input id="nombre" type="nombre" class="form-control" name="nombre" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="float-right btn btn-primary">
                                            {{ __('Comenzar a Vender') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center">
                <h1>TUS ARTÍCULOS EN VENTA</h1>
            </div>
            <div class="mb-3">
                <a class="btn btn-outline-dark" href="{{ url('/producto/create') }}">
                    <i class="far fa-plus-square"></i> Añadir Producto
                </a>
            </div>
            <div class="row justify-content-center">
                @if($productos == "[]")
                    <div class="col-8 alert alert-danger text-center" role="alert">
                        No estas vendiendo ningún producto
                    </div>
                @endif
                @foreach($productos as $producto)
                    <div class="col-sm-4 mb-4">
                        <div class="card">
                            <div class="card-header titulo">{{$producto->nombre}}</div>

                            <div class="card-body text-center">
                                <div class="row">
                                    <div class="col-12">
                                        <img class="rounded" height="275px" width="275px"
                                             src="{{asset($url.$producto->imagen)}}" alt="vinos">

                                        <p class="titulo">Descripción</p>
                                        <p class="descript">{{$producto->descripcion}}</p>
                                        <p><span class="titulo">Categoría</span> - {{$producto->categ->nombre}}</p>
                                        <p><span class="titulo">Precio</span> - {{$producto->precio}} €</p>
                                        <a href="{{url('producto/'.$producto->id.'/edit')}}"
                                           class="btn btn-success mr-2">Editar</a>
                                        <a class="btn btn-danger" href="#{{$contador++}}" data-toggle="modal"
                                           data-target="#borrarArticulo{{$contador}}">Borrar</a>
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
                                                        <p>¿Quiere usted borrar este articulo?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secundary"
                                                                data-dismiss="modal"
                                                                autofocus>
                                                            Cancelar
                                                        </button>
                                                        <form action="{{url('producto/'.$producto->id)}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger" name="borrar">
                                                                Borrar Producto
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
