@extends('home.layouts.app')
@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
@endsection
@section('content')
@php
	if(isset($_GET['adult'])) {
	    $adult = $_GET['adult'];
	}else{
        $adult = 0;
	}

	if(isset($_GET['child'])) {

	    $child = $_GET['child'];
	}else{
        
        $child = 0;
	
	}

	if(isset($_GET['infant'])) {

	    $infant = $_GET['infant'];

	}else{
        
        $infant = 0;
	}
@endphp

@if($adult == 0)
	<script type="text/javascript">
		window.location = "{{ url('/') }}";//here double curly bracket
	</script>
@endif

	<div class="container" ng-app="flightbookapp" ng-controller="flightbookCtrl">

		

		<div class="row">
			<div class="modal-header">
				<h4 class="modal-title">Flight Details</h4>
			</div>
		</div>

		@if(Session::has('flash_message'))
			<div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
		@endif

		<div class="row" ng-if="loading_data">
			<div id="preloader" style="display: block;">
				<div id="status" style="display: block;">&nbsp;</div>
			</div>
		</div>

		<div class="row" ng-if="!loading_data">

			<p style="text-align: end;" data-toggle="modal" data-target="#myModal"><b>View Fare Rules</b></p>	
			<div class="col-md-8">
				<div class="row"  ng-repeat="segment in segments[0]" style="border-style: ridge;">
					<div class="col-md-3">
						<img src="http://tbolite.tektravels.com/Images/Air/AirlineLogo_25x25/@{{segment.Airline.AirlineCode}}.gif" alt="@{{airline_detail(segment.Airline, 'name')}}"><br>
						<span class="airline-profile">
							<strong>@{{airline_detail(segment.Airline, 'details')}}</strong>									
						</span>
					</div>

					<div class="col-md-3" ng-bind-html="flight_dep_arr_details(segment.Origin, 0)|trustAsHtml">
					</div>

					<div class="col-md-3" ng-bind-html="flight_time_refund_details(segment)|trustAsHtml">
					</div>

					<div class="col-md-3" ng-bind-html="flight_dep_arr_details(segment.Destination, 1)|trustAsHtml">
					</div>
					<br>
				</div>
			</div>
		 
			<div class="col-md-4"  style="border-style: ridge;">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>Base Fare</th>
								<th>@{{fare.OfferedFare}}</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>PLBEarned</td>
								<td>PLBEarned : @{{fare.PLBEarned}}</td>
							</tr>
							<tr>
								<td>Tax</td>
								<td>@{{fare.Tax}}</td>
							</tr>
							<tr>
								<td>OfferedFare</td>
								<td>@{{passenger_service_fee}}</td>
							</tr>
							<tr>
								<td>Passenger Service Fee</td>
								<td>@{{passenger_service_fee}}</td>
							</tr>
							<tr>
								<th>Total</th>
								<th>@{{total}}</th>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		<div>

		<div class="db-2" style="width: 100%;">
			<div class="db-2-com db-2-main">
				<h4>Enter Traveller Details</h4>
				<div class="db-2-main-com db2-form-pay db2-form-com">
					<form role="form"  class="col s12" method="POST" action="{{ route('flight_booking',[$index, $tracID,$adult,$child,$infant]) }}">
						{!! csrf_field() !!}
						<input type="hidden" value="@{{total}}" name="amount">
						<input type="hidden" value="@{{isslcc}}" name="isslcc">
						@include('home.layouts.errors')
						@if(Session::has('flash_message'))
							<div class="alert alert-info"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
						@endif

						<div class="row">
							<div class="input-field col s12 m6">
								<input type="email" name="email" class="validate" value="{{old('email')}}" required>
								<label>Email</label>
							</div>
							<div class="input-field col s12 m6">
								<input type="number" name="phone" class="validate" value="{{old('phone')}}" required>
								<label>Mobile</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m6">
								<input type="text" name="city" class="validate" value="{{old('city')}}" required>
								<label class="">City</label>
							</div>
							<div class="input-field col s12 m6">
								<input type="text" name="address" class="validate" value="{{old('address')}}" required>
								<label class="">Address</label>
							</div>
						</div>

						@if(isset($adult))
							@for ($i = 1; $i <= $adult; $i++)	
								<div class="row">
									<div class="input-field col s12">
										<div class="select-wrapper"><input class="select-dropdown" readonly="true" data-activates="select-options-bee68b62-eee9-0190-da17-b01ee866850f" value="Adults Details" style="font-size: 25px !important;color: deepskyblue !important; text-align: center;"><ul id="select-options-bee68b62-eee9-0190-da17-b01ee866850f" class="dropdown-content select-dropdown" style="width: 663.828px; position: absolute; top: 0px; left: 0px; opacity: 1; display: none;">
										<li class="disabled"></li></ul><select class="initialized">
										</select></div>
									</div>
								</div>

								<div class="row">
									<div class="input-field col s12 m6">
										<select class="form-control" id="title[]" name="title[]">
											<option value="1">Mr.</option>
											<option value="2">Ms.</option>
											<option value="3">Mrs.</option>
										</select>	
									</div>
									<div class="input-field col s12 m6">
										<input type="text" name="aname[]" class="validate">
										<label>Adult First Name*</label>
									</div>
								</div>

								<div class="row">
									<div class="input-field col s12 m6">
										<input type="text" name="alname[]" class="validate">
										<label class="">Adult Last Name*</label>
									</div>

									<div class="input-field col s12 m6">
										<input  ata-date-start-date="0d" data-date-format="dd/mm/yyyy"  name="adob[]"  data-provide="datepicker" class="datepicker_re adult_dobs" type="text"  autocomplete="off" required>
										
										<label class="">DOB*</label>
									</div>
								</div>
							@endfor
						@endif

						@if(isset($child))
							@for ($i = 1; $i <= $child; $i++)	
								<div class="row">
									<div class="input-field col s12">
										<div class="select-wrapper"><input class="select-dropdown" readonly="true" data-activates="select-options-bee68b62-eee9-0190-da17-b01ee866850f" value="Child  Details" style="font-size: 25px !important;color: deepskyblue !important; text-align: center;"><ul id="select-options-bee68b62-eee9-0190-da17-b01ee866850f" class="dropdown-content select-dropdown" style="width: 663.828px; position: absolute; top: 0px; left: 0px; opacity: 1; display: none;">
										<li class="disabled"></li></ul><select class="initialized">
										</select></div>
									</div>
								</div>

								<div class="row">
									<div class="input-field col s12 m6">
										<select class="form-control" id="title[]" name="title[]">
											<option value="1">Master</option>
											<option value="2">Miss</option>
										</select>	
									</div>
									<div class="input-field col s12 m6">
										<input type="text" name="cname[]" class="validate">
										<label>Child First Name*</label>
									</div>
								</div>

								<div class="row">
									<div class="input-field col s12 m6">
										<input type="text" name="clname[]" class="validate">
										<label class="">Child Last Name*</label>
									</div>
									<div class="input-field col s12 m6">
										<input  id="to_to"  name="cdob[]"  data-provide="datepicker" class="datepicker_re child_dobs" type="text"  autocomplete="off" required>
										<label class="">DOB*</label>
									</div>
								</div>
							@endfor
						@endif

						@if(isset($infant))
							@for ($i = 1; $i <= $infant; $i++)	
								<div class="row">
									<div class="input-field col s12">
										<div class="select-wrapper"><input class="select-dropdown" readonly="true" data-activates="select-options-bee68b62-eee9-0190-da17-b01ee866850f" value="Infant Details" style="font-size: 25px !important;color: deepskyblue !important; text-align: center;"><ul id="select-options-bee68b62-eee9-0190-da17-b01ee866850f" class="dropdown-content select-dropdown" style="width: 663.828px; position: absolute; top: 0px; left: 0px; opacity: 1; display: none;">
										<li class="disabled"></li></ul><select class="initialized">
										</select></div>
									</div>
								</div>

								<div class="row">
									<div class="input-field col s12 m6">
										<select class="form-control" id="title[]" name="title[]">
											<option value="1">Master</option>
											<option value="2">Miss</option>
										</select>	
									</div>
									<div class="input-field col s12 m6">
										<input type="text" name="iname[]" class="validate">
										<label>Infant First Name*</label>
									</div>
								</div>

								<div class="row">
									<div class="input-field col s12 m6">
										<input type="text" name="ilname[]" class="validate">
										<label class="">Infant Last Name*</label>
									</div>
									<div class="input-field col s12 m6">
										<input  id="to_to"  name="idob[]"  data-provide="datepicker" class="datepicker_re" type="text"  autocomplete="off" required>
										<label class="">DOB*</label>
									</div>
								</div>
							@endfor
						@endif

						<div class="row">
							<div class="input-field col s12">
								<div class="select-wrapper">
									<input class="select-dropdown" readonly="true" 
									data-activates="select-options-bee68b62-eee9-0190-da17-b01ee866850f" 
									value="Service Requests (Optional)" style="font-size: 25px !important;color: deepskyblue !important; text-align: center;">
									<ul id="select-options-bee68b62-eee9-0190-da17-b01ee866850f" 
									class="dropdown-content select-dropdown" style="width: 663.828px; position: absolute; top: 0px; left: 0px; opacity: 1; display: none;">
										<li class="disabled"></li>
									</ul>
									<select class="initialized"></select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">

								<div class="row">
									<div class="col-md-4" ng-if="ismeal">
										<button type="button" class="btn btn-primary services" style="" id="" value="1">+ Add Meals</button>
										<!--<a href="#" class="meals services_take" id="services_take_1"> + Add Meals</a>-->
									</div>
									<div class="col-md-4" ng-if="ismeal_bagges">
										<button type="button" class="btn btn-primary services" style="" id="" value="2">+ Add Baggage</button>
										<!--<a href="#" class="baggages services_take" id="services_take_2"> + Add Baggage</a>-->
									</div>
								</div>

								<div class="row" ng-if="ismeal">
									<div class="col-md-12 services_content" id="services_take_1" style="display:none;">
										<h5><b>Select Meal Preferneces</b></h5>
										<p style="background-color:grey; border: 1px solid #e2e2e2; padding: 4px 8px 4px 10px;"<i class="fa fa-plane"></i> DEPARTURE</p>
										<div class="row">	
											<div class="col-md-6">
												Adult 1
											</div>
											<div class="col-md-6">	
												<select class="form-control">
													<option value="Select your meal">Select your meal</option>
													<option value="Non Veg Meal  (INR 300)">Non Veg Meal  (INR 300)</option>
													<option value="Veg Meal   (INR 250)">Veg Meal  (INR 250)</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-12 services_content" id="services_take_2" style="display:none;" ng-if="ismeal_bagges"> 
										<h3><b>Buy extra baggage allowance</b></h3>
									</div>
								</div>

							</div>
						</div>

						<div ng-if="issgst">
							<input type="hidden" value="1" name="gst">

							<div class="row" >
								<div class="input-field col s12">
									<div class="select-wrapper"><input class="select-dropdown" readonly="true" data-activates="select-options-bee68b62-eee9-0190-da17-b01ee866850f" value="GST Details" style="font-size: 25px !important;color: deepskyblue !important; text-align: center;"><ul id="select-options-bee68b62-eee9-0190-da17-b01ee866850f" class="dropdown-content select-dropdown" style="width: 663.828px; position: absolute; top: 0px; left: 0px; opacity: 1; display: none;">
									<li class="disabled"></li></ul><select class="initialized">
									</select></div>
								</div>
							</div>
								
							<div class="row">
								<div class="input-field col s12 m6">
									<input type="text" name="gnumber" class="validate">
									<label>GST Number:*</label>
								</div>
							
								<div class="input-field col s12 m6">
									<input type="text" name="gcname" class="validate">
									<label>Company Name*</label>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m6">
									<input type="email" name="gemail" class="validate">
									<label class="">Email Id*</label>
								</div>
								
								<div class="input-field col s12 m6">
									<input type="number" name="gmobile" class="validate">
									<label class="">Mobile Number*</label>
								</div>
							</div>

						</div>

						<div class="row">
							<br><br>
							<center><button type="submit" name="submit" class="link-btn book_ticket" id="book_ticket">Submit</button></center>	
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</form>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Fare Rules</h4>
			</div>
			<div class="modal-body">
				<p>Some text in the modal.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
    </div>
