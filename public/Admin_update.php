<?php
	require_once("core/init.php");
	//ini_set('error_reporting', E_ALL & ~E_NOTICE);
	$user = new User();
	if ($user->hasPermission('admin')) {
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

		<style>
			.modal-header, h4, .close {
				background-color: #5cb85c;
				color:white !important;
				text-align: center;
				font-size: 30px;
			}
			
			.modal-footer {
				background-color: #f9f9f9;
			}
		</style>
		
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

	</head>

<body>
	<div class="brand clearfix">
		<a href="index.html" class="logo"><img src="includes/style/img/logo.gif" class="img-responsive" alt=""></a>
		<div class="top_topic"> SILVEREEN REAL ESTATE COMPANY (PVT) LTD </div>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li><a href="#">Help</a></li>
			<li class="ts-account">
				<a href="#"><img src="<?php echo $user->data()->Image; ?>" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="Admin_change_prof.php"> Edit My Account</a></li>
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
				<li><a href="Admin_acc.php"><i class="fa fa-dashboard"></i> Edit User</a></li>
				
				<li><a href="Admin_Create_user.php"><i class="fa fa-table"></i> Add New User</a></li>
				<li><a href="Admin_del.php"><i class="fa fa-table"></i> Delete User</a></li>
				<li><a href="Admin_en_des.php"><i class="fa fa-table"></i> Temporary Banned user</a></li>
			</ul>
		</nav>
		<div class="content-wrapper">
		<div class="container-fluid">

		<div class="container">
			<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Administrator] : Edit User <a/> </
			<div class="col-md-5">
				<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading"> Edit User </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
						<?php
							$id = Input::get('txtid');
	
							$database = DB:: getinstance()->get('users' , array('id' ,'=' , $id));
							
							foreach($database->results() as $database){
						?>
							
							<form name='frmUpdate' method='POST' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							<tbody>
								<div class="form-group">
								<tr>
									<td> Employee ID </td>
									<td> 
										<input class="form-control"  type="text" name="txteno"  value= '<?php echo $database->EmpNo; ?>' />
									</td>
								</tr>
								</div>
								
								<div class="form-group">
								<tr>
									<td> Employee Name </td>
									<td> 
										<input class="form-control"  type="text" name="txtenm"  value= '<?php echo $database->Emp_name; ?>' />
									</td>
								</tr>
								</div>
								
								<div class="form-group">
								<tr>
									<td> Employee Type </td>
									<td> 
										<?php $type = $database->empGroup; ?>
										<select class='form-control' name='cmbtype'>
											<option value='1' <?php if($type==1)echo 'selected="selected"';?>>Administrator</option>
											<option value='2' <?php if($type==2)echo 'selected="selected"';?>>Managing Director</option>
											<option value='3' <?php if($type==3)echo 'selected="selected"';?>>Manager</option>
											<option value='4' <?php if($type==4)echo 'selected="selected"';?>>Clerk</option>
										</select>
									</td>
								</tr>
								</div>
								
								<div class="form-group">
								<tr>
									<td> Mobile Number </td>
									<td> 
										<input class='form-control' type='text' name='txttp' value= '<?php echo $database->Con_No; ?>' />
									</td>
								</tr>
								</div>
								
								<div class="form-group">
								<tr>
									<td> User Name </td>
									<td> 
										<input class='form-control' type='text' name='txtun' disabled value= '<?php echo $database->username; ?>' />
									</td>
								</tr>
								</div>
								
								<div class="form-group">
								<tr>
									<td> Reset Password </td>
									<td> 
										&nbsp;&nbsp;<input type='radio' name='rbtpw' value="0" checked /> No
										<input type='radio' name='rbtpw' value="1" /> Yes
									</td>
								</tr>
								</div>
								
								<div class="form-group">
								<tr>
									<td colspan="2"> 
										<input type='hidden' name='txtid1' value= '<?php echo $id; ?>' /> 
										<button class="btn btn-info" type="submit" name="btnupdate2"  /> update </button>
										<a type="button" class="btn btn-success" href="Admin_acc.php" data-target="Signin">GO back</a>	
									</td>
								</tr>
								</div>
							</tbody>
							</form>
						<?php																		
							}								
						?>
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
	<script src="includes/style/js/regDivSecDiv.css"> </script>

</body>

</html>

<?php
		if(isset($_POST['btnupdate2'])){
			$id = Input::get('txtid1');
			$eno = Input::get('txteno');
			$ename = Input::get('txtenm');
			$etype = Input::get('cmbtype');
			$etp = Input::get('txttp');
			$epw = Input::get('rbtpw');

			try{
				if($epw=='1'){
					$salt = Hash::salt(32);
					
					$user->update('users',array(
					'EmpNo' => $eno,
					'Emp_name' => $ename,
					'empGroup' => $etype,
					'Con_No' => $etp,
					'password' => Hash::make('123',$salt),
					"Salt" => $salt,
					),$id);	
				}else{
					$user->update('users',array(
					'EmpNo' => $eno,
					'Emp_name' => $ename,
					'empGroup' => $etype,
					'Con_No' => $etp,
					),$id);	
				}	
			}catch(Exception $e){
				die($e->getMessage());
			}
			
			Redirect::to('Admin_acc.php');
		}
	}else{
		Redirect::to('index.php');
	}
?>