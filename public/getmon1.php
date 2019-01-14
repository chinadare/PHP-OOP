<?php	
	require_once("core/init.php");
	$pname=$_REQUEST['cmbcustomer'];
	
	if ($pname!="select")
	{
		$database = DB:: getinstance()->query("SELECT * FROM tbl_property WHERE  c_id='$pname'");
		if(!$database->count()){
				die ("No Reserved Customers");
		}else{
			
			
						
	?>

			<select name="cmbCustnic" class="form-control">
				<option>- Select Block Number -</option>
				<?php  
				foreach($database->results() as $database){



					echo "<option value='".$database->block_no."'>".$database->block_no."</option>";
					
				} 
				echo '</select>';

				
		}
	?>
			
	<?php
	}
	?>
	
    
    