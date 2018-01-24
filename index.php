<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>


<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/nivo-lightbox.css">
<link rel="stylesheet" href="css/nivo_themes/default/default.css">
<link rel="stylesheet" href="css/templatemo-style.css">


</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- preloader section -->
<div class="preloader">
  <div class="sk-spinner sk-spinner-rotating-plane"></div>
</div>

<!-- home section -->
<section id="home">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <h1 class="wow bounceInDown rotate">Fiesta</h1>
        <a href="#intro" class="btn btn-default smoothScroll">GET STARTED</a></div>
    </div>
  </div>
</section>

<!-- navigation section -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container ">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> </button>
      <a href="#" class="navbar-brand">Fiesta</a></div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#home" class="smoothScroll">HOME</a></li>
        <li><a href="#intro" class="smoothScroll">ABOUT</a></li>
        <li><a href="#work" class="smoothScroll">SERVICES</a></li>
        <li><a href="#price" class="smoothScroll">REGISTER</a></li>
        <li><a href="#contact" class="smoothScroll">CONTACT</a></li>
        <?php 
          session_start();
          if(isset($_SESSION['vendorid']))
            header("location:vendor_dash.php");
          if(isset($_SESSION['userid']))
            header("location:user_dash.php");
        ?>
      </ul>
    </div>
  </div>
</div>

<!-- about section -->
<section id="intro" style="background-color: lightyellow;">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6 col-md-offset-3  col-sm-offset-2 col-sm-8 col-sm-offset-2 title" style="background-color: beige;">
        <h2>Plan your Celebrations</h2>
        <hr>
        <p style="font-size: 22px;">Enjoy every bit of your special days, without worries. Let us make it happen for you.</p>
      </div>
      <div class="col-md-offset-3 col-md-6 col-md-offset-3  col-sm-offset-2 col-sm-8 col-sm-offset-2 title" style="
    background-color: beige;
">
        <h2>Wide network of vendors</h2>
        <hr>
        <p style="font-size: 22px;">Choose from our wide network of vendors, find the right one for you.</p>
      </div>
    </div>
  </div>
</section>

<!-- services section -->
<section id="work">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h3></h3>
      </div>
    </div>
    <div class="row">
      	<div class="col-md-3 col-sm-5 title">
        	<h2>Services</h2>
        	<hr>
        	<p style="font-size: 20px;">Search through our wide network of service vendors and choose the right one for you.</p>
      	</div>
      
	     <div class="col-md-9 col-sm-7">
        	<div class="col-md-3 col-sm-3 bg-white"> 
          	<h3></h3>
        	</div>
        	<div class="col-md-3 col-sm-3 bg-white"> 
          	<h3></h3>
        	</div>
        	<div class="col-md-3 col-sm-3 bg-white"> 
          	<h3></h3>
        	</div>
        	<div class="col-md-3 col-sm-3 bg-white"> 
          	<h3></h3>
        	</div>
		
          <a href="vendor_list.php?value=1"><div class="col-md-3 col-sm-3 bg-red"> <i class="fa fa-mobile"></i>
          	<h3>Venue</h3>
        	</div></a>
        	<a href="vendor_list.php?value=2"><div class="col-md-3 col-sm-3 bg-black"> <i class="fa fa-cloud"></i>
          	<h3>Catering</h3>
        	</div></a>
        	<a href="vendor_list.php?value=7"><div class="col-md-3 col-sm-3 bg-red"> <i class="fa fa-link"></i>
          	<h3>Decorations</h3>
        	</div></a>
        	<a href="service_list.html"><div class="col-md-3 col-sm-3 bg-black"> <i class="fa fa-globe"></i>
          	<h3>More</h3>
        	</div></a>
      	</div>
    </div>
  </div>
</section>

<!-- register section -->
<div id="price" style="background-color: lightyellow;">
 	<div class="container">
    	<div class="row" >
        <div class="col s12">
          <h3></h3>
        </div>
       </div>
       <div class="row">
        <div class="col s12">
          <h3></h3>
        </div>
       </div> 
