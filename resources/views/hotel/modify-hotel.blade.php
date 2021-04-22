						
                        
                        <!-- Modal Modify Hotel Search -->
<div id="myModal2" class="modal fade" role="dialog" style="margin-top: 100px;">
	@include('super_admin.layouts.errors')
		@if(Session::has('flash_message'))
			<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span>
			<em>{!! session('flash_message') !!}</em></div> 
		@endif
			<div class="container">
				<div class="modal-header" style="background-color: white;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Modify Search</h4>
				</div>
		      	<form class="v2-search-form" action="/gethoteldata"> 
					<div class="row">
						<div class="input-field col s2">
							<p><b>City:</b></p>
							<input type="text" id="selectcity" value="{{$city}}" name="city" class="autocompletbbbe" placeholder="City, Destination and Hotel Name">
							<!-- <label for="select-city">City, Destination and Hotel Name</label> -->
						</div>
						<div class="input-field col 2">
							<p><b>Check In Date:</b></p>
							<input type="text" id="checkin" value="{{$check_in_date}}" name="check_in_date">
							<label for="from">Check In</label>
						</div>
						<div class="input-field col s2">
							<p><b>Check Out Date:</b></p>
							<input type="text" id="checkout" value="{{$check_out_date}}" name="check_out_date">
							<label for="to">Check Out</label>
						</div>
						<div class="input-field col s1">
							<p><b>Adults:</b></p>
							<select name="no_of_adults">
							<option value="" disabled selected>{{$no_of_adults}}</option>
							<option value="{{$no_of_adults == "1" ? 'selected' : '-'}}">1</option>
							<option value="{{$no_of_adults == "2" ? 'selected' : '-'}}">2</option>
							<option value="{{$no_of_adults == "3" ? 'selected' : '-'}}">3</option>
							<option value="{{$no_of_adults == "4" ? 'selected' : '-'}}">4</option>
							<option value="{{$no_of_adults == "5" ? 'selected' : '-'}}">5</option>
							<option value="{{$no_of_adults == "6" ? 'selected' : '-'}}">6</option>
							</select>
						</div>
						<div class="input-field col s1">
							<p><b>Childrens:</b></p>
							<select name="no_of_child">
							<option value="" disabled selected>{{$no_of_child}}</option>
							<option value="{{$no_of_child == "1" ? 'selected' : '-'}}">1</option>
							<option value="{{$no_of_child == "2" ? 'selected' : '-'}}">2</option>
							<option value="{{$no_of_child == "3" ? 'selected' : '-'}}">3</option>
							<option value="{{$no_of_child == "4" ? 'selected' : '-'}}">4</option>
							<option value="{{$no_of_child == "5" ? 'selected' : '-'}}">5</option>
							<option value="{{$no_of_child == "6" ? 'selected' : '-'}}">6</option>                      
							</select>
						</div>
							<div class="input-field col s2 pull-right" style="margin-top: 47px;">
							<input type="submit" value="Search Again" class="waves-effect waves-light tourz-sear-btn v2-ser-btn">
						</div>
					</div>                                 
				</form> 
            </div>      
</div>