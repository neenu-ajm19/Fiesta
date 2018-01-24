<?php
session_start();
include("session_user.php");
$db=mysqli_connect("localhost","root","","eventdb");

$userid=$_POST["userid"];
$vendorid=$_POST["vendorid"];
$servid=$_POST["servid"];

$q="select * from booking_confirmed where vendor_id='$vendorid' and service_id='$servid' and user_id='$userid'";
$r=mysqli_query($db,$q);
$book=mysqli_fetch_array($r);

if($book[4]==0)
	$q="delete from booking_confirmed where vendor_id='$vendorid' and service_id='$servid' and user_id='$userid'";
else
	$q="update booking_confirmed set user_status=0 where vendor_id='$vendorid' and service_id='$servid' and user_id='$userid'";

$r=mysqli_query($db,$q);

header("location:user_dash.php");

?>

