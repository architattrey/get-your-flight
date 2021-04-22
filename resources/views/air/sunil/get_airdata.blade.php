@extends('home.layouts.app')
@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
	<style>
		[type="checkbox"]:not(:checked), [type="checkbox"]:checked {
			position: static !important;
			left: -9999px !important;
			opacity: 9 !important;
		}
        .radio input[type="radio"], .radio-inline input[type="radio"], .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"]{
            margin-left: 0px;
		}
		.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
    position: relative;
    min-height: 1px;
    padding-right: 15px;
     padding-left:0;
	}
	#myTable tr {
    border-bottom: 1px solid #ddd;
    font-size: 14px;
	}
	#myTable th, #myTable td {
    text-align: center;
    padding: 10px 5px;
	}
	#myTable th, #myTable td {
    text-align: center;
    padding: 10px 5px;
	}
	.text{
    padding: 0 0 0 5px !important;
    font-size: 10px !important;
	}
	.text1{
	font-size: 10px !important;
	}
	.small-text{
	font-size: 10px !important;
	}
	.hot-page2-alp-l3 ul li label {
    display: block;
    font-size: 15px;
    color: #343c42;
    font-weight: 600;
    padding-left: 7px;
    border: 1px solid #cecaca;
    margin: 0 2px 5px;
	}
	.hot-page2-alp-l3 ul li {
    list-style-type: none;
    border-bottom: 1px solid #fff;
	}
	.active:before 
	{
    background-color: #fff;
    content: " ";
    display: block;
    height: 4px;
    left: 0;
    position: absolute;
    right: 0;
    top: -4px;
    z-index: 1;
	}
	
	.chat-footer{
	  background-color: #14182f;
	  padding: 10px;
	  position: fixed;
	  bottom: 0;
	  width: 100%;
	  margin-left:-14px;
	}
	.footer_border
	{
		border: 1px solid #14182f!important;
	}

	.ng-binding {
    font-size: 16px;
    padding: 0 10px;
	}

	radio input[type="radio"], .radio-inline input[type="radio"], .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"] {
    margin-left: -20px;
	}

	.star{
		  margin: 0;border: none; 
		  padding: 0;
	}
	.flights:hover {
    background-color: #ccc7b1cf;
	}
	.checked_calss{
		background: #cabdbd66;
	}
	.checked_calss:hover {
        background-color:#daa3a3 !important;
	}

	.stops_color {
		background-image: linear-gradient(to bottom, #eee, #eee) !important;
		background-color: palevioletred !important; 
		color: #999 !important;
		border: 1px solid #eee !important;
	}

	.stops_not_color {
		
		background-image: linear-gradient(to bottom, #f4364f, #f4364f) !important;
		color: white !important;
		background-color: #f4364f !important;
		color: #999 !important;
		border: 1px solid #f4364f !important;
	}

	.btn-lg, .btn-group-lg > .btn {
		padding: 0px 9px;
		font-size: 18px;
		line-height: 1.3333333;
		border-radius: -1px;
	}
	
	.btn-info {
    color: #fff;
    background-color: #5bc0de;
    border-color: #fff;
	}
	
	.containerbox {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
	}

	/* Hide the browser's default checkbox */
	.containerbox input {
		position: absolute;
		opacity: 0;
		cursor: pointer;
	}

	/* Create a custom checkbox */
	.checkmark {
		position: absolute;
		margin: 0px 0px 0px -122px;
		height: 25px;
		width: 25px;
		background-color: #eee;
	}

	/* On mouse-over, add a grey background color */
	.containerbox:hover input ~ .checkmark {
		background-color: #ccc;
	}

	/* When the checkbox is checked, add a blue background */
	.containerbox input:checked ~ .checkmark {
		background-color: #f4364f;
	}

	/* Create the checkmark/indicator (hidden when not checked) */
	.checkmark:after {
		content: "";
		position: absolute;
		display: none;
	}

	/* Show the checkmark when checked */
	.containerbox input:checked ~ .checkmark:after {
		display: block;
	}

	/* Style the checkmark/indicator */
	.containerbox .checkmark:after {
		left: 9px;
		top: 5px;
		width: 5px;
		height: 10px;
		border: solid white;
		border-width: 0 3px 3px 0;
		-webkit-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		transform: rotate(45deg);
	}
	/*media query   */
	@media screen and (max-width:1024px){
		.one input{
			margin: 4px -80px 79px !important;
			display: inline-block;
		}
		.img-l{
			margin-left: 20px;
		}
	}

    #myTable tr.header, #myTable tr:hover {
    /* background-color: #14182f; */
    }
    #myTable .indgo:hover{
           background: #14182f;
    }

	</style>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/angularjs-slider/6.4.3/rzslider.css" /> 
@endsection
@section('content')

