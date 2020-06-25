<?php require_once("./functions.php");  
 
    
      $expert = $_REQUEST['expertise'];
      $county = $_REQUEST['county'];
   
      ?>
 


<div class="col-xs-12">
 <div class="container">
      <table class="table">
    <thead><h4 class="text-center" style="font-family:gadugi">All the available experts from your description</h4></thead>
    <thead> 
     
     
         <th style="font-size:22px;color:#000000;font-family:calibri"><b>Name<b/></th>
        <th style="margin-left:10dp;font-size:22px;color:#000000;font-family:calibri"><b>County</b></th>
        <th style="margin-left:10dp;font-size:22px;color:#000000;font-family:calibri"><b>Phonenumber</b></th>
     
       <hr/>   
    </thead>
    <tbody >
    <tr>
                <?php Kazikwetu::listexperts($expert,$county); ?>
</tr>
    </tbody>
  </table>
 
      </div> 
      </div> 