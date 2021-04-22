<?php

namespace App\Model\Booking;

use Illuminate\Database\Eloquent\Model;
use App\Model\Order;
use Tzsk\Payu\Model\PayuPayment;

class HotelBooking extends Model
{
    protected $fillable = [
        'hotel_index','hotel_room_index','hotel_info','code','trace_Id',
        'user_id','total_adults','total_childrens',
        'adults_details','childrens_details','phone','email','amount',
        'address','city','response','status','iss_gst','gst_details',
        'transaction_id','payu_id'
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
