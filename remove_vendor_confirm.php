<?php
$db=mysqli_connect("localhost","root","","eventdb");
include("session_vendor.php");
$userid=$_POST["userid"];
$vendorid=$_POST["vendorid"];
$servid=$_POST["servid"];

$q="select * from booking_confirmed where vendor_id='$vendorid' and service_id='$servid' and user_id='$userid'";
$r=mysqli_query($db,$q);
$book=mysqli_fetch_array($r);



if($book[5]==0)
	$q="delete from booking_confirmed where vendor_id='$vendorid' and service_id='$servid' and user_id='$userid'";
else
	$q="update booking_confirmed set vendor_status=0 where vendor_id='$vendorid' and service_id='$servid' and user_id='$userid'";

$r=mysqli_query($db,$q);

header("location:vendor_dash.php");

?>

