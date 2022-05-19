@extends('layouts.menu')
@section('contenido')
    
<div class="row">
    <h1 class="blue-grey-text text-darken-3">Nuevo producto</h1>
</div>
<div class="row">
    <form class="col s8">
        <div class="row">
            <div class="input-field col s8">
                <input placeholder="Nombre del producto" id="nombre" name="nombre" type="text">
                <label for="nombre">Nombre:</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
              <textarea name="desc" id="desc" class="materialize-textarea"></textarea>
              <label for="desc">Descripción:</label>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <input placeholder="Precio del producto" id="precio" name="precio" type="text">
                <label for="precio">Precio:</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <select name="" id="marca">
                    @foreach($marcas as $marca)
                    <option value "">
                        {{ $marca->nombre }}
                    </option>

                    @endforeach
                </select>
                <label for="marca">Elija una marca:</label>
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
        </div>
        <div class="row">
            <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
              </button>
        </div>
    </form>
</div>
@endsection