@extends('home.layouts.app',['cssclass' => 'home'])
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
    <style>
.activeclass {
    transform: scale(1.1);
    background: #f4364f;
    background: linear-gradient(to bottom,#f4364f,#dc2039);
    border: 1px solid #d41e36;
}
.view{

    color: #fff !important;
    font-size: 14px !important;
    font-weight: 400;
}
/**media query**/
@media screen and (max-width: 768px){
    .row .col.s2 {
    width:100%}  
    .row .col.s1 {
        width: 100%;
    }
    .row .col.s3 {
        width: 100%;}
    .btn-default {
        background-color: #fff;
        border-color: #ccc;
        color: #333 !important;
    }

}
@media screen and (max-width: 767px){
    .tourz-hom-ser ul li a {
    width: 54px;
    height: 60px;
    padding: 10px 2px 10px 2px;
    }
    .tourz-hom-ser ul li {
    width: 20%;
    margin-bottom: 10px;
    }
    .view{
    font-size: 12px !important;
    color: #fff !important;
    padding: 0 0 5px 0;
    display: block !important;
    }
    .tourz-hom-ser ul li a {
    width: 54px;
    height: 60px;
    padding: 6px 5px 10px 2px;
    }

    .text{
        display: block;
    }

}
@media only screen and (max-width: 767px){
        .col s2 sm12{
        width: 50%;
        }
        .row .col.s1 {
        width: 100% !important;
        }
        .box{
        position: relative;
        top: 85px;
        left: 0;
        }

        .non{
        position: relative !important;
        top: -80px;
        }
        .multi{
        position: relative;
        top: -30px;
        }
}
@media screen and (max-width: 767px){
    .nav li a:hover, .nav li a.dropdown-toggle.active {
     background-color: #fff !important;
    }
    .small-td{
        width:50%;
    }
     .small-tds{
        width:48%;
        margin-left: -7px;
    }
    .s-btn button{
    margin-left: -200px !important;
    margin-top: 17px !important;
    }
    .spe-title h2 span{
    font-size: 25px;
    }
    .spe-title h2{
    font-size: 24px;
    }
    .spe-title p{
        font-size:16px;
    }
    .nav .button-dropdown {
    position: relative;
    left: 10px;
    }
 
}
@media screen and (max-width: 568px){
    .tourz-hom-ser ul li a {
    width: 47px;
    height: 60px;
    padding: 6px 5px 10px 2px;
    }
    .view {
    font-size: 10px !important;
    }
    .link-btn{
        width:100%;
    }
}
@media screen and (max-width: 1024px){
    .row .col.s1 {
        width: 50%;
    }
    .dropup, .dropdown {
        position: relative;
        margin: 0 0 0 -265px;
    }
}
    .nav {
    display: block;
    font: 13px Helvetica, Tahoma, serif;
    text-transform: uppercase;
    margin: 0; 
    padding: 0;
   }

.nav li {
    display: inline-block;
    list-style: none;
}

.nav .button-dropdown {
    position: relative;
}

.nav li a {
    display: block;
    color: #333;
    background-color: #fff;
    padding: 10px 20px;
    text-decoration: none;
}

.nav li a span {
    display: inline-block;
    margin-left: 5px;
    font-size: 10px;
    color: #999;
}

.nav li a:hover, .nav li a.dropdown-toggle.active {
    background-color: #289dcc;
    color: #fff;
}

.nav li a:hover span, .nav li a.dropdown-toggle.active span {
    color: #fff;
}

.nav li .dropdown-menu {
    display: none;
    position: absolute;
    left: 0;
    padding: 0;
    margin: 0;
    margin-top: 3px;
    text-align: left;
}

.nav li .dropdown-menu.active {
    display: block;
}

.nav li .dropdown-menu a {
    width: 150px;
}
.v2-search-form {
    padding: 12px 12px 30px 12px;
}
.radio-inline, .checkbox-inline {
    position: relative;
    display: inline-block;
    padding-left: 20px;
    margin-bottom: 0;
    font-weight: normal;
    vertical-align: middle;
    cursor: pointer;
    margin-top: 5px !important;
}
.v2-search-form input {
    background: #fff;
    border: 0px;
    height: 45px;
    border-radius: 2px;
    padding: 0px 10px;
    box-sizing: border-box;
    font-size: 14px !important;
    border: 1px solid #efefef;
}
.input-field #flying_from {
        color: #000 !important;
}
.waves-effect input[type="button"], .waves-effect input[type="reset"], .waves-effect input[type="submit"] {
    border: 0;
    font-style: normal;
    font-size: inherit;
    text-transform: inherit;
    background: none;
    color: #fff;
}
 .btn, .btn-large {
    text-decoration: none;
    text-align: center;
    letter-spacing: .5px;
    transition: .2s ease-out;
    cursor: pointer;
    color: #000;
    font-weight: 600;
    font-family: 'Quicksand', sans-serif;
}
.btn, .btn-large {
    text-decoration: none;
    text-align: center;
    letter-spacing: .5px;
    transition: .2s ease-out;
    cursor: pointer;
    color: #000;
    font-weight: 600;
    font-family: 'Quicksand', sans-serif;
    margin-top: -13px;
}
.dropdown-menu{
  margin-top: 25px !important;
}
input-field:nth-child(2){
        position: absolute;
    left: -50px;
}
/**media query**/
@media screen and (max-width: 768px){
 .row .col.s2 {
    width:100%}  
    .row .col.s1 {
        width: 100%;
    }
    .row .col.s3 {
        width: 100%;
    }
    .btn-default {
        background-color: #fff;
        border-color: #ccc;
        color: #333 !important;
    }
    .tourz-search-1 h1 {
    color: #fff;
    font-size: 26px;
    }
}
@media screen and (max-width: 1024px){
    .row .col.s1 {
        width: 50%;
    }
    .dropup, .dropdown {
        position: relative;
        margin: 0 0 0 -265px;
    }
}
    </style>
