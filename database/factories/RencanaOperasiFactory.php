<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\RencanaOperasi;
use Illuminate\Database\Eloquent\Factories\Factory;

class RencanaOperasiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RencanaOperasi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->catchPhrase();
        return [
            'uuid' => Str::uuid(),
            'name' => $name,
            'slug_name' => Str::slug($name, '-'),
            'operation_type' => $this->faker->sentence(6, true),
            'start_date' => $this->faker->date($format = 'Y-m-d', 'now'),
            'end_date' => $this->faker->date($format = 'Y-m-d', 'now'),
            'desc' => $this->faker->paragraph(3, true),
            'created_by' => User::all()->random()->id,
        ];
    }
}
