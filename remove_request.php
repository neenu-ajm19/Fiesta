<?php
session_start();
include("session_user.php");
$db=mysqli_connect("localhost","root","","eventdb");

$userid=$_POST["userid"];
$vendorid=$_POST["vendorid"];
$servid=$_POST["servid"];

$q="delete from booking_request where vendor_id='$vendorid' and service_id='$servid' and user_id='$userid'";
$r=mysqli_query($db,$q);
header("location:user_dash.php");


?>

