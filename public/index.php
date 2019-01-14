<?php
	require_once("core/init.php");
	$user = new User();
	
				if (Input::get('btnAdd')){
					$validate = new Validate(); 
					$validation =  $validate->check( $_POST ,array(

					'txtuser' => array(
						'name' => 'User name',
						'required'=>true
					), 
					'pass' => array(
						'name' => 'Password',
						'required'=>true
					)

					)); 


					if(!$validation->passed()){
						echo "<div class='err'>";
						$count = 1;
						foreach($validation->error() as $error){
							if($count>1){
								echo "<br />";
							}
							echo $error."&nbsp;&nbsp;&nbsp;"; 
							$count +=1;
						}
						echo "</div>";
					}else{
						
						$user = new User();
						
						$remember = (Input::get('textremem') === 'on') ? true :false;
						$login =$user->login(Input::get('txtuser'), Input::get('pass'),$remember );


						if($login){
							$un = Input::get('txtuser');
							$pw = Input::get('pass');
							$status = $user->status();
							
							if($status==true){
						
								if($user->hasPermission('admin')){
									Redirect::to('Admin_acc.php');

								}elseif($user->hasPermission('managing_director')){
									Redirect::to('Exe_viwe_Sec.php');

								}elseif($user->hasPermission('manager')){
									Redirect::to('Exe_viwe_fcash.php');
								
								}elseif ($user->hasPermission('executive')) {
									Redirect::to('Exe_home.php');			
								}
							}else{
								echo "<div class='err'> Your Account has been disabled. Contact the Administrator </div>";
							}
							
						}else{
							
							echo "<div class='err'> Incorrect User Name or Password </div>";
						}    
					}
				}
				
		
	
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


		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>
		<div class="login_top">
			<img src="images/logo.gif" class="login_top_logo">
			<div class="login_top_topic"> SILVEREEN REAL ESTATE COMPANY (PVT) LTD </div>
		</div>


		<div class="log-form">
			<div class="log-heading"> LOGIN </div>
			<div class="log-body">
				<table class="log-tbl" border="0">	
				
					<form name="frmAddProp" method="POST" action="">
						<div class="form-group">
						<tr>
							<td><span class="glyphicon glyphicon-user"></span> User Name </td>
							<td> 
								<input class="log-control"  type="text" name="txtuser" />
							</td>
						</tr>
						</div>
						
						<div class="form-group">
						<tr>

							<td><span class="glyphicon glyphicon-off"></span> Password</td>
							<td> 
								<input class="log-control"  type="password" name="pass" />
							</td>
						</tr>
						</div>

						<div class="form-group ">
							<td><span class="glyphicon glyphicon-save"> </span> Remember Me</td>
							<div class="col-sm-1">
							<td> 
							  <div class="chk"> <input  name="textremem"  type="checkbox" id="remember" class="log_chk"> </div>
							</td>
							</div>
						</div>
						
						<div class="form-group">
						<tr>
							<td colspan="2" id="log-tbl-btn"> 
							
							<input  class="btn" type="reset" name="btnClr" value="CLEAR" />
															
							<button class="btn" type="submit" name="btnAdd" value="LOGIN" ><span class="glyphicon glyphicon-unlock"></span> Login </button>
							</td>
						</tr>
						</div>
					</form>
				</table>
			</div>
		</div>
			

	<div class="login_bot">
		<ul class="ts-profile-nav">
			<li class="company"> "SILVEREEN CENTRE" <br /> No. 27, Katugastota Road, <br /> Kandy. </li>
		</ul>
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