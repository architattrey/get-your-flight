<?php

namespace App\Http\Controllers\Data\Air;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AirViewController extends Controller
{
    public function getairdata(Request $r)
    {
        if ($r->flying_from_1) {

            return view('air.multi_city');

        }elseif($r->arrival_date){
            return view('air.get_airdata');
        }
        return view('air.oneway');
    }

    public function getairdatasunil(Request $r)
    {
        if ($r->flying_from_1) {

            return view('air.multi_city');

        }
        return view('air.sunil.get_airdata');
    }

    public function booking($index, $tracID)
    {
        $indexes = explode("-",$index);

        if (count($indexes) == 1) {

            if (isset($index) and isset($tracID)){

                return view('air.booking.booking_form', compact('index', 'tracID'));
            }

        }else {

            if (isset($indexes[0]) and isset($indexes[1]) and isset($tracID)){

                return view('air.booking.booking_form_return', compact('index', 'tracID'));
            }
        }
      
        return back();        
    }

    public function SingleAirDetails($id,Request $r)
    {
        return "Hii";
    }
}
