<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Competencia;
class CompetenciaFactory extends Factory
{
    protected $model = Competencia::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */    
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'state' => $this->faker->boolean,
            'descripcion' => $this->faker->paragraph,
            // ... otras propiedades
        ];
    }
}
