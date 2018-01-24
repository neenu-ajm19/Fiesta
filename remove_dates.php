<?php
session_start();
$db=mysqli_connect("localhost","root","","eventdb");
include("session_vendor.php");
$vendorid=$_SESSION["vendorid"];
$servid=$_SESSION["servid"];
$tdate=$_POST["tdate"];
$arrOut=explode(", ",$tdate);
$n1=sizeof($arrOut);

$q="select * from service_details where vendor_id='$vendorid' AND service_id='$servid'";
$r=mysqli_query($db,$q);
$row=mysqli_fetch_array($r);
$date=$row[6];
$arrIn=explode(",",$date);
$n2=sizeof($arrIn);
$date="'";

for ($i=0;$i<$n2-1;$i++) 
{ 
	$fl=0;
	for ($j=0;$j<$n1;$j++) 
	{ 
		if($arrIn[$i]==$arrOut[$j])
			$fl=1;
	}
	if($fl==0)
		$date=$date."$arrIn[$i]".",";
}

$date=$date."'";

$q="update service_details set availability=$date where vendor_id='$vendorid' AND service_id='$servid'";
$r=mysqli_query($db,$q);

header("location:vendor_dash.php");
?>


