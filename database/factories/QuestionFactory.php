<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'q' => 'What is your birthday?', 
            'lesson_id' => $this->faker->numberBetween($min="1", $max="5"), 
            'opt1' => $this->faker->text(20), 
            'opt2' => $this->faker->text(20), 
            'opt3'=> $this->faker->text(20),  
            'opt4'=> $this->faker->text(20),  
            'answer_number' => '1', 
        ];
    }
}