@endsection
@section('content')


<!--HEADER SECTION-->
    <section> 
        <div class="tourz-search"  ng-controller="validateCtrl" ng-app="myApp">
            <div class="container">
                <div class="row">
                   
                    <div class="tourz-search-1">
                      <h1>Plan Your Travel Now!</h1>
                        <p>Experience the various exciting tour and travel packages and Make hotel reservations, find vacation packages, search cheap hotels and events</p>
                        @if(Session::has('flash_message'))
                            <div class="alert alert-info" style="background-color:pink;">
                            <span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em>
                            </div>
                        @endif
                       
                        <div class="tourz-hom-ser">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" value="1" href="#flights" class="tab_switch waves-effect waves-light btn-large tourz-pop-ser-btn wow fadeInUp" data-wow-duration="0.5s"><img src="images/icon/31.png" alt=""> <span class="view">Flight</span></a>
                                </li>
                                <li>
                                    <a data-toggle="tab" value="2" href="#hotels" class="tab_switch waves-effect waves-light btn-large tourz-pop-ser-btn wow fadeInUp" data-wow-duration="1s"><img src="images/icon/1.png" alt=""> <span class="view"> Hotel</span></a>
                                </li>
                                <li>
                                    <a data-toggle="tab" value="3" href="#tours" class="tab_switch waves-effect waves-light btn-large tourz-pop-ser-btn wow fadeInUp" data-wow-duration="1.5s"><img src="images/icon/2.png" alt=""><span class="view"> Tour </span></a>
                                </li>
                                
                                <li>
                                    <a data-toggle="tab" value="4" href="#buses" class="tab_switch waves-effect waves-light btn-large tourz-pop-ser-btn wow fadeInUp" data-wow-duration="2s"><img src="images/icon/30.png" alt=""><span class="view"> Bus</span></a>
                                </li>
                                <li>
                                    <a data-toggle="tab" value="5" href="#visas" class="tab_switch waves-effect waves-light btn-large tourz-pop-ser-btn wow fadeInUp" data-wow-duration="2s"><img src="images/icon/30.png" alt=""><span class="view"> Visa</span></a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <div class="tab-content" >

                                <div id="flights" class="tab-pane fade in active">
                                    <form class="v2-search-form" name="myForm1" action="/air/getairdata">
                                        <input type="hidden" name="segment" value="@{{options.length }}" ng-if="options.length > 0">
                                        <input type="hidden" name="no_of_adults" value="@{{adult }}">
                                        <input type="hidden" name="no_of_child" value="@{{child }}">
                                        <input type="hidden" name="infant" value="@{{infant}}">

                                        <div class="row">
                                            <div class="input-field col s2 sm12">
                                                <input type="text" id="flying_from" name="flying_from" class="flying_code" placeholder="Flying From" ng-model="flying_from" autocomplete="off" required>
                                                <label for="select-city">Flying From</label>
                                                <span style="color:red" ng-show="myForm1.flying_from.$touched && myForm1.flying_from.$invalid">This feild is required.</span>
                                            </div>
                                            <div class="input-field col s2 sm12">
                                                <input type="text" id="flying_to" name="flying_to" class="flying_code"  placeholder="Flying To" ng-model="flying_to" autocomplete="off" required>
                                                <label for="select-city">Flying To</label>
                                                <span style="color:red" ng-show="myForm1.flying_to.$touched && myForm1.flying_to.$invalid">This feild is required.</span>
                                            </div>
                                            
                                            <div class="input-field col s2 sm12">
                                                <input  id="to_to"  name="departure_date" data-provide="datepicker" class="datepicker" type="text"  
                                                  autocomplete="off">
                                                <label for="to">Departure Date</label>
                                            </div>
                                        

                                            <div class="input-field col s2 sm12" ng-if="options.length == 0">
                                                <input type="text" id="from_from"  data-provide="datepicker" data-date-start-date="+3d"  class="datepicker_re"
                                                 name="arrival_date" autocomplete="off" data-date-format="dd/mm/yyyy">
                                                <label for="from">Return Date</label>
                                            </div>

                                            <div class="input-field col s3 sm12">
                                                @include('home.layouts.passenger')
                                            </div>

                                             <div class="input-field col s1 box">
                                                <input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn v2-ser-btn" ng-click="formsubmit(myForm1.$valid,myForm1)"  ng-disabled="myForm1.$invalid">
                                            </div>

                                        </div><br>

                                        <div class="row"  ng-show="options.length > 0" ng-repeat="(index, option) in options track by $index">
                                            <div class="form-line tab-content">
                                                <div class="row" style=" margin-left: 38px;">
                                                    <div class="small-td">
                                                        <div class="input-field col s2 sm12">
                                                            <input type="text" id="flying_from_@{{index + 1}}"  autocomplete="off" name="flying_from_@{{index + 1}}" class="flying_code_drop" style="margin-left: -73px;" placeholder="Flying From" required>
                                                        </div>
                                                            <!-- <label for="select-city">Flying From</label> -->
                                                    </div>
                                                        
                                                    <div class="input-field col s2 sm12">
                                                        <div class="small-tds">
                                                            <input type="text" id="flying_to_@{{index + 1}}" autocomplete="off" style="margin-left: -62px;" name="flying_to_@{{index + 1}}" class="flying_code_drop" placeholder="Flying To"  required>
                                                            <!-- <label for="select-city">Flying To</label> -->
                                                        </div>
                                                    </div>

                                                    <div class="input-field col s2 sm12" style="margin-left: -27px;">
                                                        <div class="small-tds">
                                                            <input type="text" class="virtual_date" data-date-start-date="0d" data-date-format="dd/mm/yyyy" valueId="@{{index + 1}}" id="from_@{{index + 1}}" 
                                                            data-provide="datepicker"  name="arrival_date_@{{index + 1}}" 
                                                            class="datepicker_re"/>
                                                            <label for="from">Return Date</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-2"> 
                                                        <a href="#" ng-click="deletef($index)" id="delete_flying" >
                                                            <i class="fa fa-remove fa-span" style="font-size : 24px; margin-left: -145px; margin-top: 23px; color : red;" ></i>
                                                        </a>
                                                    </div>

                                                    <div class="col-sm-2"  ng-if="$last">
                                                        <div class="s-btn">
                                                            <button type="button" style="margin-left: -323px;  margin-top: 17px;" ng-click="addmore()" class="btn btn-red">Add City </button>
                                                        </div>
                                                    </div>

                                                </div>   
                                            </div>
                                        </div> 

                                        <div class="col-sm-3 col-md-4 col-sm-offset-0 checkbox-inline ctiy multi" style="color: #333; display:block;" >
                                            <input type="checkbox" ng-model="ischecked" style="margin-top: -10px;  margin-left: -49px;"  ng-click="toggle()">
                                            <span style=" margin-left: -20px;">Create Multi-city Route</span>
                                        </div> 

                                        <div class="col-sm-3 col-sm-offset-0 checkbox-inline text non" style="color: #333;" >
                                            <input type="checkbox" name="direct" value="1" style="margin-top: -10px;  margin-left: -109px;" >
                                            <span style=" margin-left: -80px;">Non Stop Flights</span>
                                        </div>

                                        

                                    </form>         

                                </div>

                                <div id="hotels" class="tab-pane fade">
                                    <form class="v2-search-form" action="/gethoteldata" name="myForm2"> 
                                        <div class="row">
                                            <div class="input-field col s2">
                                                <input type="text" id="selectcity" name="city" class="autocompletbbbe" placeholder="City, Destination and Hotel Name" autocomplete="off" ng-model="city" required>
                                                <span style="color:red" ng-show="myForm2.city.$touched && myForm2.city.$invalid">This feild is required.</span>
                                            </div>
                                            <div class="input-field col s2 sm12">
                                                <input type="text" id="hotel_to"  name="check_in_date" data-provide="datepicker" class="hotel_datepicker"  
                                                    autocomplete="off">
                                                <label for="from">Check In</label>
                                            </div>
                                            <div class="input-field col s2 sm12" ng-if="options.length == 0">
                                                <input type="text" id="hotel_from" data-provide="datepicker" data-date-start-date="0d"  class="hotel_datepicker_re"
                                                    name="check_out_date" autocomplete="off">
                                                <label for="to">Check Out</label>
                                            </div>
                                            <div class="input-field col s2">
                                                <select name="no_of_adults">
                                                <option value="" disabled selected required>Adults</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                </select>
                                            </div>
                                                <div class="input-field col s2">
                                                <select name="no_of_child">
                                                <option value="" disabled selected required>Childrens</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>                      
                                                </select>
                                            </div>
                                            <div class="input-field col s2">
                                                <input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn v2-ser-btn" ng-click="formsubmit(myForm2.$valid,myForm2)"  ng-disabled="myForm2.$invalid">
                                            </div>
                                        </div>                                 
                                    </form>       
                                </div>

                                <div id="tours" class="tab-pane fade">
                                    <form class="v2-search-form" action="/holidays/search" name="myForm3">
                                        <div class="row">
                                            <div class="input-field col s3">
                                                <input type="text" id="p_flying_from" name="from" class="autocomplete" placeholder="Flying From" ng-model="from" autocomplete="off" required>
                                                <label for="p_flying_from">From</label>
                                                <span style="color:red" ng-show="myForm3.from.$touched && myForm3.from.$invalid">This feild is required.</span>
                                            </div>
                                            <div class="input-field col s3">
                                                <input type="text" id="p_flying_to" name="to" class="autocomplete" placeholder="Flying To"  ng-model="to" autocomplete="off" required>
                                                <label for="p_flying_to"> To</label>
                                                <span style="color:red" ng-show="myForm3.to.$touched && myForm3.to.$invalid">This feild is required.</span>
                                            </div>
                                            <div class="input-field col s4">
                                                <select name="month_of_travel" required>
                                                    <option value="0" selected>Month of Travel(Any)</option>
                                                    <option value="6">May 2018</option>
                                                    <option value="7">June 2018</option>
                                                    <option value="8">July 2018</option>
                                                    <option value="9">August 2018</option>
                                                    <option value="10">September 2018</option>
                                                </select>
                                            </div>
                                            <div class="input-field col s2">
                                                <input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn v2-ser-btn" ng-click="formsubmit(myForm3.$valid,myForm3)"  ng-disabled="myForm3.$invalid">
                                            </div>
                                        </div>                                 
                                    </form>                  
                                </div>

                                <div id="buses" class="tab-pane fade">
                                    <form class="v2-search-form" action="/holidays/search" name="myForm4">
                                        <div class="row">
                                            <div class="input-field col s3">
                                                <input type="text" id="p_flying_from" name="from" class="autocomplete" placeholder="Flying From" ng-model="from" required>
                                                <label for="p_flying_from">From</label>
                                                <span style="color:red" ng-show="myForm4.from.$touched && myForm4.from.$invalid">This feild is required.</span>
                                            </div>
                                            <div class="input-field col s3">
                                                <input type="text" id="p_flying_to" name="to" class="autocomplete" placeholder="Flying To" ng-model="to" required>
                                                <label for="p_flying_to"> To</label>
                                                <span style="color:red" ng-show="myForm4.to.$touched && myForm4.to.$invalid">This feild is required.</span>
                                            </div>
                                            <div class="input-field col s4">
                                                <select name="month_of_travel" required>
                                                    <option value="0" selected>Month of Travel(Any)</option>
                                                    <option value="6">May 2018</option>
                                                    <option value="7">June 2018</option>
                                                    <option value="8">July 2018</option>
                                                    <option value="9">August 2018</option>
                                                    <option value="10">September 2018</option>
                                                </select>
                                            </div>
                                            <div class="input-field col s2">
                                                <input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn v2-ser-btn" ng-click="formsubmit(myForm4.$valid,myForm4)"  ng-disabled="myForm4.$invalid">
                                            </div>
                                        </div>                                
                                    </form>             
                                </div>

                                <div id="visas" class="tab-pane fade">
                                    <form class="v2-search-form" action="/holidays/search" name="myForm5">
                                        <div class="row">
                                            <div class="input-field col s3">
                                                <input type="text" id="p_flying_from" name="from" class="autocomplete" placeholder="Flying From" ng-model="from" required>
                                                <label for="p_flying_from">From</label>
                                                <span style="color:red" ng-show="myForm5.from.$touched && myForm5.from.$invalid">This feild is required.</span>
                                            </div>
                                            <div class="input-field col s3">
                                                <input type="text" id="p_flying_to" name="to" class="autocomplete" placeholder="Flying To" ng-model="to" required>
                                                <label for="p_flying_to"> To</label>
                                                <span style="color:red" ng-show="myForm5.to.$touched && myForm5.to.$invalid">This feild is required.</span>
                                            </div>
                                                <div class="input-field col s4">
                                                <select name="month_of_travel" required>
                                                    <option value="0" selected>Month of Travel(Any)</option>
                                                    <option value="6">May 2018</option>
                                                    <option value="7">June 2018</option>
                                                    <option value="8">July 2018</option>
                                                    <option value="9">August 2018</option>
                                                    <option value="10">September 2018</option>
                                                </select>
                                            </div>
                                            <div class="input-field col s2">
                                                <input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn v2-ser-btn" ng-click="formsubmit(myForm5.$valid,myForm5)"  ng-disabled="myForm5.$invalid">
                                            </div>
                                        </div> 
                                    </form>
                                </div>                            
                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>

