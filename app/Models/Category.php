<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasTranslations,HasFactory;


    protected $translatable =['name'];
    protected $table = 'categories';
    protected $fillable =[
        'name',
    ];

    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y h:i A', strtotime($value));
    }
    public function products()
    {
        return $this->hasMany(Product::class , 'category_id');
    }

}
