<?php
require ("dbcon.php");
//Insert info
if(isset($_POST['submit'])){
	
	$name = filter_var($_POST['name'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$email = filter_var($_POST['email'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $phonenumber = filter_var($_POST['phonenumber'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$subject = filter_var($_POST['subject'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$message = filter_var($_POST['message'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	/*$password = filter_var($_POST['password'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$pass=md5($password);  */  
  
  $sql = mysqli_query($dbhandle,"INSERT INTO contact_messages(name,email,phonenumber,subject,message,feedback_date) VALUES 
  ('".$name."','".$email."','".$phonenumber."','".$subject."','".$message."',now())") or die (mysqli_error($dbhandle));
		
  if($sql=1){
	
	echo "<script>
	if(confirm('Your message has been successfully received')){
		window.location = './contact.php?success';
	}
	</script>"; 
    
  }   
  else{
  echo "<script>
	if(confirm('An error occured receiving your message please try again')){
		window.location = './contact.php?failed';
	}
	</script>"; 
  
  }
   
		
		exit();	}   
    ?>
