<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventException extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'is_rescheduled',
        'is_cancelled',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'is_full_day',
        'is_recurring',
        'venue_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'event_id' => 'integer',
        'is_rescheduled' => 'boolean',
        'is_cancelled' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_full_day' => 'boolean',
        'is_recurring' => 'boolean',
        'venue_id' => 'integer',
    ];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function event()
    {
        return $this->belongsTo(\App\Models\Event::class);
    }

    public function venue()
    {
        return $this->belongsTo(\App\Models\Venue::class);
    }
}
