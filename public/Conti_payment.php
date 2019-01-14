<?php
require_once("core/init.php");
$user = new User();
if ($user->hasPermission('executive')) {


	if(Input::exists()){
		if(Input::get('btnAdd')){

			$adad = Input::get('cmbCUSTOMER2');

				$database = DB:: getinstance()->query("SELECT payment_type FROM tbl_customer_purchase WHERE id='$adad'");

									if(!$database->count()){
											echo "No Record";
										}else{
											
											foreach($database->results() as $database){

												$tst = $database->payment_type;	
												

											}
										}


							

			
			
			if($tst == "Bank_loan"){

				$adad = Input::get('cmbCUSTOMER2');
			    $database = DB:: getinstance()->query("SELECT * FROM tbl_bank_loan_prograss WHERE c_id='$adad'");

									if(!$database->count()){
											echo "No Record";
										}else{
											
											foreach($database->results() as $database){

												$pid = $database->project_id;
												$customer = $database->c_id;
												$totpay = $database->total_payment;
												$block = $database->Block;
												$Ramount = $database->amount_reserved;
												$due_date = $database->due_date;
												$Updateid = $database->due_date;
												

											}
										}

				 $_SESSION['progresspid']	= $pid; 
				 $_SESSION['progresscustomer']	= $customer;
				 $_SESSION['progresstotpay']  =	$totpay;
				 $_SESSION['progressblock'] = $block;
				 $_SESSION['progressRamount'] = $Ramount;
				 $_SESSION['progressdue'] = $due_date;
				 $_SESSION['progressUsession'] = $Updateid;
										
				Redirect::to("Bank_loan_progress.php");
			}elseif($tst == "6Months_cash"){

				 $adad6 = Input::get('cmbCUSTOMER2');
			    $database = DB:: getinstance()->query("SELECT * FROM tbl_six_month WHERE cus_id='$adad6'");

									if(!$database->count()){
											echo "No Record";
										}else{
											
											foreach($database->results() as $database){

												
												$customer6 = $database->cus_id;
												
												
												

											}
										}

				
				echo $_SESSION['progresscustomer6']	= $customer6;
				
				
									
										
				Redirect::to("Exe_six_months_plan_progress.php");
			}elseif($tst == "Full_cash"){

				$aFull = Input::get('cmbCUSTOMER2');
			    $database = DB:: getinstance()->query("SELECT * FROM tbl_full_cash WHERE customer_id='$aFull'");

									if(!$database->count()){
											echo "No Record";
										}else{
											
											foreach($database->results() as $database){

												
												$customerFull = $database->customer_id;
												
												
												

											}
										}

				
				echo $_SESSION['progresscustomerFull']	= $customerFull;
				
				
									
										
				Redirect::to("Exe_full_proress.php");


			}elseif($tst == "4_years"){

				 $a4 = Input::get('cmbCUSTOMER2');
			    $database = DB:: getinstance()->query("SELECT * FROM 4_years_plan WHERE c_id='$a4'");

									if(!$database->count()){
											echo "No Record";
										}else{
											
											foreach($database->results() as $database){

												
												$customer4y = $database->c_id;
												
												
												

											}
										}

				
				echo $_SESSION['progresscustomerF4']	= $customer4y;
				
				
									
										
				Redirect::to("Exe_4year_plan_progress.php");


			}
		
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

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
				<a href="#"><?php
			 	$id = escape($user->data()->id);  

									$database = DB:: getinstance()->query("SELECT * FROM users WHERE id='$id'");

									if(!$database->count()){
											echo "No Record";
										}else{
											
											foreach($database->results() as $database){

											echo	'<img src="'.$database->Image.'" class="ts-avatar hidden-side" alt="">';	

											}}
							?> Account <i class="fa fa-angle-down hidden-side"></i></a>
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

				<li class="open"><a href="Conti_payment.php"><i class="fa fa-dashboard"></i> Customer Payment</a></li>

				

			
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
		

<div class="content-wrapper">
<div class="container-fluid">

	<div class="container">



	<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Clerk]  : Continue Payments  <a/> </p>
		<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading"> Continue Payment</div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

								<form name="frmAddProp" method="POST" action="#">
							

										<tr>
										<td> Customer Name</td>
										<td> 
											<select class="form-control" name="cmbCUSTOMER2" required>
													<option value="" selected="selected" > - Select Customer Name - </option>											<?php	
												

												$database = DB:: getinstance()->query("SELECT * FROM tbl_customer_purchase ");
															if(!$database->count()){
																	echo "No Record";
																}else{
																	
																foreach($database->results() as $database){
												
												
													
																	echo "<option value='".$database->id."'>".$database->c_name."</option>";

																	}

																}

											?>
											</select>
											
										</td>
									</tr>

							
									
									<div class="form-group">
									<tr>
										<td colspan="2"> 
										

																		
										<input class="btn btn-info" type="submit" name="btnAdd" value="Continue" />
									</td>
									</tr>
									</div>

								</form>
							</table>
						</div>
					</div>
				</div>


				<div class="container">


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

</body>

</html>


<?php } ?>