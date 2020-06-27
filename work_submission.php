<html>
<?php require_once('functions.php');
include "session.php";
?>

<head>
<title>Dashboard</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/styledash.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Kazikwetu</a>
    </div>
			<ul class="nav navbar-nav">
			  <li  class="active" ><a href="work_submission.php" style="color:fff">Work-Submision</a></li>
			  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="login_user.php">Logout <span class="caret"></span></a>
				<ul class="dropdown-menu">
				 
				</ul>
			  </li>
			  <li><a href="contact.php">Contact us</a></li>
			</ul>
							  <ul class="nav navbar-nav navbar-right">
							  <li><a href="signup_user.php"  class="active"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
							  <li class="active"><a href="login_user.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
             </ul>
  </div>
</nav>
  
  
  
 
	<div class="container">
    <div class="row"> 
    <div class="col-md-6">
    <form action="work_submit_exec.php" method="post" id="fileform" role="form" enctype="multipart/form-data">
    <fieldset><legend class="text-center"><h4>GIVE WORK TO
    <?php
$expertid=$_GET['expert_id'];
global $dbhandle;
$query_search = "select * from expert_tbl where expert_id = {$expertid}";
$query_exec = mysqli_query($dbhandle,$query_search)or die(mysqli_error($dbhandle));
       if(!empty($query_exec))
       {
            if(mysqli_num_rows($query_exec)>0){
            while($row = mysqli_fetch_array($query_exec))
            echo '
<h4 style="color:#1E90FF">'.$row['firstname'].' '.$row['lastname'].'</h4>
'; 
           }
               else
               {
                  echo'<h5 style="font-family:Roboto; font-size:16px;color:#DC143C;">No name for this expert</h5>';
               }    
       }
               else
               {
                   echo 'error in query';
               }?></h4></legend>  <span class="req"><small></small></span>

                <div class="form-group">
      <label for="region"><span class="req">
	   </span> Region  <small>
	  </small> </label> 
	  <select class="form-control" id="exampleSelect1" name="region"> <?php Kazikwetu::getcounties();?></select>
	
             <div id="errLast"></div>
            </div>
            <div class="form-group">
				<label for="exampleSelect1">Expertise</label>
				<input class="form-control" id="exampleSelect1" style="color:#008B8B;" readonly name="expertise" value="<?php echo getexpertise();?>">
            
               
            </input>
            </div>
    
	  <div class="form-group" style="padding-left:20px;">
		   <label for="email"><span class="req"> </span>   Email Address: </label> 
           <input class="form-control" required type="text" style="color:#008B8B;"readonly name="email" placeholder="" value="<?php 
           echo$_SESSION['email']; ?>"	id = "email" 
            onchange="email_validate(this.value);" />   
            <div class="status" id="status"></div>
            </div>
			<div class="form-group" style="padding-left:20px;">
            <label for="phonenumber"><span class="req"> </span>
			 Phone Number: </label>
    <input required type="text" name="phonenumber"id="phone"  style="color:#008B8B;"readonly
    class="form-control phone" maxlength="28"
    onKeyUp="validatephone(this);" value="<?php echo$_SESSION['phonenumber']; ?>"placeholder="phone number"/> 
            </div>
           
            <?php
           function getexpertise(){
 $expertid=$_GET['expert_id'];
global $dbhandle;
$query_search = "select * from expert_tbl where expert_id = {$expertid}";
$query_exec = mysqli_query($dbhandle,$query_search)or die(mysqli_error($dbhandle));
       if(!empty($query_exec))
       {
            if(mysqli_num_rows($query_exec)>0){
            while($row = mysqli_fetch_array($query_exec))
            echo '
            ' .$row['expertise'].'';
        
           
           }
               else
               {
                  echo'<h5 style="font-family:Roboto; font-size:16px;color:#DC143C;">No name for this expert</h5>';
               }    
       }
               else
               {
                   echo 'error in query';
               }}?>
			   <div class="form-group" style="padding-left:20px;">
		   <label for="id"><span class="req"> </span>   Expert id: </label> 
           <input class="form-control" required type="text" style="color:#008B8B;"readonly name="expertid" placeholder="" 
           value="<?php echo"$expertid" ?>"	id = "id" 
            onchange="email_validate(this.value);" />   
            <div class="status" id="status"></div>
            </div>
	  
	  
        
       

        
        </div><!-- ends col-6 --> 
<br>
<br><br><br/>
         <div class="col-md-6">
         <div class="form-group" style="">
   <label for="files"><span class="req">
    </span> Upload a file if theres is any required: </label>
    <input type="file" name="myfile" class="form-control"/>
         <span id="myfile" placeholder="file of any type is supported in our site" ></span>
            </div>

            <div class="form-group" >
            <textarea placeholder="Kindly enter any extra details you would like to communicate to the expert" rows="10" class="form-control" style="border:thin solid #000000;"name="message" ></textarea>
            </div>
            
        
      
            <div class="form-group"> 
           <button class="btn btn-lg btn-primary"  name="submit" type="submit" value="send" style="min-width:200px; "> Send </button><!--style ="padding:8px;border:thin solid #ffffff;border-radius:5px; background-color:#6BBD6B;min-width:190px;max-height:40px;"> <a href="reg-submit-reg.php"  style="font-size:17px;color:#ffffff;">Register</a></button>-->
 <!-- <input class="btn btn-success" type="submit_reg" name="submit" 
  value="Register">-->
            </div>
      
      
       </fieldset>
       </form> 
       <script type="text/javascript">
       document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions"); 
       
       </script>
       </div> 


    </div>
    
	  <script src="js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    </body>
    </html>