@php

	session(['flight_search_url' => url()->full()]);
    
    if(isset($_GET['no_of_adults'])) {

	    $adult = $_GET['no_of_adults'];

	}else{
        
        $adult = 1;
	}

	if(isset($_GET['no_of_child'])) {

	    $child = $_GET['no_of_child'];

	}else{
        
        $child = 0;
	}

	if(isset($_GET['infant'])) {

	    $infant = $_GET['infant'];

	}else{
        
        $infant = 0;
	}

	if(isset($_GET['direct'])) {

	    $direct = $_GET['direct'];

	}else{
        
        $direct = 0;
	}

	if(isset($_GET['onestop'])) {

	    $onestop = $_GET['onestop'];

	}else{
        
        $onestop = 0;
	}

	if(isset($_GET['class_type'])) {
		$class_type = $_GET['class_type'];
	}else{
		$class_type = 1;
	}


	if(isset($_GET['preferredairlines'])) {

	    $preferredairlines = $_GET['preferredairlines'];

	}else{
        
        $preferredairlines = null;
	}

	if(isset($_GET['flying_from'])) {
		
	    $origin = $_GET['flying_from'];

	}else{
        $origin = "";
	}

	if(isset($_GET['flying_to'])) {

	    $destination = $_GET['flying_to'];

	}else{
        
        $destination = "";
	}

	if(isset($_GET['departure_date'])) {

	    $DepartureTime = $_GET['departure_date'];

	}else{
        $DepartureTime = "";
	}

	if(isset($_GET['arrival_date'])) {

	    $ArrivalTime = $_GET['arrival_date'];

	}else{
        $ArrivalTime = "";
	}

@endphp 
	

	@if($origin == '' or $destination == '' or $DepartureTime == '')
		<script type="text/javascript">
			window.location = "{{ url('/') }}";//here double curly bracket
		</script>
	@endif

