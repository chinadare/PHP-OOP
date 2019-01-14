<?php
require_once("core/init.php");
$user = new User();
if ($user->hasPermission('executive')) {

	if(!$_SESSION['FBSFname'] ==""){
	if(!$_SESSION['FBSFproject'] ==""){
	if(!$_SESSION['6monthlanttal'] ==""){	

		$sixmotot = $_SESSION['6monthlanttal'];

	$customer = $_SESSION['FBSFname'] ;
	$project = $_SESSION['FBSFproject'] ;

	$database = DB:: getinstance()->query("SELECT * FROM tbl_customer_purchase WHERE id='$customer'");

	if(!$database->count()){
			die ("No Customer");
	}else{
		
		foreach($database->results() as $database){
			 $Bno = $database->Block_No;
			 $deposit = $database->deposite;
			 $BlockNOOO = $database->Block_No;
		}

		$BnoArry = explode(',', $Bno);	



		 foreach ($BnoArry as $block1) { 
			 	 $block1; 

			 	$database = DB:: getinstance()->query("UPDATE tbl_property SET status='3' WHERE block_no='$block1' AND project_id= '$project' ");


			 }
	} 

	if(Input::exists()){

			if (Input::get('btnAddBan')){	
				$validate = new Validate();
				$validation = $validate->check($_POST, array(
					
				));
				
				if($validation->passed()){

					try {

							$payDate = Input::get('txtPayDate');

						    $discount = Input::get('cmbpay1011');
						    $Total_Amount_with_discount = Input::get('txttemtotal2');
						    $Deposite = Input::get('txtdep');
						    $Total_Amount_with_depo =  Input::get('txttemtotal3');
						    $down_payment = Input::get('txtpdwn');
						    $total_payment = Input::get('txtfinalr');
					
						     $due_date = date('y/m/d', strtotime('+6 months', strtotime($payDate)));
						    $No_inc = Input::get('cmbinc');
						    $Inc_fee = Input::get('txtIncfree');


						    $database = DB:: getinstance()->query("UPDATE tbl_six_month SET  discount='$discount',Total_Amount_with_discount='$Total_Amount_with_discount',Deposite='$Deposite',Total_Amount_with_depo='$Total_Amount_with_depo',down_payment='$down_payment',total_payment='$total_payment',payment_starting_date='$payDate',due_date='$due_date',No_inc='$No_inc',Inc_fee='$Inc_fee' WHERE cus_id='$customer' ");

						     $database = DB:: getinstance()->query("UPDATE tbl_6_month_prograss SET  total_payment=' $total_payment',inc_num='$No_inc',inc_fee='$Inc_fee' WHERE c_id='$customer' ");

						      $database = DB:: getinstance()->query("UPDATE tbl_customer_purchase SET  deposite=' $Deposite' WHERE Customer_table_id='$customer' ");
						     
						    $user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Customer Purchase(6 months)",
							         
							            "Activity" =>  $discount.','.$Total_Amount_with_discount.','.$Deposite.','.$Total_Amount_with_depo.','.$down_payment.','.$total_payment.','.$No_inc.','.$Inc_fee
							            
							   


							            ));

						    

						 Session::flash("succ6months","<div class='alert alert-success'>
							<strong>Warning!</strong>Data has been insert into Database!</div>");
							Redirect::to("Conti_purchase.php");

		          
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
		

<div class="content-wrapper">
	<div class="container-fluid">
	<?php
		
?> 	    		
	<div class="container">
		<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Clerk] : Customer Purchase - Six Months <a/> </p>
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">Six Months</div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

								<form name="frmAddProp" method="POST" action="#">
									<?php
										$database = DB:: getinstance()->query("SELECT full_name FROM tbl_customer WHERE c_id='$customer' ");
										if(!$database->count()){
												die ("No Customer");
										}else{
											
											foreach($database->results() as $database){
												$custmername = $database->full_name;				
											}

										}

										$database = DB:: getinstance()->query("SELECT pj_name FROM tbl_project WHERE id='$project' ");
										if(!$database->count()){
												die ("No Project");
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
										<td> Total Amount</td>
										<td> 
											<input id='total' class="form-control"  type="text" name="txttemtotal1" value="<?php echo $sixmotot; ?>"  />
											
										</td>
									</tr>

									<tr>
										<td> Discount</td>
										<td> 
											<select id='discount' class="form-control" name="cmbpay1011" required>
												<option value="" selected="selected"> - Select Discount - </option>	
												<option value="0">  No Discount  </option>	
											<?php													
												$database = DB:: getinstance()->query("SELECT * FROM tbl_project_discount WHERE pj_id='$project' ");
												if(!$database->count()){
														die ("no user");
												}else{													
													foreach($database->results() as $database){
														echo "<option value='".$database->discount_amount."'>".$database->perch_S_amount.'-'.$database->perch_E_amount."</option>";
													}
												}

											?>
											
											</select>
											
										</td>
									</tr>

									<tr>
										<td> Total Amount with discount</td>
										<td> 			
											<script>
												$(document).ready(function() {
													var total = 0;
													var discount = 0;
													var tdiscount = 0;

													$('#total, #discount, #totalDiscount').change('input', function(){									
														var total = $('#total').val();
														total = parseFloat(total);
														
														var discount = $('#discount').val();
														discount = parseFloat(discount);
										
														if(discount != ''){
															tdiscount = total - discount; 
															$('#totalDiscount').val((tdiscount || 0.00 ).toFixed(2));	
														}else{
															$('#totalDiscount').val((total || 0.00 ).toFixed(2));															
														}

													});
												});
											</script>
											<input id='totalDiscount' class="form-control"  type="text" name="txttemtotal2" value="0.00"  />
										</td>
									</tr>

									<tr>
										<td> Deposit </td>
										<td> 
											<?php $deposit = round($deposit,2); ?>
											<input id='deposit' class="form-control"  value="" step="any" type="number" name="txtdep" value="0.00"  />
										</td>
									</tr>

									<tr>
										<td> Total Amount with Deposit</td>
										<td> 							
											<script>
												$(document).ready(function() {
													var tdiscount = 0;
													var downPay = 0;
													var fTotal = 0;									
													
													$('#total,#discount,#totalDiscount,#deposit,#totalDeposit').on('input', function(){									

														var tdiscount = $('#totalDiscount').val();
														tdiscount = parseFloat(tdiscount);

														var deposit = $('#deposit').val();
														deposit = parseFloat(deposit);

														var tdeposite = $('#totalDeposit').val();
														tdeposite = parseFloat(tdeposite);

														tdeposite = tdiscount - deposit; 
														$('#totalDeposit').val((tdeposite || 0.00 ).toFixed(2));

														downPay = tdeposite/4.00 ; 
														$('#downPay').val((downPay || 0.00 ).toFixed(2));

													});
												});
											</script>	
											<input id='totalDeposit' class="form-control"  type="text" name="txttemtotal3" value="0.00" />
										</td>
									</tr>
									

									<tr>
										<td> Down payment (25%) </td>
										<td> 
											<input id="downPay" class="form-control" readonly value="0.00" type="text" name=""  />
										</td>
									</tr>

									<tr>
										<td> Enter Down payment </td>
										<td> 
											<input id="downPay1" class="form-control" step="any"  value="0.00" type="number" name="txtpdwn"  />
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

									<div class="form-group">
									<tr>
										<td> Total Payment</td>
										<td> 
											<script>
												$(document).ready(function() {
													var tdeposite = 0;
													var dwnpayl = 0;
													var fTotal = 0;
													$('#total,#discount,#totalDiscount,#deposit,#totalDeposit,#downPay1').on('input', function(){																							
														var tdeposite = $('#totalDeposit').val();
														tdeposite = parseFloat(tdeposite);

														var dwnpayl = $('#downPay1').val();
														dwnpayl = parseFloat(dwnpayl);

														fTotal = tdeposite - dwnpayl; 
														$('#finalTotal').val((fTotal || 0.00 ).toFixed(2));														
													});
												});
											</script>
											<input id='finalTotal' class="form-control"  type="text" name="txtfinalr" value="0.00" />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> No Installments </td>
										<td> 
											<Select id="cmbInst" class="form-control" name="cmbinc"   required>
												<option value="" selected="selected"> - Select Installments No - </option>
												<option value="1"> 1 </option>
												<option value="2"> 2  </option>
												<option value="3"> 3  </option>
												<option value="4"> 4  </option>
												<option value="5"> 5  </option>
												<option value="6"> 6  </option>
											</select>

										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Installments  Free</td>
										<td> 
											<script>
												$(document).ready(function() {
													var fTotal = 0;
													var installNo = 0;
													var installfee = 0;								
													
													$('#total,#discount,#totalDiscount,#deposit,#totalDeposit,#downPay1,#finalTotal,#cmbInst').on('input change', function(){
														
														var fTotal = $('#finalTotal').val();
														fTotal = parseFloat(fTotal);
														
														var installNo = $('#cmbInst').val();
														installNo = parseInt(installNo);
														
														installFee = fTotal / installNo;
														$('#installment').val((installFee || 0.00 ).toFixed(2));																							
													});
												});
											</script>
											<input class="form-control" id="installment" type="text" name="txtIncfree" value='<?php echo escape(Input::get('txtIncfree')); ?>' />
										</td>
									</tr>
									</div>

									
									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddBan" value="ADD" />

										<a type="button" class="btn btn-warning" href="Conti_purchase.php" data-target='Signin'>GO back</a>
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
	Session::flash("prosession","You need to select Project Name!");
	Redirect::to("Conti_purchase.php");
}
}else{
	Session::flash("Cussession","You need to select Customer Name!");
	Redirect::to("Conti_purchase.php");
}
}else{
	echo "s";
}
}else{
	Redirect::to("index.php");
} ?>