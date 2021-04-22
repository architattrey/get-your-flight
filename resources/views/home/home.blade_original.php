@extends('home.layouts.app')
@section('css')
    <style>
        .activeclass {
            transform: scale(1.1);
            background: #f4364f;
            background: linear-gradient(to bottom,#f4364f,#dc2039);
            border: 1px solid #d41e36;
        }
    </style>
@endsection
@section('content')
<!--HEADER SECTION-->
    <section>
        <div class="tourz-search" style="padding-bottom: 10px;">
            <div class="container">
                <div class="tourz-hom-ser v2-hom-ser">
                   <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <ul style="display: flex;">

                                <li>
                                    <a href="#" value="2" class="waves-effect waves-light btn-large tourz-pop-ser-btn tab_btn_class"><img src="images/icon/31.png" alt=""> Flight</a>
                                </li>
                                <li>
                                    <a href="#" value="1" class="waves-effect waves-light btn-large tourz-pop-ser-btn tab_btn_class"><img src="images/icon/1.png" alt=""> Hotel</a>
                                </li>
                                <li>
                                    <a href="#" value="3" class="waves-effect waves-light btn-large tourz-pop-ser-btn tab_btn_class"><img src="images/icon/2.png" alt=""> Holidays</a>
                                </li>
                                <li>
                                    <a href="#" value="4" class="waves-effect waves-light btn-large tourz-pop-ser-btn tab_btn_class"><img src="images/icon/2.png" alt=""> Bus</a>
                                </li>
                                <li>
                                    <a href="#" value="5" class="waves-effect waves-light btn-large tourz-pop-ser-btn tab_btn_class"><img src="images/icon/2.png" alt=""> Visa</a>
                                </li>             
                            </ul>
                        </div>
                   </div>
                </div>
            </div>

            <div class="container hide_show " id="section2">
                <div class="row">

                    <div class="col-md-offset-2 col-md-8 ">
                        <div class="">
                            <form class="v2-search-form" action="/air/getairdata">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" id="flying_from" name="flying_from" class="autocomplete flying_code" >
                                        <label for="select-city">Flying From</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input type="text" id="flying_to" name="flying_to" class="autocomplete flying_code">
                                        <label for="select-city">Flying To</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input type="text" id="from" name="arrival_date">
                                        <label for="from">Arrival Date</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input type="text" id="to" name="departure_date">
                                        <label for="to">Departure Date</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <select name="no_of_adults">
                                            <option value="" disabled selected>No of adults</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="1">4</option>
                                            <option value="1">5</option>
                                            <option value="1">6</option>
                                        </select>
                                    </div>
                                    <div class="input-field col s6">
                                        <select name="no_of_child">
                                            <option value="" disabled selected>No of childrens</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="1">4</option>
                                            <option value="1">5</option>
                                            <option value="1">6</option>                      
                                        </select>
                                    </div>
                                </div> 

                                <div class="row">
                                    <div class="input-field col s6">
                                    <select name="journy_type">
                                        <option value="1">one way</option>
                                        <option value="2">Return</option>
                                    </select>
                                    </div>
                                </div>      

                                <div class="row">
                                <div class="input-field col s12">
                                    <input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn v2-ser-btn">
                                </div>
                                </div>
                            </form>
                        </div>            
                    </div> 

                </div>
            </div>

            <div class="container hide_show " id="section1"  style="display: none;">
                <div class="row">

                   
                    <div class="col-md-offset-2 col-md-8 ">
                        <div class="">
                        <form class="v2-search-form" action="/gethoteldata"> 
                            <div class="row">
                                <div class="input-field col s12">
                                    <!-- <input type="text" id="selectcity" name="city" class="autocomplete" placeholder="City, Destination and Hotel Name"> -->
                                    <input type="text" id="selectcity" name="city" class="autocomplete">
                                    <label for="select-city">City, Destination and Hotel Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="text" id="from" name="check_in_date">
                                    <label for="from">Check In</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="text" id="to" name="check_out_date">
                                    <label for="to">Check Out</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <select name="no_of_rooms">
                                    <option value="" disabled selected>No of Rooms</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="1">4</option>
                                    <option value="1">5</option>
                                    <option value="1">6</option>
                                    </select>
                                </div>
                                <div class="input-field col s6">
                                    <select name="no_of_night">
                                    <option value="" disabled selected>No of Night</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="1">4</option>
                                    <option value="1">5</option>
                                    <option value="1">6</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <select name="no_of_adults">
                                    <option value="" disabled selected>No of adults</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="1">4</option>
                                    <option value="1">5</option>
                                    <option value="1">6</option>
                                    </select>
                                </div>
                                <div class="input-field col s6">
                                    <select name="no_of_child">
                                    <option value="" disabled selected>No of childrens</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="1">4</option>
                                    <option value="1">5</option>
                                    <option value="1">6</option>                      
                                    </select>
                                </div>
                            </div>              
        
                            <div class="row">
                            <div class="input-field col s12">
                                <input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn v2-ser-btn">
                            </div>
                            </div>
                        </form>
                        </div>            
                    </div>        
                </div>
            </div>

            <div class="container hide_show " id="section3" style="display: none;">
                <div class="row">

                    <div class="col-md-offset-2 col-md-8 ">
                        <div class="">
                            <form class="v2-search-form" action="/holidays/search">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input type="text" id="p_flying_from" name="from" class="autocomplete flying_code" placeholder="Flying From">
                                        <label for="p_flying_from">From</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input type="text" id="p_flying_to" name="to" class="autocomplete" placeholder="Flying To">
                                        <label for="p_flying_to"> To</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select name="month_of_travel">
                                            <option value="0" selected>Month of Travel(Any)</option>
                                            <option value="6">May 2018</option>
                                            <option value="7">June 2018</option>
                                            <option value="8">July 2018</option>
                                            <option value="9">August 2018</option>
                                            <option value="10">September 2018</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn v2-ser-btn">
                                    </div>
                                </div>
                            </form>
                        </div>            
                    </div> 

                </div>
            </div>

            <div class="container hide_show " id="section4" style="display: none;">
                <div class="row">

                    <div class="col-md-offset-2 col-md-8 ">
                        <div class="">
                            <form class="v2-search-form" action="#">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" id="from" name="from" class="autocomplete flying_code" placeholder="Flying From">
                                        <label for="select-city">From</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input type="text" id="to" name="to" class="autocomplete flying_code" placeholder="Flying To">
                                        <label for="select-city">Flying To</label>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="input-field col s6">
                                        <input type="text" id="to" name="departure_date">
                                        <label for="to">Departure Date</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input type="text" id="from" name="arrival_date">
                                        <label for="from">Arrival Date</label>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <select name="no_of_adults">
                                            <option value="" disabled selected>Traveller</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="1">4</option>
                                            <option value="1">5</option>
                                            <option value="1">6</option>
                                        </select>
                                    </div>
                                </div>      

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn v2-ser-btn">
                                    </div>
                                </div>
                            </form>
                        </div>            
                    </div> 

                </div>
            </div>

            <div class="container hide_show " id="section5"  style="display: none;">
                <div class="row">
            
                    <div class="col-md-offset-2 col-md-8 ">
                        <div class="">
                            <form class="v2-search-form" action="/air/getairdata">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" id="selectcityforvisa" name="selectcityforvisa" class="autocomplete flying_code">
                                        <label for="select-city">Select City</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input type="text" id="from" name="check_in">
                                        <label for="from">Check In</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input type="text" id="to" name="check_out">
                                        <label for="to">Check Out</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <select name="no_of_adults">
                                            <option value="" disabled selected>People</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="1">4</option>
                                            <option value="1">5</option>
                                            <option value="1">6</option>
                                        </select>
                                    </div>
                                </div>      

                                <div class="row">
                                <div class="input-field col s12">
                                    <input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn v2-ser-btn">
                                </div>
                                </div>
                            </form>
                        </div>            
                    </div> 

                </div>
            </div>

        </div>
        <br><br><br>
    </section>          
    <!--END HEADER SECTION-->   
    <section>
        <div class="rows pad-bot-redu tb-space">
            <div class="container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title">
                    <h2><span>Tour Packages</span></h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>World's leading tour and travels Booking website,Over 30,000 packages worldwide.</p>
                </div>
                <div>
                    <!-- TOUR PLACES-->

                
                    @foreach($packages->chunk(3) as $chunk_package)
                        <div class="row">
                            @foreach($chunk_package as $package)
                                @php $images=json_decode($package->image); @endphp  
                                <div class="col-md-4 col-sm-6 col-xs-12 b_packages wow fadeInUp" data-wow-duration="1.5s">
                                        <div class="v_place_img">
                                            <img src="http://getflights.aresedge.com/storage/{{$images[0]}}" alt="Tour Booking" title="Tour Booking"/>
                                        </div> 
                                    <div class="b_pack rows">
                                        <div class="col-md-8 col-sm-8">
                                            <h4><a href="{{route('package_details',$package->slug)}}">{{$package->package_name}}<span class="v_pl_name">(Indiana)</span></a></h4>
                                        </div>
                                        <div class="col-md-4 col-sm-4 pack_icon">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
               
               </div>
            </div>
        </div>
    </section>
    <!--====== HOME HOTELS ==========-->
  
    <!--====== SECTION: FREE CONSULTANT ==========-->
     
    <!--====== POPULAR TOUR PLACES ==========-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">Popular Domestic Routes in India</h3>

                    <div class="col-md-12 b_packages wow fadeInUp" data-wow-duration="1.5s">
                        <table>
                            <tbody>
                                <tr class="text-center">
                                    <td>Delhi to Mumbai</td>
                                    <td>Delhi to Mumbai</td>
                                    <td>Delhi to Mumbai</td>
                                </tr>
                                <tr  class="text-center">
                                    <td>Delhi to Mumbai</td>
                                    <td>Delhi to Mumbai</td>
                                    <td>Delhi to Mumbai</td>
                                </tr>
                                <tr  class="text-center">  
                                    <td>Delhi to Mumbai</td>
                                    <td>Delhi to Mumbai</td>
                                    <td>Delhi to Mumbai</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Popular International Routes from India</h3>
                    <div class="col-md-12 b_packages wow fadeInUp" data-wow-duration="1.5s">
                        <table>
                            <tbody>
                                <tr class="text-center">
                                    <td>Mumbai to Dubai</td>
                                    <td>Mumbai to Dubai</td>
                                    <td>Mumbai to Dubai</td>
                                </tr>
                                <tr  class="text-center">
                                    <td>Mumbai to Dubai</td>
                                    <td>Mumbai to Dubai</td>
                                    <td>Mumbai to Dubai</td>
                                </tr>
                                <tr  class="text-center">  
                                    <td>Mumbai to Dubai</td>
                                    <td>Mumbai to Dubai</td>
                                    <td>Mumbai to Dubai</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== REQUEST A QUOTE ==========-->
    
    <!--====== REQUEST A QUOTE ==========-->
    <br><br><br>

@endsection


@section('script')
 
<script type="text/javascript">

    // function fliptab(index) {
    //     $(".hide_show").hide()
    //     // $(".activeclass").removeclass('activeclass').addclass("deactiveclass")
    //     // $("#section"+index).removeclass('deactiveclass').addclass("activeclass")
    //     $("#section"+index).show()
    // }

    $( function() {
        $( "#checkin" ).datepicker({
            altFormat: "d MM,DD, yy"
        });

        $(".tab_btn_class").click(function(e) {
            e.preventDefault()
            var indexposition = $(this).attr('value')
            $(".hide_show").hide()
            $("#section"+indexposition).show()
        })
    });

    $( function() {
         $( "#checkout" ).datepicker({
             altFormat: "d MM, DD, yy"
         });
    });

     $( function() {
         $( "#from" ).datepicker({
             altFormat: "d MM,DD, yy"
         });
    });

    $( function() {
         $( "#to" ).datepicker({
             altFormat: "d MM, DD, yy"
         });
    });


 //----------------------------------------  FETCH ALL CITIES FOR HOTELS ---------------------------------
    $(document).ready(function() {
        var datacity
        $.get( "/api/city/1", function( data ) {
            datacity = data
            var obj = datacity.reduce(function(o, val) { o[val] = null; return o; }, {});
            var allcities = (JSON.stringify(obj));
        
           $('#selectcity').autocomplete({  
              data: JSON.parse(allcities),
              limit: 8, // The max amount of results that can be shown at once. Default: Infinity.
              onAutocomplete: function(val) {
              // Callback function when value is autcompleted.
              },
              minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
            });
        });

        //-----------------------------------------	FETCH ALL CITIES FOR Flight -----------------------------
      
        $.get( "/api/airportcitycountry/1", function( data ) {
            var dataair = data
            var objair = dataair.reduce(function(o, val) { o[val] = null; return o; }, {});
            var allaircities = (JSON.stringify(objair));
            
            $('.flying_code').autocomplete({  
                data: JSON.parse(allaircities),
                limit: 8, // The max amount of results that can be shown at once. Default: Infinity.
                onAutocomplete: function(val) {
                // Callback function when value is autcompleted.
                },
                minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
            });
        });   

        // holidays city list
        
        $.get( "/api/package/city/data/1", function( data ) {
            var datapackage = data
            var objpackage = datapackage.reduce(function(o, val) { o[val] = null; return o; }, {});
            var allpackagecities = (JSON.stringify(objpackage));
            
            $('#p_flying_to').autocomplete({  
                data: JSON.parse(allpackagecities),
                limit: 8, // The max amount of results that can be shown at once. Default: Infinity.
                onAutocomplete: function(val) {
                // Callback function when value is autcompleted.
                },
                minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
            });
        });   

    });

</script>

@endsection

