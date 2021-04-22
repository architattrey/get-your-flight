@extends('users.layouts.app')

@section('content')

 <!--CENTER SECTION-->
			<div class="db-2">
				<div class="db-2-com db-2-main">
					<h4>Manage Booking</h4>
					<div class="db-2-main-com">
						<div class="db-2-main-1">
							<div class="db-2-main-2"> <img src="images/icon/db2.png" alt="" /><span>Travel Bookings</span>
								<ul>
									<li><a href="db-travel-details.html">Honeymoon Package</a>
									</li>
									<li><a href="db-payment.html">Payment Status <span class="db-done">Done</span></a>
									</li>
									<li><a href="db-travel-details.html">Remaining Days - 14</a>
									</li>
									<li><a href="db-travel-details.html">Travel Date - 16 may 2018</a>
									</li>
									<li><a href="db-refund.html">Cancel this booking</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="db-2-main-1">
							<div class="db-2-main-2"> <img src="images/icon/db3.png" alt="" /><span>Hotel Bookings</span>
								<ul>
									<li><a href="db-hotel-details.html">GTC Grand Chola</a>
									</li>
									<li><a href="db-payment.html">Payment Status <span class="db-not-done">not-Done</span></a>
									</li>
									<li><a href="db-hotel-details.html">Remaining Days - 14</a>
									</li>
									<li><a href="db-hotel-details.html">Travel Date - 16 may 2018</a>
									</li>
									<li><a href="db-refund.html">Cancel this booking</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="db-2-main-1">
							<div class="db-2-main-2"> <img src="images/icon/db1.png" alt="" /><span>Event Bookings</span>
								<ul>
									<li><a href="db-event-details.html">Eiffel Tower Party</a>
									</li>
									<li><a href="db-payment.html">Payment Status <span class="db-not-done">not-Done</span></a>
									</li>
									<li><a href="db-event-details.html">Remaining Days - 14</a>
									</li>
									<li><a href="db-event-details.html">Travel Date - 16 may 2018</a>
									</li>
									<li><a href="db-refund.html">Cancel this booking</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
      @endsection