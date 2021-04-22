@extends('home.layouts.app')

@section('css')
	<style>
		div#gmap {
				width: 80%;
				height: 500px;
				border:double;
		}
		.dl4:hover
		{
			background-color:#dc2039;
		}
    </style>
@endsection
@section('content')
    
	@php
		
        if(isset($_GET['no_of_night'])) {
	        $no_of_night = $_GET['no_of_night'];
	    }else {
		    $no_of_night = 1;
		}

		if(isset($_GET['no_of_rooms'])) {
	        $no_of_rooms = $_GET['no_of_rooms'];
	    }else {
		    $no_of_rooms = 1;
		}


		if(isset($_GET['no_of_adults'])) {
	        $no_of_adults = $_GET['no_of_adults'];
	    }else {
		    $no_of_adults = 1;
		}

		if(isset($_GET['no_of_child'])) {
	        $no_of_child = $_GET['no_of_child'];
	    }else {
		    $no_of_child = 0;
		}

		if($_GET['city'] != '') {
	        $city = $_GET['city'];
	    }else {
			$city ='';
		}

		if($_GET['check_in_date'] != '')  {
			$check_in_date = $_GET['check_in_date'];
	    }else {
		    $check_in_date = '';
		}

		if($_GET['check_out_date'] != '')  {
			$check_out_date = $_GET['check_out_date'];
	    }else {
		    $check_out_date = '';
		}

	@endphp
	<!--====== TOUR DETAILS - BOOKING ==========-->
