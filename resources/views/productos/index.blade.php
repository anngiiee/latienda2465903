@extends('layouts.menu')

@section('contenido')
    <div class="row">
        <h1>Catálogo de productos</h1>
    </div>
    @foreach ($productos as $producto)

    <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" width="500" height="400"
           @if (is_null($producto->imagen))
           src="{{ asset('img/no_disponible.png') }}"
          @else
          src="{{ asset('img/'.$producto->imagen) }}" 
                     
          @endif 
          />
        </div>

        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">{{ $producto->nombre }}<i class="material-icons right">more_vert</i></span>
          <p><a href="{{ url ('productos/'.$producto->id) }}">Ver detalles...</a></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">{{ $producto->nombre }}<i class="material-icons right">close</i></span>
          <ul>
              <li>Descripción: {{ $producto->desc }}</li>
              <li>Precio: {{ $producto->precio }}</li>
              <li>Categoría: {{ $producto->categoria->nombre }}</li>
              <li>Marca {{ $producto->marca->nombre }}</li>
          </ul>
        </div>
      </div>

    @endforeach

@endsection 