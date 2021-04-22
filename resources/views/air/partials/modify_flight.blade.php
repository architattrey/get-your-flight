<div class="top-txt" style="    padding: 15px 0;     padding-bottom: 65px;">
<div class="col-md-2" style="font-size: 14px;">
    Departure @{{departure_date_formt}}
</div>
<div class="col-md-2 " style="font-size: 14px;">
    @if($ArrivalTime)
        Return @{{return_date_formt}}
    @endif
</div>
<div class="col-md-2" style="font-size: 14px;">
    Adult <br>
    @{{adult}}
</div>
<div class="col-md-2" style="font-size: 14px;">
    Child <br>
    @if($child)
        @{{child}}
    @else
        --
    @endif
</div>
<div class="col-md-2" style="font-size: 14px;">
    Infant <br>
    @if($infant)
        {{$infant}}
    @else
        --
    @endif
</div>
<div class="col-md-2" style="font-size: 14px;">
<button type="button" class="btn btn-info btn-lg pull-right" style="background-color: #ccc; border-redius:0px; font-size: 15px; text-transform:capitalize; color:black;     outline: none;border: none;" data-toggle="modal" data-target="#myModal2">
    <i class="fa fa-search"></i>&nbsp;Modify Search
</button>    
</div>
</div>
  <!-- Modal -->
<div class="modal fade" id="myModal2" role="dialog">
    <div class="container">
        <div class="modal-dialog modal-lg">    
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modify Search</h4>
                </div>
                <div class="modal-body">
                    <label class="radio-inline"><input type="radio" ng-click="create_multicity(0); isreturn = false" ng-checked="ArrivalTime == '' ? true : false" name="radio"><h4>One Way</h4></label>

                    <label class="radio-inline"><input type="radio" name="radio" ng-click="create_multicity(0); isreturn = true" ng-checked="ArrivalTime != '' ? true : false"><h4>Round Way</h4></label>
                    <label class="radio-inline"><input type="radio" name="radio" ng-click="create_multicity(1);isreturn = false"><h4>Multicity</h4></label>
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
                                <!-- <label for="select-city">Flying From</label> -->
                                <span style="color:red" ng-show="myForm1.flying_from.$touched && myForm1.flying_from.$invalid">This feild is required.</span>
                            </div>
                            <div class="input-field col s2 sm12">
                                <input type="text" id="flying_to" name="flying_to" class="flying_code" placeholder="Flying To" ng-model="destination" autocomplete="off" required>
                                <!-- <label for="select-city">Flying To</label> -->
                                <span style="color:red" ng-show="myForm1.flying_to.$touched && myForm1.flying_to.$invalid">This feild is required.</span>
                            </div>
                            
                            <div class="input-field col s2 sm12">
                                <input type="text" id="to_to"  name="departure_date" ng-model="DepartureTime" data-date-start-date="0d" data-date-format="dd/mm/yyyy" class="datepicker" data-provide="datepicker" required autocomplete="off">
                                <!-- <label for="to">Departure Date</label> -->
                            </div>

                            <div class="input-field col s2 sm12" ng-if="isreturn">
                                <input type="text"  ng-model="ArrivalTime" id="from_from" data-provide="datepicker" data-date-start-date="0d" data-date-format="dd/mm/yyyy" class="datepicker_re" name="arrival_date" autocomplete="off">
                                <label ng-if="!ArrivalTime" for="from">Return Date</label>
                            </div>

                        </div>

                        <div class="row"  ng-show="options.length > 0" ng-repeat="(index, option) in options track by $index" style="margin-top:20px;">
                            <div class="form-line tab-content">
                                <div class="row" style=" margin-left: 74px; margin-top: -16px; padding-top: 10px;" >
                                    <div class="input-field col s2 sm12" style="width: 18%;">
                                        <input type="text" id="flying_from_@{{index + 1}}" autocomplete="off" name="flying_from_@{{index + 1}}" class="flying_code_drop" style="margin-left: -73px; color:#000" placeholder="Flying From" required>
                                    </div>
                                    <div class="input-field col s2 sm12"  style="    width: 18%;margin-left: -8px;">
                                        <input type="text" id="flying_to_@{{index + 1}}" autocomplete="off" style="margin-left: -65px;" name="flying_to_@{{index + 1}}" class="flying_code_drop" placeholder="Flying To"  required>
                                    </div>
                                    <div class="input-field col s2 sm12" style="margin-left: -62px; width: 18%;">
                                        <input style="" type="text" data-provide="datepicker" class="virtual_date" valueId="@{{index + 1}}" id="from_@{{index + 1}}" name="arrival_date_@{{index + 1}}" data-date-start-date="0d" data-date-format="dd/mm/yyyy" autocomplete="off">
                                        <label for="from">Return Date</label>
                                    </div>
                                    <div class="col-sm-2"> 
                                        <a href="#" ng-click="deletef($index)" id="delete_flying" >
                                            <i class="fa fa-remove fa-span" style="font-size : 24px; margin-left: 6px; margin-top: 18px; color : red;" ></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-2"  ng-if="$last">
                                        <button type="button" style="margin-left: -65px;  margin-top: 17px;     background: #0eafe3;border: none;" ng-click="addmore()" class="btn btn-primary">Add City </button>
                                    </div> 
                                </div>   
                            </div>
                        </div> 
                        
                        <!-- <div class="row" ng-if="ismulticity">
                            <div class="col-sm-3 col-sm-offset-0 checkbox-inline" style="color: #333;  margin-top: -12px;" >
                                <input type="checkbox" ng-model="ischecked"  ng-click="toggle()" style="left: 23px; margin-top: -11px; opacity: 1;">
                                <span style="display: block;margin-top: -40px;margin-left: 10px;">Create Multi-city Route</span>
                            </div> 
                        </div> -->
                        <br><br>
                        <div class="row">
                            <div class="col-md-12">
                                @include('air.partials.paseenger_modify')
                            </div>
                        </div>
                        <br><br>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-md-6">
                                <select name="class_type" style="display: block !important;     border: 1px solid #c5bfbf;">
                                    <option  value="1" {{$class_type == 1 ? "selected" : ''}}></option>
                                    <option  value="2"  {{$class_type == 2 ? "selected" : ''}}>Economy</option>
                                    <option  value="3"  {{$class_type == 3 ? "selected" : ''}}>Premium Economy</option>
                                    <option value="4"  {{$class_type == 4 ? "selected" : ''}}>Business</option>
                                    <option value="5"  {{$class_type == 5 ? "selected" : ''}}> Premium Business</option>
                                    <option value="6"  {{$class_type == 6 ? "selected" : ''}}>First Class</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-6 col-sm-offset-0 checkbox-inline" style="color: #333; margin-top:0;" >
                                <input type="checkbox" name="direct" value="1" style="    margin-top: -11px;display: inline-block;margin: -4px 20px; ">
                                <span  style="margin-left:40px;display: block; margin-top: -40px;">Non Stop Flights</span>
                            </div>
                        </div>

                        <div class="row"style="margin-top:20px;">
                            <div class="input-field col s2">
                                <input  type="submit" value="search" class="waves-effect waves-light tourz-sear-btn v2-ser-btn" ng-click="formsubmit(myForm1.$valid,myForm1)"  ng-disabled="myForm1.$invalid" style="background: #f1213e;border-radius: 5px;padding: 0 50px;     margin-top: 10px;">
                            </div>
                        </div>
                    </form>           
                </div>
            </div> 
        </div>   
    </div>
</div>