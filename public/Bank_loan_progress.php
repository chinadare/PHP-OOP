<?php
require_once("core/init.php");
$user = new User();
if ($user->hasPermission('executive')) {

	$customerId = $_SESSION['progresscustomer'] ;
	


 
?>
	<?php
		if(Input::exists()){

			if (Input::get('btnupdate')){	
				$validate = new Validate();
				$validation = $validate->check($_POST, array(
					
				));
				
				if($validation->passed()){

					try {

						$new_total = Input::get('txtPcost1t');
						$new_total1 = Input::get('txtReco1');

						$new_sub = $new_total + $new_total1;
						$new_total1 = Input::get('txtfinalA');

						$payDate = Input::get('txtPayDate');
						

						$id = $_SESSION['progressid'];
						
									$new_checNo = Input::get('txtCheck1');
									$new_checday = Input::get('txtCheck2');
						   
						    		$user->update('tbl_bank_loan_prograss',array(
									"amount_reserved" => $new_sub,
									"amount_to_be_reserved" => $new_total1,
									'starting_date' => $payDate

						          
						            ),$id);

							
									 $user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Bank Loan Progress",
							            "COP_Pid" => $id,
							            "Activity" => $new_sub.','.$new_total1
							            
							   


							            )); 

									 	$soldB = $_SESSION['soldblock'];

									
						
		         			echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';

				$_SESSION['checkno1'] = $new_checNo;
					$_SESSION['checkno2'] = $new_checday;
					$_SESSION['apay'] = $new_total1;
					$_SESSION['paymentsty'] = 'Bank Loan';
					$_SESSION['cuspaymentFull'] = $new_pay; 
					$_SESSION['checkno1id'] = $customerId;
					Redirect::to('check1.php');

		          
					} catch (Exception $e) {
						die($e-> getMessage());
					}
					
				}else{
		      	    foreach($validation->error() as $error){

		     		}
				}
			}  

			 if (Input::get('btncomB')){	

			 	$id = $_SESSION['progressid'];

			 	$user->update('tbl_bank_loan_prograss',array(
					"complete" => 2,
				

						          
				  ),$id);

			 		echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';

					echo'	<meta http-equiv="refresh" content="1">';
			 }

		}
?> 	
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="wid+-th=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>SREC</title>
	<link rel="stylesheet" href="includes/1/bootstrap.min.css">
	<script src="includes/1/jquery.min.js"></script>
	<script src="includes/1/bootstrap.min.js"></script>

	<link rel="stylesheet" href="CAL/css/datepicker.css">
    <link rel="stylesheet" href="CAL/css/bootstrap.css">
			<link rel="stylesheet" href="includes/style/css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="includes/style/css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="includes/style/css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="includes/style/css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="includes/style/css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="includes/style/css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="includes/style/css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="includes/style/css/style.css">

</head>

