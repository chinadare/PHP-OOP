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
											die ("no user");
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

				<li><a href="application_soft_copy.php"><i class="fa fa-dashboard"></i> View Customer Appliaction</a></li>

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
				if (Input::get('vewcusRe')){	
					Redirect::to('print_cust.php');
			}
			?>				
						<div class="row">
							
						</div>
		<div id='printS' class="container">
		
		<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Clerk] : Viwe Customers Road <a/> </p>

			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Viwe Customers <button  class=" pull-right" onclick='printContent("printS")'><span class="glyphicon glyphicon-print"></span> Print </button> </div>
						<div class="panel-body">
							<table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
								 
								 	<script>
									function printContent(el){
										var restoragepage = document.body.innerHTML;
										var printcontent = document.getElementById(el).innerHTML;
										document.body.innerHTML = printcontent;
										window.print();
										document.body.innerHTML = restoragepage;
									}
								</script>
								
								 <thead>
								<tr class="success">
								<th>Customer Full Name</th>
								<th>Customer NIC</th>
								<th>Customer Contact No</th>
								<th>Customer Address</th>
								
								<th>Customer Block No</th>
								<th>Customer Payment type</th>
								
								
							

								
								
							
							
									<?php
									$database = DB:: getinstance()->query('SELECT * FROM tbl_customer JOIN tbl_customer_purchase ON tbl_customer.c_id=tbl_customer_purchase.id');


										if(!$database->count()){
											echo "no userss";
										}
										foreach($database->results() as $database){
										echo "<form name='frmLogin' method='POST' action='cropper-master/demo/index.php'>";
										
										echo	"<tbody>";
										echo	"<tr>";
										
										echo	" <td> $database->full_name </td> ";
										echo	" <td> $database->nic </td> ";
										echo	" <td> $database->p_tele </td> ";
										echo	" <td> $database->p_addr </td> ";
										echo	" <td> $database->Block_No </td> ";
										
										echo	" <td> $database->payment_type </td> ";
											
										
										echo	"<input type='hidden' name='txtid1' value= '$database->c_id' /> ";
										
									

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