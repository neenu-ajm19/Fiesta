
<!doctype html>
<html>
<head>
<title>DETAILS</title>

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
        <li><a href="index.php" class="smoothScroll">SERVICES</a></li>
        <li><a href="index.php" class="smoothScroll">REGISTER</a></li>
        <li><a href="index.php" class="smoothScroll">CONTACT</a></li>
      </ul>
    </div>
  </div>
</div>

<?php
session_start();
if(!isset($_SESSION['userid']))
{	
	echo "<script>
      alert('Please register to continue');
      window.location='user_signup.php';
      </script>";
}
$db=mysqli_connect("localhost","root","","eventdb");
$clientid=$_POST["clientid"];
$servid=$_POST["servid"];
$userid=$_SESSION['userid'];
$q="select * from booking_request where(user_id='$userid' AND service_id=$servid AND vendor_id='$clientid')";
$r=mysqli_query($db,$q);
    
$n=mysqli_num_rows($r);
if(!isset($_POST["bvalue"]))
{
	if($n==0)
		$bvalue=2;
	else
		$bvalue=1;
}
else
{
	$bvalue=$_POST["bvalue"];
	if($bvalue==1)
	{
        $tem=date("Y/m/d");
		$q="insert into booking_request values('$userid','$servid','$clientid','$tem',1)";
		$bvalue=1;
	}
	else
	{	
		$q="delete from booking_request where(user_id='$userid' AND service_id=$servid AND vendor_id='$clientid')";
		$bvalue=2;
	}
	$r=mysqli_query($db,$q);
	header("location:user_dash.php");
}

$q="select * from service_details where service_id='$servid' and vendor_id='$clientid'";
$r=mysqli_query($db,$q);

$row1=mysqli_fetch_array($r);
switch($servid)
    {
        case 1:
            $sql="select * from venue where vendor_id='$clientid'";
            break;
        case 2:
            $sql="select * from catering where vendor_id='$clientid'";
            break;
        case 3:
            $sql="select * from media where vendor_id='$clientid'";
            break;
        case 4:
            $sql="select * from travel where vendor_id='$clientid'";
            break;
        case 5:
            $sql="select * from beauticians where vendor_id='$clientid'";
            break;
        case 6:
            $sql="select * from entertainment where vendor_id='$clientid'";
            break;
        case 7:
            $sql="select * from decoration where vendor_id='$clientid'";
            break;
    }
$r=mysqli_query($db,$sql);
$row2=mysqli_fetch_array($r);
    
?>

