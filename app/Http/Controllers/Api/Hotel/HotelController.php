<?php

namespace App\Http\Controllers\Api\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Data\HotelCityCode;
use Carbon\Carbon;

class HotelController extends Controller
{
    public function searchHotel(Request $r)
	{
        
        $city = HotelCityCode::where('Destination', $r->city)->first();
        if ($city) {

			$cityid = $city->cityid;
			$countrycode = $city->countrycode ? $city->countrycode : "NL";
			
        }else{
        	return "none";
		}

        $data = [
           'CheckInDate' => $r->check_in_date,
           'NoOfNights'  => $r->no_of_night,
           'CityId'      => $cityid,
           'NoOfRooms'   => $r->no_of_rooms,
		   'NoOfAdults'  => $r->no_of_adults,
		   'NoOfChild'   => $r->no_of_child
		];
		
        session(['search_data_hotel' => json_encode($data)]);
        // dd(session('TokenId'));
		$data=array(
		   "CheckInDate" => $r->check_in_date,
			"NoOfNights" =>  $r->no_of_night,
			"CountryCode" =>  $countrycode,
			"CityId" =>  $cityid,
			"ResultCount" =>  null,
			"PreferredCurrency" =>  "INR",
			"GuestNationality" => "IN",
			"NoOfRooms" =>  $r->no_of_rooms,
			"NoOfAdults" => $r->no_of_adults,
			"RoomGuests" =>  [[
				"NoOfAdults" =>  (int)$r->no_of_adults,
				"NoOfChild" =>  (int)$r->no_of_child,
				"ChildAge" =>   $r->no_of_child ? [2] : null
			]],
			"PreferredHotel" =>  "",
			"MaxRating" =>  5,
			"MinRating" =>  0,
			"ReviewScore" =>  null,
			"IsNearBySearchAllowed" =>  false,
			"EndUserIp" => "52.14.66.253",
			"TokenId" => "a07297ed-6bb7-4ab1-9c3e-d7412bc49db9"
 		);
 		//return $data;
		$auth_data=json_encode($data);
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Hotel/hotelservice.svc/rest/GetHotelResult/");
    	curl_setopt($curl, CURLOPT_POST, 1);
    	curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    	curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
    	// curl_setopt( $curl, CURLOPT_HTTPHEADER, ['Accept:application/json, Content-Type:application/json']);
		
    	$responce=curl_exec ($curl);
	    $responce_data = json_decode($responce, true);
        curl_close ($curl);
	    session(['TraceId' => $responce_data['HotelSearchResult']['TraceId']]);
	   
        return ['data' => $responce_data];
	    return collect($responce);
	}

	// hotel info

	public function Hotelinfo($index, $HotelCode, $traceid)
	{
      
		$data=array(
		    "ResultIndex" =>  $index,
			"HotelCode" =>  $HotelCode,
			"EndUserIp" =>  "52.14.66.253",
			"TokenId" => "a07297ed-6bb7-4ab1-9c3e-d7412bc49db9",
			"TraceId" => $traceid
 		);

 		//return $data;

		$auth_data=json_encode($data);
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Hotel/hotelservice.svc/rest/GetHotelInfo/");
    	curl_setopt($curl, CURLOPT_POST, 1);
    	curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    	curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
    	// curl_setopt( $curl, CURLOPT_HTTPHEADER, ['Accept:application/json, Content-Type:application/json']);
		
    	$responce=curl_exec ($curl);
		$responce_data = json_decode($responce, true);
		// return ['data' => $responce_data];
		curl_close ($curl);
		if ($responce_data['HotelInfoResult']['Error']['ErrorCode'] == 0) {
			session(['hotel_name' => $responce_data['HotelInfoResult']['HotelDetails']['HotelName']]);
		}
        return ['data' => $responce_data];
	    return $responce_data;
	}

	public function HotelRoominfo($index, $HotelCode, $traceid)
	{
		$data=array(
		    "ResultIndex" =>  $index,
			"HotelCode" =>  $HotelCode,
			"EndUserIp" =>  "52.14.66.253",
			"TokenId" => "a07297ed-6bb7-4ab1-9c3e-d7412bc49db9",
			"TraceId" => $traceid
 		);
 		//return $data;
		$auth_data=json_encode($data);
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Hotel/hotelservice.svc/rest/GetHotelRoom/");
    	curl_setopt($curl, CURLOPT_POST, 1);
    	curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    	curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
		
    	$responce=curl_exec ($curl);
	    $responce_data = json_decode($responce, true);
		curl_close ($curl);

		if ($responce_data['GetHotelRoomResult']['Error']['ErrorCode'] == 0) {
			// dd('yes');
			session(['room_details' => $responce_data['GetHotelRoomResult']['HotelRoomsDetails']]);
		}
		
        return ['data' => $responce_data];
	    return $responce_data;
	}

