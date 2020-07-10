<html>
<head>
<title>Kazikwetu</title>
<title>Kazikwetu</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
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
									<li><a href="login_user.php?expert_id='null'">Client</a></li>
									<li><a href="login.php" >Expert</a></li>
								</ul>
				</li>
			 <li class="active"><a href="contact.php">Contact us</a></li>
	</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="signup_user.php" ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li><a href="login_user.php?expert_id='null'"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
         </ul>
  </div>
	</div>
</nav>
<div class="container">
		<div class="col-md-8 contact-left cont">
				<div class="contct-info">
					<h2 style="font-family:candara;text-align:center;color:#49872E">Contact us</h2>
					<form action="contact-exec.php" method="post">
						<div class="row">
								<div class="col-md-6 row-grid">
										<input type="text" name="name"  style="border:thin solid #000000;" placeholder="Your Name" required>
								</div>
								<div class="col-md-6 row-grid">
										<input type="text" name="email"  style="border:thin solid #000000;"placeholder="Email address" required>
								</div>
									<div class="clearfix"></div>
						</div>
						
						<div class="row">
								<div class="col-md-6 row-grid">
								  	<input type="text" name="subject" style="border:thin solid #000000;" placeholder="Subject" required>
								</div>
							
								<div class="col-md-6 row-grid">
										<input type="text" name="phonenumber"  style="border:thin solid #000000;" placeholder="Phone number" required>
								</div>
									<div class="clearfix"></div>
						</div>
							<textarea placeholder="Message"  style="border:thin solid #000000;"name="message" ></textarea>
								
						<input type="submit" value="Submit" name="submit" mailto="brianmurithi65@mail.com" >
					
						<input type="reset" value="Clear" >
			</form>
		
			</div>
			</div> <!-- end of form-->

					 <div class="col-md-4 contact-left">
							<div class="contct-info" style="color:#000000">
									<h2 style="font-family:candara;text-align:center;color:#49872E">Contact Info</h2>
							
									<h5 class="text-justify"style="font-family:Calibri;padding:5px;font-size:19px;">
											Welcome to Kazikwetu, a community to serve us. We are happy to have you around.
									</h5>
					<ul >
							<li><h3 style="color:#000000;font-family:Candara;font-size:20px;">Phone: </h3><a href="Tel:0768938573"><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i> +254 768 938 573</a></li>
							<li><h3 style="color:#000000;font-family:Candara;font-size:20px;">Location: </h3><a href=""><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i> Nairobi Kenya.</a></li>
							<li><h3 style="color:#000000;font-family:Candara;font-size:20px;">Email: </h3><a href="mailto:kazikwetu.ke@gmail.com" ><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i> <u style="color:#228b22;">kazikwetu.ke@gmail.com</u></a></li>
					</ul>
					</div>
					</div>
					</div>
					<br>
					<br>
					<br>
					<br>
          
					<hr class="success">
          <div class=" col-xs-12">
	 		 <div class="modal-footer">
					<h5 class="text-primary">This site has been built by Brian Murithi and Kenneth Kimari &copy; 2020 </h5>
				</div>
  </div>
</body>
							  	<script src="js/bootstrap.min.js"></script>
									<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
									<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
									<script src="js/jquery.min.js"></script>
	
</html>