<html>
<head>
<title>PACKAGES</title>
</head>

<body>

<?php
$db=mysqli_connect("localhost","root","","eventdb");
session_start();
include("session_vendor.php");
$vendor_id=$_SESSION["vendorid"];
$servid_id=$_SESSION["serv_id"];

$pack_name=$_POST["pack_name"];
$pack_desc=$_POST["pack_desc"];
$pack_rate=$_POST["pack_rate"];
$pack_contents=$_POST["pack_contents"];

$q="insert into packages values(null,'revi@gmail.com','3','$pack_name','$pack_desc','$pack_rate');";

$r=mysqli_query($db,$q);

if($r)
{
	echo "Succcessful";
	$filename = "packages/".mysqli_insert_id($db).".txt";

  	 $file = fopen( $filename, "w" );
   
   	if( $file == false ) 
	{
     		 echo ( "Error in opening new file" );
     		 exit();
   	}
  	 fwrite( $file, $pack_contents );
   	fclose( $file );
}
else
	echo "Unsucccessful";

?>

</body>

</html>


