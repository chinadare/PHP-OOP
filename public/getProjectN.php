<?php	
	require_once("core/init.php");
	 $pname=$_REQUEST['cmbProjNM'];
	//$_SESSION['Cpjnm'] = $pname;
	if ($pname!="select")
	{
		$database = DB:: getinstance()->query("SELECT * FROM tbl_customer_purchase  JOIN tbl_project ON tbl_customer_purchase.pr_name=tbl_project.id  WHERE  tbl_customer_purchase.Customer_table_id='$pname'");
		if(!$database->count()){
				die ("No Reserved Customers");
		}else{
			
			
						
	?>

			
				<?php  
				foreach($database->results() as $database){

					echo '<select name="cmbProj" class="form-control">';
					echo '<option>- Select Project -</option>';

					echo "<option value='".$database->id."'>".$database->pj_name."</option>";
					
					echo '</select>';

					echo "<input class='form-control' type='text' name='txtCnic' value= '$database->payment_type'  /> ";
					echo "<input class='form-control' type='text' name='txtBl' value= '$database->Block_No'  /> ";
				} 
				

				
		}
	?>
			
	<?php
	}
	?>
	