<html>
<head>
<?php include "session.php";
include "work_submit_exec.php";

      require_once("./functions.php");?>
<title>Kazikwetu</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/styledash.css"/>
<!-- <style>
 @media screen and (max-width: 960px) {…} 
 @media screen and (min-width: 961px) and (max-width: 1024px) {…} 
 @media screen and (min-width: 1025px) and (max-width: 1280px) {…}
 @media screen and (min-width: 1281px) {…}
</style> -->
 
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
			  			<li  class="active" ><a href="Dashboard.php" style="color:fff">Dashboard</a></li>
			  			<li><a href="experts_logout.php">Logout</a></li>
			  			<li><a href="contact.php">Contact us</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="signup.php"  class="active"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
             		</ul>
				</div>
  			</div>
		</nav>
  
  
  
  

		<div class="container">
		<div class="row">
			<div class="col-md-3 col-xs-12">
	 			<aside class="comments" style="border:smooth 10px #000">
	 
							<?php Kazikwetu::getexpertprofilepicture($_SESSION['id'])    ?>
						   
							
							
					<h5><u>Welcome <?php echo$_SESSION['firstname'];?></u></h5>
	
	 			</aside> 
	
			</div>
	
			<div class="col-md-9 col-xs-12">
			<div class="content" style="border:ridge 2px">
				<h2 style="font-family:candara;text-align:center;color:#49872E">All your Works</h2>

   				<?php Kazikwetu::getsentjobs($_SESSION['id'])?>
 			</div>
			</div> 
	
		</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="container-fluid" > 
		<div class="row">
		<div class="col-xs-12">
	  		<div class="modal-footer">
				<h5 class="text-primary" style="float">This site has been built by Brian Murithi and Kenneth Kimari&copy; 2020</h5>
			</div>
		</div>
		</div>
	  	</div>
 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="js/jquery.min.js"></script>
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
		<script src="js/bootstrap.min.js"></script>
	
	
	
	
	</body>
</html>