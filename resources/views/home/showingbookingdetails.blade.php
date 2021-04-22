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
			<div class="db-2-com db-2-main"  style="margin-top: 12px;">
				<div class="container"       style="width: 650px; background-color:white" id="content2">
				<img src="/images/logo.png" alt="Get your flight"    style="width: 195px;" >
				    <h4 style="margin-left: 210px;">Package Details </h4>
					<table class="table" >
						<tbody>
							<tr>
								<td>Transaction Id</td>
								<td>:</td>
								<td>{{$product->payment->txnid}}</td>
							</tr>
							<tr>
								<td>Bank Ref NO </td>
								<td>:</td>
								<td>{{$product->payment->bank_ref_num}}</td>
							</tr>
							<tr>
								<td>Issuing Bank</td>
								<td>:</td>
								<td>{{$product->payment->issuing_bank}}</td>
							</tr>
							<tr>
								<td>Package Name</td>
								<td>:</td>
								<td>{{$product->departure_city}}</td>
							</tr>
							<tr>
								<td>Amount</td>
								<td>:</td>
								<td>{{$product->payment->amount}}</td>
							</tr>
							<tr>
								<td>Discount</td>
								<td>:</td>
								<td>{{$product->payment->discount}}</td>
							</tr>
							<tr>
								<td>Net Amount</td>
								<td>:</td>
								<td>{{$product->payment->net_amount_debit}}</td>
							</tr>
							<tr>
								<td>Payment Status</td>
								<td>:</td>
								<td><span class="db-not-done" style="background-color: #199e31;">{{$product->payment->status}}</span>
								</td>
							</tr>
							<tr>
								<td>Name</td>
								<td>:</td>
								<td>{{$product->payment->firstname}}</td>
							</tr>
							<tr>
								<td>Email</td>
								<td>:</td>
								<td>{{$product->payment->email}}</td>
							</tr>
							<tr>
								<td>Booked at</td>
								<td>:</td>
								<td>{{$product->created_at}}</td>
							</tr>
							<tr>
								<td>Contact no.</td>
								<td>:</td>
								<td>{{$product->payment->phone}}</td>
							</tr>
							<tr>
								<td>Your City</td>
								<td>:</td>
								<td>{{$product->customer_city}}</td>
							</tr>
							<tr>
								<td>Total Adults</td>
								<td>:</td>
								<td>{{$product->total_adults}}</td>
							</tr>
							<tr>
								<td>Total Kids</td>
								<td>:</td>
								<td>{{$product->total_childrens}}</td>
							</tr>	
						</tbody>
					</table>	
			    </div>
		    </div>
			<div class="db-mak-pay-bot">
				<p style="color:green;">You have booked your package and keep all information for the future until or unless u will not come back at home. 
					it will a pleasure of us that you go with us.Our support team contact with you if any query will ocure 
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

