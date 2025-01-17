<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
     //state model
     protected $table = 'state';
     protected $fillable = ['country_id','state_id','state_name'];
}
