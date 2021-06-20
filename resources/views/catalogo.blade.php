@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Galeria de Vinos</h1>
        </div>
        <div class="row justify-content-center">
            @foreach($productos as $producto)
                <div class="col-sm-4 mb-4">
                    <div class="card">
                        <div class="card-header titulo">{{$producto->nombre}}</div>

                        <div class="card-body text-center">
                            <img class="rounded" height="275px" width="275px" src="{{asset($url.$producto->imagen)}}" alt="vinos">
                            <p class="text-center titulo">Descripción</p>
                            <p class="descript">{{$producto->descripcion}}</p>
                            <p><span class="titulo">Categoría</span> - {{$producto->categ->nombre}}</p>
                            <p><span class="titulo">Precio</span> - {{$producto->precio}} €</p>
                            <p><span class="titulo">Vendedor</span> - {{$producto->bodega->nom_bodega}}</p>
                            {{--                            @foreach($users as $user)--}}
                            {{--                                @if($producto->user_id == $user->id)--}}
                            {{--                                    <p><span class="titulo">Vendedor</span> - {{$user->nombre." ".$user->apellidos}}--}}
                            {{--                                    </p>--}}
                            {{--                                @endif--}}
                            {{--                            @endforeach--}}

                        </div>
                        @if(Auth::user() != null && Auth::user()->bodega == null)
                            <div class="card-footer">
                                <form action="{{url('catalogo/'.$producto->id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-outline-dark">Añadir a mi Cesta</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
