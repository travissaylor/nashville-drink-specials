<?php

namespace Tests\Feature;

use App\Http\Livewire\Events\Create;
use App\Models\Event;
use App\Models\Neighborhood;
use App\Models\Role;
use App\Models\User;
use App\Models\Venu;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    public function test_single_event_creation()
    {
        $user = User::factory()->create(['role_id' => 1]);
        Livewire::actingAs($user);
        Venu::factory()->count(5)->create();
        Neighborhood::factory()->count(5)->create();

        Role::factory()->create(['name' => 'admin']);
        Role::factory()->create(['name' => 'subscriber']);

        Livewire::actingAs($user)
            ->test(Create::class)
            ->set('name', "Bob Johnson")
            ->set('startDate', Carbon::today()->toDateString())
            ->set('isFullDay', true)
            ->set('description', "")
            ->call('save');

        $this->assertTrue(Event::where('name', "=", "Bob Johnson"));
    }
}
