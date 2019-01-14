<?php
	require_once("core/init.php");
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
			<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Administrator] : Add New User <a/> </p>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST"  && Input::get('btnAdd')){
		$validate = new Validate();
		$pw = Input::get('txtpw');
		$validation = $validate->check($_POST, array(   
			'txtemno' => array(
			  'name' => 'Employee No',
			  'required' => true,
			  'min' => 1,
			  'max' => 20
			),
			
			'txtfempnm' => array(
			  'name' => 'Employee name',
			  'required' => true,
			  'min' => 3,
			  'max' => 200
			),
			
			'txtCoNo' => array(
			  'name' => 'Employee Contact Number',
			  'required' => true,
			  'tpnumber' => true
			),	
			
			'cmbEtype' => array(
			  'name' => 'Employee Type',
			  'required' => true
			),
			
			'txtempnm' => array(
			  'name' => 'Display name',
			  'required' => true,
			  'min' => 3,
			  'max' => 20
			),
			
			'txtuser' => array(
			  'name' => 'Username',
			  'required' => true,
			  'min' => 3,
			  'max' => 20,  
			),
			
			'txtpw' => array(
			  'name' => 'Password',
			  'required' => true,
			  'min' => 3,
			  'max' => 20
			),
			
			'txtcpw' => array(
			  'name' => 'Confirm password',
			  'required' => true,     
			  //'match' => $pw
			)
		));

		if($validation->passed()){ 
			$database = DB:: getinstance()->get('users' , array('username' ,'=' , Input::get('txtuser')));
			if(!$database->count()){
				
				try {
					if(!empty($_FILES['file']['name'])){
						$imgname=$_FILES["file"]["name"];
						$temp_name=$_FILES["file"]["tmp_name"];
						
						$nname = md5(time());
						$tmp = explode(".", $imgname);
						$extension=end($tmp);
						
						$nnimgname = $nname.".".$extension;
						$target_path = "uploads/".$nnimgname;
						
						move_uploaded_file($temp_name, $target_path); 
							
					}else{				
						$target_path = "images/d_prof.png";
					}
					
					$salt = Hash::salt(32);
					
					$user->create('users',array(
						"Full_Emp_name" => Input::get('txtfempnm'),
						"Emp_name" => Input::get('txtempnm'),
						"EmpNo" => Input::get('txtemno'),
						"Con_No" => Input::get('txtCoNo'),
						"username" => Input::get('txtuser'),
						"empGroup" => Input::get('cmbEtype'),
						"password" => Hash::make(Input::get('txtpw'),$salt),
						"Salt" => $salt,
						"Image" => $target_path
						));  	
					echo "<div class='alert alert-success'><strong>Success!</strong> User has been added</div>";
				}catch (Exception $e){
					die($e-> getMessage());
				}
			}else{
				echo "<div class='alert alert-danger'> <strong> Error! &nbsp;&nbsp;-&nbsp;&nbsp; </strong> Username is already available</div>";
			}
		}else{
			$ecount=0;
			echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
			$len = count($validation->error());
			foreach($validation->error() as $error){
				if($ecount==5||$ecount==10){ echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
				echo "&nbsp;&nbsp;# ".$error;
				if (!($ecount == $len - 1)) {
					echo ",&nbsp;&nbsp;";
				}
				$ecount+=1;
			}
			echo "</div>";
		}
	} 
?>

				<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading"> Add New User </div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">

								<form name="frmAddProp" method="POST" enctype="multipart/form-data" action="#">
									
									<div class="form-group">
									<tr>
										<td> Employee No </td>
										<td> 
											<input class="form-control"  type="text" name="txtemno" value='<?php if(isset($ecount)&& $ecount>0){echo escape(Input::get('txtemno'));} ?>' required />
										</td>
									</tr>
									</div>
									
									<div class="form-group">
									<tr>
										<td> Employee name </td>
										<td> 
											<input class="form-control"  type="text" name="txtfempnm" value='<?php if(isset($ecount)&& $ecount>0){echo escape(Input::get('txtfempnm'));} ?>' required />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Employee Contact Number </td>
										<td> 
											<input class="form-control"  type="tel" name="txtCoNo" value='<?php if(isset($ecount)&& $ecount>0){echo escape(Input::get('txtCoNo'));} ?>' required />
										</td>
									</tr>
									</div>
									
									<div class="form-group">
									<tr>
										<td> Employee Type </td>
										<td> 
											<select class="form-control"  name="cmbEtype" required>
												<option value=""> - Select - </option>
												<option value="1"> Administrator </option>
												<option value="2"> Managing Director </option>
												<option value="3"> Manager </option>
												<option value="4"> Clerk </option>
											</select>
										</td>
									</tr>
									</div>
									
									<div class="form-group">
									<tr>
										<td> Display name </td>
										<td> 
											<input class="form-control"  type="text" name="txtempnm" value='<?php if(isset($ecount)&& $ecount>0){echo escape(Input::get('txtempnm'));} ?>' required />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Username </td>
										<td> 
											<input class="form-control"  type="text" name="txtuser" value='<?php if(isset($ecount)&& $ecount>0){echo escape(Input::get('txtuser'));} ?>' required />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td> Password </td>
										<td> 
											<input class="form-control"  type="password" name="txtpw"required />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td>  Password Again </td>
										<td> 
											<input class="form-control"  type="password" name="txtcpw"required />
										</td>
									</tr>
									</div>

									<div class="form-group">
									<tr>
										<td>  Image </td>

									 	<td>
											<input  name="file" value="" type="file" >
									 
										</td>
									</tr>
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
?>