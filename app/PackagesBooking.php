<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Model\Order;

class PackagesBooking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                'is_booked_by',    
                'guest_id',        
                'user_id',
                'package_id',
                'departure_city', 
                'customer_city',
                'departure_date',
                'total_adults',
                'total_childrens',
                'adults_details',
                'childrens_details',
                'phone',
                'email',
                'zip_code'
    ];

     public function package()
    {
        return $this->belongsTo('App\Package', 'package_id');
    }
    public function orders()
    {
      return $this->morphMany(Order::class, 'orderable');
    }
    
}
