<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Neighborhood;
use App\Models\Venu;

class VenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Venu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'address' => $this->faker->address(),
            'phone_number' => $this->faker->phoneNumber,
            'website_url' => $this->faker->url(),
            'covid_protocol' => $this->faker->text,
            'neighborhood_id' => Neighborhood::factory(),
        ];
    }
}
