<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->sentence(mt_rand(0, 20)),
            'content' => join("\n\n",$this->faker->paragraphs(mt_rand(3, 6))),
            'published_at' =>  $this->faker->dateTimeBetween('-1 month', '+3 days')
        ];
    }
}
