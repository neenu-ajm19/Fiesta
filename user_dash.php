<!doctype html>
<html>
<head>
<title>DASH</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/nivo-lightbox.css">
<link rel="stylesheet" href="css/nivo_themes/default/default.css">
<link rel="stylesheet" href="css/templatemo-style.css">
<link href="css/materialize.css" type="text/css" rel="stylesheet">
<link href="css/dash.style.css" type="text/css" rel="stylesheet">
</head>

<body >

<?php
$db=mysqli_connect("localhost","root","","eventdb");
session_start();
include("session_user.php");
$userid=$_SESSION["userid"];

$q="select * from user_details where user_id='$userid'";
$r=mysqli_query($db,$q);
$info=mysqli_fetch_array($r);
?>

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
        <?php if(isset($_SESSION['userid'])) {echo"<li><a href='user_dash.php'><div class='chip red lighten-3 right'><img src='images/$info[0].jpg'>$info[1]</div></a></li>";} ?>
      </ul>
    </div>
  </div>
</div>



<div class="row">
	<div class="col s3 grey lighten-3" style="height: 100%;padding-top: 12px;">
    <div class="row">
      <div col="s12">
        <?php echo"<a class='right' href='logout.php'><i class='fa fa-power-off' aria-hidden='true'></i> LOGOUT</a>
        <a href='editprofile_user.php' class='left'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i></a><br>
        <img height='150' width='150' class='circle responsive-img'src='images/".$info[0].".jpg'>
        <h6>$info[1]</h6>";?>
      </div>
    </div>
		<div class="tab col s12">
    	<button class="tablinks col s12 waves-effect waves-teal btn-large" onclick="openTab('info')">Profile</button>
      <button class="tablinks col s12 waves-effect waves-teal btn-large" onclick="openTab('planevent')">Plan Event</button>
      <button class="tablinks col s12 waves-effect waves-teal btn-large" onclick="openTab('requested')">Requested</button>
   		<button class="tablinks col s12 waves-effect waves-teal btn-large" onclick="openTab('granted')">Granted</button>
    	<button class="tablinks col s12 waves-effect waves-teal btn-large" onclick="openTab('confirmed')">Confirmed</button>
  	</div>
	 </div>
	
  <div class="col s7 well" style="padding-left: 60px;margin-left: 20px;margin-bottom: 0px;margin-right: 0px;height: 36em;width: 61em;">
    <div id="info" class="tabcontent col s12" style="margin-top: 20px;">
      <h3>PROFILE</h3>
      <table>
        <?php
          echo"
          <tr><td>Name</td><td>$info[1]</td></tr>
          <tr><td>Contact</td><td>$info[3]</td></tr>";
        ?>
      </table>
    </div>
      
    <div id="planevent" class="tabcontent col s12" style="margin-top: 20px;">
      <h3>PLAN EVENT</h3>
      <div class="row">
        <div class="col s5">
          <div class="card medium">
            <div class="card-image">
              <img src="images/tourimage.jpg">
            </div>
            <span class="card-title teal-text"><h5>TOUR</h5></span>
            <div class="card-content" style="padding: 4px;">
              <p>The tour will guide you through simple steps in order to plan your event easily.</p>
            </div>
            <div class="card-action">
              <button class="teal btn-flat" onclick="starttour()">Take Tour</button>
            </div>
          </div>
        </div>
        <div class="col s2"></div>
        <div class="col s5">
          <div class="card medium">
            <div class="card-image">
              <img src="images/packageimage.jpg">
            </div>
            <span class="card-title teal-text"><h5>SEE PACKAGES</h5></span>
            <div class="card-content" style="padding: 4px;">
              <p>Choose from our interactive package selection, the right package for your needs.</p>
            </div>
            <div class="card-action">
              <a href="start_user_packages.php"><button class="teal btn-flat">See Packages</button></a>
            </div>
          </div>
        </div>
      </div>    
    </div>

    <div id="requested" class="tabcontent col s12" style="margin-top: 20px;">
      <h3>REQUESTED</h3>
      <div class="row">
        <?php
          $qb="select * from booking_request where user_id='$userid'";
          $rb=mysqli_query($db,$qb);
          if(mysqli_num_rows($rb)==0)
            echo "<h5>No Bookings</h5>";
          while($book=mysqli_fetch_array($rb))
          {
            $qbd="select * from service_details where vendor_id='$book[2]' and service_id='$book[1]'";
            $rbd=mysqli_query($db,$qbd);
            $bookd=mysqli_fetch_array($rbd);
            echo"
            <div class='col s12'>
              <div class='card grey darken-2'>
                <div class='card-content white-text'>
                  <span class='card-title'>$bookd[2]</span>
                    <table>
                      <tr><td>Location:</td><td>$bookd[3]</td>
                      <tr><td>Contact:</td><td>$bookd[4]</td>
                      <tr><td>Rating:</td><td>$bookd[7]</td>
                      
                    </table>
                </div>
                <div class='card-action white-text'>";
                if($book[4]==0)
                {
                  echo"
                  <h5>Vendor has Rejected the Booking</h5>
                  <form action='re_request.php' method='POST'>
                  <input type='hidden' name='userid' value='$book[0]'>
                  <input type='hidden' name='servid' value='$book[1]'>
                  <input type='hidden' name='vendorid' value='$book[2]'>
                  <button type='submit' name='id' value='$book[1].$book[2]' class='btn-flat green'>Re-Request</button>
                  </form>";
                }
                else
                {
                  echo"<h5>Vendor action Pending</h5>";
                }
                  echo"<form action='remove_request.php' method='POST'>
                  <input type='hidden' name='userid' value='$book[0]'>
                  <input type='hidden' name='servid' value='$book[1]'>
                  <input type='hidden' name='vendorid' value='$book[2]'>
                  <button type='submit' name='id' value='$book[1].$book[2]' class='btn-flat  teal accent-3'>Remove</button>
                  </form>";
                
                echo"
                </div>
              </div>
            </div>";
          }
        ?>
      </div>
    </div>

    <div id="granted" class="tabcontent col s12" style="margin-top: 20px;">
      <h3>GRANTED</h3>
      <div class="row">
        <?php
          $qb="select * from booking_granted where user_id='$userid' and status=1";
          $rb=mysqli_query($db,$qb);
          if(mysqli_num_rows($rb)==0)
            echo "<h5>No Bookings</h5>";
          while($book=mysqli_fetch_array($rb))
          {
            $qbd="select * from service_details where vendor_id='$book[2]' and service_id='$book[1]'";
            $rbd=mysqli_query($db,$qbd);
            $bookd=mysqli_fetch_array($rbd);
            echo"
            <div class='col s12'>
              <div class='card grey darken-2'>
                <div class='card-content white-text'>
                  <span class='card-title'>$bookd[2]</span>
                    <table>
                      <tr><td>Location:</td><td>$bookd[3]</td>
                      <tr><td>Contact:</td><td>$bookd[4]</td>
                      <tr><td>Rating:</td><td>$bookd[7]</td>
                      
                    </table>
                </div>
                <div class='card-action white-text'>
                  <form action='move2confirmed.php' method='POST'>
                  <input type='hidden' name='userid' value='$book[0]'>
                  <input type='hidden' name='servid' value='$book[1]'>
                  <input type='hidden' name='vendorid' value='$book[2]'>
                  <button type='submit' class='btn-flat green'>Confirm</button>
                  </form>
                  <form action='reject_granted.php' method='POST'>
                  <input type='hidden' name='userid' value='$book[0]'>
                  <input type='hidden' name='servid' value='$book[1]'>
                  <input type='hidden' name='vendorid' value='$book[2]'>
                  <button type='submit' name='id' value='$book[0]' class='btn-flat teal accent-3'>Remove</button>
                  </form>
                </div>
              </div>
            </div>";
          }
        ?>
      </div>
   </div>

    <div id="confirmed" class="tabcontent col s12" style="margin-top: 20px;">
      <h3>CONFIRMED</h3>
      <div class="row">
        <?php
          $qb="select * from booking_confirmed where user_id='$userid' and user_status=1";
          $rb=mysqli_query($db,$qb);
          if(mysqli_num_rows($rb)==0)
            echo "<h5>No Bookings</h5>";
          while($book=mysqli_fetch_array($rb))
          {
            $qbd="select * from service_details where vendor_id='$book[2]' and service_id='$book[1]'";
            $rbd=mysqli_query($db,$qbd);
            $bookd=mysqli_fetch_array($rbd);
            echo"
            <div class='col s12'>
              <div class='card grey darken-2'>
                <div class='card-content white-text'>
                  <span class='card-title'>$bookd[2]</span>
                    <table>
                      <tr><td>Location:</td><td>$bookd[3]</td>
                      <tr><td>Contact:</td><td>$bookd[4]</td>
                      <tr><td>Rating:</td><td>$bookd[7]</td>
                      
                    </table>
                </div>
                <div class='card-action white-text'>";
                if($book[4]==0)
                  echo"<h5>The booking has been cancelled</h5>";
                echo"
                  <form action='remove_user_confirm.php' method='POST'>
                  <input type='hidden' name='userid' value='$book[0]'>
                  <input type='hidden' name='servid' value='$book[1]'>
                  <input type='hidden' name='vendorid' value='$book[2]'>
                  <button type='submit' class='btn-flat teal accent-3'>Remove</button>
                  </form>";     
                echo"
                </div>
              </div>
            </div>";
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
<script src="jquery/materialize.js"></script>
<script src="js/dash.script.js"></script>
<script src="js/modal.script.js"></script>
<script src="js/tour.script.js"></script>

</body>
</html>