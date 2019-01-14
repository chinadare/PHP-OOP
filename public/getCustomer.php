<?php	
	require_once("core/init.php");
	 $pname=$_REQUEST['cmbProj'];
	//$_SESSION['Cpjnm'] = $pname;
	if ($pname!="select")
	{
		$database = DB:: getinstance()->query("SELECT * FROM tbl_project WHERE  id='$pname'");
		if(!$database->count()){
				die ("No Reserved Customers");
		}else{
			
			
						
	?>

		<!--	<select name="cmbCust" class="form-control">
				<option>- Viwe Blocks -</option> -->
				<?php  
				foreach($database->results() as $database){

					echo	"<input class='form-control' type='text' name='txtC' value= '$database->no_of_blocks' disabled /> ";

				//	echo "<option value='".$database->no_of_blocks."'>".$database->no_of_blocks."</option>";
					
				} 
			//	echo '</select>';

				
		}
	?>
			
	<?php
	}
	?>
	
    
    