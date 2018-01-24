<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $fillable = ['site_url','site_email', 'site_description' , 'site_keywords' , 'site_google_analytics_id' , 'google_javascript_code','points','review_points','address_arabic','address_english','phone'];
}
