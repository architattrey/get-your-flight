<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
Use Auth;
use Illuminate\Support\Facades\Hash;
use App\Model\FlightsBooking;
use Payment;
use Tzsk\Payu\Model\PayuPayment;
use Carbon\Carbon;
use DB;




class FlightBookingController extends Controller
{
    public function FlightBookingProcessing($IndexId,$TraceId,$adult,$child,$infant,Request $request)
    {
        // dd($request->all());   
        if($request->gst == 1)
        {
            $validatedData = $request->validate([
                'email'      => 'required|email',
                'phone'      => 'required|max:10',
                'address'    => 'required',
                'city'       => 'required',
                'gnumber'    => 'required',
                'gcname'     => 'required',
                'gemail'     => 'required|email',
                'gmobile'    => 'required|max:10',
            ]);

                $gst_data[] =
                [ 
                    'gst_number'=>$request->gnumber,
                    'gst_company_name'=>$request->gcname,
                    'gst_email'=>$request->gemail,
                    'gst_mobile' =>$request->gmobile,            
                ];        

        }else {
            $validatedData = $request->validate([
                'email'      => 'required|email',
                'phone'      => 'required|max:10',
                'address'    => 'required',
                'city'       => 'required',
            ]);
        }

        //============== ADULT DATA CONVER INTO JSON ================//
        $adult_data = [];
			$id=0;
			foreach ($request->aname as $a_key => $a_value) 
			{            
                $id++;
                $adult_data[] =
                [ 
                    'id'=> $id,
                    'title'=>$request->title[$a_key],
                    'type'=>1, 
                    'name'=>$request->aname[$a_key],
                    'last_name'=>$request->alname[$a_key], 
                    'dob' => Carbon::createFromFormat('d/m/Y', $request->adob[$a_key])->format('Y-m-d'),         
                ];        
            }
                
             //============== Check Age ================//
            $dateofbirth = Carbon::createFromFormat('d/m/Y', $request->adob[$a_key]);

            $now = Carbon::now();
            $adult_age =$dateofbirth->diffInYears(Carbon::now());

            if($adult_age <= 12){
                Session::flash('flash_message','Please Check Adult Age.');    
                return back();
            }

            //============== CHILD DATA CONVER INTO JSON ================//
			$childre_data = [];
			if($request->child !=0)
			{   
				$id=0;
				foreach($request->cname as $c_key => $c_value) {            
					$id++;
					$childre_data [] = 
					[
                        'id'=> $id,
                        'title'=>$request->title[$c_key],
                        'type'=>2,
                        'name'=>$request->cname[$c_key],
                        'last_name'=>$request->clname[$c_key],
                        'dob' => Carbon::createFromFormat('d/m/Y', $request->cdob[$c_key])->format('Y-m-d'),            
					];        
                }
                
                //============== Check Age ================//
                $dateofbirth = Carbon::createFromFormat('d/m/Y', $request->cdob[$c_key]);

                $now = Carbon::now();
                $child_age =$dateofbirth->diffInYears(Carbon::now());
                if($child_age > 12)
                {
                    Session::flash('flash_message','Please Check Child Age.');    
                    return back();
                }
            }

            //============== INFANT DATA CONVER INTO JSON ================//
            $infant_data = [];
			if($request->infant !=0)
			{   
				$id=0;
				foreach($request->iname as $i_key => $i_value) {            
					$id++;
					$infant_data [] = 
					[
                        'id'=> $id,
                        'title'=>$request->title[$i_key],
                        'type'=>3,
                        'name'=>$request->iname[$i_key],
                        'last_name'=>$request->ilname[$i_key],
                        // 'dob' =>$request->idob[$i_key],  
                        'dob' => Carbon::createFromFormat('d/m/Y', $request->idob[$i_key])->format('Y-m-d'),          
					];        
				}
            }

            $adultdata =array_merge($adult_data,$childre_data,$infant_data);
        
         //============== DATA SAVE INTO DATABASE ================//   
            if($request->gst == 1)
            {
                $flightsBookings =  FlightsBooking::create([
                    'index_id'            => $IndexId,
                    'trace_id'            => $TraceId,
                    'total_adults'        => $adult,
                    'total_childrens'     => $child,   
                    'adults_details'      => json_encode($adultdata),
                    'childrens_details'   => json_encode($childre_data),
                    'phone'               =>$request['phone'],
                    'email'               =>$request['email'],
                    'amount'              =>$request['amount'],
                    'address'             =>$request['address'],
                    'city'                =>$request['city'],
                    'iss_gst'             =>1,
                    'gst_details'         =>json_encode($gst_data),
                    'status'              =>0,
                ]);

            }else{
                $flightsBookings =  FlightsBooking::create([
                    'index_id'            => $IndexId,
                    'trace_id'            => $TraceId,
                    'total_adults'        => $adult,
                    'total_childrens'     => $child,   
                    'adults_details'      => json_encode($adultdata),
                    'childrens_details'   => json_encode($childre_data),
                    'phone'               => $request['phone'],
                    'email'               => $request['email'],
                    'amount'              => $request['amount'],
                    'address'             => $request['address'],
                    'city'                => $request['city'],
                    'iss_gst'             => 0,
                    'status'              => 0,
                ]);
            } 

        //============== PAYMENT METHOD ================//
        $attributes = [
            'txnid'       => strtoupper(str_random(8)), # Transaction ID.
            'amount'      => floatval($request['amount']), # Amount to be charged.
            'productinfo' => $IndexId,
            'firstname'   => $request->aname[0],
            'phone'       => $request['phone'],
            'email'       => $request['email']
        ];    

        $isslcc = $request->isslcc;
        $indexes = explode("-",$IndexId);
        if (count($indexes) > 1) {

            $isslcc = $request->isslcc . '-' . $request->isslcc_return;

        }
        
        return Payment::make($attributes, function ($then) use($flightsBookings, $isslcc) {   //to go payment gateway
            $then->redirectRoute('flight_payment', ['id' => $flightsBookings['id'], 'isllc' => $isslcc]);
        });

    }


