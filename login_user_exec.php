<?php 
include_once("dbcon.php");
$inactive = 1200;
 ini_set('session.gc_maxlifetime',$inactive);//set session max lifetime
 session_start(); 
 global $dbhandle;
 if(isset($_SESSION['testing'])&&(time()-$_SESSION['testing']>$inactive)){
   session_unset();
   session_destroy();
 }
//Parse the log in form if the user has filled it out and pressed "Log in"

if(isset($_POST["login"])){
	$expertid=$_GET['expert_id'];
	if($_GET['expert_id']==0){
		$email = filter_var($_POST["email"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$password = filter_var($_POST["password"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$pass = md5($password);
$sql= mysqli_query($dbhandle, "SELECT * FROM users_tbl WHERE email='".$email."' AND password='".$pass."' LIMIT 1") or die (mysqli_error($dbhandle));

//Make  sure the person exists
$count=mysqli_num_rows($sql);
$row = mysqli_fetch_array($sql);
if($count > 0){
$_SESSION['id']=$row['user_id'];
$id=$row['user_id'];
$_SESSION['firstname']=$row['firstname'];
$_SESSION['prof_pic']=$row['prof_pic'];
$_SESSION['lastname']=$row['lastname'];
$_SESSION['email']=$row['email'];
$_SESSION['county']=$row['county'];
$_SESSION['phonenumber']=$row['phonenumber'];
$_SESSION['logged']=true;
$_SESSION['testing']=time();
$email=$row['email'];
$password=$row['password'];
$profpic=$row['prof_pic'];
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$county=$row['county'];

/*$sql = mysqli_query($dbhandle,"INSERT INTO loggedin_users(expert_id,firstname,lastname,email,county,expertise,password,prof_pic,loggedin_date) VALUES ('".$id."','".$firstname."',
'".$lastname."','".$email."','".$county."','".$expertise."','".$pass."','".$profpic."',now())") or die (mysqli_error($dbhandle));*/


header("location: users_dashboard.php");


}	else{
?>
 <script>
 alert('!!! You have entered the wrong email or password please try again');
window.location="login_user.php?expert_id=0"

 </script>
 <?php
     
		
}
		
		
	} 
	
	else if($_GET['expert_id']===$_GET['expert_id']){
		
		$email = filter_var($_POST["email"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$password = filter_var($_POST["password"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$pass = md5($password);
$sql= mysqli_query($dbhandle, "SELECT * FROM users_tbl WHERE email='".$email."' AND password='".$pass."' LIMIT 1") or die (mysqli_error($dbhandle));

//Make  sure the person exists
$count=mysqli_num_rows($sql);
$row = mysqli_fetch_array($sql);
if($count > 0){
$_SESSION['id']=$row['user_id'];
$id=$row['user_id'];
$_SESSION['firstname']=$row['firstname'];
$_SESSION['prof_pic']=$row['prof_pic'];
$_SESSION['lastname']=$row['lastname'];
$_SESSION['email']=$row['email'];
$_SESSION['county']=$row['county'];

$_SESSION['phonenumber']=$row['phonenumber'];
$_SESSION['logged']=true;
$_SESSION['testing']=time();
$email=$row['email'];
$password=$row['password'];
$profpic=$row['prof_pic'];
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$county=$row['county'];

/*$sql = mysqli_query($dbhandle,"INSERT INTO loggedin_users(expert_id,firstname,lastname,email,county,expertise,password,prof_pic,loggedin_date) VALUES ('".$id."','".$firstname."',
'".$lastname."','".$email."','".$county."','".$expertise."','".$pass."','".$profpic."',now())") or die (mysqli_error($dbhandle));*/

$expertid=$_GET['expert_id'];
header("location: work_submission.php?expert_id=$expertid");


}	else{
?>
 <script>
 alert('!!! You have entered the wrong email or password please try again');

 window.location="login_user.php?expert_id=<?php echo $expertid=$_GET['expert_id'];?>"
 </script>
 
 <?php
		
}
	
	
}

}

?>