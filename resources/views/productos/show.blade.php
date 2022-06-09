@extends('layouts.menu')

@section('contenido')
<div class="row">
    <h1>{{ $producto->nombre }}</h1>
</div>
<div class="row">
    <div class="cols8">
        
        <div class="row">
            <img width="50px"
            @if (is_null($producto->imagen))
            src="{{ asset('img/no_disponible.png') }}"
            @else
            src="{{ asset('img/'.$producto->imagen) }}"         
             @endif 
           />
        </div>
        
        <div class="row">
            <ul>
                <li> <b>Descripción: </b> {{ $producto->desc }}</li>
                <li><b>Categoria: </b> {{ $producto->categoria->nombre }}</li>
                <li><b>Marca: </b> {{ $producto->marca->nombre }}</li>
                <li><b>Precio: </b>$ {{ $producto->precio }}</li>
            </ul>
        </div>


          
    </div>
    <div class="col s4">
        <form method="POST" action="{{ route('carrito.store') }}">
            @csrf
            <div class="row">
                <h3>Añadir al carrito</h3>
    <div class="row">
        <div class="col s4 input-field">
            <select name="cantidad" id="cantidad">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <label for="cantidad">Cantidad</label>
        </div>
    </div>
    <div class="row">
        <div class="col s4">
            <button class="btn waves-effect waves-light" type="submit">Añadir</button>
        </div>
    </div>
    <input type="hidden" name="prod_id" value="{{ $producto->id }}">
    <input type="hidden" name="prod_name" value="{{ $producto->nombre }}">
</div>
</form>
</div>
</div>

@endsection