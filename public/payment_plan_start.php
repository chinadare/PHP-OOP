<?php
require_once("core/init.php");
$user = new User();
if ($user->hasPermission('executive')) {

	if(!$_SESSION['FBSFname'] ==""){
	if(!$_SESSION['FBSFproject'] ==""){

	$customer = $_SESSION['FBSFname'] ;
	$project = $_SESSION['FBSFproject'] ;

	$database = DB:: getinstance()->query("SELECT * FROM tbl_customer_purchase WHERE id='$customer'");

	if(!$database->count()){
			echo "no customer";
	}else{
		
		foreach($database->results() as $database){
			 $Bno = $database->Block_No;
			 $deposit = $database->deposite;
			 $BlockNOOO = $database->Block_No;
		}

		$BnoArry = explode(',', $Bno);	
	} 
?>
<?php
		if(Input::exists()){

			if (Input::get('btnbank')){	
				$validate = new Validate();
				$validation = $validate->check($_POST, array(
					
				));
				
				if($validation->passed()){

					try {
						

					$tst = Input::get('paytype');

				
					$sumam = Input::get('txttemtotal1');
					$database = DB:: getinstance()->query("UPDATE tbl_customer_purchase SET  payment_type='$tst' WHERE id='$customer' ");

						if($tst == "Bank_loan"){							

								$user->create('tbl_bank_loan',array(
									'project_id' => $project,

									"cus_id" => $customer,
									
									"Block" => $BlockNOOO,
									"sum_Amount" => $sumam,
								

							    ));

							    $user->create('tbl_bank_loan_prograss',array(
									

									"c_id" => $customer,
									
									"project_id" => $project,
									"Block" => $BlockNOOO,
									
									"due_date" => date('y/m/d', strtotime('+3 months'))		       		 							          
							    ));



						    $_SESSION['banklanttal'] = $sumam;

							Redirect::to("Bank_loan.php");

						
						}elseif($tst == "Full_cash"){

								$user->create('tbl_full_cash',array(
									'project_id' => $project,

									"customer_id" => $customer,
									
									"block_no" => $BlockNOOO,
									"Total_price_A" => $sumam,
								

							    ));

							    $user->create('full_cash_progress',array(
									

									"c_id" => $customer,
									
									"project_id" => $project,
									"Block" => $BlockNOOO,
									
									"due_date" => date('y/m/d', strtotime('+1 months'))		       		 							          
							    ));


			
							$_SESSION['fulllanttal'] = $sumam;

							Redirect::to("Full_payment.php");

						}elseif($tst == "6Months_cash"){

							$user->create('tbl_six_month',array(
								'project_id' => $project,

								"cus_id" => $customer,
								
								"Block" => $BlockNOOO,
								"sum_Amount" => $sumam,
							

						    ));


							$_SESSION['6monthlanttal'] = $sumam;
							Redirect::to("Exe_six_months_plan.php");

						}elseif($tst == "4_years"){

							$user->create('4_years_plan',array(
									

									"c_id" => $customer,
									
									"project_id" => $project,
									"Block" => $BlockNOOO,
									"sum_Amount" => $sumam,
									"due_date" => date('y/m/d', strtotime('+48 months'))		       		 							          
							    ));


							$_SESSION['4yearlanttal'] = $sumam;
							Redirect::to("4_year_plan.php");
						}

						
		         

		          
					} catch (Exception $e) {
						die($e-> getMessage());
					}
					
				}else{
		      	    foreach($validation->error() as $error){

		     		}
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
<link rel="stylesheet" href="includes/1/bootstrap.min.css">
	<script src="includes/1/jquery.min.js"></script>
	<script src="includes/1/bootstrap.min.js"></script>

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
	<link rel="stylesheet" type="text/css" media="all" href="includes/CAL/jsDatePick_ltr.min.css" />

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
							echo "No record";
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
		

<div class="content-wrapper">
	<div class="container-fluid">
		    		
	<div class="container">
		<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Clerk] : Customer Purchase  <a/> </p>
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">Bank Loan</div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

								<form name="frmAddProp" method="POST" action="#">
									<?php
										$database = DB:: getinstance()->query("SELECT full_name FROM tbl_customer WHERE c_id='$customer' ");
										if(!$database->count()){
												echo "No Customer";
										}else{
											
											foreach($database->results() as $database){
												$custmername = $database->full_name;				
											}

										}

										$database = DB:: getinstance()->query("SELECT pj_name FROM tbl_project WHERE id='$project' ");
										if(!$database->count()){
												echo "No Project";
										}else{
											
											foreach($database->results() as $database){						
												$promername = $database->pj_name;											
											}

										}						
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
										<td> Block  </td>
										<td> 
											<?php	
												echo "<table class='table table-bordered table-striped' >";
												echo "<tr>";
												echo "<th>  No </th>";
												echo "<th>  Area </th>";
												echo "<th> Estimated Price </th>";
												echo "<th> Selling Price </th>";
												echo "<th> Total Block Price </th>";
												echo "</tr>";

											
												foreach ($BnoArry as $block) { 
													$database = DB:: getinstance()->query("SELECT * FROM tbl_property WHERE block_no='$block' AND project_id='$project'");

													foreach($database->results() as $database){

												 		$area = $database->b_area;
												
												 		$esp = $database->est_perch_price;

														echo "<tr>";

														echo '<td style="width:15%;"> <input type="text" name="blck" class="form-control" value="'.$block.'" /> </td>';
														echo '<td> <input type="text" name="blckArea" id="blockArea" class="form-control" value="'.$area.'" /> </td>';
														echo '<td> <input type="text" name="estpr" class="form-control"  value="'.$esp.'" /></td>';
														echo '<td> <input type="number" name="selpr" id="sellingPrice" class="form-control" required/> </td>';
														echo '<td> <input type="number" name="blcktot" id="blockTotal"  class="blockTotal form-control" /> </td>';
														echo "</tr>";								
													}

												}
												echo "</table>"; 												
											?>
											<script>
												$(document).ready(function() {
													$('#blockArea, #sellingPrice').on('input', function() {
													  var row = $(this).closest("tr");
													  var qty = parseInt(row.find('#blockArea').val());
													  var price = parseFloat(row.find('#sellingPrice').val());
													  row.find('#blockTotal').val((qty * price ? qty * price : 0).toFixed(2));
													});
												});
											</script>
										</td>
									</tr>

									<tr>
										<td> Total Amount</td>
										<td> 
											<input id='total' class="form-control"   type="text" name="txttemtotal1" value="0.00"  />
											<script>
												$(document).ready(function() {
													$('.blockTotal, #sellingPrice').on('input', function(){
														var total = 0;   
														$(".blockTotal").each( function(){
															total += $(this).val() * 1;	
															$('#total').val(( total || 0.00 ).toFixed(2));
														});
													});
												});
											</script>
										</td>
									</tr>
									<tr>
											
									<td> Payment Type </td>
											<td> 
												<select class="form-control" name="paytype"  id="cmbPayType">
													<option value="Full_cash"> Full Cash Payment </option>
													<option value="Bank_loan"> Bank Loan </option>
													<option value="6Months_cash"> 6 Month Easy Cash Payment </option>
													<option value="4_years"> 4 Years Easy Cash Payment </option>
												</select>
											</td>
										</tr>
								
										
						
									
									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnbank" value="ADD" />
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


<?php 
}else{
	Session::flash("prosession","<div class='alert alert-warning'>
		<strong>Warning!</strong>You need to select Project Name!</div>");
	Redirect::to("Conti_purchase.php");
}
}else{
	Session::flash("Cussession","<div class='alert alert-warning'>
		<strong>Warning!</strong>You need to select Customer Name!</div>");
	Redirect::to("Conti_purchase.php");
}
}else{
	Redirect::to("index.php");
} ?>