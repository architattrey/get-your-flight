<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'country_type','package_name','city','slug', 'seller', 'image', 'themes_type', 'about_package','trip_highlights','itinerarys','package_rate', 'terms_conditions', 'cancellation_policy','inclusions','exclusions','payment_policy'
    ];

    public function bookings()
    {
       return $this->hasMany('App\PackagesBooking', 'package_id');

    	
    }
}
