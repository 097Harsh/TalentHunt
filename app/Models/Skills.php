<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    //skills table
    protected $table = 'Skills';
    protected $primaryKey = 'skill_id';
    protected $fillable = [ 'skill_name'];
}