<section>
<div class="rows pad-bot-redu tb-space">
    <div class="container">
        <!-- TITLE & DESCRIPTION -->
        <div class="spe-title">
            <h2><span>Tour Packages</span></h2>
            <div class="title-line">
                <div class="tl-1"></div>
                <div class="tl-2"></div>
                <div class="tl-3"></div>
            </div>
            <p>World's leading tour and travels Booking website,Over 30,000 packages worldwide.</p>
        </div>
        <div>
            <!-- TOUR PLACES-->

        
            @foreach($packages->chunk(3) as $chunk_package)
                <div class="row">
                    @foreach($chunk_package as $package)
                        @php $images=json_decode($package->image); @endphp  
                        <div class="col-md-4 col-sm-6 col-xs-12 b_packages wow fadeInUp" data-wow-duration="1.5s">
                                <div class="v_place_img">
                                    <img src="http://getflights.aresedge.com/storage/{{$images[1]}}" alt="Tour Booking" title="Tour Booking"/>
                                </div> 
                            <div class="b_pack rows">
                                <div class="col-md-8 col-sm-8">
                                    <h4><a href="{{route('package_details',$package->slug)}}">{{$package->package_name}}<span class="v_pl_name"></span></a></h4>
                                </div>
                                <div class="col-md-4 col-sm-4 pack_icon">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
       
       </div>
    </div>
