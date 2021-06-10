<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    use HasFactory;

    public function bodega(){
        return $this->belongsTo(\TCG\Voyager\Models\User::class, 'id_user');
    }
    public function vino(){
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
