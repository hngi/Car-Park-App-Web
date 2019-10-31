<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['authority'];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany('\App\Models\User', 'user_roles');
    }

}