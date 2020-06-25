<?php	
include ("session.php");
include ("functions.php");

 
    $_SESSION = []; 
       
            session_destroy();
            header('location:login_user.php?success'); ?>
        