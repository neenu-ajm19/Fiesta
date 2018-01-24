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
<link href="css/pignose.calendar.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/moment.js"></script>
<script src="js/pignose.calendar.js"></script>
<link href="css/dash.style.css" type="text/css" rel="stylesheet">
</head>

<body>

<?php
$db=mysqli_connect("localhost","root","","eventdb");
session_start();
include("session_vendor.php");

$vendorid=$_SESSION["vendorid"];


$sql = "SELECT * FROM service_details WHERE vendor_id = '$vendorid'";
$r=mysqli_query($db,$sql);
$n=mysqli_num_rows($r);

if(isset($_GET["id"]))
   $_SESSION['servid']=$_GET["id"];
else
{
  if($n==0)
      $_SESSION['servid']=0;
    else
    {
      $row = mysqli_fetch_array($r);
      $_SESSION['servid']=$row[0];
    }       
    
}

$servid=$_SESSION['servid'];

$q="select * from service_details where vendor_id='$vendorid' and service_id='$servid'";
$r=mysqli_query($db,$q);
$info=mysqli_fetch_array($r);

switch($servid)
    {
        case 1:
            $sql="select * from venue where vendor_id='$vendorid'";
            break;
        case 2:
            $sql="select * from catering where vendor_id='$vendorid'";
            break;
        case 3:
            $sql="select * from media where vendor_id='$vendorid'";
            break;
        case 4:
            $sql="select * from travel where vendor_id='$vendorid'";
            break;
        case 5:
            $sql="select * from beauticians where vendor_id='$vendorid'";
            break;
        case 6:
            $sql="select * from entertainment where vendor_id='$vendorid'";
            break;
        case 7:
            $sql="select * from decoration where vendor_id='$vendorid'";
            break;
    }
$r=mysqli_query($db,$sql);
$row2=mysqli_fetch_array($r);

$q="select * from vendor_details where vendor_id='$vendorid'";
$r=mysqli_query($db,$q);
$v=mysqli_fetch_array($r);

$arr=explode(",",$info[6]);
$n=sizeof($arr);
$date="'";
for ($i=0;$i<$n-1;$i++) 
{ 
  $date=$date."$arr[$i]"."','";
}
$date=$date."'";
echo "<script>
 $(function() {
  $('a.calendar').pignoseCalendar({
    theme: 'dark',
   modal: true,
    disabledDates: [$date],
  });
})</script>";

