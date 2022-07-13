<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nombre' => 'Josue',
            'apellidos' => 'Hernandez',
            'email' => 'administrador@admin.sv',
            'username' => 'administrador@admin.sv',
            'estado' => 1,
            'id_rol' => 1,
            'es_admin' => 1,
            'email_verified_at' => null,
            'password' => bcrypt('1234567'),
        //    'deactivated_at' => null,
            ]);
    }
}
