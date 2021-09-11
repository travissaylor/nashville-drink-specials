<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\RecurringPattern;

class RecurringPatternFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecurringPattern::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'event_id' => Event::factory(),
            'recurring_type' => $this->faker->word,
            'repeat_interval' => $this->faker->numberBetween(-8, 8),
            'max_occurrences' => $this->faker->numberBetween(-10000, 10000),
            'repeat_by_days' => $this->faker->regexify('[A-Za-z0-9]{2}'),
            'repeat_by_months' => $this->faker->numberBetween(-8, 8),
        ];
    }
}
