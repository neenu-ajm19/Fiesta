<!doctype html>
<html>
<head>
<title>SIGN UP</title>

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
if(isset($_SESSION['userid']))
  header("location:user_dash.php");
if(isset($_POST['email']))
{
	$db = mysqli_connect('localhost','root','','eventdb');
  if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
  if (ctype_digit($_POST['contact']) && strlen($_POST['contact']) == 10) 
  {	
    if($_POST['password']==$_POST['cpassword'])
  	{
  		$sql="insert into user_details (user_id,user_name,user_password,contact) values ('$_POST[email]','$_POST[username]',PASSWORD('$_POST[password]'),'$_POST[contact]')";
      
  		$result = mysqli_query($db,$sql);
  		if($result)
  		{
  			echo "<script>
        alert('User has been registered, you will be redirected to the login page');
        window.location='user_login.php';
        </script>";
  		}
  		else 
  		{
  			echo "<h5>Please, Use another email this one already exists</h5>";
  		}
  	}
  	else
  	{
  		echo "<h5>Passwords do not match</h5>";
  	}
  }
  else
    {
      echo "<h5>Enter a valid Contact</h5>";
    }
  }
  else
    echo "<h5>Enter a valid Email</h5>";

}
?>


<div class="container">
   <div class="row">
      <div class="col s12">
         <h2>User Sign Up</h2>
      </div>
   </div>
   <div class="row">
      <div class="col s2">
      </div>
      <div class="col s8">
        <a href="user_login.php"><h6>Have an account? LOGIN</h6></a>
         <div class="card">
            <div class="card-content">
               <span class="card-title grey-text text-darken-4">Enter details:</span>
               <form action = "" method = "post">
                  <div class="input-field">
                     <label >Name</label>
                     <input type = "text" name = "username" class = "validate" id="username" required/><br /><br />
                  </div>
                  <div class="input-field">
                     <label>Email</label>
                     <input type ='email' name = "email" id="email" class = "validate" required /><br/><br />
                  </div>
                  <div class="input-field">
                     <label>Contact</label>
                     <input type="text" name="contact" required><br/><br />
                  </div>
                  <div class="input-field">
                     <label>Password</label>
                     <input type = "password" name = "password" class = "validate" id="password"required /><br/><br />
                  </div>
                  <div class="input-field">
                     <label>Confirm Password</label>
                     <input type ='password' name = "cpassword" id="cpassword" class = "validate" required /><br/><br />
                  </div>
                  <div class="input-field">
                     <button type="submit" class="btn-large teal">Register</button>
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

   

    
    

