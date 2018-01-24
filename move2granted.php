<?php
$db=mysqli_connect("localhost","root","","eventdb");
include("session_vendor.php");
$userid=$_POST["userid"];
$vendorid=$_POST["vendorid"];
$servid=$_POST["servid"];

$q="select * from booking_request where vendor_id='$vendorid' and service_id='$servid' and user_id='$userid'";
$r=mysqli_query($db,$q);
$book=mysqli_fetch_array($r);

$q="insert into booking_granted values('$book[0]','$book[1]','$book[2]','$book[3]',1)";
$r=mysqli_query($db,$q);

$q="delete from booking_request where vendor_id='$book[2]' and service_id='$book[1]' and user_id='$book[0]'";
$r=mysqli_query($db,$q);

header("location:vendor_dash.php");

?>

