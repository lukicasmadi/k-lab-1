<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Polda;
use Illuminate\Support\Str;
use App\Models\RencanaOperasi;
use App\Models\PoldaHasRencanaOperasi;
use Illuminate\Database\Eloquent\Factories\Factory;

class PoldaHasRencanaOperasiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PoldaHasRencanaOperasi::class;

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
            'rencana_operasi_id' => RencanaOperasi::all()->random()->id,
            'polda_id' => Polda::all()->random()->id,
            'operation_name' => $name,
            'slug_operation_name' => Str::slug($name, '-'),
            'detail_operation' => $this->faker->sentence(6, true),
            'created_by' => User::all()->random()->id,
        ];
    }
}
