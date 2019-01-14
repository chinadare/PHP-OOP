<?php	
	require_once("core/init.php");
	echo $pname=$_REQUEST['cmbProj1'];
	$_SESSION['Cpjnm'] = $pname;
	if ($pname!="select")
	{
		$database = DB:: getinstance()->query("SELECT * FROM tbl_customer_purchase  JOIN tbl_customer ON tbl_customer_purchase.Customer_table_id=tbl_customer.c_id  WHERE  c_id='$pname'");
		if(!$database->count()){
				die ("No Reserved Customers");
		}else{
			
			
						
	?>

			
				
				<?php  
				foreach($database->results() as $database){


					echo	"<input class='form-control' type='text' name='txtCnic' value= '$database->nic' disabled /> ";
					
					//echo "<option value='".$database->est_perch_price."'>".$database->est_perch_price."</option>";
					
				} 
				
				
		}
	?>
			
	<?php
	}
	?>