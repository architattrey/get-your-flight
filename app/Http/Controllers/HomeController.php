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
use DB;

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
       
	public function TourDetailsView($slug, Request $r)
	{
		// $addDestination=null;
		// $package = Package::where('slug',$slug)->first();
    
		// $randomlyChangePackages = Package::take(3)->inRandomOrder()->get();
		// dd($randomlyChangePackages);
	 	// return view('home.package-details',compact('package','addDestination','randomlyChangePackages'));
    }
	 
	public function TourDetailsView2($from, $slug,Request $r)
	{
		// $addDestination = $from;
		// $package = Package::where('slug',$slug)->first();
		// $randomlyChangePackages = Package::take(3)->inRandomOrder()->get();
		// dd($randomlyChangePackages);
	 	// return view('home.package-details',compact('package','addDestination','randomlyChangePackages'));
	}

	public function CreateDashboardView()
	{
	 	return view('super_admin.package.create');
	}



}
