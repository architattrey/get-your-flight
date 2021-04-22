<?php

Route::get('/single/air/details/{id}','Data\Air\AirViewController@SingleAirDetails')->name('single_air_details');

Route::POST('/flight/booking/{IndexId}/{TraceId}/{adult}/{child}/{infant}','Booking\FlightBookingController@FlightBookingProcessing')->name('flight_booking');

Route::get('/flight/payment/{id}/{islcc}','Booking\FlightBookingController@FlightPayment')->name('flight_payment');

Route::get('/booking/details/{id}','Booking\FlightBookingController@booking_details')->name('booking_details');

Route::get('/hima','Booking\FlightBookingController@GetlatestData');


