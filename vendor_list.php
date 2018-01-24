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

<div class="container" style=" padding-top: 20px;">
	<div class="row">
		<form action='' method='GET'>
		<div class="col s5">
			<div class='card'>
				<label class="grey lighten-4" style="width: 100%;"><h5>Location</h5></label>
				<select name='location'>
					<option value='%'>None</option>
					<option value='Kottayam'>Kottayam</option>	
					<option value='Changanashery'>Changanashery</option>
					<option value='Pala'>Pala</option>
				</select>			
			</div>
		</div>
		<div class="col s5">
			<div class='card'>
				<label class="grey lighten-4" style="width: 100%;"><h5>Rate</h5></label>
				<select name='rate'>
					<option value='100000'>None</option>
					<option value='2500'><2500</option>
					<option value='5000'><5000</option>
					<option value='10000'><10000</option>
					<option value='20000'><20000</option>
				</select>			
			</div>
		</div>
		<div class="col s2" style= " padding-top: 25px;">
			<div class='card'>
				<?php
					echo "<input type='hidden' name='value' value=$_GET[value]>";
				?>
				<button type='submit'class="grey lighten-4" style="width: 100%;"><h5>Go</h5></button>			
			</div>
		</div>
		</form>
	</div>
	<div class="row">
		<div class="col s12">
			<table class="striped">
			
				<?php
					$db=@mysqli_connect("localhost","root","","eventdb");
				     				
					$servid=$_GET["value"];
					if(isset($_GET["location"]))
					{
  				      		$location=$_GET["location"];
  				      		$rate=$_GET['rate'];
    						$q="select * from service_details where service_id=$servid AND location LIKE '$location' AND rate<'$rate'";
					}
					else
						$q="select * from service_details where service_id=$servid";
    
					$r=mysqli_query($db,$q);
					$num=mysqli_num_rows($r);
					if($num>0)
					{
						echo "<tr><th>Available Vendors are:</th></tr>";
						while($row=mysqli_fetch_array($r))
						{
                            echo "<form action='service_details.php' method='post'>";
                            echo "<tr><td><input type='hidden' name='servid' value=$servid> </td></tr>";
                            echo "<tr><td><button type='submit' class='btn-flat teal' name='clientid' value='$row[1]'>$row[2]</button></td></tr>";
							echo"</form>";
						}
					}
					else
					{
						echo "<tr><th>No Vendors Available!</th></tr>";
					}
				?>
			
			</table>
		</div>		
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
<script src="js/script.js"></script>

</body>
</html>