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
            'event_id' => Event::factory()->recurring(),
            'recurring_type' => $this->faker->randomElement(RecurringPattern::$recurringTypes),
            'repeat_interval' => $this->faker->numberBetween(1, 10),
            'max_occurrences' => $this->faker->numberBetween(1, 10000),
            'repeat_by_days' => null, // @todo Add this functionality
            'repeat_by_months' => null, // @todo Add this functionality
        ];
    }
}
