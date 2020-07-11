<html>
 <?php require_once("./functions.php");
      require("session.php");
     // $workid= $_REQUEST['work_id'];

       function getstatus()
	 { 
             global $dbhandle;
             $workid="SELECT  work_id FROM works_tbl";
			 $sql = mysqli_query($dbhandle,"SELECT work_id FROM works_tbl WHERE work_id=(SELECT work_id from jobsdone
             WHERE work_id=1 )   LIMIT 1");
            
              $data_match=mysqli_num_rows($sql);//count the output 
              if($data_match>0){
              
              $sql2= "INSERT INTO works_tbl(status) values('job done')";}
              else{
                $sql2= "INSERT INTO works_tbl(status) values('job not done')";
              }
            
            }
             
              
			
	
				
    
      $userid=$_GET['user_id'];
      $_SESSION['id']=$userid ?>
<title>Kazikwetu</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/styledash.css"/>
<script src="js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
</style>
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
					<li class="active"><a href="login_user.php?expert_id=0"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </div>
  </nav>
  
  
  
 
	<div class="container">
    <?php Kazikwetu::getuserjobs($_SESSION['id']);
     ?>
   

    </div>
</body>
</html>