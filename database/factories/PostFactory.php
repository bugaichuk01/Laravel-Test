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
            'title' => $this->faker->word,
            'state' => 1,
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(3)). '</p>',
            'image' => 'aut.jpg',
            'view_count' => $this->faker->randomNumber(),
            'announcement' => '<p>' . implode('</p><p>', $this->faker->paragraphs(1)). '</p>',
            'published_at' => $this->faker->dateTimeBetween('-1 week', now()),
            'category_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
