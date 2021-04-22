@extends('home.layouts.app')

@section('content')
			<!---=========================REGISTER PAGE===============-->
 @include('super_admin.layouts.errors')
 	@if(Session::has('flash_message'))
	    <div class="alert alert-info"><span class="glyphicon glyphicon-ok"></span><em>{!! session('flash_message') !!} </em></div>
	@endif

	<section>
		<div class="tr-register">
			<div class="tr-regi-form">
				<h4>Create an Account</h4>
				<p>It's free and always will be.</p>
				<form class="col s12" method="POST" action="{{ route('checkregister')}}">
						{!! csrf_field() !!}  <!--USED FOR CHECKING DATA TRANSFER FROM ONE PAGE TO ANOTHER PAGE-->
					<div class="row">
						<div class="input-field col m6 s12">
							<input type="text" name="fname" class="validate">
							<label>First Name</label>
						</div>
						<div class="input-field col m6 s12">
							<input type="text" name="lname" class="validate">
							<label>Last Name</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="number" name="number" class="validate">
							<label>Mobile</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="email" name="email" class="validate">
							<label>Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="password" name="password" class="validate">
							<label>Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="password" name="password_confirmation" class="validate">
							<label>Confirm Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="submit" value="submit" class="waves-effect waves-light btn-large full-btn"> </div>
					</div>
				</form>
				<p>Are you a already member ? <a href="{{ route('login')}}">Click to Login</a>
				</p>
				<div class="soc-login">
					<h4>Sign in using</h4>
					<ul>
						<li><a href="{{ route('socaillogin', 'facebook') }}"><i class="fa fa-facebook fb1"></i> Facebook</a> </li>
						<li>
						<!-- <a href="#"><i class="fa fa-twitter tw1"></i> Twitter</a> -->
						 </li>
						<li><a href="{{ route('socaillogin', 'google') }}"><i class="fa fa-google-plus gp1"></i> Google</a> </li>
					</ul>
				</div>
			</div>
		</div>
	</section>
@endsection 