</div>
</section>
<!--====== POPULAR TOUR PLACES ==========-->
<section>
<div class="rows pla pad-bot-redu tb-space">
    <div class="pla1 p-home container">
        <!-- TITLE & DESCRIPTION -->
        <div class="spe-title spe-title-1">
            <h2>Top <span>Sight Seeing</span> in this month</h2>
            <div class="title-line">
                <div class="tl-1"></div>
                <div class="tl-2"></div>
                <div class="tl-3"></div>
            </div>
            <p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
        </div>
        <div class="popu-places-home">
            <!-- POPULAR PLACES 1 -->
            <div class="col-md-6 col-sm-6 col-xs-12 place">
                <div class="col-md-6 col-sm-12 col-xs-12"> <img src="images/place2.jpg" alt="" /> </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <h3><span>Honeymoon Package</span> 7 Days / 6 Nights</h3>
                    <p>lorem ipsum simplelorem ipsum simplelorem ipsum simplelorem ipsum simple</p> <a href="tour-details.html" class="link-btn">more info</a> </div>
            </div>
            <!-- POPULAR PLACES 2 -->
            <div class="col-md-6 col-sm-6 col-xs-12 place">
                <div class="col-md-6 col-sm-12 col-xs-12"> <img src="images/place1.jpg" alt="" /> </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <h3><span>Family package</span> 14 Days / 13 Nights</h3>
                    <p>lorem ipsum simplelorem ipsum simplelorem ipsum simplelorem ipsum simple</p> <a href="tour-details.html" class="link-btn">more info</a> </div>
            </div>
        </div>
        <div class="popu-places-home">
            <!-- POPULAR PLACES 3 -->
            <div class="col-md-6 col-sm-6 col-xs-12 place">
                <div class="col-md-6 col-sm-12 col-xs-12"> <img src="images/place3.jpg" alt="" /> </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <h3><span>Weekend Package </span> 3 Days / 2 Nights</h3>
                    <p>lorem ipsum simplelorem ipsum simplelorem ipsum simplelorem ipsum simple</p> <a href="tour-details.html" class="link-btn">more info</a> </div>
            </div>
            <!-- POPULAR PLACES 4 -->
            <div class="col-md-6 col-sm-6 col-xs-12 place">
                <div class="col-md-6 col-sm-12 col-xs-12"> <img src="images/place4.jpg" alt="" /> </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <h3><span>Group Package</span> 10 Days / 9 Nights</h3>
                    <p>lorem ipsum simplelorem ipsum simplelorem ipsum simplelorem ipsum simple</p> 
                    <a href="tour-details.html" class="link-btn">more info</a> </div>
            </div>
        </div>
    </div>
