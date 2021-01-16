<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\BannerHeader;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerHeaderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BannerHeader::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'img' => $this->faker->domainWord().".jpg",
            'created_by' => User::all()->random()->id,
        ];
    }
}
