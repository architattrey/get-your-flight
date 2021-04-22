<?php
namespace App\Http\Controllers\Payment;
namespace App\Http\Controllers\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Payment;
use Illuminate\Support\Facades\Validator;
use Tzsk\Payu\Model\PayuPayment;
use App\Mail\PackageBooked;
use App\Package;
use Carbon\Carbon;
use Session;
use App\Model\PackagesBooking;
use App\User;
use Hash;
use Auth;
use DB;
use Crypt;
use Mail;
use PDF;


class PackageController extends Controller
{   
    public function BookingView()
    {
        $id=1;
        $package =Package::where('id',$id)->first();
        return view('home.booking',compact('package'));
    }
    public function BookingFormPay($slug)
	{
        try{
                $SessionValue = Session::get('step1_data');
                
                $package =Package::where('slug',$slug)->first();

                if (!$package) {
                    return back();
                }

             return view('home.booking',compact('package','SessionValue'));
            }catch(\Exception $e){
                return $e->getMessage();

            }
	}

	/* 
	   ================================= TAKE DATA FOR FINAL BOOKING AND FOR PAYMENT==========================
	*/
	public function BookingStep1($slug, Request $request)
	{
	    	$messsages = array(
				'departure_city.required'=>'You cant leave Departure City empty',
				'departure_city.string'=>'This field contain only characters',
				'departure_city.max'=>'This field contain maximum 255 characters',
				'customer_state.required'=>'You cant leave Destination field empty',
				'customer_state.string'=>'This field contain only characters',
				'customer_state.max'=>'This field contain maximum 255 characters',
				'arrival.required'=>'You cant leave this field empty',
				'arrival.date'=>'You must be enter the correct date formate',
				'adult.required'=>'You cant leave field empty',
				'adult.integer'=>'Only numbers is allowed',
				'adult.min'=>'This filled will contain minimum 1 adult',
				'adult.max'=>'This filled will contain maximum 3 adults',	
		   );
	
            $validatedData = $request->validate([
            'departure_city'        => 'required|string|max:255',
            'customer_state'        => 'required|string|max:255',
            'arrival'          		=> 'required|date',
            'adult'      		 	=> 'required|integer|min:1|max:3',
            
            ]);
            $arrays[] = $request->toArray();
            $validator = Validator::make($arrays,$validatedData,$messsages);
            
             //=================  DATE VALIDAITON ============
            if($request->arrival)
            {
                //============== Check Age ================//
                $packageDate = Carbon::createFromFormat('d-m-Y', $request->arrival);
                if($packageDate <= Carbon::now())
                {
                    Session::flash('flash_message','Please Select Valid Date.');    
                    return back();
                   
                }
                else
                {
                    $package = Package::where('slug',$slug)->first();
                    if (!$package) {
                       return back();
                    }
                    $datas=([
                        'departure_city'          =>$request['departure_city'],
                        'customer_state'          =>$request['customer_state'],
                        'arrival'                 =>$request['arrival'],
                        'adult'                   =>$request['adult'],
                        'children'                =>$request['children'],
                        'package_id'              =>$package->id,
                        'seller'                  =>$package->seller
                        
                    ]);
                    Session::put('step1_data', $datas);
                    return redirect()->route('booking_form_pay', ['slug' => $slug]);
                    // return view('home.booking',compact('package','SessionValue'));
                }
            }
            else
            { 
                return back();
            }
	}
	//===========CONTAIN ALL DATA FOR FINAL BOOKING ==================
	public function BookingStep2(Request $request)
	{
        $input = $request->all();
        $validation = Validator::make($input,array(
            'arrivaldate'      =>'required|date',
            'children'         =>'integer',
            'adult'            =>'required|integer',
            'customer_state'   =>'required',
            'departure_city'   =>'required',
            'email'            =>'required|email',
            'aname'            =>'required|string',
            'adob'             =>'required|date',
            'cname'            =>'required|string',
            'cdob'             =>'required|date',
            'mobile'           =>'required|integer|min:10',
            'zip'              =>'required|integer|max:6',
        ));
        $adult_data = [];
        $id=0;
        foreach ($request->aname as $a_key => $a_value) 
        {            
                $id++;
                $adult_data[] =
                [ 
                    'id'=> $id,
                    'adult_name'=>$request->aname[$a_key],
                    'adult_dob' =>$request->adob[$a_key],            
                ];        
        }
        $dateofbirth = Carbon::createFromFormat('d-m-Y', $request->adob[$a_key]);
        $now = Carbon::now();
        $adult_age = $dateofbirth->diffInYears($now);

        if($adult_age <= 12)
        {
            Session::flash('flash_message','Adult age should be more than 12');    
            return back();
        }
       

        $childre_data = [];
        if(isset($request->children))
        {   
            $id=0;
            foreach($request->cname as $c_key => $c_value) {            
                $id++;
                $childre_data [] = 
                [
                    'id'=> $id,
                    'child_name'=>$request->cname[$c_key],
                    'child_dob' =>$request->cdob[$c_key],            
                ];        
            }
            $dateofbirth = Carbon::createFromFormat('d-m-Y', $request->cdob[$c_key]);
            $now         = Carbon::now();
            $child_age   = $dateofbirth->diffInYears($now);
            if($child_age > 12)
            {
               Session::flash('flash_message','Children age ahould be less than 12');    
               return back();
            }

        }
        
      //==================INSERT IN TO THE PACKAGE TABLE==============

        $payu_id = 0;
        $userPakageData =  PackagesBooking::create([
            'package_id'       =>  $input['package_id'],
            'departure_city'   =>  $input['departure_city'],
            'customer_city'    =>  $input['customer_state'],
            'departure_date'   =>  $input['arrivaldate'],
            'total_adults'     =>  $input['adult'],
            'total_childrens'  =>  $input['children'],
            'adults_details'   =>  json_encode($adult_data),
            'childrens_details'=>  json_encode($childre_data),
            'phone'            =>  $input['mobile'],
            'email'            =>  $input['email'],
            'zip_code'         =>  $input['zip'],
            'is_booked_by'     =>  $input['is_booked_by'],
            'guest_id'         =>  $input['guest_id'],
            'user_id'          =>  $input['user_id'],
            'payu_id'          =>  $payu_id

        ]);
        
        $packageRate        = $input['package_rate'];
        $bycript_money      = Crypt::decrypt($packageRate);
        $get_package_amount = Package::where('id',$input['package_id'])->get(['package_rate']);
        $package_amount     = $get_package_amount[0]->package_rate;
        if($bycript_money <> $package_amount)
        {    
            return back();

        }else{
   //=============================PAYMENT METHOD ================
            $attributes = [
                'txnid'     => strtoupper(str_random(8)), # Transaction ID.
                'amount'    => floatval( $package_amount), # Amount to be charged.
                'productinfo'=> $input['package_name'],
                'userid'    => ($input['is_booked_by']==1) ? $input['user_id'] : $input['guest_id'],
                'packageid' => $input['package_id'], # Payee Name.
                'bookedBy'  => $input['is_booked_by'], # Payee Email Address.
                'firstname' => $request->aname[0],
                'phone'     => $input['mobile'],
                'email'     => $input['email']
            ];    
            return Payment::make($attributes, function ($then) use($userPakageData) {   //to go payment gateway
                
                $then->redirectRoute('payment.status', ['id' => $userPakageData['id']]);
            });
        }
    }
    public function status($id) 
    {
        
            $payment   = Payment::capture();
            $data      = PayuPayment::create((array)$payment->getData());
            $responsed = collect($payment->getData());
            $product   = PackagesBooking::where('id', $id)->with('orders')->first();
            $updatePayuid = $product->update(['payu_id' => $data->id]);
           
            if($product) {
                if($data->status=="success")
                {      
                    $order = $product->orders()->where('orderable_id',$id)->where('orderable_type','App\PackagesBooking')->first();
                    
                    if (!$order) {
                        $product->orders()->create(['payu_id' => $data->id,'txnid' => $data->txnid]);
                        $decodeadultName = json_decode($product->adults_details);
                        $adultName     = $decodeadultName[0]->adult_name;
                        $departureCity = $product->departure_city;
                        $departureDate = $product->departure_date;
                        $totalAdults   = $product->total_adults;
                        $totalChildren = $product->total_childrens;
                        $msg = "Dear $adultName,Thank you for choosing to package of $departureCity. We are glad to your accommodation as follows:
                                Guest:   $totalAdults 'Adults'  / $totalChildren 'Kids'
                                For any query we will contact at your given number $product->phone You have confirm your package with all policies.We will contact with you soon.";
                        $msg = wordwrap($msg,400);
                        mail($product->email,"PACKAGE BOOKING CONFIRMATION AT GET YOUR FLIGHT",$msg);
                       
                        return redirect()->route('response_package_details',['id' => encrypt($product->id)]);
                        
                        //$mail=  Mail::to($product->email)->send(new PackageBooked($product)); 
                       // Session::flash('flash_message','You have confirm your package with all policies.We will contact with you soon.');
                      
                    } else {
                        Session::flash('flash_message','Your pakcage has been booked');
                         return redirect()->Route('home');
                    }
                }else{
                    //echo "string";
                    Session::flash('flash_message','Your payment has been unsucessed');
                  return  redirect()->Route('home');
                }          
            }else {
                Session::flash('flash_message','Your package has been booked');
                return  redirect()->Route('home');
            }
       
    }

    //========================== SHOWING DETAILS OF PACKAGE FOR THE PDF ===============

    function showingTransactionsDetials($id)
    { 
        $packageBookingId    =  Crypt::decrypt($id);
        $product             =  PackagesBooking::where('id', $packageBookingId)->with('payment')->first();
        //return $product; 
        return view('home.showingbookingdetails',compact('product'));
    }
    //==========================  DOWNLOAD THE PDF FILE OF INVOICE ====================

    function downloadPdf($payuId)
    {    
        $product   = PackagesBooking::where('payu_id', $payuId)->with('payment')->first();
      
        $pdf       = PDF::loadView('home.showingbookingdetails',compact('product'));
        return $pdf->download('invoice.pdf');
    }
}