</div><!-- End Modal -->

		

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>

<script>  


  $( document ).ready(function() {

	// $(".services").click(function(){
	$(document).on('click', '.services', function(){		
		var seerviceID = $(this).attr('value')
		$(".services_content").hide();
		$("div#services_take_"+seerviceID).show();
		
	});

	$(document).on('click', '.datepicker_re', function(){
		$(this ).datepicker({
			format: "dd/mm/yyyy",
			todayHighlight: true,
			startDate: today,
			autoclose: true
		});
	})


	$( document ).on('change', ".adult_dobs", function(){
      var today_date = new Date();
	  var user_dob = $(this).val(); 

		var now = moment();
		var dob = moment(user_dob, "DD/MM/YYYY");


		var durtime_obj_f = moment.duration(now.diff(dob)).asMinutes()

		var durtime = moment.duration(durtime_obj_f * 60 * 1000).years()
		
		if(durtime <= 12)
		{
			swal("Age!", "Please Select Age more then 12", "error");			
			// alert("Please Select Age more then 12")
			$('#book_ticket').prop("disabled", true);
		}
    });

	$( document ).on('change', ".child_dobs", function(){
      var today_date = new Date();
	  var user_dob = $(this).val(); 

		var now = moment();
		var dob = moment(user_dob, "DD/MM/YYYY");
		var durtime_obj_f = moment.duration(now.diff(dob)).asMinutes()

		var durtime = moment.duration(durtime_obj_f * 60 * 1000).years()

		if(durtime > 12)
		{
			swal("Age!", "Please Select Age not more then 12", "error");
			$('#book_ticket').prop("disabled", true);
		}
    });
	$('#book_ticket').prop("disabled", false);


	
	
});
</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script>
        var airdataurl    = "{{route('booking_flight', [$index, $tracID])}}"
		var airdataurlssr = "{{route('booking_flight_ssr', [$index, $tracID])}}"
	    var appdata = angular.module('flightbookapp', []);

	    appdata.controller('flightbookCtrl', function($scope, $http) {
			$scope.loading_data = true
			$scope.ismeal = false
			$scope.ismeal_bagges = false
            $http.post(airdataurl).then(response => {
				var responses = response.data.data[0]
				if(responses.Error.ErrorCode !=0)
				{
					history.back();
				}
				
				$scope.fare=responses.Results.Fare
				$scope.segments = responses.Results.Segments
				$scope.meal = responses.Results.meal
				$scope.passenger_service_fee = 0
				$scope.issgst=responses.Results.IsGSTMandatory
				$scope.isslcc=responses.Results.IsLCC
				if($scope.isslcc == true)
				{
					$scope.isslcc=1;		
				}else{
					$scope.isslcc=0;

				}

				$scope.total = responses.Results.price

				$scope.loading_data = false
			}).catch(error => {
				console.log(error)
				$scope.loading_data = false
			});
			// ssr api callling
			$http.post(airdataurlssr).then(response => {
				if (response.data.data[0].hasOwnProperty("MealDynamic")) {
					$scope.ismeal = true
				}
			}).catch(error => {
				console.log(error)
			});

			$scope.airline_image = function(air_linecode) {
				return "http://www.smsalertbox.com/flight/images/images/"+air_linecode + ".gif"
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
        })

		appdata.filter('trustAsHtml',['$sce', function($sce) {
			return function(text) {
			return $sce.trustAsHtml(text);
			};
		}]);
    </script>


@endsection