<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['image', 'video', 'vimeo']);
        
        return [
            'course_name' => 'test course',
            'overview' => $this->faker->text(100), 
            'course_price' => '1', 
            'type' => 'vimeo', 
            'media' => 'https://player.vimeo.com/video/1084537', 
            'media_name' => 'funny vimeo', 
            'media_size' => '15min', 
            'body' => 'some description.... ', 
            'cover_image' => '/storage/courses/QyQqwA2DjJyGafGFKrf8bJx7VjrkaFjabvNeQwEb.jpg'
        ];
    }
}
