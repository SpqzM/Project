<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->unique()->words(3, true);
        $slug = Str::slug($title, '-');
        
        return [
            'title' => $title,
            'slug' => $slug,
            'content' => $this->faker->paragraphs(5, true),
            'user_id' => 1
        ];
    }

}
