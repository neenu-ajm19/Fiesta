<?php
session_start();
include("session_user.php");
$db=@mysqli_connect("localhost","root","","eventdb");
$userid=$_SESSION["userid"];
$vendorid=$_POST["vendorid"];
$servid=$_POST["servid"];

$date=date("Y-m-d");
$q="insert into booking_request values('$userid','$servid','$vendorid','$date',1)";
$r=mysqli_query($db,$q);

if($r)
{
	$q="select * from service_details where service_id='$servid' AND vendor_id='$vendorid'";
	$r=mysqli_query($db,$q);
	$row=mysqli_fetch_array($r);

	$budget=$_SESSION["budget"];
	$_SESSION["budget"]=$budget-$row[5];
	$budget=$_SESSION["budget"];

	$q="update user_details set budget='$budget' where user_id='$userid'";
	$r=mysqli_query($db,$q);
	
	echo "<script>
		alert('Booked');
		</script>";
}

header("location:view_user_packages.php");

?>




