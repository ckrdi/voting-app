<?php

namespace Database\Factories;

use App\Models\Idea;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdeaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Idea::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 5),
            'category_id' => $this->faker->numberBetween(1, 4),
            'status_id' => $this->faker->numberBetween(1, 5),
            'title' => $this->faker->words(6, true),
            'body' => $this->faker->paragraphs(2, true)
        ];
    }
}
