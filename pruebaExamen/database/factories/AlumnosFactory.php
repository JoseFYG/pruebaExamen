<?php

namespace Database\Factories;

use App\Models\Alumnos;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alumnos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>ucwords($this->faker->word),
            'apellidos'=>ucwords($this->faker->word),
            'mail'=>$this->faker->unique()->email,
            'telefono'=>$this->faker->numberBetween($min=100000000, $max=999999999)
        ];
    }
}
