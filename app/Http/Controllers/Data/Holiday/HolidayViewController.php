<?php

namespace App\Http\Controllers\Data\Holiday;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;

class HolidayViewController extends Controller
{
    //
    public function HolidaysSearch()
    {

    	$packages = package::take(3)->get();
        return view('holiday.holidays',compact('packages'));
    }
}
