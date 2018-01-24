<!doctype html>
<html>
<head>
<title>VENDORS</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/nivo-lightbox.css">
<link rel="stylesheet" href="css/nivo_themes/default/default.css">
<link rel="stylesheet" href="css/templatemo-style.css">
<link href="css/materialize.css" type="text/css" rel="stylesheet">
<link href="css/style.css" type="text/css" rel="stylesheet">

</head>

<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container ">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> </button>
      <a href="index.php" class="navbar-brand">Fiesta</a></div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php" class="smoothScroll">HOME</a></li>
        <li><a href="index.php" class="smoothScroll">ABOUT</a></li>
        <li><a href="service_list.html" class="smoothScroll">SERVICES</a></li>
        <li><a href="index.php" class="smoothScroll">REGISTER</a></li>
        <li><a href="index.php" class="smoothScroll">CONTACT</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="container">
	
	<div class="row">
		<div class="col s12">
			<table class="striped">
			
				<?php
					session_start();
					include("session_user.php");
					$db=@mysqli_connect("localhost","root","","eventdb");
					$userid=$_SESSION["userid"];
					$servid=$_COOKIE['tour'];
					$r=mysqli_query($db,"select * from user_details where user_id='$userid'");
					$row=mysqli_fetch_array($r);
					$location=$row[5];
					$_SESSION['budget']=$row[7];
					$budget=$_SESSION['budget'];
					$edate=$row[6];
					
    				$q="select * from service_details where service_id='$servid' AND location LIKE '$location' AND rate<='$budget'";
					$r=mysqli_query($db,$q);
					$num=mysqli_num_rows($r);
					if($num>0)
					{
						echo "<tr><th>Choose a Vendors:</th></tr>";
						echo"<h6>Amount remaining:$budget</h6>";
						while($row=mysqli_fetch_array($r))
						{
							$date=explode(",",$row[6]);
							$n=sizeof($date);
							$fl=0;
							for ($i=0;$i<$n;$i++) 
							{ 
								if($date[$i]==$edate)
									$fl=1;
							}
							if($fl==1)
								continue;
							
							echo"
							<tr><td><form action='tour_service_details.php' method='POST'>
								<input type='hidden' name='servid' value='$servid'>
								<input type='hidden' name='vendorid' value='$row[1]'>
								<button class='btn-flat teal' type='submit'>$row[2]</button>
							</form></td></tr>";
						}
					}
					else
					{
						echo "<tr><th>No Vendors Available!</th></tr>";
					}
				?>
			
			</table>
		</div>		
		<?php echo "<button class='btn-large green right' onclick='tour($servid)'>Continue Tour</button>"; 
			  
		?>
	</div>
</div>


<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/nivo-lightbox.min.js"></script> 
<script src="js/smoothscroll.js"></script> 
<script src="js/jquery.sticky.js"></script> 
<script src="js/jquery.parallax.js"></script> 
<script src="js/wow.min.js"></script> 
<script src="js/custom.js"></script>
<script src="js/materialize.js"></script>
<script src="js/tour.script.js"></script>

</body>
</html>