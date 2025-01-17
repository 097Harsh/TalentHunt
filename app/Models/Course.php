<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //city table
    protected $table = 'course';
    protected $primaryKey = 'course_id'; 
    protected $fillable = ['course_name','is_delete'];
}
