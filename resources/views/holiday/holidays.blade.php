@extends('home.layouts.app')
@section('content')

@php
    if(isset($_GET['from'])) {
        $from = $_GET['from'];
    }else {
        $from = "";
    }

    if(isset($_GET['to'])) {
        $to = $_GET['to'];
    }else {
        $no_of_rooms = "";
    }


    if(isset($_GET['month_of_travel'])) {
        $month_of_travel = $_GET['month_of_travel'];
    }else {
        $month_of_travel = 0;
    }

@endphp
    <div class="jumbotron text-center" id="jumbocontainer">
        <div class="container">
        <form action="/holidays/search">
            <div class="row">
                <div class="col-sm-3">
                    <input class="source" type="text" name="from" id="source" placeholder="From" value="{{$from}}" required/>
                </div>
                <div class="col-sm-3">
                    <input class="destination" type="text" name="to" id="destination" placeholder="To" value="{{$to}}" required/>
                </div>
                <div class="col-sm-3">
                    <select name="month_of_travel" class="month" style="width: 100%; padding: 5px 20px; margin: 8px 0; height: 39px; background: #fff;">
                        <option value="0" selected>Month of Travel(Any)</option>
                        <option value="6">May 2018</option>
                        <option value="7">June 2018</option>
                        <option value="8">July 2018</option>
                        <option value="9">August 2018</option>
                        <option value="10">September 2018</option>
                    </select>                 
                </div>
                <div class="col-sm-3">
                    <input class="submit" type="submit"  value="SEARCH" >
                </div>
            </div>
        </div>
        </form>
    </div>


    <section>

        <div class="rows pad-bot-redu tb-space" ng-app="holidays" ng-controller="holidaysCtrl">
            
            <div class="container">
            <div class="row">
           
            </div>
                <!-- TITLE & DESCRIPTION -->
                    <!-- TOUR PLACES-->
                <div class="row">
                <div class="content">
                <h4 style="padding:0 0 20px 11px">Showing @{{packages.length}} of @{{packages.length}} packages for {{$to}} from {{$from}} </h4>
                    <div ng-repeat ="package in packages" class="col-md-4 col-sm-6 col-xs-12 b_packages" style="visibility: inherit !important;" ng-if="!loading_data">
                        <div class="v_place_img">
                            <img src="@{{package_image(package.image)}}" alt="@{{package.package_name}}" title="@{{package.package_name}}"/>
                        </div> 
                        <div class="b_pack rows">
                            <div class="col-md-8 col-sm-8">
                                <h4>
                                    <a target="_blank" href="@{{url_for_details(package.slug)}}">@{{package.package_name}}<span class="v_pl_name"></span></a>
                                </h4>
                            </div>
                            <div class="col-md-4 col-sm-4 pack_icon">
                                  <p style="padding-top:15px;"><b>Rs:&nbsp;&nbsp;@{{package.package_rate}}</b></p>
                            </div>
                        </div>
                    </div>
                    </div> 
                </div>
            
            </div>
        </div>
    </section>
@endsection

@section('script')
<script>
    var app = angular.module('holidays', []);
    app.controller('holidaysCtrl', function($scope, $http) {
      
        $scope.from = "{{$from}}"
        $scope.to = "{{$to}}"
        $scope.month_of_travel = "{{$month_of_travel}}"
        $scope.loading_data = true
        var data = {
          from: $scope.from,
          to: $scope.to,
          month_of_travel: $scope.month_of_travel
        }
        $scope.packages = []
        $http.post("/api/v1/package/search", data).then(function (response) {
            $scope.loading_data = false
            $scope.packages = response.data
            console.log($scope.packages)
          }).catch(function (error) {
            $scope.loading_data = false
             console.log(error)
        });

        $scope.package_image = function(image) {
            var jsonimage = JSON.parse(image)[0]
        	return "http://getflights.aresedge.com/storage/"+jsonimage
        }

        $scope.url_for_details = function(slug) {

        	return "http://getyourflights.com/package-details-location/"+$scope.from+"/"+slug
        }
    
    });

    //====================================== AUTO SEARCH FOR "FROM" TEXT BOX =============================================

    $.get( "/api/station/1", function( data ) {
            var dataair = data
            var objair = dataair.reduce(function(o, val) { o[val] = null; return o; }, {});
            var allaircities = (JSON.stringify(objair));
            
            $("#source").autocomplete({  
                data: JSON.parse(allaircities),
                limit: 8, // The max amount of results that can be shown at once. Default: Infinity.
                onAutocomplete: function(val) {
                // Callback function when value is autcompleted.
                },
                minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
            });
        });   

   //====================================== AUTO SEARCH FOR "TO" TEXT BOX =============================================

        $.get( "/api/package/city/data/1", function( data ) {
            var dataair = data
            var objair = dataair.reduce(function(o, val) { o[val] = null; return o; }, {});
            var allaircities = (JSON.stringify(objair));
            
            $('#destination').autocomplete({  
                data: JSON.parse(allaircities),
                limit: 8, // The max amount of results that can be shown at once. Default: Infinity.
                onAutocomplete: function(val) {
                // Callback function when value is autcompleted.
                },
                minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
            });
        });   

 
</script>

@endsection