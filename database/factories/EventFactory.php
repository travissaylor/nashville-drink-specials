<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Venu;
use Carbon\Carbon;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    public function recurring()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_recurring' => true,
            ];
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $timespanInWeeks = $this->faker->numberBetween(1, 52);
        $startDate = $this->faker->dateTimeBetween('-1 year');
        $endDate = Carbon::parse($startDate)->addWeeks($timespanInWeeks)->toDateString();

        $isFullDay = $this->faker->boolean;
        $startTime = null;
        $endTime = null;
        if ($isFullDay) {
            $startTime = $this->faker->time();
            $endTime = Carbon::parse($startTime)->addHours($this->faker->numberBetween(1, 6))->toTimeString();
        }


        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'is_full_day' => $isFullDay,
            'is_recurring' => $this->faker->boolean,
            'venu_id' => Venu::factory(),
            'user_id' => 1, // @todo make this dynamic
        ];
    }
}
