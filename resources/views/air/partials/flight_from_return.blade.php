
    <div class="col-md-5 footerBody">
        <table id="myTable" class="footer_border">
            <tbody style="color: #fff">
                <tr class="indgo">
                    <td>
                        <div style="display: inline-flex; font-size: 11px;">
                            <div style="padding: 0 0 0 0;"><img src="@{{airline_image(flight_from_data.AirlineCode)}}"/></div>  
                            <div  style="padding: 0; margin: 0; font-size: 13px;" >@{{flight_from_data.airlineName}}<br><span style="font-size: 12px;display: block;margin: -5px;">@{{flight_from_data.AirlineCode}} - @{{flight_from_data.Segments[0][0].Airline.FlightNumber}}</span></div>
                        </div><br>
                        <a data-toggle="modal" data-target="#myModal" class="" ng-click="show_details(flight_from_data.id, 0)" style="font-size:11px; display: block; margin: -5px 0; padding-left: 45px;">Flight Detail</a>
                    </td>
                    <td style="  font-size: 15px;font-weight: 600;">@{{flight_from_data.Segments[0][0].StopPointDepartureTime | date: 'HH:mm'}}<br>@{{origin_code}}</td>
                    <td style="  font-size: 15px;font-weight: 600;">@{{flight_from_data.Segments[flight_from_data.Segments.length - 1][0].StopPointArrivalTime | date: 'HH:mm'}}<br>@{{destination_code}}</td>
                    <td  style="font-size:18px;    border-right: 1px solid #928a8a;">
                            <i class="fa fa-inr"></i> @{{flight_from_data.price}}</button><br>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-5">
        <table id="myTable" class="footer_border">
            <tbody style="color: #fff" class="footerBody">
                <tr  class="indgo">
                    <td>
                        <div style="display: inline-flex; font-size: 11px;">
                            <div style="padding: 0 0 0 0;"><img src="@{{airline_image(flight_return_data.AirlineCode)}}"/></div>  
                            <div style="padding: 0; margin: 0; font-size: 13px;">@{{flight_return_data.airlineName}}<br><span style="font-size: 12px;display: block;margin: -5px;">@{{flight_return_data.AirlineCode}} - @{{flight_return_data.Segments[0][0].Airline.FlightNumber}}</span></div>
                        </div><br>
                        <a data-toggle="modal" data-target="#myModal" class="" ng-click="show_details(flight_return_data.id, 1)" style="font-size:11px; display: block; margin: -5px 0; padding-left: 45px; ">Flight Detail</a>
                    </td>
                    <td style="font-size: 15px; font-weight: 600;">@{{flight_return_data.Segments[0][0].StopPointDepartureTime | date: 'HH:mm'}}<br>@{{destination_code}}</td>
                    <td style="font-size: 15px; font-weight: 600;">@{{flight_return_data.Segments[flight_return_data.Segments.length - 1][0].StopPointArrivalTime | date: 'HH:mm'}}<br>@{{origin_code}}</td>
                
                    <td style=" border-right: 1px solid #928a8a;">
                      
                            <i class="fa fa-inr"></i> @{{flight_return_data.price}}</button><br>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-1">
       <p style="color: white; margin: 0px 0 -35px;">Total Fare</p><br><h3 style="color: white;"><b style="font-size: 23px;     display: inline-flex;"><i class="fa fa-inr"></i>@{{flight_from_data.price + flight_return_data.price}}</b></h3>
    </div>
    <div class="col-md-1">
        <br><a href="@{{book_link_return(flight_from_data.ResultIndex, flight_return_data.ResultIndex)}}" target="_blank" class="link-btn book_ticket">Book</a>
    </div>

