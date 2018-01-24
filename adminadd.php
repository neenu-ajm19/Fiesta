<?php
    include("config.php");
	session_start();
	if(!isset($_SESSION['admin']))
	{
		header('location:admin.html');
	}

    if(isset($_POST['serv']))
    {
        $sql="insert into available_services values ('$_POST[serv]','$_POST[name]')";
        $result = mysqli_query($db,$sql);
        
        if($result)
        {
	       echo 'service is added ';
        }
        else 
        {
	       echo 'error';
        }
        
    }
?>
<html>
<head>
<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body align='center'>
    <a href="admin.html">LOGOUT</a>
    <form action='' method='post' >
    <label >servceid :</label><input type = 'text' name = 'serv' class = 'box' id='username'required/><br /><br />
    <label>name  :</label><input type = 'text' name = 'name' class = 'box' id='password' /><br/><br />
    <input type = 'submit' value = ' Submit '/><br /></form> 
</body>
</html>
