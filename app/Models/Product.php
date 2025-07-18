<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;
    protected $fillable =['id','name','description','category_id'];
    protected $translatable = ['name','description'];

    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y h:i A', strtotime($value));
    }
    // relations
    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class , 'product_id');
    }
}
