<!doctype html>
<html>
<head>
<title>REGISTRATION</title>

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

<?php
session_start();
include("session_vendor.php");
if(isset($_POST['discr']))
{
$db = mysqli_connect('localhost','root','','eventdb');
$vendorid=$_SESSION['vendorid'];

if (ctype_digit($_POST['contact']) && strlen($_POST['contact']) == 10) 
{
    $q="insert into service_details values('$_POST[serviceid]','$vendorid','$_POST[discr]','$_POST[location]','$_POST[contact]','0',null,'0')";
    switch($_POST['serviceid'])
    {
        case 1:
            $sql="insert into venue (vendor_id) values('$_SESSION[vendorid]')";
			$r1 = mysqli_query($db,$q);
     	 	$r2 = mysqli_query($db,$sql);
			header("location:venue.php");
            break;
        case 2:
            $sql="insert into catering (vendor_id) values('$_SESSION[vendorid]')";
			$r1 = mysqli_query($db,$q);
     	 	$r2 = mysqli_query($db,$sql);
			header("location:caters.php");
            break;
        case 3:
            $sql="insert into media (vendor_id) values('$_SESSION[vendorid]')";
			$r1 = mysqli_query($db,$q);
     	 	$r2 = mysqli_query($db,$sql);
			header("location:media.php");
            break;
        case 4:
            $sql="insert into travel (vendor_id) values('$_SESSION[vendorid]')";
			$r1 = mysqli_query($db,$q);
     	 	$r2 = mysqli_query($db,$sql);
			header("location:travel.php");
            break;
        case 5:
            $sql="insert into beauticians (vendor_id) values('$_SESSION[vendorid]')";
			$r1 = mysqli_query($db,$q);
     	 	$r2 = mysqli_query($db,$sql);
			header("location:beauticians.php");
            break;
        case 6:
            $sql="insert into entertainment (vendor_id) values('$_SESSION[vendorid]')";
			$r1 = mysqli_query($db,$q);
     	 	$r2 = mysqli_query($db,$sql);
			header("location:entertainment.php");
            break;
        case 7:
            $sql="insert into decoration (vendor_id) values('$_SESSION[vendorid]')";
			$r1 = mysqli_query($db,$q);
     	 	$r2 = mysqli_query($db,$sql);
			header("location:decoration.php");
            break;
    }

    if($_POST['serviceid']==0)
        echo "<h5>Please choose a service</h5>";
    else
    {
      
      if($r1)
      {
       echo "<script>
        alert('Service has been registered, you will be redirected to the dashboard');
        window.location='vendor_dash.php';
        </script>";
      }
      else 
      {
         echo '<h5>Service is not registered you have already registered a service of this type</h5>';
      }
    }
}
else
{
        echo '<h5>Please enter a valid phone number</h5>';  
}
}

?>


<div class="container">
   <div class="row">
      <div class="col s12">
         <h2>Service Registration</h2>
      </div>
   </div>
   <div class="row">
      <div class="col s2">
      </div>
      <div class="col s8">
         <div class="card">
            <div class="card-content">
               <span class="card-title grey-text text-darken-4">Enter details:</span>
               <form action = "service_reg.php" method = "post">
                  <div class="input-field">
                    <select name ="serviceid" class = "box" id="username" required/>
                        <option value=0>Select Service</option>
                        <option value=1>Venue</option>
                        <option value=2>Caterers</option>
                        <option value=3>Media</option>
                        <option value=4>Travel</option>
                        <option value=5>Beautician</option>
                        <option value=6>Entertainment</option>
                        <option value=7>Decorators</option>
                    </select>
                  </div>
                  <div class="input-field">
                     <label >Name</label>
                     <input type ='text' name = "discr" id="discr" class = "validate" required />
                  </div>
                  <div class="input-field">
                      <label>Location</label>
                      <input type ='text' name = "location" id="location" class = "validate" required />
                  </div>
                  <div class="input-field">
                     <label>Contact</label>
                      <input type ='text' name = "contact" id="contacts" class = "validate" required />
                  </div>
                  
                  <div class="input-field">
                     <button type="submit" class="btn-large teal">Register</button>
                                       </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col s2">
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