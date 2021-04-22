<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- FAV ICON -->
    <link rel="shortcut icon" href="/images/fav.ico">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:400,500,700" rel="stylesheet">


    <!-- MAKE PDF FILE -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<!-- font awosome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


 
    
	<style>
	
	</style>
</head>
<body>

<div class="row" >
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="db-2" >
		    <a  href="#"  id="cmd2" style="float:right; margin-right: 80px;"><i class="fa fa-file-pdf-o fa-2x"></i> Click to download pdf </a>
			<div class="db-2-com db-2-main"  style="margin-top: 12px;" id="content2">
				<div class="container"       style="width: 650px; background-color:white" >
				    <img src="/images/logo.png" alt="Get your flight"    style="width: 195px;" >
				    <h4 style="margin-left: 210px;"> Details </h4>
					<table class="table" >
						<tbody>
							<tr>
								<td>Transaction Id</td>
								<td>:</td>
								<td>{{$HotelBookings->payment->txnid}}</td>
                                <td></td>
							</tr>
							<tr>
								<td>Bank Ref NO </td>
								<td>:</td>
								<td>{{$HotelBookings->payment->bank_ref_num}}</td>
                                <td></td>
							</tr>
							<tr>
								<td>Issuing Bank</td>
								<td>:</td>
								<td>{{$HotelBookings->payment->issuing_bank}}</td>
                                <td></td>
							</tr>
							<tr>
								<td>Hotel Name</td>
								<td>:</td>
								<td>{{$HotelBookings->hotel_info}}</td>
                                <td></td>
							</tr>
							<tr>
								<td>Amount</td>
								<td>:</td>
								<td>{{$HotelBookings->payment->amount}}</td>
                                <td></td>
							</tr>
							<tr>
								<td>Discount</td>
								<td>:</td>
								<td>{{$HotelBookings->payment->discount}}</td>
                                <td></td>
							</tr>
							<tr>
								<td>Net Amount</td>
								<td>:</td>
								<td>{{$HotelBookings->payment->net_amount_debit}}</td>
                                <td></td>
							</tr>
							<tr>
								<td>Payment Status</td>
								<td>:</td>
								<td><span class="db-not-done" style="background-color: #199e31;">{{$HotelBookings->payment->status}}</span>
								</td>
							</tr>
							<tr>
								<td>Name</td>
								<td>:</td>
								<td>{{$HotelBookings->payment->firstname}}</td>
                                <td></td>
							</tr>
							<tr>
								<td>Email</td>
								<td>:</td>
								<td>{{$HotelBookings->payment->email}}</td>
                                <td></td>
							</tr>
							<tr>
								<td>Booked at</td>
								<td>:</td>
								<td>{{$HotelBookings->payment->created_at}}</td>
                                <td></td>
							</tr>
							<tr>
								<td>Contact no.</td>
								<td>:</td>
								<td>{{$HotelBookings->payment->phone}}</td>
                                <td></td>
							</tr>
							<tr>
								<td>Your City</td>
								<td>:</td>
								<td>{{$HotelBookings->city}}</td>
                                <td></td>
							</tr>
							<tr>
								<td>Total Adults</td>
								<td>:</td>
								<td>{{$HotelBookings->total_adults}}</td>
                                <td></td>
							</tr>
                            <tr>
                                @php $adultDetails = json_decode($HotelBookings->adults_details);   @endphp
                                <td>Full Name</td>
                                <td>:</td>
                                @foreach($adultDetails as $showDetails)
                                    <td>{{$showDetails->name}} {{$showDetails->last_name}}</td>
                                @endforeach
							</tr>
                            <tr>
                                <td>Age</td>
                                <td>:</td>
                                @foreach($adultDetails as $showDetails)
                                    <td>{{$showDetails->age}}</td>
                                @endforeach
							</tr>
							<tr>
								<td>Total Kids</td>
								<td>:</td>
								<td>{{$HotelBookings->total_childrens}}</td>
							</tr>	
                            <tr>
                                @php $childrenDetails = json_decode($HotelBookings->childrens_details);   @endphp
                                <td>Full Name</td>
                                <td>:</td>
                                @foreach($childrenDetails as $showDetails)
                                    <td>{{$showDetails->name}} {{$showDetails->last_name}}</td>
                                @endforeach
							</tr>
                            <tr>
                                <td>Age</td>
                                <td>:</td>
                                @foreach($childrenDetails as $showDetails)
                                    <td>{{$showDetails->age}}</td>
                                @endforeach
							</tr>
						</tbody>
					</table>	
			    </div>
		    </div>
			<div class="db-mak-pay-bot">
				<p style="color:green;">You have booked your hotel and keep all information for the future until or unless u will not come back at home. 
					it will a pleasure of us that you go with us.Our support team contact with you if any query will ocure.
				</p>
				
				
			</div>
	    </div>
	</div>
	<div class="col-md-3"></div>
</div>
<script>
$(document).ready(function(){
    $('#cmd2').click(function() {
	 //console.log("jghkjhg");
  	    var options = {
	 	//'width':20%,
		
  	    };
	 	var pdf = new jsPDF('p', 'pt', 'a4');
	 	pdf.addHTML($("#content2"),  options, function() {
	 		pdf.save('package_details.pdf');
		});
    });
	
});	
</script>
</body>
</html>

