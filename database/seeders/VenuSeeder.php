<?php

namespace Database\Seeders;

use App\Models\Venu;
use Illuminate\Database\Seeder;

class VenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Venu::factory()->count(5)->create();
    }
}
