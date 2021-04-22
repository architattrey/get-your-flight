@extends('users.layouts.app')

@section('content')

	<div class="db-2">
				<div class="db-2-com db-2-main">
					<h4>Package Booking</h4>
					<div class="db-2-main-com db-2-main-com-table">
						<table class="responsive-table">
							<thead>
								<tr>
									<th>No</th>
									<th>Package Name</th>
									<th>Duration</th>
									<th>Start Date</th>
									<th>Price</th>
									<th>Payment</th>
									<th>More</th>
								</tr>
							</thead>
							<tbody>
							@foreach($packagesBookings as $key => $packagesBooking)
                              @php $key++; 
							        $days = json_decode($packagesBooking->package->itinerarys);
								@endphp
								<tr>
									<td>{{$key}}</td>
									<td>{{$packagesBooking->package->package_name}}</td>
									<td>{{count($days)}} days</td>
									<td>{{$packagesBooking->departure_date}}</td>
									<td>{{$packagesBooking->package->package_rate}}</td>
									<td>
									   @if($packagesBooking->package->package_rate ==0)
										   <span class="db-done">Done</span>
										@else	
									   <span class="db-done">Not Done</span>
									@endif	
									</td>
									<td><a href="db-event-details.html" class="db-done">view more</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>

@endsection