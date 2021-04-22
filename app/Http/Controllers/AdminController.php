<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use GuzzleHttp\Client;

class AdminController extends Controller
{
	
	// public function dashboard()
	// {
		
	// 	//return view('holidays');
	// }

	public function authenticate()
	{
		

		$data=array(
				'ClientId'=>'ApiIntegrationNew',
				'UserName'=>'Avya',
				'Password'=>'Avya@1234',
				'EndUserIp'=>'52.14.66.253'
		);

		$auth_data=json_encode($data);

		
	    $curl = curl_init();
	    curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/SharedServices/SharedData.svc/rest/Authenticate");
	    curl_setopt($curl, CURLOPT_POST, 1);
	    curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	    curl_setopt($curl, CURLOPT_POSTFIELDS,''.$auth_data.'');
	    
			
	    $responce=curl_exec ($curl);
	    $responce_data = json_decode($responce);
	    curl_close ($curl);

	    return $responce_data;

	}

	public function logout()
	{

	}

	public function searchHotel()
	{

		$data=array(
		   "CheckInDate" =>  "23/07/2018",
			"NoOfNights" =>  "1",
			"CountryCode" =>  "NL",
			"CityId" =>  "14621",
			"ResultCount" =>  null,
			"PreferredCurrency" =>  "INR",
			"GuestNationality" => "IN",
			"NoOfRooms" =>  "1",
			"NoOfAdults" =>  1,
			"RoomGuests" =>  [[
				"NoOfAdults" =>  1,
				"NoOfChild" =>  0,
				"ChildAge" =>  null
			]],
			"PreferredHotel" =>  "",
			"MaxRating" =>  5,
			"MinRating" =>  0,
			"ReviewScore" =>  null,
			"IsNearBySearchAllowed" =>  false,
			"EndUserIp" => "123.1.1.1",
			"TokenId" => "76d3a295-c21b-4413-95ab-151f9f56db63"
 		);



 		//return $data;

		$auth_data=json_encode($data);
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Hotel/hotelservice.svc/rest/GetHotelResult/");
    	curl_setopt($curl, CURLOPT_POST, 1);
    	    curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    	curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
    	// curl_setopt( $curl, CURLOPT_HTTPHEADER, ['Accept:application/json, Content-Type:application/json']);
		
    	$responce=curl_exec ($curl);
	    $responce_data = json_decode($responce);
	    curl_close ($curl);

	    return $responce_data;
	}

	// hotel info

	public function Hotelinfo()
	{

		$data=array(
		   "ResultIndex" =>  "24",
			"HotelCode" =>  "482165",
			"EndUserIp" =>  "52.14.66.253",
			"TokenId" => "f7ee6e1e-d4f6-436f-916d-5604d56dfdf2",
			"TraceId" => "111dee3c-7d53-4dea-9c3a-1baba6949b47"
 		);



 		//return $data;

		$auth_data=json_encode($data);
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Hotel/hotelservice.svc/rest/GetHotelInfo/");
    	curl_setopt($curl, CURLOPT_POST, 1);
    	curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    	curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
    	// curl_setopt( $curl, CURLOPT_HTTPHEADER, ['Accept:application/json, Content-Type:application/json']);
		
    	$responce=curl_exec ($curl);
	    $responce_data = json_decode($responce);
	    curl_close ($curl);

	    return $responce_data;
	}
    
     // searhing airlines

