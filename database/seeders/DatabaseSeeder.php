<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Role::create(["name"=> "SUPER ADMINISTRADOR", "guard_name"=> "Web"]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'Kike123456789#',
            'nombres' => 'Enrique Absalon',
            'apellidos' => 'Sandoval Carmen',
            'tipo_documento' => 'DNI',
            'numero_documento' => '70457167',
            'celular' => '948749893',
            'direccion' => 'Av. Los Angeles 123',
            'fecha_nacimiento' => '2001-09-19',
            'genero' => 'MASCULINO',
            'foto_perfil' => 'https://ui-avatars.com/api/?name=Enrique+Absalon',
            'contacto_nombre' => 'Ana Flores',
            'contacto_telefono' => '987654321',
            'contacto_relacion' => 'Amiga',
            'estado' => 'ACTIVO',
        ]);
    }
}
