<?php
	require_once("core/init.php");
$user = new User();
	if (Input::get('btnAdd')){
	$validate = new Validate(); 
    $validation =  $validate->check( $_POST ,array(

      'txtuser' => array('required'=>true), 
      'pass' => array('required'=>true)

      )); 


      if($validation->passed()){
        $user = new User();


        $remember = (Input::get('textremem') === 'on') ? true :false;
        $login =$user->login(Input::get('txtuser'), Input::get('pass'),$remember );


        if($login){
          Redirect::to('index.php');
        }else{
          echo "something wrong";
        }

      }else{
        foreach($validation->error() as $error){
          echo $error, "</br>";
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

	<title>Silvereen Real Estate (Pvt) Ltd</title>



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
	<div class="brand clearfix">
		<a href="index.html" class="logo"><img src="includes/style/img/logo.jpg" class="img-responsive" alt=""></a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li><a href="#">Help</a></li>
			<li><a href="#">Settings</a></li>
			<li class="ts-account">
				<a href="#"><img src="includes/style/img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="Login.php">Login Account</a></li>
					<li><a href="#">Create Account</a></li>
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
				<li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				
				<li><a href="tables.html"><i class="fa fa-table"></i> Tables</a></li>
				
				
				
				<li class="open"><a href="#"><i class="fa fa-files-o"></i> Sample Pages</a>
					<ul>
						<li class="open"><a href="blank.html">Blank page</a></li>
						<li><a href="login.html">Login page</a></li>
					</ul>
				</li>

				<!-- Account from above -->
				<ul class="ts-profile-nav">
					<li><a href="#">Help</a></li>
					<li><a href="#">Settings</a></li>
					<li class="ts-account">
						<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
						<ul>
							<li><a href="#">My Account</a></li>
							<li><a href="#">Edit Account</a></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</li>
				</ul>

			</ul>
		</nav>
		<div class="content-wrapper">
			<div class="container-fluid">

				
									
		<div class="container">
			
					<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading">ADD PROJECT</div>
						<div class="panel-body">
	 						<table >
						
					<form name="frmAddProp" method="POST" action="">

							
									<div class="form-group">
									<tr>
										<td><label class="col-sm-3 control-label" for="remember"><small> User Name</small></label> </td>
										<td> 
											<input class="form-control"  type="text" name="txtuser" />
										</td>
									</tr>
									</div>
									
									<div class="form-group">
									<tr>

										<td> <label class="col-sm-3 control-label" for="remember"><small>Password</small></label> </td>
										<td> 
											<input class="form-control"  type="password" name="pass" />
										</td>
									</tr>
									</div>

									 <div class="form-group ">
					                   <td> <label class="col-sm-3 control-label" for="remember"><small>Remember Me</small></label></td>
					                    <div class="col-sm-1">
					                    	<td> 
					                      <input  name="textremem"  type="checkbox" id="remember">
					                      </td>
					                    </div>
					                  </div>
									
									<div class="form-group">
									<tr>
										<td colspan="2"> 
										
										<input class="btn btn-warning" type="reset" name="btnClr" value="CLEAR" />
																		
										<input class="btn btn-info" type="submit" name="btnAdd" value="ADD" />
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


	