	public function searchAir()
	{

		$data=array(
			"EndUserIp" =>  "52.14.66.253",
			"TokenId" =>  "76d3a295-c21b-4413-95ab-151f9f56db63",
			"AdultCount" =>  "1",
			"ChildCount" =>  "0",
			"InfantCount" =>  "0",
			"DirectFlight"=> "false",
			"OneStopFlight"=> "false",
			"JourneyType"=> "1",
			"PreferredAirlines"=> null,
			"Segments" =>  [[
				"Origin" =>  "DEL",
				"Destination" =>  "BOM",
				"FlightCabinClass" => "1",
				"PreferredDepartureTime" =>  "2018-11-06T00: 00: 00",
				"PreferredArrivalTime" =>  "2018-11-06T00: 00: 00"
			]],
			"Sources" => ["6E"]
 		);



 		//return $data;

		$auth_data=json_encode($data);
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/Search/");
    	curl_setopt($curl, CURLOPT_POST, 1);
    	    curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    	curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
    	// curl_setopt( $curl, CURLOPT_HTTPHEADER, ['Accept:application/json, Content-Type:application/json']);
		
    	$responce=curl_exec ($curl);
	    $responce_data = json_decode($responce);
	    curl_close ($curl);

	    return $responce_data;
	}

	// searching

	// calender result 
    
    public function GetCalendarFare()
	{

		$data=array(
			
			"JourneyType" => "1",
			"EndUserIp" => "52.14.66.253",
			"TokenId" => "76d3a295-c21b-4413-95ab-151f9f56db63",
			"PreferredAirlines" => null,
			"Segments" => [[
				"Origin" => "DEL",
				"Destination"=> "BOM",
				"FlightCabinClass" => "1",
				"PreferredDepartureTime" => "2018-10-02T00:00:00",
			]],
			"Sources" => null

 		);



 		//return $data;

		$auth_data=json_encode($data);
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/GetCalendarFare/");
    	curl_setopt($curl, CURLOPT_POST, 1);
    	    curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    	curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
    	// curl_setopt( $curl, CURLOPT_HTTPHEADER, ['Accept:application/json, Content-Type:application/json']);
		
    	$responce=curl_exec ($curl);
	    $responce_data = json_decode($responce);
	    curl_close ($curl);

	    return $responce_data;
	}

	// updated calender result 
    
    public function GetupdateCalendarFare()
	{

		$data=array(
			
			"JourneyType" => "1",
			"EndUserIp" => "52.14.66.253",
			"TokenId" => "76d3a295-c21b-4413-95ab-151f9f56db63",
			"PreferredAirlines" => null,
			"Segments" => [[
				"Origin" => "DEL",
				"Destination"=> "BOM",
				"FlightCabinClass" => "1",
				"PreferredDepartureTime" => "2018-10-02T00:00:00",
			]],
			"Sources" => null

 		);



 		//return $data;

		$auth_data=json_encode($data);
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/UpdateCalendarFareOfDay/");
    	curl_setopt($curl, CURLOPT_POST, 1);
    	    curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    	curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
    	// curl_setopt( $curl, CURLOPT_HTTPHEADER, ['Accept:application/json, Content-Type:application/json']);
		
    	$responce=curl_exec ($curl);
	    $responce_data = json_decode($responce);
	    curl_close ($curl);

	    return $responce_data;
	}


	// farerule air 
    
    public function farerule()
	{

		$data=array(
			"EndUserIp" =>  "52.14.66.253",
			"TokenId" =>  "76d3a295-c21b-4413-95ab-151f9f56db63",
			"TraceId" =>  "97ca57f1-7a23-4ba6-962d-5003ad0d034a",
			"ResultIndex" =>  "OB12"

 		);



 		//return $data;

		$auth_data=json_encode($data);
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/FareRule/");
    	curl_setopt($curl, CURLOPT_POST, 1);
    	    curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    	curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
    	// curl_setopt( $curl, CURLOPT_HTTPHEADER, ['Accept:application/json, Content-Type:application/json']);
		
    	$responce=curl_exec ($curl);
	    $responce_data = json_decode($responce);
	    curl_close ($curl);

	    return $responce_data;
	}

	// farerquete air 
    
