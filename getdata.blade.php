@extends('home.layouts.app')

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


	@if($check_in_date == '' or $city == '')
		<script type="text/javascript">
			window.location = "{{ url('/') }}";//here double curly bracket
		</script>
	@endif

	<section class="hot-page2-alp hot-page2-pa-sp-top all-hot-bg"  ng-app="myApp" ng-controller="myCtrl">
		<div class="container">
			<div class="row inner_banner inner_banner_3 bg-none">
				<div class="hot-page2-alp-tit">
					<h1>Hotel & Restaurants in Vancouver </h1>
					<ul>
						<li><a href="#inner-page-title">Home</a> </li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
						<li><a href="#inner-page-title" class="bread-acti">Hotels & Restaurants</a> </li>
						<br>
						<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Modify</button>
					</ul>
					<p>World's leading Hotel Booking website,Over 30,000 Hotel rooms worldwide. </p>
				</div>
			</div>
			<div class="row">
				<div class="hot-page2-alp-con">
					<!--LEFT LISTINGS-->
					<div class="col-md-3 hot-page2-alp-con-left">
						<!--PART 1 : LEFT LISTINGS-->
						<div class="hot-page2-alp-con-left-1">
							<h3>Suggesting Hotels</h3> </div>
						<!--PART 2 : LEFT LISTINGS-->
						<div class="hot-page2-hom-pre hot-page2-alp-left-ner-notb">
							<ul>
								<!--LISTINGS-->
								<li ng-repeat="hotel in hotels  | orderBy:'-StarRating'" ng-if="$index < 5">
									<a href="#">
										<div class="hot-page2-hom-pre-1 hot-page2-alp-cl-1-1"> <img src="images/hotels/1.jpg" alt=""> </div>
										<div class="hot-page2-hom-pre-2 hot-page2-alp-cl-1-2">
											<h5>@{{hotel.HotelName}}</h5> <span>City: @{{hotels.city}}</span> </div>
										<div class="hot-page2-hom-pre-3 hot-page2-alp-cl-1-3"> <span>@{{hotel.StarRating}}</span> </div>
									</a>
								</li>
								<!--LISTINGS-->
								
							</ul>
						</div>
						<!--PART 7 : LEFT LISTINGS-->
						<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
							<h4><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Room Available Check</h4>
							<div class="hot-page2-alp-l-com1 hot-room-ava-check">
								<ul>
									<li>
										<label>Enter Your City</label>
										<input type="text" placeholder="Enter City"> </li>
									<li>
										<label>Depart Date</label>
										<input type="date"> </li>
									<li>
										<label>Return Date</label>
										<input type="date"> </li>
									<li>
										<input type="submit" value="SUBMIT"> </li>
								</ul>
							</div>
						</div>
						<!--PART 4 : LEFT LISTINGS-->
						<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
							<h4><i class="fa fa-map-marker" aria-hidden="true"></i> Select City & Country</h4>
							<div class="hot-page2-alp-l-com1 hot-page2-alp-p4">
								<ul>
									<li ng-repeat="hotel in hotels" ng-if="$index < 5">
										<div class="checkbox checkbox-info checkbox-circle">
											<input  class="styled" type="checkbox" checked="">
											<label for="chp41">  @{{hotel.HotelName}} </label>
										</div>
									</li>
								</ul>
							<!-- <a href="javascript:void(0);" class="hot-page2-alp-p4-btn-s">view more</a>  -->
							</div>
						</div>
						<!--END PART 4 : LEFT LISTINGS-->
						<!--PART 5 : LEFT LISTINGS-->
					<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
						<h4><i class="fa fa-dollar" aria-hidden="true"></i> Select Price Range</h4>
						<div class="hot-page2-alp-l-com1 hot-page2-alp-p5">
								<ul>
									<li ng-repeat="hotel in hotels " ng-if="$index < 5">
										<div class="checkbox checkbox-info checkbox-circle">
											<input id="chp71" class="styled" type="checkbox"/>
											<label for="chp51"> @{{min}} - @{{max}}</label>
										</div>
									</li>
								</ul>
							<!-- <a href="javascript:void(0);" class="hot-page2-alp-p5-btn-s">view more</a> -->
						</div>
					</div>
					
					<div class="checkbox">
						<label><input type="checkbox" value="">Option 1</label>
					</div>
