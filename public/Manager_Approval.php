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
											die ("no user");
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
				
				<li><a href="exe_manager.php"><i class="fa fa-dashboard"></i> Project Summery</a></li>
				<li><a href="Exe_viwe_fcash.php"><i class="fa fa-dashboard"></i> Full Cash Projects</a></li>
				<li><a href="report_Bank_loan.php"><i class="fa fa-dashboard"></i> Bank Loan report</a></li>
				<li><a href="home_manager.php"><i class="fa fa-dashboard"></i> Current Projects</a></li>
				
					<li><a href="viwe_est_pro_cost_manager.php"><i class="fa fa-dashboard"></i> View  Estimated Project Cost</a></li>
				<li><a href="viwe_act_pro_cost_manager.php"><i class="fa fa-dashboard"></i> View Actual Project Cost</a></li>	
				<li><a href="viwe_cost_com_manaer.php"><i class="fa fa-dashboard"></i> View  project Cost Compare</a></li>
				<li><a href="viwe_fial_cost_manager.php"><i class="fa fa-dashboard"></i> View  project Cost Diffrence</a></li>					
				<li><a href="Manager_Approval.php"><i class="fa fa-dashboard"></i> Manager Approval</a></li>	
				
								
				
				
				

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



	<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Manager]  : MANAGER APPROVAL  <a/> </p>

		<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"> Manager Approval (Block Details)</div>
						<?php	
						if(Input::exists()){
						if(Input::get('btnapprove')){

							$id =	Input::get('txtidare');

							$user->update('tbl_property',array(


								
						 	"block_no" => Input::get('txtappblock'),
				            "b_area" => Input::get('txtapparea'),
				            "est_perch_price" => Input::get('txtappestpr'),
				            "P_name" => Input::get('txtappname'),
				            "approved_by_manager" => 2,

																							  			
																					  
							),$id);

							$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "  Manager Approval Blocks Details ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txtappblock').','.Input::get('txtapparea').','.Input::get('txtappname').','.Input::get('txtappestpr')
						            							            
							   


							            ));

							echo '<div class="alert alert-success">';
																								echo '    <a href="#" aria-label="close">&times;</a>';
																								echo '    <strong>Success!</strong> Data has been insert into Database.';
																								echo ' </div>';
								
						}}
							?>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

								<form name="frmAddProp" method="POST" action="#">
								<?php	
									$database = DB:: getinstance()->query("SELECT *  FROM tbl_property WHERE approved_by_manager =1"																	
																			);
																			if(!$database->count()){
																				echo "no userss";
																			}else{
																				foreach($database->results() as $database){
																					echo "<form name='frmLogin' method='POST' action='#'>";

																				echo	"<tbody>";
																				echo		"<tr>";
																				//echo	"<td> <input class='form-control' type='text' name='txtCnBNO' value= '$database->id' /></td>";
																				echo	"<td> <input class='form-control' type='text' name='txtappname' value= '$database->P_name' /></td>";
																				echo	"<td> <input class='form-control' type='text' name='txtappblock' value= '$database->block_no' /></td>";
																				echo	"<td> <input class='form-control' type='text' name='txtappestpr' value= '$database->est_perch_price' </td>";
																				echo	"<td> <input class='form-control' type='text' name='txtapparea' value= '$database->b_area' </td>";
																				;
																				
																				if($database->approved_by_manager =="1"  ){
																					echo	'<td> <span class="label label-warning">Pending</span> </td>';
																				}   

																				

																
																				echo	"<input type='hidden' name='txtidare' value= '$database->id' /> ";
																				
																				
																				
																				echo    '<th> <input class="btn btn-info" type="submit" name="btnapprove" value="approve" /> </th>';


																				


																				echo 	"</tr>";
																				echo "</tbody>";
																				echo "</form>";

																				}										
																			}
																			?>

									

								</form>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"> Manager Approval (Project)</div>
							<?php	
						if(Input::exists()){
						if(Input::get('btnapprove1')){

							$id =	Input::get('txtproid');

							$user->update('tbl_project',array(


								
						 	"location" => Input::get('txtappnlocat'),
				            "tot_area" => Input::get('txtapptotarea'),
				            "pj_name" => Input::get('txtappproname'),
				            "no_of_blocks" => Input::get('txtappnoblocks'),
				            "approved_by_manager" => 2,

																							  			
																					  
							),$id);

							$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "  Manager Approval Project  ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txtappnlocat').','.Input::get('txtapptotarea').','.Input::get('txtappproname').','.Input::get('txtappnoblocks')
						            							            
							   


							            ));

							echo '<div class="alert alert-success">';
							echo '    <a href="#" aria-label="close">&times;</a>';
							echo '    <strong>Success!</strong> Data has been insert into Database.';
							echo ' </div>';
								
						}}
							?>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

								<form name="frmAddProp" method="POST" action="#">
									
									<?php	
									$database = DB:: getinstance()->query("SELECT *  FROM tbl_project WHERE approved_by_manager =1"																	
																			);
																			if(!$database->count()){
																				echo "no userss";
																			}else{
																				foreach($database->results() as $database){
																					echo "<form name='frmLogin' method='POST' action='#'>";

																				echo	"<tbody>";
																				echo		"<tr>";
																				//echo	"<td> <input class='form-control' type='text' name='txtCnBNO' value= '$database->id' /></td>";
																				//echo    "<td> $database->district_id </td>";
																				echo	"<td> <input class='form-control' type='text' name='txtappnlocat' value= '$database->location' /></td>";
																				echo	"<td> <input class='form-control' type='text' name='txtapptotarea' value= '$database->tot_area' /></td>";
																				echo	"<td> <input class='form-control' type='text' name='txtappproname' value= '$database->pj_name' </td>";
																				echo	"<td> <input class='form-control' type='text' name='txtappnoblocks' value= '$database->no_of_blocks' </td>";
																				;
																				
																				if($database->approved_by_manager =="1"  ){
																					echo	'<td> <span class="label label-warning">Pending</span> </td>';
																				}   

																				

																
																				echo	"<input type='hidden' name='txtproid' value= '$database->id' /> ";
																				
																				
																				
																				echo    '<th> <input class="btn btn-info" type="submit" name="btnapprove1" value="approve" /> </th>';


																				


																				echo 	"</tr>";
																				echo "</tbody>";
																				echo "</form>";

																				}										
																			}
																			?>

									

								</form>
							</table>
						</div>
					</div>
				</div>


				<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"> Manager Approval (Discount)</div>
							<?php	
						if(Input::exists()){
						if(Input::get('btnapprove2')){

							$id =	Input::get('txtdisid');

							$user->update('tbl_project_discount',array(


								
						 	"perch_S_amount" => Input::get('txtappnsamount'),
				            "perch_E_amount" => Input::get('txtappeamount'),
				            "discount_amount" => Input::get('txtapppdisamount'),
				           
				            "approved_by_manager" => 2,

																							  			
																					  
							),$id);

							$user->create('login_sec',array(

					       		 		"Log_id" => $user->data()->id,
							            
							            "Login_time" => date("Y-m-d h:i:s"),
							            "Page" => "  Manager Approval Discount  ",
							            "COP_Pid" => $id,
							            "Activity" =>Input::get('txtappnsamount').','.Input::get('txtappeamount').','.Input::get('txtapppdisamount')
						            							            
							   


							            ));

							echo '<div class="alert alert-success">';
							echo '    <a href="#" aria-label="close">&times;</a>';
							echo '    <strong>Success!</strong> Data has been insert into Database.';
							echo ' </div>';
								
						}}
							?>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

								<form name="frmAddProp" method="POST" action="#">
									
									<?php	
									$database = DB:: getinstance()->query("SELECT *  FROM tbl_project_discount WHERE approved_by_manager =1"																	
																			);
																			if(!$database->count()){
																				echo "no userss";
																			}else{
																				foreach($database->results() as $database){
																					echo "<form name='frmLogin' method='POST' action='#'>";

																				echo	"<tbody>";
																				echo		"<tr>";
																				//echo	"<td> <input class='form-control' type='text' name='txtCnBNO' value= '$database->id' /></td>";
																				//echo    "<td> $database->district_id </td>";
																				echo	"<td> <input class='form-control' type='text' name='txtappnsamount' value= '$database->perch_S_amount' /></td>";
																				echo	"<td> <input class='form-control' type='text' name='txtappeamount' value= '$database->perch_E_amount' /></td>";
																				echo	"<td> <input class='form-control' type='text' name='txtapppdisamount' value= '$database->discount_amount' </td>";
																				
																				;
																				
																				if($database->approved_by_manager =="1"  ){
																					echo	'<td> <span class="label label-warning">Pending</span> </td>';
																				}   

																				

																
																				echo	"<input type='hidden' name='txtdisid' value= '$database->id' /> ";
																				
																				
																				
																				echo    '<th> <input class="btn btn-info" type="submit" name="btnapprove2" value="approve" /> </th>';


																				


																				echo 	"</tr>";
																				echo "</tbody>";
																				echo "</form>";

																				}										
																			}
																			?>

									

								</form>
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
	
}else{
	Redirect::to('index.php');
}