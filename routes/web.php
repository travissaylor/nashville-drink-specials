<?php

use App\Http\Livewire\Events\Create;
use App\Http\Livewire\Events\Edit;
use App\Http\Livewire\Events\Index;
use App\Http\Livewire\Occurrences\Day;
use App\Http\Livewire\Occurrences\Month;
use App\Http\Livewire\Occurrences\Show;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', ['today' => Carbon\Carbon::today()]);
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/occurances/calendar', function () {
    return view('calendar.calendar');
})->name('occurrences.calendar');

Route::get('/occurances/day/{year}/{month}/{day}', Day::class)->name('occurrences.day');
Route::get('/occurances/month/{year}/{month}', Month::class)->name('occurrences.month');
Route::get('/occurances/{id}', Show::class)->name('occurrences.show');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('admin')->middleware('role:admin')->as('admin.')->group(function () {
        Route::get('/events', Index::class)->name('events.index');
        Route::get('/events/new', Create::class)->name('events.create');
        Route::get('/events/{id}/edit', Edit::class)->name('events.edit');
    });
});