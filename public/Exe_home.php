<?php
require_once("core/init.php");
ini_set('error_reporting', E_ALL & ~E_NOTICE);

		if (Input::get('btnAddHome2')){	
			$_SESSION['id'] = Input::get('txtid');
			Redirect::to("Exe_home2.php");
		}

$user = new User();
if ($user->hasPermission('executive')) {
	
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
				
				<li class="open"><a  href="Exe_home.php"><i class=" fa fa-dashboard"></i> Home</a></li>

			

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
		
			<p style="font-size:120%;">  Welcome <a href="#" ><?php echo escape($user->data()->Emp_name);  ?> [Clerk] : View Projects <a/> </p>

		

					<div class="col-md-11">
				<div class="panel panel-default">
					<div class="panel-heading">Current Prjects</div>
						<div class="panel-body">
	 						<table class="table table-bordered table-striped">
	
								 <thead>								 					
								<tr class="info" >
									<th>Project Name</th>
									<th>Project District</th>
									<th>Project Location</th>
									<th>Blocks No</th>
									<th>View Blocks</th>
								</tr>
								</thead>						
<?php
	$tbl_name="tbl_project"; //your table name
	
	$adjacents = 3;
	
	//Where clause have to be added
	$query = "SELECT COUNT(*) as num FROM $tbl_name";
	
	$total_pages = DB:: getinstance()->query($query);
	

	foreach($total_pages->results() as $total_pages){
		$total_pages = $total_pages->num;
	}
	$targetpage = "Exe_home.php"; /* page name */	
		
	$limit = 10; //how many items to show per page							
	
	if(isset($_GET['limit']))
	$limit=$_GET['limit'];
	
	if(isset($_GET['page']))
	$page = $_GET['page'];

	if($page) 

		$start = ($page - 1) * $limit; 		

	else

		$start = 0;	

	/* Get data. */						

	$sql = "SELECT * FROM tbl_project  JOIN tbl_district ON tbl_project.district_id=tbl_district.dis_id ORDER BY tbl_project.id asc LIMIT $start, $limit ";	
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
		echo "No Projects To Show!. First Add Projects";
		echo "</div>";
	}
	foreach($result->results() as $database){
		echo "<form name='frmLogin' method='POST' action='#'>";
		
		echo	"<tbody>";
		echo	"<tr>";
		
		echo	" <td> $database->pj_name </td> ";
		echo	"<td> $database->district </td> ";
		echo	"<td> $database->location </td>";
		echo	"<td> $database->no_of_blocks </td>";
		echo	"<input type='hidden' name='txtid' value= '$database->id' /> ";
		echo	"<input type='hidden' name='txtloca' value= '$database->location' /> ";
		echo	"<input type='hidden' name='txtname' value= '$database->pj_name' /> ";
		
		echo 	'<td colspan="4"> ';									
		echo 	'<input class="btn btn-info"  type="submit" name="btnAddHome2" value="Select Project" />';
		echo 	'</td>';
		echo	"</tbody>";
		echo	"</tr>";				
		echo 	"</form>";
	}

?>
							
							</table>
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
	Redirect::to('index.php');
}