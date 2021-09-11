<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecurringPattern extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'recurring_type',
        'repeat_interval',
        'max_occurrences',
        'repeat_by_days',
        'repeat_by_months',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'event_id' => 'integer',
        'repeat_interval' => 'integer',
        'repeat_by_months' => 'integer',
    ];


    public function event()
    {
        return $this->belongsTo(\App\Models\Event::class);
    }
}
