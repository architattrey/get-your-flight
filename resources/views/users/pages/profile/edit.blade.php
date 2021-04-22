@extends('users.layouts.app')

<style>
.select-wrapper {
    position: relative;
    z-index: 1;
}
.waves-input-wrapper {
    width: 50%;
}
</style>

@section('content')

			<div class="db-2">
				<div class="db-2-com db-2-main">
					<h4>Edit My Profile </h4>
					
					@include('users.layouts.errors')
                        
                        @if(Session::has('flash_message'))
                        <div class="alert alert-info"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
						@endif
						

					<div class="db-2-main-com db2-form-pay db2-form-com">
						<form class="col s12" role="form" method="POST" action="{{ route('update_user', $user->id) }}">
						
						{!! csrf_field() !!}
							<div class="row">
								<div class="input-field col s12">
									<input type="text" class="validate" name="name" value="{{$user->name}}">
									<label>First Name</label>
								</div>
							</div>
							<div class="row">
							<div class="input-field col s12">
									<input type="text" class="validate" name="name" value="{{$user->name}}">
									<label>Name</label>
								</div>
								<div class="input-field col s12">
									<input type="text" class="validate" name="last_name" value="{{$user->last_name}}">
									<label>last Name</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m6">
									<input type="password" class="validate" name="password">
									<label>Enter Password</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="password" class="validate" name="password_confirmation">
									<label>Confirm Password</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m6">
									<input type="email" class="validate" name="email" value="{{$user->email}}"  disabled style="color: black" >
									<label>Email id</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="number" class="validate" name="mobile" value="{{$user->mobile}}">
									<label>Phone</label>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m6">
									<input type="text" class="validate" name="Country" value="India" disabled style="color: black" >
									<label>Country</label>
								</div>

								<div class="input-field col s12 m6">
									<select name="state">
										<option value="">------------Select State------------</option>
										<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
										<option value="Andhra Pradesh">Andhra Pradesh</option>
										<option value="Arunachal Pradesh">Arunachal Pradesh</option>
										<option value="Assam">Assam</option>
										<option value="Bihar">Bihar</option>
										<option value="Chandigarh">Chandigarh</option>
										<option value="Chhattisgarh">Chhattisgarh</option>
										<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
										<option value="Daman and Diu">Daman and Diu</option>
										<option value="Delhi">Delhi</option>
										<option value="Goa">Goa</option>
										<option value="Gujarat">Gujarat</option>
										<option value="Haryana">Haryana</option>
										<option value="Himachal Pradesh">Himachal Pradesh</option>
										<option value="Jammu and Kashmir">Jammu and Kashmir</option>
										<option value="Jharkhand">Jharkhand</option>
										<option value="Karnataka">Karnataka</option>
										<option value="Kerala">Kerala</option>
										<option value="Lakshadweep">Lakshadweep</option>
										<option value="Madhya Pradesh">Madhya Pradesh</option>
										<option value="Maharashtra">Maharashtra</option>
										<option value="Manipur">Manipur</option>
										<option value="Meghalaya">Meghalaya</option>
										<option value="Mizoram">Mizoram</option>
										<option value="Nagaland">Nagaland</option>
										<option value="Orissa">Orissa</option>
										<option value="Pondicherry">Pondicherry</option>
										<option value="Punjab">Punjab</option>
										<option value="Rajasthan">Rajasthan</option>
										<option value="Sikkim">Sikkim</option>
										<option value="Tamil Nadu">Tamil Nadu</option>
										<option value="Tripura">Tripura</option>
										<option value="Uttaranchal">Uttaranchal</option>
										<option value="Uttar Pradesh">Uttar Pradesh</option>
										<option value="West Bengal">West Bengal</option>
									</select>
								</div>
							</div>
							
							<div class="row">
								<div class="input-field col s12 m6">
									<input type="text" class="validate" name="city" value="{{$user->city}}">
									<label>City</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="number" class="validate" name="pin_code" value="{{$user->pin_code}}">
									<label>Pin Code</label>
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12 m12">
								<input type="text" class="validate" name="address" value="{{$user->address}}">
									<label>Address</label>
								</div>
							</div>
							
							<br><br><br><br>
							<div class="row">
								<div class="input-field col s12">
									<input type="submit" value="SUBMIT" class="waves-effect waves-light full-btn" style="width: 50%;"> </div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--RIGHT SECTION-->
		
@endsection