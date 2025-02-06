<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterViewModel extends Model
{
   //fields
   protected $table_name = "Interview";
   protected $primaryKey = 'interview_id';
   protected $fillable = ['app_id','scheduled_date','start_time','end_time','status','interview_link'];
}
