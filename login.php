<html>
	<head>
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
			  		<li><a href="index.php" style="color:fff">Home</a></li>
			  		<li  class="active" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="login.php">Portal <span class="caret"></span></a>
						<ul class="dropdown-menu">
				  			<li><a href="login_user.php">Client</a></li>
				  			<li><a href="login.php" >Expert</a></li>
						</ul>
			  		</li>
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
			<div class="row vertical-offset-100">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default">
							<div class="panel-heading"> 
								<h3 class="panel-title" style="padding-left:6px; padding-top:5px; font-family:Roboto;font-size:22px;"><center>Please Login Below</center></h3>
								<hr style="color:#000000"/>
							</div>
							<div class="panel-body"> 
								<form action="login_exec.php" accept-charset="UTF-8"  role="form" enctype="multipart/form-data" method="POST">
									<fieldset>
										<div class="form-group"> 
											<input class="form-control" placeholder="E-mail" name="email" type="text">
										</div>
															
										<div class="form-group">
											<input class="form-control" placeholder="Password" name="password" type="password">
										</div>
																
										<div class="checkbox">
											<label>
												<input name="remember" type="checkbox" value="Remember Me"> Remember Me
											</label>
										</div>
															
										<input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login"> <br>
												
										<a href="signup.php"><button type="button" class="btn btn-lg btn-danger btn-block"> Sign up</button></a>
									</fieldset> 
								</form>
							</div>
    
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
		<div class="row" > 
	  		<div class="modal-footer col-xs-12">
				<h5 class="text-primary" style="float">This site has been built by Brian Murithi and Kenneth Kimari &copy; 2020</h5>
			</div>
	  	</div>
	  
   		 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="js/jquery.min.js"></script>
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
		<script src="js/bootstrap.min.js"></script>
	
	
	
	
	</body>
</html>