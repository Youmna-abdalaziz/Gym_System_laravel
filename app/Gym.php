<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $fillable = [
        'name',
        'city_id',
        'created_at',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