</div>
</section>


<!--====== REQUEST A QUOTE ==========-->
<section>
<div class="ho-popu tb-space pad-bot-redu">
    <div class="rows container">
 
        <div class="ho-popu-bod">
            <div class="col-md-6">
                <div class="hot-page2-hom-pre-head">
                    <h4>Popular Domestic  <span>Routes in India</span></h4>
                </div>
                <div class="hot-page2-hom-pre">
                
                    <ul>
                        <!--LISTINGS-->
                        <li>
                            <a href="hotels-list.html">
                               
                                <div class="hot-page2-hom-pre-2">
                                    <h5>Delhi to Mumbai</h5> 
                            </a>
                        </li>
                        <!--LISTINGS-->
                      <li>
                            <a href="hotels-list.html">
                               
                                <div class="hot-page2-hom-pre-2">
                                    <h5>Delhi to Mumbai</h5> 
                            </a>
                        </li>
                        <!--LISTINGS-->
                      <li>
                            <a href="hotels-list.html">
                               
                                <div class="hot-page2-hom-pre-2">
                                    <h5>Delhi to Mumbai</h5> 
                            </a>
                        </li>
                        <!--LISTINGS-->
                    <li>
                            <a href="hotels-list.html">
                               
                                <div class="hot-page2-hom-pre-2">
                                    <h5>Delhi to Mumbai</h5> 
                            </a>
                        </li>
                        <!--LISTINGS-->
                     <li>
                            <a href="hotels-list.html">
                               
                                <div class="hot-page2-hom-pre-2">
                                    <h5>Delhi to Mumbai</h5> 
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="hot-page2-hom-pre-head">
                    <h4>Popular International  <span>Routes from India</span></h4>
                </div>
                <div class="hot-page2-hom-pre">
                    <ul>
                        <!--LISTINGS-->
                    <li>
                            <a href="hotels-list.html">
                               
                                <div class="hot-page2-hom-pre-2">
                                    <h5>Mumbai to Dubai Flights</h5> 
                            </a>
                        </li>
                        <!--LISTINGS-->
                       <li>
                            <a href="hotels-list.html">
                               
                                <div class="hot-page2-hom-pre-2">
                                    <h5>Mumbai to Dubai Flights</h5> 
                            </a>
                        </li>
                        <!--LISTINGS-->
                        <li>
                            <a href="hotels-list.html">
                               
                                <div class="hot-page2-hom-pre-2">
                                    <h5>Mumbai to Dubai Flights</h5> 
                            </a>
                        </li>
                        <!--LISTINGS-->
                    <li>
                        <a href="hotels-list.html">
                            
                            <div class="hot-page2-hom-pre-2">
                            <h5>Mumbai to Dubai Flights</h5> 
                        </a>
                    </li>
                        <!--LISTINGS-->
                   <li>
                            <a href="hotels-list.html">
                               
                                <div class="hot-page2-hom-pre-2">
                                    <h5>Mumbai to Dubai Flights</h5> 
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
           
        </div>
    </div>
