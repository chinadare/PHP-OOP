<?php	
	require_once("core/init.php"); 
	echo $pname=$_REQUEST['cmbCust'];
	
	if ($pname!="select")
	{
		//$database = DB:: getinstance()->query("SELECT * FROM  tbl_customer  JOIN  tbl_customer_bank JOIN tbl_customer_spouse JOIN tbl_customer_purchase ON tbl_customer.c_id = tbl_customer_bank.c_id = tbl_customer_spouse.c_id = tbl_customer_purchase.Customer_table_id WHERE  tbl_customer.c_id='$pname'");
		$database = DB:: getinstance()->query("SELECT * FROM  tbl_customer WHERE c_id='$pname'");
		if(!$database->count()){
				die ("No Reserved Customers");
		}else{
			
			
						
	?>

							
				 
			<select name="cmbCust1" class="form-control">
				<option>- Select Block Number -</option>
				
				<?php  
				foreach($database->results() as $database){


										
					echo "<option value='".$database->p_addr."'>".$database->p_addr."</option>";
					
				} 
				echo '</select>';				

				
		}

	?>
			
	<?php
	}else{
		echo "sarath";
	}
	?>