<body>
	<div class="brand clearfix">
		<a href="index.html" class="logo"><img src="includes/style/img/logo.gif" class="img-responsive" alt=""></a> 
	<div class="top_topic"> SILVEREEN REAL ESTATE COMPANY (PVT) LTD </div>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li><a href="#">Help</a></li>
		
			<li class="ts-account">
				<a href="#">
				<?php
					$id = escape($user->data()->id);  

					$database = DB:: getinstance()->query("SELECT * FROM users WHERE id='$id'");

					if(!$database->count()){
							echo "No Record";
					}else{
						
						foreach($database->results() as $database){

							echo	'<img src="'.$database->Image.'" class="ts-avatar hidden-side" alt="">';	

						}
					}
				?> 
					Account 
					<i class="fa fa-angle-down hidden-side"></i>
				</a>
				<ul>
					<li><a href="Exe_changePW.php"> Edit My Account</a></li>
					<li><a href="logout.php">Logout </a></li>
				</ul>
			</li>
		</ul>
	</div>

	<div class="ts-main-content">
		<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
				<li class="ts-label">Search</li>
				<li>
					<input type="text" class="ts-sidebar-search" placeholder="Search here...">
				</li>
				<li class="ts-label">Main</li>
				
				
				<li><a href="Exe_home.php"><i class="fa fa-dashboard"></i> Home</a></li>

			

				<li><a href="addProperty.php"><i class="fa fa-dashboard"></i> Add New Project</a></li>

				

				<li><a href="Add_block_details.php"><i class="fa fa-dashboard"></i> Add Block Price</a></li>

				<li><a href="Exe_create_discount.php"><i class="fa fa-dashboard"></i> Add Discount</a></li>

				<li><a href="application.php"><i class="fa fa-dashboard"></i> Add Customer</a></li>

				<li><a href="Exe_viwe_customer.php"><i class="fa fa-dashboard"></i> View Customer</a></li>

				<li><a href="Conti_purchase.php"><i class="fa fa-dashboard"></i> Customer Purchase</a></li>

				<li><a href="Conti_payment.php"><i class="fa fa-dashboard"></i> Customer Payment</a></li>

				

				<li><a href="Exe_resell.php"><i class="fa fa-dashboard"></i> Land Resell</a></li>	

				

				

				<li><a href="cost_of_p.php"><i class="fa fa-dashboard"></i> Cost Of Projects</a></li>

				

				<li><a href="check.php"><i class="fa fa-dashboard"></i> Check Recipt</a></li>								
				
				<!-- Account from above -->
				<ul class="ts-profile-nav">
					<li><a href="#">Help</a></li>
					
					<li class="ts-account">
						<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
						<ul>
								<li><a href="#"> Edit My Account</a></li>
					<li><a href="logout.php">Logout </a></li>
						</ul>
					</li>
				</ul>

			</ul>
		</nav>
		

