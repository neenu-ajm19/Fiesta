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

<script>
function booked()
{
	alert('Booking Successful! Please wait for the Confirmation Request from Service Provider.');
}
</script>
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



<?php
session_start();
include("session_user.php");
$db=@mysqli_connect("localhost","root","","eventdb");
$userid=$_SESSION["userid"];

$r=mysqli_query($db,"select * from user_details where user_id='$userid'");
$row=mysqli_fetch_array($r);
$location=$row[5];
$edate=$row[6];
$_SESSION['budget']=$row[7];
$budget=$_SESSION['budget'];

echo"<header>
		<div class='container'>
			<a href='user_dash.php'><button class='btn-flat teal left'>Back to Dashboard</button></a>
			<a href='start_user_packages.php'><button class='btn-flat teal right'>Change Event Details</button></a>

			<h5>Amount Remaining:$budget</h5>
		</div>
	</header>";

for ($i=1;$i<8;$i++) 
{ 
	$servid=$i;
	$q="select * from service_details where service_id='$servid' AND location LIKE '$location' AND rate<='$budget'";
	$r=mysqli_query($db,$q);
	$num=mysqli_num_rows($r);
	$q="select * from available_services where service_id='$servid'";
	$rs=mysqli_query($db,$q);

	if($num!=0)
	{
		$rows=mysqli_fetch_array($rs);
		echo"<br><h4>$rows[1]</h4>";
		echo"<div class='row'><div class='carousel'>";
		while($row=mysqli_fetch_array($r))
		{
			$date=explode(",",$row[6]);
			$n=sizeof($date);
			$fl=0;
			for ($j=0;$j<$n;$j++) 
			{ 
				if($date[$j]==$edate)
					$fl=1;
			}
			if($fl==1)
				continue;

			echo"<div class='carousel-item'>
				<div class='card small'>
					<div class='card-image'>
						<img src='images/$row[1]_$row[0].jpg'>
					</div>
					<span class='card-title'>$row[2]</span>
					<div class='card-content'>
						Location:$row[3]<br>
						Rates starting from $row[5]
					</div>
					<div class='card-action'>
						<form action='details_user_packages.php' method='POST'>
							<input type='hidden' name='vendorid' value='$row[1]'>
							<input type='hidden' name='servid' value='$row[0]'>
							<button class='btn-small blue submit'>View</button>
						</form>
						<form action='book_user_package.php' method='POST'>
								<input type='hidden' name='servid' value='$servid'>
								<input type='hidden' name='vendorid' value='$row[1]'>
								<button class='btn-small green' type='submit' onclick='booked()'>BOOK</button>
						</form>
					</div>
				</div>
			</div>";
		}
		echo"</div></div>";
	}
	
		
	
}	

?>

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