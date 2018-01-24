<?php
session_start();
include("session_user.php");
$db=mysqli_connect("localhost","root","","eventdb");
$userid=$_POST["userid"];
$vendorid=$_POST["vendorid"];
$servid=$_POST["servid"];

$q="select * from booking_granted where vendor_id='$vendorid' and service_id='$servid' and user_id='$userid'";
$r=mysqli_query($db,$q);
$book=mysqli_fetch_array($r);

$q="insert into booking_confirmed values('$book[0]','$book[1]','$book[2]','$book[3]',1,1)";
$r=mysqli_query($db,$q);

$q="delete from booking_granted where vendor_id='$vendorid' and service_id='$servid' and user_id='$userid'";
$r=mysqli_query($db,$q);

header("location:user_dash.php");

?>

