@extends('super_admin.layouts.app')

@section('content')
<style>
    .pagination .disabled{
        padding: 0 10px 0 10px;
        font-size: 20px;
    }
        .pagination .active{
        padding: 0 10px 0 10px;
        font-size: 20px;
    }
        .pagination a{
        padding: 0 10px 0 10px;
        font-size: 20px;
    }
</style>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
             Table Lists:
        </div>
        <div class="card-body">
        <table class="table table-responsive-sm">
            <thead>
                <tr>
                    <th>I.D</th>
                    <th>Package Name</th>
                    <th>Departure City</th>
                    <th>Departure Date</th>
                    <th>Adults</th>
                    <th>Contact No.</th>
                    <th>Email ID.</th>
                    <th>Customer City</th>
                    <th>Status</th>
                    <th>View</th>
                </tr>
            </thead>
            @foreach($bookinglists as $key => $bookinglist)
              @php $key++;@endphp
            <tbody>
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$bookinglist->package->package_name}}</td>
                    <td>{{$bookinglist->departure_city}}</td>
                    <td>{{$bookinglist->departure_date}}</td>
                    <td>{{$bookinglist->total_adults}}</td>
                    <td>{{$bookinglist->phone}}</td>
                    <td>{{$bookinglist->email}}</td>
                    <td>{{$bookinglist->customer_city}}</td>
                    <td>@if($bookinglist->status ==1)
                            <a href="#"><span class="badge badge-success">Activate</span></a>
                        @else
                            <a href="#"><span class="badge badge-danger">Deactivate</span></a>
                        @endif
                    </td>
                    <td>
                    <a href="{{route('packages_single_booking_list',$bookinglist->id)}}"><button type="button" class="btn btn-info btn-sm">More</button></a>
                    </td>
               </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <div class="row" style="display:flex; justify-content:center;align-items:center;">
            {{$bookinglists->links()}}     
        </div>    
</div>
</div>
</div>

 @endsection
