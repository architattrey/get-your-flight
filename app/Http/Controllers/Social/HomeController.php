<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Customer;
use App\Package;
use Session;
use App\PackagesBooking;
use App\User;
use Hash;
use Auth;

class HomeController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['logout', 'index', 'CreateDashboardView', 'BookingView']);
        $this->middleware('guest')->only(['loginPage', 'checklogin']);
    }

    public function loginPage()
    {
		return view('home.login');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function checklogin(Request $r)
    {

    	$loginValidate = $r->validate([

    		'email' => 'required|email',
    		'password' => 'required',
    	]);

		$userdata = [
			'email'     =>  $r['email'],
			'password'  =>  $r['password']
		];  
		
		if (Auth::attempt($userdata)) {
            $role=User::where('email',$r['email'])->value('role');
             if($role == '1')
             {
				return redirect('/dashboard');
				}else{
					return redirect('/dashboard');
				}
			}else{
				Session::flash('flash_message2','Enter a valid email and password.');
				return view('home.login');
			}
	}	


	public function logout(Request $request)
	{
		Auth::logout();
		Session::flush();
		return redirect('/');
  	}   

//--------------=========>>>>>>>>Register Page ATUL GUPTA<<<<<<<<<===========----------//

    public function registerPage()
    {
    	return view('home.register');
    }

    public function checkRegister(Request $r)
    {
    		$registerValidate = $r->validate([

    			'fname'		=>	'required|string',
    			'lname'		=>	'required|string',
    			'number'	=>	'required|integer|min:10',
    			'email'		=>	'required|email|unique:users',
    			'password'  => 	'required|confirmed|min:6',
    			
    		]);

    		$userRegisterData = User::create([

    			'name'		=>	$r['fname'],
    			'last_name'	=>	$r['lname'],
    			'mobile'	=>	$r['number'],
    			'email'		=>	$r['email'],
    			'password' => 	Hash::make($r->password),
    			'role'		=>	3
    		]);

    		Session::flash('flash_message','You have successfully submited the information.'); 
    		Auth::login($userRegisterData);
    		return redirect('/dashboard');

    }

    public function index()
    {
       return view('super_admin.dashboard');
    }

	public function ReturnHomePage()
	{
		$packages =Package::take(6)->latest()->get();
		return view('home.home',compact('packages'));
	}
        //===============sonu page================================
	public function ReturnHomePageSonu()
	{
		$packages =Package::take(6)->latest()->get();
		return view('home.homesonu',compact('packages'));
	}
	  //==================sonu page================================END

	public function TourDetailsView($slug, Request $r)
	{
		$addDestination=null;
		$package = Package::where('slug',$slug)->first();
		// /dd($package);
	 	return view('home.package-details',compact('package','addDestination'));
    }
	 
	public function TourDetailsView2($from, $slug,Request $r)
	{
		$addDestination=$from;
		$package =Package::where('slug',$slug)->first();
		
	 	return view('home.package-details',compact('package','addDestination'));
	}

	public function CreateDashboardView()
	{
	 	return view('super_admin.package.create');
	}


	public function BookingFormPay($slug)
	{
		$SessionValue = Session::get('step1_data');
		
		$package =Package::where('slug',$slug)->first();

		if (!$package) {
			return back();
		}

	   return view('home.booking',compact('package','SessionValue'));
	}

	/* 
	   ====================================================this for storing data of booking flight==========================
	*/
	public function BookingStep1($slug, Request $request)
	{
	    	$messsages = array(
				'departure_city.required'=>'You cant leave Departure City empty',
				'departure_city.string'=>'This field contain only characters ',
				'departure_city.max'=>'This field contain maximum 255 characters ',
				'customer_state.required'=>'You cant leave Destination field empty',
				'customer_state.string'=>'This field contain only characters ',
				'customer_state.max'=>'This field contain maximum 255 characters ',
				'arrival.required'=>'You cant leave this field empty',
				'arrival.date'=>'You must be enter the correct date formate',
				'adult.required'=>'You cant leave field empty',
				'adult.integer'=>'Only numbers is allowed',
				'adult.min'=>'This filled will contain minimum 1 adult',
				'adult.max'=>'This filled will contain maximum 3 adults',
				'children.required'=>'You cant leave field empty',
				'children.integer'=>'Only numbers is allowed',
				'children.min'=>'This filled will contain minimum 1 children',
				'children.max'=>'This filled will contain maximum 3 childrens',
		   );
	
			 $validatedData = $request->validate([
			 	'departure_city'        => 'required|string|max:255',
			 	'customer_state'        => 'required|string|max:255',
			 	'arrival'          		=> 'required|date',
			 	'adult'      		 	=> 'required|integer|min:1|max:3',
			 	'children'     		 	=> 'required|integer',
			 ]);
             $arrays[] = $request->toArray();
			 $validator = Validator::make($arrays,$validatedData,$messsages);
			
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
	
	public function BookingStep2(Request $request)
	{
	     	$input = $request->all();
			//dd($input);
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
				'zip'              =>'required|integer|max:10',
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

			}
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

			]);

			Session::flash('flash_message','You have successfully submited the information.');    
			return redirect('/');			
	}

	public function BookingView()
	{
		$id=1;
		$package =Package::where('id',$id)->first();
	 	return view('home.booking',compact('package'));
	}

	public function BookingfinalStep()
	{
		 return "sdd";
	}
	
	

}
