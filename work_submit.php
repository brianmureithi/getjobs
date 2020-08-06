<?php require_once ("./functions.php");
$userid=$_GET['userid'];


require("session.php");
 $expertid=$_SESSION['id']
?>
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
						<li class="active"><a href="signup.php"  class="active"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </div> 
    </nav>

    	  <div class="container">
          <h2 style="font-family:candara;text-align:center;color:#49872E"><u>Carefully go through the work before approving or declining as it can only be done once</u></h2>
	<hr>

       
        <?php Kazikwetu::getuserin_expertjobs($_GET['userid'], $_SESSION['id']);
      
       ?>
       <form style="border:ridge 2px;" action="sendwork_exec.php?userid=<?php echo $_GET['workid'];?>&workid=<?php echo $_GET['workid'];?>" method="post" id="fileform" role="form" enctype="multipart/form-data">
        <fieldset>
        <div class="container-fluid">
      <div class="row"> 
        <div class="col-md-6 col-xs-12">
          <legend class="text-center"><h4 style="font-weight:700;" >Submit work to:
            <?php
            $workid=$_GET['workid'];
            global $dbhandle;
            $query_search = "select * from works_tbl where work_id = {$workid}";
            $query_exec = mysqli_query($dbhandle,$query_search)or die(mysqli_error($dbhandle));
            if(!empty($query_exec))
            {
            if(mysqli_num_rows($query_exec)>0){
            while($row = mysqli_fetch_array($query_exec))
            echo '
            <h4 style="color:	#228B22">'.$row['user_fname'].' '.$row['user_lname'].'</h4>
            '; 
           }
               else
               {
                  echo'<h5 style="font-family:Roboto; font-size:16px;color:#DC143C;">No name for this user</h5>';
               }    
             }
               else
               {
                   echo 'error in query';
               }?></h4></legend> 

            <div class="form-group">
				        <label for="exampleSelect1">Current Job status:</label>
				        <input class="form-control" id="exampleSelect1" style="color:	#8B0000;text-align:left" readonly name="status" value="<?php echo getstatus();?>"/>
              </div>
              
              <div class="form-group">
				        <label for="exampleSelect1">Job Subject</label>
				        <input class="form-control" id="exampleSelect1" style="color:	#8B0000;" readonly name="subject" value="<?php echo getsubject();?>"/>
              </div>
             
    
	            <div class="form-group">
		            <label for="email"><span class="req"> </span>   Email Address: </label> 
                <input class="form-control" required type="text" style="color:#008B8B;"readonly name="email" placeholder="" value="<?php 
                echo$_SESSION['email']; ?>"	id = "email" 
                  onchange="email_validate(this.value);" />   
                <div class="status" id="status"></div>
              </div>
			        <div class="form-group">
                <label for="phonenumber"><span class="req"> </span>
			            Phone Number: </label>
                <input required type="text" name="phonenumber"id="phone"  style="color:#008B8B;"readonly
                class="form-control phone" maxlength="28"
                onKeyUp="validatephone(this);" value="<?php echo$_SESSION['phonenumber']; ?>"placeholder="phone number"/> 
              </div>
           
              <?php
              function getstatus(){
                $workid=$_GET['workid'];
                global $dbhandle;
                $query_search = "select * from works_tbl where work_id = {$workid}";
                $query_exec = mysqli_query($dbhandle,$query_search)or die(mysqli_error($dbhandle));
                if(!empty($query_exec))
                {
                    if(mysqli_num_rows($query_exec)>0){
                      while($row = mysqli_fetch_array($query_exec))
                        echo '
                      ' .$row['jobstatus'].'';
        
           
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
               <?php
                function getsubject(){
                    $workid=$_GET['workid'];
                  global $dbhandle;
                  $query_search = "select * from works_tbl where work_id = {$workid}";
                  $query_exec = mysqli_query($dbhandle,$query_search)or die(mysqli_error($dbhandle));
                  if(!empty($query_exec))
                  {
                      if(mysqli_num_rows($query_exec)>0){
                        while($row = mysqli_fetch_array($query_exec))
                          echo '
                        ' .$row['jobsubject'].' ';
          
             
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
               
			        <div class="form-group">
		            <label for="id"><span class="req"> </span>   User id: </label> 
                  <input class="form-control" required type="text" style="color:	#8B0000;"readonly name="userid" placeholder="" 
                  value="<?php echo getuserid(); ?>"	 />   
                <div class="status" id="status"></div>
              </div>
              <?php
              function getuserid(){
                    $workid=$_GET['workid'];
                  global $dbhandle;
                  $query_search = "select * from works_tbl where work_id = {$workid}";
                  $query_exec = mysqli_query($dbhandle,$query_search)or die(mysqli_error($dbhandle));
                  if(!empty($query_exec))
                  {
                      if(mysqli_num_rows($query_exec)>0){
                        while($row = mysqli_fetch_array($query_exec))
                          echo '
                        ' .$row['users_id'].' ';
          
             
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
	  
	  
        
       

        
        </div><!-- ends col-6 --> 
        <br>
        <br><br><br/>
        <div class="col-md-6 col-xs-12">
         <div class="form-group" style="">
          <label for="files"><span class="req">
          </span> Upload a file if there was any required: </label>
          <input type="file" name="myfile" class="form-control"/>
          <span id="myfile" placeholder="file of any type is supported in our site" ></span>
         </div>

         <div class="form-group" >
          <textarea placeholder="Kindly enter any extra details you would like to communicate to your client" rows="10" class="form-control" style="border:thin solid #000000;"name="message" ></textarea>
         </div>
            
        
      
         <div class="form-group"> 
           <button class="btn btn-lg btn-success"  name="submit" type="submit" value="send" style="min-width:200px; "> Send </button><!--style ="padding:8px;border:thin solid #ffffff;border-radius:5px; background-color:#6BBD6B;min-width:190px;max-height:40px;"> <a href="reg-submit-reg.php"  style="font-size:17px;color:#ffffff;">Register</a></button>-->
        
         </div>
               


    </div>
    </div>
    </div>
      
        </fieldset>
       </form> 
       <div class="row">
	  			<div class="modal-footer col-xs-12">
					<h5 class="text-primary">This site has been built by Brian Murithi and Kenneth Kimari &copy; 2020 </h5>
				</div>
	  		</div>
   </body>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="js/jquery.min.js"></script>
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
		<script src="js/bootstrap.min.js"></script>
	
   
   </html>
   
       
      