<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Flight Details</h4>
            </div>

            <div class="modal-header">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="modal-title">@{{origin}} -> @{{destination}}</h4>
                        <p>@{{DepartureTime_d}} | @{{duration_time}} | @{{stop_type}} | @{{refundable_type}}</p>
                    </div>
                    <div class="col-md-2">
                        <b><h4> @{{per_adult}}</h4></b>
                        <a href="@{{booklink}}" class="btn btn-danger">Book</a>
                    </div>
                </div>
            </div>

            <div class="modal-body">
            
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#Itinerary">Flight Details</a></li>
                    <li><a data-toggle="tab" href="#fare_rule">Fare SUMMARY & Rules</a></li>
                    <li><a data-toggle="tab" href="#Cancellation_fee">Cancellation fee</a></li>
                    <li><a data-toggle="tab" href="#Date_Change_fee">Date Change fee</a></li>
                </ul>
                
                <div class="tab-content">
                    <div id="Itinerary" class="tab-pane fade in active">
                        <div class="row">

                            <div class="col-md-12">
                                <h4><i class="ytfi-flight"></i> Departure </h4>
                            </div>

                            <div class="row"  ng-repeat="segment in segments[0]">
                                <div class="col-md-3">
                                    <img src="@{{airline_image(segment.Airline.AirlineCode)}}" alt="@{{airline_detail(segment.Airline, 'name')}}">
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
                    </div>

                    <div id="fare_rule" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-6">
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
                                                <td>Base Fare</td>
                                                <td>@{{per_adult}}</td>
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
                                    <p>*Total fare displayed above has been rounded off and may thus show a slight difference.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Fare Rules</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Airline</td>
                                                <td>@{{airline_name_d}}</td>
                                            </tr>
                                            <tr>
                                                <td>Fare Basis Code</td>
                                                <td>@{{fare_basis_code}}<td>
                                            </tr>
                                            <tr>
                                                <td>Refund Type **</td>
                                                <td>@{{refundable_type}}</td>
                                            </tr>
                                            <tr>
                                                <td>Cancellation Policy *</td>
                                                <td>@{{cancellation_policy}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>* Per person per sector.</p>
                                    <p>**Please note: Yatra cancellation fee is over and above the airline cancellation fee due to which refund type may vary.</p>
                                </div>
                            </div>
                       </div>
                    </div>  

                    <div id="Cancellation_fee" class="tab-pane fade">
                        Cancellation_fee
                    </div>

                    <div id="Date_Change_fee" class="tab-pane fade">
                        Date_Change_fee
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>