<section class="hot-page2-alps hot-page2-pa-sp-tops all-hot-bgs">  
	<div class="container-fluid" ng-app="flightapp" ng-controller="flightCtrl">
		<div class="container">
			<div class="row">
				<div class="hot-page2-alp-con">
					<div class="row" ng-if="loading_data">
						<div class="col-md-3 hot-page2-alp-con-left">
						<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
							<h4><i class="fa fa-map-markers" aria-hidden="true"></i> Price Range </h4>
								<div class="hot-page2-alp-l-com1 hot-page2-alp-p4">	
									<ul>
										<li>
											<div class="col-md-12" ng-if="loading_data">
												<rzslider class="custom-slider" rz-slider-model="slider.minValue" rz-slider-high="slider.maxValue" rz-slider-options="slider.options"></rzslider>
											</div>
										</li>
									</ul>
								</div>
							</div>

							<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
								<h4><i class="fa fa-map-markerss" aria-hidden="true"></i> Depart Time </h4>
								<div class="hot-page2-alp-l-com1 hot-page2-alp-p4">	
									<ul style="display: inline-flex;">
										<li>
											<label class="flights departure_time_class" isflight="@{{filtering_flight('timing', 1, 0) ? 1 : 0}}"  ng-click="filter_timing(1)" id="departure_time_1" value="1">
												<a href="#" title="Morining-flights" style="margin: 0;border: none; padding: 0;" class="departure_time_class"  value="1">
													<i class="fa fa-sun-o departure_time_class"  value="1" aria-hidden="true" style="display: block;text-align: center;font-size: 20px;padding: 5px 15px;     opacity: 1; color: #f4364f;border-bottom: 1px solid #8a848436;"></i>
													<p class="departure_time_class" value="1" style="margin: 0; font-size: 10px;text-align: center; color: #6f6b6b;">00-06</p>
												</a>
												<!-- <input type="checkbox" ng-checked="true" ng-click="filter_timing(1)"> -->
											</label>
											<small class="text" ng-if="filtering_flight('timing', 1, 0)"><i class="fa fa-inr"></i> @{{filter_min_price("timing", 1, 0)}}</small>
										</li>
										<li>
											<label class="flights  departure_time_class" isflight="@{{filtering_flight('timing', 2, 0) ? 1 : 0}}" ng-click="filter_timing(2)" id="departure_time_2" value="2">
												<a class="star departure_time_class" href="#" value="2" title="Morining-flights" style="margin: 0;border: none; padding: 0;" >
													<i class="fa fa-star-half-o departure_time_class" value="2" aria-hidden="true" style="display: block;text-align: center;font-size: 20px;padding: 5px 15px; color: #f4364f; border-bottom: 1px solid #8a848436;"></i>
													<p class="departure_time_class" value="2" style="margin: 0; font-size: 10px;text-align: center; color: #000;">06-12</p>
												</a>
												<!-- <input type="checkbox" ng-checked="true" ng-click="filter_timing(2)"> -->
											</label>
											<small class="text" ng-if="filtering_flight('timing', 2, 0)"><i class="fa fa-inr"></i> @{{filter_min_price("timing", 2, 0)}}</small>
										</li>
										<li>
											<label class="flights departure_time_class" isflight="@{{filtering_flight('timing', 3, 0) ? 1 : 0}}" ng-click="filter_timing(3)" id="departure_time_3" value="3">
												<a href="#" class="departure_time_class" value="3" title="Afternone-flights" style="margin: 0;border: none; padding: 0;">
													<i class="fa fa-spinner departure_time_class" value="3" aria-hidden="true" style="display: block;text-align: center;font-size: 20px;padding: 5px 15px;     opacity: 1;    color: #f4364f; border-bottom: 1px solid #8a848436;"></i>
													<p class="departure_time_class" value="3" style="margin: 0; font-size: 10px;text-align: center; color: #000;">12-18</p>
												</a>
											
												<!-- <input type="checkbox" ng-checked="true" ng-click="filter_timing(3)"> -->
											</label>
											<small class="text" ng-if="filtering_flight('timing', 3, 0)"><i class="fa fa-inr"></i> @{{filter_min_price("timing", 3, 0)}}</small>
										</li>
										<li>
											<label class="flights departure_time_class" isflight="@{{filtering_flight('timing', 4, 0) ? 1 : 0}}" ng-click="filter_timing(4)" id="departure_time_4" value="4">
												<a href="#" class="departure_time_class" value="4" title="Nights-flights" style="margin: 0;border: none; padding: 0;">
													<i class="fa fa-moon-o departure_time_class" value="4" aria-hidden="true" style="display: block;text-align: center;font-size: 20px;padding: 5px 15px; color: #f4364f; border-bottom: 1px solid #8a848436;"></i>
													<p class="departure_time_class" style="margin: 0; font-size: 10px;text-align: center; color:#000;" value="4">18-00</p>
												</a>
												<!-- <input type="checkbox" ng-checked="true" ng-click="filter_timing(4)"> -->
											</label>
											<small class="text" ng-if="filtering_flight('timing', 4, 0)"><i class="fa fa-inr"></i> @{{filter_min_price("timing", 4, 0)}}</small>
										</li>
									</ul>
								</div>
							</div>

							@if($direct == 0)
								<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
									<h4><i class="fa fa-map-markers" aria-hidden="true"></i> Stops </h4>
										<div class="hot-page2-alp-l-com1 hot-page2-alp-p4" >
										
											<ul style="display:inline-flex; display:inline-flex; width:60%; height:auto; margin-left:50px;" >
												<li style = "width: 50px; border">
													<a href="#" ng-click="filter_stops(1)" isflight="@{{filtering_flight('stops', 1, 0) ? 1 : 0}}"
													 class="stops_color stops_class @{{filtering_flight('stops', 1, 0) ? '' : 'btn-is-disabled'}}"
													 style="border-radius: 6px 6px 6px 6px; padding: 10px 15px; cursor: pointer;"><span>0</span>
													 </a>
													<small class="text" ng-if="filtering_flight('stops', 1, 0)" style="display: block; margin-top: 5px;"><i class="fa fa-inr"></i> @{{filter_min_price("stops", 1)}}</small>
													
												</li>
												<li style = "width: 50px;">
													<a href="#" ng-click="filter_stops(2)" isflight="@{{filtering_flight('stops', 2, 0) ? 1 : 0}}" class="stops_color stops_class @{{filtering_flight('stops', 2, 0) ? '' : 'btn-is-disabled'}}" style="border-radius: 6px 6px 6px 6px; padding: 10px 19px;cursor: pointer;"><span>1</span></a>
													<small class="text" ng-if="filtering_flight('stops', 2, 0)" style="display: block; margin-top: 5px;"><i class="fa fa-inr"></i> @{{filter_min_price("stops", 2)}}</small>
												</li>
												<li style = "width: 50px;">
													<a href="#" ng-click="filter_stops(3)" isflight="@{{filtering_flight('stops', 3, 0) ? 1 : 0}}" class="stops_color stops_class @{{filtering_flight('stops', 3, 0) ? '' : 'btn-is-disabled'}}" 
													style="border-radius: 6px 6px 6px 6px; padding: 10px 11px;cursor: pointer;"><span>2+</span>
													</a>
													<small class="text" ng-if="filtering_flight('stops', 3, 0)" style="display: block; margin-top: 5px;"><i class="fa fa-inr"></i> @{{filter_min_price("stops", 3)}}</small>
												</li>
											</ul>
										</div>
								</div>
							@endif

							<div class="hot-page2-alp-l3 hot-page2-alp-l-com" style="min-height:139px">
								<h4><i class="fa fa-map-markers" aria-hidden="true"></i> Fare Type </h4>
								<div class="hot-page2-alp-l-com1 hot-page2-alp-p4"  style="height:100px">
									<ul>
										<li style="width: 100%; float: left; padding: 3px 0;">
                                        
                                        </label>
											<label class="containerbox" style="border:0px solid grey; font-family:'Poppins',sans-serif;font-size: 14.5px; line-height: 24px;font-family: 'Poppins', sans-serif; font-weight: 400; display: inline;">
												<input checked="checked" type="checkbox" ng-checked="true" ng-click="filter_refundable(1)">  &nbsp; Refundable
												<span class="checkmark" style=" margin: 0px 0px 0px -115px;"></span>
											</label>
											<small class="text" ng-if="filtering_flight('isrefundable', 1, 0)"><i class="fa fa-inr"></i> @{{filter_min_price("isrefundable", 1)}}</small>
										</li>
										<li  style="width: 100%; float: left; padding: 3px 0;">
											<label class="containerbox" style="border:0px solid grey; font-family:'Poppins',sans-serif; font-size: 14.5px; line-height: 24px;font-family: 'Poppins', sans-serif; font-weight: 400;display: inline; ">
												<input  checked="checked" type="checkbox" ng-checked="true" ng-click="filter_refundable(2)"> &nbsp;  Non Refundable
												<span class="checkmark" style=" margin: 0px 0px 0px -147px;"></span>
											</label>
											<small class="text1"  ng-if="filtering_flight('isrefundable', 2, 0)"><i class="fa fa-inr"></i> @{{filter_min_price("isrefundable", 2)}}</small>
										</li>
									</ul>
								</div>
							</div>

							<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
								<h4><i class="fa fa-map-markers" aria-hidden="true"></i> Airlines</h4>
                                <div class="hot-page2-alp-l-com1 hot-page2-alp-p4">
                                    <ul>
                                        <li ng-repeat="airlines_name in airlinnameshow" ng-if="filtering_flight('airlines', airlines_name, 0)">
                                            <label class="containerbox" style="border:0px solid grey; font-family:'Poppins',sans-serif;font-size: 14.5px; line-height: 24px;font-family: 'Poppins', sans-serif; font-weight: 400; "> 
												<div class="row">
													<div class="col-md-2">
														<img  ng-src="http://tbolite.tektravels.com/Images/Air/AirlineLogo_25x25/@{{airline_code_fun(airlines_name)}}.gif"/>
													</div>
													<div class="col-md-8">
														@{{airlines_name}} <small class="small-text"><i class="fa fa-inr"></i> @{{filter_min_price("airlines", airlines_name, 0)}}</small>
													</div>
													<div class="col-md-2">
														<input type="checkbox" ng-checked="true" ng-click="filter_airlines_name(airlines_name)">
														<span class="checkmark" style="margin: 0px 0px 0px -20px;"></span>
													</div>
												</div>
                                            </label>												
                                        </li>
                                    
                                    </ul>
                                </div>
							</div>
						</div>	
						<div class="col-md-9 hot-page2-alp-con-right">
							<div class="row">
								@include('air.partials.modify_flight')
							</div>
							<div class="hot-page2-alp-con-right-1 row">

								<div class="row">

									<div class="col-md-{{$ArrivalTime == '' ? 12  : 6}}" style="padding: 0 0;">
										<p style="font-size:13px;"><i class="fa fa-plane"></i> @{{origin}} to @{{destination}} - <span>@{{departure_date_formt}}</span> <br><span>@{{flights.length}} Flight Found</span></p>
										<div class="row inn-page-bg com-colo">
											<div class="col-md-12" style="margin: 0;padding: 0;">									
												<table id="myTable">
													<tbody style=" background-color: #fff;">
														<tr>
															<th class="e_h1">Airline</th>
															<th class="e_h1" style="padding: 0 20px;">Departure</th>
															<th class="e_h1" style="margin-left: 35px;display: block;">Arrival</th>
															<th class="e_h1" style="    width: 100%;padding: 10px 40px;">Price</th>
															
														</tr>
														<tr ng-repeat="flight in flights | filter:filterflights">
															<td>
																<div class="col-md-2">
																	<div class="one">
																	<input type="radio" name="from_flight" id="price_select_from_icon_@{{flight.id}}" ng-checked="$first ? true : false" ng-click="flight_from_fun(flight)" style="height: 20px; width: 20px; margin: 4px -5px -2px;">
																	</div>
																</div>
																<div class="col-md-10">
																	<div style="display: inline-flex; font-size: 11px;">
																		<div style="padding: 0 10px 0 0;"><img class="img-l"  ng-src="http://tbolite.tektravels.com/Images/Air/AirlineLogo_25x25/@{{flight.AirlineCode}}.gif"/></div>  
																		<div style="padding:0; margin:0;">@{{flight.airlineName}}<br><span style="font-size: 10px; display: inline-table;">@{{flight.AirlineCode}} - @{{flight.Segments[0][0].Airline.FlightNumber}}</span></div>
																	</div>
																</div>
																<br>
																<a data-toggle="modal" data-target="#myModal" class="" ng-click="show_details(flight.id, 0)" style="font-size:11px; ">Flight Detail</a>
															</td>
															<td>@{{flight.Segments[0][0].StopPointDepartureTime | date: 'HH:mm'}}<p style=" padding: 0;margin: 0px 0;font-size: 11px;">Non stop</p></td>
															<td style="    margin-left: 36px;  margin-top: 13px; display:block;">@{{flight.Segments[flight.Segments.length - 1][0].StopPointArrivalTime | date: 'HH:mm'}}<p style="padding: 0;margin: 0; font-size: 12px;">@{{all_duration(flight.Segments, 1)}}</p></td>

															<td>
																<a href="#" class="price_select_from" value="@{{flight.id}}" style="color:#dc2039!important;     display: inline-block;margin-top: -6px;">
																	<i class="fa fa-inr" style="font-size: 1.6rem;"></i> <b style="padding: 0px 0px;">@{{flight.price}}</b>
																	<br>
																</a>
																<small style=" font-size: 11px !important; display: block;margin-top: 1px;">@{{flight.IsRefundable ? 'Refundable' : 'Non Refundable'}}</small>
															</td>
														</tr>
													</tbody>
												</table>
												<!-- <button ng-show="hasMoreItemsToShow()" ng-click="showMoreItems()">Show more</button>  -->
											</div>
										</div>
									</div>
								
									<div class="col-md-6" style="padding:0 0;">
										<p style="font-size:13px;"><i class="fa fa-plane"></i> @{{destination}} to @{{origin}} - <span>@{{return_date_formt}}</span><br><span>@{{flightsreturns.length}} Flight Found</span></p>
										<div class="row inn-page-bg com-colo">
											<div class="col-md-12">									
												<table id="myTable">
													<tbody  style=" background-color: #fff;">
														<tr>
															<th>Airline</th>
															<th>Departure</th>
															<th style="margin-right: -15px;display: block;">Arrival</th>
															<th>Price</th>
														</tr>
														<tr ng-repeat="flight in flightsreturns | filter:filterflights">
															<td>
															<div class="col-md-2">
																<input type="radio" name="return_flight" id="price_select_return_icon_@{{flight.id}}" ng-checked="$first ? true : false" ng-click="flight_return_fun(flight)" style="height: 20px; width: 20px; margin: 4px -5px -2px;">
															</div>
															<div class="col-md-10">
																<div style="display: inline-flex; font-size: 11px; margin-left: -45px;">
																<div style="padding: 0 10px 0 0;"><img src="@{{airline_image(flight.AirlineCode)}}"/></div>  
																<div style="    margin: 0;padding: 0;">@{{flight.airlineName}}<br><span style=" font-size:12px; display: inline-table; ">@{{flight.AirlineCode}} - @{{flight.Segments[0][0].Airline.FlightNumber}}</span></div>
																</div>
															</div>
																<br>
																<a data-toggle="modal" data-target="#myModal" class="" ng-click="show_details(flight.id, 1)" style="font-size:11px;">Flight Detail</a>
															</td>
															<td>@{{flight.Segments[0][0].StopPointDepartureTime | date: 'HH:mm'}}<p style=" padding: 0;margin: 0px 0;font-size: 11px;">Non stop</p></td>
															<td style="margin-left: 13px;display: block;margin-top: 13px;">@{{flight.Segments[flight.Segments.length - 1][0].StopPointArrivalTime | date: 'HH:mm'}}  <p style="padding: 0;margin: 0; font-size: 12px;">@{{all_duration(flight.Segments, 1)}}</p></td>
															<td>
																<a href="#" class="price_select_return"  value="@{{flight.id}}" ng-click="flight_return_fun(flight)" style="color:#dc2039!important;     margin-top: 0; display: inline-block;">																	
																	<!-- <button type="button" class="btn btn-danger " value="@{{flight.id}}"  style="  color: #fff;background-color: #f4364f; border:none; padding: 5px 5px; display: flex;    margin-left: -6px;"> -->
																		<i class="fa fa-inr " style="font-size: 1.6rem;" value="@{{flight.id}}"></i> <b style="padding: 0px 0px;">@{{flight.price}}</b>
																		<!-- <br><i class="fa fa-check-circle-o price_select_return_icon " value="@{{flight.id}}" id="price_select_return_icon_@{{flight.id}}" ng-if="$first" style="margin-left:-5px; margin-top: 15px; color: #f4364f; border-radius: -6%; margin-top: 11px;"></i> -->
																		<i ng-if="!$first" class="fa fa-check-circle-o price_select_return_icon " value="@{{flight.id}}" id="price_select_return_icon_@{{flight.id}}" style="margin-left:-5px; margin-top: 15px; color: #f4364f; border-radius: -6%; margin-top: 11px; display:none;"></i>	
																	<!-- </button> -->
																	<br>
																</a>
																<small style="font-size: 11px !important;display: block;margin-top:0; ">@{{flight.IsRefundable ? 'Refundable' : 'Non Refundable'}}</small>
															</td>
														</tr>
													</tbody>
												</table>
												<!-- <button ng-show="hasMoreItemsToShow_re()" ng-click="showMoreItems_re()">Show more</button>  -->
											</div>
										</div>
									</div>
									
								</div>
			              	</div>
	                     	
	                	</div>
	                	
					</div>
					
					<div class="row" ng-if="!loading_data">
		                <div id="preloader" style="display: block;">
		                    <div id="status" style="display: block;">&nbsp;</div>
		                </div>
					</div>
 
					@include('air.partials.flight_details')
				
	        	</div>
	    	</div>
		</div>
		@if($ArrivalTime != '')
			<div class="chat-footer">
			   	<div class="container">	
			   		<div class="row footerBody">
			     		@include('air.partials.flight_from_return')
			   		</div>
		 		</div>
		 	</div>
		@endif
	</div>
