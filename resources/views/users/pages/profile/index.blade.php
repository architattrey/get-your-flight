@extends('users.layouts.app')

@section('content')

	<div class="db-2">
				<div class="db-2-com db-2-main">
					<h4>My Profile</h4>
					<div class="db-2-main-com db-2-main-com-table">
						<table class="responsive-table">
							<tbody>
								<tr>
									<td>First Name</td>
									<td>:</td>
									<td>{{$user->name}}</td>
								</tr>
								<tr>
									<td>User Name</td>
									<td>:</td>
									<td>{{$user->last_name or '-'}}</td>
								</tr>
								<tr>
									<td>Eamil</td>
									<td>:</td>
									<td>{{$user->email}}</td>
								</tr>
								<tr>
									<td>Phone</td>
									<td>:</td>
									<td>{{$user->mobile}}</td>
								</tr>
								<tr>
									<td>Address</td>
									<td>:</td>
									<td>{{$user->state or '-'}}  {{$user->city or '-'}}  {{$user->address or '-'}}  {{$user->pin_code or '-'}}</td>
								</tr>
								<tr>
									<td>Status</td>
									<td>:</td>
									<td>
										@if($user->status == 1)
											<span class="db-done">Active</span>
										@else
											<span class="db-done">Deactive</span>
										@endif
									</td>
								</tr>
							</tbody>
						</table>
						<div class="db-mak-pay-bot">
							<!-- <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>  -->
							<a href="{{route ('user_edit_view', $user->id)}}" class="waves-effect waves-light btn-large">Edit my profile</a> 
						</div>
					</div>
				</div>
			</div>
		
@endsection