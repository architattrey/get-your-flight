<?php

namespace App\Http\Controllers\Api\Holiday;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;

class HolidayApiController extends Controller
{
    /* 
        fetching all city
    */

    public function packges($for_city = null)
    {
        if ($for_city) {

            $cities = Package::select('city')->get();
            $datas = [];

            foreach ($cities as $key => $value) {
                $datas [] = $value->city;
            }

            return $datas;
        }

        $packages = Package::get();

        return $packages;
    }
    
    /* 
        fetching all packages
    */
    public function searchpackges(Request $r)
    {
        if ($r->to) {
           $packages = Package::where('city', $r->to)->get();
        }else{
            $packages = Package::get();
        }
        
        if (count($packages)) {

            return $packages;

        }else {
            
            return response("No packages found", 200);
        }
    }
}
