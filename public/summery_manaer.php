<?php
require_once("core/init.php");
$user = new User();
if ($user->hasPermission('manager')) {
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
					<li><a href="#"> Edit My Account</a></li>
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
				
				
				

				<li><a href="exe_manager.php"><i class="fa fa-dashboard"></i> Project Summery</a></li>

				<li><a href="report_Bank_loan.php"><i class="fa fa-dashboard"></i> Bank Loan report</a></li>
				<li><a href="home_manager.php"><i class="fa fa-dashboard"></i> Current Projects</a></li>
				<li><a href="Exe_viwe_fcash.php"><i class="fa fa-dashboard"></i> Full Cash Projects</a></li>
				<li><a href="summery_manaer.php"><i class="fa fa-dashboard"></i> Summery </a></li>	

				
		

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
		<div class="container">
		
			<p>  Hello <a href="#" ><?php echo escape($user->data()->Emp_name);   ?> <a/> </p>

		

					<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Project summery</div>
						<div class="panel-body">
							<table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
								 

								 <thead>
								<tr class="success">
								<th>Block No</th>
							
								<th>Customer Name</th>
								
								<th>Extent</th>
								
								<th>Sold Value</th>
								<th>Project Name</th>
								
								<th>Remarks</th>

								
								
							
							
									<?php
									$database = DB:: getinstance()->query('SELECT DISTINCT tbl_customer_purchase.payment_type,tbl_customer_purchase.Block_No,tbl_customer.full_name,tbl_property.Selling_perch_price,tbl_property.est_perch_price,tbl_property.P_name FROM tbl_property,tbl_customer,tbl_customer_purchase WHERE tbl_customer.c_id = tbl_customer_purchase.Customer_table_id and tbl_customer_purchase.pr_name=tbl_property.project_id  ');


										if(!$database->count()){
											echo "No record";
										}
										foreach($database->results() as $database){
										echo "<form name='frmLogin' method='POST' action='#'>";
										
										echo	"<tbody>";
										echo	"<tr>";
										
										echo	" <td> $database->Block_No </td> ";
										echo	" <td> $database->full_name </td> ";
										echo	" <td> $database->est_perch_price </td> ";
										echo	" <td> $database->Selling_perch_price </td> ";
										echo	" <td> $database->P_name </td> ";
										echo	" <td> $database->payment_type </td> ";
										
									

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
	if ($_SERVER["REQUEST_METHOD"] == "POST"  && Input::get('btnAdd')){

	
 	



		

	}	
}else{
	Redirect::to('index.php');
}