<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => Str::uuid(),
            'topic' => $this->faker->sentence(3, true),
            'desc' => $this->faker->paragraph(5, false),
            'small_img' => 'small.png',
            'big_img' => 'big.png',
            'category_id' => Category::all()->random()->id,
            'created_by' => User::all()->random()->id,
        ];
    }
}
