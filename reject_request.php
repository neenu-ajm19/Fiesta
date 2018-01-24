<?php
$db=mysqli_connect("localhost","root","","eventdb");
include("session_vendor.php");
$userid=$_POST["userid"];
$vendorid=$_POST["vendorid"];
$servid=$_POST["servid"];

$q="update booking_request set status=0 where vendor_id='$vendorid' and service_id='$servid' and user_id='$userid'";
$r=mysqli_query($db,$q);

header("location:vendor_dash.php");

?>

