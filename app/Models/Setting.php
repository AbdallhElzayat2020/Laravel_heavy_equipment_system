<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations;

    public $timestamps = false;
    protected $table = 'settings';
    protected $fillable = [
        'site_name',
        'site_phone',
        'site_address',
        'site_email',
        'site_logo',
        'site_favicon',
        'latitude',
        'longitude',
        'site_vedio',
        'site_fax',
        'site_description',
        'site_whatsapp',
        'after_sale_content',
        'quality_policy',
        'about_us_image',
    ];
    protected $translatable = [
        'site_name',
        'site_description',
        'site_address',
        'after_sale_content',
        'quality_policy',
    ];



    public function getSiteLogoAttribute()
    { 
        return 'uploads/settings/' . $this->attributes['site_logo'];
    }

    public function getSiteFaviconAttribute()
    {
        return 'uploads/settings/' . $this->attributes['site_favicon'];
    }
    public function getAboutUsImageAttribute()
    {
        return 'uploads/settings/' . $this->attributes['about_us_image'];
    }

    public function getSiteVedioAttribute($value)
    { 
        return $this->convertToEmbedUrl($value);
    }

    // Function to convert YouTube URL to embed format
    private function convertToEmbedUrl($url)
    {
        if (strpos($url, 'watch?v=') !== false) {
            return str_replace('watch?v=', 'embed/', $url);
        }
        return $url; // Return as-is if already in the correct format
    }
}
