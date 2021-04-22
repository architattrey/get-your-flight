<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Data\City;
use App\Model\Data\Airport;
use App\Model\Data\AirportCityCountry;
use App\Model\Data\HotelCityCode;
use App\Model\Data\Station;
use App\Model\Data\Airline;

class DataController extends Controller
{
    public function city($for_code = null)
    {
        if ($for_code) {

            $cities = City::select('name_code')->get();

            $datas = [];

            foreach ($cities as $key => $value) {
                
                $datas[] = $value->name_code;
            }

            return $datas;

        }else {

            $cities = City::get();
        }
        

        return $cities;
    }

    public function airport()
    {
        $airports = Airport::get();

        return $airports;
    }

    public function airportcitycountry($for_code = null)
    {
        
        if ($for_code) {
            $airportcontorys = AirportCityCountry::select('CityName', 'CityCode')->orderBy('order_by')->get();
            $datas = [];
            foreach ($airportcontorys as $key => $value) {
                
                $datas[] = "$value->CityName-$value->CityCode";
            }

            return $datas;
        }
        $airportcontorys = AirportCityCountry::get();

        return $airportcontorys;
    }

    public function hotelcitycode($for_code = null)
    {

        if ($for_code) {
            $hotelcitycodes = HotelCityCode::select('Destination')->get();
            $datas = [];
            foreach ($hotelcitycodes as $key => $value) {
                
                $datas[] = "$value->Destination";
            }

            return $datas;
        }
        $hotelcitycodes = HotelCityCode::get();

        return $hotelcitycodes;
    }

    /* 
        Selecting station from datatabse
     */

    public function station($for_code = null)
    {
        if ($for_code) {
            $stations = Station::select('station')->get();
            $datas = [];
            foreach ($stations as $key => $value) {
                
                $datas[] = "$value->station";
            }

            return $datas;
        }
        $stations = Station::get();

        return $stations;
    }

     /* 
        Selecting station from datatabse
     */

    public function airlines($for_code = null)
    {
        if ($for_code) {

            $airlines = Airline::select('airline_code', 'airline_name')->get();

            $datas = [];

            foreach ($airlines as $key => $value) {
                
                $datas[] = [
                    "code" => $value->airline_code, 
                    "name" => "$value->airline_name"
                ];
            }

            return $datas;
        }
        
        $stations = Airline::get();

        return $stations;
    }

    
}
