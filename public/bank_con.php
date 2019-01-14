<?php
require_once("core/init.php");
$user = new User();
if ($user->hasPermission('managing_director')) {
?>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>SREC</title>


  	<!-- Font awesome -->
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



	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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
					<li><a href="managing_director_cha_PW.php"> Edit My Account</a></li>
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
				
			
				<li><a href="Exe_viwe_Sec.php"><i class="fa fa-dashboard"></i> Activity Log</a></li>

				<li><a href="cop_compare.php"><i class="fa fa-dashboard"></i> Project Cost Report </a></li>

				<li><a href="COP_SUM_summery.php"><i class="fa fa-dashboard"></i> Project Cost Summery </a></li>
			
				<li><a href="cost_of_p2.php"><i class="fa fa-dashboard"></i>  Update Project Cost</a></li>

				<li><a href="update_project.php"><i class="fa fa-dashboard"></i>  Update Projects </a></li>

					<li ><a href="Resell_MD.php"><i class="fa fa-dashboard"></i> Land Resell </a></li>
				<li class="open"><a href="bank_con.php"><i class="fa fa-dashboard"></i> Conform Payments </a></li>	
								
				
				
				

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

				
						<div class="row">
							
						</div>
	
				</div>


					<div class="container" id="printS1">
						<script>
									function printContent(el){
										var restoragepage = document.body.innerHTML;
										var printcontent = document.getElementById(el).innerHTML;
										document.body.innerHTML = printcontent;
										window.print();
										document.body.innerHTML = restoragepage;
									}
								</script>
										<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Managing Director] Conform Payments:<a/> </p>
							<div class="col-md-12">
				<div class="panel panel-default">

					<div class="panel-heading">Full Cash Conform Verify <button  class=" pull-right" onclick='printContent("printS1")'><span class="glyphicon glyphicon-print"></span> Print </button> </div>
					<?php
					if(Input::exists()){
					if (Input::get('btnVF')){
						


							$idF = Input::get('txtcidF');	
						

						
					//	$database = DB:: getinstance()->query("UPDATE tbl_property SET status=4 WHERE block_no='$BankID'");
						$database = DB:: getinstance()->query("UPDATE full_cash_progress SET complete=3 WHERE  c_id='$idF' ");

					

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					}	
				}
				?>
						<div class="panel-body">
							<table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
									 <thead>
								<tr class="success" >
								<th>Customer Name</th>
								<th>Project Name</th>
								<th>Blocks</th>
								<th>Total Amount</th>
								<th>Paid Amount</th>
								
								<th>Action</th>

							<?php
							$database = DB:: getinstance()->query('SELECT tbl_customer_purchase.c_name,tbl_project.pj_name,full_cash_progress.c_id,full_cash_progress.Block,full_cash_progress.total_payment,full_cash_progress.total_payment_re FROM full_cash_progress,tbl_bank_loan,tbl_customer_purchase,tbl_project WHERE tbl_customer_purchase.pr_name=tbl_project.id AND tbl_customer_purchase.id=full_cash_progress.c_id AND full_cash_progress.complete=2');



										
										foreach($database->results() as $database){
											echo "<form name='frmLogin' method='POST' action='#'>";
										
										echo	"<tbody>";
										echo	"<tr>";
												
												//echo	" <input class='form-control' type='hidden'  name='txtreid' value= '$database->id' />";
												
												echo	"<td> <input class='form-control' type='text' readonly name='txtCnBNO' value= '$database->c_name' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtCnBNO' value= '$database->pj_name' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtCnBNO' value= '$database->Block' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtREVblock101' value= '$database->total_payment' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtpaymenttype' value= '$database->total_payment_re' /></td>";
												echo  	"<input class='form-control' type='hidden' readonly name='txtcidF' value= '$database->c_id' />";
												echo '<td> <input class="btn btn-danger" type="submit" name="btnVF" value="conform" /> </td> ';
											
												
											
													echo	"</tbody>";
										echo	"</tr>";
												
										echo 	"</form>";
												
										}
							?>	
							</tr>
								</thead>
								</ul>		
								</table>
							</div>
						</div>				
					</div>	

					</div>




					<div class="container" id="printS2">
						<script>
									function printContent(el){
										var restoragepage = document.body.innerHTML;
										var printcontent = document.getElementById(el).innerHTML;
										document.body.innerHTML = printcontent;
										window.print();
										document.body.innerHTML = restoragepage;
									}
								</script>
										
							<div class="col-md-12">
				<div class="panel panel-default">

					<div class="panel-heading">Bank Loan Conform Verify <button  class=" pull-right" onclick='printContent("printS2")'><span class="glyphicon glyphicon-print"></span> Print </button> </div>
					<?php
					if(Input::exists()){
					if (Input::get('btnrebk')){
						


					$idF = Input::get('txtcidBK');	
						

						
					//	$database = DB:: getinstance()->query("UPDATE tbl_property SET status=4 WHERE block_no='$BankID'");
						$database = DB:: getinstance()->query("UPDATE tbl_bank_loan_prograss SET complete=3 WHERE  c_id='$idF' ");

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					}	
				}
				?>
						<div class="panel-body">
							<table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
									 <thead>
								<tr class="success" >
								<th>Customer Name</th>
								<th>Project Name</th>
								<th>Blocks</th>
								<th>Total Amount</th>
								<th>Paid Amount</th>
								
								<th>Action</th>

							<?php
							$database = DB:: getinstance()->query('SELECT tbl_customer_purchase.c_name,tbl_project.pj_name,tbl_bank_loan_prograss.Block,tbl_bank_loan_prograss.c_id,tbl_bank_loan_prograss.total_payment,tbl_bank_loan_prograss.amount_reserved FROM tbl_bank_loan_prograss,tbl_bank_loan,tbl_customer_purchase,tbl_project WHERE tbl_customer_purchase.pr_name=tbl_project.id AND tbl_customer_purchase.id=tbl_bank_loan_prograss.c_id AND tbl_bank_loan_prograss.complete=2');



										
										foreach($database->results() as $database){
											echo "<form name='frmLogin' method='POST' action='#'>";
										
										echo	"<tbody>";
										echo	"<tr>";
												
												//echo	" <input class='form-control' type='hidden'  name='txtreid' value= '$database->id' />";
												
												echo	"<td> <input class='form-control' type='text' readonly name='txtCnBNO' value= '$database->c_name' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtCnBNO' value= '$database->pj_name' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtCnBNO' value= '$database->Block' /></td>";
													echo  	"<input class='form-control' type='hidden' readonly name='txtcidBK' value= '$database->c_id' />";
												echo	"<td> <input class='form-control' type='text' readonly name='txtREVblock101' value= '$database->total_payment' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtpaymenttype' value= '$database->amount_reserved' /></td>";
											
												echo '<td> <input class="btn btn-danger" type="submit" name="btnrebk" value="conform" /> </td> ';
											
												
											
													echo	"</tbody>";
										echo	"</tr>";
												
										echo 	"</form>";
												
										}
							?>	
							</tr>
								</thead>
								</ul>		
								</table>
							</div>
						</div>				
					</div>	

					</div>		

		<div class="container" id="printS3">
						<script>
									function printContent(el){
										var restoragepage = document.body.innerHTML;
										var printcontent = document.getElementById(el).innerHTML;
										document.body.innerHTML = printcontent;
										window.print();
										document.body.innerHTML = restoragepage;
									}
								</script>
										
							<div class="col-md-12">
				<div class="panel panel-default">

					<div class="panel-heading">6 Months Conform Verify <button  class=" pull-right" onclick='printContent("printS3")'><span class="glyphicon glyphicon-print"></span> Print </button> </div>
					<?php
					if(Input::exists()){
					if (Input::get('btn6mon')){
						


					$idF = Input::get('txt6id');	
						

						
					//	$database = DB:: getinstance()->query("UPDATE tbl_property SET status=4 WHERE block_no='$BankID'");
						$database = DB:: getinstance()->query("UPDATE tbl_6_month_prograss SET complete=3 WHERE  c_id='$idF' ");

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					}	
				}
				?>
						<div class="panel-body">
							<table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
									 <thead>
								<tr class="success" >
								<th>Customer Name</th>
								<th>Project Name</th>
								<th>Blocks</th>
								<th>Total Amount</th>
								<th>Paid Amount</th>
								
								<th>Action</th>

							<?php
							$database = DB:: getinstance()->query('SELECT tbl_customer_purchase.c_name,tbl_project.pj_name,tbl_6_month_prograss.Block,tbl_6_month_prograss.c_id,tbl_6_month_prograss.total_payment,tbl_6_month_prograss.amount_reserved FROM tbl_6_month_prograss,tbl_bank_loan,tbl_customer_purchase,tbl_project WHERE tbl_customer_purchase.pr_name=tbl_project.id AND tbl_customer_purchase.id=tbl_6_month_prograss.c_id AND tbl_6_month_prograss.complete=2');



										
										foreach($database->results() as $database){
											echo "<form name='frmLogin' method='POST' action='#'>";
										
										echo	"<tbody>";
										echo	"<tr>";
												
												//echo	" <input class='form-control' type='hidden'  name='txtreid' value= '$database->id' />";
												
												echo	"<td> <input class='form-control' type='text' readonly name='txtCnBNO' value= '$database->c_name' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtCnBNO' value= '$database->pj_name' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtCnBNO' value= '$database->Block' /></td>";

												echo	" <input class='form-control' type='hidden' readonly name='txt6id' value= '$database->c_id' />";

												echo	"<td> <input class='form-control' type='text' readonly name='txtREVblock101' value= '$database->total_payment' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtpaymenttype' value= '$database->amount_reserved' /></td>";
											
												echo '<td> <input class="btn btn-danger" type="submit" name="btn6mon" value="conform" /> </td> ';
											
												
											
													echo	"</tbody>";
										echo	"</tr>";
												
										echo 	"</form>";
												
										}
							?>	
							</tr>
								</thead>
								</ul>		
								</table>
							</div>
						</div>				
					</div>	

					</div>	


							<div class="container" id="printS4">
						<script>
									function printContent(el){
										var restoragepage = document.body.innerHTML;
										var printcontent = document.getElementById(el).innerHTML;
										document.body.innerHTML = printcontent;
										window.print();
										document.body.innerHTML = restoragepage;
									}
								</script>
										
							<div class="col-md-12">
				<div class="panel panel-default">

					<div class="panel-heading">4 Years Conform Verify <button  class=" pull-right" onclick='printContent("printS4")'><span class="glyphicon glyphicon-print"></span> Print </button> </div>
					<?php
					if(Input::exists()){
					if (Input::get('btnrebank')){
						


							echo $BankID6 = Input::get('txtREVblock101');	
						echo $BankID6n = Input::get('txtiREID');
							echo $red6n = Input::get('txtreid');

							$payday = Input::get('txtpaymenttype');
							$pids = Input::get('txtwhatid');
						
					//	$database = DB:: getinstance()->query("UPDATE tbl_property SET status=4 WHERE block_no='$BankID'");
						$database = DB:: getinstance()->query("UPDATE tbl_property SET status=4 WHERE block_no='$BankID6' AND project_id='$BankID6n' ");

						$database = DB:: getinstance()->query("UPDATE tbl_land_resell SET status=2 WHERE id='$red6n'");


						if($payday == "Bank Loan"){
						$database = DB:: getinstance()->query("UPDATE tbl_bank_loan SET Re_status=2 WHERE id='$pids'");
						}elseif($payday == "Six Months"){
						$database = DB:: getinstance()->query("UPDATE tbl_six_month SET Re_status=2 WHERE id='$pids'");	
						}
						$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Land Resell Bank Loan  ",
							            "COP_Pid" => $id,
							            "Activity" => Input::get('txtREVblock')						            
							   


							    ));

					echo '<div class="alert alert-success">';
					echo '    <a href="#" aria-label="close">&times;</a>';
					echo '    <strong>Success!</strong> Data has been insert into Database.';
					echo ' </div>';
					}	
				}
				?>
						<div class="panel-body">
							<table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
									 <thead>
								<tr class="success" >
								<th>Customer Name</th>
								<th>Project Name</th>
								<th>Blocks</th>
								<th>Total Amount</th>
								<th>Paid Amount</th>
								
								<th>Action</th>

							<?php
							$database = DB:: getinstance()->query('SELECT tbl_customer_purchase.c_name,tbl_project.pj_name,4_year_plan_progress.Block,4_year_plan_progress.total_payment,4_year_plan_progress.amount_reserved FROM 4_year_plan_progress,tbl_bank_loan,tbl_customer_purchase,tbl_project WHERE tbl_customer_purchase.pr_name=tbl_project.id AND tbl_customer_purchase.id=4_year_plan_progress.c_id AND 4_year_plan_progress.complete=2');



										
										foreach($database->results() as $database){
											echo "<form name='frmLogin' method='POST' action='#'>";
										
										echo	"<tbody>";
										echo	"<tr>";
												
												//echo	" <input class='form-control' type='hidden'  name='txtreid' value= '$database->id' />";
												
												echo	"<td> <input class='form-control' type='text' readonly name='txtCnBNO' value= '$database->c_name' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtCnBNO' value= '$database->pj_name' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtCnBNO' value= '$database->Block' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtREVblock101' value= '$database->total_payment' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtpaymenttype' value= '$database->amount_reserved' /></td>";
											
												echo '<td> <input class="btn btn-danger" type="submit" name="btnrebank" value="conform" /> </td> ';
											
												
											
													echo	"</tbody>";
										echo	"</tr>";
												
										echo 	"</form>";
												
										}
							?>	
							</tr>
								</thead>
								</ul>		
								</table>
							</div>
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

</body>

</html>

<?php
	
}else{
	Redirect::to('index.php');
}