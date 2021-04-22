@extends('home.layouts.app')
@section('css')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/easy-autocomplete.min.css" /> -->
@endsection
@section('content')

  <section>
    <div class="v2-hom-search">
      <div class="container" id="hotelsection">
        <div class="row">

          <div class="col-md-6">
            <div class="v2-ho-se-ri">
              <h5>World's leading tour and travels template</h5>
              <h1>Hotel booking now!</h1>
              <p>Experience the various exciting tour and travel packages and Make hotel reservations, find vacation packages, search cheap hotels and events</p>
              <div class="tourz-hom-ser v2-hom-ser">
                <ul>
                  <li>
                    <a href="/" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="images/icon/2.png" alt=""> Tour</a>
                  </li>
                  <li>
                    <a href="#" onclick="fliptab(2)"  class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="images/icon/31.png" alt=""> Flight</a>
                  </li>
                  <li>
                    <a href="#" onclick="fliptab(1)" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="images/icon/1.png" alt=""> Hotel</a>
                  </li>               
                </ul>
              </div>
            </div>            
          </div>  

          <div class="col-md-6">
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

               <!--  <div class="row">
                  <div class="input-field col s6">
                    <select>
                      <option value="" disabled selected>Min Price</option>
                      <option value="1">$200</option>
                      <option value="2">$500</option>
                      <option value="3">$1000</option>
                      <option value="1">$5000</option>
                      <option value="1">$10,000</option>
                      <option value="1">$50,000</option>
                    </select>
                  </div>
                  <div class="input-field col s6">
                    <select>
                      <option value="" disabled selected>Max Price</option>
                      <option value="1">$200</option>
                      <option value="2">$500</option>
                      <option value="3">$1000</option>
                      <option value="1">$5000</option>
                      <option value="1">$10,000</option>
                      <option value="1">$50,000</option>
                    </select>
                  </div>                
                </div>    -->           
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

      <div class="container" id="flightsection" style="display: none;">
        <div class="row">
          
          <div class="col-md-6">
            <div class="v2-ho-se-ri">
              <h5>World's leading tour and travels template</h5>
              <h1>Flight Booking to your travel!</h1>
              <p>Experience the various exciting tour and travel packages and Make hotel reservations, find vacation packages, search cheap hotels and events</p>
              <div class="tourz-hom-ser v2-hom-ser">
                <ul>
                  <li>
                    <a href="/" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="images/icon/2.png" alt=""> Tour</a>
                  </li>
                  <li>
                    <a href="#" onclick="fliptab(2)" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="images/icon/31.png" alt=""> Flight</a>
                  </li>
                  <li>
                    <a href="#" onclick="fliptab(1)" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="images/icon/1.png" alt=""> Hotel</a>
                  </li>               
                </ul>
              </div>
            </div>            
          </div>

          <div class="col-md-6">
            <div class="">
              <form class="v2-search-form" action="/air/getairdata">
                <div class="row">
                  <div class="input-field col s12">
                    <input type="text" id="flying_from" name="flying_from" class="autocomplete flying_code" placeholder="Flying From">
                    <label for="select-city">Flying From</label>
                  </div>
                  <div class="input-field col s12">
                    <input type="text" id="flying_to" name="flying_to" class="autocomplete flying_code" placeholder="Flying To">
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

    </div>
  </section>
@endsection

@section('script')
 
   <script type="text/javascript">
    function fliptab(index) {
      if (index == 1) {

        $("#flightsection").hide()
        $("#hotelsection").show()
        
      }else{
         $("#hotelsection").hide()
        $("#flightsection").show()
      }
    }
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
		      console.log(JSON.parse(allaircities));
          
          $('.flying_code').autocomplete({  
                    data: JSON.parse(allaircities),
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