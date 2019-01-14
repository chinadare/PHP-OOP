<?php
require_once("core/init.php");
$user = new User();
if ($user->hasPermission('executive')) {
	if(!$_SESSION['id']	 ==""){
		$pjid =  $_SESSION['id'];
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
		<div class="container">
		
		<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Clerk] : Add Block Price <a/> </p>
					<?php// $name = $_SESSION['b_name'];echo $name ;?>
							<h3>	<?php //$loca = $_SESSION['b_location'];echo $loca; ?> <?php// $name = $_SESSION['b_name'];echo $name ;?> </h3>

<?php																
	if(Input::exists()){
		if (Input::get('btnAddNewBlo')){

			$validate = new Validate();
			$validation = $validate->check($_POST, array(
					/*
						'txtBar' => array(
							  'required' => true,
							  'min' => 3,
							  'max' => 20
						  ),
							'txtEpr' => array(
							  'required' => true,
							  'min' => 1,
							  'max' => 20
						  )*/

					));

			 if($validation->passed()){
			 //	echo	$PjN = Input::get('cmb_project');

					try {
						$user->create('tbl_property',array(


							"block_no" => Input::get('cmbBNO'),
							"b_area" => Input::get('txtBar'),
							"est_perch_price" => Input::get('txtEpr'),
							
							"project_id" => $pjid,
							 "M_unit" => Input::get('cmbmunit')
							));

						 $user->create('login_sec',array(

						"Log_id" => $user->data()->id,
						
						"Login_time" => date("Y-m-d h:i:s"),
						"Page" => "Add Block Price",
						"COP_Pid" => $id,
						"Activity" => Input::get('cmbBNO').','.Input::get('txtBar').','.Input::get('txtEpr').','.Input::get('cmbName').','.Input::get('cmbIDD')
						
			   


						));



						echo '<div class="alert alert-success">';
						echo '    <a href="#" aria-label="close">&times;</a>';
						echo '    <strong>Success!</strong> Data has been insert into Database.';
						echo ' </div>';

						echo '<meta http-equiv="refresh" content="2">';

						} catch (Exception $e) {
						  die($e-> getMessage());
						}

			

								}else{
				
					foreach($validation->error() as $error){
					  if($error == 'txtBarrequired'){
							echo "<label id='error'>Block Area  is required </label>";
							echo "</br>";
						}elseif($error == 'txtEprrequired'){
							echo "<label id='error'>Estimate perch price  is required </label>";
							echo "</br>";
						}
					}

				}
		}	

	}																																 													 	
?>
<div class="col-md-5">
	<div class="panel panel-default">
		<div class="panel-heading">ADD block Price</div>		
		<div class="panel-body">
	 		<table class="table table-bordered table-striped">	 								
			<form name="frmAd" method="POST" action="#">
				<tr>
					<td> Block Number </td>
					<td> 
						
						<?php	
							$database = DB:: getinstance()->query("SELECT no_of_blocks FROM tbl_project WHERE  id='$pjid'");
							if(!$database->count()){
									echo "No Blocks Available";
							}else{
								foreach($database->results() as $database){
									$nblocks = $database->no_of_blocks;
								}
				
								$db = DB:: getinstance()->query("SELECT block_no FROM tbl_property WHERE  project_id='$pjid'");
								if(!$db->count()){
									$x = 1; 
									echo '<select class="form-control" name="cmbBNO" required>';
									while($x<=$nblocks){
							?>					
										<option value="<?php echo $x; ?>">
						
							<?php
										echo $x;
										echo '</option>';
										$x++;
									}
									
								}else{
									foreach($db->results() as $db){
										$BnoArry[] = $db->block_no;
									}
								
									$count = 0;
									$x = 1; 
									echo '<select class="form-control" name="cmbBNO" required>';
									while($x<=$nblocks){
										if(!in_array($x,$BnoArry)){ 	
							?>					
											<option value="<?php echo $x; ?>">
						
							<?php
											echo $x;
											echo '</option>';
											
											$count++;
										}
										$x++;
									}
									
									echo '</select>';
									
									if($count==0){
										echo "<div class='alert alert-warning'>";
										echo "No Blocks To Set Price!";
										echo "</div>";
									}
								}
							}
							
						?>
						
					</td>
				</tr>
				
				<div class="form-group">
				<tr>
					<td> Block Area </td>
					<td> 
						<input class="form-control" type="number" name="txtBar" value='<?php echo escape(Input::get('txtBar')); ?>' required />
						<div align="right">
						<select class="form-control"  name="cmbmunit" style="width:40%;">

							<option value="1">Perch</option>
						    <option value="2">Rood</option>
						    <option value="3">Arc</option>																			    
						</select>
						</div>
					</td>
				</tr>
				</div>

				<div class="form-group">
				<tr>
					<td>Estimated perch price </td>
					<td> 
						<input class="form-control"  type="number" name="txtEpr" placeholder='Rs : 0.00' required/>
					</td>
				</tr>
				</div>
			
				<div class="form-group">
				<tr>
					<td colspan="2"> 
					
					<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
													
					<input class="btn btn-info" type="submit" name="btnAddNewBlo" value="ADD" />
					 <a type="button" class="btn btn-warning" href="clogout.php" data-target='Signin'>GO back</a>

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
	
		Redirect::to("Add_block_details.php");
	}
}else{
	
	Redirect::to('index.php');
}


