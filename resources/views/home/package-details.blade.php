@extends('home.layouts.app')

@section('content')
  <i class="fa fa-rupee-sign fa-2x"></i><i class="fa fa-rupee-sign fa-2x"></i><i class="fa fa-rupee-sign fa-2x"></i>
		<!--====== TOUR DETAILS - BOOKING ==========-->
	<section>
		<div class="rows banner_book" id="inner-page-title">
			<div class="container">
				<div class="banner_book_1">
					<ul>
						<li class="dl1">Seller : {{$package->seller or '-'}}</li>
						<li class="dl2">Price :&nbsp;<i class="fa fa-inr"></i>&nbsp;{{$package->package_rate or '-'}}</li>
						<li class="dl3">Duration : @php $datas = json_decode($package->itinerarys); 
						                                $days  = count($datas);
						                           @endphp
						                           @if($days == 1)
													    {{$days}}  day/  {{$days}} night
												   @else
												         {{$days}} days/ {{$days-1}} nights
												   @endif
					    </li>&nbsp;
						<li class="dl4"><a data-toggle="modal" data-target="#myModal">Book Now </li>
						<!-- <li class="dl4"><a href="{{url('/booking')}}">Book Now</a> </li> -->
					</ul>
				</div>
			</div>
		</div>
	</section>
	
	<!--======================== BANNER ======================================-->
	<section>
		<div class="rows inner_banner inner_banner_4">
			<div class="container">
				<h2><span style="color:#213d44;">{{$package->package_name or '-'}}</span></h2>
				<ul>
					<li><a href="#inner-page-title"></a>
					</li>
					
					<li><a href="#inner-page-title" class="bread-acti"></a>
					</li>
				</ul>
				<p style="color:black;">Book travel packages and enjoy your holidays with distinctive experience</p>
			</div>
		</div>
	</section>	
	<!--====== TOUR DETAILS ==========-->
