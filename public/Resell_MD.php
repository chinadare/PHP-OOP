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
											echo "No record";
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

					<li class="open"><a href="Resell_MD.php"><i class="fa fa-dashboard"></i> Land Resell </a></li>
						<li><a href="bank_con.php"><i class="fa fa-dashboard"></i> Conform Payments </a></li>		
				
				
				

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
										<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Manager] : Land Resell<a/> </p>
							<div class="col-md-12">
				<div class="panel panel-default">

					<div class="panel-heading">Resell verify <button  class=" pull-right" onclick='printContent("printS2")'><span class="glyphicon glyphicon-print"></span> Print </button> </div>
					<?php
					if(Input::exists()){
					if (Input::get('btnrebank')){
						


							 $BankID6 = Input::get('txtREVblock101');	
						 $BankID6n = Input::get('txtiREID');
						 $red6n = Input::get('txtreid');

							$payday = Input::get('txtpaymenttype');
							$pids = Input::get('txtwhatid');
						
					//	$database = DB:: getinstance()->query("UPDATE tbl_property SET status=4 WHERE block_no='$BankID'");
						$database = DB:: getinstance()->query("UPDATE tbl_property SET status=1 WHERE block_no='$BankID6' AND project_id='$BankID6n' ");

						$database = DB:: getinstance()->query("UPDATE tbl_land_resell SET status=4 WHERE id='$red6n'");


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
								<tr class="danger" >
								<th>Due Date</th>
								<th>Customer Name</th>
								<th>Project Name</th>
								<th>Block No</th>
								<th>Payment Type</th>
								<th>Action</th>

							<?php
							$database = DB:: getinstance()->query('SELECT * FROM tbl_land_resell WHERE status="1"');



										
										foreach($database->results() as $database){
											echo "<form name='frmLogin' method='POST' action='#'>";
										
										echo	"<tbody>";
										echo	"<tr>";
												
												echo	" <input class='form-control' type='hidden'  name='txtreid' value= '$database->id' />";
												echo	" <input class='form-control' type='hidden'  name='txtwhatid' value= '$database->what_id' />";
												echo	"<td> <input class='form-control' type='text' readonly name='txtCnBNO' value= '$database->due_date' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtCnBNO' value= '$database->customer_name' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtCnBNO' value= '$database->project_name' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtREVblock101' value= '$database->block_no' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtpaymenttype' value= '$database->payment_tpe' /></td>";
												echo	" <input class='form-control' type='hidden' readonly name='txtpaid' value= '$database->pj_id' />";
												echo '<td> <input class="btn btn-danger" type="submit" name="btnrebank" value="Resell" /> </td> ';
											
												echo	"<input type='hidden' name='txtiREID' value= '$database->pj_id' /> ";
											
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