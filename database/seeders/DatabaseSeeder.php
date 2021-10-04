<?php

namespace Database\Seeders;

use App\Models\RecurringPattern;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create([
            'name' => "Travis Saylor",
            'email' => "travis.saylor@gmail.com",
            'role_id' => 1,
        ]);
        \App\Models\User::factory(9)->create();

        RecurringPattern::factory(20)->create();

        $this->call([
            NeighborhoodSeeder::class,
            VenuSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
