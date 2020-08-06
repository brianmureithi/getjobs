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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.js"/>
 
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

   <div class="row" > 
    
			<div class="modal-footer col-xs-12">
				<h5 class="text-primary " style="float">This site has been built by Brian Murithi and Kenneth Kimari &copy; 2020</h5>
			</div>
		</div>

    </div>
     <!--The popup form-->
    <section class="modal popup2">
      <div class="modal-dialog " >
        <div class="modal-content" style="background-color: #F0F1F2;color: #2E4052;">
            <div class="modal-header">
            <h5 class="modal-title" style="font-family:candara;text-align:center;color:#49872E;font-size:20px;"> Job Reassign</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="esc" aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form class="form_submit_update">
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
                <div class="form-group">
                    <input type="text"  id="jobid" name="jobid" value="" readonly class= "form-control jobid">
                </div>
                <div class="row" id="action_place" > 
      
      		    	</div>
              
                    <div class="form-group" align="center">
                      <button type="button" class="btn btn-success submit">Submit</button>
                    </div>
            </form>
            </div>
            
        </div>
      </div>
</section>
<!---end of form-->
    
   
</body>


 <!--<script type="text/javascript" src="js/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="js/smartjax.min.js"></script> 
  <script src="https://cdn.jsdelivr.net/gh/vast-engineering/jquery-popup-overlay@2/jquery.popupoverlay.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
  <script src="js/bootstrap.min.js"></script>  
  <script>
   $(document).ready(function($) {
     $("#table tr").click(function(){
       $(this).addClass('selected').siblings().removeClass('selected');
       var value=$(this).find('td:first').text();
       $("#jobid").val(value);
      // alert(value);
      
     });
     $('.reassign').on('click',function(e){
      // alert($("#table tr.selected td:first").html());
     });
  

$('.reassign').click(function(e) {
         $('.popup2').popup(
     {
         autoopen: true,
       escape: true,
       blur: false,
       scrolllock: true,
       transition: 'all 0.3s'
     });
 });

     $('.esc').click(function(e) {
         $('.popup2').popup('hide');
     });

     
     
     $('.submit').click(function(e) {
     var $form = $(this).closest(".form_submit_update");
     var formData =  $form.serializeArray();
     var jobid =  $form.find(".jobid").val();
     var newexpert =  $form.find(".newexpert").val();
     
     
     if ((jobid!="")&& (newexpert!="")){

       $.ajax({  
                     type: "POST",  
                     url: "reassign_exec.php",  
                     data: formData,
                  
                    success: function(html) {
                      swal({


                      });
                      
                         
                         if (html==1) {
                             $('.popup2').popup('hide');

                             localStorage.setItem("swal",swal({
                              title:"Successfully Reassigned",
                              text:"Wait for response from your new expert",
                              type:"success",
                              showConfirmButton:true}).then(function(){
                                window.location.reload();
                              })
                             );
                             localStorage.getItem("swal")
                            // swal('Successfully Reassigned!', 'Wait for response from your new expert','success');
                           
                             
                              $(".jobid").val("");
                              $(".newexpert").val("");
                                            
                         }
                         else if(html==0){
                          $('.popup2').popup('hide');
                          localStorage.setItem("swal",swal({
                              title:"Failed!",
                              text:"Your job is either pending,accpeted or has been completed",
                              type:"error",
                              showConfirmButton:true}).then(function(){
                                window.location.reload();
                              })
                             );
                             localStorage.getItem("swal")
                            // swal('Failed!', 'Your job is either pending,accpeted or has been completed','error');
                            
                             
                              $(".jobid").val("");
                              $(".newexpert").val("");
                         }
                        
                     }
                 });

       
     }else {
       alert("Please fill all the fields!");
     }
     
     });
         
 });
 function open_module(){  

var expert = document.getElementById("sel1").value;
var county = document.getElementById("sel2").value;   
var path = 'reassign_results.php?expertise=' + expert + '&county=' + county;
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
 
   
</html>							
								