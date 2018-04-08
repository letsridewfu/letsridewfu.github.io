<?php
//index.php

$error = '';
$firstName = '';
$lastName = '';
$email = '';
$phone = '';
$residence = '';
$airport = '';
$departure = '';
$departuredate ='';
$airline = '';
$flightNum = '';

function clean_text($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

if(isset($_POST["submit"]))
{
	if(empty($_POST["firstName"]))
	{
		$error .= '<p><label class="text-danger">Please Enter your First Name</label></p>';
	}
	else
	{
		$firstName = clean_text($_POST["firstName"]);
		if(!preg_match("/^[a-zA-Z ]*$/",$firstName))
		{
			$error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
		}
	}
	if(empty($_POST["lastName"]))
	{
		$error .= '<p><label class="text-danger">Please Enter your Last Name</label></p>';
	}
	else
	{
		$lastName = clean_text($_POST["lastName"]);
		if(!preg_match("/^[a-zA-Z ]*$/",$lastName))
		{
			$error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
		}
	}
	if(empty($_POST["email"]))
	{
		$error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
	}
	else
	{
		$email = clean_text($_POST["email"]);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$error .= '<p><label class="text-danger">Invalid email format</label></p>';
		}
	}
	if(empty($_POST["phone"]))
	{
		$error .= '<p><label class="text-danger">Phone number is required</label></p>';
	}
	else
	{
		$phone = clean_text($_POST["phone"]);
	}
	if(empty($_POST["residence"]))
	{
		$error .= '<p><label class="text-danger">residence Hall is required</label></p>';
	}
	else
	{
		$residence = clean_text($_POST["residence"]);
	}
	if(empty($_POST["airport"]))
	{
		$error .= '<p><label class="text-danger">Airport is required</label></p>';
	}
	else
	{
		$airport = clean_text($_POST["airport"]);
	}
	if(empty($_POST["departure"]))
	{
		$error .= '<p><label class="text-danger">Departure time is required</label></p>';
	}
	else
	{
		$departure = clean_text($_POST["departure"]);
	}
	if(empty($_POST["departuredate"]))
	{
		$error .= '<p><label class="text-danger">Departure date is required</label></p>';
	}
	else
	{
		$departuredate = clean_text($_POST["departuredate"]);
	}
	if(empty($_POST["airline"]))
	{
		$error .= '<p><label class="text-danger">Airline is required</label></p>';
	}
	else
	{
		$airline = clean_text($_POST["airline"]);
	}
	if(empty($_POST["flightNum"]))
	{
		$error .= '<p><label class="text-danger">Flight number is required</label></p>';
	}
	else
	{
		$flightNum = clean_text($_POST["flightNum"]);
	}


	if($error == '')
	{
		$file_open = fopen("contact_data.csv", "a");
		$no_rows = count(file("contact_data.csv"));
		if($no_rows > 1)
		{
			$no_rows = ($no_rows - 1) + 1;
		}
		$form_data = array(
		'sr_no'		=>	$no_rows,
		'firstName'	=>	$firstName,
		'lastName'	=>	$lastName,
		'email'		=>	$email,
		'phone'		=>	$phone,
		'residence'	=>	$residence,
		'airport'	=>	$airport,
		'departure'	=>	$departure,
		'departuredate' => $departuredate,
		'airline'	=>	$airline,
		'flightNum'	=>	$flightNum
		);
		fputcsv($file_open, $form_data);
		$error = '<label class="text-success">Thank you for contacting us</label>';
		$firstName = '';
		$lastName = '';
		$email = '';
		$phone = '';
		$residence = '';
		$airport = '';
		$departure = '';
		$departuredate = '';
		$airline = '';
		$flightNum = '';
	}
}

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Let's Ride</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
	body {
		padding-top: 50px;
		padding-bottom: 20px;
	}
</style>
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/main.css">
<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

