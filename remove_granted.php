<?php
$db=mysqli_connect("localhost","root","","eventdb");
include("session_vendor.php");
$userid=$_POST["userid"];
$vendorid=$_POST["vendorid"];
$servid=$_POST["servid"];
$id=$_POST["id"];

if($id==1)
{
	$q="select * from booking_granted where vendor_id='$vendorid' and service_id='$servid' and user_id='$userid'";
	$r=mysqli_query($db,$q);
	$book=mysqli_fetch_array($r);

	$q="insert into booking_request values('$book[0]','$book[1]','$book[2]','$book[3]',0)";
	$r=mysqli_query($db,$q);
}

$q="delete from booking_granted where vendor_id='$vendorid' and service_id='$servid' and user_id='$userid'";
$r=mysqli_query($db,$q);

header("location:vendor_dash.php");




?>

