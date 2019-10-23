<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarPark extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'location'];

    public function slots()
    {
        return $this->hasMany('\App\Slot', 'car_park_id');
    }

}