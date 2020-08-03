<?php
require ("dbcon.php");

if (isset($_POST['submit'])){
    session_start();
extract($_POST);
$region = filter_var($_POST['region'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$expertise = filter_var($_POST['expertise'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$email = filter_var($_POST['email'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$phone = filter_var($_POST['phonenumber'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $expid=  filter_var($_POST['expertid'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
      $message=  filter_var($_POST['message'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
      $usersfname = $_SESSION['firstname'];
      $userslname = $_SESSION['lastname'];
      $userid = $_SESSION['id'];

      $filename=$_FILES['myfile']['name'];
      $destination='uploadedfiles/'.$filename;
       $extension=pathinfo($filename,PATHINFO_EXTENSION);
       $file=$_FILES['myfile']['tmp_name'];
       $size= $_FILES['myfile']['size'];
       if(!in_array($extension,['zip','pdf','docx','jpeg','jpg','dwg','pptx','xls','accdb','js','php','css','html','png','gif'])){
           echo"Your file extension must be of type .zip,.docx,.pdf,.dwg,.pptx,.xls,/jpeg,.jpg,.accdb,.html,.js,.css or .php";
       }
       elseif($_FILES['myfile']['size']>(1024*1024*10)){
           echo"file too large,kindly upgrade to our premium account to access such services";
       }else{
        $sql="INSERT INTO works_tbl(expert_id,users_id,user_fname,user_lname,user_email,user_phone,expert_region,
        expertise,messages,files_name,file_size,time_of_submission) VALUES('". $expid."',$userid,'".$usersfname."',
       '". $userslname."','". $email."','". $phone."','". $region."','". $expertise."','". $message."','$filename'
        ,$size,now())"or die (mysqli_error($dbhandle));
        if (!mysqli_query($dbhandle,$sql))
        {      
           die('Error: ' . mysqli_error($dbhandle)); 
                 
        } 
       
           //move the file from temporary location to the specified destination
           if (move_uploaded_file($file,$destination)){
            echo "<font size = '3'><font color=\"#808080\">SAVED TO DATABASE"; }
            /*   mysqli_query($dbhandle,"INSERT INTO carowners(firstname,lastname,phonenumber,email,password,idnumber,profile,reg_date) VALUES ('".$firstname."','".$lastname."','".$phone."',
               '".$email."','".$pass."','". $idno."','$target',now())") or die (mysqli_error($dbhandle));*/
              
               else{
                   echo "failed to send";
               }
           }
       }
    
     
if(isset($_GET['file_id'])){
	$id= $_GET['file_id'];

	$sql="SELECT * from works_tbl WHERE work_id=$id";
	$result=mysqli_query($dbhandle,$sql);
	$file=mysqli_fetch_assoc($result);
	$filepath='./uploadedfiles/' .$file['files_name'];
	if(file_exists($filepath)){
		header('Content-Description: File Transfer');
		header('Content-Type: application/zip');
		header('Content-Disposition:attachment;filename='.basename($filepath));
		header('Content-Transfer-Emcoding:Binary');
		header('Expires:0');
		header('Cache-Control:public');
		header('Pragma:pulic');
		header('Content-Length: '.filesize('uploadedfiles/'.$file['files_name']));
		readfile('uploadedfiles/'. $file['files_name']);

		//update download count
		/*$newcount=$file['downloads']+1;
		$updatequery="UPDATE files SET downloads=$newcount where id=$id";
		mysqli_query($dbhandle,$updatequery);
		exit;*/
	}
}