<br>
						<!--END PART 5 : LEFT LISTINGS-->
						<div class="checkbox" ng-repeat="rating in ratings">
							<label>
								<input type="checkbox" ng-checked="true"  ng-click="filter_rating(rating.id)">@{{rating.id}}
								<!-- <i class="fa fa-star" aria-hidden="true" ng-repeat="starr in rating.stars"></i> -->
							</label>
						</div>
						<!--PART 6 : LEFT LISTINGS-->
						<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
							<h4><i class="fa fa-star-o" aria-hidden="true"></i> Select Ratings</h4>
							<div class="hot-page2-alp-l-com1 hot-page2-alp-p5">
								<ul>

									
									<li><input type="checkbox" name="one"></li>
									<li><input type="checkbox" name="two"></li>
									<li><input type="checkbox" name="three"></li>
									<li><input type="checkbox" name="four"></li>
									<li><input type="checkbox" name="five"></li>
								</ul>
								<!-- <a href="javascript:void(0);" class="hot-page2-alp-p5-btn-s">view more</a> -->
						  </div>
						</div>
						<!--END PART 5 : LEFT LISTINGS-->

						<!--PART 6 : LEFT LISTINGS-->
						<div class="hot-page2-alp-l3 hot-page2-alp-l-com">
							<h4><i class="fa fa-heart-o" aria-hidden="true"></i> Hotel Amenities</h4>
							<div class="hot-page2-alp-l-com1 hot-page2-alp-p5">
									<ul>
										<li>
											<div class="checkbox checkbox-info checkbox-circle">
												<input id="chp71" class="styled" type="checkbox" checked="">
												<label for="chp71"> Swimming pools </label>
											</div>
										</li>
										<li>
											<div class="checkbox checkbox-info checkbox-circle">
												<input id="chp72" class="styled" type="checkbox">
												<label for="chp72"> Wi-Fi & Computer </label>
											</div>
										</li>
										<li>
											<div class="checkbox checkbox-info checkbox-circle">
												<input id="chp73" class="styled" type="checkbox">
												<label for="chp73"> Kitchen facilities </label>
											</div>
										</li>
										<li>
											<div class="checkbox checkbox-info checkbox-circle">
												<input id="chp74" class="styled" type="checkbox">
												<label for="chp74"> Music & GYM </label>
											</div>
										</li>
										<li>
											<div class="checkbox checkbox-info checkbox-circle">
												<input id="chp75" class="styled" type="checkbox">
												<label for="chp75"> Dining </label>
											</div>
										</li>
									</ul>
								 <!-- <a href="javascript:void(0);" class="hot-page2-alp-p5-btn-s">view more</a>  -->
								 </div>
						</div>
						<!--END PART 7 : LEFT LISTINGS-->
					</div>
					<!--END LEFT LISTINGS-->
					<!--RIGHT LISTINGS-->
					<div class="col-md-9 hot-page2-alp-con-right" ng-if="!loading_data">
						<div class="hot-page2-alp-con-right-1">

							<!--LISTINGS-->
							<div class="row"  ng-repeat="hotel in hotels">
								<!--LISTINGS START-->
								<div class="hot-page2-alp-r-list">
									<div class="col-md-3 hot-page2-alp-r-list-re-sp">
										<a href="javascript:void(0);">
											<div class="hotel-list-score">@{{hotel.StarRating}}</div>
											<div class="hot-page2-hli-1"> <img src="@{{hotel.HotelPicture}}" alt=""> </div>
											<!-- <div class="hom-hot-av-tic hom-hot-av-tic-list"> Available Rooms: 42 </div> -->
										</a>
									</div>
									<div class="col-md-6">
										<div class="hot-page2-alp-ri-p2"> <a href="@{{link_gen(hotel.ResultIndex, hotel.HotelCode)}}"><h3>@{{hotel.HotelName}}</h3></a>
											<ul>
												<li>@{{hotel.HotelAddress}}</li>
												
												<li>Contact Number :@{{hotel.HotelContactNo}}</li>

											</ul>
										</div>
									</div>
									<div class="col-md-3">
										<div class="hot-page2-alp-ri-p3">
											<!-- <div class="hot-page2-alp-r-hot-page-rat">25%Off</div>  --><span class="hot-list-p3-1">Price Per Night</span> <span class="hot-list-p3-2">@{{hotel.Price.PublishedPrice}}</span><span class="hot-list-p3-4">
											<a href="@{{link_gen(hotel.ResultIndex, hotel.HotelCode)}}"class="hot-page2-alp-quot-btn">Book Now</a>
											</span> </div>
									</div>
								</div>
								<!--END LISTINGS-->
								<!--LISTINGS START-->
									<div ng-mode="x in name">
									</div>
								</div>
						</div>
					</div>

					<div class="col-md-9 hot-page2-alp-con-right" ng-else>
						
					<div ng-hide="myVar">
						<h2>loading ...</h2>
					</div>
					<div ng-show="myVar2">
						<h2>No Data Found Please Try Another Date</h2>
					</div>

						
					</div>
					<!--END RIGHT LISTINGS-->
				</div>
			</div>
		</div>

		
	</section>

						<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	@include('super_admin.layouts.errors')
		@if(Session::has('flash_message'))
			<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span>
			<em>{!! session('flash_message') !!}</em></div> 
		@endif

			<div class="container">
		      <form class="v2-search-form" action="/gethoteldata"> 
                                    <div class="row">
									    <div class="input-field col s2">
                                            <input type="text" id="selectcity" value="{{$city}}" name="city" class="autocompletbbbe" placeholder="City, Destination and Hotel Name">
                                            <!-- <label for="select-city">City, Destination and Hotel Name</label> -->
                                        </div>
                                        <div class="input-field col 2">
                                            <input type="text" id="checkin" value="{{$check_in_date}}" name="check_in_date">
                                            <label for="from">Check In</label>
                                        </div>
                                        <div class="input-field col s2">
                                            <input type="text" id="checkout" value="" name="check_out_date">
                                            <label for="to">Check Out</label>
                                        </div>
										<div class="input-field col s1">
                                            <select name="no_of_adults">
                                            <option value="" disabled selected>{{$no_of_adults}}</option>
                                            <option value="{{$no_of_adults == "1" ? 'selected' : '-'}}">1</option>
                                            <option value="{{$no_of_adults == "2" ? 'selected' : '-'}}">2</option>
                                            <option value="{{$no_of_adults == "3" ? 'selected' : '-'}}">3</option>
                                            <option value="{{$no_of_adults == "4" ? 'selected' : '-'}}">4</option>
                                            <option value="{{$no_of_adults == "5" ? 'selected' : '-'}}">5</option>
                                            <option value="{{$no_of_adults == "6" ? 'selected' : '-'}}">6</option>
                                            </select>
                                        </div>
										<div class="input-field col s1">
                                            <select name="no_of_child">
                                            <option value="" disabled selected>{{$no_of_child}}</option>
                                            <option value="{{$no_of_child == "1" ? 'selected' : '-'}}">1</option>
                                            <option value="{{$no_of_child == "2" ? 'selected' : '-'}}">2</option>
                                            <option value="{{$no_of_child == "3" ? 'selected' : '-'}}">3</option>
                                            <option value="{{$no_of_child == "4" ? 'selected' : '-'}}">4</option>
                                            <option value="{{$no_of_child == "5" ? 'selected' : '-'}}">5</option>
                                            <option value="{{$no_of_child == "6" ? 'selected' : '-'}}">6</option>                      
                                            </select>
                                        </div>
										 <div class="input-field col s2">
                                            <input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn v2-ser-btn">
                                        </div>
                                    </div>                                 
                                </form> 
                          </div>      
  					</div>		
  