    //============== ADULT DATA CONVER INTO JSON ================//
    public function FlightPayment($id,$islcc) 
    {
        $payment   = Payment::capture();
        // $dataa = null;
        $dataa = PayuPayment::create((array)$payment->getData());
        $responsed = collect($payment->getData());
        $flightsBooking   = FlightsBooking::where('id', $id)->first();
         //return $flightsBooking->adults_details;
        // return if payment is fails       
        if ($dataa->status === 'failure') {
            $flightsBooking->update(['payu_id' => $dataa->id]);
            return redirect()->route('booking_details',['id' => encrypt($flightsBooking->id)]);
        }

        if($flightsBooking) {
            $order = $flightsBooking->orders()->where('orderable_id',$id)->where('orderable_type','App\FlightsBooking')->first();
            if (!$order) {

                $indexs = explode("-", $flightsBooking->index_id);
                $islccs = explode("-", $islcc);
     
                $booking = $this->booking($flightsBooking->trace_id, $indexs[0], $flightsBooking, $islccs[0]);               
                // return $booking;
                if($booking['success']) {
                    if (count($indexs) == 1) {
                       $flightsBooking->orders()->create(['payu_id' => $dataa->id, 'txnid' => $dataa->txnid]);
                    }
                    
                    $respomse = $booking['data']['Response']['Response'];
                    $flight_update_data = [
                        'response'        => json_encode(['data'=> $booking['data']]),
                        'pnr_number'      => $respomse['PNR'], 
                        'booking_id'      => $respomse['BookingId'],
                        'transaction_id'  => $dataa->txnid,
                        'payu_id'         => $dataa->id
                    ];
                    $flightsBooking->update($flight_update_data);
                }else {
                    $flightsBooking->update(['response' => json_encode(['data'=> $booking['data']])]);
                }

                if (count($indexs) > 1) {
                    $return_booking = $this->booking($flightsBooking->trace_id, $indexs[1], $flightsBooking, $islccs[1]);
                    //return $return_booking;
                    if($return_booking['success']) {
                      
                        $flightsBooking->orders()->create(['payu_id' => $dataa->id, 'txnid' => $dataa->txnid]);
                        
                        $return_respomse = $return_booking['data']['Response']['Response'];
                        $return_flight_update_data = [
                            'return_response'        => json_encode(['data'=> $return_booking['data']]),
                            'return_pnr_number'      => $return_respomse['PNR'], 
                            'return_booking_id'      => $return_respomse['BookingId'],
                        ];
                        $flightsBooking->update($return_flight_update_data);
                    }else {
                        $flightsBooking->update(['return_response' => json_encode(['data'=> $return_booking['data']])]);
                    }
                }    
                $SendBookingMail = $this->SendBookingMail($flightsBooking); //Here is Sending mail
                return redirect()->route('booking_details',['id' => encrypt($flightsBooking->id)]);
            }else {
                return redirect()->route('/');
            }
        }else {
            return redirect()->route('/');
        }
              //return $responsed;
    }

