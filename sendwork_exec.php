<?php
require ("dbcon.php");

if (isset($_POST['submit'])){
    $status = filter_var($_POST['status'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $subject = filter_var($_POST['subject'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$email = filter_var($_POST['email'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$phone = filter_var($_POST['phonenumber'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $userid=  filter_var($_POST['userid'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
      $message=  filter_var($_POST['message'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
      $workid=$_GET['workid'];
      $filename=$_FILES['myfile']['name'];
      $destination='worksubmittedfiles/'.$filename;
       $extension=pathinfo($filename,PATHINFO_EXTENSION);
       $file=$_FILES['myfile']['tmp_name'];
       $size= $_FILES['myfile']['size'];

        if($status==='Job Denied'){
        ?><script>
            alert('Sorry, but you Declined this Job, and therefore you cannot submit the work');
            window.location="dashboard.php";
            </script>

            <?php
    }
   
       if(!in_array($extension,['zip','pdf','docx','jpeg','jpg','dwg','pptx','xls','accdb','js','php','css','html'])){
           echo"Your file extension must be of type .zip,.docx,.pdf,.dwg,.pptx,.xls,/jpeg,.jpg,.accdb,.html,.js,.css or .php";
       }
       else if($_FILES['myfile']['size']>1000000000){
           echo"file too large,kindly upgrade to our premium account to access such services";
       }
       else{
           $workid=$_GET['workid'];
        $sql= mysqli_query($dbhandle, "SELECT * FROM works_tbl WHERE work_id= $workid LIMIT 1") or die (mysqli_error($dbhandle));
        $count=mysqli_num_rows($sql);
        $row = mysqli_fetch_array($sql);
                if($count > 0){
    
                    $sqlone=mysqli_query($dbhandle,"UPDATE  works_tbl SET jobstatus = 'Job Done and submitted' WHERE work_id=$workid ")
                    or die (mysqli_error($dbhandle));
                   
                
                }
                $sql="INSERT INTO jobsdone(users_id,work_id,jobstatus,jobsubject,email,phone,messages,files_name,file_size,time_of_submission) VALUES
                ('".$userid."','". $workid."','Job completed','". $subject."','". $email."','". $phone."','". $message."','$filename'
                ,$size,now())"or die (mysqli_error($dbhandle));
                if (!mysqli_query($dbhandle,$sql))
                {      
                   die('Error: ' . mysqli_error($dbhandle)); 
                         
                } 
                //move the file from temporary location to the specified destination
           if (move_uploaded_file($file,$destination)){
            echo "<font size = '3'><font color=\"#808080\">SAVED TO DATABASE"; }
            else{
                echo "failed to send";
            }
            if($sql=1){
	
                echo "<script>
                if(confirm('Your have successfully submitted your work')){
                    window.location = './dashboard.php?success';
                }
                </script>"; 
                
                
              }   else{
                echo "<script>
                  if(confirm('An error occured when submitting your work, kindly try again')){
                      window.location = './dashboard.php?failed';
                  }
                  </script>"; 
                
                }
                  

        }
        exit();
      
    }


        ?>
