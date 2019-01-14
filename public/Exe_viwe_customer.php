<?php
require_once("core/init.php");
$user = new User();
if ($user->hasPermission('executive')) {

	//if(isset($_SESSION['b_id']) && $_SESSION['b_id'] != "" ){


		//echo $_SESSION['id'];

//}

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
	  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 

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
							?>
				 Account <i class="fa fa-angle-down hidden-side"></i></a>
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

				<li class="open"><a href="Exe_viwe_customer.php"><i class="fa fa-dashboard"></i> View Customer</a></li>

			

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
				if (Input::get('vewcusRe')){	
					Redirect::to('print_cust.php');
			}
			?>				
						<div class="row">
							
						</div>
		<div class="container">
		<?php
	if(Input::exists()){
		if (Input::get('btnSend')){	



			}
		}	
		?>	
		<p style="font-size:120%;">  Welcome <a href="#" > <?php echo escape($user->data()->Emp_name);  ?> [Clerk] : View Customers  <a/> </p>

			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">View Customers <form name='frmLogin' class=" pull-right"  method='POST' action='cus_print.php'> <button name='vewcusRe' class=" pull-right" > Generate  Report </button> </form> </div>
						<div class="panel-body">
							<table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
								 

								 <thead>
								<tr class="success">
								<th>Customer Name</th>
								<th>Project Name</th>
								<th>Block No</th>
								<th>Phone Number</th>
								
								<th>Customer Address</th>
								<th>Payment Type</th>
								
								
								<th>Front Page </th>
								<th>Back Page </th>
								
							

								
								
							
							
									<?php
									$database = DB:: getinstance()->query('SELECT tbl_customer.c_id,tbl_customer.full_name,tbl_customer.p_addr,tbl_customer.p_tele,tbl_customer_purchase.payment_type,tbl_customer_purchase.Block_No,tbl_customer.road_image,tbl_customer.image2,tbl_project.pj_name FROM tbl_customer,tbl_customer_purchase,tbl_project WHERE tbl_customer.c_id=tbl_customer_purchase.id AND tbl_customer_purchase.pr_name=tbl_project.id ');


										if(!$database->count()){
											echo "no userss";
										}
										foreach($database->results() as $database){
										echo "<form name='frmLogin' method='POST' action='cropper-master/demo/index.php'>";
										
										echo	"<tbody>";
										echo	"<tr>";
										
										echo	" <td> $database->full_name </td> ";
										echo	" <td> $database->pj_name </td> ";
										echo	" <td> $database->Block_No </td> ";
										echo	" <td> $database->p_tele </td> ";
										echo	" <td> $database->p_addr </td> ";
										if($database->payment_type == ""){
											echo " <td> <p class='text-info'> Reserved Only </p> </td> ";
										}elseif($database->payment_type == "Full_cash"){
										echo	" <td> Full Cash</td> ";
										}elseif($database->payment_type == "Bank_loan"){
											echo	" <td> Bank Loan</td> ";
										}elseif($database->payment_type == "6Months_cash"){
											echo	" <td> 6 Months </td> ";
										}elseif($database->payment_type == "4_years"){
											echo	" <td> 4 Years </td> ";
										}
										
										
										
									
										
										echo	"<input type='hidden' name='txtid1' value= '$database->c_id' /> ";
										$path1 = '../../'.$database->road_image;
										echo    '<th> <input src=.'.$path1.'  name="btnSelec" width="50" height="50" type="image" />   </th>';
										
									
										echo 	"</form>";
										echo "<form name='frmLogin' method='POST' action='cropper-master/demo/sec.php'>";
										echo	"<input type='hidden' name='txtid2' value= '$database->c_id' /> ";
										 $path = '../../'.$database->image2;
										echo    '<th> <input src=.'.$path.'  name="btnSelec" width="50" height="50" type="image" />   </th>';										echo 	"</form>";
										echo	"</tbody>";
										echo	"</tr>";
										
										
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


