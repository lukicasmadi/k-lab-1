<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\JenisPelanggaran;
use Illuminate\Database\Eloquent\Factories\Factory;

class JenisPelanggaranFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JenisPelanggaran::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => Str::uuid(),
            'name' => $this->faker->catchPhrase(),
            'desc' => $this->faker->paragraph(5, false),
            'created_by' => User::all()->random()->id,
        ];
    }
}