<section>
	<div class="rows inn-page-bg com-colo">
		<div class="tab-content">
			<div class="container inn-page-con-bg tb-space">
				<div class="col-md-9">
				<ul class="nav nav-tabs"  id="nav" >
					<li class="active"><a data-toggle="tab" href="#home">Gallery</a></li>
					<li><a data-toggle="tab" href="#about">About</a></li> 
					<li><a data-toggle="tab" href="#Intinary">Intinary</a></li>
					<li><a data-toggle="tab" href="#Policy">Our Policy</a></li> 
					
                </ul>
					<!--====== ROOMS: HOTEL BOOKING ==========-->
				
				<div class="tour_head1 hotel-book-room" id="home">
					<h3>Photo Gallery</h3>
					<div id="myCarousel1" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						@php $images=json_decode($package->image); @endphp
						
						<ol class="carousel-indicators carousel-indicators-1">
							@foreach($images as $key => $values)
								<li data-target="#myCarousel1" data-slide-to={{$key}}><img src="http://getflights.aresedge.com/storage/{{$values}}" alt="Chania"></li>
							@endforeach
						</ol>
						<!-- Wrapper for slides -->

						<div class="carousel-inner carousel-inner1" role="listbox">
						@foreach($images as $img => $values)
							@if($img == 0)
								<div class="item active"> <img src="http://getflights.aresedge.com/storage/{{$values}}" alt="Chania" width="460" height="345"> </div>
							@else
								<div class="item"> <img src="http://getflights.aresedge.com/storage/{{$values}}"  alt="Chania" width="460" height="345"> </div>
							@endif
							@endforeach
						</div>

						<!-- Left and right controls -->
						<a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev"> <span><i class="fa fa-angle-left hotel-gal-arr" aria-hidden="true"></i></span> </a>
						<a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next"> <span><i class="fa fa-angle-right hotel-gal-arr hotel-gal-arr1" aria-hidden="true"></i></span></a>
					</div>							
				</div>
				
					<!--====== TOUR TITLE ==========-->
					<div class="about">
						<div class="tour_head">
							<h2>
								The Best of {{$package->package_name}} 
								<!-- <span class="tour_star">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-half-o" aria-hidden="true"></i>
								</span>
								<span class="tour_rat">4.5</span> -->
							</h2>
					    </div>
						<!--====== TOUR DESCRIPTION ==========-->
						<div class="tour_head1" id="#">
							<h3>Description</h3>
							<p>{{$package->trip_highlights}}</p>
						</div>
				    </div>
					<!--====== DURATION ==========-->		
					@php	$datas = json_decode($package->itinerarys); @endphp
					<div class="tour_head1 l-info-pack-days days" id="itinerary">
						<h3>Detailed Day Wise Itinerary</h3>
						<ul>
						@foreach($datas as $data)	
							<li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
								<h4><span style="font-size: 20px!important; color:black;">Day :{{$data->day}}</span> {{$data->day_title}}</h4>
									<h5 style="color:black;"><span>Day Summary : </span>{{$data->day_summary or '-'}}</h5>
									<div vlass="row">
										<div class="col-md-6">
											<h4><span style="font-size: 20px!important; color:black;">Hotel Name : </span>{{$data->hotel_name}}</h4>
										</div>
										<div class="col-md-6">
											<img src="http://getflights.aresedge.com/storage/{{$data->hotel_image}}" class="img-circle" style="height:150px; width:150px;">
										</div>
									</div>	
							</li>
						@endforeach
						</ul>
					</div>

					<!-- <div>
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
								</fieldset>
							</div>
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
							</div>
							<!--COMMENT RATING-->
							<!-- <div class="dir-rat-inn dir-rat-review">
								<div class="row">
									<div class="col-md-3 dir-rat-left"> <img src="images/reviewer/4.jpg" alt="">
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
									<div class="col-md-3 dir-rat-left"> <img src="images/reviewer/3.jpg" alt="">
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
									<div class="col-md-3 dir-rat-left"> <img src="images/reviewer/1.jpg" alt="">
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
							</div>
						</div>
					</div>-->
				</div>
				<div class="col-md-3 tour_r">
					<!--====== SPECIAL OFFERS ==========-->
					<!-- <div class="tour_right tour_offer">
						<div class="band1"><img src="images/offer.png" alt="" /> </div>
						<p>Special Offer</p>
						<h4>$500<span class="n-td">
								<span class="n-td-1">$800</span>
								</span>
							</h4> <a href="booking.html" class="link-btn">Book Now</a> </div> -->
					<!--====== TRIP INFORMATION ==========-->
					<div class="tour_right tour_incl tour-ri-com">
						<h3 style="color:red;">Trip Information</h3>
						<ul>
							<li><h5>Location :</h5><span style="color:#253d52;">{{$package->package_name}}</span>></li>
							<!-- <li>Arrival Date: Nov 12, 2017</li>
							<li>Departure Date: Nov 21, 2017</li> -->
							<li>Free Sightseeing & Hotel</li>
						</ul>
					</div>
					<!--====== PACKAGE SHARE ==========-->
					<!-- <div class="tour_right head_right tour_social tour-ri-com">
						<h3>Share This Package</h3>
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
						</ul>
					</div> -->
					<!--====== HELP PACKAGE ==========-->
					<!-- <div class="tour_right head_right tour_help tour-ri-com">
						<h3>Help & Support</h3>
						<div class="tour_help_1">
							<h4 class="tour_help_1_call">Call Us Now</h4>
							<h4><i class="fa fa-phone" aria-hidden="true"></i> 0000000000 </h4> </div>
					</div> -->
					<!--====== PUPULAR TOUR PACKAGES ==========-->
					<div class="tour_right tour_rela tour-ri-com">
						<h3>Popular Packages</h3>
						@foreach($randomlyChangePackages as $package)

						@php 
							$getDay = json_decode($package->itinerarys);
							$totalDays = count($getDay);
							$decodeImages = json_decode($package->image);
							$image = $decodeImages[0];
						@endphp
						
						<div class="tour_rela_1"> <img src="http://getflights.aresedge.com/storage/{{ $image }}" alt="{{$package->city,'s image not found'}}" />
							<h4>{{$package->city}}-&nbsp;{{$totalDays}}(Days)</h4>
							<p>{{str_limit($package->about_package, $limit = 150)}}</p> <a href="{{route('package_details',$package->slug)}}" class="link-btn">View this Package</a> </div>
						@endforeach
					</div>
				</div>
				<div class="Policy">
					<div class="row">
						<hr>
						<div class="col-md-6">
							<h3>Inclusions:</h3>
								<p>{{$package->inclusions}}</p>
						</div>
						<div class="col-md-6">
							<h3>Exclusions:</h3>
								<p>{{$package->exclusions}}</p>	
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<h3>Payment Policy:</h3>
								<p>{{$package->payment_policy}}</p>
						</div>
						<div class="col-md-6">
							<h3>Cancellation Policy:</h3>
								<p>{{$package->cancellation_policy}}</p>
						</div>
					</div>
					<hr>
					<div class="row" id="terms_conditions">
						<div class="col-md-12">
							<h3>Terms & Conditions:</h3>
								{{$package->terms_conditions}}
						</div>
					</div>	
			    </div>		
			</div>
		</div>
	</div>
</section>

