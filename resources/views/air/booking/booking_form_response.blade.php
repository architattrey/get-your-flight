@extends('home.layouts.app')

@section('content')

    <div class="row">
        <div class="modal-header">
                <h1 class="modal-title"><center>Booking Details<center></h1>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body" style="padding-left: 5%;">
                @if($flight_booking_detail->payment->txnid)
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">                        
                            <b>  Transaction Id:</b> {{$flight_booking_detail->payment->txnid or '-'}}                          
                        </div>

                        <div class="col-sm-4 col-xs-12">                       
                            <b> Bank Ref NO:</b> 
                            
                            @if($flight_booking_detail->payment->bank_ref_num)        
                                    {{$flight_booking_detail->payment->bank_ref_num or '-'}}
                            @else    
                                No Data
                            @endif            
                        </div>

                        <div class="col-sm-4 col-xs-12">                       
                            <b> Payment Status:</b> <span class="label label-success"> {{$flight_booking_detail->payment->status}}</span>                           
                        </div>
                    </div>    
    
                    <br>
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <b> Reason:</b> <span class="label label-danger"> {{$flight_booking_detail->payment->unmappedstatus}}</span>
                        </div>  
                        <div class="col-sm-4 col-xs-12">                       
                            <b> Bank Ref NO:</b> 
                            @if($flight_booking_detail->payment->bank_ref_num)
                                {{$flight_booking_detail->payment->bank_ref_num or '-'}}        
                            @else
                                No Data
                            @endif    
                        </div>
                        <div class="col-sm-4 col-xs-12">                       
                            <b>Net Amount Debit :</b> 
                            <i class="fa fa-inr" aria-hidden="true"></i>
                            {{$flight_booking_detail->payment->net_amount_debit or '-'}}                           
                        </div>
                    </div>
                    <br>
                                  
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <b>First Name : </b> {{$flight_booking_detail->payment->firstname or '-'}}
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <b>Last Name : </b>  {{$flight_booking_detail->payment->lastname or '-'}}
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <b> Email : </b> {{$flight_booking_detail->payment->email or '-'}}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <b>Payment Date : </b> {{$flight_booking_detail->payment->created_at->format('d/m/Y h:i A')}}
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <b>Phone no: </b> {{$flight_booking_detail->payment->phone or '-'}}
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <b>Status : </b> {{$flight_booking_detail->payment->status}}
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        @php $response_data = json_decode($flight_booking_detail['get_booking_details'])->data->Response; @endphp
                        @if($response_data->Error->ErrorCode == 0)
                            @php  $segments = $response_data->Response->FlightItinerary->Segments; @endphp
                            <div class="col-sm-4 col-xs-12">
                                <b> From : </b> {{$segments[0]->Origin->Airport->CityName}} 
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <b> To : </b> {{$segments[count($segments) - 1]->Destination->Airport->CityName}}
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <b>PNR : </b> {{$flight_booking_detail->pnr_number}}
                            </div>
                        @else
                            <p>no Data</P>
                        @endif  
                    </div>
                  
                    @if($flight_booking_detail->return_response)
                        <div class="row">
                            @php $response_data = json_decode($flight_booking_detail->return_response)->data->Response; @endphp
                            @if($response_data->Error->ErrorCode == 0)
                                @php  $segments = $response_data->Response->FlightItinerary->Segments; @endphp
                                <div class="col-sm-4 col-xs-12">
                                    <b> From : </b> {{$segments[0]->Origin->Airport->CityName}} 
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <b> To : </b> {{$segments[count($segments) - 1]->Destination->Airport->CityName}}
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <b>PNR : </b> {{$flight_booking_detail->return_pnr_number}}
                                </div>
                            @else
                                <p>no Data</P>
                            @endif  
                        </div>
                    @endif

                @endif
            </div>
        </div>
@endsection