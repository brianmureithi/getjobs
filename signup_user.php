<?php require_once ("./functions.php");?>
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
				      <li><a href="login_user.php?expert_id=0">Client</a></li>
				      <li><a href="login.php" >Expert</a></li>
				    </ul>
			    </li>
			    <li><a href="contact.php">Contact us</a></li>
			  </ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="signup_user.php"  class="active"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="login_user.php?expert_id=0"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
        </div>
      </div> 
    </nav>
  
	  <div class="container">
      <form action="userssignup_exec.php" method="post" id="fileform" role="form" enctype="multipart/form-data">
        <fieldset>
          <div class="container-fluid">
	        <div class="row"> 
            <div class="col-md-6 col-xs-12">
              <legend class="text-center" style="font-family:Roboto;font-size:25px;color:#8b0000">Users signup, 
              <span class="req">welcome to our community</span>
              </legend>  
              <!-- <div class="form-group">
              <label for="phonenumber"><span class="req">* </span> Phone Number: </label>
              <input required type="text" name="phonenumber" id="phone" class="form-control phone" maxlength="28" onkeyup="validatephone(this);" placeholder="not used for marketing"/>
      
              </div>  -->
            <div class="form-group"> 
              <label for="firstname"><span class="req"> </span> First Name: </label>
              <input class="form-control" type="text" name="firstname" id="txt" placeholder="first name" onkeyup="Validate(this)" required />
              <div id="errFirst">
              </div> 
            </div> 
      
            <div class="form-group">
              <label for="lastname" ><span class="req"> </span> Last Name: </label>
              <input class="form-control" type="text" name="lastname" id="txt" onkeyup="Validate(this)" placeholder="last name" required />
              <div id="errLast"> 
              </div>
      
            </div> 
	          <div class="form-group">
		          <label for="email"><span class="req"> </span>   Email Address: </label> 
		          <input class="form-control" required type="text" name="email" placeholder="email address" 	id = "email"  onchange="email_validate(this.value);" />   
              <div class="status" id="status">
              </div>
            </div>
			      <div class="form-group">
              <label for="phonenumber"><span class="req"> </span>
			        Phone Number: </label>
              <input required type="text" name="phonenumber"id="phone" class="form-control phone" maxlength="28"onKeyUp="validatephone(this);" placeholder="phone number"/> 
            </div>
	  
	          <div class="form-group">
              <label for="password"><span class="req">
              </span> Enter your profile photo: </label>
              <input type="file" name="profile" class="form-control"/>
              <span id="profile" placeholder="used for your profile" ></span>
            </div>
      
       

        
        </div><!-- ends col-6 --> 
        <br><br><br>		
        <div class="col-md-6 col-xs-12">
        
            <div class="form-group">
              <label for="username"><span class="req">
	            </span> Id Number:  <small> </small> </label> 
		          <input class="form-control" type="text" name="idnumber"id = "tt" onkeyup = ""  placeholder="identification number for credibility" required />  
              <div id="errLast"></div>
            </div>
			      <div class="form-group">
              <label for="username"><span class="req">
	            </span> County  <small>
	            </small> </label> 
	            <select class="form-control" id="exampleSelect1" name="county"> <?php Kazikwetu::getcounties();?></select>
	            <div id="errLast"></div>
            </div>
			

            <div class="form-group">
              <label for="password"><span class="req">
              </span> Password: </label>
              <input required name="password" type="password"  class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" /> </p>
              <label for="password"><span class="req">
              </span> Password Confirm: </label>
              <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Enter again to validate"  id="pass2"  onKeyUp="checkPass(); return false;" />
              <span id="confirmMessage" class="confirmMessage"></span>
            </div>

            <div class="form-group">
            <?php //$date_entered = date('m/d/Y H:i:s'); ?>
              <input type="hidden" value="<?php //echo $date_entered; ?>" name="dateregistered">
              <input type="hidden" value="0" name="activate" />
              <hr>
              <div class="form-group"> 
              <button class="btn btn-success"  name="submit" type="submit" value="Upload"> Register </button><!--style ="padding:8px;border:thin solid #ffffff;border-radius:5px; background-color:#6BBD6B;min-width:190px;max-height:40px;"> <a href="reg-submit-reg.php"  style="font-size:17px;color:#ffffff;">Register</a></button>-->
                      <!-- <input class="btn btn-success" type="submit_reg" name="submit" 
                            value="Register">-->
              </div> 
            </div>
          </div> 
      </div> 
       
    </div>
      
      
            </fieldset>
          </form> 
          <script type="text/javascript">
          document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions"); 
       
          </script>
	
	  <div class="row">
	    <div class="modal-footer col-xs-12">
        <h5 class="text-primary">This site has been built by Brian Murithi and Kenneth Kimari &copy; 2020</h5>
      </div>
	  </div>
	
	</div>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>

	
	</body>
</html>