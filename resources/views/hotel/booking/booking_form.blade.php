@extends('home.layouts.app')

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
	<style>
	    .details{
			width: 100%;
			min-height: 383px;
			margin-top: 19px;
			
			background-color:white;	
		}
	    .cancelpolcy{
			width: 100%;
			height: 55px;
			margin-left: 0px;
		}
		.cancelpolcy p{
			text-align: center;
			font-family: sans-serif;
			color: #5f5e57;

		}
		.imagediv{
			border-style: ridge;
			width: 27%;
			min-height: 205px;
			float: left;
			background-color:white;
		}
		.rltddtl{
			border-style:ridge;
			width: 70%;
			min-height: 376px;
			float: right;
			background-color:white;	
		}
		.hotelname{
			background-color: white;
		}
		.hotelname p{
			font-size:15px;
			font-family:sans-serif;
			color:#5f5e57;
		}
		.date_detail{
			background-color: white;
			width: 100%;
			border-style: ridge;
			min-height: 140px;
		}
		.check_in_out{
			width: 47%;
			min-height: 132px;
			float: left;
		}
		.adult_detail{
			width: 50%;
			min-height: 132px;
			float: right;

		}
		.adult_detail ul li a{
			display:block;
			margin-top: -23px;
			color: #72a2e0 !important;
			float: right;
		}
		.checkin{
			width: 46%;
			min-height: 111px;
			float: right;
		}
		.checkout{
			width: 46%;
			min-height: 111px;
			float:left;
		}
		.checkindate{
			width: 100%;
			height: 83px;
			float: left;
			background-color: #eaeaea
		}
		.checkoutdate{
			width:100%;
			height:83px;
			float:left;
			background-color: #eaeaea
		}
    </style>

@endsection

@section('content')

@php
	$srchhurl = session('hotel_search_url');
	$srchhurl = str_replace("amp%3B", "", $srchhurl);
	$srchhurl = str_replace("%3B", "", $srchhurl);
	if(isset($search_data->NoOfAdults)) {

	    $adult = $search_data->NoOfAdults;

	}else{

        $adult = 0;

	}

	if(isset($search_data->NoOfChild)) {

	    $child = $search_data->NoOfChild;

	}else{

        $child = 0;
	}	
@endphp

@if($adult == 0)
	<script type="text/javascript">
		window.location = "{{ url('/') }}";//here double curly bracket
	</script>
