
<section>
        <div class="ed-mob-menu">
            <div class="ed-mob-menu-con">
                   <div class="ed-mm-left">
                    <div class="wed-logomobi">
                        <a href="#"><img src="/images/logomobif.png" alt="" />
						</a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
                            <h4>My Account</h4>
                            <ul>
                                <li><a href="places-1.html">My Wallet</a></li>
                                @if(Auth::guest())
                                <li><a href="places-2.html">SignIn</a></li>
                                @else
                                <li><a href="{{url('/dashboard')}}">My Profile</a></li>
                                <li><a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        
                                        {{ csrf_field() }}
                                    </form>
                                 </li>
                                 @endif
                            </ul>

                            <h4>Support</h4>
                            <ul>
                                <li><a href="places-1.html">Contact Us</a></li>
                                <li><a href="places-1.html">Make A Payment</a></li>
                                <li><a href="places-1.html">Flight Cancellation</a></li>
                                <li><a href="places-1.html">E-ticket</a></li>
                                <li><a href="places-1.html">Invoice</a></li>
                            </ul>

                           
                            <h4>Special Deals</h4>
                            <ul>
                                <li><a href="places-1.html">Hot Deals</a></li>
                                <li><a href="places-2.html">Promo code on flights</a></li>
                                <li><a href="places-2.html">Promo code on hotel</a></li>
                                <li><a href="places-2.html">Hot Deals</a></li>
                                <li><a href="places-2.html">Promo code Holiday</a></li>
                            </ul>

                            <h4>B2B</h4>
                            <ul>
                                <li><a href="#">Register</a></li>
                                <li><a href="#">Login</a></li>
                            </ul>

                          <h4>Corporate</h4>
                            <ul>
                                <li><a href="#">Register</a></li>
                                <li><a href="#">Login</a></li>
                            </ul>

                            <h4>1800-2432-2324</h4>
                           <!--  <ul>
                                <li><a href="db-travel-details.html"></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--HEADER SECTION-->
    <section id="headsection" >
        <!-- TOP BAR -->
        <div class="ed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ed-com-t1-left">
                            <ul>
                                <li><a href="#">Address: C-23,Office No-5 ground floor, Noida Sector 63, U.P</a>
                                </li>
                                <li><a href="#">Phone: 0120-4775110</a>
                                </li>
                            </ul>
                        </div>
                        <div class="ed-com-t1-right">
                            <ul>
                                @if (Auth::guest())
                                    <li><a href="/login">Sign In</a></li>
                                    <li><a href="/register">Sign Up</a></li>
                                @else
                                <li><a href="{{url('/dashboard')}}">My Profile</a></li>
                                 <li><a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        
                                        {{ csrf_field() }}
                                    </form>
                                 </li>
                                @endif
                            </ul>
                        </div>
                        <div class="ed-com-t1-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- LOGO AND MENU SECTION -->
        <div class="top-logo" data-spy="affix" data-offset-top="250">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wed-logo">
                            <a href="/"><img src="/images/logo.png" alt="" />
                            </a>
                        </div>
                          <div class="wed-logom">
                            <a href="/"><img src="/images/logomobif.png" alt="Get Your Flights" />
                            </a>
                        </div>
                    <div class="main-menu ">
        <ul>
                <li class="dropdown dropdown-toggle" id="menu1" data-toggle="dropdown"> <a href="#" >My Account</a>
                       <div class="mm1-com mm1-s1 mm-pos">
                            <div class="ed-course-in">
                              <ul class="dropdown-menu"  role="menu" aria-labelledby="menu1">
                              <li ><a  href="#">My Booking</a></li>
                                <li ><a  href="#">My Wallet</a></li>
                                @if(Auth::guest())
                                <li ><a  href="/login">SignIn</a></li>
                                @else
                                <li id="target"><a id="target">My Profile</li></a>
                                 <li>
                                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                    </a>
                                 
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    
                                 </li>
                                 @endif
                              </ul>
                         </div>
                      </div>
                </li>

                <li class="dropdown dropdown-toggle" id="menu1" data-toggle="dropdown"> <a href="#" >Supports</a>
                       <div class="mm1-com mm1-s1 mm-pos">
                            <div class="ed-course-in">
                              <ul class="dropdown-menu"  role="menu" aria-labelledby="menu1">
                                <li ><a  href="#">Contact Us</a></li>
                                <li ><a  href="#">Make A Payment</a></li>
                                <li ><a  href="#">Flight Cancellation</a></li>
                                <li ><a  href="#">E-ticket</a></li>
                                <li ><a  href="#">Invoice</a></li>
                              </ul>
                         </div>
                      </div>
                </li>

                <li class="dropdown dropdown-toggle" id="menu1" data-toggle="dropdown"> <a href="#" >Special Deals </a>
                       <div class="mm1-com mm1-s1 mm-pos">
                            <div class="ed-course-in">
                              <ul class="dropdown-menu"  role="menu" aria-labelledby="menu1">
                                <li ><a  href="#">Hot Deals</a></li>
                                <li ><a  href="#">Promo code on flights</a></li>
                                <li ><a  href="#">Promo code on hotel</a></li>
                                <li ><a  href="#">Promo code Holiday</a></li>
                              </ul>
                         </div>
                      </div>
                </li>

                <li class="dropdown dropdown-toggle" id="menu1" data-toggle="dropdown"> <a href="#" >B2B</a>
                       <div class="mm1-com mm1-s1 mm-pos">
                            <div class="ed-course-in">
                              <ul class="dropdown-menu"  role="menu" aria-labelledby="menu1">
                                <li ><a  href="#">Register</a></li>
                                <li ><a  href="#">Login</a></li>
                              </ul>
                         </div>
                      </div>
                </li>

                <li class="dropdown dropdown-toggle" id="menu1" data-toggle="dropdown"> <a href="#" >Corporate</a>
                       <div class="mm1-com mm1-s1 mm-pos">
                            <div class="ed-course-in">
                              <ul class="dropdown-menu"  role="menu" aria-labelledby="menu1">
                                <li ><a  href="#">Register</a></li>
                                <li ><a  href="#">Login</a></li>
                              </ul>
                         </div>
                      </div>
                </li>
                <li><a href="#" >0120-4775110</a></li>
        </ul>
</div>
                    </div>
                </div>
            </div>
        </div>

    </section>