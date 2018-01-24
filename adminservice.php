<?php
    include('config.php');
    session_start();
if(isset($_POST['username'])){
	if(!($_POST['username']=='root' && $_POST['password']=='root'))
	{
		echo 'enter the correct admin username and password';
    }
    else
    {
	$_SESSION['admin']='root';
	
	
        header('location:adminadd.php');
    }
}
else
{
	header('location:admin.php');
}
?>