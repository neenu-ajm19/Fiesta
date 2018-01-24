<?php
    session_start();
unset($_SESSION['userid']);
unset($_SESSION['vendorid']);

header("location:index.php");
?>