<div class="content-wrapper">
	<div class="container-fluid">
    		
	<div class="container">

			<?php
										
				
									$database = DB:: getinstance()->query("SELECT * FROM tbl_bank_loan_prograss WHERE c_id='$customerId'");


										
										foreach($database->results() as $database){
												$pid = $database->project_id;
												$customer = $database->c_id;
												$totpay = $database->total_payment;
												$block = $database->Block;
												$min = $database->amount_reserved;
												$due_date = $database->due_date;
												$Updateid = $database->id;
										}
										
										$_SESSION['progressid'] = $Updateid;
										 $new_amoun = $totpay - $min;
									?>

								


		<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Clerk] : Customer Payment - Bank Loan <a/> </p>
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">Bank Loan Proress &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Due Date <?php echo $due_date; ?></div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

								<form name="frmAddProp" method="POST" action="#">
									<?php
										$database = DB:: getinstance()->query("SELECT full_name FROM tbl_customer WHERE c_id='$customerId' ");
										if(!$database->count()){
												echo "No Record";
										}else{
											
											foreach($database->results() as $database){
												$custmername = $database->full_name;				
											}

										}

										$database = DB:: getinstance()->query("SELECT pj_name FROM tbl_project WHERE id='$pid' ");
										if(!$database->count()){
												echo "No Record";
										}else{
											
											foreach($database->results() as $database){						
												$promername = $database->pj_name;											
											}

										}	

										$_SESSION['soldblock']	= $promername;				
									?>
								


									<tr>
										<td> Customer Name</td>
										<td> 
											<input class="form-control" readonly type="text" name="txtcusname" value="<?php echo $custmername; ?>" />
										</td>
									</tr>

									<tr>
									<td> Project Name</td>
										<td> 
											<input class="form-control" readonly type="text" name="txtpro" value="<?php echo $promername; ?>" />
										</td>
									</tr>

									<tr>
										<td> Blocks</td>
										<td> 
											<input class="form-control" readonly type="text" name="txtpro" value="<?php echo $block; ?>" />
										</td>
									</tr>

							

									<tr>
										<td> Total Amount</td>
										<td> 
											<input id='total1' class="form-control" readonly type="text" name="txttemtotal1" value="<?php echo $totpay; ?>"  />
										
										</td>
									</tr>

									<tr>
										<td> Allready Recovered Amount</td>
										<td> 
											<input class="form-control" id='total2U' readonly type="text"  name="txtPcost1t" placeholder='Rs : 0.00' value='<?php if(isset($min)){echo $min;} ?>'/>
										
										</td>
									</tr>

									<tr>
										<td> Amount to be Recovered</td>
										<td> 
											<input class="form-control" id='totalnew' readonly type="text"  name="txtReco" placeholder='Rs : 0.00' value='<?php if(isset($new_amoun)){echo $new_amoun;} ?>'/>
										
										</td>
									</tr>

										<script>
												$(document).ready(function() {
													
													var ttotal2 = 0;
													var ttotal3 = 0;

													$('#totalnew, #total2').on('input', function(){		


														var totalnew = $('#totalnew').val();
														totalnew = parseFloat(totalnew);
														
														var total2 = $('#total2').val();
														total2 = parseFloat(total2);

														ttotal2 = totalnew - total2  ;
														$('#totalFinal').val((ttotal2 || 0.00 ).toFixed(2));

															});
												});	
											</script>


									<tr>
										<td> Amount </td>
										<td> 
											<input id='total2' class="form-control" placeholder='RS 0.00' step="any" type="number" name="txtReco1"  required />
											
										
										</td>
									</tr>
											
									
								<tr>
										<td> Paying Date </td>
										<td> 
											<input id="payDate" type="text" class="form-control" placeholder="DD-MM-YYYY" name="txtPayDate" required>
												
											<script type="text/javascript">
												$(document).ready(function () {
													$('#payDate').datepicker({
														format: "yyyy-mm-dd"
													});  
												});
											</script>										
										</td>
									</tr>	

									

									<tr>
										<td> Total</td>
										<td> 
											<input id='totalFinal' class="form-control"  type="text" name="txtfinalA" value="0.00" />
																				
										</td>
									</tr>

										<tr>
										<td> Payment Type </td>
										<td>
										<select class="form-control" name="cmbexample" id="toggle" onChange="toggle_it('tr1');toggle_it('tr2')">
										
											    <option value="A">Cash</option>
											    <option value="B">Cheque </option>
											    
											</select>
										</td>
									</tr>

										<script>
									  function toggle_it(itemID){ 
									      // Toggle visibility between none and '' 
									      if ((document.getElementById(itemID).style.display == 'none')) { 
									            document.getElementById(itemID).style.display = '' 
									            event.preventDefault()
									      } else { 
									            document.getElementById(itemID).style.display = 'none'; 
									            event.preventDefault()
									      }    
									  } 

									</script>
									<tr>
										
										<tr>
										
										<tr>
										<td>Account No</td>
										<td>
																		
										<input class='form-control' type='text' name='txtCheck1' id="tr1" style="display:none" />
																	
										</td>
										</tr>
										<div class="form-group">
										<tr>
										<td>  Drawn  </td>

										<td>
										<input class='form-control' name='txtCheck2' type='text' id="tr2" style="display:none" >
										<script type="text/javascript">
												$(document).ready(function () {
													$('#tr2').datepicker({
														format: "yyyy-mm-dd"
													});  
												});
											</script>							 
										</td>
										</tr>
										</div>
																
										</tr>
																	
								
									</tr>


								
									
									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnupdate" value="Update" />
										 <a type="button" class="btn btn-success" href="Conti_payment.php" data-target="Signin">GO back</a> 
										
									</td>
									</tr>
									</div>

								</form>
									<form name="frmAddPro" method="POST" action="#">
									<div class="form-group">
									<tr>
										<td colspan="2"> 
									<?php if($totpay <= $min){ ?>
										<input class="btn btn-info" type="submit" name="btncomB" value="Complete" />
										<?php } ?>
										</td>
									</tr>
									</div>
								</form>	
							</table>
						</div>
					</div>
				</div>
		

	</div>
</div>
</div>
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

	<script type="text/javascript" src="includes/CAL/jsDatePick.min.1.3.js"></script>

	
    <script src="CAL/js/jquery-ui.min.js"></script>
    <script src="CAL/js/bootstrap.min.js"></script>
    <script src="CAL/js/bootstrap-datepicker.js"></script>
    <script src="CAL/js/auto.js"></script>



</body>

</html>


<?php }else{
	Redirect::to("index.php");
} ?>