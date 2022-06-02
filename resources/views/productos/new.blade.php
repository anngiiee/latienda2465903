@extends('layouts.menu')
@section('contenido')
@if( session ('mensajito'))
<div class="row">
    <span>{{ session('mensajito')}}</span>
</div>
@endif    
<div class="row">
    <h1 class="blue-grey-text text-darken-3">Nuevo producto</h1>
</div>
<div class="row">
    <form method="POST" action="{{ route('productos.store') }}" class="col s8" enctype="multipart/form-data">
        @csrf 
        <div class="row">
            <div class="input-field col s8">
                <input placeholder="Nombre del producto" id="nombre" name="nombre" type="text" value="{{ old('nombre') }}">
                <label for="nombre">Nombre:</label>
                <span class="red-text text-darken-4"> {{ $errors->first('nombre') }} </span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
              <textarea name="desc" id="desc" class="materialize-textarea">{{ old('desc') }}</textarea>
              <label for="desc">Descripción:</label>
              <span class="red-text text-darken-4"> {{ $errors->first('desc') }} </span>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <input placeholder="Precio del producto" id="precio" name="precio" type="text" value="{{ old('precio') }}">
                <label for="precio">Precio:</label>
                <span class="red-text text-darken-4"> {{ $errors->first('precio') }} </span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <select name="marca" id="marca">
                    <option value="">Elija una marca</option>
                    @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}">
                        {{ $marca->nombre }}
                    </option>

                    @endforeach
                </select>
                <label for="marca">Elija una marca:</label>
                <span class="red-text text-darken-4"> {{ $errors->first('marca') }} </span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <select name="categoria" id="categoria">
                    <option value="">Elija una categoria</option>
                    @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">
                        {{ $categoria->nombre }}
                    </option>
                    @endforeach
                </select>
                <label for="categoria">Elija una categoria:</label>
                <span class="red-text text-darken-4"> {{ $errors->first('categoria') }} </span>
            </div>
        </div>
        <div class="row">
            <div class="file-field input-field col s8 ">
                <div class="btn">
                    <span>Imagen del producto</span>
                    <input type="file" name="imagen">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Suba aquí la imagen del producto">
                </div>
            </div>
            <span class="red-text text-darken-4"> {{ $errors->first('imagen') }} </span>
        </div>
        <div class="row">
            <button class="btn waves-effect waves-light" type="submit">Guardar
              </button>
        </div>
    </form>
</div>
@endsection