<?php
session_start();
include("session_user.php");
$db=@mysqli_connect("localhost","root","","eventdb");
$userid=$_SESSION["userid"];
$ename=$_POST['ename'];
$location=$_POST['location'];
$date=$_POST['date'];
$bl=$_POST['budlower'];


$tdate=date('Y-m-d');
echo$tdate.$date;
if($date>$tdate)
{
$q="update user_details SET event_name='$ename',location='$location',event_date='$date',budget='$bl' where user_id='$userid'";
$r=mysqli_query($db,$q);
header("location:view_user_packages.php");

}
else
{
	echo"<script>alert('Enter a valid date'); </script>";
	header("location:start_user_packages.php");
}
  


?>