@endsection

@section('script')
 <script>
    var app = angular.module('myApp', []);
	    function compare(a, b) {
			let comparison = 0;
			if (a > b) {
				comparison = 1;
			} else if (a < b) {
				comparison = -1;
			}
			return comparison;
			}

    app.controller('myCtrl', function($scope, $http) {

        $scope.no_of_night = "{{$no_of_night}}"
        $scope.city = "{{$city}}"
        $scope.no_of_rooms = "{{$no_of_rooms}}"
        $scope.no_of_adults = "{{$no_of_adults}}"
        $scope.no_of_child = "{{$no_of_child}}"
        $scope.check_in_date = "{{$check_in_date}}"
        $scope.hotels = []
        $scope.min = ""
        $scope.max = ""
        $scope.current_start = []
        $scope.loading_data = true
        var data = {
          no_of_night: $scope.no_of_night,
          city: $scope.city,
          no_of_rooms: $scope.no_of_rooms,
          no_of_adults: $scope.no_of_adults,
          no_of_child: $scope.no_of_child,
          check_in_date: $scope.check_in_date,
        }

		$scope.ratings = [
				{
					id:1, 
					stars: ['']
				},
				{
					id:2, 
					stars: ['', '']
				},
				{
					id:3, 
					stars: ['', '','']
				},
				{
					id:4, 
					stars: ['', '', '', '']
				},
				{
					id:5, 
					stars: ['', '', '', '', '']
				},
				
			] 


		$http.get("http://getflights.aresedge.com/data/hotel_data.json").then(function (response) {
        // $http.post("/api/v1/hotel/searchHotel", data).then(function (response) {
            $scope.loading_data = false
			$scope.myVar =false
			$scope.myVar2 =false

			if(response.data.data.HotelSearchResult.Error.ErrorCode ==0)
			{
				 $scope.hotels = response.data.data.HotelSearchResult.HotelResults
			
				// $scope.max = Math.round(Math.max.apply(Math, $scope.hotels.map(function(item){
				// 	return item.Price.PublishedPrice;
				// 	// return max.push(item.Price.PublishedPrice);
				// }))/1000)*1000;

				// $scope.min = Math.floor(Math.min.apply(Math, $scope.hotels.map(function(item){
				// 	// return item.Price.PublishedPrice(item+1000);
				// 	return $scope.min.push(item+1000); 
				// }))/1000)*1000;

				console.log($scope.hotels)
				$scope.myVar =false
				
	    	}else{ //this is only hide and show msg
				$scope.myVar2 =true
				$scope.myVar =true
			}

          }).catch(function (error) {
            $scope.loading_data = false
             console.log(error)
        });

        $scope.link_gen = function(index, code) {
        	return "http://getflights.aresedge.com/hotel/hotelinfo/"+index+"/"+code
        }

		// filter adding data 

		$scope.ratings = [1, 2, 3, 4, 5]
		// filtering  fare type
		$scope.filter_rating = function(r_index) {
			var i = $.inArray(r_index, $scope.ratings);
			if (i > -1) {
				$scope.ratings.splice(i, 1);
			} else {
				$scope.ratings.push(r_index);
			}
			return
		}

		// filter functions
		$scope.filterhotels = function(hotels) {
			if ($scope.ratings.length > 0) {
				if ($.inArray(hotels.StarRating, $scope.hotels) < 0) {
					return;
				}
			}
			return hotels;
		}

		 $scope.filter = $scope.hotels.filter((value, index) => {
				return value.RoomDetails.length > 0
			})
			console.log("Hotal Fillter");	
			console.log( $scope.filter);

    });

</script>
@endsection