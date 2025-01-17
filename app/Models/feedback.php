<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    //fields
    protected $table_name = "feedback";
    protected $fillable = ['f_id','rating','msg','user_id'];
}
