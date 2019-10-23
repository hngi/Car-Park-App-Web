<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    public function slot_users()
    {
        return $this->belongsToMany('\App\Slot', 'slot_users');
    }

}