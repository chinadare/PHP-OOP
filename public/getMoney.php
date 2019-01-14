<?php	
	require_once("core/init.php");
	$No=$_REQUEST['cmbCust'];
	// $phelp = $_SESSION['Cpjnm']; 
	if ($No!="select")
	{
		$database = DB:: getinstance()->query("SELECT * FROM tbl_property WHERE  block_no='$No'  ");
		if(!$database->count()){
				die ("No Reserved Price");
		}else{
			
			
						
	?>

			
				<select name="cmbmone" class="form-control">
				<option>- Select Block Number -</option>
				<?php  
				foreach($database->results() as $database){



					echo "<option value='".$database->est_perch_price."'>".$database->est_perch_price."</option>";
					
				} 
				echo '</select>';
				
		}
	?>
			
	<?php
	}
	?>
	
    