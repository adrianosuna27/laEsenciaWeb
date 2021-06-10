<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->nombre = "Adrian";
        $user->apellidos = "Osuna";
        $user->email = "adrian@adrian.es";
        $user->password = Hash::make('1234');
        $user->cp = "12345";
        $user->telefono = "123456789";
        $user->direccion = "C/Calle";
        $user->email_verified_at = '2021-03-03 09:19:31';
        $user->bodega = true;
        $user->nom_bodega = "Bodega San Pablo";
        $user->save();
        $user->roles()->attach(Role::where('name', 'admin')->first());
        $user->save();

        $user = new User();
        $user->nombre = "Fran";
        $user->apellidos = "Roldan";
        $user->email = "fran@fran.es";
        $user->password = Hash::make('1234');
        $user->cp = "12345";
        $user->telefono = "123456789";
        $user->direccion = "C/Calle";
        $user->email_verified_at = '2021-03-03 09:19:31';
        $user->bodega = true;
        $user->nom_bodega = "Lagar Casa Blanca";
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());
        $user->save();

        $user = new User();
        $user->nombre = "Ana";
        $user->apellidos = "Doblado";
        $user->email = "ana@ana.es";
        $user->password = Hash::make('1234');
        $user->cp = "12345";
        $user->telefono = "123456789";
        $user->direccion = "C/Calle";
        $user->bodega = true;
        $user->nom_bodega = "Lagar los Frailes";
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());
        $user->save();

        $user = new User();
        $user->nombre = "Arturo";
        $user->apellidos = "Perez";
        $user->email = "arturo@arturo.es";
        $user->password = Hash::make('1234');
        $user->cp = "12345";
        $user->telefono = "123456789";
        $user->direccion = "C/Calle";
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());
        $user->save();
    }
}
