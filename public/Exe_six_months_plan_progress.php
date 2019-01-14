<?php
	require_once("core/init.php");
	$user = new User();
	if ($user->hasPermission('executive')) {
		$customerId = $_SESSION['progresscustomer6'] ;
?>
	<?php
		if(Input::exists()){
			if (Input::get('btnAdd')){	
				$validate = new Validate();
				$validation = $validate->check($_POST, array(
					
				));
				
				if($validation->passed()){

					try {

						$cid = $_SESSION['cus_id'];
						$pjid = $_SESSION['pjid'];	
						
						$total = Input::get('txtTotal');
						$installNo = Input::get('txtInstall');
						$dueDate = Input::get('txtDueDate');		
						$payDate = Input::get('txtPayDate');
						$interest = Input::get('txtInterest');
						$installment = Input::get('txtInstallFee');
						$amountPaid = Input::get('txtPayment');
						$recovered = Input::get('txtRecover');
						$toRecover = Input::get('txtToRecover');
						
						
						if($recovered==""){
							$recovered = 0.00;
						}
						
						$user->create('tbl_6_month_progress',array(
							"c_id" => $cid,
							"pj_id" => $pjid,
							"ins_no" => $installNo,							
							"due_date" => $dueDate,
							"pay_date" => $payDate,
							"interest" => $interest,
							"ins_fee" => $installment,
							"payment" => $amountPaid,
							"already_recovered" => $recovered,
							"to_recover" => $toRecover
						));

						$new_total = $total - $amountPaid;

						$id = $_SESSION['progressid'];

						$new_checNo = Input::get('txtCheck1');
						$new_checday = Input::get('txtCheck2');
						
						$user->create('login_sec',array(
							"Log_id" => $user->data()->id,							
							"Login_time" => date("Y-m-d h:i:s"),
							"Page" => "6 Months Plan Continue Payment",
						
							"Activity" => $total.','.$installNo.','.$dueDate.','.$payDate.','.$installment.','.$amountPaid.','.$toRecover
						));

							$re_date = date('y/m/d', strtotime('+3 months', strtotime($dueDate)));
							
					
						$database = DB:: getinstance()->query("UPDATE tbl_six_month SET  re_due_date='$re_date' WHERE cus_id='$customerId' ");
					
			

					$_SESSION['checkno1'] = $new_checNo;
					$_SESSION['checkno2'] = $new_checday;
					$_SESSION['apay'] = $amountPaid;
					$_SESSION['paymentsty'] = 'Six Month Plan';
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

		

		}
						
//----------------------------------------------------------------------------------------------------------				
		$database = DB:: getinstance()->query("SELECT * FROM tbl_six_month WHERE cus_id='$customerId'");

		foreach($database->results() as $database){
			$pid = $database->project_id;
			$customer = $database->cus_id;
			$totpay = $database->total_payment;
			$block = $database->Block;
			$start_date = $database->due_date;
			$incNO = $database->No_inc;
			$insFee = $database->Inc_fee;
		}
		
		$_SESSION['pjid'] = $pid;
		$_SESSION['cus_id'] = $customer;
		
		
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
	
	<!-- Calendar control -->
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
		
		<?php 

		$database = DB:: getinstance()->query("SELECT SUM(payment) as sumamount FROM tbl_6_month_progress WHERE c_id='$customerId'");
			 
	foreach($database->results() as $database){

		$sumamount = $database->sumamount;

	}

		 ?>

<div class="content-wrapper">
	<div class="container-fluid">

	<div class="container">
		<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Clerk] : Customer Purchase - Six Month Progress <a/> </p>
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">Bank Loan Proccess &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Due Date <?php echo $start_date; ?></div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

								<form name="frmAddProp" method="POST" action="#">
									<tr>
										<td> Customer Name</td>
										<td> 
											<?php
												$database = DB:: getinstance()->query("SELECT full_name FROM tbl_customer WHERE c_id='$customer' ");
												if(!$database->count()){
														echo "No Customer";
												}else{
													
													foreach($database->results() as $database){
														$customerName = $database->full_name;				
													}

												}
											?>
											<input class="form-control" readonly type="text" name="txtCustomer" value="<?php echo $customerName; ?>" />
										</td>
									</tr>

									<tr>
										<td> Project Name</td>
										<td> 
											<?php
												$database = DB:: getinstance()->query("SELECT pj_name FROM tbl_project WHERE id='$pid' ");
												if(!$database->count()){
														echo "No Project";
												}else{
													
													foreach($database->results() as $database){						
														$projectName = $database->pj_name;											
													}

												}						
											?>
											<input class="form-control" readonly type="text" name="txtProject" value="<?php echo $projectName; ?>" />
										</td>
									</tr>

									<tr>
										<td> Blocks</td>
										<td> 
											<input class="form-control" readonly type="text" name="txtBlock" value="<?php echo $block; ?>" />
										</td>
									</tr>

							

									<tr>
										<td> Total Amount</td>
										<td> 
											<input id='fTotal' class="form-control"  type="text" name="txtTotal" readonly placeholder='RS 0.00' value="<?php echo $totpay; ?>"  />
										
										</td>
									</tr>
									
									
									<tr>
										<td> All Ready Recovered Amount</td>
										<td> 
											<?php
												$database = DB:: getinstance()->query("SELECT SUM(payment) AS totPayment FROM tbl_6_month_progress WHERE c_id='$customerId' AND pj_id='$pid'");		
												if(!$database->count()){
													$recoveredTotal = 0.00;
													$toRecoverTotal = number_format((float)$totpay, 2, '.', '');
												}else{
													foreach($database->results() as $database){
														$recoveredTotal = $database->totPayment;
														$toRecoverTotal = $totpay - $recoveredTotal;
														$toRecoverTotal = number_format((float)$toRecoverTotal, 2, '.', '');
													}
												}	
											?>
											<input id='recovered' class="form-control"  type="text"  name="txtRecover" readonly placeholder='Rs : 0.00' value='<?php if(isset($recoveredTotal)){echo $recoveredTotal;} ?>' />
										
										</td>
									</tr>

									<tr>
										<td> Amount To Be Recovered</td>
										<td> 
											<input id='toBeRecover' class="form-control" type="text"  name="txtToRecover" readonly placeholder='Rs : 0.00' value='<?php if(isset($toRecoverTotal)){echo $toRecoverTotal;} ?>' />
										
										</td>
									</tr>
									
									<tr>
										<td> Installment No.</td>
										<td> 
											<?php
												$database = DB:: getinstance()->query("SELECT ins_no FROM tbl_6_month_progress WHERE c_id='$customerId' AND pj_id='$pid' ORDER BY ins_no DESC LIMIT 1");												
												if(!$database->count()){
														$insNo = 1;
												}else{
													
													foreach($database->results() as $database){
														$insNo = $database->ins_no;	
														$insNo+=1;
													}
												}
											?>
											<input id='installmentNo' class="form-control"  type="text" name="txtInstall" readonly value="<?php echo $insNo; ?>"  />
										
										</td>
									</tr>		

									<tr>
										<td> Installment Fee </td>
										<td> 
											<input id='installmentFee' class="form-control"  type="text" name="txtInstallFee" readonly value="<?php echo $insFee; ?>" placeholder='RS 0.00'  />
										</td>
									</tr>		
									
									<tr>
										<td> Due Date </td>
										<td> 
											<?php	
												/*
												//This will count the number of months from the start date to current date and add it.
												$d1 = new DateTime($start_date);
												$d2 = new DateTime();
												$counter = $d1->diff($d2)->m + ($d1->diff($d2)->y*12); 
												$newDate = date('Y-m-d', strtotime($start_date. " + {$counter} months"));
												*/
												$database = DB:: getinstance()->query("SELECT due_date FROM tbl_6_month_progress WHERE c_id='$customerId' AND pj_id='$pid' ORDER BY ins_no DESC LIMIT 1");												
												if(!$database->count()){
														$due_Date = date('Y-m-d', strtotime($start_date. " + 1 month"));
												}else{
													
													foreach($database->results() as $database){
														$last_due_Date = $database->due_date;	
														$due_Date = date('Y-m-d', strtotime($last_due_Date. " + 1 month"));
													}
												}
												
											?>
											<input id='dueDate' class="form-control"  type="text" name="txtDueDate" readonly value="<?php echo $due_Date; ?>"  />
											
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
										<td> Interest of 3% </td>
										<td> 
											<script>
												$(document).ready(function() {
													var fee = 0;
													var interest = 0;
													

													$('#installmentFee,#dueDate,#payDate').change('input', function(){									
														
														var fee = $('#installmentFee').val();
														fee = parseFloat(fee);
												
														var dDate = $('#dueDate').val();
														dDate = new Date(dDate);
														
														var pDate = $('#payDate').val();
														pDate = new Date(pDate);
														
														if(pDate > dDate){
															interest = fee*3/100; 
															$('#interest').val((interest || 0.00 ).toFixed(2));	
														}else{
															interest = 0;
															$('#interest').val((interest || 0.00 ).toFixed(2));																
														}

													});
												});
											</script>
											<input id='interest' class="form-control" readonly type="text" name="txtInterest"  placeholder='RS 0.00'  />
										</td>
									</tr>	

									<tr>
										<td> Amount To Be Paid </td>
										<td> 
											<script>
												$(document).ready(function() {
													var fee = 0;
													var interest = 0;
													var amountToPay = 0;

													$('#installmentFee,#dueDate,#payDate,#interest').change('input', function(){									
														
														var fee = $('#installmentFee').val();
														fee = parseFloat(fee);
												
														var interest = $('#interest').val();
														interest = parseFloat(interest);
														
														amountToPay = fee + interest;
														$('#toBePay').val((amountToPay || 0.00 ).toFixed(2));																
														

													});
												});
											</script>
											<input id='toBePay' class="form-control" type="number" readonly name="txtToBePay" placeholder='RS 0.00'  />
										</td>
									</tr>
									
									<tr>
										<td> Payment </td>
										<td> 
											<input id='payment' class="form-control" step="any"  type="number" name="txtPayment" placeholder='RS 0.00' required />								
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
										<td>  Drawn on </td>

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
											<input class="btn btn-info" type="submit" name="btnAdd" value="ADD" />
											<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
											 <a type="button" class="btn btn-success" href="Conti_payment.php" data-target="Signin">GO back</a> 
											
										</td>
									</tr>
									</div>

								</form>

								<form name="frmAddPro" method="POST" action="#">
									<div class="form-group">
									<tr>
										<td colspan="2"> 
									<?php if($totpay <= $sumamount){ ?>
										<input class="btn btn-info" type="submit" name="btncomF" value="Complete" />
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
	
	<!-- Calendar Control -->
	<script src="CAL/js/jquery-3.1.1.min.js"></script>
    <script src="CAL/js/bootstrap-datepicker.js"></script>


</body>

</html>


<?php }else{
	Redirect::to("index.php");
} ?>