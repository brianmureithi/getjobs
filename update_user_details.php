<?php
require ("dbcon.php");
require("session.php");
$prof_id= $_SESSION['id'];
//Insert Member
if(isset($_POST['submit'])){
extract($_POST);
$image=$_FILES['profile']['name'];
$file_tmp=$_FILES['profile']['tmp_name'];
$target="assets/profile/".time()."_".basename($_FILES['profile']['name']);

$password = filter_var($_POST['password'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$pass=md5($password);
     $txtGalleryName="profile"; 
     if(!$password){
          $extension=pathinfo($image,PATHINFO_EXTENSION);

          if(!in_array($extension,['png','jpeg','jpg','gif','JPG','PNG','JPEG','GIF'], FALSE)){
               die("Your file extension must be of type .png , .gif , /jpeg , .jpg");
          }
          elseif($_FILES['profile']['size']>(1024*1024*5)){
               die("file too large,kindly choose a smaller image");
          }else{
               $query = "SELECT * FROM users_tbl WHERE user_id = '".$prof_id."'";
               $query_exec = mysqli_query($dbhandle,$query) or die (mysqli_error($dbhandle));
               if(mysqli_num_rows($query_exec)>0)
		     {
                    $row = mysqli_fetch_array($query_exec);
                    $file_pointer = $row['prof_pic'];
                    if (!unlink($file_pointer))
                         {
                              die("Original profile picture not deleted");
                         }
               }
               mysqli_free_result($query_exec);
          

      
       
               if (move_uploaded_file($file_tmp,$target))
               {
                    $sql = mysqli_query($dbhandle," UPDATE users_tbl SET prof_pic ='$target' where user_id = '$prof_id'") or die (mysqli_error($dbhandle));

                    echo "<font size = '3'><font color=\"#808080\">SAVED TO DATABASE"; 
       
               }
               else
               {
                    die("There was a problem changing image");

               }
               echo"<script>
               window.location='users_dashboard.php?success';
               </script>"; 
          }

    
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
                 window.location='users_dashboard.php?success';
                 </script>"; 
 
    }

    
       else{
          $extension=pathinfo($image,PATHINFO_EXTENSION);

          if(!in_array($extension,['png','jpeg','jpg','gif','JPG','PNG','JPEG','GIF'], FALSE)){
               die("Your file extension must be of type .png , .gif , /jpeg , .jpg");
          }
          elseif($_FILES['profile']['size']>(1024*1024*5)){
               die("file too large,kindly choose a smaller image");
          }else{
               $query = "SELECT * FROM users_tbl WHERE user_id = '".$prof_id."'";
               $query_exec = mysqli_query($dbhandle,$query) or die (mysqli_error($dbhandle));
               if(mysqli_num_rows($query_exec)>0)
		     {
                    $row = mysqli_fetch_array($query_exec);
                    $file_pointer = $row['prof_pic'];
                    if (!unlink($file_pointer))
                         {
                              die("Original profile picture not deleted");
                         }
               }
               mysqli_free_result($query_exec);
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
                 window.location='users_dashboard.php?success';
                 </script>"; 
          }
 
    }

    }

    ?>