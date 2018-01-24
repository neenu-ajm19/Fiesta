<!doctype html>
<html>
<head>
<title>EDIT</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/nivo-lightbox.css">
<link rel="stylesheet" href="css/nivo_themes/default/default.css">
<link rel="stylesheet" href="css/templatemo-style.css">
<link href="css/materialize.css" type="text/css" rel="stylesheet">
<link href="css/style.css" type="text/css" rel="stylesheet">

</head>

<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container ">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> </button>
      <a href="index.php" class="navbar-brand">Fiesta</a></div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php" class="smoothScroll">HOME</a></li>
        <li><a href="index.php" class="smoothScroll">ABOUT</a></li>
        <li><a href="service_list.html" class="smoothScroll">SERVICES</a></li>
        <li><a href="index.php" class="smoothScroll">REGISTER</a></li>
        <li><a href="index.php" class="smoothScroll">CONTACT</a></li>
      </ul>
    </div>
  </div>
</div>

<?php
session_start();
include("session_vendor.php");
$db=mysqli_connect("localhost","root","","eventdb");
$vendorid=$_SESSION["vendorid"];
$servid=$_GET["id"];


if(isset($_POST['submit']))
{
        $target_dir = "images/";
                    $target_file = $target_dir . basename($_FILES["ftp"]["name"]);
                    $uploadOk = 1;
                    $ftpType = pathinfo($target_file,PATHINFO_EXTENSION);
                    // Check if image file is a actual image or fake image
                    if(isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["ftp"]["tmp_name"]);
                        if($check !== false) {
                            echo "File is an image - " . $check["mime"] . ".";
                            $uploadOk = 1;
                        } else {
                            echo "File is not an image.";
                            $uploadOk = 0;
                        }
                    }


                    // Allow certain file formats
                    if($ftpType != "jpg" && $ftpType != "png" && $ftpType != "jpeg"
                    && $ftpType != "gif" && $ftpType != "JPG" && $ftpType != "PNG" && $ftpType != "JPEG" && $ftpType != "GIF" ) {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["ftp"]["tmp_name"],$target_dir .$vendorid."_".$servid.".jpg")) {
                            
                            
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }


         

       header("location:vendor_dash.php");
    }
   






?>


<body>
<div class="container">
   
   <div class="row">
      <div class="col s2">
      </div>
      <div class="col s8">
        
         <div class="card">
            <div class="card-content">
               <span class="card-title grey-text text-darken-4">Add Photo:</span>
               <form action = "" method = "post" enctype='multipart/form-data'>
                  
                  <div class="input-field">
                    <label>Picture</label><br><br><input type='file' name='ftp' id='ftp' ><br>
                </div>
                  
                  <div class="input-field">
                     <button type="submit" name="submit" class="btn-large teal">Save</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col s2">
      </div>
   </div>
</div>
   
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/nivo-lightbox.min.js"></script> 
<script src="js/smoothscroll.js"></script> 
<script src="js/jquery.sticky.js"></script> 
<script src="js/jquery.parallax.js"></script> 
<script src="js/wow.min.js"></script> 
<script src="js/custom.js"></script>
<script src="js/materialize.js"></script>
<script src="js/script.js"></script>

</body>
</html>

   


