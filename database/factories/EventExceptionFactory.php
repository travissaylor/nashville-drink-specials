<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\EventException;
use App\Models\Venu;

class EventExceptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EventException::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'event_id' => Event::factory(),
            'is_rescheduled' => $this->faker->boolean,
            'is_cancelled' => $this->faker->boolean,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'is_full_day' => $this->faker->boolean,
            'is_recurring' => $this->faker->boolean,
            'venu_id' => Venu::factory(),
        ];
    }
}
