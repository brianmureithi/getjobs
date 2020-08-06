<?php

require_once ("./dbcon.php");


   class Kazikwetu{
     
     public static function getcounties()
	 {
		 global $dbhandle;
		 $query_search = 'select * from counties';
     $query_exec = mysqli_query($dbhandle,$query_search);
     if(!empty($query_exec))
		{
			if(mysqli_num_rows($query_exec)>0)
			 {
			 while($row = mysqli_fetch_array($query_exec))
			 echo'<option  value="'.$row['county'].'">'.$row["county"]. '</option>'; 
			 }
			 else
				{
						   
						    echo'
							<div style="color:#DC143C;font-size:22px;font-family:Sans Serrif;margin-top:20px;">
                          <div class="col-md-6">
						   No counties to display 
						   </div>
						   </div>';
				}    
		}
				 else
				 {
				   echo 'error in query';
				   
				 }
     }
	  public static function getexpertise()
	 {
		  global $dbhandle;
		 $query_search = 'select * from expertise';
     $query_exec = mysqli_query($dbhandle,$query_search);
     if(!empty($query_exec))
		{
			if(mysqli_num_rows($query_exec)>0)
			 {
			 while($row = mysqli_fetch_array($query_exec))
			 echo'<option  value="'.$row['expertise'].'">'.$row["expertise"]. '</option>'; 
			 }
			 else
				{
						   
						    echo'
							<div style="color:#DC143C;font-size:16px;font-family:Sans Serrif;margin-top:20px;">
                          <div class="col-md-6">
						   No experts available
						   </div>
						   </div>';
				}    
		}
				 else
				 {
				   echo 'error in query';
				   
				 }
     }
	 public static function listexperts($expertise,$county)
	  { 
			 global $dbhandle;
			 $query_search = "select * from expert_tbl where expertise = '".$expertise."' and county = '".$county."'";
			 $query_exec = mysqli_query($dbhandle,$query_search)or die(mysqli_error($dbhandle));
					if(!empty($query_exec))
					{
						 if(mysqli_num_rows($query_exec)>0){
						 while($row = mysqli_fetch_array($query_exec))
						 echo ' <div class="col-xs-12" >
						 <tr>
						  
  	<td><a href="login_user.php?expert_id='.$row["expert_id"].'"><h5 style="font-family:Roboto; font-size:15px;color:#000000;">'.$row['firstname'].' '.$row['lastname'].'</h5></a></td>
       <td><h5 style="font-family:Roboto; font-size:15px;color:#000000;">'.$row['county'].'</h5></td>
		<td><h5 style="font-family:Roboto; font-size:15px;color:#000000;">+254'.$row['phonenumber'].'</h5></td>
	 </tr>
		 </div>'; 
						}
							else
							{
							   echo'<h5 style="font-family:Roboto; font-size:16px;color:#DC143C;">Sorry no Experts available under the specifications provided</h5>';
							}    
					}
							else
							{
								echo 'error in query';
							}
	 }  
	 //Listing clients in dashboard, we dont want users to login again
	 public static function listexpertsdashboard($expertise,$county)
	  { 
			 global $dbhandle;
			 $query_search = "select * from expert_tbl where expertise = '".$expertise."' and county = '".$county."'";
			 $query_exec = mysqli_query($dbhandle,$query_search)or die(mysqli_error($dbhandle));
					if(!empty($query_exec))
					{
						 if(mysqli_num_rows($query_exec)>0){
						 while($row = mysqli_fetch_array($query_exec))
						 echo ' <div class="col-xs-12" >
						 <tr>
						  
  	<td><a href="work_submission.php?expert_id='.$row["expert_id"].'"><h5 style="font-family:Roboto; font-size:15px;color:#000000;">'.$row['firstname'].' '.$row['lastname'].'</h5></a></td>
       <td><h5 style="font-family:Roboto; font-size:15px;color:#000000;">'.$row['county'].'</h5></td>
		<td><h5 style="font-family:Roboto; font-size:15px;color:#000000;">+254'.$row['phonenumber'].'</h5></td>
	 </tr>
		 </div>'; 
						}
							else
							{
							   echo'<h5 style="font-family:Roboto; font-size:16px;color:#DC143C;">Sorry no Experts available under the specifications provided</h5>';
							}    
					}
							else
							{
								echo 'error in query';
							}
	 }  
	 public static function getexpertname($expertid)
	  { 
			 global $dbhandle;
			 $query_search = "select * from expert_tbl where expert_id = '".$expertid."'";
			 $query_exec = mysqli_query($dbhandle,$query_search)or die(mysqli_error($dbhandle));
					if(!empty($query_exec))
					{
						 if(mysqli_num_rows($query_exec)>0){
						 while($row = mysqli_fetch_array($query_exec))
						 echo ' <div class="col-xs-12" >
						 
						  
  	
       <h5 style="font-family:Roboto; font-size:15px;color:#000000;">'.$row['firstname'].' '.$row['lastname'].'</h5></td>
		
	 
		 </div>'; 
						}
							else
							{
							   echo'<h5 style="font-family:Roboto; font-size:16px;color:#DC143C;">No name for this expert</h5>';
							}    
					}
							else
							{
								echo 'error in query';
							}
     }  
	 public static function lastseen($expertise,$county)
	  { 
			 global $dbhandle;
			 $query_search = "select * from loggedin_experts where expertise = '".$expertise."' and county = '".$county."'";
			 $query_exec = mysqli_query($dbhandle,$query_search)or die(mysqli_error($dbhandle));
					if(!empty($query_exec))
					{
						 if(mysqli_num_rows($query_exec)>0){
						 while($row = mysqli_fetch_array($query_exec))
						 echo ' <div class="col-xs-12" >
						 <tr>
						  
  	<td><a href="work_submission.php?expert_id='.$row["expert_id"].'"><h5>'.$row['firstname'].' '.$row['lastname'].'</h5></a></td>
       <td><h5 style="font-family:Roboto; font-size:15px;color:#000000;">'.$row['email'].'</h5></td>
		<td><h5 style="font-family:Roboto; margin-right:90px;font-size:15px;color:#000000;">'.$row['loggedin_date'].'</h5></td>
	 </tr>
		 </div>'; 
						}
							else
							{
							   echo'<h5 style="font-family:Roboto; font-size:16px;color:#DC143C;">Sorry there has not been such an expert online recently</h5>';
							}    
					}
							else
							{
								echo 'error in query';
							}
	 }  
	 public static function getuserjobs($userid)
	 { 
			 global $dbhandle;
			 $query_search = "select * from works_tbl where users_id = {$userid}";
			 
			 $query_exec = mysqli_query($dbhandle,$query_search);
		 if(!empty($query_exec))
		 {
				if(mysqli_num_rows($query_exec)>0)
					{
						 while($row = mysqli_fetch_array($query_exec))
						
						 echo '
						
	<div class="table-responsive">
	<table id="table" class="table table-hover table-striped table-bordered" >
	<thead>
	<th class="text-uppercase" style="color:#000;">job id</th>
	<th class="text-uppercase" style="color:#000;">job sent to</th>
	<th class="text-uppercase" style="color:#000;">file sent</th>
	<th class="text-uppercase" style="color:#000;">Job description</th>
	<th class="text-uppercase" style="color:#000;">Time sent</th>
	<th class="text-uppercase" style="color:#000;">Job status</th>
	</thead>
	<tbody >
	<tr class="success">
	<td><h5 style="padding: 8px; font-family:gadugi; font-size:15px;color:#000000;">'.$row['work_id'].'</h5></td>
	<td><h5 style="padding: 8px; font-family:gadugi; font-size:15px;color:#000000;">'.$row['expertname'].'</h5></td>
	<td><h5 style="padding: 8px; font-family:gadugi; font-size:15px;color:#000000;">'.$row['files_name'].'</h5></td>
	<td><h5 style="padding: 8px; font-family:gadugi; font-size:15px;color:#000000;">'.$row['messages'].'</h5></td>
	<td><h5 style="padding: 8px; font-family:gadugi; font-size:15px;color:#000000;">'.$row['messages'].'</h5></td>
	<td><h5 style="padding: 8px; font-family:gadugi; font-size:15px;color:#000000;">'.$row['time_of_submission'].'</h5></td>
	<td class="danger"><h5 class="status" style="padding: 8px; font-family:gadugi; font-size:14px;color:#D2691E;">'.$row['jobstatus'].'</h5></td>
	<td><button  class="btn btn-success reassign">Reassign job</button></td>
	
	
	</tr>
	

	</tbody>
	</table>
	
	</div>';
	
					} 
						else
							{
								echo'
								 <div class="col-md-6">
						   <div style="color:#000000;font-size:22px;font-family:Calibri;margin-top:20px;">
						   No Work uploaded
						   </div>
						   </div>';
							}    
		}             else
						{
                         echo'
						 <div class="col-md-6">
						   <div style="color:#800000;font-size:22px;font-family:Calibri;margin-top:20px;">
						   Error in Querry
						   </div>
						   </div>';
						
						}
	 }
	 public static function getsentjobs($expertid)
	 { 
				global $dbhandle;
				$query_search = "select * from works_tbl where expert_id = {$expertid}";
				$query_exec = mysqli_query($dbhandle,$query_search);
					   if(!empty($query_exec))
					   {
							if(mysqli_num_rows($query_exec)>0)
							{
									while($row = mysqli_fetch_array($query_exec))
									echo'
									<div class="table-responsive">
	<table class="table table-hover table-striped table-bordered">
	<thead>
	<th class="text-uppercase" style="color:#000;">Sender\'s name</th>
	<th class="text-uppercase" style="color:#000;">Sender\'s Email</th>
	<th class="text-uppercase" style="color:#000;">Work description</th>
	<th class="text-uppercase" style="color:#000;">File Sent</th>
	<th class="text-uppercase" style="color:#000;">Date & time sent</th>
	<th class="text-uppercase" style="color:#000;">Download file</th>
	</thead>
	<tbody >
	<tr class="success">
	<td><a href="work_submit.php?userid='.$row['users_id'].'&workid='.$row['work_id'].'"><h5 style="padding: 8px; font-family:gadugi; font-size:17px;color:#FF8C00;">'.$row['user_fname'].' '.$row['user_lname'].'</h5></td><a>
	<td><h5 style="padding: 8px; font-family:gadugi; font-size:17px;color:#000000;">'.$row['user_email'].'</h5></td>
	<td><h5 style="padding: 8px; font-family:gadugi; font-size:17px;color:#000000;">'.$row['messages'].'</h5></td>
	<td><h5 style="padding: 8px; font-family:gadugi; font-size:17px;color:#000000;">'.$row['files_name'].'</h5></td>
<td><h5 style="padding: 8px; font-family:gadugi; font-size:17px;color:#000000;">'.$row['time_of_submission'].'</h5></td>
<td><a href="work_submit_exec.php?file_id='.$row['work_id'].'"><button class="btn btn-primary">download</button></a></td>
	</tr>

	</tbody>
	</table>
	</div>';		} 
							else
								{
								  echo'
						<div class="col-md-12">
						  <div style="color:#000000;font-size:20px;font-family:Sans Serrif;">
						 Sorry no jobs for you at the moment
						  </div>
						  </div>';
								}    
					}else
						{
					  echo 'error in query';
					  }
					  
		   }
		   //to appear in work submit page
		   public static function getuserin_expertjobs($userid,$expertid)
	 { 
		 $workid=$_GET['workid'];
				global $dbhandle;
				$query_search = "select * from works_tbl where work_id='$workid'  ";
				$query_exec = mysqli_query($dbhandle,$query_search);
					   if(!empty($query_exec))
					   {
							if(mysqli_num_rows($query_exec)>0)
							{
									while($row = mysqli_fetch_array($query_exec))
									echo'	
									<div class="table-responsive">
	<table class="table table-hover table-striped table-bordered">
	<thead>

	<th class="text-uppercase" style="color:#000;">Sender\'s name</th>
	<th class="text-uppercase" style="color:#000;">Sender\'s Email</th>
	<th class="text-uppercase" style="color:#000;">Work description</th>
	<th class="text-uppercase" style="color:#000;">File Sent</th>
	<th class="text-uppercase" style="color:#000;">Date & time sent</th>
	<th class="text-uppercase" style="color:#000;">Download file</th>
	</thead>
	<tbody >
	
	<tr class="success">
	<td><h5 style="padding: 8px; font-family:gadugi; font-size:17px;color:#FF8C00;cursor:pointer">'.$row['user_fname'].' '.$row['user_lname'].'</h5></td>
	<td><h5 style="padding: 8px; font-family:gadugi; font-size:17px;color:#000000;">'.$row['user_email'].'</h5></td>
	<td><h5 style="padding: 8px; font-family:gadugi; font-size:17px;color:#000000;">'.$row['messages'].'</h5></td>
	<td><h5 style="padding: 8px; font-family:gadugi; font-size:17px;color:#000000;">'.$row['files_name'].'</h5></td>
<td><h5 style="padding: 8px; font-family:gadugi; font-size:17px;color:#000000;">'.$row['time_of_submission'].'</h5></td>
 <td><a href="work_submit_exec.php?file_id='.$row['work_id'].'"><button class="btn btn-primary">download</button></a></td>
 <form action="btnaction.php?userid='.$_GET['userid'].'&workid='.$row['work_id'].'" method="post" role="form" enctype="multipart/form-data>
 
 <input name="workid" type="text" value="'.$row['work_id'].'"  >
 <td><button class="btn btn-success" type="submit" name="accept" action="btnaction.php">Accept</button></td>
 <td><button class="btn btn-danger" type="submit" name="decline" action="btnaction.php">Decline</button></td>
 <td><h5 style=" font-family:gadugi; font-size:14px;color:	#D2691E;">'.$row['jobstatus'].'</h5></td>
 <input name="workid" type="text" value="'.$row['work_id'].'" hidden >

</form>
	</tr>

	</tbody>
	</table>
	</div>';		} 
							else
								{
								  echo'
						<div class="col-md-12">
						  <div style="color:#000000;font-size:20px;font-family:Sans Serrif;">
						 Sorry no jobs for you at the moment
						  </div>
						  </div>';
								}    
					}else
						{
					  echo 'error in query';
					  }
					  
		   }


		   public static function getuserdonejobs($userid)
		   { 
				   global $dbhandle;
				   $query_search = "select * from jobsdone where users_id = {$userid}";
				   
				   $query_exec = mysqli_query($dbhandle,$query_search);
			   if(!empty($query_exec))
			   {
					  if(mysqli_num_rows($query_exec)>0)
						  {
							   while($row = mysqli_fetch_array($query_exec))
							  
							   echo '
							  
		  <div class="table-responsive">
		  <table class="table table-hover table-striped table-bordered">
		  <thead>
		  <th class="text-uppercase" style="color:#000;">job id</th>
		  <th class="text-uppercase" style="color:#000;">Expert\'s email</th>
		  <th class="text-uppercase" style="color:#000;">Expert\'s phone</th>
		  <th class="text-uppercase" style="color:#000;">Subject</th>
		  <th class="text-uppercase" style="color:#000;">Message</th>
		  <th class="text-uppercase" style="color:#000;">File sent</th>
		  <th class="text-uppercase" style="color:#000;">Download file</th>
		  <th class="text-uppercase" style="color:#000;">Job status</th>
		  <th class="text-uppercase" style="color:#000;">Time of completion</th>
		  </thead>
		  <tbody >
		  <tr class="success">
		  <td><h5 style="padding: 8px; font-family:gadugi; font-size:15px;color:#000000;">'.$row['work_id'].'</h5></td>
		  <td><h5 style="padding: 8px; font-family:gadugi; font-size:15px;color:#000000;">'.$row['email'].'</h5></td>
		  <td><h5 style="padding: 8px; font-family:gadugi; font-size:15px;color:#000000;">'.$row['phone'].'</h5></td>
		  <td><h5 style="padding: 8px; font-family:gadugi; font-size:15px;color:#000000;">'.$row['jobsubject'].'</h5></td>
		  <td><h5 style="padding: 8px; font-family:gadugi; font-size:15px;color:#000000;">'.$row['messages'].'</h5></td>
		  <td><h5 style="padding: 8px; font-family:gadugi; font-size:15px;color:#000000;">'.$row['files_name'].'</h5></td>
		  <td><a href="work_submit_exec.php?file_id='.$row['work_id'].'"><button class="btn btn-primary">download</button></a></td>
		  <td><h5 style="padding: 8px; font-family:gadugi; font-size:15px;color:	#B22222;background:">'.$row['jobstatus'].'</h5></td>
		  <td><h5 style="padding: 8px; font-family:gadugi; font-size:15px;color:#000000;">'.$row['time_of_submission'].'</h5></td>	 
		  </tr>
		  
	  
		  </tbody>
		  </table>
		  
		  </div>';
		  
						  } 
							  else
								  {
									  echo'
									   <div class="col-md-6">
								 <div style="color:#000000;font-size:22px;font-family:Calibri;margin-top:20px;">
								You do not have any completed works yet
								 </div>
								 </div>';
								  }    
			  }             else
							  {
							   echo'
							   <div class="col-md-6">
								 <div style="color:#800000;font-size:22px;font-family:Calibri;margin-top:20px;">
								 Error in Querry
								 </div>
								 </div>';
							  
							  }
		   }

		   public static function listexpertsinreassign($expertise,$county)
	  { 
			 global $dbhandle;
			 $query_search = "select * from expert_tbl where expertise = '".$expertise."' and county = '".$county."'";
			 $query_exec = mysqli_query($dbhandle,$query_search)or die(mysqli_error($dbhandle));
					if(!empty($query_exec))
					{
						 if(mysqli_num_rows($query_exec)>0){
						 while($row = mysqli_fetch_array($query_exec))
						 
						 echo '
						
					   
						<option   value="'.$row["expert_id"].'">'.$row['firstname'].' '.$row['lastname'].' </option>
						
					
						 
					'; 
						}
							else
							{
							   echo'	<option   value="">No expert available with those specifications </option>';
							}    
					}
							else
							{
								echo 'error in query';
							}
	 }  


		  
		


		   }

		
		  
	 
   
     
      