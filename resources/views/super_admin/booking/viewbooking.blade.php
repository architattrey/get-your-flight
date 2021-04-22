@extends('super_admin.layouts.app')

@section('content')

<div class="container">	
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header" style="background-color:orange;">
					 <h4 align="center">Package Informations</h4>
				</div>
				<div class="card-body">
					<table class="table table-responsive-sm table-striped">
						<tbody>
							<tr>
								<td><h6>Package I.D</h6></td>
								<td>{{$bookingPackagelist->package_id}}</td>
							</tr>
							<tr>
								<td><h6>Package Namne</h6></td>
								<td>{{$bookingPackagelist->package->package_name}}</td>
							</tr>
							<tr>
								<td><h6>City</h6></td>
								<td>{{$bookingPackagelist->package->city}}</td>
							</tr>
							<tr>
								<td><h6>Departure Date</h6></td>
								<td>{{$bookingPackagelist->departure_date}}</td>
							</tr>
							<tr>
								<td><h6>Seller</h6></td>
								<td>{{$bookingPackagelist->package->seller}}</td>
							</tr>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header" style="background-color:#80f442";>
					<h4 align="center">Customer Informations</h4>
				</div>
				<div class="card-body">
					<table class="table table-responsive-sm table-striped">
						<tbody>
							<tr>
								<td><h6>Total Adults</h6></td>
								<td>{{$bookingPackagelist->total_adults}}</td>
							</tr>
							<tr>
								<td><h6>Total Childrens</h6></td>
								<td>{{$bookingPackagelist->total_childrens}}</td>
							</tr>
							<tr>
								<td><h6>Contact No.</h6></td>
								<td>{{$bookingPackagelist->phone}}</td>
							</tr>
							<tr>
								<td><h6>Emai Id.</h6></td>
								<td>{{$bookingPackagelist->email}}</td>
							</tr>
							<tr>
								<td><h6>Booked Date</h6></td>
								<td>{{$bookingPackagelist->package->created_at}}</td>
							</tr>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header" style="background-color:#f44141;">
					 <h4 align="center">Adults Information</h4>
				</div>
				<div class="card-body">
					@php $adults = json_decode($bookingPackagelist->adults_details); @endphp
					@foreach($adults as $adult_key => $adult)
						@php $adult_key++; @endphp
						<table class="table table-responsive-sm table-striped">
							<h4 style="background-color:grey;">Adult : {{$adult_key}}</h4>
							<tbody>
								<tr>
									<td><h6>Name</h6></td>
									<td>{{$adult->adult_name}}</td>
								</tr>
								<tr>
									<td><h6>Date Of Birth</h6></td>
									<td>{{$adult->adult_dob}}</td>
								</tr>
							</tbody>
						</table>
						<hr>
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header" style="background-color:#4183f4;">
					<h4 align="center">Childrens Information</h4>
				</div>
				<div class="card-body">
					@php $childrens= json_decode($bookingPackagelist->childrens_details); @endphp
					@foreach($childrens as $children_key => $children)
					@php $children_key++; @endphp
					<table class="table table-responsive-sm table-striped">
						<h4 style="background-color:grey;">Children : {{$children_key++}}</h4>
						<tbody>
							<tr>
								<td><h6>Name</h6></td>
								<td>{{$children->child_name}}</td>
							</tr>
							<tr>
								<td><h6>Date Of Birth</h6></td>
								<td>{{$children->child_dob}}</td>
							</tr>
						</tbody>
					</table>
					<hr>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection