<html>
<head>
<?php include "session.php";
include "work_submit_exec.php";

      require_once("./functions.php");?>
<title>Kazikwetu</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<script src="js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</style>
<link rel="stylesheet" type="text/css" href="css/styledash.css"/>
<style>
 @media screen and (max-width: 960px) {…} 
@media screen and (min-width: 961px) and (max-width: 1024px) {…} 
@media screen and (min-width: 1025px) and (max-width: 1280px) {…}
 @media screen and (min-width: 1281px) {…} 
 </style>
 
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid" style="background-color:#B22222 !important">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php" style="color:#fff;font-family:Roboto">Kazikwetu</a>
    </div>
			<ul class="nav navbar-nav">
			  <li  class="active" ><a href="Dashboar.php" style="color:fff">Dashboard</a></li>
			  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="experts_logout.php">Logout <span class="caret"></span></a>
				<ul class="dropdown-menu">
				 
				</ul>
			  </li>
			  <li><a href="contact.php">Contact us</a></li>
			</ul>
							  <ul class="nav navbar-nav navbar-right">
							  <li><a href="signup.php"  class="active"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
							  <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
             </ul>
  </div>
</nav>
  
  
  
  

	<div class="container">
	<div class="col-xs-3">
	 <aside class="comments" style="border:smooth 10px #000">
	 
							<?php 
									if (empty($_SESSION['prof_pic']) === false)
									{
											  echo '<div class="">
											  <div class="">
											  <img style="height:150px!important;"src="',$_SESSION['prof_pic'],'" alt=" ', $_SESSION['firstname'],'\'s Profile Image">
											  </div>
											  </div>';
									}
											else{ 
													echo'<div class="">
													 <div class="thumbnail">
													<a href="update-profile"><img src="images/profile/user.png" alt="profile" style="width:100%;"></a>
													 </div>
													</div>';
												}
			               ?>
						   
							
							
							<h5><u>Welcome <?php echo$_SESSION['firstname'];?></u></h5>
	
	 </aside> 
	
	</div>
	
	
	<div class="content" style="border:groove 1px #000">
	<h5 style="padding:5px">Current Works</h5>

   	<?php Kazikwetu::getsentjobs($_SESSION['id'])?>
 </div> 
	
	
	
	
	
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div class="col-md-12 col-xs-12" > 
	  <div class="modal-footer">
<h5 class="text-primary" style="float">This site has been built by Brian murithi &copy; 2020</h5>
</div>
	  </div>
	
	
	
	
	
	
	 </body>
	 </html>