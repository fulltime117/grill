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
            'title' => $this->faker->text(20),
            'body' => $this->faker->sentence(350),
            'image' => '/storage/posts/IemJ3qSfrrVjFbcPM7ut5SlvhwOhxE1rnFXyBT28.jpg',
            'user_id' => '1',
            'category_id'=> '1',
        ];
    }
}
