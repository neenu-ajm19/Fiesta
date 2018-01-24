<!doctype html>
<html>
<head>
<title>SERVICES</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
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
   
        $db = mysqli_connect('localhost','root','','eventdb');
        session_start();
        include("session_vendor.php");
        $vendorid=$_SESSION["vendorid"];
        $sql="select * from venue where vendor_id='$vendorid'";
        $result = mysqli_query($db,$sql);
        $array= mysqli_fetch_array($result);
        $sql="select * from service_details where vendor_id='$vendorid' AND service_id='1'";
        $result = mysqli_query($db,$sql);
        $info= mysqli_fetch_array($result);
        $i=1;
        if(isset($_GET['submit'])){
        while($i<6)
        {
            
            if($_GET["$i"]!='')
            {
            
                $array[$i]=$_GET["$i"];
            }
            else if($_GET["$i"]=='' && $array[$i]==null)
            {
                if(($i!=3 && $i!=5)){
                    
                $array[$i]=' ';
                }
                else
                {
                   $array[$i]=0; 
                }
            }
                 
            
            $i++;
        }

        $sql="update venue set address='$array[1]',type='$array[2]',capacity=$array[3],kitchen='$array[4]',parking=$array[5] where vendor_id='$vendorid'";
        $r = mysqli_query($db,$sql);

        $name=$_GET['name'];
        $location=$_GET['location'];
        $contact=$_GET['contact'];

        $sql="update service_details set service_name='$name', location='$location', contact='$contact' where vendor_id='$vendorid' AND service_id='1'";
        $result = mysqli_query($db,$sql);

        header("location:vendor_dash.php");
    
    }
?>






    <div class="container">        
    <form action="" metho="post">
        <label>Name</label><input type='text' name='name' value="<?php echo $info[2];?>" ><br>
        <label>Location</label><input type='text' name='location' value="<?php echo $info[3];?>" ><br>
        <label>Contact</label><input type='number' name='contact' value="<?php echo $info[4];?>" ><br>
        <label>Address:</label><input type ='text' name = "1" placeholder="<?php echo $array[1];?>" id="discr" class = "box" /><br/><br />
        <label>Type:</label><input type ='text' name = "2" id="location" placeholder="<?php echo $array[2];?>" class = "box"  /><br/><br />
        <label>Capacity</label><input type ='number' name = "3" id="contact" placeholder="<?php echo $array[3];?>" class = "box" /><br/><br />
        <label>Kitchen</label><input type ='text' name = "4" id="rate" class = "box" placeholder="<?php echo $array[4];?>"  /><br/><br />
        <label>Parking</label><input type ='number' name = "5" id="rate" class = "box" placeholder="<?php echo $array[5];?>" /><br/><br />
        <button type = 'submit' name='submit' value = 'Submit' >Save</button><br><br>
    </form>
     
    </div>
            

<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/materialize.js"></script>
</body>
</html>

    