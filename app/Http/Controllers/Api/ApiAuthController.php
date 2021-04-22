<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
class ApiAuthController extends Controller
{
    public function authenticate()
	{
		// return 'yess';
        // dd(session('TokenId'));
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
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
			
	    $responce=curl_exec ($curl);
	    $responce_data = json_decode($responce, true);

	    
	    curl_close ($curl);

	    Session::put('TokenId', $responce_data['TokenId']);

        // session(['TokenId' => $responce_data['TokenId']]);

        // dd(session('TokenId'));
        return 'done';
	    return $responce_data['TokenId'];

	}
}
