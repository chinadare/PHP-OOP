<?php	
	require_once("core/init.php");
	$pname=$_REQUEST['cmbProject'];
	if ($pname!="select"){
		$database = DB:: getinstance()->query("SELECT no_of_blocks FROM tbl_project WHERE  id='$pname'");
		if(!$database->count()){
				die ("No Blocks Available");
		}else{
			foreach($database->results() as $database){
				$blocks = $database->no_of_blocks;
			}
				
			$resBlocks = DB:: getinstance()->query("SELECT Block_No FROM tbl_customer_purchase WHERE  pr_name='$pname'");
			
			if(!$resBlocks->count()){
				$x = 1;
				echo '<select name="cmbBlock[]" id="blk" class="form-control">';
				echo '<option value="select"> - Select Block - </option>';
				while($x<=$blocks){
?>
					<option value="<?php echo $x; ?>">
						
<?php
					echo $x;
					echo '</option>';
					$x++;
				}
				echo '</select>';
			}else{
				
				$BnoArry = array();
				
				foreach($resBlocks->results() as $blk){
					$Bno = $blk->Block_No;
					if(strpos($Bno,',')!==false){
						$BnoArry = explode(',', $Bno);	
					}else{
						$BnoArry[] = $Bno;
					}
				}
				
				$x = 1;
				echo '<select name="cmbBlock[]" id="blk" class="form-control">';
				echo '<option value="select"> - Select Block- </option>';
				while($x<=$blocks){
					if(!in_array($x,$BnoArry)){ 	
?>					
						<option value="<?php echo $x; ?>">
						
<?php
						echo $x;
						echo '</option>';
					}
					$x++;
				}
				echo '</select>';
			}				
		}
	
	}
?>
	
    
    