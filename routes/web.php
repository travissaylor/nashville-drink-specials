<?php

use App\Http\Livewire\Events\Create;
use App\Http\Livewire\Events\Edit;
use App\Http\Livewire\Events\Index;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

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