</div>
</section>
<!--====== TIPS BEFORE TRAVEL ==========-->
<section>
<div class="rows tips tips-home tb-space home_title">
    <div class="container tips_1">
        <!-- TIPS BEFORE TRAVEL -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <h3>Tips Before Travel</h3>
            <div class="tips_left tips_left_1">
                <h5>Bring copies of your passport</h5>
                <p>Aliquam pretium id justo eget tristique. Aenean feugiat vestibulum blandit.</p>
            </div>
            <div class="tips_left tips_left_2">
                <h5>Register with your embassy</h5>
                <p>Mauris efficitur, ante sit amet rhoncus malesuada, orci justo sollicitudin.</p>
            </div>
            <div class="tips_left tips_left_3">
                <h5>Always have local cash</h5>
                <p>Donec et placerat ante. Etiam et velit in massa. </p>
            </div>
        </div>
        <!-- CUSTOMER TESTIMONIALS -->
        <div class="col-md-8 col-sm-6 col-xs-12 testi-2">
            <!-- TESTIMONIAL TITLE -->
            <h3>Customer Testimonials</h3>
            <div class="testi">
                <h4>John William</h4>
                <p>Ut sed sem quis magna ultricies lacinia et sed tortor. Ut non tincidunt nisi, non elementum lorem. Aliquam gravida sodales</p> <address>Illinois, United States of America</address> 
            </div>
            <!-- ARRANGEMENTS & HELPS -->
            <!-- <h3>Arrangement & Helps</h3>
            <div class="arrange"> -->
                <!-- <ul> -->
                    <!-- LOCATION MANAGER -->
                    <!-- <li style="height:75px; width:350px; background-color:black;" align="center">
                        <a href="#">Customer Support</a>
                    </li> -->
                    <!-- PRIVATE GUIDE -->
                    <!-- <li>
                        <a href="#"><img src="images/Private-Guide.png" alt=""> </a>
                    </li> -->
                    <!-- ARRANGEMENTS -->
                    <!-- <li>
                        <a href="#"><img src="images/Arrangements.png" alt=""> </a>
                    </li> -->
                    <!-- EVENT ACTIVITIES -->
                    <!-- <li>
                        <a href="#"><img src="images/Events-Activities.png" alt=""> </a>
                    </li> -->
                <!-- </ul> -->
          <!--  </div>-->
        </div>
    </div>
