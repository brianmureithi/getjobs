<?php
include_once("functions.php");
require("session.php");
$prof_id= $_SESSION['id'];

?>
<html>
<head>
<title>Kazikwetu</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/textbox.css"/>
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-inverse">
  			<div class="container-fluid">
    			<div class="navbar-header">
      				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>                        
      				</button>
      				<a class="navbar-brand" href="index.php">Kazikwetu</a>
    			</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
			  		<li class="active"><a href="index.php" style="color:fff">Home</a></li>
			  		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Portal <span class="caret"></span></a>
						<ul class="dropdown-menu">
				  			<li><a href="login_user.php?expert_id=0">Client</a></li>
				  			<li><a href="login.php" >Expert</a></li>
						</ul>
			  		</li>
			  		<li><a href="contact.php">Contact us</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
					<li><a href="signup_user.php" ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="login_user.php?expert_id=0"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
             		</ul>
				</div>
  			</div>
		</nav>
		<div class="container">
		<!--call getprofile-->
		<?php getprofile_pic($prof_id)?>

<!--function to do all the querrying-->
		<?php 
	function getprofile_pic($prof_id)
		   { 
					  global $dbhandle;
					  $query_search = "select * from users_tbl where user_id = {$prof_id}";
					  $query_exec = mysqli_query($dbhandle,$query_search);
			 if(!empty($query_exec))
			 {
					 if(mysqli_num_rows($query_exec)>0)
					 {
						  while($row = mysqli_fetch_array($query_exec))
						  echo '<div class="profile_update">
			
						  <form action="update_user_details.php" method="post" id="fileform" role="form" enctype="multipart/form-data">
						  <fieldset>
							<div class="container-fluid">
							  <div class="row"> 
							  <div class="col-md-6 col-xs-12">
								<legend class="text-center" style="font-family:gadugi;font-size:25px;color:#8b0000">Profile Update
							</legend>  
								<div class="picture" >
								<img src="'.$row['prof_pic'].'" height="300" width="250px" style="padding:10px;">
								</div>

								<!-- new prof pic choosing--->
								<div class="form-group">
								<label for="profile"><span class="req">
								</span> Choose your new profile photo: </label>
								<input type="file" name="profile" class="form-control"/>
								<span id="profile" placeholder="used for your profile" ></span>
							  </div>
							  <!-- new prof pic choosing end --->
							 
					
							  <hr>

							  <h5>Note that, you can only update your profile picture and password until verified</h5>

						</div><!-- ends col-6 --> 
						  <br><br><br>		
						  <div class="col-md-6 col-xs-12">
						  
						  <!--name of user-->
						  
							  <div class="form-group">
								<label for="name"><span class="req">
								  </span> Name:  <small> </small> </label> 
									<input class="form-control" type="text" name="name" value="'.$row['firstname'].' '.$row['lastname'].'"   readonly />  
								<div id="errLast"></div>
								  </div>
								  
								  <!--end of user-->

								  <!--email user-->

									<div class="form-group">
								<label for="email"><span class="req">
								  </span> Email  <small>
								  </small> </label> 
								  <input class="form-control" type="text" name="name" value="'.$row['email'].' "   readonly /> 
								  <div id="errLast"></div>
							  </div>

							   <!--email end-->

							   <!--user phone number-->
				  
							  <div class="form-group">
								<label for="phonenumber"><span class="req">
								</span> Phonenumber: </label>
								<input required name="phone" type="text"  class="form-control" value="'.$row['phonenumber'].'" readonly /> </p>
								</div>
								
							  <!-- end user phone number-->

							  <!-- start user county-->

							  <div class="form-group">
							  <label for="county"><span class="req">
								</span> County  <small>
								</small> </label> 
								<input class="form-control" type="text" name="county" value="'.$row['county'].' "   readonly /> 
								<div id="errLast"></div>
							</div>

							<!-- end user county -->

							<!-- start user password-->

							<div class="form-group">
							<label for="password"><span class="req">
							</span> Change Password: </label>
							<input name="password" type="password"  class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" /> </p>
							<label for="password"><span class="req">
							</span> Confirm Password: </label>
							<input  name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Enter again to validate"  id="pass2"  onKeyUp="checkPass(); return false;" />
							<span id="confirmMessage" class="confirmMessage"></span>
						  </div>
			  

							  <div class="form-group">
								<hr>
								<div class="form-group"> 
								<button class="btn btn-success"  name="submit" type="submit" value="Upload"> Update </button><!--style ="padding:8px;border:thin solid #ffffff;border-radius:5px; background-color:#6BBD6B;min-width:190px;max-height:40px;"> <a href="reg-submit-reg.php"  style="font-size:17px;color:#ffffff;">Register</a></button>-->
									
								
								</div> 
							  </div>
							</div> 
						</div> 
						 
					  </div>
						
						
							  </fieldset>
							</form> 
						 </div>

						 
						  '; 
					 } 
					 else
					 {
							  echo'
							  <div class="col-sm-6 col-xs-12">
								<div style="color:#800000;font-size:22px;font-family:Sans Serrif;margin-top:20px;">
								No Profile picture, you need to add one
								</div>
								</div>';
					 }    
			 }
						 else
						 {
								 echo 'error in query';
						 }
			} 
			
		  ?>
			<script type="text/js">

			</script>
		  <!--end of querry-->
</div>
    
</body>

<script src="js/validate.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 

</html>