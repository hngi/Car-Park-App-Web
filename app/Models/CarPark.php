<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarPark extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['owner_id', 'name', 'location'];

    public function slots()
    {
        return $this->hasMany('\App\Slot', 'car_park_id');
    }

}