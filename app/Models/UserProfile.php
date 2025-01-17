<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    //User Profile Table
    protected $table = 'user_profiles';
    protected $primaryKey = 'p_id';
    protected $fillable = [
        'user_id',
        'city_id',
        'state_id',
        'country_id',
        'contact',
        'resume_file','user_image',
        'course_id','skill_id','designation','address','objective'
    ];


}
