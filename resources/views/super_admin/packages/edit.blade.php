	@extends('super_admin.layouts.app')

@section('content')

<div class="card">
     <div class="card-header">
        <i class="fa fa-edit"></i>Edit  Package
     </div>
 
 @include('super_admin.layouts.errors')
                        
    @if(Session::has('flash_message'))
    <div class="alert alert-info"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
    @endif
     
     <div class="card-body collapse show" id="collapseExample">

        <form role="form" action="{{route('single_package_edit',$package->id)}}" class="dropzone form-horizontal"  id="my-awesome-dropzone" method="POST" enctype="multipart/form-data"> 
        
        {{ csrf_field() }}

       <div ng-app="myApp" ng-controller="admincontroller">
            <div class="form-group">
                <label for="sel1">Select Country:</label>
                <select class="form-control" id="country_type" name="country_type">                
                    <option value="0" {{$package->country_type == 0 ? 'selected' : '-'}}>Domestic</option>
                    <option value="1" {{$package->country_type == 1 ? 'selected' : '-'}}>International</option>
                </select>
            </div>

		<!-- <input type="text" name="types_of_business" id="types_of_business" class="form-control" placeholder="Full Name"> -->
            <div class="form-group">
                <label for="name">City</label>
                <input type="text" id="select-city" value="{{$package->city}}" name="city"  class="autocomplete form-control">
            </div>

            <div class="form-group">
                <label for="name">Package Name:</label>
                <input type="text" class="form-control" id="package_name" value="{{$package->package_name}}"        name="package_name"  placeholder="Enter Package Name">
            </div>
        
            <div class="form-group">
                <label for="name">Seller:</label>
                <input type="text" class="form-control" id="seller" name="seller" value="{{$package->seller}}"  placeholder="Enter Seller Name">
            </div>

            <div class="form-group">
                <label for="usr" class="fallback">Please Select Multiple Image*</label><br>
                <label for="usr" class="fallback">Package Image :</label>
                <input type="file" class="form-control" id="gallery-photo-add" name="gallery[]" multiple>
             
                @php   $images=json_decode($package->image);   @endphp
                @foreach($images as $img)
                
                    <input type="hidden" name="gallery_image[]" value="{{$img}}">
                    <img src="http://getflights.aresedge.com/storage/{{$img}}" style="display:inline-block;" width="240" height="175">
                   
                @endforeach
                    
                
            </div>
            <div class="form-group">   
                <label>Themes: </label>   
                <select class="form-control" id="themes_type" name="themes_type">                    
                    <option  {{$package->themes_type == 'Honeymoon' ? 'selected' : '-'}}>Honeymoon</option>
                    <option  {{$package->themes_type == 'Romantic' ? 'selected' : '-'}}>Romantic</option>
                    <option  {{$package->themes_type == 'Group Tours' ? 'selected' : '-'}}>Group Tours</option>
                    <option  {{$package->themes_type == 'Beach' ? 'selected' : '-'}}>Beach</option>
                    <option  {{$package->themes_type == 'Water Sports' ? 'selected' : '-'}}>Water Sports</option>
                    <option  {{$package->themes_type == 'Sightseeing' ? 'selected' : '-'}}>Sightseeing</option>
                    <option  {{$package->themes_type == 'Family' ? 'selected' : '-'}}>Family</option>
                </select>
            </div> 

            <div class="form-group">
                <label for="comment">Package About:</label>
                <textarea class="form-control" rows="5" name="about_package" id="about_package">{{$package->about_package}}</textarea>
            </div>
    
            <div class="form-group">
                <label for="comment">Trip Highlights:</label>
                <textarea class="form-control" rows="5" id="trip_highlights" name="trip_highlights">{{$package->trip_highlights}}</textarea>
            </div>

            <!-- <div class="form-group">   
                <label>Please Select Days: </label>   
                    <div class="col-sm-12">
                        <select class="form-control" id="questiontype" ng-model="questiontype" name="questiontype" ng-change="demo()">
                            <option value="">--Select One--</option>
                            <option value="1">Radio</option>
                            <option value="2">CheckBox</option>
                        </select>
                    </div>
            </div>  -->
          @verbatim 
            
            <div class="row" ng-show="showDiv" ng-repeat="(index, option) in options track by $index">
                <input type="hidden" name="day_image[]" value="{{option.hotel_image}}">
                <div class="form-group col-sm-10" id="options"> 
                    <h2 for="options" style="background-color:mediumseagreen;">Day {{$index + 1}} :</h2> 
                    <div class="form-line">
                        <div name="options[]" value="{{old('options')}}">    
                            <div class="form-group">
                                <label for="name">Day {{$index + 1}} Titile:</label>
                                <input type="text" class="form-control" id="day_title" name="day_title[]" value="{{option.day_title}}" placeholder="Enter Day Title">
                            </div>

                            <div class="form-group">
                                <label for="name">Day {{$index + 1}} Summary:</label>
                                <textarea class="form-control" rows="5" id="day_summary" name="day_summary[]">{{option.day_summary}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="name">Day {{$index + 1}} Hotel Name:</label>
                                <input type="text" class="form-control" id="hotel_name" name="hotel_name[]" value="{{option.hotel_name}}" placeholder="Enter Hotel Name">
                            </div>

                            <div class="form-group">
                                <label for="name">Day {{$index + 1}} Hotel Image:</label>
                                <input type="file" class="form-control" id="hotel_image" name="hotel_image[]">
                            		<div class="row">
                            			<img src="http://getflights.aresedge.com/storage/{{option.hotel_image}}" width="240" height="175">	
                            		</div>		
                            </div>
                                <!-- <textarea class="form-control" rows="3" name="options[]" value="{{old('options')}}"></textarea> -->
                        </div>    
                    </div>
                </div>
                <div class="col-sm-2"  ng-if="$first">
                    <button type="button" ng-click="addmore()" class="btn btn-primary">Add More <i class="fas fa-plus"></i></button>
                </div> 
                <div class="col-sm-2"  ng-if="!$first"> 
                    <button type="button" ng-click="deletef(index)" class="btn btn-danger">Delete <i class="fas fa-trash-alt"></i></button>
                </div>
            </div>    
            @endverbatim
                   
            <div class="form-group">
                <label for="name">Package Rate:</label>
                <input type="number" class="form-control" id="package_rate" value="{{$package->package_rate}}" name="package_rate" placeholder="Enter Package Rate">
            </div>

            <div class="form-group">
                <label for="comment">Inclusions:</label>
                <textarea class="form-control" rows="4" id="terms_conditions" name="inclusions">{{$package->inclusions}}</textarea>
            </div>

            <div class="form-group">
                <label for="comment">Exclusions:</label>
                <textarea class="form-control" rows="4" id="terms_conditions" name="exclusions">{{$package->exclusions}}</textarea>
            </div>

            <div class="form-group">
                <label for="comment">Payment Policy:</label>
                <textarea class="form-control" rows="4" id="cancellation_policy" name="payment_policy">{{$package->payment_policy}}</textarea>
            </div>

            <div class="form-group">
                <label for="comment">Terms & Conditions:</label>
                <textarea class="form-control" rows="4" id="terms_conditions" name="terms_conditions">{{$package->terms_conditions}}</textarea>
            </div>

            <div class="form-group">
                <label for="comment">Cancellation Policy:</label>
                <textarea class="form-control" rows="4" id="cancellation_policy" name="cancellation_policy">{{$package->cancellation_policy}}</textarea>
            </div>
        <center>
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Update</button></center>
     </div>
  </form>
</div>
</div>

@endsection
@section('script')

<script type="text/javascript"> 
    var app = angular.module('myApp',[]); 
    var packages_day = []
    
    var baseurl='http://getflights.aresedge.com/single/package/list/'+{{$package->id}}
    app.controller("admincontroller", ['$scope', '$http', function($scope, $http) { 
        $scope.showDiv=true;
        $scope.demo = function(){
            if($scope.questiontype == 1 || $scope.questiontype == 2)
            {
                $scope.showDiv=false;
            }else{
                $scope.showDiv=true;
            }
        }
        $scope.options = packages_day 

        $scope.addmore = function(){ 
           $scope.options.push('')
        } 
        $scope.deletef = function(index){ 
            console.log(index)
            var indexpo = $scope.options.indexOf(index); 
            if (index > -1) {
              $scope.options.splice(index, 1);
            }
        } 

        $http.get(baseurl).then( response => {
         
         $scope.options = response.data
            
          }).catch(function (error) {
             console.log(error)
        });
    }]);
 
$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };  
    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});


   
</script>

<script>
//----------------------------------------  FETCH ALL CITIES FOR HOTELS ---------------------------------
    $(document).ready(function() {
        var datacity

        $.get( "/api/hotelcitycode/1", function( data ) {
            datacity = data
            console.log(datacity)
            $( "#select-city" ).autocomplete({
                source: function(request, response) {
                    var results = $.ui.autocomplete.filter(datacity, request.term);
                    response(results.slice(0, 10));
                }
            });
        });
    });


</script>
 @endsection
