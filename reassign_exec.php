<?php
require ("dbcon.php");


    if ((isset($_POST['jobid']))&&(isset($_POST['newexpert']))) {
    
        $workid = $_POST['jobid'];
        $expertid = $_POST['newexpert'];

        global $dbhandle;
        $query_search = "SELECT jobstatus FROM works_tbl WHERE work_id='$workid'";
        $query_exec = mysqli_query($dbhandle,$query_search)or die(mysqli_error($dbhandle));
               if(!empty($query_exec))
               {
                    if(mysqli_num_rows($query_exec)>0){
                    while($row = mysqli_fetch_array($query_exec)){

        $jobstatus= $row['jobstatus'];
        if(($jobstatus==='pending' )||($jobstatus==='Job accepted' )||($jobstatus==='Job Done and submitted')){

        echo "0";
       
    }

    else if($jobstatus==='Job Denied' ){
  

      
        global $dbhandle;
        $query_search = "select * from expert_tbl where expert_id = '".$expertid."'";
        $query_exec = mysqli_query($dbhandle,$query_search)or die(mysqli_error($dbhandle));
               if(!empty($query_exec))
               {
                    if(mysqli_num_rows($query_exec)>0){
                    while($row = mysqli_fetch_array($query_exec)){
                    $county= $row['county'];
                    $name= $row['firstname']. " " .$row['lastname']  ;
                   
                    $expertise= $row['expertise'];
                  

                    $sqlone= mysqli_query($dbhandle, "SELECT * FROM works_tbl WHERE work_id= $workid LIMIT 1") or die (mysqli_error($dbhandle));
                    $count=mysqli_num_rows($sqlone);
                    $row = mysqli_fetch_array($sqlone);
                            if($count > 0){ 
                                           

                    $sqltwo=mysqli_query($dbhandle,"UPDATE  works_tbl SET  expert_id= '$expertid',
                    expert_region='$county' , expertname= '$name' ,expertise='".$expertise."'
                   WHERE  work_id=$workid ") or die (mysqli_error($dbhandle));
                    

                    echo "1";
                    
                            
                   }
                   
                   }}
                       else
                       {
                           die('Error: ' . mysqli_error($dbhandle)); 
                        
                       }    
               }
                       else
                       {
                           die('Error: ' . mysqli_error($dbhandle)); 
                           
                       }

                     
} 
    }
    }
}


     
    }
     ?> 
        