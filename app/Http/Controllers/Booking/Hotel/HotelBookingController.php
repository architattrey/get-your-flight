<?php

namespace App\Http\Controllers\Booking\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Booking\HotelBooking;
use Payment;
use Tzsk\Payu\Model\PayuPayment;
use Carbon\Carbon;
use Auth;
use Session;



class HotelBookingController extends Controller
{
    public function HotelBookingProcessing($hotelindex, $hotelroomindex, $code,$adult,$child,$TraceId, Request $request)
    {
        // dd($request->all());
        //dd($request->hotel_info);

        if(!Auth::check()) 
        {
            $user_idst= 0;
        }else{
            $id = Auth::user()->id;
            $user_idst= $id;  
        }

        
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

        //============== ADULT DATA CONVERT INTO JSON ================//
        $adult_data = [];
			$id=0;
			foreach ($request->aname as $a_key => $a_value) 
			{            
                $id++;
                $dobtemp = Carbon::createFromFormat('d/m/Y', $request->adob[$a_key]);
                    
                $now = Carbon::now();
                $adult_age = $dobtemp->diffInYears(Carbon::now());

                $adult_data[] =
                [ 
                    'id'=> $id,
                    'title'=>$request->title[$a_key],
                    'type'=>1, 
                    'name'=>$request->aname[$a_key],
                    'last_name'=>$request->alname[$a_key], 
                    'age' => $adult_age,         
                ];        
            }
                
            
             //============== Check Age ================//

            $dateofbirth = Carbon::createFromFormat('d/m/Y', $request->adob[$a_key]);
            $now = Carbon::now();
            $adult_age = $dateofbirth->diffInYears(Carbon::now());

            if($adult_age <= 12){
                Session::flash('flash_message',' Adult Age must be more than 12 years');    
                return back();
            }

            //============== CHILD DATA CONVER INTO JSON ================//

			$childre_data = [];
			if($request->child !=0)
			{   
				$id=0;
				foreach($request->cname as $c_key => $c_value) {            
                    $id++;
                    $dobtemp = Carbon::createFromFormat('d/m/Y', $request->cdob[$c_key]);
                    $now = Carbon::now();
                    $child_age = $dobtemp->diffInYears(Carbon::now());

					$childre_data [] = 
					[
                        'id'=> $id,
                        'title'=>$request->title[$c_key],
                        'type'=>2,
                        'name'=>$request->cname[$c_key],
                        'last_name'=>$request->clname[$c_key],
                        'age' => $child_age,            
					];        
                }
               
                
                //============== Check Age ================//

                $dateofbirth = Carbon::createFromFormat('d/m/Y', $request->cdob[$c_key]);
                $now = Carbon::now();
                $child_age =$dateofbirth->diffInYears(Carbon::now());
                if($child_age > 12)
                {
                    Session::flash('flash_message','Child Age must be less than 12 years.');    
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
                    
                    $dobtemp=Carbon::createFromFormat('d/m/Y', $request->idob[$i_key]);
                    $now = Carbon::now();
                    $infant_age =$dobtemp->diffInYears(Carbon::now());

					$infant_data [] = 
					[
                        'id'=> $id,
                        'title'=>$request->title[$i_key],
                        'type'=>3,
                        'name'=>$request->iname[$i_key],
                        'last_name'=>$request->ilname[$i_key],
                        // 'dob' =>$request->idob[$i_key],  
                        'age' =>$infant_age,          
					];        
				}
            }

            $adultdata = array_merge($adult_data,$childre_data,$infant_data);
        
         //============== DATA SAVE INTO DATABASE ================//   
         if($request->gst == 1)
         {
                $HotelBookings =  HotelBooking::create([
                    'hotel_index'         =>$hotelindex,
                    'hotel_room_index'    =>$hotelroomindex,
                    'hotel_info'          =>$request->hotel_info,
                    'code'                =>$code,
                    'trace_Id'            =>$TraceId,
                    'user_id'             =>$user_idst,  
                    'total_adults'        =>$adult,
                    'total_childrens'     =>$child,   
                    'adults_details'      =>json_encode($adultdata),
                    'childrens_details'   =>json_encode($childre_data),
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
                $HotelBookings =  HotelBooking::create([
                    'hotel_index'         =>$hotelindex,
                    'hotel_room_index'    =>$hotelroomindex,
                    'hotel_info'          =>$request->hotel_info,
                    'code'                =>$code,
                    'trace_Id'            =>$TraceId,
                    'user_id'             =>$user_idst,  
                    'total_adults'        =>$adult,
                    'total_childrens'     =>$child,   
                    'adults_details'      =>json_encode($adultdata),
                    'childrens_details'   =>json_encode($childre_data),
                    'phone'               =>$request['phone'],
                    'email'               =>$request['email'],
                    'amount'              =>$request['amount'],
                    'address'             =>$request['address'],
                    'city'                =>$request['city'],
                    'iss_gst'             =>0,
                    'status'              =>0,
                ]);
             
         } 
         

        //============== PAYMENT METHOD ================//
        $attributes = [
            'txnid'     => strtoupper(str_random(8)), # Transaction ID.
            'amount'    => floatval($request['amount']), # Amount to be charged.
            'productinfo'=> $request->hotel_info,
            'firstname' => $request->aname[0],
            'phone'     => $request['phone'],
            'email'     => $request['email']
        ];    

        return Payment::make($attributes, function ($then) use($HotelBookings) {   //to go payment gateway
            $then->redirectRoute('hotel_payment', ['id' => $HotelBookings['id']]);
        });

    }

    public function HotelPayment($id)
    {
        $payment   = Payment::capture();
        // $dataa = null;
       $dataa = PayuPayment::create((array)$payment->getData());
        //return $dataa; 
       $responsed = collect($payment->getData());
        // return $responsed;
        $HotelBookings   = HotelBooking::where('id', $id)->first();
        
        if($HotelBookings) {
            $order = $HotelBookings->orders()->where('orderable_id',$id)->where('orderable_type','App\HotelBookings')->first();

            if (!$order) {
                $booking = $this->booking($HotelBookings);
                // return $booking;
                if($booking['success']) {
                   // return $booking;
                    $HotelBookings->orders()->create(['payu_id' => $dataa->id, 'txnid' => $dataa->txnid]);
                    $respomse = $booking['data']['Response']['Response'];
                    $hotel_update_data = [
                        'response' => json_encode(['data'=> $booking['data']]),
                        'transaction_id' => $dataa->txnid,
                        'payu_id'        => $dataa->id
                    ];

                    $HotelBookings->update($hotel_update_data);
                }else {
                    $hotel_update_data = [
                        'response' => json_encode(['data'=> $booking['data']]),
                        'payu_id'        => $dataa->id
                    ];
                    $HotelBookings->update($hotel_update_data);
                }
                $this->SendBookingMail($HotelBookings); //Here is Sending mail
                return redirect()->route('hotel_booking_details',['id' => encrypt($HotelBookings->id)]);
                // return collect($flightsBooking);
            }else {
                return redirect()->route('/');
            }
        }else {
            return redirect()->route('/');
        }
    }

    //-----------This is For Booking Hotel Room-------------//

    private function booking($HotelBookings)
	{
        // dd(session('room_booking_details'));
        // dd( $hotelroom);

		$data = $this->BookingDetails($HotelBookings); 

        $auth_data = json_encode($data);
     
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL,"http://api.tektravels.com/BookingEngineService_Hotel/hotelservice.svc/rest/Book/");
    	
    	curl_setopt($curl,  CURLOPT_POST, 1);
	    curl_setopt($curl,  CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    	curl_setopt($curl,  CURLOPT_POSTFIELDS,$auth_data);
    	curl_setopt($curl,  CURLOPT_RETURNTRANSFER, true);
    	// curl_setopt( $curl, CURLOPT_HTTPHEADER, ['Accept:application/json, Content-Type:application/json']);
		
		$responce = curl_exec ($curl);
        curl_close ($curl);
        

        $responce_data = json_decode($responce, true);
    
        if ($responce_data['BookResult']['Error']['ErrorCode'] == 0) {
            $resultdata = collect($responce_data);
           
            return ['data' => $responce_data, 'success' => true];
          
            // return collect($resultdata);
        }else {
            return ['data' => $responce_data, 'success' => false];
        }
        
    }

   private function BookingDetails($HotelBookings)
   {    
        dd($this->passenger_details($HotelBookings));
        $hotel = session('room_booking_details')['BlockRoomResult'];
        $hotelroom = $hotel['HotelRoomsDetails'][0];
        // dd($hotelroom);
        $data = [
            "EndUserIp"   =>  "35.154.103.142",
            "TokenId"     =>  "79db67e4-43c4-46cc-bd30-9ae1cc2b2d87",
            "TraceId"     =>   $HotelBookings->trace_Id,
            "ResultIndex" =>   $HotelBookings->hotel_index,
            "HotelCode"   =>   $HotelBookings->code,
            "HotelName"   =>   $hotel['HotelName'],
            "GuestNationality"  => "IN",
            "NoOfRooms"         => "1",
            "ClientReferenceNo" => "0",
            "IsVoucherBooking"  => "false",
            "HotelPassenger"    => $this->passenger_details($HotelBookings),
            "HotelRoomsDetails" => [[
                "RoomIndex"     => $HotelBookings->hotel_room_index,
                "RoomTypeCode"  => $hotelroom['RoomTypeCode'],
                "RoomTypeName"  => $hotelroom['RoomTypeName'],
                "RatePlanCode"  => $hotelroom['RatePlanCode'],
                "BedTypeCode"   =>null,
                "SmokingPreference"=> 0,
                "Supplements"      => null,
                "Price"=> [
                    "CurrencyCode"     => $hotelroom['Price']['CurrencyCode'],
                    "RoomPrice"        => (string)$hotelroom['Price']['RoomPrice'],
                    "Tax"              => (string)$hotelroom['Price']['Tax'],
                    "ExtraGuestCharge" => (string)$hotelroom['Price']['ExtraGuestCharge'],
                    "ChildCharge"      => (string)$hotelroom['Price']['ChildCharge'],
                    "OtherCharges"     => (string)$hotelroom['Price']['OtherCharges'],
                    "Discount"         => (string)$hotelroom['Price']['Discount'],
                    "PublishedPrice"   => (string)$hotelroom['Price']['PublishedPrice'],
                    "PublishedPriceRoundedOff" => (string)$hotelroom['Price']['PublishedPriceRoundedOff'],
                    "OfferedPrice"             => (string)$hotelroom['Price']['OfferedPrice'],
                    "OfferedPriceRoundedOff"   => (string)$hotelroom['Price']['OfferedPriceRoundedOff'],
                    "AgentCommission"          => (string)$hotelroom['Price']['AgentCommission'],
                    "AgentMarkUp"              => (string)$hotelroom['Price']['AgentMarkUp'],
                    "ServiceTax"               => (string)$hotelroom['Price']['ServiceTax'],
                    "TDS"                      => (string)$hotelroom['Price']['TDS']
                ],
           
            ]]
 
        ];
        
        return $data;
  

   }


    //============== HERE IS ALL PASSENGER DETAILS BIND INTO LOOP ================//
    private function passenger_details($HotelBooking)
    {
        // dd($HotelBooking);
        $passenger = [];
        $passengers_data =json_decode($HotelBooking->adults_details);

        foreach($passengers_data as $key => $passenger_data){
            $age= $passenger_data->age;

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
                "DateOfBirth" =>  $age,
                "Gender" => $gender,
                "Age"=> (int)$age,
                "PassportExpiry" =>  "",
                "LeadPassenger"=> true,
                "Phoneno" => $HotelBooking->phone,
                "Email" =>  $HotelBooking->email,
                "PaxType"=> 1,
            ];
            array_push($passenger,$data);
        }
        return $passenger;
    }


     //-----------------This is For Redirect After Payment------------------//  
    public function booking_details($id)
    {
     
        $newid = decrypt($id);
        $HotelBookings = HotelBooking::where('id',$newid)->with('payment')->first();
     
        if($HotelBookings){
            return view('hotel.booking.booking_form_response', compact('HotelBookings'));
        }else{
            return redirect()->route('/');
        }
    }

      //-----------------This is For Sending Mail------------------//  

      private function SendBookingMail($HotelBooking)
      {
          $msg = "Dear $HotelBooking->email,Thank you for choosing to Hotel of:For any query we will contact at your given number $HotelBooking->phone You have confirm your package with all policies.We will contact with you soon.";
              $msg = wordwrap($msg,400);
              mail($HotelBooking->email,"Hotel BOOKING CONFIRMATION AT GET YOUR Hotel",$msg);
  
      }


}//this is main function Duv
