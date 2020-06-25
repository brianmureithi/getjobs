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
	
	$email = filter_var($_POST["email"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$password = filter_var($_POST["password"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$pass = md5($password);
$sql= mysqli_query($dbhandle, "SELECT * FROM expert_tbl WHERE email='".$email."' AND password='".$pass."' LIMIT 1") or die (mysqli_error($dbhandle));

//Make  sure the person exists
$count=mysqli_num_rows($sql);
$row = mysqli_fetch_array($sql);
if($count > 0){
$_SESSION['id']=$row['expert_id'];
$id=$row['expert_id'];
$_SESSION['firstname']=$row['firstname'];
$_SESSION['prof_pic']=$row['prof_pic'];
$_SESSION['lastname']=$row['lastname'];
$_SESSION['email']=$row['email'];
$_SESSION['county']=$row['county'];
$_SESSION['expertise']=$row['expertise'];
$_SESSION['phonenumber']=$row['phonenumber'];
$_SESSION['logged']=true;
$_SESSION['testing']=time();
$email=$row['email'];
$password=$row['password'];
$profpic=$row['prof_pic'];
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$expertise=$row['expertise'];
$county=$row['county'];

$sql = mysqli_query($dbhandle,"INSERT INTO loggedin_experts(expert_id,firstname,lastname,email,county,expertise,password,prof_pic,loggedin_date) VALUES ('".$id."','".$firstname."',
'".$lastname."','".$email."','".$county."','".$expertise."','".$pass."','".$profpic."',now())") or die (mysqli_error($dbhandle));


header("location: dashboard.php");


}	else{
?>
 <script>
 alert('!!! You have entered the wrong email or password please try again');
window.location="login.php?=error"

 </script>
 <?php
     
		
}

}

?>