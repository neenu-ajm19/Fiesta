<!doctype html>
<html>
<head>
<title>DASH</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/nivo-lightbox.css">
<link rel="stylesheet" href="css/nivo_themes/default/default.css">
<link rel="stylesheet" href="css/templatemo-style.css">
<link href="css/materialize.css" type="text/css" rel="stylesheet">
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
        $db = mysqli_connect('localhost','root','','eventdb');
        include("session_vendor.php");
        $pid=$_POST["pid"];
        $sql="select * from packages where package_id='$pid'";
        $result = mysqli_query($db,$sql);
        $pack= mysqli_fetch_array($result);
        $filename="content/packages/$pid.txt";
        $free= file_get_contents($filename);
        echo $filename;


echo"
<div class='container'>
    <div class='row'>
        <div class='col s12'>
            <form action='change_vendor_package.php' method='post'>
                <label>Package Name</label><input type='text' name='pack_name' value='$pack[3]' required><br><br>
                <label>Package Descripton</label><br><textarea name='pack_desc'>$pack[4]</textarea><br><br>
                <label>Rate</label><input type='number' name='pack_rate' value='$pack[5]' required><br><br>
                <label>Contents</label><textarea name='pack_contents' required>$free</textarea><br><br>
                <input type='hidden' name='pack_id' value='$pack[0]'>
                <input type='hidden' name='id' value='1'>
                <button type='submit' class='btn-large red'>Save</button>
            </form>
        </div>
    </div>
</div>";

?>


<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/nivo-lightbox.min.js"></script> 
<script src="js/smoothscroll.js"></script> 
<script src="js/jquery.sticky.js"></script> 
<script src="js/jquery.parallax.js"></script> 
<script src="js/wow.min.js"></script> 
<script src="js/custom.js"></script>
<script src="js/materialize.js"></script>

</body>
</html>


