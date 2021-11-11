<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
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
        'address',
        'phone_number',
        'website_url',
        'covid_protocol',
        'neighborhood_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'neighborhood_id' => 'integer',
    ];


    public function events()
    {
        return $this->hasMany(\App\Models\Event::class);
    }

    public function venuHours()
    {
        return $this->hasMany(\App\Models\VenuHours::class);
    }

    public function neighborhood()
    {
        return $this->belongsTo(\App\Models\Neighborhood::class);
    }
}
