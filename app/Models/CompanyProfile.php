<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    //compnay profile information
    protected $table_name = 'company_profiles';
    protected $primaryKey = 'c_id';
    protected $fillable = [
        'registration_number',
        'website_url',
        'industry_type',
        'contact',
        'address',
        'country_id',
        'state_id',
        'city_id',
        'established_date',
        'num_of_emp',
        'description','user_id',
    ];
}
