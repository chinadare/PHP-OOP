<?php	
	require_once("core/init.php"); 
	echo $pname=$_REQUEST['cmbpay'];
	
	if ($pname!="select")
	{
		$database = DB:: getinstance()->query("SELECT * FROM  tbl_customer WHERE c_id='$pname'");
		if(!$database->count()){
				die ("No Reserved Customers");
		}else{
			
			
						
	?>

			<select name="cmbCust" class="form-control">
				<option>- Select Block Number -</option>
				
				<?php  
				foreach($database->results() as $database){


										
					echo "<option value='".$database->c_id."'>".$database->full_name."</option>";
					
				} 
				echo '</select>';

				
		}

	?>
			
	<?php
	}
	?>