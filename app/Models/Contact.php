<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //contact table
    protected $table = 'contact';
    protected $primaryKey = 'contact_id';
    protected  $fillable = ['name','email','msg','contact'];
}
