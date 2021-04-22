@extends('home.layouts.app')
@section('css')
	<style>
		[type="checkbox"]:not(:checked), [type="checkbox"]:checked {
			position: static !important;
			left: -9999px !important;
			opacity: 9 !important;
		}
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/angularjs-slider/6.4.3/rzslider.css" /> 
@endsection
@section('content')

@php
    
	session(['flight_search_url' => url()->full()]);

    if(isset($_GET['segment'])) {
	    $segment = $_GET['segment'];
	}else{
        $segment = 1;
	}

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


	if(isset($_GET['preferredairlines'])) {
	    $preferredairlines = $_GET['preferredairlines'];
	}else{
        $preferredairlines = null;
	}

	if(isset($_GET['flying_from'])) {
	    $flying_from_0 = $_GET['flying_from'];
	}else{
        $flying_from_0 = "";
	}
    

	if(isset($_GET['flying_to'])) {
	    $flying_to_0 = $_GET['flying_to'];
	}else{
        $flying_to_0 = "";
	}

    if(isset($_GET['flying_from_1'])) {
	    $flying_from_1 = $_GET['flying_from_1'];
	}else{
        $flying_from_1 = "";
	}

	if(isset($_GET['flying_to_1'])) {
	    $flying_to_1 = $_GET['flying_to_1'];
	}else{
        $flying_to_1 = "";
	}

    if(isset($_GET['flying_from_2'])) {
	    $flying_from_2 = $_GET['flying_from_2'];
	}else{
        $flying_from_2 = "";
	}

	if(isset($_GET['flying_to_2'])) {
	    $flying_to_2 = $_GET['flying_to_2'];
	}else{
        $flying_to_2 = "";
	}

    if(isset($_GET['flying_from_3'])) {
	    $flying_from_3 = $_GET['flying_from_3'];
	}else{
        $flying_from_3 = "";
	}

	if(isset($_GET['flying_to_3'])) {
	    $flying_to_3 = $_GET['flying_to_3'];
	}else{
        $flying_to_3 = "";
	}

    if(isset($_GET['flying_from_4'])) {
	    $flying_from_4 = $_GET['flying_from_4'];
	}else{
        $flying_from_4 = "";
	}

	if(isset($_GET['flying_to_4'])) {
	    $flying_to_4 = $_GET['flying_to_4'];
	}else{
        $flying_to_4 = "";
	}


	if(isset($_GET['departure_date'])) {
	    $DepartureTime0 = $_GET['departure_date'];
	}else{
        $DepartureTime0 = "";
	}

	if(isset($_GET['arrival_date_1'])) {
	    $DepartureTime1= $_GET['arrival_date_1'];
      
	}else{
        $DepartureTime1 = "";
	}

    if(isset($_GET['arrival_date_2'])) {
	    $DepartureTime2= $_GET['arrival_date_2'];
	}else{
        $DepartureTime2 = "";
	}

    if(isset($_GET['arrival_date_3'])) {
	    $DepartureTime3 = $_GET['arrival_date_3'];
	}else{
        $DepartureTime3 = "";
	}

    if(isset($_GET['arrival_date_4'])) {
	    $DepartureTime4 = $_GET['arrival_date_4'];
	}else{
        $DepartureTime4 = "";
	}
	

