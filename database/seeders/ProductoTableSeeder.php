<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pro = new Producto();
        $pro->user_id = '1';
        $pro->nombre = 'Peugeot 407';
        $pro->descripcion = 'Coche del 2007. En buen estado.';
        $pro->id_categoria = '1';
        $pro->precio = '4600';
        $pro->imagen = 'imagen-defecto.png';
        $pro->save();

        $pro = new Producto();
        $pro->user_id = '3';
        $pro->nombre = 'Samgsung 50 pulgadas';
        $pro->descripcion = 'Televisor con un año de uso';
        $pro->id_categoria = '3';
        $pro->precio = '220';
        $pro->imagen = 'imagen-defecto.png';
        $pro->save();

        $pro = new Producto();
        $pro->user_id = '3';
        $pro->nombre = 'Xiaomi M5';
        $pro->descripcion = 'Movil nuevo a estrenar con su plastico y todo. Precio no negociable.';
        $pro->id_categoria = '1';
        $pro->precio = '350';
        $pro->imagen = 'imagen-defecto.png';
        $pro->save();

        $pro = new Producto();
        $pro->user_id = '2';
        $pro->nombre = 'Ford Mondeo';
        $pro->descripcion = 'Cambio por Seat Ibica';
        $pro->id_categoria = '1';
        $pro->precio = '2400';
        $pro->imagen = 'imagen-defecto.png';
        $pro->save();

        $pro = new Producto();
        $pro->user_id = '2';
        $pro->nombre = 'Vespa';
        $pro->descripcion = 'Vendo vespa para piezas';
        $pro->id_categoria = '2';
        $pro->precio = '500';
        $pro->imagen = 'imagen-defecto.png';
        $pro->save();

        $pro = new Producto();
        $pro->user_id = '2';
        $pro->nombre = 'Mesita de noche';
        $pro->descripcion = 'Mesita de noche casi nueva.';
        $pro->id_categoria = '3';
        $pro->precio = '60';
        $pro->imagen = 'imagen-defecto.png';
        $pro->save();

        $pro = new Producto();
        $pro->user_id = '3';
        $pro->nombre = 'Piso sin muebles';
        $pro->descripcion = 'Vendo piso cerca del centro.';
        $pro->id_categoria = '3';
        $pro->precio = '120000';
        $pro->imagen = 'imagen-defecto.png';
        $pro->save();

        $pro = new Producto();
        $pro->user_id = '3';
        $pro->nombre = 'Huawei p30 lite';
        $pro->descripcion = 'Movil con un año de uso.';
        $pro->id_categoria = '2';
        $pro->precio = '150';
        $pro->imagen = 'imagen-defecto.png';
        $pro->save();

        $pro = new Producto();
        $pro->user_id = '3';
        $pro->nombre = 'LG 60 pulgadas';
        $pro->descripcion = 'Televiisor con pantalla rota';
        $pro->id_categoria = '2';
        $pro->precio = '50';
        $pro->imagen = 'imagen-defecto.png';
        $pro->save();
    }
}
