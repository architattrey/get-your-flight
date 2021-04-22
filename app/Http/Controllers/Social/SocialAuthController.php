<?php

namespace App\Http\Controllers\Social;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Package;
use Socialite;
use Auth;
use App\User;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider, $isjaxid = null, Request $request)
    {
       // return Socialite::driver($provider)->redirect();

        if($isjaxid) {
            session(['back_page' => $isjaxid]);
        }
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider, Request $request)
    {
        $socialuser = Socialite::driver($provider)->user();
        $url = null;  
        $user = User::where('email',$socialuser->email)->first();
   
        if(!$user) {
            $data = [
                'name'                => $socialuser->name,
                'email'               => $socialuser->email,
                'role'                => 3,
                'status'              => 1,
                'remember_token'      => str_random(32),
                'password'            => null,
                // 'provider'            => $provider,
                'avatar'              => $socialuser->getAvatar(),
                'register_type'       => $provider,
                'user_profile_link'   => $url
            ];
              //return $data;
            $user = User::create($data);
            }else {
                $user->update(['avatar' => $socialuser->getAvatar(), 'user_profile_link'   => $url]);
            }

        Auth::login($user);

        if (session('back_page')) {
     
            $package = Package::where('id',session('back_page'))->first();
            return redirect()->route('booking_form_pay', ['slug' => $package->slug]);
            return redirect('/reload/user');
        }

        return redirect()->intended("/");

    }

}
