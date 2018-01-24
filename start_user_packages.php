<!DOCTYPE html>
<html lang="en">
<head>
<title>Packages</title>


<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/nivo-lightbox.css">
<link rel="stylesheet" href="css/nivo_themes/default/default.css">
<link rel="stylesheet" href="css/templatemo-style.css">
<link rel="stylesheet" href="css/materialize.css">


</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">



<!-- navigation section -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container ">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> </button>
      <a href="#" class="navbar-brand">Fiesta</a></div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#home" class="smoothScroll">HOME</a></li>
        <li><a href="#intro" class="smoothScroll">ABOUT</a></li>
        <li><a href="#work" class="smoothScroll">SERVICES</a></li>
        <li><a href="#price" class="smoothScroll">REGISTER</a></li>
        <li><a href="#contact" class="smoothScroll">CONTACT</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="container">
	<div class="row">
		<div class="col s12">
			<h5>Enter Event Details</h5>
<?php
session_start();
include("session_user.php");
$db=@mysqli_connect("localhost","root","","eventdb");
$userid=$_SESSION["userid"];

$r=mysqli_query($db,"select * from user_details where user_id='$userid'");
$row=mysqli_fetch_array($r);

echo"
<form action='edit_user_details.php' method='POST'>
<label>Event Name</label><input type='text' name='ename' value='$row[4]'>
<label>Location</label><input type='text' name='location' value='$row[5]' required>
<label>Date</label><input type='date' name='date' value='$row[6]' required>
<label>Budget</label><input type='text' name='budlower' value='$row[7]'>
<button class='btn-large teal' type='submit'>Save</button>
</form>";
?>

		</div>
	</div>
</div>

<!-- JAVASCRIPT JS FILES --> 
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/nivo-lightbox.min.js"></script> 
<script src="js/smoothscroll.js"></script> 
<script src="js/jquery.sticky.js"></script> 
<script src="js/jquery.parallax.js"></script> 
<script src="js/wow.min.js"></script> 
<script src="js/custom.js"></script>
<script src="js/materialize.js"></script>
<script src="js/carousel.script.js"></script>
</body>
</html>