<div class="container">
	<div class="row">
		<div class="col s1"></div>
		<div class="col s11">
			<div class="card">
				<h3>
					<?php 
						echo"$row1[2]";
					?>		
				</h3>
			</div>
		</div>	
	</div>
	<div class="row">
		<div class="col s1"></div>
		<div class="col s11">
			<table class="striped">
				<?php
                
					echo"
					<tr><td>Location</td><td>$row1[3]</td></tr>
					<tr><td>Contact</td><td>$row1[4]</td></tr>
					<tr><td>Rate</td><td>$row1[5]</td></tr>";
                    
                    if($servid==1){
                    if(($row2[1]!=null)){echo "<tr><td>Address</td><td>$row2[1]</td></tr>";}
                    if(($row2[2]!=null)){ echo "<tr><td>Type</td><td>$row2[2]</td></tr>";}
                    if(($row2[3]!=null)){ echo "<tr><td>Capacity</td><td>$row2[3]</td></tr>";}
                    if(($row2[4]!=null)){ echo "<tr><td>Kicthen</td><td>$row2[4]</td></tr>";}
                    if(($row2[5]!=null)){ echo "<tr><td>Parking</td><td>$row2[5]</td></tr>";}
                    }
                    else if($servid==2){
                    if(($row2[1]!=null)){ echo "<tr><td>Ctype</td><td>$row2[1]</td></tr>";}
                    if(($row2[2]!=null)){ echo "<tr><td>Kitchen</td><td>$row2[2]</td></tr>";}
                    if(($row2[3]!=null)){ echo "<tr><td>Service</td><td>$row2[3]</td></tr>";}
                    
                   
                    }
                    else if($servid==3){
                    if(($row2[1]!=null)){ echo "<tr><td>Type</td><td>$row2[1]</td></tr>";}
                    if(($row2[2]!=null)){ echo "<tr><td>Equipment</td><td>$row2[2]</td></tr>";}
                    if(($row2[3]!=null)){ echo "<tr><td>Album</td><td>$row2[3]</td></tr>";}
                    
                    }
                    else if($servid==4){
                    if(($row2[1]!=null)){ echo "<tr><td>Vehicles</td><td>$row2[1]</td></tr>";}
                    if(($row2[2]!=null)){ echo "<tr><td>Guest Management</td><td>$row2[2]</td></tr>";}
                    if(($row2[3]!=null)){ echo "<tr><td>Bridal Vehicle</td><td>$row2[3]</td></tr>";}
                    
                    }
                    else if($servid==5){
                    if(($row2[1]!=null)){ echo "<tr><td>Bridal Packages</td><td>$row2[1]</td></tr>";}
                    if(($row2[2]!=null)){ echo "<tr><td>Pre Bridal Packages</td><td>$row2[2]</td></tr>";}
                    
                    }
                    else if($servid==6){
                    if(($row2[1]!=null)){ echo "<tr><td>Requirements</td><td>$row2[1]</td></tr>";}
                    if(($row2[2]!=null)){ echo "<tr><td>Programs</td><td>$row2[2]</td></tr>";}
                    
                    
                    }
                    else if($servid==7){
                    if(($row2[1]!=null)){ echo "<tr><td>Patterns</td><td>$row2[1]</td></tr>";}
                    if(($row2[2]!=null)){ echo "<tr><td>Flowers</td><td>$row2[2]</td></tr>";}
                    if(($row2[3]!=null)){ echo "<tr><td>Light & Sound</td><td>$row2[3]</td></tr>";}
                                      
                    }
				?>  
                
			</table>
            
		</div>	
        <div class="row">
            <div class="row">
                <br><br><h4>Packages</h4><br>
            </div>
            <div class="col s12">
                <?php
          $q="select * from packages where vendor_id='$clientid' and service_id='$servid'";
          $r=mysqli_query($db,$q);
          while($pack=mysqli_fetch_array($r))
          {
            echo"
                <div class='col s3'>
                  <div class='card blue-grey darken-1'>
                    <div class='card-content white-text'>
                      <span class='card-title'>$pack[3]</span>
                        <p>$pack[4]</p>
                        <table>
                          <tr><td>Rate:</td><td>$pack[5]</td>
                        </table>
                    </div>
                    <div class='card-action'>
                      <form action='edit_vendor_package.php' method='POST'>
                      <button type='submit' name='pid' value='$pack[0]' class='btn-flat green'>Edit</button>
                      </form>
                      <form action='change_vendor_package.php' method='POST'>
                      <input type='hidden' name='pack_name' value='0'>
                      <input type='hidden' name='pack_desc' value='0'>
                      <input type='hidden' name='pack_rate' value='0'>
                      <input type='hidden' name='pack_contents' value='0'>
                      <input type='hidden' name='id' value='-1'>
                      <button type='submit' name='pack_id' value='$pack[0]' class='btn-flat red'>Remove</button>
                      </form>
                    </div>
                  </div>
              </div>";
          }
        ?>

            </div>
        </div>	
	</div>
	<div class="row">
		<div class="col s1"></div>
		<div class="col s11">
			<div class="card s3 right">
				<?php
					if($bvalue==2)
                    {
                        echo "<form action='' method='post'>
                        <tr><td><input type='hidden' name='bvalue' value='1'> </td></tr>
                        <tr><td><input type='hidden' name='servid' value=$servid> </td></tr>
                        <tr><td><input type='hidden' name='clientid' value=$clientid> </td></tr>
                        <tr><td><button type='submit' class='btn-flat green'>BOOK</button></td></tr>";
                    }
                    if($bvalue==1)
                    {
				        echo "<form action='' method='post'>
                        <tr><td><input type='hidden' name='bvalue' value='2'> </td></tr>
                        <tr><td><input type='hidden' name='servid' value=$servid> </td></tr>
                        <tr><td><input type='hidden' name='clientid' value=$clientid> </td></tr>
                        <tr><td><button type='cancel' class='btn-flat red'>CANCEL</button></td></tr>";;
                    }
                ?>	
			</div>
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