<div ng-app="myApp" ng-controller="myCtrl">
	<section>
		<div class="rows banner_book" id="inner-page-title">
			<div class="container">
				<div class="banner_book_1">
					<ul>
						<!-- <li class="dl1"><p>Address : @{{hotel.Address}}</p></li> -->
						<span ng-if="hotel.HotelContactNo">
							<li class="dl2">Contact No : @{{hotel.HotelContactNo}}</li>
						</span>
						<span ng-if="!hotel.HotelContactNo">
						<li class="dl2">Contact No : <span style="color:red;"><b> &nbsp; No Data</b></span></li>
						</span>
						<!-- <li class="dl3">Duration : @{{hotel.HotelPolicy}}</li> -->
						<!-- <li class="dl4"><a data-toggle="modal" data-target="#myModal">Book Now </li> -->
						<li class="dl4 pull-right"><a data-toggle="modal" style="color:white!important;" href="#chooseroomdiv">Choose Room</a> </li>

					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--====== TOUR DETAILS ==========-->
	<section>
		<div class="rows inn-page-bg com-colo" ng-if="!loading_data">
			<div class="container inn-page-con-bg tb-space" style="margin-top:-85px;">
				<div class="row">	
					<div class="col-md-9">
					<!--================ TOUR TITLE =============-->
						<div class="tour_head">
							<h2>@{{hotel.HotelName}} 
								<span class="tour_star">
									<i class="fa fa-star" aria-hidden="true" ng-repeat="n in range(hotel.StarRating)"></i>
								</span>
								<span class="tour_rat">@{{hotel.StarRating}}</span>
							</h2>
							<p>@{{hotel.Address}}</p>
						</div>
						<!--====== ROOMS: HOTEL BOOKING ==========-->
						<div class="tour_head1 hotel-book-room">
							<h3>Photo Gallery</h3>
							<div id="myCarousel1" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators carousel-indicators-1">
									<li data-target="#myCarousel1" ng-repeat="image in hotel.Images" data-slide-to="@{{$index}}"><img src="@{{image}}" alt="Chania">
									</li>
								</ol>
		
								<!-- Wrapper for slides -->
								<div class="carousel-inner carousel-inner1" role="listbox">
									<div class="item @{{$index == 0 ? 'active' : ''}}" ng-repeat="image in hotel.Images"><img src="@{{image}}" alt="Chania" width="460" height="450"></div>
									<!-- <div class="item" ng-else> <img src="#" alt="Chania" width="460" height="345"> <img src="@{{image}}" alt="Chania" width="460" height="345"></div> -->				
								</div>
								
								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev"> <span><i class="fa fa-angle-left hotel-gal-arr" aria-hidden="true"></i></span> </a>
								<a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next"> <span><i class="fa fa-angle-right hotel-gal-arr hotel-gal-arr1" aria-hidden="true"></i></span> </a>
							</div>
						</div>
						<hr>
					</div>
					<div class="col-md-3 tour_head1 hotel-book-room">
						<button type="button" class="btn btn-light pull-right" style="background-color:#ccc; color:black; text-transform: capitalize; margin-top: -15px; margin-right:-9px;" data-toggle="modal" data-target="#myModal2"><i class="fa fa-search" aria-hidden="true"></i> Modify Search</button>
						<h3>Price<span ng-repeat="hotelRoom in hotelRooms | limitTo : 1" style="font-size:20px;">&nbsp;<b> <i class="fa fa-inr"></i> @{{hotelRoom.Price.PublishedPrice}}</b></span></h3>
						<h5><b style="padding:49px;">Price for 1 night</b></h5>
						<hr>
						<h5>InfoSource:-<span ng-repeat="hotelRoom in hotelRooms | limitTo : 1"> @{{hotelRoom.InfoSource}}</span></h5>
						<hr>		
						<h5>Last Cancellation Date:-<span ng-repeat="hotelRoom in hotelRooms | limitTo : 1"> @{{hotelRoom.LastCancellationDate}}</span></h5>						
						<hr>
						<h5>Room Type:-<span ng-repeat="hotelRoom in hotelRooms | limitTo : 1"> @{{hotelRoom.RoomTypeName}}</span></h5>												
						<hr>
						<h5>Room Promotion:-
							<div ng-if="hotelRooms.RoomPromotion.length > 0">
								<span ng-repeat="hotelRoom in hotelRooms | limitTo : 1"> @{{hotelRoom.RoomPromotion}}</span>																		
							</div>	
							<div ng-if="!hotelRooms.RoomPromotion.length > 0">
								<span>No Data</span>
							</div>
						</h5>
						<hr>		
					</div>
				</div>	
					<!--====== HOTEL DESCRIPTION ==========-->
				<div class="row">
					<div class="col-md-12" style="margin-top: -35px;">
						<div class="tour_head1">
							<h3>Overview</h3>
							<div  ng-bind-html="hotel.Description|trustAsHtml" style="text-align:justify;">
							</div>
						</div>
						<hr>
						<!--=========== HOTEL DETAILS=========-->
						<div class="row tour_head1" style="margin-top: -35px;">
							<h3>Hotel Details</h3>
							<div class="row" style="margin-top:-40px;">
								<div class="col-md-4">	
									<h3 style="background:white; padding:0px;">Facilities</h3>
									<p ng-repeat="HotelFacility in hotel.HotelFacilities| limitTo : 5">@{{HotelFacility}}</p>
									<span ng-if="hotel.HotelFacilities.length > 5">
										<button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal1">More</button>						
									</span>
									<span ng-if="!Hotehotel.HotelFacilitieslFacility.length > 5">
										
									</span>
								</div>
								<div class="col-md-4">
									<h3 style="background:white; padding:0px;">Policies</h3>
									<div ng-if="hotel.HotelPolicy.length > 0">	
										<p style="text-align:justify;">@{{hotel.HotelPolicy}}</p>
									</div>
									<div ng-if="!hotel.HotelPolicy.length > 0">
										<h4>No Data</h4>									
									</div>
								</div>
								<div class="col-md-4">
									<h3 style="background:white; padding:0px;">Attractions</h3>
									<div ng-if="hotel.Attractions.length > 0">
										<span ng-repeat="Attraction in hotel.Attractions">
											<p ng-bind-html="Attraction.Value|trustAsHtml"></p>
										</span>
									</div>
									<div ng-if="!hotel.Attractions.length > 0">
										<h4>No Data</h4>
									</div>	 
								</div>
							</div>
							<hr>	
						</div>
						<!--=======ROOM DETAILS=========-->
						<div class="row tour_head1 tout-map map-container" style="margin-top: -35px;">
							<h3>Room Details</h3>
							<div class="row" ng-repeat="hotelroom in hotelRooms" style="margin: 10px; border: 1px solid #E2E2E2; box-shadow: 0 0 2px 0 rgba(0,0,0,0.15);"> <!--===from angular function(hotelRooms)====-->
								<div class="col-md-2">
									<b>Amenity</b></br>
									<div ng-if="hotelroom.Amenities.length > 0">
										<span ng-repeat="Amenity in hotelroom.Amenities"><i class="fa fa-check" style="color: #7f7f7f;"></i> @{{Amenity}}</span>
 									</div>
									<div ng-if="!hotelroom.Amenities.length > 0">
 										<h5>No Data</h5>
 									</div>
								</div>
								<!-- <div class="col-md-2" ng-repeat="CancellationPolicy in hotelroom.CancellationPolicies">
								@{{CancellationPolicy.Charge}} 
								</div>-->
								<div class="col-md-2">
									<b>Inclusions</b><br>
									<div ng-if="hotelroom.Inclusion.length > 0">
										<span ng-repeat="Inclusion in hotelroom.Inclusion"><i class="fa fa-check" style="color: #7f7f7f;"></i> @{{Inclusion}}</span>
 									</div>
									<div ng-if="!hotelroom.Inclusion.length > 0">
										<h5>No Data</h5>
									</div>
								</div>
								<div class="col-md-3">
								<b>CancellationPolicies</b></br>
									<!-- @{{hotelroom.CancellationPolicy}} -->
									<p style="text-align:justify;" ng-bind-html="hotelroom.CancellationPolicy|trustAsHtml"></p> 
								</div>
								<div class="col-md-2 col-md-offset-1">
									<b>Price for 1 night:</b>
									<h3 style="background:white; padding:0px; margin-top:30px!important;"><i class="fa fa-inr"></i> @{{hotelroom.Price.PublishedPrice}}</h3>
								</div>
								<div class="col-md-2">
								<!-- <button type="button" style="background-color:#dc2039;" class="btn btn-danger">Book Now</button> -->
								<a href="{{url('/')}}/hotel/blockroom/{{$index}}/@{{hotelroom.RoomIndex}}/{{$code}}/{{$traceid}}" target="_blank" style="background-color:#dc2039; margin-top: 45px;" class="btn btn-danger">Book Now</a>
								</div>
							</div>
						</div>
						
						<!--====== TOUR LOCATION ==========-->
						<div class="row tour_head1 tout-map map-container" style="margin-bottom: -300px;">
							<h3>Location</h3>
							<div  id="gmap"></div>
							<iframe id="gmap" allowfullscreen></iframe>
						</div>
						<!--====== ABOUT THE TOUR ==========-->
						<!-- <div class="row tour_head1">
							<h3>About The Tour</h3>
							<table>
								<tr>
									<th>Places covered</th>
									<th class="event-res">Inclusions</th>
									<th class="event-res">Exclusions</th>
									<th>Event Date</th>
								</tr>
								<tr>
									<td>Rio De Janeiro ,Brazil</td>
									<td class="event-res">Accommodation</td>
									<td class="event-res">Return Airfare & Taxes</td>
									<td>Nov 12, 2017</td>
								</tr>
								<tr>
									<td>Iguassu Falls </td>
									<td class="event-res">8 Breakfast, 3 Dinners</td>
									<td class="event-res">Arrival & Departure transfers</td>
									<td>Nov 14, 2017</td>
								</tr>
								<tr>
									<td>Peru,Lima </td>
									<td class="event-res">First-class Travel</td>
									<td class="event-res">travel insurance</td>
									<td>Nov 16, 2017</td>
								</tr>
								<tr>
									<td>Cusco & Buenos Aires </td>
									<td class="event-res">Free Sightseeing</td>
									<td class="event-res">Service tax of 4.50%</td>
									<td>Nov 18, 2017</td>
								</tr>
							</table>
						</div> -->
					</div>
				</div>	
					<!---===================CHOOSE ROOM DIV ===========---->
					
					<!-- <div class="row">
						<div class="dir-rat">
							<div class="dir-rat-inn dir-rat-title">
								<h3>Write Your Rating Here</h3>
								<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
								<fieldset class="rating">
									<input type="radio" id="star5" name="rating" value="5" />
									<label class="full" for="star5" title="Awesome - 5 stars"></label>
									<input type="radio" id="star4half" name="rating" value="4 and a half" />
									<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
									<input type="radio" id="star4" name="rating" value="4" />
									<label class="full" for="star4" title="Pretty good - 4 stars"></label>
									<input type="radio" id="star3half" name="rating" value="3 and a half" />
									<label class="half" for="star3half" title="Meh - 3.5 stars"></label>
									<input type="radio" id="star3" name="rating" value="3" />
									<label class="full" for="star3" title="Meh - 3 stars"></label>
									<input type="radio" id="star2half" name="rating" value="2 and a half" />
									<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
									<input type="radio" id="star2" name="rating" value="2" />
									<label class="full" for="star2" title="Kinda bad - 2 stars"></label>
									<input type="radio" id="star1half" name="rating" value="1 and a half" />
									<label class="half" for="star1half" title="Meh - 1.5 stars"></label>
									<input type="radio" id="star1" name="rating" value="1" />
									<label class="full" for="star1" title="Sucks big time - 1 star"></label>
									<input type="radio" id="starhalf" name="rating" value="half" />
									<label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
								</fieldset> -->
							<!-- </div>
							<div class="dir-rat-inn">
								<form class="dir-rat-form">
									<div class="form-group col-md-6 pad-left-o">
										<input type="text" class="form-control" id="email11" placeholder="Enter Name"> </div>
									<div class="form-group col-md-6 pad-left-o">
										<input type="number" class="form-control" id="email12" placeholder="Enter Mobile"> </div>
									<div class="form-group col-md-6 pad-left-o">
										<input type="email" class="form-control" id="email13" placeholder="Enter Email id"> </div>
									<div class="form-group col-md-6 pad-left-o">
										<input type="text" class="form-control" id="email14" placeholder="Enter your City"> </div>
									<div class="form-group col-md-12 pad-left-o">
										<textarea placeholder="Write your message"></textarea>
									</div>
									<div class="form-group col-md-12 pad-left-o">
										<input type="submit" value="SUBMIT" class="link-btn"> </div>
								</form>
							</div> -->
							<!--COMMENT RATING-->
							<!-- <div class="dir-rat-inn dir-rat-review">
								<div class="row">
									<div class="col-md-3 dir-rat-left"> <img src="/images/reviewer/4.jpg" alt="">
										<p>Orange Fab & Weld <span>19th January, 2017</span> </p>
									</div>
									<div class="col-md-9 dir-rat-right">
										<div class="dir-rat-star"> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </div>
										<p>Michael & his team have been helping us with our eqiupment finance for the past 5 years - I think that says a quite a lot.. Michael is always ready to go the extra mile, always available, always helpfull that goes the same for his team that work with him - definatley our first phone call.</p>
										<ul>
											<li><a href="#"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
											<li><a href="#"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
											<li><a href="#"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
											<li><a href="#"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
											<li><a href="#"><span>Share Now</span>  <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
											<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
											<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
											<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
											<li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
										</ul>
									</div>
								</div>
							</div> -->
							<!--COMMENT RATING-->
							<!-- <div class="dir-rat-inn dir-rat-review">
								<div class="row">
									<div class="col-md-3 dir-rat-left"> <img src="/images/reviewer/3.jpg" alt="">
										<p>Orange Fab & Weld <span>19th January, 2017</span> </p>
									</div>
									<div class="col-md-9 dir-rat-right">
										<div class="dir-rat-star"> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </div>
										<p>Michael & his team have been helping us with our eqiupment finance for the past 5 years - I think that says a quite a lot.. Michael is always ready to go the extra mile, always available, always helpfull that goes the same for his team that work with him - definatley our first phone call.</p>
										<ul>
											<li><a href="#"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
											<li><a href="#"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
											<li><a href="#"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
											<li><a href="#"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
											<li><a href="#"><span>Share Now</span>  <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
											<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
											<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
											<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
											<li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
										</ul>
									</div>
								</div>
							</div> -->
							<!--COMMENT RATING-->
							<!-- <div class="dir-rat-inn dir-rat-review">
								<div class="row">
									<div class="col-md-3 dir-rat-left"> <img src="/images/reviewer/1.jpg" alt="">
										<p>Orange Fab & Weld <span>19th January, 2017</span> </p>
									</div>
									<div class="col-md-9 dir-rat-right">
										<div class="dir-rat-star"> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </div>
										<p>Michael & his team have been helping us with our eqiupment finance for the past 5 years - I think that says a quite a lot.. Michael is always ready to go the extra mile, always available, always helpfull that goes the same for his team that work with him - definatley our first phone call.</p>
										<ul>
											<li><a href="#"><span>Like</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>
											<li><a href="#"><span>Dis-Like</span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> </li>
											<li><a href="#"><span>Report</span> <i class="fa fa-flag-o" aria-hidden="true"></i></a> </li>
											<li><a href="#"><span>Comments</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>
											<li><a href="#"><span>Share Now</span>  <i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
											<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
											<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
											<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
											<li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
										</ul>
									</div>
								</div>
							</div> -->
						<!-- </div>
					</div> -->
			</div>
 		</div>
		 <div class="row" ng-if="loading_data">
			<div id="preloader" style="display: block;">
				<div id="status" style="display: block;">&nbsp;</div>
			</div>
		</div>

		@include('hotel.modify-hotel')
		<!--=========================== BOOK NOW MODAL =================--> 
            
		<div id="myModal" class="modal fade" role="dialog">
			@include('super_admin.layouts.errors')
			@if(Session::has('flash_message'))
				<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span>
				<em>{!! session('flash_message') !!}</em></div> 
			@endif

			<form action="" method="POST" id="packageform" name="myForm">
				<!-- {!! csrf_field() !!} -->
				<div class="tr-regi-form v2-search-form">
					<h4>Booking by <span>Email</span></h4>
					<p>It's free and always will be.</p>
						<div class="row">
							<div class="input-field col s6">
								<input type="text" id="departure_city" name="departure_city" class="form-control"  ng-model="departure_city"  required>
								<label for="select-city-1">please select your destination</label>
								<br>
								<span style="color:red" ng-show="myForm.departure_city.$touched && myForm.departure_city.$invalid">This field is required.</span>
							</div>
							<div class="input-field col s6">
								<input type="text" id="customer_state" name="customer_state" class="form-control" ng-model="customer_state" required>
								<label for="select-city-1">Customer State *</label>
								<br>
								<span style="color:red" ng-show="myForm.customer_state.$touched && myForm.customer_state.$invalid ">This field is required.</span>
							</div>
						</div>			
						<div class="row">
							<div class="input-field col s12">
								<input type="date" id="arrival" name="arrival" class="hasDatepicker" ng-model="arrival" required>
								<br>
								<span style="color:red" ng-show="myForm.arrival.$touched && myForm.arrival.$invalid ">Please choose date.</span>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
								<input type="number" id="adult" name="adult" class="form-control" min="1"  max="3" ng-model="adult" required>
								<label for="from" class="">Adult</label>
								<br>
								<span style="color:red" ng-show="myForm.adult.$touched && myForm.adult.$invalid ">This field is mandatory and also want between 1 and 3 adults.</span>
								<!-- <span style="color:red" ng-show="myForm.adult.$error.min || myForm.adult.$error.max">Please enter min 1 or 3 adult</span> -->
							</div>
							<div class="input-field col s6">
								<input type="number" id="children" name="children" class="form-control" ng-model="children">
								<label for="to" class="">Children</label>
								<br>
								<span style="color:red" ng-show="myForm.children.$touched && myForm.children.$invalid ">This field is required.</span>
								
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<i class="waves-effect waves-light tourz-sear-btn v2-ser-btn waves-input-wrapper">
								<!-- <button type="submit"  class="waves-button-input">Proceed</button></i> -->
								<input type="submit" value="Proceed" class="waves-button-input" ng-click="formsubmit(myForm.$valid, myForm)"  ng-disabled="myForm.$invalid"> </i> 
							</div>
						</div>
				</div>	
			</form>	
		</div>

	<!--=========== HOTEL DETAILS Model=========-->
			<div class="modal fade" id="myModal1" role="dialog">
				<div class="modal-dialog">
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Facilities</h4>
						</div>
						<div class="modal-body">
						<p ng-repeat="HotelFacility in hotel.HotelFacilities">@{{HotelFacility}}</p>
						</div>
					</div>
				</div>
			</div>

	</section>
	<input type="hidden" id="lat" value="@{{hotel.Latitude}}">
 	<input type="hidden" id="long" value="@{{hotel.Longitude}}">  
