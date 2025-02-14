<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job_applied extends Model
{
    //
    protected $table_name = "job_applied";
    protected $primaryKey = 'app_id';
    protected $fillable = ['application_status','msg','resume','experince','application_date','user_id','job_id'];
 
}