@endphp 
	

	@if($flying_from_0 == '' or $flying_to_0 == '' or $DepartureTime0 == '')
		<script type="text/javascript">
			window.location = "{{ url('/') }}";//here double curly bracket
		</script>
	@endif


    <section class="">
		<div class="container-fluid" ng-app="flightapp" ng-controller="flightCtrl">
            <div style="display:none;">
               
                <input id="flying_from_0" type="hidden" value="{{ explode("-",$flying_from_0)[1] }}" name="flying_from_0">
                <input id="flying_to_0" type="hidden" value="{{explode("-",$flying_to_0)[1]}}" name="flying_to_0">
                <input id="DepartureTime_0" value="{{$DepartureTime0}}" type="hidden" name="DepartureTime_0">
                @if($flying_from_1 != '')
                <input id="flying_from_1" type="hidden" value="{{explode("-",$flying_from_1)[1]}}" name="flying_from_1">
                <input id="flying_to_1" type="hidden" value="{{explode("-",$flying_to_1)[1]}}" name="flying_to_1">
                <input id="DepartureTime_1" value="{{$DepartureTime1}}" type="hidden" name="DepartureTime_1">
                @endif
                @if($flying_from_2 != '')

                    <input id="flying_from_2" type="hidden" value="{{explode("-",$flying_from_2)[1]}}" name="flying_from_2">
                    <input id="flying_to_2" type="hidden" value="{{explode("-",$flying_to_2)[1]}}" name="flying_to_2">
                    <input id="DepartureTime_2" value="{{$DepartureTime2}}" type="hidden" name="DepartureTime_2">
                @endif

                @if($flying_from_3 != '')
                    <input id="flying_from_3" type="hidden" value="{{explode("-",$flying_from_3)[1]}}" name="flying_from_3">
                    <input id="flying_to_3" type="hidden" value="{{explode("-",$flying_to_3)[1]}}" name="flying_to_3">
                    <input id="DepartureTime_3" value="{{$DepartureTime3}}" type="hidden" name="DepartureTime_3">
                @endif

                @if($flying_from_4 != '')
                    <input id="flying_from_4" type="hidden" value="{{explode("-",$flying_from_4)[1]}}" name="flying_from_4">
                    <input id="flying_to_4" type="hidden" value="{{explode("-",$flying_to_4)[1]}}" name="flying_to_4">
                    <input id="DepartureTime_4" value="{{$DepartureTime4}}" type="hidden" name="DepartureTime_4">
                @endif
                
            </div>
			<div class="row" ng-if="loading_data">
				<div class="col-md-3">

					<div class="row">
						<div class="col-md-12">
							Price range
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<rzslider rz-slider-model="slider.minValue" rz-slider-high="slider.maxValue" rz-slider-options="slider.options"></rzslider>
						</div>
					</div>

					
					<div class="row">
						<div class="col-md-12">
							Departure Time
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label>00-06:
								<input type="checkbox" ng-checked="true" ng-click="filter_timing(1)">
							</label>
						</div>
						<div class="col-md-3">
							<label>06-12:
								<input type="checkbox" ng-checked="true" ng-click="filter_timing(2)">
							</label>
						</div>
						<div class="col-md-3">
							<label>12-18:
								<input type="checkbox" ng-checked="true" ng-click="filter_timing(3)">
							</label>
						</div>
						<div class="col-md-3">
							<label>18-00:
								<input type="checkbox" ng-checked="true" ng-click="filter_timing(4)">
							</label>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							Stops
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<label>0
								<input type="checkbox" ng-checked="true" ng-click="filter_stops(1)">
							</label>
						</div>
						<div class="col-md-3">
							<label>1
								<input type="checkbox" ng-checked="true" ng-click="filter_stops(2)">
							</label>
						</div>
						<div class="col-md-3">
							<label>2+
								<input type="checkbox" ng-checked="true" ng-click="filter_stops(3)">
							</label>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							Fare Type
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<label> Refundable
								<input type="checkbox" ng-checked="true" ng-click="filter_refundable(1)">
							</label>
						</div>
						<div class="col-md-3">
							<label>Non Refundable
								<input type="checkbox" ng-checked="true" ng-click="filter_refundable(2)">
							</label>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							Airlines
						</div>
					</div>

					<div class="row">
						<div class="col-md-12" ng-repeat="airlines_name in airlinnameshow">
							<label> @{{airlines_name}}
								<input type="checkbox" ng-checked="true" ng-click="filter_airlines_name(airlines_name)">
							</label>
						</div>
					</div>

				</div>
				

				<div class="col-md-9">
					<div class="row">
						<div class="col-md-12">
							{{$flying_from_0}} -> {{$flying_to_0}}
							<div class="rows inn-page-bg com-colo">
								<div class="col-md-12">									
									<table id="myTable">
										<tbody>
											<tr>
												<th>Airline</th>
												<th>Departure</th>
												<th>Arrival</th>
												<th>Price</th>
												<th>Book</th>
											</tr>
											<tr ng-repeat="flight in flights | filter:filterflights | limitTo: itemsLimit()">
												<td>
													<img src="@{{airline_image(flight.AirlineCode)}}"/> @{{flight.airlineName}}<br>
													<a data-toggle="modal" data-target="#myModal" class="" ng-click="show_details(flight.id)">Flight Detail</a>
												</td>
												<td>@{{flight.Segments[0][0].StopPointDepartureTime | date: 'mediumTime'}}</td>
												<td>@{{flight.Segments[0][0].StopPointArrivalTime | date: 'mediumTime'}}</td>
												<td>@{{flight.price}}</td>
												<td>
													<a herf="@{{booking_form(flight.ResultIndex)}}" class="link-btn">Book Now</a>
												</td>
											</tr>
										</tbody>
									</table>
									<button ng-show="hasMoreItemsToShow()" ng-click="showMoreItems()">Show more</button> 
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="row" ng-if="!loading_data">
				Searching flight from @{{origin}} to @{{destination}} ......
			</div>

			@include('air.flight_details_multi')
			
		</div>
	</section>
	
@endsection

