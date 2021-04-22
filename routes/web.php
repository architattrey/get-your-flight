<?php

// home page of wesite
Route::get('/', 'HomeController@ReturnHomePage')->name('home');

//pakckage booking of toure
Route::GET('/holidays/search','Data\Holiday\HolidayViewController@HolidaysSearch');
Route::get('/package-details/{slug}', 'Package\PackageViewController@TourDetailsView')->name('package_details');
Route::get('/package-details-location/{from?}/{slug}', 'Package\PackageViewController@TourDetailsView2')->name('package_details_location');
Route::GET('/booking/step/{slug}/form', 'Package\PackageController@BookingFormPay')->name('booking_form_pay');
Route::POST('/booking/step/{slug}/store', 'Package\PackageController@BookingStep1')->name('booking_step1');
Route::POST('/booking/step2/',['as'=>'booking_step2','uses'=>'Package\PackageController@BookingStep2']);
Route::get('/booking/view', 'HomeController@BookingView')->name('booking_view');
Route::get('/invoice/{id}',['as'=>'response_package_details','uses'=>'Package\PackageController@showingTransactionsDetials']);
Route::get('/invoice/PDF/download/{id}',['as'=>'invoicePdf','uses'=>'Package\PackageController@downloadPdf']);

Route::GET('/reload/user', function () 
{
     return view('home.social_login_redirect_script');
});

// showing all final order details for users

Route::get('/login','HomeController@loginPage')->name('login');

Route::get('/register','HomeController@registerPage')->name('register');

Route::POST('/check/register','HomeController@checkRegister')->name('checkregister');

Route::POST('/check/login','HomeController@checklogin')->name('checklogin');

Route::get('/dashboard', function () {
    if (auth()->user()->role == 1){
     return view('super_admin/dashboard');
    }else{
      return view('users/dashboard');
    }
})->name('dashboards')->middleware(['auth', 'revalidate']);

Route::get('/air/getairdata','Data\Air\AirViewController@getairdata');
Route::get('/air/booking/{index}/{traceId}','Data\Air\AirViewController@booking');
//dummy for sunil
Route::get('/air/getairdata/sunil','Data\Air\AirViewController@getairdatasunil');

Route::get('/getform','Data\Hotel\HotelViewController@getform'); 
Route::get('/gethoteldata','Data\Hotel\HotelViewController@gethoteldata');
Route::get('/hotel/hotelinfo/{index}/{HotelCode}/{traceid}','Data\Hotel\HotelViewController@show');  // geting hotel room service
Route::get('/hotel/blockroom/{hotelindex}/{hotelroomindex}/{HotelCode}/{traceid}','Data\Hotel\HotelViewController@blockroom')->name('block_room');  // geting hotel room service

// Route::get('/air/hotelinfo/{index}/{HotelCode}','Data\Hotel\HotelViewController@show');  // geting hotel room service

Route::GET('/bookingHotel','AdminController@bookingHotel');
Route::GET('/paymentDetail','AdminController@paymentDetail');



// all datas
// Route::GET('/getform','Data\DataController@getform');
// Route::GET('/gethoteldata','Data\DataController@gethoteldata');

// geting search result for hote search

Route::group(['prefix' => 'api/v1', 'middleware' => 'encryptCookie'], function () {    

	Route::GET('/authenticate','Api\ApiAuthController@authenticate'); // authenticate     
	Route::POST('/hotel/searchHotel','Api\Hotel\HotelController@searchHotel'); // searching hotel
    Route::get('/hotel/hotelinfo/{index}/{HotelCode}/{traceId}','Api\Hotel\HotelController@Hotelinfo');
    Route::get('/hotel/hotel_room_info/{index}/{HotelCode}/{traceId}','Api\Hotel\HotelController@HotelRoominfo'); 
    Route::get('/hotel/blockroom/{hotelindex}/{hotelroomindex}/{HotelCode}/{traceid}','Api\Hotel\HotelController@block_room')->name('api_block_room');

	Route::POST('/air/searchAir','Api\AirLine\AirlineController@searchAir');
	Route::GET('/air/get-calendar-fare','Api\AirLine\AirlineController@GetCalendarFare');
	Route::GET('/air/get-update-calendar-fare','Api\AirLine\AirlineController@GetupdateCalendarFare');
	Route::GET('/air/farerule','Api\AirLine\AirlineController@farerule');
	Route::POST('/air/farequete/{index}/{traceId}','Api\AirLine\AirlineController@farequete')->name('booking_flight');
	Route::POST('/air/ssr/{index}/{traceId}','Api\AirLine\AirlineController@ssr')->name('booking_flight_ssr'); 

});

// Auth::routes();
//Himasshu Social Login
Route::get('/login/{provider}/{isajax?}', 'Social\SocialAuthController@redirectToProvider')->name('socaillogin');
Route::get('/auth/{provider}/callback', 'Social\SocialAuthController@handleProviderCallback');

// user login and register =====
Route::post('login/user', ['as' =>    'loginUser',     'uses' => 'UserRegestrationController@loginUser']);
Route::post('signin/user', ['as' =>   'asguest', 'uses' => 'UserRegestrationController@signUpUser']);

Route::POST('logout', 'HomeController@logout')->name('logout');


Route::group(['middleware' => 'revalidate'], function()
{
    Route::get('/home', 'HomeController@index')->name('home');
});

 