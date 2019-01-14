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
											echo "no user";
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

				<li><a href="Exe_viwe_customer.php"><i class="fa fa-dashboard"></i> View Customer</a></li>

	

				<li><a href="Conti_purchase.php"><i class="fa fa-dashboard"></i> Customer Purchase</a></li>

				<li><a href="Conti_payment.php"><i class="fa fa-dashboard"></i> Customer Payment</a></li>

				

			
				<li class="open"><a href="Exe_resell.php"><i class="fa fa-dashboard"></i> Land Resell</a></li>	
				

				

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

				
						<div class="row">
							
						</div>
		<div class="container">
				<?php
		//echo $sys_date =date("Y-m-d");
		echo "<br>";

			
										
				
										
									
								
		?>	
		
		<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Clerk] : Land Resell 4 Years<a/> </p>
				
								<div class="col-md-12" id='printS3' >
							<script>
									function printContent(el){
										var restoragepage = document.body.innerHTML;
										var printcontent = document.getElementById(el).innerHTML;
										document.body.innerHTML = printcontent;
										window.print();
										document.body.innerHTML = restoragepage;
									}
								</script>
				<div class="panel panel-default">
					<div class="panel-heading">4 Years   <button  class=" pull-right" onclick='printContent("printS3")'><span class="glyphicon glyphicon-print"></span> Print </button> </div>
							<?php
					if(Input::exists()){
					if (Input::get('btnre4yr')){
						
						$ButID6 = Input::get('txtresellid');

							$user->create('tbl_land_resell',array(

					       		 		
							            
							            "customer_name" => Input::get('txtfullname6'),
							            "project_name" => Input::get('txtpjname6'),
							            "block_no" => Input::get('txtblock6'),
							            "payment_tpe" => "Six Months",
							            "due_date" => Input::get('txtduedate6'),
							            "status" => "1",
							             "pj_id" => Input::get('txtpjid6'),
							              "what_id" => Input::get('txtresellid')						            
							   


							    ));

							$database = DB:: getinstance()->query("UPDATE 4_years_plan SET but_id=2 WHERE id='$ButID6'");
						

						$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "Land Resell Six Months  ",
							            "COP_Pid" => $id,
							            "Activity" => Input::get('txtBlock6m')						            
							   


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
								<th>Action</th>

							<?php
							$database = DB:: getinstance()->query('SELECT 4_years_plan.id,4_years_plan.project_id,4_years_plan.due_date,4_years_plan.Block,tbl_project.pj_name,tbl_customer.full_name,4_years_plan.but_id FROM 4_years_plan,tbl_project,tbl_customer WHERE  4_years_plan.project_id=tbl_project.id AND 4_years_plan.c_id=tbl_customer.c_id AND 4_years_plan.Re_status=1');


										
										foreach($database->results() as $database){
											echo "<form name='frmLogin' method='POST' action='#'>";
										
										echo	"<tbody>";
										echo	"<tr>";
												echo	" <input class='form-control' type='hidden' readonly name='txtpjid6' value= '$database->project_id' />";
												echo	" <input class='form-control' type='hidden' readonly name='txtresellid' value= '$database->id' />";
												echo	"<td> <input class='form-control' type='text' readonly name='txtduedate6' value= '$database->due_date' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtfullname6' value= '$database->full_name' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtpjname6' value= '$database->pj_name' /></td>";
												echo	"<td> <input class='form-control' type='text' readonly name='txtblock6' value= '$database->Block' /></td>";
												//echo '<td> <input class="btn btn-danger" type="submit" name="btnre6mon" value="Resell" /> </td> ';
												
												if($database->but_id == "1" ){
												echo '<td> <input class="btn btn-danger" type="submit" name="btnre4yr" value="Resell" /> </td> ';
												}else{
													echo '<td> <input class="btn btn-warning" type="submit" name="" value="Processing" /> </td> ';
												}

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
