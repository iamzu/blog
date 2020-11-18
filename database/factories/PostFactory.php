<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $images = ['about-bg.jpg', 'contact-bg.jpg', 'home-bg.jpg', 'post-bg.jpg'];
        $title = $this->faker->sentence(mt_rand(3, 10));
        return [
            //
            'title' => $title,
            'subtitle' => Str::limit($this->faker->sentence(mt_rand(10, 20)), 252),
            'page_image' => $images[mt_rand(0, 3)],
            'content_raw' => join("\n\n", $this->faker->paragraphs(mt_rand(3, 6))),
            'published_at' => $this->faker->dateTimeBetween('-1 month', '+3 days'),
            'meta_description' => "Meta for $title",
            'is_draft' => false,
        ];
    }
}