    public function farequete()
	{

		$data=array(
			"EndUserIp" =>  "52.14.66.253",
			"TokenId" =>  "76d3a295-c21b-4413-95ab-151f9f56db63",
			"TraceId" =>  "97ca57f1-7a23-4ba6-962d-5003ad0d034a",
			"ResultIndex" =>  "OB12"

 		);



 		//return $data;

		$auth_data=json_encode($data);
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/FareQuote/");
    	curl_setopt($curl, CURLOPT_POST, 1);
    	    curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    	curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
    	// curl_setopt( $curl, CURLOPT_HTTPHEADER, ['Accept:application/json, Content-Type:application/json']);
		
    	$responce=curl_exec ($curl);
	    $responce_data = json_decode($responce);
	    curl_close ($curl);

	    return $responce_data;
	}

		// farerquete air 
    
    public function ssr()
	{

		$data=array(

			"EndUserIp" =>  "52.14.66.253",
			"TokenId" =>  "76d3a295-c21b-4413-95ab-151f9f56db63",
			"TraceId" =>  "97ca57f1-7a23-4ba6-962d-5003ad0d034a",
			"ResultIndex" =>  "OB12"

 		);


 		//return $data;

		$auth_data=json_encode($data);
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/SSR/");
    	curl_setopt($curl, CURLOPT_POST, 1);
    	    curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    	curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
    	// curl_setopt( $curl, CURLOPT_HTTPHEADER, ['Accept:application/json, Content-Type:application/json']);
		
    	$responce=curl_exec ($curl);
	    $responce_data = json_decode($responce);
	    curl_close ($curl);

	    return $responce_data;
	}




	public function bookingHotel()
	{

		$data = array(
		 "ResultIndex"  => "2",
		 "HotelCode"  => "ACR1|AMS",
		 "HotelName"  => "Tulip Inn Amsterdam Riverside",
		 "GuestNationality"  => "IN",
		 "NoOfRooms"  => "1",
		 "ClientReferenceNo"  => "0",
		 "IsVoucherBooking"  => "true",
		 "HotelRoomsDetails"  => array(
 
			 "RoomIndex"  => "1",
			 "RoomTypeCode"  => "SB|0|0|1",
			 "RoomTypeName"  => "Standard Single",
			 "RatePlanCode"  => "001:TUL5:18178:S17929:24963:98679|1",
			 "BedTypeCode"  => null,
			 "SmokingPreference"  => 0,
			 "Supplements"  => null,
			 "Price"  => array(

				 "CurrencyCode"  => "INR",
				 "RoomPrice"  => "4620.0",
				 "Tax"  => "0.0",
				 "ExtraGuestCharge"  => "0.0",
				 "ChildCharge"  => "0.0",
				 "OtherCharges"  => "0.0",
				 "Discount"  => "0.0",
				 "PublishedPrice"  => "4620.0",
				 "PublishedPriceRoundedOff"  => "4620",
				 "OfferedPrice"  => "4620.0",
				 "OfferedPriceRoundedOff"  => "4620",
				 "AgentCommission"  => "0.0",
				 "AgentMarkUp"  => "0.0",
				 "ServiceTax"  => "92.4",
				 "TDS"  => "0.0"
			 ),
 		 ),
 
		 "EndUserIp"  => "52.14.66.253",
		 "TokenId"  => "dbfa92dd-75cb-4948-8718-d5794f1d3211",
		 "TraceId"  => "2809b183-7aa9-4f76-8df3-38011515693d"
		);

		$auth_data=json_encode($data);
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Hotel/hotelservice.svc/rest/BlockRoom");
    	curl_setopt($curl, CURLOPT_POST, 1);
    	curl_setopt($curl, CURLOPT_POSTFIELDS,''.$auth_data.'');
    	curl_setopt( $curl, CURLOPT_HTTPHEADER, ['Accept:application/json, Content-Type:application/json']);
		
    	$responce=curl_exec($curl);
    	print_r($responce);
    	curl_close ($curl);	
    	//return redirect('authenticate');
	}
	
}
