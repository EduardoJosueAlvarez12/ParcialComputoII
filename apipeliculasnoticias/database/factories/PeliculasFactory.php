<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peliculas>
 */
class PeliculasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'Titulo'=>$this->faker->text(20),
            'Genero'=>$this->faker->text(15),
            'Anio'=>$this->faker->randomNumber(4, true),
            'Director'=>$this->faker->text(20),
            'Productor'=>$this->faker->text(20)
        ];
    }
}
