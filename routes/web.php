<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    //primera ruta

Route::get('hola' , function () {
    echo "Hola 2465903";
});

    //ruta de arreglos

Route::get('arreglo' , function() {
    $estudiantes = [ 
        "CA" => "Carlos",
        "JO" => "José",
        "AN" => "Ana"
    ];
    /*echo "<pre>";
    var_dump($estudiantes);
    echo "<pre>";*/

    //recorrer arreglo
    foreach($estudiantes as $e){
        echo $e."<hr />";
    }

    //agregar elementos en php
    $estudiantes["CR"] = "Cristian";
    echo "<pre>";
    var_dump($estudiantes);
    echo "<pre>";

});

Route::get('paises' , function() {
    $paises = [    
        "colombia" => [
            "capital" => "Bogotá",
            "moneda" => "Peso colombiano",
            "población" => 51,
            "ciudades" => [
                "Medellín",
                "Cali",
                "Barranquilla"
            ]
         ],
        "perú" =>[ 
            "capital" => "Lima",
            "moneda" => "Sol",
            "población" => 32,
            "ciudades" => [
                "Arequipa",
                "Trujillo"
            ]
        ],
        "Paraguay" => [
            "capital" => "Asunción",
            "moneda" => "Guaraní",
            "población" => 7,
            "ciudades" => [
                "Luque"
            ]
        ],
        "Ecuador" => [
            "capital" => "Quito",
            "moneda" => "Dólar estadounidense",
            "población" => 17,
            "ciudades" => [
                "Guayaquil",
                "Manta"
            ]
        ],
        "Argentina" => [
            "capital" => "Buenos aires",
            "moneda" => "Peso argentino",
            "población" => 45,
            "ciudades" => [
                "Córdoba",
                "Rosario",
                "Mar del Plata"
            ]
        ],
        "Chile" => [
            "capital" => "Santiago de Chile",
            "moneda" => "Peso chileno",
            "población" => 19,
            "ciudades" => [
                "Puente Alto",
                "Maipú",
                "Santa Fe",
                "Quilmes"
            ]
        ],

     ];

     //mostrar la vista
     return view('paises')
        -> with("paises", $paises) ;

});

Route::get('prueba', function(){
    return view('productos.new');
});

//rutas rest o rutas de resource
Route::resource('productos', ProductoController::class);


