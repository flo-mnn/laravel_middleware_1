<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
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
        return
        // $users = User::all();
        [
            "title" => $this->faker->name,
            "content" =>$this->faker->numberBetween(10,100),
            "user_id"=>random_int(1,10),
        ];
    }
}