</section>
	
@endsection

@section('script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angularjs-slider/6.4.3/rzslider.js"></script>
	@include('air.partials.scriptjs')
	<script>
	
	    var appdata = angular.module('flightapp', ['rzModule']);
		var flight
	    appdata.controller('flightCtrl', function($scope, $http) {
			$scope.flights = []
	        $scope.loading_data       = false
	        $scope.adult              = parseInt("{{$adult}}")
			$scope.child              = parseInt("{{$child}}")
			$scope.infant             = parseInt("{{$infant}}")
			$scope.direct             = "{{$direct}}"
			$scope.onestop            = "{{$onestop}}"
			$scope.preferredairlines  = "{{$preferredairlines}}"
			$scope.origin             = "{{$origin}}"
			$scope.destination        = "{{$destination}}"
			$scope.DepartureTime      = "{{$DepartureTime}}"
			$scope.ArrivalTime        = "{{$ArrivalTime}}"
			$scope.airlines           = []
			$scope.flightsreturns     = []
			$scope.searchfilter       = true
			$scope.airlines_names     = []
			$scope.min = 0
			$scope.max = 0
			$scope.ismulticity = false
			$scope.isreturn = $scope.ArrivalTime ? true : false
			// console.log($scope.ArrivalTime)
			var flightdata = {

				adult:             $scope.adult,
				child:             $scope.child,
				infant:            $scope.infant,
				direct:            $scope.direct,
				onestop:           $scope.onestop,
				preferredairlines: $scope.preferredairlines,
				origin:            $scope.origin,
				destination:       $scope.destination,
				DepartureTime:     $scope.DepartureTime,
				ArrivalTime:       $scope.ArrivalTime,
				class_type:        $scope.class_type

			}

			$scope.is_returntpe = function() {
				return $scope.ArrivalTime ? 'col-md-6' : 'col-md-12'
			}

			$scope.travel_date = (time) => {
				return moment(time, 'MM/DD/YYYY').format('ddd DD, MMMM')
			}

			$scope.departure_time = function(time, for_format) {
				var datehourede	
				if (for_format) {
					datehourede = moment(time).utcOffset('+05:30').format('ddd, DD MMMM, hh:mm A');
					return datehourede
				}	
				datehourede = moment(time).utcOffset('+05:30').toObject();		
				var departure_at = datehourede.hours + '.' + datehourede.minutes
				return departure_at
			}

			$http.get("/api/airlines/1").then(response => {
				$scope.airlines = response.data
			}).catch(error => {
				console.log(error)
			});
			
			// filtering  airlinename
			$scope.airlines_names = []
			$scope.filter_airlines_name = function(airline) {
				var i = $.inArray(airline, $scope.airlines_names);
				if (i > -1) {
					$scope.airlines_names.splice(i, 1);
				} else {
					$scope.airlines_names.push(airline);
				}
				return
			}

			// return airline code 

			$scope.airline_code_fun = (airline) => {
				var airline_code
				$scope.airlines.filter(flight => {
					if (flight.name == airline) {
						airline_code = flight.code
						return
					}
				});

				return airline_code
			}

			//maping flight data function

			$scope.mappingdata = function(flights) {
				flights.map((flight, i, arr) => {

					angular.forEach($scope.airlines, function(value, key){
						if (flight.AirlineCode == value.code) {
							flight['airlineName'] = value.name
						}
					});
					
					flight['id'] = i + 1
					var dep_time = $scope.departure_time(flight.Segments[0][0].StopPointDepartureTime)
					// adding dep_time_index
					if (dep_time >= 0 && dep_time <= 6) {
						flight['dep_time_cat'] = 1
					} else if(dep_time >= 6 && dep_time <= 12){
						flight['dep_time_cat'] = 2
					} else if (dep_time >= 12 && dep_time <= 18){
						flight['dep_time_cat'] = 3
					}else{
						flight['dep_time_cat'] = 4
					}
					// adding stops time
					if (flight.Segments[0].length == 1) {
						flight['stops'] = 1
					} else if(flight.Segments[0].length == 2){
						flight['stops'] = 2
					} else{
						flight['stops'] = 3
					}
					// adding fare_types

					if (flight.IsRefundable) {
						flight['fare_type'] = 1
					}else{
						flight['fare_type'] = 2
					}

					return flight
				});

				return flights;
			}
            
			// functions for returning data for booking start

				$scope.book_link_return = (from_index, return_index) => {
					var book_link_return = "{{url('/')}}/air/booking/"+ from_index + '-' + return_index + '/' + $scope.traceId+"?adult={{$adult}}&child={{$child}}&infant={{$infant}}"
					return book_link_return
				}

				$scope.flight_from_fun = (flight) => {
					$scope.flight_from_data = flight
					return 
				}

				$scope.flight_return_fun = (flight) => {
					$scope.flight_return_data = flight
					return 
				}
			//functions for returning data for booking end
			$scope.traceId = null


			// $http.get("{{url('/')}}/data/return_data.json").then(response => {
			$http.post("/api/v1/air/searchAir", flightdata).then( response => {
				$scope.traceId = response.data.data.TraceId
				$scope.flights = response.data.data.Results[0]

				$scope.departure_date_formt = moment($scope.DepartureTime, 'DD/MM/YYYY').format('ddd DD, MMMM')

				if ($scope.ArrivalTime) {
					$scope.flightsreturns = response.data.data.Results[1]
					$scope.flight_from_data = $scope.flights[0]
					$scope.flight_return_data = $scope.flightsreturns[0]
					$scope.origin_code = response.data.data.Origin
					$scope.destination_code = response.data.data.Destination
					$scope.return_date_formt = moment($scope.ArrivalTime, 'DD/MM/YYYY').format('ddd DD, MMMM')
				}
				

				$scope.loading_data = true
				$scope.flights = $scope.mappingdata($scope.flights)
				$scope.flightsreturns = $scope.mappingdata($scope.flightsreturns)
				$scope.all_datas = $scope.flights.concat($scope.flightsreturns);
							
				angular.forEach($scope.all_datas, function(value, key){				
					if(!$scope.airlines_names.includes(value.airlineName)){
						$scope.airlines_names.push(value.airlineName);
					}
				})

				$scope.airlinnameshow = angular.copy($scope.airlines_names);

				$scope.min = Math.floor(Math.min.apply(Math,$scope.all_datas.map(function(item){return item.price;}))/1000)*1000
				$scope.max = Math.ceil(Math.max.apply(Math,$scope.all_datas.map(function(item){return item.price;}))/1000)*1000

				$scope.slider = {
					minValue: $scope.min,
					maxValue: $scope.max,
					options: {
						floor: $scope.min,
						ceil: $scope.max,
						translate: function(value) {
							return value;
						}
					}
				};

			}).catch(error => {
				$scope.loading_data = true
				console.log(error)
			});
			
			// booking link
			$scope.booking_form = (index) => {
				return "{{url('/')}}/air/booking/"+index+"/"+$scope.traceId+"?adult={{$adult}}"+"&child={{$child}}"+"&infant={{$infant}}"
			}

			$scope.timing = [1, 2, 3, 4]
			// filtering timing datas
			$scope.filter_timing = function(de_index) {
				var i = $.inArray(de_index, $scope.timing);
				if (i > -1) {
					$scope.timing.splice(i, 1);
				} else {
					$scope.timing.push(de_index);
				}
				return
			}

			$scope.stops = [1, 2, 3]
			// filtering stops
			$scope.filter_stops = function(s_index) {
				var i = $.inArray(s_index, $scope.stops);
				if (i > -1) {
					$scope.stops.splice(i, 1);
				} else {
					$scope.stops.push(s_index);
				}
				return
			}

			$scope.fare_types = [1, 2]
			// filtering  fare type
			$scope.filter_refundable = function(r_index) {
				var i = $.inArray(r_index, $scope.fare_types);
				if (i > -1) {
					$scope.fare_types.splice(i, 1);
				} else {
					$scope.fare_types.push(r_index);
				}
				return
			}

			// filter functions
			$scope.filterflights = function(flights) {
				
				if ($scope.timing.length > 0) {
					// console.log($.inArray(flights.dep_time_cat, $scope.timing));
					if ($.inArray(flights.dep_time_cat, $scope.timing) < 0) {
						return;
					}
				}

				if ($scope.stops.length > 0) {
					// console.log($.inArray(flights.dep_time_cat, $scope.timing));
					if ($.inArray(flights.stops, $scope.stops) < 0) {
						return;
					}
				}

				if ($scope.fare_types.length > 0) {
					// console.log($.inArray(flights.dep_time_cat, $scope.timing));
					if ($.inArray(flights.fare_type, $scope.fare_types) < 0) {
						return;
					}
				}
                

				if ($scope.airlines_names.length > 0) {
					// console.log($.inArray(flights.dep_time_cat, $scope.timing));
					if ($.inArray(flights.airlineName, $scope.airlines_names) < 0) {
						return;
					}
				}

				if ($scope.min > 0 && $scope.max > 0 ) {
					
					return (flights.price >= $scope.slider.minValue && flights.price <= $scope.slider.maxValue)
				}

				return flights;
			}

			// load more from flight
			//
			var pagesShown = 1;
			var pageSize = 10;
			$scope.itemsLimit = function() {
				return pageSize * pagesShown;
			};
			$scope.hasMoreItemsToShow = function(flights) {
				return pagesShown < ($scope.flights.length / pageSize);
			};
			$scope.showMoreItems = function() {
				pagesShown = pagesShown + 1;         
			};
			
			//// load more return flight

			var pagesShown_re = 1;
			var pageSize_re = 10;
			$scope.itemsLimit_re = function() {
				return pageSize_re * pagesShown_re;
			};
			$scope.hasMoreItemsToShow_re = function() {
				return pagesShown_re < ($scope.flightsreturns.length / pageSize_re);
			};
			$scope.showMoreItems_re = function() {
				pagesShown_re = pagesShown_re + 1;         
			};

			// airline image 

			$scope.airline_image = function(air_linecode) {
				return "http://tbolite.tektravels.com/Images/Air/AirlineLogo_25x25/"+air_linecode + ".gif"
			}

			// airlin details function

			$scope.airline_detail = (airline, type) => {
				if (type == 'name') {
					return airline.AirlineName
				} else {
					return airline.AirlineName + ', ' + airline.AirlineCode + '-' +airline.FlightNumber
				}
			}

			$scope.flight_dep_arr_details = (destin_arrival, isdep) => {
				if (isdep == 0) {
					return '<h4 class="modal-title">'+destin_arrival.Airport.CityName+ '-' + destin_arrival.Airport.AirportCode +'</h4><p>'+$scope.departure_time(destin_arrival.DepTime, "time")+'</p><p>'+destin_arrival.Airport.AirportName+'-'+destin_arrival.Airport.Terminal+'</p>';
				}

				return '<h4 class="modal-title">'+destin_arrival.Airport.CityName+ '-' + destin_arrival.Airport.AirportCode +'</h4><p>'+$scope.departure_time(destin_arrival.ArrTime, "time")+'</p><p>'+destin_arrival.Airport.AirportName+'-'+destin_arrival.Airport.Terminal+'</p>'	
			}

			// flight details refund and all things

			$scope.flight_time_refund_details = (segment) => {
				var arrival = moment(segment.StopPointArrivalTime);
				var departure = moment(segment.StopPointDepartureTime);
				var durtime_obj = moment.duration(arrival.diff(departure))
				var duration_time = durtime_obj.get('hours') +'h ' + durtime_obj.get('minutes') + 'm'
				return '<p>'+duration_time+ ' | Non Stop |  '+ $scope.meal + ' | '+ segment.Airline.FareClass + ' | '+segment.Baggage+'</p>'
			}

			// adding duration

			$scope.all_duration = (segments, repeat) => {
			
				var dur_tim = 0
				angular.forEach(segments[0], function(segment, key){
					var arrival_f = moment(segment.StopPointArrivalTime);
					var departure_f = moment(segment.StopPointDepartureTime);
					var durtime_obj_f = moment.duration(arrival_f.diff(departure_f)).asMinutes()
					// console.log(durtime_obj_f);
					dur_tim += durtime_obj_f
				})

				if (repeat == 1) {
					var durtime = moment.duration(dur_tim * 60 * 1000)
					var durationtime =  durtime.get('hours') +'h ' + durtime.get('minutes') + 'm'

					return durationtime

				}
				return dur_tim
			}

			// filtering flights according to condition
			$scope.filtering_flight = (type, value, is_for_flight_count) => {
				var total_flights
				if (type == "stops") {
					total_flights = $scope.all_datas.filter(flight => flight.stops == value);
				} else if (type == "airlines") {
					total_flights = $scope.all_datas.filter(flight => flight.AirlineCode == $scope.airline_code_fun(value));
				} else if (type == "timing") {
					total_flights = $scope.all_datas.filter(flight => flight.dep_time_cat == value);
				} else {
					total_flights = $scope.all_datas.filter(flight => flight.fare_type === value);
				}
				if (is_for_flight_count == 1) {
					return total_flights
				} else {
					if (total_flights.length > 0) {
						return true
					} else {
						return false
					}
				}				
			}

			// finding minimum value 
			$scope.filter_min_price = (type, value) => {
				
				return Math.min.apply(Math,$scope.filtering_flight(type, value, 1).map(function(flight){return flight.price;}))
			}


			// flight details
			$scope.segments = []
			$scope.show_details = function(index, is_return) {	
				var flights	
				if (is_return == 0) {
					flights = $scope.flights.filter(flight => flight.id === index);
					$scope.origin             =  "{{$origin}}"
					$scope.destination        = "{{$destination}}"
					$scope.DepartureTime_d    = $scope.departure_date_formt
				} else {
					flights = $scope.flightsreturns.filter(flight => flight.id === index);
					$scope.origin             =  "{{$destination}}"
					$scope.destination        = "{{$origin}}"
					$scope.DepartureTime_d    = $scope.return_date_formt
				}
				flight = flights[0]
				$scope.segments = flight.Segments
				$scope.booklink = $scope.booking_form(flight.ResultIndex)
				var dur_time = moment.duration($scope.all_duration($scope.segments, 0) * 60 * 1000)
				$scope.meal = flight.meal
				$scope.duration_time =  dur_time.get('hours') +'h ' + dur_time.get('minutes') + 'm'
				$scope.stop_type = flight.stops == 1 ? 'Non Stop' : flight.stops - 1 + ' Stop'
				
				$scope.per_adult = flight.price
				$scope.flight_logo = $scope.airline_image(flight.AirlineCode)
				//$scope.airline_detail = flight.Segments[0][0].Airline.AirlineName + ', ' + flight.Segments[0][0].Airline.AirlineCode + '-' + flight.Segments[0][0].Airline.FlightNumber
				$scope.DeparturedateTime = $scope.departure_time(flight.Segments[0][0].StopPointDepartureTime, "time")
				$scope.dep_terminal = flight.Segments[0][0].Origin.Airport.AirportName + ' ' + flight.Segments[0][0].Origin.Airport.Terminal
				$scope.class = flight.Segments[0][0].Airline.FareClass
				$scope.refundable_type = flight.IsRefundable ? 'Refundable' : 'Non Refundable'
				$scope.luggage_weight = flight.Segments[0][0].Baggage
				$scope.arrivaldateTime = $scope.departure_time(flight.Segments[0][0].StopPointArrivalTime, "time")
				$scope.arr_terminal = flight.Segments[0][0].Destination.Airport.AirportName + ' ' + flight.Segments[0][0].Destination.Airport.Terminal
				$scope.passenger_service_fee = 0
				$scope.total = flight.price
				$scope.airline_name_d = flight.Segments[0][0].Airline.AirlineName
				$scope.fare_basis_code = flight.FareRules[0].FareBasisCode
				$scope.cancellation_policy = flight.FareRules[0].FareRuleDetail
				// console.log($scope.segments);
				
			}

			// modifying search

			$scope.addmore = function(){ 
				if ($scope.options.length < 4) {
					$scope.options.push('') 
				}
			} 
			
			$scope.deletef = function(index){
				if ($scope.options.length == 1) {
					$scope.ischecked = false
				}
				var indexpo = $scope.options.indexOf(index); 
				$scope.options.splice(indexpo, 1);
				
			} 

			$scope.toggle = function() {
				if ($scope.options.length > 0) {
					$scope.options = []

				}else{
					$scope.options = ['']
				}
			}

			$scope.change = "Economy"

			$scope.pasenger = $scope.adult + $scope.child + $scope.infant;

			$scope.incrementfirst = (type) => {
				
				if (type == 'adult') {
					if ($scope.adult  + $scope.child < 9) {
						$scope.adult ++
					} 

				}else if(type == 'child') {
					if ($scope.adult  + $scope.child < 9) {
						$scope.child ++ 
					}
				}else{
					if ($scope.infant < $scope.adult) {
						$scope.infant ++
					}
					
				}

				$scope.pasenger = $scope.adult + $scope.child + $scope.infant;
				return $scope.pasenger

			};

			$scope.decrementfirst =  (type) =>  {
				if (type == 'adult') {
					if ($scope.adult > 1) {
						$scope.adult --
					} 
				
				
				}else if(type == 'child') {
					if ($scope.child > 0) {
					$scope.child --
					}
					
				}else{
				if ($scope.infant > 0) {
						$scope.infant --
					}
					
				}

				$scope.pasenger = $scope.adult + $scope.child + $scope.infant;

				return $scope.pasenger
			};

			// show hide multicity
			$scope.create_multicity = (ismulticity) => {
				if (ismulticity == 1) {
					$scope.ismulticity = true
					$scope.options = ['']
				} else {
					$scope.ismulticity = false
					$scope.options = []
				}
			}

	    });

		appdata.filter('trustAsHtml',['$sce', function($sce) {
			return function(text) {
			return $sce.trustAsHtml(text);
			};
		}]);

		// $(document).on('click', 'a.book_ticket', function(){
		// 	var link = $(this).attr('herf')
		// 	console.log(link);
		// 	window.location.assign(link)
		// })
	</script>
@endsection