<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nombre',
        'descripcion',
        'id_categoria',
        'imagen',
        'precio',
    ];

    public function bodega(){
        return $this->belongsTo(\TCG\Voyager\Models\User::class, 'user_id');
    }

    public function categ(){
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
