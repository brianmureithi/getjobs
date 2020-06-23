<?php require_once("./functions.php");  
 $expertise = $_REQUEST['expertise'];
      $county = $_REQUEST['county'];
   ?>
 


<div class="col-xs-8">
 <div class="container">
      <table class="table">
	  <thead><h4 class="text-center" style="font-family:gadugi">Last seen experts from your description</h4></thead>
    <thead>
     
         <th style="font-size:22px;color:#000000;font-family:calibri"><b>Name<b/></th>
        <th style="margin-left:10dp;font-size:22px;color:#000000;font-family:calibri"><b>email</b></th>
        <th style="margin-left:10dp;font-size:22px;color:#000000;font-family:calibri"><b>Last seen</b></th>
    
       <hr/>   
    </thead>
    <tbody >
      <tr>
                <?php Kazikwetu::lastseen($expertise,$county); ?>
</tr>
    </tbody>
  </table>
      </div> 
      </div> 