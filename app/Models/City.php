<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //city table
    protected $table = 'city';
    protected $fillable = ['city_id','city_name','state_id'];
}
