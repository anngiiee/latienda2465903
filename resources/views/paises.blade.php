<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paises</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h1>
        Paises de la región.
    </h1>

    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Capital</th>
                <th>Moneda</th>
                <th>Población</th>
                <th>Ciudades</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($paises as $pais => $infopais)
                <tr>
                    <td rowspan='{{ count($infopais["ciudades"]) }}'>
                        {{ $pais }}
                    </td>
                    <td rowspan='{{ count($infopais["ciudades"]) }}'>
                        {{ $infopais ["capital"] }}
                    </td>
                    <td rowspan='{{ count($infopais["ciudades"]) }}'>
                        {{ $infopais ["moneda"] }}
                    </td>
                    <td rowspan='{{ count($infopais["ciudades"]) }}'>
                        {{ $infopais ["población"] }} millones hab.
                    </td>
                    @foreach( $infopais ["ciudades"] as $ciudad)
                        <th>
                            {{   $ciudad }}
                        </th>
                    </tr>
                    @endforeach
             @endforeach

            
        </tbody>
        <tfoot></tfoot>
    </table>
    
</body>
</html>