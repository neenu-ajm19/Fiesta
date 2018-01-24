<!doctype html>
<html>
<head>
<title>LOGIN</title>

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
if(isset($_SESSION['vendorid']))
{
  header("location:vendor_dash.php");
}
   include("config.php");
   
   $error='';
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT * FROM vendor_details WHERE vendor_id = '$myusername' and vendor_password = PASSWORD('$mypassword')";
      
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) 
      {
         //session_register("myusername");
         $_SESSION['vendorid'] = $myusername;
         
         


         
         header("location: vendor_dash.php");
      }
      else 
      {
         echo"<h5>Invalid Email or Password</h5>";
      }
   }
?>

<div class="container">
   <div class="row">
      <div class="col s12">
         <h2>Vendor Login</h2>
      </div>
   </div>
   <div class="row">
      <div class="col s2">
      </div>
      <div class="col s8">
        <a href="vendor_signup.php"><h6>Dont have an account? REGISTER</h6></a>
         <div class="card">
            <div class="card-content">
               <span class="card-title grey-text text-darken-4">Enter details:</span>
               <form action = "" method = "post">
                  <div class="input-field">
                     <label>Email</label>
                     <input type = "email" name = "username" class="validate"/><br /><br />
                  </div>
                  <div class="input-field">
                     <label>Password</label>
                     <input type = "password" name = "password" class="validate"/><br/><br />
                  </div>
                  <div class="input-field">
                     <button type="submit" class="btn-large teal">Login</button>
                  </div>
				   <h6><a href="forgot_vendor.html">Forgot Password?</a></h6>
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