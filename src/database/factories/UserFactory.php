<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "usuario" => fake()->name(10),
            "email" => fake() ->unique() ->safeEmail(),
            'primerNombre' => fake()->name(),
            'segundoNombre' => fake()->name(),
            'primerApellido' => fake()->name(),
            'segundoApellido' => fake()->name(),
            'cedula' => fake()->numberBetween(0000000000,2147483647),
            // 'idDepartamento' => $departments->random(),
            // 'idCargo' => $positions->random(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

}
