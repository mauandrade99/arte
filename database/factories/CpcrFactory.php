<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cpcr>
 */
class CpcrFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $titulo = $this->faker->unique()->sentence();
        return [
            'user_id' => User::pluck('id')->random(),
            'titulo' => $titulo,
            'descricao' => $this->faker->paragraph(),
            'valor' => $this->faker->randomFloat(2,500,5000),
            'datavenc' => $this->faker->dateTimeBetween('+1 week', '+4 week'),
        ];


    }
}
