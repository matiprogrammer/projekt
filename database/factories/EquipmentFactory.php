<?php

namespace Database\Factories;

use App\Models\Equipment;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipmentFactory extends Factory
{
    protected $model=Equipment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'model' => $this->faker->name(),
            'photo' => $this->faker->url(),
            'desc' => $this->faker->paragraph(),
            'url' => $this->faker->url(),
            'quantity' => $this->faker->randomNumber(),
        ];
    }
}
