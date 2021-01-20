<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Polda;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PoldaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Polda::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $city = Str::upper($this->faker->city());
        $province = Str::upper($this->faker->country());

        return [
            'uuid' => Str::uuid(),
            'name' => 'POLDA '.$city,
            'aka' => Str::upper(Str::of($city)->slug('-')),
            'province' => $province,
            'city' => $city,
            'address' => Str::upper($this->faker->address()),
            'created_by' => User::first()->id,
        ];
    }
}
