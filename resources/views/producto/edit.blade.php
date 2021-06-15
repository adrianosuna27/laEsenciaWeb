@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>MODIFICAR ARTÍCULO</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{url('producto/'.$producto->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nombre">Nombre del Artículo</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                               placeholder="Nombre del Producto"
                               value="{{$producto->nombre}}">
                        @error('nombre')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control @error('descripcion') is-invalid @enderror"
                               name="descripcion"
                               placeholder="Descripcion del Producto"
                               value="{{$producto->descripcion}}">
                        @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Categoria">Categoria</label>
                        <select class="form-control @error('categoria') is-invalid @enderror" name="categoria"
                                placeholder="Categoria">
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}"
                                        @if($categoria->id == $producto->id_categoria) selected @endif>{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                        @error('categoria')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center">
                        <img class="rounded float-left" width="150px" src="{{asset($url.$producto->imagen)}}">
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen del Articulo</label>
                        <input type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen"
                               placeholder="Imagen del Producto"
                               value="{{$url.$producto->imagen}}">
                        @error('imagen')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio del Articulo</label>
                        <input type="text" class="form-control @error('precio') is-invalid @enderror" name="precio"
                               placeholder="Precio del Producto"
                               value="{{$producto->precio}}">
                        @error('precio')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
