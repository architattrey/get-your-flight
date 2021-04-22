<?php

namespace App\Http\Controllers\Data\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelViewController extends Controller
{
    public function getform()
    {
        return view('hotel.index');
    }

    public function gethoteldata()
    {
        return view('hotel.getdata');
    }

    public function show($index, $code, $traceid) { 
        
        $search_data = json_decode(session('search_data_hotel'));
    	return view('hotel.hotel-details', compact(['index', 'code', 'traceid', 'search_data']));
    }

    public function blockroom($hotelindex, $hotelroomindex, $code, $traceid) {
        $search_data = json_decode(session('search_data_hotel'));
    	return view('hotel.booking.booking_form', compact(['hotelindex', 'hotelroomindex', 'code', 'traceid', 'search_data']));
    }
}


