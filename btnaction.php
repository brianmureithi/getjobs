<?php
require ("dbcon.php");

if(isset($_POST['accept'])){
    $id = filter_var($_POST['workid'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $user_id=$_GET['userid'];
    $workid=$_GET['workid'];
    $sqlone= mysqli_query($dbhandle, "SELECT * FROM jobstatus WHERE work_id='".$id."'  LIMIT 1") or die (mysqli_error($dbhandle));
    $count=mysqli_num_rows($sqlone);
    $row = mysqli_fetch_array($sqlone);
           if($count > 0){
            ?><script>
                alert('Sorry, but you already issued a status on this job');
                window.location="work_submit.php?userid=<?php echo $_GET['userid'];?>&workid=<?php echo $_GET['workid'];?>"
                </script>

                <?php
            }
    else{
       

    $sql = mysqli_query($dbhandle,"INSERT INTO jobstatus(work_id,jobstatus,user_id,dateofapproval) VALUES ('".$id."','Job accepted','$user_id',now())")
    or die (mysqli_error($dbhandle));
    $workid=$_GET['workid'];

    $sqlthree= mysqli_query($dbhandle, "SELECT * FROM works_tbl WHERE work_id= $workid LIMIT 1") or die (mysqli_error($dbhandle));
    $count=mysqli_num_rows($sqlthree);
    $row = mysqli_fetch_array($sqlthree);
            if($count > 0){

                $sqlfour=mysqli_query($dbhandle,"UPDATE  works_tbl SET jobstatus = 'Job accepted' WHERE work_id=$workid ")
                or die (mysqli_error($dbhandle));
               
            
            }


    
    
    if($sql=1){
     ?><script>
    alert('Successfully accepted the work');
    </script>

    <?php
       
    header('location:work_submit.php?userid='.$_GET['userid'].'&workid= '.$_GET['workid'].'' );
    
   

     
        
        
      }   
      else{
        ?><script>
        alert('Error occured during updating status');
        </script>
    
        <?php
           
        header('location:work_submit.php?userid='.$_GET['userid'].'&workid= '.$_GET['workid'].'' );
        
      }
      
      }
     
 
     

            
            exit();

       }  
       if(isset($_POST['decline'])){
     
        $id = filter_var($_POST['workid'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $user_id=$_GET['userid'];
        $sqlone= mysqli_query($dbhandle, "SELECT * FROM jobstatus WHERE work_id='".$id."'  LIMIT 1") or die (mysqli_error($dbhandle));
        $count=mysqli_num_rows($sqlone);
        $row = mysqli_fetch_array($sqlone);
        if($count > 0){
            ?><script>
            alert('You already issued a status on this job');
            window.location="work_submit.php?userid=<?php echo $_GET['userid'];?>&workid=<?php echo $_GET['workid'];?>"
            </script>
    
            <?php
        }
        else{
    
        $sqlseven = mysqli_query($dbhandle,"INSERT INTO jobstatus(work_id,jobstatus,user_id,dateofapproval) VALUES ('".$id."','Job Declined','$user_id',now())")
        or die (mysqli_error($dbhandle));

        $workid=$_GET['workid'];

    $sqlfive= mysqli_query($dbhandle, "SELECT * FROM works_tbl WHERE work_id= $workid LIMIT 1") or die (mysqli_error($dbhandle));
    $count=mysqli_num_rows($sqlfive);
    $row = mysqli_fetch_array($sqlfive);
            if($count > 0){

                $sqlsix=mysqli_query($dbhandle,"UPDATE  works_tbl SET jobstatus = 'Job Denied' WHERE work_id=$workid ")
                or die (mysqli_error($dbhandle));
               
            
            }
    
     
        if($sqlseven=1){
         ?><script>
        alert('You have successfully declined this job');
        </script>
    
        <?php
           
        header('location:work_submit.php?userid='.$_GET['userid'].'&workid= '.$_GET['workid'].'' );
        
       
    
         
            
            
          }   
          else{
            ?><script>
            alert('Error occured during updating job status');
            </script>
        
            <?php
               
            header('location:work_submit.php?userid='.$_GET['userid'].'&workid= '.$_GET['workid'].'' );
            
           
          
          } 
        }
    }
        ?>
    