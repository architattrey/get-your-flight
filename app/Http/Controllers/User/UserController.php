<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
Use Auth;
use App\Package;
use App\PackagesBooking;
use Session;



class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function UserViewProfile()
    {
        $user = Auth::user();
        return view('users.pages.profile.index',compact('user'));

    }

    public function UserEditView($id)
    {
        $user = User::where('id',$id)->first();
        return view('users.pages.profile.edit',compact('user'));
    }

    public function UpdateUser($id,Request $r)
    {
        $validatedData = $r->validate([
            'name'              =>'required|string|max:255',
            'last_name'         =>'required|string|max:255',
            'password'          =>'required|confirmed|min:6',
            'mobile'            =>'required|max:11',  
            'state'             =>'required',  
            'city'              =>'required|string|max:255',  
            'pin_code'          =>'required|max:6',  
            'address'           =>'required|string|max:255',  
        ]);
         
        $user = User::where('id',$id)->first();

        $data = [
            'name'         => $r['name'],
            'last_name'    => $r['last_name'],
            'password'     => $r['last_name'], 
            'mobile'       => $r['mobile'], 
            'state'        => $r['state'], 
            'city'         => $r['city'], 
            'pin_code'     => $r['pin_code'], 
            'address'      => $r['address'], 
       ];
        
        $user->update($data);

        Session::flash('flash_message','Successfully Update.');   
        return back();

    }

    public function UserViewPackage()
    {
        $id = Auth::user()->id;
        $packagesBookings =PackagesBooking::with('package')->where('user_id',$id)->get();
        return view('users.pages.package.index',compact('packagesBookings'));
    }




}
