@extends('home.layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
<style>
.active:before {
     background-color:#fff;
}
</style>

@endsection


@section('content')

@php
    
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

<button type="button" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#myModal">Modify</button>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" ng-controller="validateCtrl" ng-app="myApp">
    <div class="container">
    <div class="modal-dialog modal-lg">    
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modify Search</h4>
          </div>
          <div class="modal-body">
            <label class="radio-inline"><input type="radio" ng-checked="ArrivalTime == '' ? true : false" name="radio"><h4>One Way</h4></label>

            <label class="radio-inline"><input type="radio" name="radio" ng-checked="ArrivalTime != '' ? true : false"><h4>Round Way</h4></label>
            <label class="radio-inline"><input type="radio" name="radio"><h4>Multicity</h4></label>
          </div>
          <div id="flights" class="tab-pane fade in active">
            <form class="v2-search-form" name="myForm1" action="/air/getairdata">
                <input type="hidden" name="segment" value="@{{options.length }}" ng-if="options.length > 0">
                <input type="hidden" name="no_of_adults" value="@{{adult }}">
                <input type="hidden" name="no_of_child" value="@{{child }}">
                <input type="hidden" name="infant" value="@{{infant}}">
                <div class="row" style="margin-top:15px;">
                    <div class="input-field col s2 sm12">
                        <input type="text" id="flying_from" name="flying_from" class="flying_code" placeholder="Flying From" ng-model="origin" autocomplete="off" required>
                        <label for="select-city">Flying From</label>
                        <span style="color:red" ng-show="myForm1.flying_from.$touched && myForm1.flying_from.$invalid">This feild is required.</span>
                    </div>
                    <div class="input-field col s2 sm12">
                        <input type="text" id="flying_to" name="flying_to" class="flying_code" placeholder="Flying To" ng-model="destination" autocomplete="off" required>
                        <label for="select-city">Flying To</label>
                        <span style="color:red" ng-show="myForm1.flying_to.$touched && myForm1.flying_to.$invalid">This feild is required.</span>
                    </div>
                    
                    <div class="input-field col s2 sm12">
                        <input type="text" id="to" name="departure_date" ng-model="DepartureTime" class="datepicker" data-provide="datepicker" required autocomplete="off">
                        <label for="to">Departure Date</label>
                    </div>

                    <div class="input-field col s2 sm12" ng-if="options.length == 0">
                        <input type="text" id="from" ng-model="ArrivalTime"  data-provide="datepicker" class="datepicker_re" name="arrival_date" autocomplete="off">
                        <label for="from">Return Date</label>
                    </div>

                    <div class="input-field col s3 sm12">
                        @include('home.layouts.passenger')
                    </div>

                    <div class="input-field col s1">
                        <input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn v2-ser-btn" ng-click="formsubmit(myForm1.$valid,myForm1)"  ng-disabled="myForm1.$invalid">
                    </div>
                </div><br>

                <div class="row"  ng-show="options.length > 0" ng-repeat="(index, option) in options track by $index">
                    <div class="form-line tab-content">
                        <div class="row" style=" margin-left: 74px; margin-top: -16px; padding-top: 10px;" >
                            <div class="input-field col s2 sm12">
                                <input type="text" id="flying_from_@{{index + 1}}" autocomplete="off" name="flying_from_@{{index + 1}}" class="flying_code_drop" style="margin-left: -73px; color:#000" placeholder="Flying From" required>
                            </div>
                            <div class="input-field col s2 sm12">
                                <input type="text" id="flying_to_@{{index + 1}}" autocomplete="off" style="margin-left: -65px;" name="flying_to_@{{index + 1}}" class="flying_code_drop" placeholder="Flying To"  required>
                            </div>
                            <div class="input-field col s2 sm12">
                                <input style="margin-left: -65px;" type="text" data-provide="datepicker" class="virtual_date" id="from_@{{index + 1}}" name="arrival_date_@{{index + 1}}">
                                <label for="from">Arrival Date</label>
                            </div>
                            <div class="col-sm-2"> 
                                <a href="#" ng-click="deletef($index)" id="delete_flying" >
                                    <i class="fa fa-remove fa-span" style="font-size : 24px; margin-left: -66px; margin-top: 18px; color : red;" ></i>
                                </a>
                            </div>
                            <div class="col-sm-2"  ng-if="$last">
                                <button type="button" style="margin-left: -200px;  margin-top: 17px;     background: #0eafe3;border: none;" ng-click="addmore()" class="btn btn-primary">Add City </button>
                            </div> 
                        </div>   
                    </div>
                </div> 
                <div class="col-sm-3 col-sm-offset-0 checkbox-inline" style="color: #333;  margin-top: -12px;" >
                    <input type="checkbox" ng-model="ischecked"  ng-click="toggle()" style="left: 23px; margin-top: -11px; opacity: 1;">
                    <span style="display: block;margin-top: -40px;margin-left: 5px;">Create Multi-city Route</span>
                </div> 
                <div class="col-sm-3 col-sm-offset-0 checkbox-inline" style="color: #333; margin-top: -12px;" >
                    <input type="checkbox" name="non_stop" style="left: 1px; opacity: 1; margin-top: -11px; ">
                    <span  style="margin-left:5px;display: block; margin-top: -40px;">Non Stop Flights</span>
                </div>
            </form>           
        </div>
    </div> 
    </div>   
  </div>
</div>

  @endsection
  

  @section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">

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
});  
    // $( "#target" ).click(function() {
    //     window.location.replace("https://getflights.aresedge.com/dashboard");
    // });

    // $( function() {
    //     $( "#checkin" ).datepicker({
    //         altFormat: "d MM,DD, yy"
    //     });

    //     $(".tab_btn_class").click(function(e) {
    //         e.preventDefault()
    //         var indexposition = $(this).attr('value')
    //         $(".hide_show").hide()
    //         $("#section"+indexposition).show()
    //     })
    // });

    // $( function() {
    //      $( "#checkout" ).datepicker({
    //          altFormat: "d MM, DD, yy"
    //      });
    // });

    //  $( function() {
    //      $( "#froms" ).datepicker({
    //          altFormat: "d MM,DD, yy",
    //           numberOfMonths: 2,
    //      });
    // });

    // $( function() {
    //      $( "#to" ).datepicker({
    //          altFormat: "d MM, DD, yy"
    //      });
    // });
    
    $(document).ready(function() {
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

        $('.datepicker').datepicker({
            format: "dd/mm/yyyy",
            todayHighlight: true,
            startDate: today,
            autoclose: true
        });

        $('.datepicker_re').datepicker({
            format: "dd/mm/yyyy",
            todayHighlight: true,
            startDate: today,
            autoclose: true,
        });

        $('body').on('keydown.autocomplete', 'input.virtual_date', function() {

            $(this).datepicker({  
                format: "dd/mm/yyyy",
                todayHighlight: true,
                startDate: today,
                autoclose: true
            });
        })
    });

    $(document).on('click', '#delete_flying', function(e) {
        e.preventDefault()
    })
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
        $scope.adult              = "{{$adult}}"
        $scope.child              = "{{$child}}"
        $scope.infant             = "{{$infant}}"
        $scope.direct             = "{{$direct}}"
        $scope.onestop            = "{{$onestop}}"
        $scope.preferredairlines  = "{{$preferredairlines}}"
        $scope.origin             = "{{$origin}}"
        $scope.destination        = "{{$destination}}"
        $scope.DepartureTime      = "{{$DepartureTime}}"
        $scope.ArrivalTime        = "{{$ArrivalTime}}"

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

        $scope.getVal=function(indexChange){
            $scope.change= indexChange;
        }

    });

</script>

@endsection


