@extends('home.layouts.app')
@section('css')
<style>

/*------------------REVIEW BAAR-------------------*/

.progressbar {
    counter-reset: step;
}

ul {
    padding: 0;
    margin: 0;
}

.progressbar li.active {
    color: #fff;
}
.progressbar li {
    width: 33.33%;
    text-align: center;
    list-style: none;
    float: left;
    font-size: 14px;
    position: relative;
}
.active {
    background-position: right 12px;
}
.progressbar li.active:before {
    border-color: #36c246;
    background: #36c246;
}
.progressbar li:first-child:before {
    margin-left: 0%;
}
.progressbar li:before {
    content: counter(step);
    counter-increment: step;
    background-color: #fff;
    border-radius: 50%;
    border: 3px solid #36c246;
    display: block;
    height: 30px;
    line-height: 25px;
    margin: 0 auto 5px auto;
    text-align: center;
    top: -35px;
    width: 30px;
    cursor: pointer;
}
.progressbar li:nth-child(2):before {
    text-align: center;
}
.progressbar li:before {
    content: counter(step);
    counter-increment: step;
    background-color: #fff;
    border-radius: 50%;
    border: 3px solid #36c246;
    display: block;
    height: 30px;
    line-height: 25px;
    margin: 0 auto 5px auto;
    text-align: center;
    top: -35px;
    width: 30px;
    cursor: pointer;
}
.progressbar li.active + li:after {
    background-color: #36c246;
}
.progressbar li:nth-child(2):after {
    width: 145%;
    margin-left: -45%;
}

.progressbar li:last-child:before {
    text-align: center;
    margin-left: 90%;
    cursor: default;
}
.progressbar li:before {
    content: counter(step);
    counter-increment: step;
    background-color: #fff;
    border-radius: 50%;
    border: 3px solid #36c246;
    display: block;
    height: 30px;
    line-height: 25px;
    margin: 0 auto 5px auto;
    text-align: center;
    top: -35px;
    width: 30px;
    cursor: pointer;
}
.progressbar li:last-child:after {
    width: 145%;
}
.progressbar li:after {
       width: 0;
    background: #D7DCE1;
    position: absolute;
    content: '';
    height: 3px;
    top: 15px;
    left: -50%;
    z-index: -1;
}
.progressbar li.active span {
    color: #36c246;
}
.progressbar li:first-child span {
    text-align: left;
    margin-left: -88%;
}
.progressbar li {
    width: 33.33%;
    text-align: center;
    list-style: none;
    float: left;
    font-size: 14px;
    position: relative;
}
.progressbar li {
    width: 33.33%;
    text-align: center;
    list-style: none;
    float: left;
    font-size: 14px;
    position: relative;
}
/*------------------REVIEW BAAR-------------------*/

.progressbar2 {
    counter-reset: step;
}

ul {
    padding: 0;
    margin: 0;
}

.progressbar2 li.active {
    color: #fff;
}
.progressbar2 li {
    width: 33.33%;
    text-align: center;
    list-style: none;
    float: left;
    font-size: 14px;
    position: relative;
}
.active {
    background-position: right 12px;
}
.progressbar2 li.active:before {
    border-color: #36c246;
    background: #36c246;
}
.progressbar2 li:first-child:before {
    margin-left: 0%;
}
.progressbar2 li:before {
    content: counter(step);
    counter-increment: step;
    background-color: #fff;
    border-radius: 50%;
    border: 3px solid #36c246;
    display: block;
    height: 30px;
    line-height: 25px;
    margin: 0 auto 5px auto;
    text-align: center;
    top: -35px;
    width: 30px;
    cursor: pointer;
}
.progressbar2 li:nth-child(2):before {
    text-align: center;
}
.progressbar2 li:before {
    content: counter(step);
    counter-increment: step;
    background-color: #fff;
    border-radius: 50%;
    border: 3px solid #36c246;
    display: block;
    height: 30px;
    line-height: 25px;
    margin: 0 auto 5px auto;
    text-align: center;
    top: -35px;
    width: 30px;
    cursor: pointer;
}
.progressbar2 li.active + li:after {
    background-color: #36c246;
}
.progressbar2 li:nth-child(2):after {
    width: 145%;
    margin-left: -45%;
}

