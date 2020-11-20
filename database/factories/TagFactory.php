<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images = ['about-bg.jpg', 'contact-bg.jpg', 'home-bg.jpg', 'post-bg.jpg'];
        $word = $this->faker->word;
        return [
            'tag'               => $word,
            'title'             => ucfirst($word),
            'subtitle'          => $this->faker->sentence,
            'page_image'        => $images[mt_rand(0, 3)],
            'meta_description'  => "Meta for $word",
            'reverse_direction' => false,
        ];
    }
}