@endif


	<div class="container" ng-app="hotelroombookapp" ng-controller="hotelbookCtrl">

		<div class="row">
			<div class="modal-header">
				<h4 class="modal-title">Hotel Details</h4>
			</div>
		</div>

		@if(Session::has('flash_message'))
			<div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
		@endif

		<div class="row" ng-if="!loading_data">

			<p style="text-align: end;" data-toggle="modal" data-target="#myModal"><b>View Fare Rules</b></p>	
			<div class="col-md-9">
				<div class="row"  >
				    <div class="col-md-12" style="background-color: #e6e2e2;">
						<div class="details">
						    <div class="imagediv"></div>
							<div class="rltddtl">
							   <div class="hotelname">
							     <h4> Hotel Sri Nanak Continental </h4>
								 <p>2222, Hardhian Singh Road, Near Gurudwara Rd, Next to Corporation Bank, Karol Bagh, Karol Bagh, New Delhi, 110005, India</p>
							   </div>
							   <div class="date_detail">
							       <div class="check_in_out">
								      <div class ="checkin">
									      <div class = "checkindate">
										      <span style="    display: block;text-align: center;">Check-Out</span>
											  <span style="    display: block; text-align: center;     font-size: 30px;font-weight: 500;margin-top: 10px;">8</span>
										  </div>
										  <div class = "checkinmonth" style="border:1px solid lightgray;"><center>June | 12:00am</center></div>
									  </div>
									  <div class ="checkout">
									       <div class = "checkoutdate">
										      <span style="display: block;text-align: center;">Check-In</span>
											  <span style="display: block; text-align: center; font-size: 30px;font-weight: 500;margin-top: 10px;">9</span>
										   </div>
										   <div class = "checkoutmonth" style="border:1px solid lightgray;"><center>June | 12:00am</center></div>
									  </div>
								       
								   </div>
								   <div class="adult_detail">
								       <ul>
											<li style="font-weight: bold;color: #696464;">2 days and 1 night</li>
											<li><a href="#">Change Room</a></li>
									   </ul>
									   <div style="border-bottom:1px solid lightgrey"></div>
									   <ul>
											<li style="font-weight:bold; color:#696464; display:block; float:left; width:50px;">Room 1</li>
											<li style="font-weight:bold; color:#696464; float:right; margin: -22px 112px; display:block;">Adult 2</li>
									   </ul>
									   <div style="border-bottom:1px solid lightgrey; margin-top: 33px;"></div>
								   </div>
							   </div>
							   <div class="inclusion">
							        <div class="heading">
									    Inclusion
									</div>
									<div class="data">
									<span><span>
									</div>
							   </div>
							</div>
							
						</div>
						<div class="cancelpolcy"><p>Cancellation Policy:  First night cost (including taxes & service charge) will be charged if you cancel this booking. You might be charged upto the full cost of stay (including taxes & service charge) if you do not check-in to the hotel.</p></div>
					</div>
					<!-- <div class="col-md-3">
						<span class="airline-profile">
							<strong>@{{roomdetail.HotelName}}</strong>									
						</span>
					</div> -->
					<br>
				</div>
			</div>
	 
			<div class="col-md-3"  style="border-style: ridge;">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>Fare Summary</th>
								<th>ADT x1</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Fare</td>
								<td>@{{roomdetail.HotelRoomsDetails[0].price}}</td>
							</tr>
							<tr>
								<td>Passenger Service Fee</td>
								<td>0</td>
							</tr>
							<tr>
								<th>Total</th>
								<th>@{{roomdetail.HotelRoomsDetails[0].price}}</th>
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
							<form role="form"   name="myForm"  class="col s12" id ="packageform" method="POST" action="{{route('book_room', [$hotelindex, $hotelroomindex, $code,$adult,$child,$traceid,])}}">
			
								{{ csrf_field() }}
								<input type="hidden" value="@{{roomdetail.HotelRoomsDetails[0].price}}" name="amount">
								<input type="hidden" value="@{{roomdetail.HotelName}}" name="hotel_info">

								@include('home.layouts.errors')
								@if(Session::has('flash_message'))
									<div class="alert alert-info">
										<span class="glyphicon glyphicon-ok">
										</span><em> {!!session('flash_message')!!}</em>
									</div>
								@endif

								<div class="row">
									<div class="input-field col s12 m6">
										<input type="email" name="email" class="validate" value="{{old('email')}}"  ng-model="email" ng-pattern="eml_add" required>
										<label>Email</label>
										<span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
											<span style="color:red" ng-show="myForm.email.$error.required">Email is required. </span>
											<span style="color:red" ng-show="myForm.email.$error.email">Invalid email address.</span>
										</span>
									</div>
									<div class="input-field col s12 m6">
										<input type="number" name="phone" class="validate" value="{{old('phone')}}" string-to-number ng-model="phone" maxlength="10" ng-pattern="ph_numbr" required>
										<label>Mobile</label>
										<span style="color:red" ng-if="myForm.phone.$error.required && myForm.phone.$dirty">Please provide your contact number</span>
                                        <span style="color:red" ng-show="myForm.phone.$error.pattern">Please enter a 10 digit number</span> 
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12 m6">
										<input type="text" name="city" class="validate" value="{{old('city')}}" ng-model="city" required>
										<label class="">City</label>
										<span style="color:red" ng-show="myForm.city.$dirty && myForm.city.$invalid">
										<span style="color:red" ng-show="myForm.city.$error.required">City is required.</span>
										</span>
									</div>
									<div class="input-field col s12 m6">
										<input type="text" name="address" class="validate" value="{{old('address')}}" ng-model="address" required>
										<label class="">Address</label>
										<span style="color:red" ng-show="myForm.address.$dirty && myForm.address.$invalid">
										<span style="color:red" ng-show="myForm.address.$error.required">Address is required. </span>
										</span>
									</div>
								</div>

								@if(isset($adult))
									@for ($i = 1; $i <= $adult; $i++)	
										<div class="row">
											<div class="input-field col s12">
												<div class="select-wrapper"><input class="select-dropdown" readonly="true" data-activates="select-options-bee68b62-eee9-0190-da17-b01ee866850f" value="Adults Details" style="font-size: 25px !important;color: deepskyblue !important; text-align: center;"><ul id="select-options-bee68b62-eee9-0190-da17-b01ee866850f" class="dropdown-content select-dropdown" style="width: 663.828px; position: absolute; top: 0px; left: 0px; opacity: 1; display: none;">
													<li class="disabled"></li></ul><select class="initialized"></select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="input-field col s12 m6">
												<select class="form-control" id="title" name="title[]">
													<option value="1">Mr.</option>
													<option value="2">Ms.</option>
													<option value="3">Mrs.</option>
												</select>	
											</div>
											<div class="input-field col s12 m6">
												<input type="text" name="aname[]" id = "aname" class="validate">
												<label>Adult First Name*</label>
											</div>
										</div>

										<div class="row">
											<div class="input-field col s12 m6">
												<input type="text" name="alname[]"  id="alname"class="validate">
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
												<select class="form-control" id="title" name="title[]">
													<option value="1">Master</option>
													<option value="2">Miss</option>
												</select>	
											</div>
											<div class="input-field col s12 m6">
												<input type="text" name="cname[]" id="cname" class="validate">
												<label>Child First Name*</label>
											</div>
										</div>

										<div class="row">
											<div class="input-field col s12 m6">
												<input type="text" name="clname[]" id="clname" class="validate">
												<label class="">Child Last Name*</label>
											</div>
											<div class="input-field col s12 m6">
												<input  id="to_to"  name="cdob[]" data-provide="datepicker" class="datepicker_re child_dobs" type="text"  autocomplete="off" required>
												<label class="">DOB*</label>
											</div>
										</div>
									@endfor
								@endif

								<div ng-if="issgst">
									<input type="hidden" value="1" name="gst">
										<div class="row" >
											<div class="input-field col s12">
												<div class="select-wrapper"><input class="select-dropdown" readonly="true" data-activates="select-options-bee68b62-eee9-0190-da17-b01ee866850f" value="GST Details" style="font-size: 25px !important;color: deepskyblue !important; text-align: center;">
													<ul id="select-options-bee68b62-eee9-0190-da17-b01ee866850f" class="dropdown-content select-dropdown" style="width: 663.828px; position: absolute; top: 0px; left: 0px; opacity: 1; display: none;">
													<li class="disabled"></li>
													</ul>
													<select class="initialized"></select>
												</div>
											</div>
										</div>
									
										<div class="row">
											<div class="input-field col s12 m6">
												<input type = "text" name = "gnumber" class="validate" ng-model="gnumber">
												<label>GST Number:*</label>
												<span style = "color:red" ng-show="myForm.gnumber.$dirty && myForm.gnumber.$invalid"></span>
										        <span style = "color:red" ng-show="myForm.gnumber.$error.required">Address is required. </span>
											</div>
										
											<div class="input-field col s12 m6">
												<input type="text" name="gcname" class="validate" ng-model="gcname">
												<label>Company Name*</label>
												<span style = "color:red" ng-show="myForm.gcname.$dirty && myForm.gcname.$invalid"></span>
										        <span style = "color:red" ng-show="myForm.gcname.$error.required">Address is required. </span>
											</div>
										</div>

										<div class="row">
											<div class="input-field col s12 m6">
												<input type ="email" name="gemail" class="validate" ng-model="gemail">
												<label class ="">Email Id*</label>
												<span style = "color:red" ng-show="myForm.gemail.$dirty && myForm.gemail.$invalid"></span>
										        <span style = "color:red" ng-show="myForm.gemail.$error.required">Address is required. </span>
											</div>
											
											<div class="input-field col s12 m6">
												<input type="number" name="gmobile" class="validate" string-to-number ng-model="gmobile" maxlength="10" ng-pattern="ph_numbr">
												<label class="">Mobile Number*</label>
												<span style="color:red" ng-if="myForm.gmobile.$error.required && myForm.gmobile.$dirty">Please provide your contact number</span>
                                                <span style="color:red" ng-show="myForm.gmobile.$error.pattern">Please enter a 10 digit number</span> 
											</div>
										</div>

									</div>

									<div class="row">
										<br><br>
										<center><button type="submit" name="submit" class="link-btn book_ticket" id="book_ticket" ng-disabled="myForm.$invalid">Submit</button></center>	
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

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

	</div>

	<!-- <div class="container" ng-app="hotelroombookapp" ng-controller="hotelbookCtrl">
		<div class="row">
			<h1>@{{roomdetail.HotelName}}</h1>
			<div  class="col-md-8">
				<div class="row">
					<div class="col-md-4">
						Address::: @{{roomdetail.AddressLine1}}, @{{roomdetail.AddressLine2}}
					</div>
					<div class="col-md-4">
						<div class="row" ng-repeat="HotelRoomsDetail in roomdetail.HotelRoomsDetails">
							<div class="col-md-12">
								Price/Night: @{{HotelRoomsDetail.Price.PublishedPrice}}
							</div>
						</div>
					</div>
					<div class="col-md-4">
						
					</div>
				</div>
			</div>
			<div class="col-md-4">
				
			</div>
		</div>
	</div> -->

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
 <!-- jauery validation plugin -->
   
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> 
	

