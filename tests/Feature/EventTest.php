<?php

namespace Tests\Feature;

use App\Http\Livewire\Events\Create;
use App\Http\Livewire\Events\Edit;
use App\Models\Event;
use App\Models\Neighborhood;
use App\Models\Role;
use App\Models\User;
use App\Models\Venue;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Livewire\Livewire;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    protected static $user;

    protected function setUp(): void
    {
        parent::setUp();
        self::$user = User::factory()->create(['role_id' => 1]);
        Neighborhood::factory()->count(5)->create();

        Role::factory()->create(['name' => 'admin']);
        Role::factory()->create(['name' => 'subscriber']);
    }

    public function test_single_event_creation()
    {
        Venue::factory()->count(5)->create();
        Livewire::actingAs(self::$user)
            ->test(Create::class)
            ->set('name', "Bob Johnson")
            ->set('startDate', Carbon::today()->toDateString())
            ->set('isFullDay', true)
            ->call('save');

        $this->assertTrue(Event::where('name', "=", "Bob Johnson")->exists());
    }

    public function test_single_event_edit()
    {
        $event = Event::factory()->create([
            'is_recurring' => false
        ]);
        
        Livewire::actingAs(self::$user)
            ->test(Edit::class, ["id" => $event->id])
            ->set('name', "Tina Turner")
            ->set('startDate', Carbon::today()->toDateString())
            ->set('isFullDay', true)
            ->call('save');

        $this->assertTrue(Event::where('name', "=", "Tina Turner")->exists());
        $this->assertFalse(Event::where('name', "=", "Bob Johnson")->exists());
    }
}
