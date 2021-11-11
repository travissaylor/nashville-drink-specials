<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Venue;
use App\Models\VenueHours;

class VenueHoursFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VenueHours::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'venue_id' => Venue::factory(),
            'day' => $this->faker->numberBetween(0, 6),
            'open_time' => $this->faker->time(),
            'close_time' => $this->faker->time(),
        ];
    }
}
