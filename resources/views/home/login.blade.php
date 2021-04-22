@extends('home.layouts.app')

@section('content')
			<!---=========================LOGIN PAGE===============-->

 @include('super_admin.layouts.errors')
 
	<section>
		<div class="tr-register">
			<div class="tr-regi-form top200" style="margin-top: 100px !important">
				<h4>Login</h4>
				@if(Session::has('flash_message2'))
    			<div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message2') !!}</em></div>
    			@endif
				<form role="form" method="POST" action="{{ route('checklogin') }}">
                         {!! csrf_field() !!}
                    <div class="row">
						<div class="input-field col s12">
							<input type="text" name="email" class="validate">
							<label>User Email</label>
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
							<input type="submit" value="submit" class="waves-effect waves-light btn-large full-btn"> </div>
					</div>
				</form>
				<p><a href="#">forgot password</a> | Are you a new user ? <a href="{{ url('/register') }}">Register </a></p>
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