<div class="col-md-offset-3 col-md-6 col-md-offset-3  col-sm-offset-2 col-sm-8 col-sm-offset-2 title" style="padding-bottom: 20px;">
      			<h2>REGISTER</h2>
<p style="font-size: 20px;">Register with us to make use of this incredible platform.</p>    		
</div>
   		 <div class="col-md-6 col-sm-6">
     			 <div class="plan wow bounceIn" data-wow-delay="0.3s">
<div class="plan_title" style=" padding-bottom: 10px;padding-top: 10px;">
					<h3>USER</h3>
				</div>
				<div class="row">
					<div class="col s8">
						<a class="waves-effect waves-light btn" href="user_login.php">LOGIN</a>
					</div>
				</div>
				<div class="row">
					<div class="col s8">
						<a class="waves-effect waves-light btn" href="user_signup.php">SIGN UP</a>
					</div>
				</div>
			 </div>
    		</div>
    		<div class="col-md-6 col-sm-6">
     			 <div class="plan wow bounceIn" data-wow-delay="0.6s">
       				 <div class="plan_title" style=" padding-bottom: 10px;padding-top: 10px;">
         				 <h3>VENDOR</h3>
        			</div>
        			<div class="row">
					<div class="col s8">
						<a class="waves-effect waves-light btn" href="vendor_login.php">LOGIN</a>
					</div>
				</div>
				<div class="row">
					<div class="col s8">
						<a class="waves-effect waves-light btn" href="vendor_signup.php">SIGN UP</a>
					</div>
				</div>
      			</div>
    		</div>
  </div>
</div>

<!-- contact section -->
<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6 col-md-offset-3  col-sm-offset-2 col-sm-8 col-sm-offset-2 title">
        <h2>Contact Us</h2>
        <hr>
        <p>We would love to hear from you.</p>
      </div>
      <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 contact-form wow fadeInUp" data-wow-delay="0.9s">
        <form action="#" method="post">
          <input type="text" class="form-control" placeholder="Name">
          <input type="email" class="form-control" placeholder="Email">
          <textarea class="form-control" placeholder="Message" rows="6"></textarea>
          <input type="submit" class="form-control" value="SEND EMAIL">
        </form>
      </div>
    </div>
  </div>
</section>

<!-- google map section -->
<div class="google_map">
  <div id="map-canvas"></div>
</div>
<!-- footer section -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <h2 class="wow fadeIn" data-wow-delay="0.9s">Follow Us</h2>
        <ul class="social-icon">
          <li><a href="#" class="fa fa-facebook wow bounceIn" data-wow-delay="0.3s"></a></li>
          <li><a href="#" class="fa fa-twitter wow bounceIn" data-wow-delay="0.6s"></a></li>
          <li><a href="#" class="fa fa-behance wow bounceIn" data-wow-delay="0.9s"></a></li>
          <li><a href="#" class="fa fa-dribbble wow bounceIn" data-wow-delay="0.9s"></a></li>
          <li><a href="#" class="fa fa-github wow bounceIn" data-wow-delay="0.9s"></a></li>
          <li><a href="#" class="fa fa-android wow bounceIn" data-wow-delay="0.9s"></a></li>
          <li><a href="#" class="fa fa-phone wow bounceIn" data-wow-delay="0.9s"></a></li>
        </ul>
      </div>
      <div class="col-md-12 col-sm-12 copyright">
        <p>&copy; Fiesta 2017. All Rights Reserved </p>
      </div>
    </div>
  </div>
</footer>

<!-- JAVASCRIPT JS FILES --> 
<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/nivo-lightbox.min.js"></script> 
<script src="js/smoothscroll.js"></script> 
<script src="js/jquery.sticky.js"></script> 
<script src="js/jquery.parallax.js"></script> 
<script src="js/wow.min.js"></script> 
<script src="js/custom.js"></script>
</body>
</html>