@section('script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angularjs-slider/6.4.3/rzslider.js"></script>
	<script>
        var input_data = []
        for (var i = 0; i < {{$segment + 1}}; i++) {             
            var multicity = {
                "Origin": $('#flying_from_'+i).val(),
                "Destination":  $('#flying_to_'+i).val(),
                "FlightCabinClass": "1",
                "PreferredDepartureTime": moment($('#DepartureTime_'+i).val()).format('YYYY-MM-DD')+"T00:00:00",
                "PreferredArrivalTime": moment($('#DepartureTime_'+i).val()).format('YYYY-MM-DD')+"T00:00:00"
            }
            input_data.push(multicity)
        }
        
	    var appdata = angular.module('flightapp', ['rzModule']);
	    appdata.controller('flightCtrl', function($scope, $http) {
			$scope.flights = []
	        $scope.loading_data       = false
	        $scope.adult              = "{{$adult}}"
			$scope.child              = "{{$child}}"
			$scope.infant             = "{{$infant}}"
			$scope.direct             = "{{$direct}}"
			$scope.onestop            = "{{$onestop}}"
			$scope.preferredairlines  = "{{$preferredairlines}}"
			$scope.airlines           = []
			$scope.flightsreturns     = []
			$scope.searchfilter       = true
			$scope.airlines_names     = []
            $scope.segment = "{{$segment + 1}}"
			$scope.min = 0
			$scope.max = 0
			// console.log($scope.ArrivalTime)

			var flightdata = {
				multi_city_data:   input_data,
                adult:             $scope.adult,
				child:             $scope.child,
				infant:            $scope.infant,
				direct:            $scope.direct,
				onestop:           $scope.onestop,
				preferredairlines: $scope.preferredairlines,
                segment: $scope.segment

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

			//maping flight data function

			$scope.mappingdata = function(flights) {
				flights.map((flight, i, arr) => {

					angular.forEach($scope.airlines, function(value, key){
						if (flight.AirlineCode == value.code) {
							flight['airlineName'] = value.name + '-' + flight.AirlineCode
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
				
			// $http.get("http://getflights.aresedge.com/data/air_data.json").then(response => {
			$http.post("/api/v1/air/searchAir", flightdata).then( response => {
				$scope.traceId = response.data.data.TraceId
				$scope.flights = response.data.data.Results[0]
				var all_datas = $scope.flights.concat($scope.flightsreturns);

				$scope.loading_data = true
				$scope.flights = $scope.mappingdata($scope.flights)
				$scope.flightsreturns = $scope.mappingdata($scope.flightsreturns)
							
				angular.forEach(all_datas, function(value, key){				
					if(!$scope.airlines_names.includes(value.airlineName)){
						$scope.airlines_names.push(value.airlineName);
					}
				})

				$scope.airlinnameshow = angular.copy($scope.airlines_names);

				$scope.min = Math.floor(Math.min.apply(Math,all_datas.map(function(item){return item.price;}))/1000)*1000
				$scope.max = Math.round(Math.max.apply(Math,all_datas.map(function(item){return item.price;}))/1000)*1000

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
			});

			
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

			// load more 
			var pagesShown = 1;
			var pageSize = 10;
			$scope.itemsLimit = function() {
				return pageSize * pagesShown;
			};
			$scope.hasMoreItemsToShow = function() {
				return pagesShown < ($scope.flights.length / pageSize);
			};
			$scope.showMoreItems = function() {
				pagesShown = pagesShown + 1;         
			};

			// airline image 

			$scope.airline_image = function(air_linecode) {
				return "http://www.smsalertbox.com/flight/images/images/"+air_linecode + ".gif"
			}

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

			$scope.all_duration = (segments) => {
				var dur_tim = 0
				angular.forEach(segments, function(segment, key){	
					dur_tim += segment[0].Duration
				})
				return dur_tim
			}

			// booking link
			$scope.booking_form = (index) => {
				return "http://getflights.aresedge.com/air/booking/"+index+"/"+$scope.traceId
			}

			// flight details

			$scope.segments = []
			$scope.show_details = function(index, is_return) {	
				var flights = $scope.flights.filter(flight => flight.id === index);				
				flight = flights[0]
				$scope.segments = flight.Segments
				$scope.booklink = $scope.booking_form(flight.ResultIndex)
				$scope.origin = $scope.segments[0][0].Origin.Airport.CityName + '-' + $scope.segments[0][0].Origin.Airport.CityCode
				$scope.destination = $scope.segments[$scope.segments.length - 1][0].Destination.Airport.CityName + '-' + $scope.segments[$scope.segments.length - 1][0].Destination.Airport.CityCode
				var dur_time = moment.duration($scope.all_duration($scope.segments) * 60 * 1000)
				$scope.meal = flight.meal
				$scope.duration_time =  dur_time.get('hours') +'h ' + dur_time.get('minutes') + 'm'
				$scope.stop_type = flight.stops == 1 ? 'Non Stop' : flight.stops - 1 + ' Stop'
				$scope.DepartureTime_d = moment("{{$flying_from_1}}").format('ddd DD, MMMM')
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
				
			}

	    });

		appdata.filter('trustAsHtml',['$sce', function($sce) {
			return function(text) {
			return $sce.trustAsHtml(text);
			};
		}]);
	</script>
@endsection