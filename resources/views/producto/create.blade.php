@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2>PUBLICAR NUEVO ARTÍCULO</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{route('producto.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre del Artículo</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                               placeholder="Nombre del Producto">
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
                               placeholder="Descripcion del Producto">
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
                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                        @error('categoria')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen del Articulo</label>
                        <input type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen"
                               placeholder="Imagen del coche">
                        @error('imagen')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio del Articulo</label>
                        <input type="text" class="form-control @error('precio') is-invalid @enderror" name="precio"
                               placeholder="Precio del coche">
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
@endsection
