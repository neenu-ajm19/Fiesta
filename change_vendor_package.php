<?php
$db=mysqli_connect("localhost","root","","eventdb");
session_start();
include("session_vendor.php");
$vendor_id=$_SESSION["vendorid"];
$servid_id=$_SESSION["servid"];

$pack_name=$_POST["pack_name"];
$pack_desc=$_POST["pack_desc"];
$pack_rate=$_POST["pack_rate"];
$pack_contents=$_POST["pack_contents"];
$packid=$_POST["pack_id"];
$id=$_POST["id"];
if($id>0)
{
  $q="update packages SET package_name='$pack_name',package_desc='$pack_desc',package_rate=$pack_rate WHERE package_id='$packid'";
  $r=mysqli_query($db,$q);
  $filename = "content/packages/".$packid.".txt";
  $file = fopen( $filename, "w" );
  fwrite( $file, $pack_contents );
  fclose( $file );
}

else if($id==0)
{
  $q="insert into packages values(null,'$vendor_id','$servid_id','$pack_name','$pack_desc','$pack_rate');";
  $r=mysqli_query($db,$q);
  $q="select * from packages order by package_id desc";
  $r=mysqli_query($db,$q);
  $row=mysqli_fetch_array($r);
  $filename = "content/packages/".$row[0].".txt";
  $file = fopen( $filename, "w" );
  fwrite( $file, $pack_contents );
  fclose( $file );
  $q="select * from service_details where vendor_id='$vendor_id' AND service_id='$servid_id'";
  $r=mysqli_query($db,$q);
  $row1=mysqli_fetch_array($r);
  if(($row[5]<$row1[5])||($row1[5]==0))
  {
    $q="update service_details set rate='$row[5]' where vendor_id='$vendor_id' AND service_id='$servid_id'";
    $r=mysqli_query($db,$q);
    
  }
}
else
{
  $q="delete from packages where package_id='$packid'";
  $r=mysqli_query($db,$q);
  
  $filename = "content/packages/".'$packid'.".txt";

}
header("location:vendor_dash.php");

?>




