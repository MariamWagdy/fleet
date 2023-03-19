<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buses extends Model
{
    use HasFactory;
//    use Billable, HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'bus_number',
    ];


    public function trip(): HasOne
    {
        return $this->hasOne(Trips::class);
    }

    public function seats(): HasMany
    {
        return $this->hasMany(Seats::class);
    }
}
