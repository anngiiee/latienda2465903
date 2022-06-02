<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categoria;

class Producto extends Model
{
    use HasFactory;

    //relacion de producto con marca
    //toda relación se expresa con una función
    public function categoria(){
        return $this->belongsTo( Categoria::class ); //relaciones muchos a 1

    }
}
