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
    protected $fillable = ['owner_id', 'name', 'address', 'phone_no', 'car_park_fee'];

    public function slots()
    {
        return $this->hasMany('\App\Models\Slot', 'car_park_id');
    }

    public function owner()
    {
        return $this->belongsTo('\App\Models\User', 'owner_id');
    }

}