    private function farequete($index, $traceId)
	{
		$data=array(
			"EndUserIp" =>  "35.154.103.142",
			"TokenId" =>  "a07297ed-6bb7-4ab1-9c3e-d7412bc49db9",
			"TraceId" =>  $traceId,
			"ResultIndex" =>  $index
         );
         
		$auth_data=json_encode($data);
    	$curl = curl_init();
		// curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/SSR/");
		curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/FareQuote/");
		// curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/FareRule/");
    	curl_setopt($curl, CURLOPT_POST, 1);
    	curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    	$responce=curl_exec ($curl);
	    $responce_data = json_decode($responce, true);
		curl_close ($curl);
		
		if ($responce_data['Response']['Error']['ErrorCode'] == 0) {
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
	    return ['data' => $responce_data];
    }

    
    private function booking($traceid, $indexid,$flightsBooking,$islcc)
	{
		$data = [
			"EndUserIp"   =>  "35.154.103.142",
			"TokenId"     =>  "a07297ed-6bb7-4ab1-9c3e-d7412bc49db9",
			"TraceId"     =>  $traceid,
			"ResultIndex" =>  $indexid,
			"Passengers"  =>  $this->passenger_details($flightsBooking)
        ];
        // return ['data' => $data, 'success' => true];
    	//	return $data;

		$auth_data=json_encode($data);
        $curl = curl_init();
        if($islcc ==1){
            curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/Ticket/");
        }else{
            curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/Book/");
        }
    	
    	curl_setopt($curl, CURLOPT_POST, 1);
	    curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    	curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    	// curl_setopt( $curl, CURLOPT_HTTPHEADER, ['Accept:application/json, Content-Type:application/json']);
		
		$responce = curl_exec ($curl);
		curl_close ($curl);
        $responce_data = json_decode($responce, true);
        
        if ($responce_data['Response']['Error']['ErrorCode'] == 0) {
            $resultdata = collect($responce_data);
            
            if($islcc != 1){

                return $this->ticket($indexid,$resultdata->Response->Response->TraceId,$resultdata->Response->Response->PNR);

            }else {

                return ['data' => $responce_data, 'success' => true];
            }
            // return collect($resultdata);
        }else {
            $responce_data = $responce_data;
            return ['data' => $responce_data, 'success' => false];
        }
        
    }

    //============== HERE IS Call Booking API ================//
    private function ticket($index,$traceId,$pnr)
	{
		$data = [
			"EndUserIp" =>  "35.154.103.142",
			"TokenId" =>  "a07297ed-6bb7-4ab1-9c3e-d7412bc49db9",
			"TraceId" =>  $traceId,
			"PNR" =>  $pnr,
			"BookingId" => $index
		];

		$auth_data=json_encode($data);
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/Ticket/");
    	curl_setopt($curl, CURLOPT_POST, 1);
	    curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    	curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    	// curl_setopt( $curl, CURLOPT_HTTPHEADER, ['Accept:application/json, Content-Type:application/json']);
		
		$responce = curl_exec ($curl);
		curl_close ($curl);
		$responce_data = json_decode($responce, true);

		if ($responce_data['Response']['Error']['ErrorCode'] == 0) {
            $resultdata = $responce_data;
            return ['data' => $responce_data, 'success' => true];
            // return collect($resultdata);
        }else {
            $responce_data = $responce_data;
            return ['data' => $responce_data, 'success' => false];
        }
    }


    //============== HERE IS ALL PASSENGER DETAILS BIND INTO LOOP ================//
    private function passenger_details($flightsBooking)
    {
        $passenger = [];
        $passengers_data =json_decode($flightsBooking->adults_details);

        foreach($passengers_data as $key => $passenger_data){

            $dob =  $passenger_data->dob."T00:00:00";
            if ($passenger_data->title == 1 and $passenger_data->type == 1) {
                $type_title = "Mr";
                $gender = 1;
                $pax_type = 1;
            } elseif ($passenger_data->title == 1 and $passenger_data->type == 2) {
                $type_title = "Master";
                $gender = 1;
                $pax_type = 2;
            } elseif($passenger_data->title == 2 and $passenger_data->type == 1){
                $type_title = "Ms";
                $gender = 2;
                $pax_type = 1;
            }elseif ($passenger_data->title == 2 and $passenger_data->type == 2) {
                $type_title = "Miss";
                $gender = 2;
                $pax_type = 1;
            } elseif($passenger_data->title == 3 and $passenger_data->type == 1){
                $type_title = "Mrs";
                $gender = 2;
                $pax_type = 1;
            }elseif ($passenger_data->title == 1 and $passenger_data->type == 3) {
                $type_title = "Master";
                $gender = 1;
                $pax_type = 3;
            }else{
                $type_title = "Miss";
                $gender = 2;
                $pax_type = 3;
            }
            
            $data = [
                "Title" =>  $type_title,
                "FirstName" => $passenger_data->name,
                "LastName" =>  $passenger_data->last_name,
                "PaxType" =>  $pax_type,
                "DateOfBirth" =>  $dob,
                "Gender" => $gender,
                "PassportNo" =>  "",
                "PassportExpiry" =>  "",
                "AddressLine1" => $flightsBooking->address,
                "AddressLine2" => "",
                "City" => $flightsBooking->city,
                "CountryCode" => "IN",
                "CountryName" => "India",
                "ContactNo" => $flightsBooking->phone,
                "Email" =>  $flightsBooking->email,
                "IsLeadPax" =>  $key == 0 ? true : false,
                "FFAirline" => "",
                "FFNumber" => "",
                "Fare" => [
                    "BaseFare" => 1,
                    "Tax" =>  1,
                    "TransactionFee" =>  1,
                    "YQTax" =>  1,
                    "AdditionalTxnFeeOfrd" =>  0,
                    "AdditionalTxnFeePub" =>  1,
                    "AirTransFee" =>  1
                ],
                "Seat" =>  [
                        "Code" => "A",
                        "Description" =>  "Aisle"
                ]
            ];
            array_push($passenger,$data);
        }
        return $passenger;
    }

     //-----------------This is For Redirect After Payment------------------//  
    public function booking_details($id)
    {
        $newid = decrypt($id);
        $flight_booking_detail = FlightsBooking::where('id',$newid)->with('payment')->first();
       
        if($flight_booking_detail->return_pnr_number and !$flight_booking_detail->get_booking_details_return){
            $flight_booking_data  = $this->GetFlightBookingDetails($flight_booking_detail->trace_id,$flight_booking_detail->booking_id,$flight_booking_detail->pnr_number);
            $flight_booking_data_return = $this->GetFlightBookingDetails($flight_booking_detail->trace_id,$flight_booking_detail->return_booking_id,$flight_booking_detail->return_pnr_number);
            $flight_booking_detail->update(['get_booking_details_return'=> json_encode(['data'=> $flight_booking_data_return]), 'get_booking_details'=>json_encode(['data'=> $flight_booking_data])]);
        }else {
            if (!$flight_booking_detail->get_booking_details) {
                $flight_booking_data  = $this->GetFlightBookingDetails($flight_booking_detail->trace_id,$flight_booking_detail->booking_id,$flight_booking_detail->pnr_number);
                $flight_booking_detail->update(['get_booking_details'=>json_encode(['data'=> $flight_booking_data])]);
            }
        }

        if($flight_booking_detail){
            return view('air.booking.booking_form_response', compact('flight_booking_detail'));
        }else{
            return redirect()->route('/');
        }
    }

    //-----------------This is For Check last update Recode into DB------------------//  
    public function GetlatestData()
    {
        $last_row = FlightsBooking::latest()->first();
        return $last_row;
    }

    //-----------------This is For Get Flight Details------------------//  
    private function GetFlightBookingDetails( $traceId = null, $booking_id = null, $pnr = null)
    {
        $data=array(
			"EndUserIp"  =>  "52.14.66.253",
			"TokenId"    =>  "a07297ed-6bb7-4ab1-9c3e-d7412bc49db9",
			"TraceId"    =>  $traceId,
            "BookingId"  =>  $booking_id,
            "PNR"        =>  $pnr,
		);
		 
		$auth_data=json_encode($data);
    	$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/GetBookingDetails/");
    	curl_setopt($curl, CURLOPT_POST, 1);
    	curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($curl, CURLOPT_POSTFIELDS,$auth_data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    	$responce=curl_exec ($curl);
	    $responce_data = json_decode($responce, true);
		curl_close ($curl);

        return $responce_data;
    }


    //-----------------This is For Sending Mail------------------//  
    private function SendBookingMail($flightsBooking)
    {
        $msg = "Dear $flightsBooking->email,Thank you for choosing to Flight of $flightsBooking->pnr_number. This is Your PNR Number Please Save it For Futher infomation:
            booking Id:   $flightsBooking->booking_id 'Transaction Id'  / $flightsBooking->transaction_id 'Kids'
            For any query we will contact at your given number $flightsBooking->phone You have confirm your package with all policies.We will contact with you soon.";
            $msg = wordwrap($msg,400);
            mail($flightsBooking->email,"PACKAGE BOOKING CONFIRMATION AT GET YOUR FLIGHT",$msg);

    }





}