.progressbar2 li:last-child:before {
    text-align: center;
    margin-left: 90%;
    cursor: default;
}
.progressbar2 li:before {
    content: counter(step);
    counter-increment: step;
    background-color: #36c246;
    color:white;
    border-radius: 50%;
    border: 3px solid #36c246;
    display: block;
    height: 30px;
    line-height: 25px;
    margin: 0 auto 5px auto;
    text-align: center;
    top: -35px;
    width: 30px;
    cursor: pointer;
}
.progressbar2 li:last-child:after {
    width: 145%;
}
.progressbar2 li:after {
   
    background: #D7DCE1;
    position: absolute;
    content: '';
    height: 3px;
    top: 15px;
    left: -50%;
    z-index: -1;
    background-color: #36c246;
}
.progressbar2 li.active span {
    color: #36c246;
}
.progressbar2 li:first-child span {
    text-align: left;
    margin-left: -88%;
}
.progressbar2 li {
    width: 33.33%;
    text-align: center;
    list-style: none;
    float: left;
    font-size: 14px;
    position: relative;
}
.progressbar2 li {
    width: 33.33%;
    text-align: center;
    list-style: none;
    float: left;
    font-size: 14px;
    position: relative;
}
.progressbar2 li:payment {
    content: counter(step);
    counter-increment: step;
    background-color: #fff;
    color: white;
    border-radius: 50%;
    border: 3px solid #36c246;
    display: block;
    height: 30px;
    line-height: 25px;
    margin: 0 auto 5px auto;
    text-align: center;
    top: -35px;
    width: 30px;
    cursor: pointer;
}
</style>
@endsection
@section('content')
<div class="container" ng-app="myApp" ng-controller="validateCtrl">
  <div class="py-5 text-center" >
      @php
            $imageArray = json_decode($package->image);
            $image =  $imageArray[0];             
      @endphp
    <img class="d-block mx-auto mb-4" src="http://getflights.aresedge.com/storage/{{$image}}" alt="image not found" width="100" height="100">
    <h2 class="text-danger">Booking Your Package</h2>
    <p class="lead">Welcome to the getflighter holiday pakage Booking...</p>
  </div>
  <div class="container-fluid mb10 mt20">
		<div class="row">
      <div class="col-md-12"  ng-if="!(returnData.id || userid)">
        <ul class="progressbar bookingSteps">
          <li class="active" id="reviewItenary"><span>Review </span></li>
          <li id="travellerDetails" ><span>Travellers</span></li>
          <li id="payment"><span style="float:right;">Payment</span></li>
        </ul>
      </div>
      <div class="col-md-12" ng-if="returnData.id || userid ">
        <ul class="progressbar2 bookingSteps">
          <li class="active" id="reviewItenary"><span>Review </span></li>
          <li id="travellerDetails" style="color: #2a9610;"><span>Travellers</span></li>
          <li id="payment"><span style="float:right; position: relative;">Payment</span></li>
        </ul>   
      </div>
    </div>
	</div>
  @include('super_admin.layouts.errors')
	@if(Session::has('flash_message'))
  <div class="alert alert-success"style="color:#e20707; background-color: #e6b9b9;"><span class="glyphicon glyphicon-ok"></span>
		<em>{!! session('flash_message') !!}</em>
	</div> 
	@endif
  <div class="row">
    <div class="show_detail_container" style="margin-top:5%;">
      <div class="col-sm-7" >
        <div class="icon">
          <div class="small1" style="float:left; border-right: 2px solid lightgrey;">
            <p class="yt-holiday-package-title pull-left">
              <span class="seller" style="display:block "><strong>Seller</strong>: {{$SessionValue['seller']}}</span>
              <span class="package" style="color:#000!important"><strong>Selected package</strong> : {{$package->package_name}}</span>
            </p>
          </div>
          <div class="small2" style="float:left; margin-left:50px; border-right: 2px solid lightgrey;">  
            <i class="fa fa-calendar changeyourHotel" style="cursor: default;"></i>
            <small> 
              @php $date =  $SessionValue['arrival'];
                $stringDate = strtotime($date);
                $dateFormate = date( '(D) d-M-Y',$stringDate); 
                echo $dateFormate;
              @endphp
              <p class="inrCont padL25 lastchild" style="float:right; padding:0 11px 0 20px; display:block;"> 
                <span class="flL" style="position:relative;">
                  <i class="fa fa-male" aria-hidden="true" style="font-size:14.5px; line-height:24px; font-family:'Poppins':sans-serif; font-weight:400;"></i>
                  <small> {{$SessionValue['adult']}}&nbsp; Adult(s)</small>
                </span>
              </p>
              <p class="inrCont padL25 lastchild">
                <span class="flL" style="position:relative;">
                  <i class="fa fa-users" aria-hidden="true" style="font-size:14.5px; line-height:24px; font-family:'Poppins':sans-serif; font-weight:400;"></i>
                  <small> {{$SessionValue['children']}}&nbsp; @php echo($SessionValue['children'] == 0 || $SessionValue['children'] == 1 ) ? "Children": "Childrens"; @endphp </small>
                </span>
              </p>
            </small>
          </div>  
        </div>
      </div>
      <div class="col-sm-5">
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
              <td>{{$package->package_rate}}</td>
            </tr>
            <tr>
              <td>Passenger Service Fee</td>
              <td>0</td>
            </tr>
            <tr>
              <th>Total</th>
              <th>{{$package->package_rate}}</th>
            </tr>
          </tbody>
        </table>
				</div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4"  >

      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <h2><span class="text-muted">Your cart</span></h2>
        <span class="badge badge-secondary badge-pill badge-danger">3</span>
      </h4>

      <ul class="list-group mb-3">

        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div class="text-info">
            <h3 class="my-0">{{$package->package_name}}</h3>
            <small class="text-muted">{{$package->trip_highlights}}</small>
          </div><br>
          <span class="text-muted"><b>₹ {{$package->package_rate}}</b></span>
        </li>

        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-info">
            <h3 class="my-0">Promo code</h3>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">-$5</span>
        </li>

        <li class="list-group-item d-flex justify-content-between">
          <span>Total ₹</span>
          <strong>{{$package->package_rate}}</strong>
        </li>

      </ul>
      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary" style="background-color:red; margin-top:10px;">Redeem</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-8 order-md-1">
      <div class="row">
        <span style= "color:green;" ng-show="showNotification"> We will send you notificatin on your <h6 style="color:red;"> @{{returnData.email}} or @{{returnData.contact_no}}</h6> </span>
        <form class="needs-validation" action="{{ route('booking_step2') }}" method="POST" name="myForm" ng-show="isShowUserDataForm">
            {{csrf_field()}}
            <div class="mb-3">
              <label for="email"> <span class="text-muted text-primary">Email*</span></label>
              <input type="hidden" name="arrivaldate" value="{{$SessionValue['arrival']}}">
              <input type="hidden" name="package_id"  value="{{$SessionValue['package_id']}}">
              <input type="hidden" name="children"    value="{{$SessionValue['children']}}">
              <input type="hidden" name="adult"       value="{{$SessionValue['adult']}}">
              <input type="hidden" name="customer_state" value="{{$SessionValue['customer_state']}}">
              <input type="hidden" name="departure_city" value="{{$SessionValue['departure_city']}}">
              <input type="hidden" name="is_booked_by"   value="{{Auth::check() ? 1 : 0}}">
              <input type="hidden" name="guest_id"       value="@{{returnData.id}}">
              <input type="hidden" name="user_id"        value="{{Auth::id()}}">
              <input type="hidden" name="package_rate"         value="{{Crypt::encrypt($package->package_rate)}}">
              <input type="hidden" name="package_name"         value="{{$package->package_name}}">
              
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com"  ng-model="email" ng-pattern="eml_add" value = "{{old('email')}}" required>
              <span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
              <span style="color:red" ng-show="myForm.email.$error.required">Email is required. </span>
              <span style="color:red" ng-show="myForm.email.$error.email">Invalid email address.</span>
              </span>
            </div>
            <br>
            @if(isset($SessionValue['adult']))
            @for ($i = 1; $i <= $SessionValue['adult']; $i++)
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="username"><span class="text-muted text-primary">Adult Name*</span></label>
                <input type="text" class="form-control"   name="aname[]" placeholder="Enter Adult Name"  value = "{{old('aname')}}" required>
              </div>
    
              <div class="col-md-6 mb-3">
                <label for="lastName"><span class="text-muted text-primary">DOB*</span></label>
                <input type="text" name="adob[]" data-provide="datepicker" class="form-control adult_dobs datepicker_re"  value = "{{old('adob')}}" required> 
              </div>
            </div>
            @endfor
            @endif
            <br>
            @if(isset($SessionValue['children']))
            @for ($i = 1; $i <= $SessionValue['children']; $i++)
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="username"><span class="text-muted text-primary">Child Name*</span></label>
                <input type="text" class="form-control" name="cname[]" placeholder="Enter Child Name"  value = "{{old('cname')}}"  required>  
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName"><span class="text-muted text-primary">DOB*</span></label>
                <input type="text"  name="cdob[]"  data-provide="datepicker" class="form-control child_dobs datepicker_re"  value = "{{old('cdob')}}" required>
              </div>
            </div>
            @endfor
            @else
            <div class="row">
                <div class="col-md-6 mb-3"> </div>
                <div class="col-md-6 mb-3"> </div>
            </div>
            @endif
            <br>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="lastName"><span class="text-muted text-primary">Mobile (Enter 10 digits number)*</span></label>
                <input type="number" class="form-control"  name="mobile" placeholder="Enter Mobile Number" string-to-number ng-model="mobile" maxlength="10" ng-pattern="ph_numbr" value = "{{old('mobile')}}" required>
                <span style="color:red" ng-if="myForm.mobile.$error.required && myForm.mobile.$dirty">Please provide your contact number</span>
                <span style="color:red" ng-show="myForm.mobile.$error.pattern">Please enter a 10 digit number</span> 
              </div>

              <div class="col-md-6 mb-3">
                <label for="zip"><span class="text-muted text-primary">Zip*</span></label>
                <input type="number" class="form-control"  name="zip" placeholder="Enter Zip Code" string-to-number ng-model="zip"  ng-pattern="zip_numbr"  value = "{{old('zip')}}"  required>
                <span style="color:red" ng-if="myForm.zip.$error.required && myForm.zip.$dirty">Zip code is a required field</span>
                <span style="color:red" ng-show="myForm.zip.$error.pattern">Please enter a 6 digit number</span> 
              </div>  
            </div>
            <br>
            <hr class="mb-4">
            <input class="btn btn-warning btn-lg btn-block" type="submit" value="CONTINUE" ng-disabled="myForm.$invalid">
        </form>
        <br><br>
      </div>
        
      <div class="row">
        <ul class="nav nav-tabs">
          <li class="active" ng-show="showBookAsGuest"><a data-toggle="tab" href="#home">Book as guest</a></li>
          <li ng-show= "showLoginUser"><a data-toggle="tab" href="#menu5">Login</a></li> 
          <li><a data-toggle="tab" href="#menu2">Terms and conditions</a></li>
          <li><a data-toggle="tab" href="#menu3">About package</a></li> 
          <li><a data-toggle="tab" href="#menu4">Itinerary</a></li>
        </ul>

        <div class="tab-content"  >
            <div id="home" class="tab-pane fade in active" ng-show="showBookAsGuest">
              <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-5"><h3>Book as guest</h3>
                <p ng-repeat="error in errors" ng-if="iserror" style="color:red;">@{{error}}</p>
                  <div class="signupformforbooking">
                
                    <form class="needs-validation" class="form" name="bookAsGuestForm">
                      {{csrf_field()}}
                      <label for="email"> <span class="text-muted text-primary">Email*</span></label>
                  
                      <input type="email" class="form-control" placeholder="Enter you email address" name="email" ng-model="email" ng-pattern="eml_add" required>
                          
                          <span style="color:red" ng-show="bookAsGuestForm.email.$error.required && bookAsGuestForm.email.$dirty">Email is required. </span>
                          <span style="color:red" ng-show="bookAsGuestForm.email.$error.pattern">Invalid email address.</span> 
                      
                      <label for="email"> <span class="text-muted text-primary">Phone number with country code</span></label>
                      
                      <input type="number" class="form-control" placeholder="Enter phone number" name="contact" string-to-number ng-model="contact"   ng-pattern="ph_numbr" autocomplete="off" required>
                        <span style="color:red" ng-show="bookAsGuestForm.contact.$error.required && bookAsGuestForm.contact.$dirty">Contact number is required</span>
                      <span style="color:red" ng-show="bookAsGuestForm.contact.$error.pattern">Please enter a 10 digit number</span> 
                      <br>
                      <button type="submit"  class="btn btn-warning btn-lg btn-block"  ng-click="signUpUser(bookAsGuestForm.$valid, bookAsGuestForm)"  ng-disabled="bookAsGuestForm.$invalid"   style="font-size:12px; padding:0 10px;">Book as guest</button>
                      
                    </form>
                  </div>
                </div>
                <div class="col-sm-4"></div>
              </div>
            </div>
            <div id="menu5" class="tab-pane fade" ng-show= "showLoginUser">
              <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                  
                    <h3>Login with us</h3>
                    <p ng-repeat="error in errors" ng-if="iserror" style="color:red;">@{{error}}</p>
                  <div class="loginformforbooking">
                    <form class="needs-validation"  name="loginForm">
                      {{csrf_field()}}
                      <label for="email"> <span class="text-muted text-primary">Email*</span></label>
                      <input type="email" class="form-control" placeholder="Enter you email address" name="email" ng-model="email" ng-pattern="eml_add" required>
                      <span style="color:red" ng-show="loginForm.email.$error.required && loginForm.email.$dirty">Email is required. </span>
                      <span style="color:red" ng-show="loginForm.email.$error.pattern">Invalid email address.</span><br>

                      <label for="email"> <span class="text-muted text-primary">Password*</span></label>
                      <input type="password" class="form-control"   placeholder="Enter your password" name="password" ng-model="password"  required>
                      <span style="color:red" ng-show="loginForm.password.$error.required && loginForm.password.$dirty">Password is required. </span>
                  
                      <button type="submit"  class="btn btn-warning btn-lg btn-block"  ng-click="loginUser(loginForm.$valid, loginForm)" ng-disabled="loginForm.$invalid"  style="font-size:18px; padding:0 10px;">Sign in with Us</button>

                      <a  class="btn btn-block btn-social btn-facebook" style="background:#23345a;" href="{{url('/login/facebook', $package->id)}}" >
                      <i class="fa fa-facebook" style="font-size:12px; padding:0 10px;"></i>Sign in with Facebook</a>
                  
                      <a  class="btn btn-block btn-social btn-google" style="background:#cc3300;" href="{{url('/login/google', $package->id)}}" >
                      <i class="fa fa-google" style="font-size:12px; padding:0 10px;"></i>Sign in with Google</a>
                    </form>
                  </div>
                </div>
                <div class="col-sm-4"></div>
              </div>
            </div>
          
            <div id="menu2" class="tab-pane fade">
              <h3>Terms and conditions</h3>
              <p>{{$package['terms_conditions']}}</p>
              <p>{{$package['cancellation_policy']}}</p>
            </div>
            <div id="menu3" class="tab-pane fade">
              <h3>About package</h3>
              <p>{{$package['about_package']}}</p>
            </div>
            
            <div id="menu4" class="tab-pane fade">

              <div class="tour_head1 l-info-pack-days days">
                <h3>Detailed Day Wise Itinerary</h3>
                <ul>
                  @php	$datas=json_decode($package->itinerarys)   @endphp
                    @foreach($datas as $data)	
                      <li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <h4><span>Day :{{$data->day}}</span> {{$data->day_title}}</h4>
                          <h5 style="color:black;"><span>Day Summary : </span>{{$data->day_summary or '-'}}</h5>
                          <div vlass="row">
                            <div class="col-md-6">
                              <h4><span>Hotel Name : </span>{{$data->hotel_name}}</h4>
                            </div>
                            <div class="col-md-6">
                              <img src="http://getflights.aresedge.com/storage/{{$data->hotel_image}}" class="img-circle" style="height:150px; width:150px;">
                            </div>
                          </div>	
                      </li>
                    @endforeach
                </ul>
                </div>
              </div>
            </div> 
      </div>
      <br>
    </div>
  </div>
   

