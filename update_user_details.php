<?php
require ("dbcon.php");
require("session.php");
$prof_id= $_SESSION['id'];
//Insert Member
if(isset($_POST['submit'])){
extract($_POST);
$image=$_FILES['profile']['name'];
$target="assets/profile/".basename($_FILES['profile']['name']);

$password = filter_var($_POST['password'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$pass=md5($password);
       $txtGalleryName="profile"; 
       if(!$password){
      
       
       $sql = mysqli_query($dbhandle," UPDATE users_tbl SET prof_pic ='$target' where user_id = $prof_id") or die (mysqli_error($dbhandle));
       if (move_uploaded_file($file_tmp=$_FILES['profile']['tmp_name'],$target))
       {
            echo "<font size = '3'><font color=\"#808080\">SAVED TO DATABASE"; 
       
       }
             else
             {
                  echo "There was a problem changing image";

             }
                echo"<script>
                window.location='prof_update.php?success';
                </script>"; 

    
    }
    else if(!$image){
        $sql = mysqli_query($dbhandle,"UPDATE users_tbl SET password= '".$pass."' where user_id = $prof_id") or die (mysqli_error($dbhandle));  
        if (move_uploaded_file($file_tmp=$_FILES['profile']['tmp_name'],$target))
        {
             echo "<font size = '3'><font color=\"#808080\">SAVED TO DATABASE"; 
        
        }
              else
              {
                   echo "There was a problem changing image";
 
              }
                 echo"<script>
                 window.location='prof_update.php?success';
                 </script>"; 
 
    }

    
       else{
        $sql = mysqli_query($dbhandle,"UPDATE users_tbl SET prof_pic='$target', password= '".$pass."' where user_id = $prof_id") or die (mysqli_error($dbhandle));  
        if (move_uploaded_file($file_tmp=$_FILES['profile']['tmp_name'],$target))
        {
             echo "<font size = '3'><font color=\"#808080\">SAVED TO DATABASE"; 
        
        }
              else
              {
                   echo "There was a problem changing image";
 
              }
                 echo"<script>
                 window.location='prof_update.php?success';
                 </script>"; 
 
    }

    }

    ?>