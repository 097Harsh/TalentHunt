<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    //job category table
    protected $table_name = 'Job_category';
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'category_name',
    ];
}
