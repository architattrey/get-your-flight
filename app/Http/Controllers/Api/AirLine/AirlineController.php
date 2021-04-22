<?php

namespace App\Http\Controllers\Api\AirLine;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AirlineController extends Controller
{ 
	/* 
	  Created by Aresedge pvt. ltd.
	  Seraching airlines

	*/
	public function searchAir(Request $r)
	{

		// $DepartureTime = Carbon::parse($r->DepartureTime);
		// $Departure = $DepartureTime->format('Y-m-d')."T00:00:00";

		$DepartureTime = Carbon::createFromFormat('d/m/Y', $r->DepartureTime);
		$Departure = $DepartureTime->format('Y-m-d')."T00:00:00";
		
		$journy_data = [];
		if ($r->segment) {
			$journeytype = 3;
			$journy_data = $r->multi_city_data;
			
		} else {
			if ($r->ArrivalTime) {
				$ArrivalTime = Carbon::createFromFormat('d/m/Y', $r->ArrivalTime);
				$Arrival = $ArrivalTime->format('Y-m-d')."T00:00:00";
				$journeytype = 2;
				$journy_data = [ 
					[
						"Origin" =>  explode("-",$r->origin)[1],
						"Destination" =>  explode("-",$r->destination)[1],
						"FlightCabinClass" => "1",
						"PreferredDepartureTime" =>  $Departure,
						"PreferredArrivalTime" =>    $Departure
					],[
						"Origin" => explode("-",$r->destination)[1],
						"Destination" =>  explode("-",$r->origin)[1],
						"FlightCabinClass" => "1",
						"PreferredDepartureTime" =>  $Arrival,
						"PreferredArrivalTime" =>   $Arrival
					]
				];
			} else {
				$journeytype = 1;
				$journy_data = [ 
					[
						"Origin" =>  explode("-",$r->origin)[1],
						"Destination" =>  explode("-",$r->destination)[1],
						"FlightCabinClass" => "1",
						"PreferredDepartureTime" =>  $Departure,
						"PreferredArrivalTime" =>    $Departure
					]
				];
			}
		}

		$data=array(
			"EndUserIp"          =>  "52.14.66.253",
			"TokenId"            =>  "a07297ed-6bb7-4ab1-9c3e-d7412bc49db9",
			"AdultCount"         =>  $r->adult,
			"ChildCount"         =>  $r->child ? $r->child : "0",
			"InfantCount"        =>  $r->infant,
			"DirectFlight"       =>  $r->direct == 1 ? true : false,
			"OneStopFlight"      =>  $r->onestop == 1 ? true : false,
			"JourneyType"        =>  $journeytype,
			"PreferredAirlines"  =>  $r->preferredairlines,
			"Segments"           =>  $journy_data,
			"DirectFlight"       => $r->direct,
			"FlightCabinClass"   => $r->class_type,
			"Sources"            => null
		 );
		 
 		//return $data;

		$auth_data=json_encode($data);
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/Search/");
    	curl_setopt($curl, CURLOPT_POST, 1);
	    curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    	curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    	// curl_setopt( $curl, CURLOPT_HTTPHEADER, ['Accept:application/json, Content-Type:application/json']);
		
    	$responce = curl_exec ($curl);
		$responce_data = json_decode($responce, true);
		if ($responce_data['Response']['Error']['ErrorCode'] == 0) {

			$results0 = $responce_data['Response']['Results'][0];
			$results0  = $this->removing_fare($results0);
			$results1 = [];
			if ($r->ArrivalTime) {
				$results1 = $responce_data['Response']['Results'][1];
				$results1 = $this->removing_fare($results1);
			}
			$resultdata = $responce_data['Response'];
			unset($resultdata['Results']);
			$flightdata = [
                $results0, $results1
			];
			$resultdata['Results'] = $flightdata;
			$responce_data = $resultdata;
			// return collect($resultdata);
		}

		return ['data' => $responce_data];
	    session(['AirTraceId' => $responce_data['TraceId']]);
		curl_close ($curl);
		
        return ['data' => $responce_data];
	    return $responce_data;
	}

	// maping dats 

	private function removing_fare($results)
	{
		$results = collect($results)->map(function ($item, $key) {
			// $item['price'] = ceil($item['Fare']['PublishedFare'] * .02 + $item['Fare']['PublishedFare']);
			$item['price'] = ceil($item['Fare']['PublishedFare'] * 0 + $item['Fare']['PublishedFare']);
			$item['meal'] = $item['Fare']['TotalMealCharges'] == 0 ? 'Free Meal' : $item['Fare']['TotalMealCharges'] ." Meal charge";
			// unset($item['Fare']);
			// unset($item['FareBreakdown']);
			return $item;
		});

		return $results;
	}

	// searching

	// calender result 
    
    public function GetCalendarFare()
	{

		$data=array(
			
			"JourneyType" => "1",
			"EndUserIp" => "52.14.66.253",
			"TokenId" => "a07297ed-6bb7-4ab1-9c3e-d7412bc49db9",
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
			"TokenId" => "a07297ed-6bb7-4ab1-9c3e-d7412bc49db9",
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
			"TokenId" =>  "a07297ed-6bb7-4ab1-9c3e-d7412bc49db9",
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
	    $responce_data = json_decode($responce, true);
		curl_close ($curl);
	    return $responce_data;
	}

	// farerquete air 
    
    public function farequete($index, $traceId, Request $r)
	{	
		$indexes = explode("-",$index);
		$responce_data = [];
		foreach ($indexes  as $key => $index) {
			$responce_data [] = $this->apicall($index, $traceId, 0);
		}
		
		return ['data' => $responce_data];
	}


	// farerquete air 
    
    public function ssr($index, $traceId, Request $r)
	{
		$indexes = explode("-",$index);
		$responce_data = [];
		foreach ($indexes  as $key => $index) {
			$responce_data [] = $this->apicall($index, $traceId, 1);
		}
		
		return ['data' => $responce_data];
	}

	// request for fare apicall
	private function apicall($index, $traceId, $isSsr)
	{
		$data=array(
			"EndUserIp" =>  "52.14.66.253",
			"TokenId" =>  "a07297ed-6bb7-4ab1-9c3e-d7412bc49db9",
			"TraceId" =>  $traceId,
			"ResultIndex" =>  $index
		);

		// return $data;
		 
		$auth_data=json_encode($data);
		$curl = curl_init();
		if ($isSsr) {
			curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/SSR/");
		} else {
			curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/FareQuote/");
		}
    	curl_setopt($curl, CURLOPT_POST, 1);
    	curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    	$responce=curl_exec ($curl);
	    $responce_data = json_decode($responce, true);
		curl_close ($curl);
		// return $responce_data;
		
		if ($responce_data['Response']['Error']['ErrorCode'] == 0 and !$isSsr) {
			$results = [$responce_data['Response']['Results']];
			$results  = $this->removing_fare($results);
			$resultdata = $responce_data['Response'];
			unset($resultdata['Results']);
			$resultdata['Results'] = $results[0];
			$responce_data = $resultdata;
			// return collect($resultdata);
		}else {
			$responce_data = $responce_data['Response'];
		}

		return $responce_data;

	}

}
