<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
        // toggle class 
        $(document).on('click','a.price_select_return',function(e) {
            
            e.preventDefault();
            $('.price_select_return_icon').hide();
            $('#price_select_return_icon_'+$(this).attr('value')).show();
        })
 
        $(document).on('click','a.price_select_from',function(e) {
            // console.log($(this))
            e.preventDefault();
            $('.price_select_from_icon').hide();
            $('#price_select_from_icon_'+$(this).attr('value')).show();
        })
        
        $(document).on('click','.departure_time_class',function(e) {
             var id_lable = $(this).attr('value')
             e.preventDefault();
            if ( $("#departure_time_"+id_lable).attr('isflight') == 0) {
                return
            }
           
            $("#departure_time_"+id_lable).toggleClass("checked_calss")
           
        })
        

        $(document).on('click','a.stops_class', function(e) {
            e.preventDefault();
            if ( $(this).attr('isflight') == 0) {
                return
            }
            if ($(this).hasClass("stops_color")) {
                $(this).removeClass("stops_color").addClass("stops_not_color")
                $(this).children().css({"color": "white"});
            } else {
                $(this).removeClass("stops_not_color").addClass("stops_color")
                $(this).children().css({"color": "#888"});
            }
            
        })

        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        var startDate;
        var endDate;

        // $( ".datepicker" ).datepicker({
        $(document).on('click', '.datepicker', function(){
            $(this).datepicker({
                format: "dd/mm/yyyy",
                    startDate: today,
                    autoclose: true
            }).on('changeDate', function(e){
                console.log("datepicker");
                
                startDate = $(this).datepicker('getDate');
                $(this).datepicker('hide');
            });
        });
    
        $(document).on('click', '.virtual_date', function(){
            $(this ).datepicker({
                format: "dd/mm/yyyy",
                todayHighlight: true,
                startDate: today,
                autoclose: true
            });
        })
    

        
        $(document).on('click', '.datepicker_re', function(){
            $(this ).datepicker({
                format: "dd/mm/yyyy",
                startDate: startDate,
                autoclose: true
            }).on('changeDate', function(e) {
                if($('#to_to').val()){
                    var returnDate = moment($(this).val(), "DD/MM/YYYY")
                    var departureDate = moment($('#to_to').val(), "DD/MM/YYYY");
                    if (returnDate < departureDate) {
                        $(this).val('');
                    }
                }else{
                    $(this).val('');
                }
                $(this).datepicker('hide');
            });
        });
    
        $('#from_from').change(function(){
            if($('#to_to').val()){
            }else{
                $(this).val('');
            }
            $(this).datepicker('hide');
        });

        $(document).on('change','.virtual_date', function(){
            var returnValue =  $(this).val();
            var returnDateId =  $(this).attr('valueId');
            var previousReturnId = parseInt(returnDateId-1);
            var returnDateFormat = moment(returnValue, "DD/MM/YYYY");
            var departureDateFormat
            if (previousReturnId == 0) {
                if ($("#to_to").val() == '' ) {
                    $(this).val('');   
                } else {
                    departureDateFormat = moment($('#to_to').val(), "DD/MM/YYYY");
                    if(returnDateFormat < departureDateFormat){
                        $(this).val('');
                    }
                }

            } else {
                if ($("#from_"+previousReturnId).val() == '' ) {
                    $(this).val('');
                } else {
                    departureDateFormat = moment($("#from_"+previousReturnId).val(), "DD/MM/YYYY");
                    if(returnDateFormat < departureDateFormat){
                        $(this).val('');
                    }
                }
            }
            $(this).datepicker('hide');
        
        });

        $(document).on('click', '#delete_flying', function(e) {
            e.preventDefault()
        });

        //----------------------------------------- FETCH ALL CITIES FOR Flight -----------------------------

        $.get( "/api/airportcitycountry/1", function( data ) {
            var dataair = data
            var objair = dataair.reduce(function(o, val) { o[val] = null; return o; }, {});
            var allaircities = (JSON.stringify(objair));

            $(document).on('keydown.autocomplete', '.flying_code_drop', function() {
                $(this).autocomplete({  
                    data: JSON.parse(allaircities),
                    limit: 8, // The max amount of results that can be shown at once. Default: Infinity.
                    onAutocomplete: function(val) {
                    // Callback function when value is autcompleted.
                    },
                    minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
                });
            })
            

            // $('.flying_code').autocomplete({  
            $(document).on('keydown.autocomplete', '.flying_code', function() {
                $(this).autocomplete({ 
                    data: JSON.parse(allaircities),
                    limit: 8, // The max amount of results that can be shown at once. Default: Infinity.
                    onAutocomplete: function(val) {
                    // Callback function when value is autcompleted.
                    },
                    minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
                });
            });
        });    

	});
</script>