<div id="myModal" class="modal fade" role="dialog">
	@include('super_admin.layouts.errors')
	@if(Session::has('flash_message'))
    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span>
		<em>{!! session('flash_message') !!}</em>
	</div> 
			@endif

	<form action="{{ route('booking_step1',$package->slug) }}" method="POST" id="packageform" name="myForm" ng-app="myApp"  ng-controller="validateCtrl">
		{!! csrf_field() !!}
		<div class="tr-regi-form v2-search-form">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>Booking by <span>Email</span></h4>
				<p>It's free and always will be.</p>
				<div class="row">
					<div class="input-field col s6">
						<input type="text" id="departure_city" name="departure_city" class="form-control"  ng-model="departure_city" value = "{{old('departure_city')}}" required>
						<label for="select-city-1">{{(isset($addDestination) ? $addDestination : 'please select your destination')}}</label>
						<br>
						<span style="color:red" ng-show="myForm.departure_city.$touched && myForm.departure_city.$invalid">This field is required.</span>
					</div>
					<div class="input-field col s6">
						<input type="text" id="customer_state" name="customer_state" class="form-control" ng-model="customer_state" value = "{{old('customer_state')}}" required>
						<label for="select-city-1">Customer State *</label>
						<br>
						<span style="color:red" ng-show="myForm.customer_state.$touched && myForm.customer_state.$invalid ">This field is required.</span>
					</div>
				</div>			
				<div class="row">
					<div class="input-field col s12">
						<!-- <input type="date" id="arrival" name="arrival" class="hasDatepicker" ng-model="arrival" required>	 -->
						<input  id="arrival"  name="arrival"  data-provide="datepicker" class="datepicker_re" type="text"  autocomplete="off" ng-model="arrival" value = "{{old('arrival')}}" required>
						<br>
						<span style="color:red" ng-show="myForm.arrival.$touched && myForm.arrival.$invalid ">Please choose date.</span>
					</div>	
				</div>
				<div class="row">
					<div class="input-field col s6">
						<input type="number" id="adult" name="adult" class="form-control" min="1"  max="3" ng-model="adult" value = "{{old('arrival')}}" required>
						<label for="from" class="">Adult</label>
						<br>
						<span style="color:red" ng-show="myForm.adult.$touched && myForm.adult.$invalid ">This field is mandatory and also want between 1 and 3 adults.</span>
						<span style="color:red" ng-show="myForm.adult.$error.min || myForm.adult.$error.max">Please enter min 1 or 3 adult</span>
					</div>
					<div class="input-field col s6">
						<input type="number" id="children" name="children" class="form-control" ng-model="children" value = "{{old('children')}}">
						<label for="to" class="">Children</label>
						<br>
						<span style="color:red" ng-show="myForm.children.$touched && myForm.children.$invalid ">This field is required.</span>
						
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
					<i class="waves-effect waves-light tourz-sear-btn v2-ser-btn waves-input-wrapper waves-input-wrapper">
						<!-- <button type="submit"  class="waves-button-input">Proceed</button></i> -->
						<input type="submit" value="Proceed" ng-click="formsubmit(myForm.$valid, myForm)"  ng-disabled="myForm.$invalid"> 
					</i> 
				</div>
		</div>
	</form>
  	</div>
</div>
@endsection
@section('script')
<script>
//============================================ JQUERY =====================================

    $(document).ready(function(){
          
		//======================================= DATE PICKER =============================
       var currentDate = $( ".datepicker_re" ).datepicker({
			    dateFormat: 'dd-mm-yy',
                autoclose: true	
        }).val();
		
        //======================================= CURRENT DATE VALIDATION =================

		$( document ).on('change', "#arrival", function(){
			var today_date = new Date();
			var given_date = $(this).val(); 
			var now = moment();
			var validDate = moment(given_date,"DD-MM-YYYY");
			if(validDate <= today_date)
			{
				swal("Date!", "You Can't Choose Earlier Date ", "error");
			
			}
       });
	   


		
					//    $('#packageform').validate({
					// 	   rules:{
					// 		departure_city:{
					// 			required:true,
					// 			maxlength:255
					// 		},
					// 		customer_state:{
					// 			required:true,
					// 			maxlength:255
					// 		},
					// 		arrival:{
					// 			required:true,
					// 			date:true
					// 		},
					// 		adult:{
					// 			required:true,
					// 			number :true,
					// 			maxlength:3,
					// 			minlength:1
					// 		},
					// 		children:{
					// 			required:true,
					// 			number :true,
					// 			maxlength:3,
					// 			minlength:1
					// 		}
					// 	   },
					// 	   messages:{
					// 		departure_city:{
					// 			required:"You cant leave Departure City empty",
					// 			maxlength:"This field contain maximum 255 characters"
					// 		},
					// 		customer_state:{
					// 			required:"You cant leave Departure City empty",
					// 			maxlength:"This field contain maximum 255 characters"
					// 		},
					// 		arrival:{
					// 			required:"You cant leave this field empty",
					// 			date:"please choose write date content"
					// 		},
					// 		adult:{
					// 			required:"You cant leave empty",
					// 			number :"Only numbers is allowed",
					// 			maxlength:"This filled will contain maximum 3 adult",
					// 			minlength:"This filled will contain minimum 1 adult"
					// 		},
					// 		children:{
					// 			required:"You cant leave empty",
					// 			number :"Only numbers is allowed",
					// 			maxlength:"This filled will contain maximum 3 adult",
					// 			minlength:"This filled will contain minimum 1 adult"
					// 		}
					// 	   },
					// 	   submitHandler: function(form) {
                    //                 form.submit();
                    //         }
					//     });
// 					 $("#nav a").click(function(e){
//                      e.preventDefault();
//                      $('html,body').scrollTo(this.hash,this.hash); 
//                      });
// });			   
	});
 	var app = angular.module('myApp', []);
     app.controller('validateCtrl', function($scope) {
      $scope.departure_city = "{{$addDestination}}";
      $scope.customer_state = 'Customer State *';
 	  $scope.arrival = 'mm/dd/yyyy';
 	  $scope.adult = 'Adult';
 	  $scope.children = 'Children';
 });

</script>
@endsection