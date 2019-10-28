<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['car_park_id', 'row_id', 'number'];

    public function car_parks()
    {
        return $this->belongsTo('\App\CarPark', 'car_park_id');
    }

    public function row()
    {
        return $this->belongsTo('\App\Row', 'row_id');
    }

    public function users()
    {
        return $this->belongsToMany('\App\User', 'slot_users')
            ->withPivot(['id', 'time_in', 'time_out']);
    }

}