<?php	
	require_once("core/init.php");
	 $pname=$_REQUEST['cmbProj'];
	  $_SESSION['projectdiscount'] = $pname;
	//echo $pname;
	if ($pname!="select")
	{ 
		$database = DB:: getinstance()->query("SELECT * FROM tbl_project  JOIN tbl_project_discount ON tbl_project.id=tbl_project_discount.pj_id WHERE tbl_project_discount.pj_id='$pname'");
		if(!$database->count()){
			echo '<div class="alert alert-Warning">';
									echo '    <a href="#" aria-label="close">&times;</a>';
									echo '    <strong>Warning!&nbsp;</strong>';
									die ("No Discount Details To Show");
									echo ' </div>';	
							
				
		}else{
			
			
						
	?>

					<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"> Project Discount</div>
						<div class="panel-body">
							<table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
								 

								 <thead>
								<tr class="info">
								<th>Discount Plan</th>
								<th>Perch Amount</th>
								<th>Discunt Amount </th>
							
				<?php  
				foreach($database->results() as $database){
					echo	"<tbody>";
					echo	"<tr>";

					echo	" <td><input class='form-control' type='text' name='cmbCust' value= '$database->Plan_name' disabled /></td> ";
					echo	" <td><input class='form-control' type='text' name='cmbCust' value= '$database->perch_S_amount".'-'."$database->perch_E_amount' disabled /></td> ";
					
					echo	" <td><input class='form-control' type='text' name='cmbCust' value= '$database->discount_amount'disabled  /></td> ";

					echo	"</tbody>";
					echo	"</tr>";
					
					
				} 

						echo	'							</table>';
						echo	'							</div>';
					



							
						echo	'</div>';
						echo '</div>';
			

				
		}
	?>
			
	<?php
	}
	?>