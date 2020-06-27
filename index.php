<?php
require_once('functions.php');
?>
<html>
<head>
<title>Kazikwetu</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/textbox.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
</style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid" >
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Kazikwetu</a>
    </div>
			<ul class="nav navbar-nav">
			  <li class="active"><a href="index.php" style="color:fff">Home</a></li>
			  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Portal <span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="signup.php">Expert</a></li>
				  <li><a href="login_user.php" >Looking for expert</a></li>
				</ul>
			  </li>
			  <li><a href="contact.php">Contact us</a></li>
			</ul>
							  <ul class="nav navbar-nav navbar-right">
							  <li><a href="signup_user.php" ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
							  <li><a href="login_user.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
             </ul>
  </div>
</nav>
  
	<div class="container" id="bootstrap-override">
					<div class="row">
				  <div class="column">
					<img src="assets/img11.jpg" alt="Snow" style="width:100%">
				  </div>
				  <div class="column">
					<img src="assets/img3.jpg" alt="Forest" style="width:100%">
				  </div>
				  <div class="column">
					<img class="img-responsive" src="assets/img4.jpg" alt="Mountains" style="width:100%">
				  </div>
<div>
<a href="login_user.php" ><button type="button"class="btn btn-primary" style="width:100px !important">Login</button></a>
<a href="signup_user.php"><button type="button" class="btn btn-danger" style="width:100px !important">Sign up</button></a>
</div>
</div>
<br>
<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="gradient-border" id="box" style="text-align: justify;padding:10px;">
You are here probably because you have been looking for a job for quite sometime or you have heard about us and you have
 something that's bothering you and in need of an expert. Dont worry whichever one of these people you are,
  we GATCHU! If you are an expert in a given field, signup as an expert afterwhich you'll be vetted by one of us 
	to join our database of experts.We will link you up with your potential clients. Cheers
</h4>
</div>
<div class="col-xs-6">
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
     <!-- </form>-->
      
</div>
<div class="row" id="action_place" > 
      
      </div>
	  <div class="row" id="action_place2" > 
      
      </div>


	  
</div>



<div class="col-md-12 col-xs-12">
	  <div class="modal-footer">
<h5 class="text-primary">This site has been built by Brian murithi &copy; 2020 </h5>
</div>
	  </div>
	  </div>

</hr>
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
				open_module2();
  
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
					$("#action_place2").html(apiResult)
				},function(){
					$("#action_place2").html("failed!!");
				})  
  
}
</script>

<!-- <script src="js/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- <script src="js/bootstrap.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</body>
</html>







