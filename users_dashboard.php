<html>
	<?php require_once('functions.php');?>
	<head>
		<?php include "session.php";
      	require_once("./functions.php");?>
		<title>Kazikwetu</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/styledash.css"/>
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
			  			<li  class="active" ><a href="users_dashboard.php" style="color:fff">Dashboard</a></li>
			  			<li><a href="users_logout.php">Logout</a></li>
			  			<li><a href="contact.php">Contact us</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="signup_user.php"  class="active"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li class="active"><a href="login-user.php?expert_id=0"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
				</div>
  			</div>
		</nav>
  
  
  
 
		<div class="container">
		<div class="row">
			<div class="col-md-3 col-xs-12">
				<aside class="comments" style="border:smooth 10px #000;">
	 
							<?php Kazikwetu::getprofilepicture($_SESSION['id'])   ?>
					<h5><u>Welcome <?php echo$_SESSION['firstname'];?></u></h5><hr>
					<a href="users_job_hist.php?user_id= <?php echo$_SESSION['id'];?>" ><button style="min-width:180px !important;
						max-width:180px !important;"class="btn btn-lg btn-primary" 
						 value="" name="seejobs"> <h5 class="text-uppercase">See all your jobs</h5></button></a>
					<a href="users_done_jobs.php?user_id= <?php echo$_SESSION['id'];?>" ><button style="min-width:180px !important;
						margin-top:5px; max-width:180px !important;"class="btn btn-lg btn-danger" 
						  value="" name="seejobs"> <h5 class="text-uppercase">Check done jobs</h5></button></a>
				</aside>
			</div>
	
	
	
						
			<div class="col-md-9 col-xs-12" style="border:groove 1px #000">
				<fieldset>
					<legend class="text-center" style="font-family:Roboto;font-size:20px;color:#8b0000">Welcome what kind
					of expert are you looking for? Tell us the type and county you would like.
    				<span class="req"></span></legend>  
					<div class="col-xs-12">
						<div class=" well search-icon form-group">
							<label for="sel1" style="margin-right:15px">Expert: </label> 
							<select class="form-control" id="sel1" name="expert" onchange="open_module();" style="min-width:200px !important;min-height:30px;">
								<?php  Kazikwetu::getexpertise();?>
                  			</select>
				  		</div>
						<div class=" well search-icon form-group">
		  					<label for="sel1">Location: </label> 
							<select class="form-control" id="sel2" name="expert" onchange="open_module();" style="min-width:200px!important;min-height:30px;">
								<?php  Kazikwetu::getcounties();?>
		  					</select>
		  				</div>
		  				<hr/>
		  				<div>
      						<div class="form-group">
                 				<a class="btn btn-success" style="width:90px;margin-right:10px" type="submit" onclick="open_module();" name="search_car" value="search"  value="Search">Search</a>
          						<a class="btn btn-primary" style="width:90px" type="submit" onclick="open_module2();" name="lastseen" value="last seen" >Last seen</a>
				 			</div>      
					</div>	
					<div class="row" id="action_place" > 
      
      				</div>		
	
				</fieldset>
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
		<div class="container-fluid">
		<div class="row">
		<div class="col-xs-12"> 
	  		<div class="modal-footer">
				<h5 class="text-primary" style="float">This site has been built by Brian Murithi and Kenneth Kimari &copy; 2020</h5>
			</div>
	  	</div>
		</div>
		</div>
		<script type="text/javascript" src="js/smartjax.min.js"></script>     
<script type="text/javascript"> 
function open_module(){  

  var expert = document.getElementById("sel1").value;
  var county = document.getElementById("sel2").value;   
  var path = 'search_results.php?expertise=' + expert + '&county=' + county;
 // alert(home_location + ' ' + home_type + ' ' + home_price); 
  $("#action_place").html("Loading, please wait...");
				var promise=Smartjax.ajax({
					url: path,
					data:{ },
					type: 'POST',
					force:true,
					store: false,
				});
				promise.then(function (apiResult) {
					$("#action_place").html(apiResult)
				},function(){
					$("#action_place").html("failed!!");
				})  
	
  
}
</script>
<script type="text/javascript"> 
function open_module2(){  

  var expert = document.getElementById("sel1").value;
  var county = document.getElementById("sel2").value; 
  var path = 'search_results2.php?expertise=' + expert + '&county=' + county;
 // alert(home_location + ' ' + home_type + ' ' + home_price); 
  $("#action_place2").html("Loading, please wait...");
				var promise=Smartjax.ajax({
					url: path,
					data:{ },
					type: 'POST',
					force:true,
					store: false,
				});
				promise.then(function (apiResult) {
					$("#action_place").html(apiResult)
				},function(){
					$("#action_place").html("failed!!");
				})  
  
}
</script>
	

		 
									<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
									<script src="js/jquery.min.js"></script>
									<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
							  		<script src="js/bootstrap.min.js"></script>
	
	
	
	
	
	
	</body>
</html>