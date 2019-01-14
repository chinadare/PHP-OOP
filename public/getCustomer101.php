<?php	
	require_once("core/init.php");
	 $pname=$_REQUEST['cmbProj101'];
	//$_SESSION['Cpjnm'] = $pname;
	if ($pname!="select")
	{
		$database = DB:: getinstance()->query("SELECT * FROM tbl_customer_purchase JOIN tbl_customer ON  tbl_customer_purchase.Customer_table_id=tbl_customer.c_id WHERE  pr_name='$pname'");
		if(!$database->count()){
				die ("No Reserved Customers");
		}else{
			
			
						
	?>

			<select name="cmbCustmm" class="form-control">
				<option>- Select Block Number -</option>
				<?php  
				foreach($database->results() as $database){



					echo "<option value='".$database->c_id."' >".$database->full_name."</option>";
					
				} 
				echo '</select>';

				
				
		}
	?>
			
	<?php
	}
	?>