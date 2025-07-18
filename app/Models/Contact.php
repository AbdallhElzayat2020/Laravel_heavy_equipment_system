<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name','email','message','subject','is_read'];


    // public function getCreatedAtAttribute($value)
    // {
    //     return date('d-m-Y', strtotime($value));
    // }
}