</div>

 <!-- ===================== MAP JAVASCRIPT==================== -->
 <script type="text/javascript"
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6v5-2uaq_wusHDktM9ILcqIrlPtnZgEk&sensor=false">
</script>

  	<script type="text/javascript">

    function initialize() {
		var longitude = document.getElementById("long").value;
		var latitude = document.getElementById("lat").value;

        // var myLatlng = new google.maps.LatLng(52.317139, 4.673502);
        var myLatlng = new google.maps.LatLng( latitude, longitude,);
        var myOptions = {
            zoom:7,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById("gmap"), myOptions);
        // marker refers to a global variable
        marker = new google.maps.Marker({
            position: myLatlng,
            map: map
        });
        // if center changed then update lat and lon document objects
        google.maps.event.addListener(map, 'center_changed', function () {
            var location = map.getCenter();
            document.getElementById("lat").innerHTML = location.lat();

            document.getElementById("lon").innerHTML = location.lng();
            // call function to reposition marker location
            placeMarker(location);
        });
        // if zoom changed, then update document object with new info
        google.maps.event.addListener(map, 'zoom_changed', function () {
            zoomLevel = map.getZoom();
            document.getElementById("zoom_level").innerHTML = zoomLevel;
        });
        // double click on the marker changes zoom level
        google.maps.event.addListener(marker, 'dblclick', function () {
            zoomLevel = map.getZoom() + 1;
            if (zoomLevel == 20) {
                zoomLevel = 10;
            }
            document.getElementById("zoom_level").innerHTML = zoomLevel;
            map.setZoom(zoomLevel);
        });

        function placeMarker(location) {
            var clickedLocation = new google.maps.LatLng(location);
            marker.setPosition(location);
        }
    }
  	 window.onload = function(){
        //time is set in milliseconds
        setTimeout(function(){ initialize() }, 10000)
    };