</div>


@endsection
@section('script')
<script>

//============================================ DATE PICKER ===========================================================
var currentDate = $( ".datepicker_re" ).datepicker({
			    dateFormat: 'dd-mm-yy',
          autoclose: true	
        }).val();
		

//============================================ JQUERY VALIDATION AND SUBMIT FORM =====================================

var authcheck = $('#authcjked').html();
//console.log(authcheck);
var authcheckvalue = authcheck == 1 ? false : true;
var app = angular.module('myApp', []);
app.controller('validateCtrl',($scope,$http) => { 
  $scope.ph_numbr = /^\+?\d{10}$/;
  $scope.eml_add = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;                              // email pattren for form validation 
  $scope.zip = /^\+?\d{4}$/;
  $scope.isShowUserDataForm  =  authcheckvalue == true ? false : true;          // hide user package form 
  $scope.showBookAsGuest     =  authcheckvalue == true ? true  : false;        //show user asbook guest
  $scope.showLoginUser       =  authcheckvalue == true ? true  : false;       //show user login form                        
  $scope.showNotification    =  false;
  $scope.iserror = false;
  // console.log( $scope.showLoginUser );
  // $scope.userid = "{{Auth::id()}}";

  //============================================ USER SIGN IN =============================

  $scope.signUpUser = function(isvalid){
    if (isvalid) {
      var data = {
        email: $scope.email,
        contact_no: $scope.contact
      }
        
      $http.post("{{route('asguest')}}", data).then( response => {
        $scope.returnData = response.data.data;
        $scope.isShowUserDataForm  = true;       //show user package form 
        $scope.showBookAsGuest     = false;     
        $scope.showLoginUser       = authcheckvalue;
        $scope.showNotification    = true;
        $scope.iserror             = false;
        console.log(response);
        
        }).catch(error => {
          $scope.errors = error.data.error;
          $scope.isShowUserDataForm  = false;        // hide user package form 
          $scope.showBookAsGuest     = true;         //show user login form
          $scope.showNotification    = false;
          $scope.iserror             = true;
          
        })
    }
      
  }

       //=============================================== USER LOGIN ===========================

  $scope.loginUser = function(){
    var data = {
      email: $scope.email,
      password:$scope.password
    }
    $http.post("{{route('loginUser')}}", data).then( response => {
      
      $scope.showLoginUser       =  false;  
      $scope.showBookAsGuest     =  false;  
      $scope.isShowUserDataForm  =  true; 
      $scope.iserror = false;
      alert("successfully login");
     
      }).catch(error => {
        $scope.errors = error.data.error;
        $scope.iserror = true;
      })
  }
});

//=================================== ADULT AND CHILDERN DATEOF BIRTH VALIDATION ==========================
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

</script>

@endsection