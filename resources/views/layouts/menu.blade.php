<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('materialize/css/materialize.css') }}">
    <title>TiendaPHP</title>
</head>
<body>
    <nav class="blue-grey lighten-1">
        <div class="nav-wrapper">
          <a href="#" class="brand-logo">LatiendaPHP</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="badges.html">Productos</a></li>
            <li><a href="collapsible.html">Pedidos</a></li>
          </ul>
        </div>
      </nav>
      <div class="container">
          @yield('contenido')
      </div>
    <script src="{{ asset('materialize/js/materialize.js') }}"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, []);
     });
    </script>
</body>
</html>