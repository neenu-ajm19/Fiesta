<?php
session_start();
include("session_vendor.php");
$db=mysqli_connect("localhost","root","","eventdb");
$vendorid=$_SESSION["vendorid"];
$servid=$_SESSION["servid"];
$tdate=$_POST["tdate"];

$arr=explode(", ",$tdate);
$n=sizeof($arr);

$q="select * from service_details where vendor_id='$vendorid' AND service_id='$servid'";
$r=mysqli_query($db,$q);
$row=mysqli_fetch_array($r);
$date=$row[6];
for ($i=0;$i<$n;$i++) 
{ 
	$date=$date."$arr[$i]".",";
}
$q="update service_details set availability='$date' where vendor_id='$vendorid' AND service_id='$servid'";
$r=mysqli_query($db,$q);

header("location:vendor_dash.php");
?>