	public function block_room($hotelindex, $hotelroomindex, $HotelCode, $traceid)
	{
		$hotelroom = session('room_details')[$hotelroomindex - 1];
		$data = [
			"EndUserIp"   =>  "52.14.66.253",
			"TokenId"     => "a07297ed-6bb7-4ab1-9c3e-d7412bc49db9",
			"TraceId"     => $traceid,
			"ResultIndex" => $hotelindex,
			"HotelCode"   => $HotelCode,
			"HotelName"   => session('hotel_name'),
			"GuestNationality" => "IN",
			"NoOfRooms" => "1",
			"ClientReferenceNo" => "0",
			"IsVoucherBooking" => "true",
			"HotelRoomsDetails" => [[
				"RoomIndex" => $hotelroomindex,
				"RoomTypeCode" => $hotelroom['RoomTypeCode'],
				"RoomTypeName" => $hotelroom['RoomTypeName'],
				"RatePlanCode" => $hotelroom['RatePlanCode'],
				"BedTypeCode" => null,
				"SmokingPreference" => 0,
				"Supplements" => null,
				"Price" => [
					"CurrencyCode"             => (string)$hotelroom['Price']['CurrencyCode'],
					"RoomPrice"                => (string)round($hotelroom['Price']['RoomPrice'], 2),
					"Tax"                      => (string)round($hotelroom['Price']['Tax'], 2),
					"ExtraGuestCharge"         => (string)$hotelroom['Price']['ExtraGuestCharge'],
					"ChildCharge"              => (string)$hotelroom['Price']['ChildCharge'],
					"OtherCharges"             => (string)$hotelroom['Price']['OtherCharges'],
					"Discount"                 => (string)$hotelroom['Price']['Discount'],
					"PublishedPrice"           => (string)round($hotelroom['Price']['PublishedPrice'], 2),
					"PublishedPriceRoundedOff" => (string)$hotelroom['Price']['PublishedPriceRoundedOff'],
					"OfferedPrice"             => (string)round($hotelroom['Price']['OfferedPrice'], 2),
					"OfferedPriceRoundedOff"   => (string)$hotelroom['Price']['OfferedPriceRoundedOff'],
					"AgentCommission"          => (string)$hotelroom['Price']['AgentCommission'],
					"AgentMarkUp"              => (string)$hotelroom['Price']['AgentMarkUp'],
					"ServiceTax"               => (string)$hotelroom['Price']['ServiceTax'],
					"TDS"                      => (string)round($hotelroom['Price']['TDS'], 2)
				]
			]],
		];

		$auth_data=json_encode($data);
		
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Hotel/hotelservice.svc/rest/BlockRoom/");
    	curl_setopt($curl, CURLOPT_POST, 1);
    	curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    	curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
		
    	$responce=curl_exec ($curl);
	    $responce_data = json_decode($responce, true);
		curl_close ($curl);
		if ($responce_data['BlockRoomResult']['Error']['ErrorCode'] == 0) {
            session(['room_booking_details' => $responce_data]);
			$results = $responce_data['BlockRoomResult']['HotelRoomsDetails'];
			$results  = $this->removing_fare($results);
			$resultdata = $responce_data['BlockRoomResult'];
			$resultdata['HotelRoomsDetails'] = $results;
			$responce_data = $resultdata;
			return ['data' => $responce_data];
		}else{
			return ['data' => $responce_data['BlockRoomResult']];
		}
        
	    return $responce_data;
	}

	private function removing_fare($results)
	{
		$results = collect($results)->map(function ($item, $key) {
			// $item['price'] = ceil($item['Price']['PublishedPriceRoundedOff'] * .02 + $item['Price']['PublishedPriceRoundedOff']);
			$item['price'] = ceil($item['Price']['PublishedPriceRoundedOff'] * 0 + $item['Price']['PublishedPriceRoundedOff']);
			
			// unset($item['Price']);
			// unset($item['DayRates']);
			return $item;
		});

		return $results;
	}
    
}
