<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlotUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'slot_id', 'time_in', 'time_out'];
}