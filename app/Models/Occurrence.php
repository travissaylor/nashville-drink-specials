<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occurrence extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'event_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function getCarbonStartDateAttribute()
    {
        return Carbon::parse($this->start_date);
    }

    public function getCarbonStartTimeAttribute()
    {
        return Carbon::parse($this->start_time);
    }

    public function getCarbonEndTimeAttribute()
    {
        return Carbon::parse($this->end_time);
    }

    public function event()
    {
        return $this->belongsTo(\App\Models\Event::class);
    }
}
