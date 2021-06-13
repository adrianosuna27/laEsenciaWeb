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
        $pro->nombre = 'Fino San Pablo';
        $pro->descripcion = 'Un color oro, paja, brillante, amargo en la boca y el magnífico y punzante aroma en la nariz.';
        $pro->id_categoria = '1';
        $pro->precio = '17.50';
        $pro->imagen = 'Fino1.png';
        $pro->save();

        $pro = new Producto();
        $pro->user_id = '3';
        $pro->nombre = 'FINO LAGAR DE LOS FRAILES 3';
        $pro->descripcion = 'Entre sus notas de cata destaca el recuerdo a miga de pan, levadura y toques cítricos…una explosión de  aromas y sabores que inundan a cada sorbo.';
        $pro->id_categoria = '1';
        $pro->precio = '29.50';
        $pro->imagen = 'FinoRama.jpeg';
        $pro->save();

        $pro = new Producto();
        $pro->user_id = '3';
        $pro->nombre = 'AMONTILLADO LAGAR DE LOS FRAILES';
        $pro->descripcion = 'Un vino limpio y brillante. En nariz es intenso,  destacando los aromas ahumado, bollería y avellanado.';
        $pro->id_categoria = '2';
        $pro->precio = '27.50';
        $pro->imagen = 'Amontillado.jpg';
        $pro->save();

        $pro = new Producto();
        $pro->user_id = '2';
        $pro->nombre = 'AMONTILLADO';
        $pro->descripcion = 'Vino generoso viejo. Con mucho cuerpo y sabor aterciopelado en boca es sabroso, con una agradable dulzura y suavidad y moderadamente seco.';
        $pro->id_categoria = '2';
        $pro->precio = '12';
        $pro->imagen = 'AmontilladoCB.jpg';
        $pro->save();

        $pro = new Producto();
        $pro->user_id = '2';
        $pro->nombre = 'YEMA DE TINAJA';
        $pro->descripcion = 'Es un vino muy aromático de color amarillo pálido, que puede presentarse ligeramente turbio debido a su estado natural. Es la nube característica de los denominados “vinos en rama”.';
        $pro->id_categoria = '3';
        $pro->precio = '4.50';
        $pro->imagen = 'tinajaCB.jpg';
        $pro->save();

        $pro = new Producto();
        $pro->user_id = '2';
        $pro->nombre = 'FINO FLOR';
        $pro->descripcion = 'Un vino de gran personalidad, envejecido en barricas centenarias de roble americano y seleccionado de nuestras mejores soleras.';
        $pro->id_categoria = '1';
        $pro->precio = '7';
        $pro->imagen = 'finoCB.jpg';
        $pro->save();

        $pro = new Producto();
        $pro->user_id = '3';
        $pro->nombre = 'VINO DE TINAJA LAGAR DE LOS FRAILES';
        $pro->descripcion = 'Como todos nuestros vinos, es  100 % en rama, sin ningún tratamiento ni filtrado, ligero y amable al paladar.';
        $pro->id_categoria = '3';
        $pro->precio = '24.50';
        $pro->imagen = 'VinoTinaja.jpg';
        $pro->save();

        $pro = new Producto();
        $pro->user_id = '2';
        $pro->nombre = 'Amontillado San Pablo';
        $pro->descripcion = 'El amontillado San Pablo es un vino que tiene más de 40 años de crianza en roble americano.';
        $pro->id_categoria = '2';
        $pro->precio = '21';
        $pro->imagen = 'Amontillado1.png';
        $pro->save();

    }
}