echo "<script>
  $(function() {
    $('input.calendar1').pignoseCalendar({
      theme: 'blue',
      toggle: true,
      selectOver: true,
      multiple: true,
      buttons: true,
      disabledDates: [$date],
      scheduleOptions:{
        colors: {
          booked: '#2fabb7'
        } },
      schedules: [";
        for ($i=0;$i<$n-1;$i++) 
        { 
          echo "{name: 'booked',date: '$arr[$i]'},"; 
        }
        echo "],
    });
})</script>";

echo "<script>
  $(function() {
    $('input.calendar2').pignoseCalendar({
      theme: 'blue',
      toggle: true,
      reverse: true,
      selectOver: true,
      multiple: true,
      buttons: true,
      enabledDates: [$date],
      scheduleOptions:{
        colors: {
          booked: '#2fabb7'
        } },
      schedules: [";
        for ($i=0;$i<$n-1;$i++) 
        { 
          echo "{name: 'booked',date: '$arr[$i]'},"; 
        }
        echo "],
    });
})</script>";

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
        <?php if(isset($_SESSION['vendorid'])) {echo"<li><a href='vendor_dash.php'><div class='chip orange right'><img src='images/$v[0].jpg'>$v[1]</div></a></li>";} ?>
      </ul>
    </div>
  </div>
</div>


<div class="row">
	<div class="col s3 grey lighten-3">
    <div class="row" style="padding-top: 20px;">
      <div col="s12">
        <?php echo"<a class='right' href='logout.php'><i class='fa fa-power-off' aria-hidden='true'></i> LOGOUT</a>
        <a href='editprofile_vendor.php' class='left'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i>EDIT PROFILE</a><br>
        <img height='150' width='150' class='circle responsive-img' src='images/$v[0].jpg'>
        <h6>$v[1]</h6>";?>
        
      </div>
    </div>
    
    <div class="row well">
      <div class="col s12">
        <a href='service_reg.php' class="btn teal"><i class='fa fa-plus-circle' aria-hidden='true'></i> Register Service</a>
      </div>
    </div>

		<div class="tab col s12">
    	<button class="tablinks col s12 waves-effect waves-teal btn-large" onclick="openTab('info')">Profile</button>
      <button class="tablinks col s12 waves-effect waves-teal btn-large" onclick="openTab('packages')">Packages</button>
      <button class="tablinks col s12 waves-effect waves-teal btn-large" onclick="openTab('requested')">Requested</button>
   		<button class="tablinks col s12 waves-effect waves-teal btn-large" onclick="openTab('granted')">Granted</button>
    	<button class="tablinks col s12 waves-effect waves-teal btn-large" onclick="openTab('confirmed')">Confirmed</button>
  	</div>
	 </div>
	
  <div class="col s7">
    <div id="info" class="tabcontent col s12">
      <h3>PROFILE</h3>

      <?php
          echo "<a href='add_service_photo.php?id=$servid' class='btn left'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i> Add Service Photo</a>";
          switch($servid)
          {
            case 1:echo"<a href='venue.php' class='btn circle right'><h6>Edit Service <i class='fa fa-pencil fa-2x' aria-hidden='true'></i></h6></a>";break;
            case 2:echo"<a href='caters.php' class='btn circle right'><h6>Edit Service <i class='fa fa-pencil fa-2x' aria-hidden='true'></i></h6></a>";break;
            case 3:echo"<a href='media.php' class='btn circle right'><h6>Edit Service <i class='fa fa-pencil fa-2x' aria-hidden='true'></i></h6></a>";break;
            case 4:echo"<a href='travel.php' class='btn circle right'><h6>Edit Service <i class='fa fa-pencil fa-2x' aria-hidden='true'></i></h6></a>";break;
            case 5:echo"<a href='beauticians.php' class='btn circle right'><h6>Edit Service <i class='fa fa-pencil fa-2x' aria-hidden='true'></i></h6></a>";break;
            case 6:echo"<a href='entertainment.php' class='btn circle right'><h6>Edit Service <i class='fa fa-pencil fa-2x' aria-hidden='true'></i></h6></a>";break;
            case 7:echo"<a href='decoration.php' class='btn circle right'><h6>Edit Service <i class='fa fa-pencil fa-2x' aria-hidden='true'></i></h6></a>";break;
          }
        ?>
      <table>
        <?php
          if($servid==0)
            echo"<h4>No Service Registered</h4><br><a href='service_reg.php'><h6>Register Service</h6></a>";
          else
          echo"
          <tr><td>Name</td><td>$info[2]</td></tr>
          <tr><td>Location</td><td>$info[3]</td></tr>
          <tr><td>Contact</td><td>$info[4]</td></tr>";

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
      
    <div id="packages" class="tabcontent col s12">
      <h3>Packages</h3>
      <div class="row"><a href="add_vendor_package.html"><button class="teal btn-large right">Add Package</button></a></div>
        <?php
          $q="select * from packages where vendor_id='$vendorid' and service_id='$servid'";
          $r=mysqli_query($db,$q);
          while($pack=mysqli_fetch_array($r))
          {
            echo"
                <div class='col s3'>
                  <div class='card grey darken-1'>
                    <div class='card-content white-text'>
                      <span class='card-title'>$pack[3]</span>
                        <p>$pack[4]</p>
                        <table>
                          <tr><td>Rate:</td><td>$pack[5]</td>
                        </table>
                    </div>
                    <div class='card-action'>
                      <form action='edit_vendor_package.php' method='POST'>
                      <button type='submit' name='pid' value='$pack[0]' class='btn-flat blue lighten-2'>Edit</button>
                      </form>
                      <form action='change_vendor_package.php' method='POST'>
                      <input type='hidden' name='pack_name' value='0'>
                      <input type='hidden' name='pack_desc' value='0'>
                      <input type='hidden' name='pack_rate' value='0'>
                      <input type='hidden' name='pack_contents' value='0'>
                      <input type='hidden' name='id' value='-1'>
                      <button type='submit' name='pack_id' value='$pack[0]' class='btn-flat red darken-2 white-text'>Remove</button>
                      </form>
                    </div>
                  </div>
              </div>";
          }
        ?>
    </div>

    <div id="requested" class="tabcontent col s12">
      <h3>REQUESTED</h3>
      <div class="row">
        <?php
          $qb="select * from booking_request where vendor_id='$vendorid' and service_id='$servid' and status=1";
          $rb=mysqli_query($db,$qb);
          if(mysqli_num_rows($rb)==0)
            echo "<h5>No Bookings</h5>";
          while($book=mysqli_fetch_array($rb))
          {
            $qbd="select * from user_details where user_id='$book[0]'";
            $rbd=mysqli_query($db,$qbd);
            $bookd=mysqli_fetch_array($rbd);
            echo"
            <div class='col s12'>
              <div class='card grey darken-2'>
                <div class='card-content white-text'>
                  <span class='card-title'>$bookd[4]</span>
                    <table>
                      <tr><td>Host Name:</td><td>$bookd[1]</td>
                      <tr><td>Date:</td><td>$bookd[5]</td>
                      <tr><td>Location:</td><td>$bookd[3]</td>
                    </table>
                </div>
                <div class='card-action'>
                  <form action='move2granted.php' method='POST'>
                  <input type='hidden' name='userid' value='$book[0]'>
                  <input type='hidden' name='servid' value='$book[1]'>
                  <input type='hidden' name='vendorid' value='$book[2]'>
                  <button type='submit' name='id' value='$book[0]' class='btn-flat green'>Accept</button>
                  </form>
                  <form action='reject_request.php' method='POST'>
                  <input type='hidden' name='userid' value='$book[0]'>
                  <input type='hidden' name='servid' value='$book[1]'>
                  <input type='hidden' name='vendorid' value='$book[2]'>
                  <button type='submit' name='id' value='$book[0]' class='btn-flat teal accent-3'>Reject</button>
                  </form>
                </div>
              </div>
            </div>";
          }
        ?>
      </div>
    </div>

    <div id="granted" class="tabcontent col s12">
      <h3>GRANTED</h3>
      <div class="row">
        <?php
          $qb="select * from booking_granted where vendor_id='$vendorid' and service_id='$servid'";
          $rb=mysqli_query($db,$qb);
          if(mysqli_num_rows($rb)==0)
            echo "<h5>No Bookings</h5>";
          while($book=mysqli_fetch_array($rb))
          {
            $qbd="select * from user_events where user_id='$book[0]'";
            $rbd=mysqli_query($db,$qbd);
            $bookd=mysqli_fetch_array($rbd);
            echo"
            <div class='col s12'>
              <div class='card grey darken-2'>
                <div class='card-content white-text'>
                  <span class='card-title'>$bookd[2]</span>
                    <table>
                      <tr><td>Host Name:</td><td>$bookd[1]</td>
                      <tr><td>Date:</td><td>$bookd[4]</td>
                      <tr><td>Location:</td><td>$bookd[3]</td>
                    </table>
                </div>
                <div class='card-action'>";
                if($book[4]==0)
                {
                  echo"<h5>User has cancelled the booking</h5>
                  <form action='remove_granted.php' method='POST'>
                  <input type='hidden' name='userid' value='$book[0]'>
                  <input type='hidden' name='servid' value='$book[1]'>
                  <input type='hidden' name='vendorid' value='$book[2]'>
                  <input type='hidden' name='id' value='0'>
                  <button type='submit' class='btn-flat red'>Remove</button>
                  </form>";
                }
                else
                {
                  echo"<h5>User action Pending</h5>
                  <form action='remove_granted.php' method='POST'>
                  <input type='hidden' name='userid' value='$book[0]'>
                  <input type='hidden' name='servid' value='$book[1]'>
                  <input type='hidden' name='vendorid' value='$book[2]'>
                  <input type='hidden' name='id' value='1'>
                  <button type='submit' class='btn-flat teal accent-3'>Reject</button>
                  </form>";
                }
                echo"
                </div>
              </div>
            </div>";
          }
        ?>
      </div>
   </div>

    <div id="confirmed" class="tabcontent col s12">
      <h3>CONFIRMED</h3>
      <div class="row">
        <?php
          $qb="select * from booking_confirmed where vendor_id='$vendorid' and service_id='$servid' and vendor_status=1";
          $rb=mysqli_query($db,$qb);
          if(mysqli_num_rows($rb)==0)
            echo "<h5>No Bookings</h5>";
          while($book=mysqli_fetch_array($rb))
          {
            $qbd="select * from user_events where user_id='$book[0]'";
            $rbd=mysqli_query($db,$qbd);
            $bookd=mysqli_fetch_array($rbd);
            echo"
            <div class='col s12'>
              <div class='card grey darken-2'>
                <div class='card-content white-text'>
                  <span class='card-title'>$bookd[2]</span>
                    <table>
                      <tr><td>Host Name:</td><td>$bookd[1]</td>
                      <tr><td>Date:</td><td>$bookd[4]</td>
                      <tr><td>Location:</td><td>$bookd[3]</td>
                    </table>
                </div>
                <div class='card-action'>";
                if($book[5]==0)
                  echo"<h5>The booking has been cancelled</h5>";
                echo"
                  <form action='remove_vendor_confirm.php' method='POST'>
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
 
  <div class="col s2">
      <div class="row"
		
      </div>
      <div class="row">
      <div class="col s12" style="padding-top: 25px;">
        <?php
          $newq="select * from service_details where vendor_id='$vendorid'";
          $newr=mysqli_query($db,$newq);
          while($newrow=mysqli_fetch_array($newr))
          {
            if($servid==$newrow[0])
              echo"<div class='row'><a href='vendor_dash.php?id=$newrow[0]' class='btn green'><h6>$newrow[2]</h6></a></div>";
            else
              echo"<div class='row'><a href='vendor_dash.php?id=$newrow[0]' class='btn grey'><h6>$newrow[2]</h6></a></div>";
          }
        ?>
      </div>
      </div>
      <!--<div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Review Title</span>
              <p>Review description</p>
            </div>
          </div>
        </div>
      </div>-->
	  <div class="row well grey darken-2">
      <div class="row">
        <div class="col s12">
          <a href="#" class="calendar btn red lighten-2">Schedule</a>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <form action="input_dates.php" method="POST">
            <input type="text" style="color:white;" id="text-calendar" name="tdate" placeholder="   Add Busy Dates" class="calendar1" />
            <button class="submit btn teal lighten-2">ADD</button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <form action="remove_dates.php" method="POST">
            <input type="text" style="color:white;" id="text-calendar" name="tdate" placeholder="    Remove Busy Dates" class="calendar2" />
            <button class="submit btn teal lighten-2">REMOVE</button>
          </form>
        </div>
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
<script src="js/jquery.min.js"></script>
<script src="js/moment.js"></script>
<script src="js/pignose.calendar.js"></script>
<script src="js/dash.script.js"></script>
<script src="js/modal.script.js"></script>

</body>
</html>