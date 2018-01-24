<?php
   
        $db = mysqli_connect('localhost','root','','eventdb');
        session_start();
        //if(!isset($_SESSION['userid']))
            
        $sql="select * from packages where package_id='107'";
        $result = mysqli_query($db,$sql);
        $array= mysqli_fetch_array($result);
        $free= file_get_contents("packages/$array[0].txt");
        $i=3;
        if(isset($_POST['submit']))
        {
            while($i<6)
            {
                if($_POST["$i"]!='')
                {
                    $array[$i]=$_POST["$i"];
                }
                else if($_POST["$i"]=='' && $array[$i]==null)
                {
                    if(($i!=5))
                    {
                        $array[$i]=' ';
                    }
                    else
                    {
                        $array[$i]=0; 
                    }
            }
            $i++;
        }
        $sql="update packages set package_name='$array[3]',pack_desc='$array[4]',pack_rate=$array[5] where package_id=107";
        //echo $sql;
        $r = mysqli_query($db,$sql);
        if($r)
            echo "updated";
        if(isset($_POST['6']))
        {
            if($_POST['6']!='')
            {
                $filename = "packages/".$array[0].".txt";
                $file = fopen( $filename, "w" );
   	            if( $file == false ) 
                {
     		         echo ( "Error in opening new file" );
     		         exit();
   	            }
  	            fwrite( $file, $_POST['6']);
   	            fclose( $file );
            }
            $free=$_POST['6'];
        }
            
    
    }
?>


<html>
<head>
<title>PACKAGES</title>
</head>

<body>

<form action="" method="post">
<label>Package Name</label><input type="text" name="3" placeholder="<?php echo $array[3];?>"><br><br>
<label>Package Descripton</label><br><textarea name="4" placeholder="<?php echo $array[4]; ?>"></textarea><br><br>
<label>Rate</label><input type="number" name="5" placeholder="<?php echo $array[5]; ?>"><br><br>
<label>Contents</label><textarea name='6' placeholder="<?php echo $free; ?>"></textarea><br><br>
<input type="submit" value="submit">
</form>

</body>

</html>
