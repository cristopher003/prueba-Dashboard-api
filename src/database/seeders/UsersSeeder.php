<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
               // Crear 50 usuarios
               User::factory()->count(10)->create()->each(function ($user) {
                // Asignar un departamento aleatorio a cada usuario
                // $user->department()->save(factory(App\Post::class)->make());

                $departamento = Department::inRandomOrder()->first();
                // $user->department()->associate($departamento);
                $user->idDepartamento = $departamento->id; 
                $user->save();
                
                // Asignar un cargo aleatorio a cada usuario
                $cargo = Position::inRandomOrder()->first();
                // $user->position()->associate($cargo);
                $user->idCargo = $cargo->id; 
                $user->save();
            });
        }
}