</div>
</section>

@endsection


@section('script')


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js">
</script>

<script type="text/javascript">

$(document).ready(function() {
    $("#to").datepicker();
    $("#from_from").datepicker();
    // $("button").click(function() {
    // 	var selected = $("#dropdown option:selected").text();
    //     var departing = $("#to_to").val();
    //     var returning = $("#from_from").val();
    //     if (departing === "" || returning === "") {
	// 		alert("Please select departing and returning dates.");
    //     } else {
	// 		confirm("Would you like to go to " + selected + " on " + departing + " and return on " + returning + "?");
    //     }
    // });
});

    //   =======================Dropdown JS Start=========================//

jQuery(document).ready(function (e) {
function t(t) {
    e(t).bind("click", function (t) {
        t.preventDefault();
        e(this).parent().fadeOut()
    })
}
e(".dropdown-toggle").click(function () {
    console.log('yesss');
    
    var t = e(this).parents(".button-dropdown").children(".dropdown-menu").is(":hidden");
    e(".button-dropdown .dropdown-menu").hide();
    e(".button-dropdown .dropdown-toggle").removeClass("active");
    if (t) {
        e(this).parents(".button-dropdown").children(".dropdown-menu").toggle().parents(".button-dropdown").children(".dropdown-toggle").addClass("active")
    }
});
e(document).bind("click", function (t) {
    var n = e(t.target);
    if (!n.parents().hasClass("button-dropdown")) e(".button-dropdown .dropdown-menu").hide();
});
e(document).bind("click", function (t) {
    var n = e(t.target);
    if (!n.parents().hasClass("button-dropdown")) e(".button-dropdown .dropdown-toggle").removeClass("active");
})


$( ".to_do" ).change(function() {
  alert( "Handler for .change() called." );
});

$('#to_to').change(function () {
    alert("sssss");
});

}); 


// ================================Dropdown JS  End===================================//

    $(document).ready(function() {
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        var startDate;
        var endDate;


        $( ".datepicker" ).datepicker({
                format: "dd/mm/yyyy",
                startDate: today,
                autoclose: true
        }).on('changeDate', function(e){
            startDate = $(this).datepicker('getDate');
            console.log(startDate)
        });
    
        $(document).on('click', '.virtual_date', function(){
            $(this ).datepicker({
                format: "dd/mm/yyyy",
                todayHighlight: true,
                startDate: today,
                autoclose: true
            });
        })
    

        $( ".datepicker_re" ).datepicker({
                format: "dd/mm/yyyy",
                startDate: startDate,
                autoclose: true
        }).on('changeDate', function(e) {
            if($('#to_to').val()){
            var returnDate = moment($(this).val(), "DD/MM/YYYY")
            var departureDate = moment($('#to_to').val(), "DD/MM/YYYY");

            if (returnDate < departureDate) {
                $(this).val('');
                console.log("No")
            } else {
                console.log("yes")
            }
            }else{
                $(this).val('');
            }
        });
    
        $('#from_from').change(function(){
            if($('#to_to').val()){
            // return 
            }else{
                $(this).val('');
            }
        });

        $(document).on('change','.virtual_date', function(){
            var returnValue =  $(this).val();
            var returnDateId =  $(this).attr('valueId');
            var previousReturnId = parseInt(returnDateId-1);
            var returnDateFormat = moment(returnValue, "DD/MM/YYYY");
            var departureDateFormat
            if (previousReturnId == 0) {
                if ($("#to_to").val() == '' ) {
                    $(this).val('');
                        
                } else {
                    departureDateFormat = moment($('#to_to').val(), "DD/MM/YYYY");

                        if(returnDateFormat < departureDateFormat){
                            $(this).val('');

                        }
                }

                } else {
                    if ($("#from_"+previousReturnId).val() == '' ) {
                    $(this).val('');
                } else {
                    departureDateFormat = moment($("#from_"+previousReturnId).val(), "DD/MM/YYYY");
                    if(returnDateFormat < departureDateFormat){

                        $(this).val('');

                    }
                }
            }
            $(this).datepicker('hide');
        
        });


        //==================== hotel date picker script atul =================//

        
        $( ".hotel_datepicker" ).datepicker({
                format: "dd/mm/yyyy",
                startDate: today,
                autoclose: true
        }).on('changeDate', function(e){
            startDate = $(this).datepicker('getDate');
            console.log(startDate)
        });
    

        $( ".hotel_datepicker_re" ).datepicker({
                format: "dd/mm/yyyy",
                startDate: startDate,
                autoclose: true
        }).on('changeDate', function(e) {
            if($('#hotel_to').val()){
            var returnDate = moment($(this).val(), "DD/MM/YYYY")
            var departureDate = moment($('#to_to').val(), "DD/MM/YYYY");

            if (returnDate < departureDate) {
                $(this).val('');
                console.log("No")
            } else {
                console.log("yes")
            }
            }else{
                $(this).val('');
            }
        });
    
        $('#hotel_from').change(function(){
            if($('#hotel_to').val()){
            // return 
            }else{
                $(this).val('');
            }
        });


    });


   

