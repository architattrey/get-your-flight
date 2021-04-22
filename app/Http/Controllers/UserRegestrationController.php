<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BookAsGuest;
use App\User;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;

class UserRegestrationController extends Controller
{
    public function signUpUser(Request $request)
	{
		$input = $request->all();
		$validation = Validator::make($input,array(
			'email'=>'required|email',
			'contact_no' =>'required|min:10|max:13'
		));
		if($validation->passes())
		{
			$userData =  BookAsGuest::create([
				'email'       =>    $input['email'],
				'contact_no'   =>   $input['contact_no']
            ]);
                  Session::put('guestData', $userData);
                  $guestUserData = Session::get('guestData');
                 return response()->json(['data'=>$guestUserData]);
        }
        return response()->json(['error'=>$validation->errors()->all()], 400);
		
	}
    
    public function loginUser(Request $request)
	{
       $input =  $request->all();
       $validation = Validator::make($input,array(
           'email'=> 'required|email',
           'password'=> 'required|min:5|max:10'
       ));
       if($validation->passes())
       {
           $userInformation = [
               'email'=> $input['email'],
               'password'=>$input['password']
           ];

           if(Auth::attempt($userInformation)){
            return response()->json(['success'=>'successfully Login']);
           }else {
            return response()->json(['error'=>$validation->errors()->all()],400);
           }
       }
       return response()->json(['error'=>$validation->errors()->all()],400);
	}
}
