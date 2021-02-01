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
        $kota = ['Aceh', 'Sumatra Utara', 'Sumatra Barat'];
        $random_keys = array_rand($kota, 3);

        return [
            'uuid' => Str::uuid(),
            // 'name' => 'Polda '.$kota[$random_keys[0]],
            'name' => 'Polda '.$this->faker->city(),
            'jurisdiction' => '-',
            'headquarters' => '-',
            'type' => '-',
            'official_site' => '-',
            'created_by' => User::first()->id,
        ];
    }
}
