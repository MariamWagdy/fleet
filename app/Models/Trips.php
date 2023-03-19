<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_number',
        'source_city_id',
        'destination_city_id',
        'bus_id',
        'departure_time',
        'arrival_time',
        'is_available'
    ];

    public function bus(): HasOne
    {
        return $this->hasOne(Buses::class);
    }

    public function children()
    {
        return $this->hasMany('trips', 'parent_id');
    }
}
