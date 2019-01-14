<?php
	require_once("core/init.php");
	ini_set('error_reporting', E_ALL & ~E_NOTICE);
	$user = new User();
	if ($user->hasPermission('executive')) {
	
		if(!$_SESSION['id'] ==""){
			
			$pid = $_SESSION['id'];
								
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

				

				
				
				
			

				<!-- Account from above -->
				<ul class="ts-profile-nav">
			<li><a href="#">Help</a></li>
			<li class="ts-account">
				<a href="#"><img src="includes/style/img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
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
		
			<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Clerk] : View Blocks  <a/> </p>
							<?php
								$tblproject = DB:: getinstance()->query("SELECT * FROM tbl_project WHERE id='$pid'");
								foreach($tblproject->results() as $database){

									$name = $database->pj_name;	
									$loca = $database->location;	
								}
							?>
							<h3 id='heading' ><?php echo $name;  echo " - "; echo $loca; ?> </h3>
								

					<div class="col-md-10">
				<div class="panel panel-default">
				
					<div class="panel-heading">Block Details</div>

												<div class="panel-body">
							<table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
								 

								 <thead>
								<tr class="info">
								<th>Block No</th>
								<th>Block Area</th>
								<th>Estimated Price</th>
								<th>Status</th>
								</tr>
								</thead>
<?php

	$tbl_name="tbl_property"; //your table name
	
	$adjacents = 3;
	
	//Where clause have to be added
	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE project_id='$pid'";
	
	$total_pages = DB:: getinstance()->query($query);
	

	foreach($total_pages->results() as $total_pages){
		$total_pages = $total_pages->num;
	}
	$targetpage = "Exe_home2.php"; /* page name */	
		
	$limit = 4; //how many items to show per page							
	
	if(isset($_GET['limit']))
	$limit=$_GET['limit'];
	
	
	$page = $_GET['page'];

	if($page) 

		$start = ($page - 1) * $limit; 		

	else

		$start = 0;	

	/* Get data. */						
				

	$sql = "SELECT *  FROM tbl_property WHERE project_id = '$pid' ORDER BY id asc LIMIT $start, $limit ";													
	$result = DB::getinstance()->query($sql);	

	if ($page == 0) $page = 1;				

	$prev = $page - 1;					

	$next = $page + 1;				

	$lastpage = ceil($total_pages/$limit);	

	$lpm1 = $lastpage - 1;			
	

	$pagination = "";

	if($lastpage > 1)

	{	
		$pagination .= "<div class=\"pagination\">";
		
		if ($page > 1) 

			$pagination.= "<a href=\"$targetpage?page=$prev&limit=$limit\">&laquo; previous&nbsp;&nbsp;&nbsp;</a>";

		else

			$pagination.= "<span class=\"disabled\">&laquo; previous&nbsp;&nbsp;&nbsp;</span>";	
		

		if ($lastpage < 7 + ($adjacents * 2))	
		{	

			for ($counter = 1; $counter <= $lastpage; $counter++)

			{

				if ($counter == $page)

					$pagination.= "<span class=\"current\">&nbsp;&nbsp;&nbsp;$counter&nbsp;&nbsp;&nbsp;</span>";

				else

					$pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">&nbsp;&nbsp;&nbsp;$counter&nbsp;&nbsp;&nbsp;</a>";					

			}

		}

		elseif($lastpage > 5 + ($adjacents * 2))	

		{

			if($page < 1 + ($adjacents * 2))		

			{

				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">&nbsp;&nbsp;&nbsp;$counter&nbsp;&nbsp;&nbsp;</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">&nbsp;&nbsp;&nbsp;$counter&nbsp;&nbsp;&nbsp;</a>";					

				}

				$pagination.= "...";

				$pagination.= "<a href=\"$targetpage?page=$lpm1&limit=$limit\">&nbsp;&nbsp;&nbsp;$lpm1&nbsp;&nbsp;&nbsp;</a>";

				$pagination.= "<a href=\"$targetpage?page=$lastpage&limit=$limit\">&nbsp;&nbsp;&nbsp;$lastpage&nbsp;&nbsp;&nbsp;</a>";		

			}

			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))

			{

				$pagination.= "<a href=\"$targetpage?page=1&limit=$limit\">&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;</a>";

				$pagination.= "<a href=\"$targetpage?page=2&limit=$limit\">&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;</a>";

				$pagination.= "...";

				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">&nbsp;&nbsp;&nbsp;$counter&nbsp;&nbsp;&nbsp;</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">&nbsp;&nbsp;&nbsp;$counter&nbsp;&nbsp;&nbsp;</a>";					

				}

				$pagination.= "...";

				$pagination.= "<a href=\"$targetpage?page=$lpm1&limit=$limit\">&nbsp;&nbsp;&nbsp;$lpm1&nbsp;&nbsp;&nbsp;</a>";

				$pagination.= "<a href=\"$targetpage?page=$lastpage&limit=$limit\">&nbsp;&nbsp;&nbsp;$lastpage&nbsp;&nbsp;&nbsp;</a>";		

			}

			else
			{

				$pagination.= "<a href=\"$targetpage?page=1&limit=$limit\">&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;</a>";

				$pagination.= "<a href=\"$targetpage?page=2&limit=$limit\">&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;</a>";

				$pagination.= "...";

				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">&nbsp;&nbsp;&nbsp;$counter&nbsp;&nbsp;&nbsp;</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">&nbsp;&nbsp;&nbsp;$counter&nbsp;&nbsp;&nbsp;</a>";					

				}

			}

		}


		if ($page < $counter - 1) 

			$pagination.= "<a href=\"$targetpage?page=$next&limit=$limit\"> &nbsp;&nbsp;&nbsp;next &raquo;</a>";

		else

			$pagination.= "<span class=\"disabled\"> &nbsp;&nbsp;&nbsp; next &raquo;</span>";

		$pagination.= "</div>\n";		

	}
				
	if(!$result->count()){
		echo "<div class='alert alert-danger'><strong>Error!&nbsp;&nbsp;-&nbsp;&nbsp;</strong>";
		echo "No Block Details To Show!. First Add Blocks To The Project";
		echo "</div>";
	}else{
		foreach($result->results() as $database){
			echo "<form name='frmLogin' method='POST' action=''>";

			echo	"<tbody>";
			echo		"<tr>";
			echo	"<td> $database->block_no </td>";
			echo	"<td> $database->b_area </td>";
			echo	"<td> $database->est_perch_price </td>";

			
			if($database->status =="1"  ){
				echo	'<td> <span class="label label-success">Avallabe</span> </td>';
			}if($database->status =="2"  ){
				echo	'<td> <span class="label label-info">Reserved</span> </td>';
			}if($database->status =="3"  ){
				echo	'<td> <span class="label label-primary">Soled</span> </td>';
			}if($database->status =="4"  ){
				echo	'<td> <span class="label label-danger">Re-Soled</span> </td>';
			}    

			echo	"<input type='hidden' name='txtid' value= '$database->id' /> ";

			echo 	"</tr>";
			echo "</tbody>";
			echo "</form>";

		}										
	}
?>
								
							</table>
							<div align="center"> <a type="button" class="btn btn-success" href="Exe_home.php" data-target="Signin">GO back</a> </div>
							<div align="center" style="font-family:Arial Black;">
								<?php echo $pagination ?>	
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
			Redirect::to('Exe_home.php');
		}
}else{
	Redirect::to('index.php');
}