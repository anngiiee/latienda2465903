<?php

namespace App\Http\Controllers;

use App\models\Marca;
use App\Models\Categoria;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //seleccionar todos los productos de la base de datos
        $productos = Producto::all();
        //mostrar el catalogo  de producto llevandole la lista de productos
        return view('productos.index')
            ->with('productos' , $productos );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Seleccion de todas las marcas
        $marcas = Marca::all();

        //Seleccion de todas las categorias
        $categorias = Categoria::all();

        //mostrar la vista, llevandole marcas y categorias
        return view('productos.new') 
        -> with('marcas', $marcas) 
        -> with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //analizar la input data "imagen"

        


        //1.establecer las reglas de validación que apliquen a cada campo
        $reglas=[
            "nombre" => 'required|alpha',
            "desc" => 'required|min:20|max:50',
            "precio" => 'required|numeric',
            "marca" => 'required',
            "categoria" => 'required',
            "imagen" => 'required|image'
        ];

        //mensajes
        $mensajes = [
            "required" => "Campo obligatorio",
            "alpha" => "Solo letras",
            "min" => "Se requier una descripción con mínimo 20 caracteres",
            "numeric" => "Solo números",
            "image" => "Este campo solo admite imágenes"
        ];

        //2. Crear el objeto validador
        $v = Validator::make($r->all() , 
                             $reglas, 
                            $mensajes);

        //3. Validar la input data
        if($v->fails()){
            //validación fallida
            //redireccionar al formulario
            return redirect('productos/create')
                    ->withErrors($v)
                    ->withInput();

        }else{

        //acceder a propiedades del archivo cargado
                $archivo = $r->imagen;
                $nombre_archivo = $archivo ->getClientOriginalName();
            //establecer la ubicacion donde se cargará/ almacenará el archivo
                $ruta=public_path()."/img/";
            //mover el archivo
                $archivo->move( $ruta,
                                $nombre_archivo);

        //validación correcta
            //Crear un nuevo producto <<entity>>
            $p = new Producto;
            //asignar valores a los atributos del producto
            $p->nombre = $r->nombre;
            $p->desc = $r->desc;
            $p->imagen = $nombre_archivo;
            $p->precio = $r->precio;
            $p->marca_id = $r->marca;
            $p->categoria_id = $r->categoria;
            //guardar en db
            $p->save();
            echo "producto registrado";
            //redireccionar al formulario, con mensaje exitoso (session)
            return redirect('productos/create')
               ->with('mensajito', "Producto registrado");
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto) //parametro
    {
        echo "Aquí van los detalles de producto con id: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto) //Se quita el Producto antes del $
    {
        echo "Aquí va a ir el formulario para actualizar el producto: $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