</head>
<body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <nav class="navbar navbar-inverse navbar-fixed-top">
        	<div class="container-fluid myNav">
        		<!-- Brand and toggle get grouped for better mobile display -->
        		<div class="navbar-header">
        			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        				<span class="sr-only">Toggle navigation</span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        			</button>
        			<h1 id="title"><strong>Let's Ride.</strong></h1>
        			<!--<img class="img-responsive navbar-brand" src="http://via.placeholder.com/300x50">!-->
        		</div>
        		<!-- Collect the nav links, forms, and other content for toggling -->
        		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        			<ul class="nav navbar-nav navbar-right">
        				<li><a href="#AboutUs">ABOUT US</a></li>
        				<li><a href="#Our Mission">OUR MISSION</a></li>
        				<li><a href="#FAQs">FAQs</a></li>
        				<li><a href="contactUs.html">Contact Us</a></li>
        			</ul>
        		</li>
        	</ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- ******* HEADER ******* -->
<div class="img-plane">
	<!--<img class="img-responsive" src="img/LRPhoto.jpg"></a>!-->
	<div class="container" id="form">
		<br><br><p><h2 id="instr"> Fill out the form to match with fellow students and start saving money!</h2></p>
		<div class="col-md-6" style="margin:0 auto; float:none;">
			<form method="post" action=" ">
				<?php echo $error; ?>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="PersonalInfo">
					<h2><strong> Personal Information</strong></h2> 
					<input type="text" name="firstName" placeholder="Enter First Name" value="<?php echo $firstName; ?>" />
					<input type="text" name="lastName" placeholder="Enter Last Name" value="<?php echo $lastName; ?>" />
					<input type="text" name="email"  placeholder="Enter Email" value="<?php echo $email; ?>" />
					<input type="text" name="phone"  placeholder="Enter phone number" value="<?php echo $phone; ?>" />
					<input type="text" name="residence"  placeholder="Enter Residence Hall" value="<?php echo $residence; ?>" />
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="FlightInfo">
				<h2> <strong>Flight Information </strong></h2>
					<input type="text" name="airport" placeholder="Enter airport name" value="<?php echo $airport; ?>" />
					<input type="text" name="departure" placeholder="Enter departure time" value="<?php echo $departure; ?>" />
					<input type="text" name="departuredate" placeholder="Enter departure Date ex: 05/01/2018" value="<?php echo $departuredate; ?>" />
					<input type="text" name="airline"  placeholder="Enter Airline Name" value="<?php echo $airline; ?>" />
					<input type="text" name="flightNum"  placeholder="Enter Flight number" value="<?php echo $flightNum; ?>" />
					<input type="submit" name="submit" class="btn btn-info" value="Submit" />
				</div>
			</form>
		</div>
	</div>

	<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="container">
		<h1 align="center">ABOUT US</h1>
		<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>       
	</div>
	<div class="container">
		<!-- Example row of columns -->
		<div class="row">
			<div class="col-sm-3">
				<img class="img-responsive" src="http://via.placeholder.com/170x100"></a>
				<h4>CHARTERS PER YEAR</h4>
				<br>
				<p>sto sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
			</div>
			<div class="col-sm-3">
				<img class="img-responsive" src="http://via.placeholder.com/170x100"></a>
				<h4>GLOBAL COVERAGE</h4>
				<br>
				<p>sto sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
			</div>
			<div class="col-sm-3">
				<img class="img-responsive" src="http://via.placeholder.com/170x100"></a>
				<h4>RANGE OF AIRCRAFT</h4>
				<br>
				<p>sto sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
			</div>
			<div class="col-sm-3">
				<img class="img-responsive" src="http://via.placeholder.com/170x100"></a>
				<h4>PERSONAL SERVICE</h4>
				<br>
				<p>sto sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
			</div>
		</div>
	</div>

	<div class="container">
		<h1 align="center">OUR SERVICES</h1>        
	</div>
	<div class="container container_ourServices">
		<div class="row">
			<div class="col-sm-6">
				<div class="img-container">
					<div class="img-overlay">
						<img class="img-responsive" src="http://via.placeholder.com/150x150">
						<h3>AIR FREIGHT</h3>
					</div>
					<a href="#"><div class="arrowp img-hovering">
						<i class="fa fa-long-arrow-right arrowp"  aria-hidden="true"></i>
					</div></a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="img-container">
					<div class="img-overlay">
						<img class="img-responsive" src="http://via.placeholder.com/150x150">
						<h3>GSSA</h3>
					</div>
					<a href="#"><div class="arrowp img-hovering">
						<i class="fa fa-long-arrow-right arrowp"  aria-hidden="true"></i>
					</div></a>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-6">
				<div class="img-container">
					<div class="img-overlay">
						<img class="img-responsive" src="http://via.placeholder.com/150x150">
						<h3>AIR CARGO CHARTER</h3>
					</div>
					<a href="#"><div class="arrowp img-hovering">
						<i class="fa fa-long-arrow-right arrowp"  aria-hidden="true"></i>
					</div></a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="img-container">
					<div class="img-overlay">
						<img src="http://via.placeholder.com/150x150">
						<h3>COURIER</h3>
					</div>
					<a href="#"><div class="arrowp img-hovering">
						<i class="fa fa-long-arrow-right arrowp"  aria-hidden="true"></i>
					</div></a>
				</div>
			</div>
		</div>              
	</div>
	<!-- ******* Footer ******* -->
	<br>
	<div class="container footer_container">
		<div class="row">
			<div class="col-sm-4 bottomFooter">
				<div>
					<img class="img-responsive img-row" src="http://via.placeholder.com/300x50">
				</div>
			</div>
			<div class="col-sm-5 bottomFooter">
				<div>
					<a href="#">QUICK LINKS</a>
				</div>
			</div>
			<div class="col-sm-3 bottomFooter">
				<div class="textAlign-Center">
					<a href="#">SIGN UP FOR NEWSLETTER</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 bottomFooter">
				<div>
					<a href="#">info@airglow.com</a>
				</div>
			</div>
			<div class="col-sm-2 bottomFooter">
				<div>
					<a href="#">ABOUT AIRGLOW</a>
				</div>
			</div>
			<div class="col-sm-2 bottomFooter">
				<div>
					<a href="#">GET A QUOTE</a>
				</div>
			</div>
			<div class="col-sm-2 bottomFooter">
				<div>
					<a href="#">CONTACT US</a>
				</div>
			</div>
			<div class="col-sm-2 bottomFooter">
				<div class="textAlign-Center">
					<a href="#">Your Email Address</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 bottomFooter">
				<div>
					<a href="#">+91 999 032 6040</a>
				</div>
			</div>
			<div class="col-sm-2 bottomFooter">
				<div>
					<a href="#">OUR SERVICES</a>
				</div>
			</div>
			<div class="col-sm-2 bottomFooter">
				<div>
					<a href="#">MEDIA</a>
				</div>
			</div>
			<div class="col-sm-2 bottomFooter">
				<div>
					<a href="#">CAREERS</a>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="textAlign-Center">
					<h4>join us</h4>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 bottomFooter">
				<div>
				</div>
			</div>
			<div class="col-sm-2 bottomFooter">
				<div>
					<a href="#">AIRCRAFT GUIDE</a>
				</div>
			</div>
			<div class="col-sm-2 bottomFooter">
				<div>
					<a href="#">SHIPMENT TRACKING</a>
				</div>
			</div>
			<div class="col-sm-2 bottomFooter">
				<div>
					<a href="#">TERMS</a>
				</div>
			</div>
		</div>
	</div>
	<h5 class="toggleFooter">Copyright © 2017 All Rights Reserved. Airglow Aviation Services F2C</h5>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

	<script src="js/vendor/bootstrap.min.js"></script>

	<script src="js/main.js"></script>
</body>
</html>
