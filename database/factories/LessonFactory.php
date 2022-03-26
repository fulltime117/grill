<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['image', 'video', 'vimeo']);
        return [
            'lesson_name' => 'test lesson', 
            'lesson_image' => '/storage/lessons/qI7H8hgkpquvx3E4xQTagoZ3URzHP3MhLjmVxlcB.jpg', 
            'type' => 'vimeo', 
            'media' => 'https://player.vimeo.com/video/1084537', 
            'media_name' => 'study.#', 
            'media_size' => '15min', 
            'body' => $this->faker->text(300) , 
            'course_id' => '1', 
        ];
    }
}
