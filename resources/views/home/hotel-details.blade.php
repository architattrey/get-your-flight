@extends('home.layouts.app')

@section('content')
     <style>
 div#gmap {
        width: 80%;
        height: 500px;
        border:double;
 }
    </style>
	<!--====== TOUR DETAILS - BOOKING ==========-->
	<div ng-app="myApp" ng-controller="myCtrl">
	<section>
		<div class="rows banner_book" id="inner-page-title">
			<div class="container">
				<div class="banner_book_1">
					<ul>
					 @php @dd(hotel); @endphp
						<li class="dl1">Location : @{{hotel.Address}}</li>
						<li class="dl2">Price : @{{hotel.Price.PublishedPrice}}</li>
						<li class="dl3">Duration : @{{hotel.HotelPolicy}}</li>
						<li class="dl4"><a href="#">Book Now</a> </li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--====== TOUR DETAILS ==========-->
	<section>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg tb-space">
				<div class="col-md-9">
					<!--================ TOUR TITLE =============-->
					<div class="tour_head">
						<h2>@{{hotel.HotelName}} <span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span><span class="tour_rat">@{{hotel.StarRating}}</span></h2> </div>
					<!--====== TOUR DESCRIPTION ==========-->
					<div class="tour_head1">
						<h3>Description</h3>
						<p>@{{hotel.Description}}</p>
					</div>
					<!--====== ROOMS: HOTEL BOOKING ==========-->
					<div class="tour_head1 hotel-book-room">
						<h3>Photo Gallery</h3>
						<div id="myCarousel1" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators carousel-indicators-1">
								<li data-target="#myCarousel1" data-slide-to="0"><img src="@{{hotel.HotelPicture}}" alt="Chania">
								</li>
								<!-- <li data-target="#myCarousel1" data-slide-to="1"><img src="images/gallery/t2.jpg" alt="Chania">
								</li>
								<li data-target="#myCarousel1" data-slide-to="2"><img src="images/gallery/t3.jpg" alt="Chania">
								</li>
								<li data-target="#myCarousel1" data-slide-to="3"><img src="images/gallery/t4.jpg" alt="Chania">
								</li>
								<li data-target="#myCarousel1" data-slide-to="4"><img src="images/gallery/t5.jpg" alt="Chania">
								</li>
								<li data-target="#myCarousel1" data-slide-to="5"><img src="images/gallery/s6.jpg" alt="Chania">
								</li>
								<li data-target="#myCarousel1" data-slide-to="6"><img src="images/gallery/s7.jpg" alt="Chania">
								</li>
								<li data-target="#myCarousel1" data-slide-to="7"><img src="images/gallery/s8.jpg" alt="Chania">
								</li>
								<li data-target="#myCarousel1" data-slide-to="8"><img src="images/gallery/s9.jpg" alt="Chania">
								</li> -->
							</ol>
							<!-- Wrapper for slides -->
							<div class="carousel-inner carousel-inner1" role="listbox">
								<div class="item active"> <img src="images/gallery/t1.jpg" alt="Chania" width="460" height="345"> </div>
								<div class="item"> <img src="images/gallery/t2.jpg" alt="Chania" width="460" height="345"> </div>
								<div class="item"> <img src="images/gallery/t3.jpg" alt="Chania" width="460" height="345"> </div>
								<div class="item"> <img src="images/gallery/t4.jpg" alt="Chania" width="460" height="345"> </div>
								<div class="item"> <img src="images/gallery/t5.jpg" alt="Chania" width="460" height="345"> </div>
								<div class="item"> <img src="images/gallery/t6.jpg" alt="Chania" width="460" height="345"> </div>
								<div class="item"> <img src="images/gallery/t7.jpg" alt="Chania" width="460" height="345"> </div>
								<div class="item"> <img src="images/gallery/t8.jpg" alt="Chania" width="460" height="345"> </div>
								<div class="item"> <img src="images/gallery/t9.jpg" alt="Chania" width="460" height="345"> </div>
							</div>
							<!-- Left and right controls -->
							<a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev"> <span><i class="fa fa-angle-left hotel-gal-arr" aria-hidden="true"></i></span> </a>
							<a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next"> <span><i class="fa fa-angle-right hotel-gal-arr hotel-gal-arr1" aria-hidden="true"></i></span> </a>
						</div>
					</div>
					<!--====== TOUR LOCATION ==========-->
					<div class="tour_head1 tout-map map-container">
						<h3>Location</h3>
						<div  id="gmap"></div>
						<!-- <iframe id="gmap" allowfullscreen></iframe> -->
					</div>
					<!--====== ABOUT THE TOUR ==========-->
					<div class="tour_head1">
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
					</div>
					<!--====== DURATION ==========-->
					<div class="tour_head1 l-info-pack-days days">
						<h3>Detailed Day Wise Itinerary</h3>
						<ul>
							<li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
								<h4><span>Day : 1</span> Arrival and Evening Dhow Cruise</h4>
								<p>Arrive at the airport and transfer to hotel. Check-in time at the hotel will be at 2:00 PM. In the evening, enjoy a tasty dinner on the Dhow cruise. Later, head back to the hotel for a comfortable overnight stay.</p>
							</li>
							<li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
								<h4><span>Day : 2</span> City Tour and Evening Free for Leisure</h4>
								<p>After breakfast, proceed for tour of Dubai city. Visit Jumeirah Mosque, World Trade Centre, Palaces and Dubai Museum. Enjoy your overnight stay at the hotel.In the evening, enjoy a tasty dinner on the Dhow cruise. Later, head back to the hotel for a comfortable overnight stay.</p>
							</li>
							<li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
								<h4><span>Day : 3</span> Desert Safari with Dinner</h4>
								<p>Relish a yummy breakfast and later, proceed to explore the city on your own. Enjoy shopping at Mercato Shopping Mall, Dubai Mall and Wafi City. In the evening, enjoy the desert safari experience and belly dance performance. Relish a mouth-watering barbecue dinner and enjoy staying overnight in Dubai.</p>
							</li>
							<li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
								<h4><span>Day : 4</span> Day at leisure</h4>
								<p>Savour a satiating breakfast and relax for a while. Day Free for leisure. Overnight stay will be arranged in Dubai. In the evening, enjoy a tasty dinner on the Dhow cruise. Later, head back to the hotel for a comfortable overnight stay.</p>
							</li>
							<li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
								<h4><span>Day : 5</span> Departure</h4>
								<p>Fill your tummy with yummy breakfast and relax for a while. Later, check out from the hotel and proceed for your onward journey.In the evening, enjoy a tasty dinner on the Dhow cruise. Later, head back to the hotel for a comfortable overnight stay.</p>
							</li>
						</ul>
					</div>
					<div>
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
							<div class="dir-rat-inn dir-rat-review">
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
							</div>
							<!--COMMENT RATING-->
							<div class="dir-rat-inn dir-rat-review">
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
							</div>
							<!--COMMENT RATING-->
							<div class="dir-rat-inn dir-rat-review">
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
					</div>
				</div>
				<div class="col-md-3 tour_r">
					<!--====== SPECIAL OFFERS ==========-->
					<div class="tour_right tour_offer">
						<div class="band1"><img src="images/offer.png" alt="" /> </div>
						<p>Special Offer</p>
						<h4>$500<span class="n-td">
								<span class="n-td-1">$800</span>
								</span>
							</h4> <a href="#" class="link-btn">Book Now</a> </div>
					<!--====== TRIP INFORMATION ==========-->
					<div class="tour_right tour_incl tour-ri-com">
						<h3>Trip Information</h3>
						<ul>
							<li>Location :  @{{hotel.CountryName}}</li>
							<li>Arrival Date: Nov 12, 2017</li>
							<li>Departure Date: Nov 21, 2017</li>
							<li>Free Sightseeing & Hotel</li>
						</ul>
					</div>
					<!--====== PACKAGE SHARE ==========-->
					<div class="tour_right head_right tour_social tour-ri-com">
						<h3>Share This Package</h3>
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
							<li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
						</ul>
					</div>
					<!--====== HELP PACKAGE ==========-->
					<div class="tour_right head_right tour_help tour-ri-com">
						<h3>Help & Support</h3>
						<div class="tour_help_1">
							<h4 class="tour_help_1_call">Call Us Now</h4>
							<h4><i class="fa fa-phone" aria-hidden="true"></i> 10-800-123-000</h4> </div>
					</div>
					<!--====== PUPULAR TOUR PACKAGES ==========-->
					<div class="tour_right tour_rela tour-ri-com">
						<h3>Popular Packages</h3>
						<div class="tour_rela_1"> <img src="images/related1.png" alt="" />
							<h4>Dubai 7Days / 6Nights</h4>
							<p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p> <a href="#" class="link-btn">View this Package</a> </div>
						<div class="tour_rela_1"> <img src="images/related2.png" alt="" />
							<h4>Mauritius 4Days / 3Nights</h4>
							<p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p> <a href="#" class="link-btn">View this Package</a> </div>
						<div class="tour_rela_1"> <img src="images/related3.png" alt="" />
							<h4>India 14Days / 13Nights</h4>
							<p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p> <a href="#" class="link-btn">View this Package</a> </div>
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
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>


      <script>
    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope, $http) {

        $scope.index = "{{$index}}"
        $scope.code = "{{$code}}"
        $scope.hotel = null
        $http.get("/api/v1/hotel/hotelinfo/"+$scope.index+"/"+$scope.code).then( response => {

             $scope.hotel = response.data.data.HotelInfoResult.HotelDetails
            console.log(response.data.data)
          }).catch(function (error) {
             console.log(error)
        });
    });
</script>


@endsection