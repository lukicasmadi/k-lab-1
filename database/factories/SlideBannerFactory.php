<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\SlideBanner;
use Illuminate\Database\Eloquent\Factories\Factory;

class SlideBannerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SlideBanner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'img' => $this->faker->domainWord().".jpg",
            'name' => $this->faker->word(),
            'created_by' => User::all()->random()->id,
        ];
    }
}
