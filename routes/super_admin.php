<?php

Route::get('/create/package', 'SuperAdmin\SuperAdminController@CreatePackage');

Route::get('/packages/booking_list','SuperAdmin\SuperAdminController@BookingList');

Route::POST('/add_package', 'SuperAdmin\SuperAdminController@AddToDataBasePackage');

Route::get('/package/list', 'SuperAdmin\SuperAdminController@PackageList');

Route::get('/single/package/list/{id}', 'SuperAdmin\SuperAdminController@SinglePackageList')->name('single_package_list');

Route::get('/single/package/lists/{id}', 'SuperAdmin\SuperAdminController@SinglePackageLists')->name('single_package_lists');

Route::POST('/single/package/edit/{id}','SuperAdmin\SuperAdminController@SinglePackageEdit')->name('single_package_edit');

Route::get('/packages/single/booking_list/{id}','SuperAdmin\SuperAdminController@PackagesSingleBooking_list')->name('packages_single_booking_list');