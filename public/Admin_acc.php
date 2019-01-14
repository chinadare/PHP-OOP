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
				<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Administrator] : Home - Edit User <a/> </p>
				<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"> Select Users To Edit </div>
					<div class="panel-body">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Employee ID</th>
									<th>Employee Name</th>
									<th>Type</th>
									<th>Mobile Number</th>
									<th>Edit</th>
								</tr>
							</thead>
							<?php
								$database = DB:: getinstance()->query("SELECT * FROM users");
								if(!$database->count()){
									echo "No Users To Display!";
								}else{
									foreach($database->results() as $database){
										echo "<form name='frmLogin' method='POST' action='Admin_update.php'>";
										echo	"<tbody>";
										echo	"<tr>";
										echo	"<td> $database->EmpNo </td>";
										echo	"<td> $database->Emp_name </td>";
										
										$type = $database->empGroup;
										if($type==1){
											$group = "Administrator";
										}elseif($type==2){
											$group = "Managing Director";
										}elseif($type==3){
											$group = "Manager";
										}else{
											$group = "Clerk";
										}
										
										echo	"<td>  $group </td>";
										echo	"<td> $database->Con_No </td>";
									

										echo    '<th> <button class="btn btn-info" type="submit" name="btnupdate"  /> Select </button> </th>';
										//echo    '<th> <button class="btn btn-danger" type="submit" name="btndelete"  /> delete </button> </th>';
										echo	"<input type='hidden' name='txtid' value= '$database->id' /> ";


										echo "</tr>";
										echo "</tbody>";
										echo "</form>";

									}
									if(Input::exists()){
										if(isset($_POST['btnupdate'])){
											$id = Input::get('txtid');
											$gp = Input::get('txtgp');

											try{
													$user->update('users',array(

													 'groupssss' => $gp 
														
											  
													),$id);

											}catch(Exception $e){
												die($e->getMessage());
											}

										}elseif(isset($_POST['btndelete'])){
											$id = Input::get('txtid');

											try{

												$user->delete('users',array(

													'id' ,'=' ,$id

													));

											}catch(Exception $e){
												die($e->getMessage());
											}
										}

									}
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

</body>

</html>

<?php
	
	}else{
		Redirect::to('index.php');
	}
?>