<script>
	var srchhurlbase = "{{$srchhurl}}"
	var div = document.createElement('div');
	div.innerHTML = srchhurlbase
	var decodedurl = div.firstChild.nodeValue;
	
	
	var airdataurl = "{{route('api_block_room', [$hotelindex, $hotelroomindex, $code, $traceid])}}"
	var appdata = angular.module('hotelroombookapp', []);
	appdata.controller('hotelbookCtrl', function($scope, $http) {
		$scope.eml_add  = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
		$scope.ph_numbr = /^\+?\d{10}$/;
		$scope.loading_data = true
		$http.get(airdataurl).then(response => {
			$scope.roomdetail = response.data.data;
			
			//This is For Check GST or NOt
			$scope.issgst = response.data.data.GSTAllowed;
			if($scope.issgst == true){
				$scope.issgst=1;		
			}else{
				$scope.issgst=0;
			}

			$scope.loading_data = false

			if(response.data.data.Error.ErrorCode !=0){
				// console.log(decoded);
				window.location = decodedurl;
			}//This is For Redirect Page Back...

		}).catch(error => {
			console.log(error)
			$scope.loading_data = false
		});
	})

	appdata.filter('trustAsHtml',['$sce', function($sce) {
		return function(text) {
		return $sce.trustAsHtml(text);
		};
	}]);



	$( document ).on('change', ".adult_dobs", function(){
		var today_date = new Date();
		var user_dob = $(this).val(); 
		var now = moment();
		var dob = moment(user_dob,"DD-MM-YYYY");
		var durtime_obj_f = moment.duration(now.diff(dob)).asMinutes();
		var durtime = moment.duration(durtime_obj_f * 60 * 1000).years();

		if(durtime <= 12)
		{
		swal("Age!", "Please Select Age more then 12", "error");
		}
	});
	$( document ).on('change', ".child_dobs", function(){
		var today_date = new Date();
		var user_dob = $(this).val(); 
		var now = moment();
		var dob = moment(user_dob, "DD-MM-YYYY");
		var durtime_obj_f = moment.duration(now.diff(dob)).asMinutes();
		var durtime = moment.duration(durtime_obj_f * 60 * 1000).years();

		if(durtime > 12)
		{
			swal("Age!", "Please Select Age less than 12", "error");
		}
	});
	$(document).ready(function(){
		$('#packageform').validate({
			rules:{
				aname:{
					required:true,
					maxlength:100
				},
				alname:{
					required:true,
					maxlength:100
				},
				cname:{
					required:true,
					maxlength:100	
				},
				clname:{
					required:true,
					maxlength:100	
				}
			},
			messages:{
				aname:{
					required:"Name is required",
					maxlength:"This field contain maximum 100 characters"
				},
				alname:{
					required:"Name is required",
					maxlength:"This field contain maximum 100 characters"
				},
				cname:{
					required:"Name is required",
					maxlength:"This field contain maximum 100 characters"
					
				},
				clname:{
					required:"Name is required",
					maxlength:"This field contain maximum 100 characters"
				}	
			},
			submitHandler: function(form) {
			//form.submit();
			alert("Submitted!")
			}
		});
	});			   
</script>
@endsection