</script>


	<!-- ====== TIPS BEFORE TRAVEL ========== -->


      <script>
		var appdata = angular.module('myApp', []);
		appdata.controller('myCtrl', function($scope, $http) {

			$scope.index = "{{$index}}"
			$scope.code = "{{$code}}"
			$scope.traceid = "{{$traceid}}"
			$scope.loading_data = true

			$scope.range = function(count){

				var ratings = []; 

				for (var i = 0; i < count; i++) { 
					ratings.push(i) 
				} 

				return ratings;
			}

			$scope.hotelRoomDetails = () => {
				
				$http.get("/api/v1/hotel/hotel_room_info/"+$scope.index+"/"+$scope.code+"/"+$scope.traceid).then( response => {
					$scope.hotelRooms = response.data.data.GetHotelRoomResult.HotelRoomsDetails
					$scope.loading_data = false
					// console.log(response.data.data)
				}).catch(function (error) {
					console.log(error)
					$scope.loading_data = false
				})

			}

		
			$scope.hotel = null
			$http.get("/api/v1/hotel/hotelinfo/"+$scope.index+"/"+$scope.code+"/"+$scope.traceid).then( response => {
				$scope.hotel = response.data.data.HotelInfoResult.HotelDetails
				$scope.hotelRoomDetails()
				console.log($scope.hotel)
				// console.log(response.data.data)
			}).catch(function (error) {
				console.log(error)				
			});	
		});

		appdata.filter('trustAsHtml',['$sce', function($sce) {
			return function(text) {
			return $sce.trustAsHtml(text);
			};
		}]);

 //============================================== VALIDATION CONTROLLER OF ANGULAR FOR booking MODAL ==========================
</script>
@endsection