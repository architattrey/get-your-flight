<?php

Route::post('/hotel/book/{hotelindex}/{hotelroomindex}/{HotelCode}/{adult}/{child}/{traceid}','Booking\Hotel\HotelBookingController@HotelBookingProcessing')->name('book_room');

Route::get('/hotel/book/response/{id}','Booking\Hotel\HotelBookingController@bookkroomresponse')->name('book_room_response');  // booking hotel room service

Route::get('/hotel/payment/{id}','Booking\Hotel\HotelBookingController@HotelPayment')->name('hotel_payment');

Route::get('/hotel/booking/details/{id}','Booking\Hotel\HotelBookingController@booking_details')->name('hotel_booking_details');