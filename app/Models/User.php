<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    protected  $hidden = ['password'];

    public function slots()
    {
        return $this->belongsToMany('\App\Models\Slot', 'slot_users');
    }

}