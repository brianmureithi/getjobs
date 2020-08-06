<?php require_once("./functions.php");  
 

 
    
 $expert = $_REQUEST['expertise'];
 $county = $_REQUEST['county'];

 ?> 

 <div class=" well search-icon form-group">
		  				<label for="sel1">Choose another Expert: </label> 
						<select class="form-control newexpert" name="newexpert"  style="min-width:200px!important;min-height:30px;">
						<?php Kazikwetu::listexpertsinreassign($expert,$county); ?>
						  </select>
</div>
 




