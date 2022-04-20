<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Noticias>
 */
class NoticiasFactory extends Factory
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
            'Descripcion'=>$this->faker->text(20),
            'Anio'=>$this->faker->randomNumber(4, true),
            'Escritor'=>$this->faker->text(20),
            

        ];
    }
}
