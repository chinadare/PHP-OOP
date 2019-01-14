<?php
require_once("core/init.php");
$user = new User();
if ($user->hasPermission('executive')) {

	if(!$_SESSION['FBSFname'] ==""){
	if(!$_SESSION['FBSFproject'] ==""){
	if(!$_SESSION['4yearlanttal'] ==""){

	$fouryear = $_SESSION['4yearlanttal'];	

	$customer = $_SESSION['FBSFname'] ;
	$project = $_SESSION['FBSFproject'] ;

	$database = DB:: getinstance()->query("SELECT * FROM tbl_customer_purchase WHERE id='$customer'");

	if(!$database->count()){
			echo "No Record";
	}else{
		
		foreach($database->results() as $database){
			 $Bno = $database->Block_No;
			 $deposit = $database->deposite;
			 $BlockNOOO = $database->Block_No;
		}

		$BnoArry = explode(',', $Bno);	

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
						   
						    $total_payment = Input::get('txtfinalr');
						    $due_date = date('y/m/d', strtotime('+48 months', strtotime($payDate)));

						    $No_inc = Input::get('cmbinc');

						    $No_fee = Input::get('txtIncfree');

						    $database = DB:: getinstance()->query("UPDATE 4_years_plan SET  discount='$discount',Total_Amount_with_discount='$Total_Amount_with_discount',Deposite='$Deposite',Total_Amount_with_depo='$Total_Amount_with_depo',total_payment='$total_payment',payment_starting_date='$payDate',due_date='$due_date',No_Installments='$No_inc',Installments_free='$No_fee' WHERE c_id='$customer' ");

						    $database = DB:: getinstance()->query("UPDATE 4_years_plan SET  total_payment=' $total_payment' WHERE c_id='$customer' ");
						    
						     $user->create('tbl_customer_bank',array(

					       		 		"c_id" => $customer,
							            
							            "b_name" => Input::get('txtbanknm'),
							            "b_addr" => Input::get('txtbankadd'),
							          
							            "b_acc" => Input::get('txtaccno')
							            
							   


							            ));

						        $user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Customer Purchase(4 years)",
							         
							            "Activity" =>  $payDate.','.$discount.','.$Total_Amount_with_discount.','.$Deposite.','.$Total_Amount_with_depo.','.$total_payment.','.$due_date.','.$No_fee
							            
							   


							            ));
						    

						 Session::flash("succ4year","<div class='alert alert-success'>
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
	<?php

?> 	    		
	<div class="container">
		<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Clerk] : Customer Purchase - 4 Years <a/> </p>
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">4 Years</div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

								<form name="frmAddProp" method="POST" action="#">
									<?php
										$database = DB:: getinstance()->query("SELECT full_name FROM tbl_customer WHERE c_id='$customer' ");
										if(!$database->count()){
												echo "No Record";
										}else{
											
											foreach($database->results() as $database){
												$custmername = $database->full_name;				
											}

										}

										$database = DB:: getinstance()->query("SELECT pj_name FROM tbl_project WHERE id='$project' ");
										if(!$database->count()){
												echo "No Record";
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
										<td> Bank Name</td>
										<td> 
											<input class="form-control"  type="text" name="txtbanknm" value="" />
										</td>
									</tr>

									<tr>
										<td> Bank Address</td>
										<td> 
											<input class="form-control"  type="text" name="txtbankadd" value="" />
										</td>
									</tr>

									<tr>
										<td> Bank Account No</td>
										<td> 
											<input class="form-control"  type="text" name="txtaccno" value="" placeholder='123456789123' />
										</td>
									</tr>
									

									<tr>
										<td> Total Amount</td>
										<td> 
											<input id='total' class="form-control"  type="text" name="txttemtotal1" value="<?php echo $fouryear; ?>"  />
											
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
														echo "No Record";
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
											<input id='totalDiscount' class="form-control"  type="text" name="txttemtotal2" value="0.00"  />
											<script>
												$(document).ready(function() {
													var tdiscount = 0;
													var tdeposit = 0;
													var downPay = 0;
													var fTotal = 0;									
													
													$('#total, #discount, #deposit,#totalDeposit').on('input', function(){									
														var total = $('#total').val();
														total = parseFloat(total);
														
														var discount = $('#discount').val();
														discount = parseFloat(discount);
														
														var deposit = $('#deposit').val();
														deposit = parseFloat(deposit);

														var dTotal = $('#totalDeposit').val();
														dTotal = parseFloat(dTotal);

														
														if(discount != ''){
															tdiscount = total - discount; 
															$('#totalDiscount').val((tdiscount || 0.00 ).toFixed(2));
															tdeposit = tdiscount - deposit;
															$('#totalDeposit').val((tdeposit || 0.00 ).toFixed(2));

															downPay = dTotal/4.00;
															$('#downPay').val((downPay || 0.00 ).toFixed(2));
															
															fTotal = dTotal - downPay;
															$('#finalTotal').val((fTotal || 0.00 ).toFixed(2));	


															
														}else{
															$('#totalDiscount').val((total || 0.00 ).toFixed(2));
															tdeposit = total - deposit;
															$('#totalDeposit').val((tdeposit || 0.00 ).toFixed(2));
															
															downPay = dTotal/4.00;
															$('#downPay').val((downPay || 0.00 ).toFixed(2));
															
															fTotal = dTotal - downPay;
															$('#finalTotal').val((fTotal || 0.00 ).toFixed(2));	
														}

													});
												});
											</script>
										</td>
									</tr>

									<tr>
										<td> Deposite </td>
										<td> 
											<?php $deposit = round($deposit,2); ?>
											<input id='deposit' class="form-control" step="any"  value="" type="number" name="txtdep" value="0.00"  />
										</td>
									</tr>

									<tr>
										<td> Total Amount with Deposit</td>
										<td> 
											<input id='totalDeposit' class="form-control"  type="text" name="txttemtotal3" value="0.00" />
																				
										</td>
									</tr>
									

									<tr>
										<td> Down payment (for private) </td>
										<td> 
											<input id="downPay" class="form-control" step="any" value="0.00" type="number" name="txtpdwn"  />
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
											<input id='finalTotal' class="form-control"  type="text" name="txtfinalr" value="0.00" />
										
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> No Installments </td>
										<td> 
											<Select id="cmbinci" class="form-control" name="cmbinc"   required>
												<option value="" selected="selected"> - Select Installments No - </option>
												<option value="1"> 1 </option>
												<option value="2"> 2  </option>
												<option value="3"> 3  </option>
												<option value="4"> 4  </option>
												<option value="5"> 5  </option>
												<option value="6"> 6  </option>
												<option value="7"> 7 </option>
												<option value="8"> 8  </option>
												<option value="9"> 9  </option>
												<option value="10"> 10  </option>
												<option value="11"> 11  </option>
												<option value="12"> 12  </option>
												<option value="13"> 13 </option>
												<option value="14"> 14  </option>
												<option value="15"> 15  </option>
												<option value="16"> 16  </option>
												<option value="17"> 17  </option>
												<option value="18"> 18  </option>
												<option value="19"> 19 </option>
												<option value="20"> 20  </option>
												<option value="21"> 21  </option>
												<option value="22"> 22  </option>
												<option value="23"> 23  </option>
												<option value="24"> 24  </option>
												<option value="25"> 25 </option>
												<option value="26"> 26  </option>
												<option value="27"> 27  </option>
												<option value="28"> 28  </option>
												<option value="29"> 29  </option>
												<option value="30"> 30  </option>
												<option value="31"> 31 </option>
												<option value="32"> 32  </option>
												<option value="33"> 33  </option>
												<option value="34"> 34  </option>
												<option value="35"> 35  </option>
												<option value="36"> 36  </option>
												<option value="37"> 37 </option>
												<option value="38"> 38  </option>
												<option value="39"> 39  </option>
												<option value="40"> 40  </option>
												<option value="41"> 41  </option>
												<option value="42"> 42  </option>
												<option value="43"> 43 </option>
												<option value="44"> 44  </option>
												<option value="45"> 45  </option>
												<option value="46"> 46  </option>
												<option value="47"> 47  </option>
												<option value="48"> 48  </option>

												
											</select>

										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Installments  Free</td>
										<td> 
											<input class="form-control" id="feeINC" type="text" name="txtIncfree" value='<?php echo escape(Input::get('txtIncfree')); ?>' />
										</td>
									</tr>
									</div>

											<script>
												$(document).ready(function() {
													var FTOTALma = 0;
													var FTINC = 0;									
													
													$('#finalTotal,#cmbinci').on('input change', function(){
														
														var TotalNOI = $('#finalTotal').val();
														TotalNOI = parseFloat(TotalNOI);
														
														var NOINC = $('#cmbinci').val();
														
														FTOTALma = TotalNOI / NOINC;
														$('#feeINC').val((FTOTALma || 0.00 ).toFixed(2));																							
													});
												});
											</script>

									
									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAddBan" value="ADD" />
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
	echo "sasasaw";
}
}else{
	Redirect::to("index.php");
} ?>