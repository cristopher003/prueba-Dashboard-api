<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PositionFactory extends Factory
{
   

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => fake()->unique()->regexify('[A-Z]{3}\d{3}'), // Ejemplo: ABC123
            'nombre' => fake()->jobTitle,
            'activo' => fake()->boolean(80), // Probabilidad del 80% de ser activo
            'idUsuarioCreacion' => fake()->numberBetween(1, 100), // ID de usuario de creación aleatorio
            // No incluyas 'created_at' y 'updated_at' ya que Laravel las manejará automáticamente
        ];
    }

}
