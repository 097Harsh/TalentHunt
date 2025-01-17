<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job_upload extends Model
{
    //
    //job model
    protected $table_name = 'job_upload';
    protected $primaryKey = 'job_id';
    protected $fillable = [
        'title',
        'description',
        'num_of_vacany',
        'city_id',
        'state_id',
        'country_id',
        'experience',
        'category_id',////forign key with job_category
        'job_skill_required',
        'status',//(e.g., Open, Closed, Filled).
        'j_active','company_id',//company_id foreign key
        'job_working_hour','department_id',//forign key with job_department
        'posted_date','closing_date','ContactEmail',
    ];
}
