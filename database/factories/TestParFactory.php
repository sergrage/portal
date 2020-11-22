<?php

namespace Database\Factories;

use App\Models\Testpar;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestParFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Testpar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'par' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 50, $max = 80),
        ];
    }
}