$(document).on('click', '#delete_flying', function(e) {
    e.preventDefault()
});
//----------------------------------------  FETCH ALL CITIES FOR HOTELS ---------------------------------
$(document).ready(function() {

var datacity
$.get( "/api/hotelcitycode/1", function( data ) {
    datacity = data
    var obj = datacity.reduce(function(o, val) { o[val] = null; return o; }, {});
    var allcities = (JSON.stringify(obj));

   $('#selectcity').autocomplete({  
      data: JSON.parse(allcities),
      limit: 8, // The max amount of results that can be shown at once. Default: Infinity.
      onAutocomplete: function(val) {
      // Callback function when value is autcompleted.
      },
      minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
    });
});

//----------------------------------------- FETCH ALL CITIES FOR Flight -----------------------------

$.get( "/api/airportcitycountry/1", function( data ) {
    var dataair = data
    var objair = dataair.reduce(function(o, val) { o[val] = null; return o; }, {});
    var allaircities = (JSON.stringify(objair));

    $(document).on('keydown.autocomplete', '.flying_code_drop', function() {
        $(this).autocomplete({  
            data: JSON.parse(allaircities),
            limit: 8, // The max amount of results that can be shown at once. Default: Infinity.
            onAutocomplete: function(val) {
            // Callback function when value is autcompleted.
            },
            minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
        });
    })
    

     $('.flying_code').autocomplete({  
        data: JSON.parse(allaircities),
        limit: 8, // The max amount of results that can be shown at once. Default: Infinity.
        onAutocomplete: function(val) {
        // Callback function when value is autcompleted.
        },
        minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
    });
});   

// holidays city list

$.get( "/api/package/city/data/1", function( data ) {
    var datapackage = data
    var objpackage = datapackage.reduce(function(o, val) { o[val] = null; return o; }, {});
    var allpackagecities = (JSON.stringify(objpackage));
    
    $('#p_flying_to').autocomplete({  
        data: JSON.parse(allpackagecities),
        limit: 8, // The max amount of results that can be shown at once. Default: Infinity.
        onAutocomplete: function(val) {
        // Callback function when value is autcompleted.
        },
        minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
    });
});  

$.get( "/api/hotelcitycode/1", function( data ) {
    var datapackageto = data
    var objpackageto = datapackageto.reduce(function(o, val) { o[val] = null; return o; }, {});
    var allpackagecitiesto = (JSON.stringify(objpackageto));
    
    $('#p_flying_from').autocomplete({  
        data: JSON.parse(allpackagecitiesto),
        limit: 8, // The max amount of results that can be shown at once. Default: Infinity.
        onAutocomplete: function(val) {
        // Callback function when value is autcompleted.
        },
        minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
    });
});  

});

//======================================JQUERY VALIDATION OF ALL FORMS(Atul)====================================


var app = angular.module('myApp', []);
app.controller('validateCtrl', function($scope, $http) {
$scope.flying_from = null
$scope.flying_to = null
$scope.departure_date = null
$scope.arrival_date = null
$scope.options = [] 
$scope.ischecked = false
$scope.direct = 0



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

$scope.adult = 1;
$scope.child = 0;
$scope.infant = 0;
$scope.change = ""

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

$scope.getVal=function(travel_class){
    $scope.change= travel_class;
}

});

// myApp.directive("datepicker", function () {

// });

</script>

@endsection

