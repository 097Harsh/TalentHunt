<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobDepartment extends Model
{
   
     //job deparmtnet table
     protected $table_name = 'Job_department';
     protected $primaryKey = 'department_id';
     protected $fillable = [
         'department_name',
     ];
}
