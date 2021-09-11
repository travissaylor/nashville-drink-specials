<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'is_full_day',
        'is_recurring',
        'venu_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_full_day' => 'boolean',
        'is_recurring' => 'boolean',
        'venu_id' => 'integer',
    ];


    public function recurringPattern()
    {
        return $this->hasOne(\App\Models\RecurringPattern::class);
    }

    public function eventExceptions()
    {
        return $this->hasMany(\App\Models\EventException::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function venu()
    {
        return $this->belongsTo(\App\Models\Venu::class);
    }
}
