<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Order;
use Tzsk\Payu\Model\PayuPayment;

class FlightsBooking extends Model
{
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
              'index_id','trace_id','user_id','total_adults','total_childrens',
              'adults_details','childrens_details','phone','email','amount',
              'address','city', 'return_response', 'response','status','iss_gst','gst_details',
              'transaction_id','pnr_number', 'return_pnr_number', 'return_booking_id', 'booking_id', 'get_booking_details', 
              'get_booking_details_return', 'payu_id'
    ];

    public function orders()
    {
      return $this->morphMany(Order::class, 'orderable');
    }

    public function payment()
    {
      return $this->belongsTo(PayuPayment::class,'payu_id');
    }
    
}
