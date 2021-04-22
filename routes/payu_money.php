<?php

# Call Route
 // Route::get('payment/userid&{userid}+packageid&{packageid}+{booked_by}&{package_rate}', ['as' => 'payment', 'uses' => 'Payment\PaymentController@payment']);

# Status Route
Route::get('payment/status/{id}', ['as' => 'payment.status', 'uses' => 'Package\PackageController@status']);


?>