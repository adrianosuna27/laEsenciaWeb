<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = new Categoria();
        $cat->nombre = "Fino";
        $cat->save();

        $cat = new Categoria();
        $cat->nombre = "Tinto";
        $cat->save();

        $cat = new Categoria();
        $cat->nombre = "Oloroso";
        $cat->save();
    }
}
