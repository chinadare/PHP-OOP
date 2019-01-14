<?php
	require_once("core/init.php");
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


	  <script src="includes/javascript/ie.js"></script>



	  
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
											echo "No Record";
										}else{
											
											foreach($database->results() as $database){

											echo	'<img src="'.$database->Image.'" class="ts-avatar hidden-side" alt="">';	

											}}
							?> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="#"> Edit My Account</a></li>
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

				<li><a href="Exe_viwe_Sec.php"><i class="fa fa-dashboard"></i> Activity Log</a></li>

				<li><a href="addProperty.php"><i class="fa fa-dashboard"></i> Add New Project</a></li>

				

				<li><a href="Add_block_details.php"><i class="fa fa-dashboard"></i> Add Block Price</a></li>

				<li><a href="Exe_create_discount.php"><i class="fa fa-dashboard"></i> Add Discount</a></li>

				<li><a href="application.php"><i class="fa fa-dashboard"></i> Add Customer</a></li>

				<li><a href="Exe_viwe_customer.php"><i class="fa fa-dashboard"></i> View Customer</a></li>

				<li><a href="Conti_purchase.php"><i class="fa fa-dashboard"></i> Customer Purchase</a></li>

				<li><a href="Exe_viwe_fcash.php"><i class="fa fa-dashboard"></i> Full Cash List</a></li>

				<li><a href="update_project.php"><i class="fa fa-dashboard"></i> Update project Details</a></li>

			<!--	<li><a href="Exe_fullPayment.php"><i class="fa fa-dashboard"></i> Customer purchase</a></li> -->

				

				

				<li><a href="cost_of_p.php"><i class="fa fa-dashboard"></i> Cost Of Projects</a></li>

				<li><a href="viwe_cost_of_pro.php"><i class="fa fa-dashboard"></i> View Project Cost</a></li>

				<li><a href="check.php"><i class="fa fa-dashboard"></i> Check Recipt</a></li>
				
				<li><a href="exe.php"><i class="fa fa-dashboard"></i> Summery</a></li>				
				
				
			

				<!-- Account from above -->
					<ul class="ts-profile-nav">
			<li><a href="#">Help</a></li>
			<li class="ts-account">
				<a href="#"><img src="includes/style/img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="Exe_changePW.php"> Edit My Account</a></li>
					<li><a href="logout.php">Logout </a></li>
				</ul>
			</li>
		</ul>

			</ul>
		</nav>
		<div class="content-wrapper">
			<div class="container-fluid">

				
		<div class="container">
			
			

    <!-- Begin page content -->
    <div class="container content">
    	<div class='row'>
    		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
    			<h1 class="text-center title">Invoice System Using jQuery AutoComplete</h1>
    		</div>
    	</div>
      	<h2>From,</h2>
    	<div class='row'>
      		<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
      			<div class="form-group">
					<input type="email" class="form-control" id="companyName" placeholder="Company Name">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows='3' id="companyAddress" placeholder="Your Address"></textarea>
				</div>
      		</div>
      	</div>
      	<h2>To,</h2>
      	<div class='row'>
      		<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
      			<div class="form-group">
					<input type="email" class="form-control" id="clientCompanyName" placeholder="Company Name">
				</div>
				<div class="form-group">
					<textarea class="form-control" rows='3' id="clientAddress" placeholder="Your Address"></textarea>
				</div>
				
      		</div>
      		<div class='col-xs-12 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-sm-4 col-md-4 col-lg-4'>
      			<div class="form-group">
					<input type="number" class="form-control" id="invoiceNo" placeholder="Invoice No">
				</div>
				<div class="form-group">
					<input type="date" class="form-control" id="invoiceDate" placeholder="Invoice Date">
				</div>
				<div class="form-group">
					<input type="number" class="form-control amountDue" id="amountDueTop" placeholder="Amount Due">
				</div>
      		</div>
      	</div>
      	<h2>&nbsp;</h2>
      	<div class='row'>
      		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
      			<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
							<th width="15%">Item No</th>
							<th width="38%">Item Name</th>
							<th width="15%">Price</th>
							<th width="15%">Quantity</th>
							<th width="15%">Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input class="case" type="checkbox"/></td>
							<td><input type="text" data-type="productCode" name="itemNo[]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off"></td>
							<td><input type="text" data-type="productName" name="itemName[]" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off"></td>
							<td><input type="number" name="price[]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
							<td><input type="number" name="quantity[]" id="quantity_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
							<td><input type="number" name="total[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
						</tr>
					</tbody>
				</table>
      		</div>
      	</div>
      	<div class='row'>
      		<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
      			<button class="btn btn-danger delete" type="button">- Delete</button>
      			<button class="btn btn-success addmore" type="button">+ Add More</button>
      		</div>
      		<div class='col-xs-12 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-sm-5 col-md-5 col-lg-5'>
				<form class="form-inline">
					<div class="form-group">
						<label>Subtotal: &nbsp;</label>
						<div class="input-group">
							<div class="input-group-addon">$</div>
							<input type="number" class="form-control" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
						</div>
					</div>
					<div class="form-group">
						<label>Tax: &nbsp;</label>
						<div class="input-group">
							<div class="input-group-addon">$</div>
							<input type="number" class="form-control" id="tax" placeholder="Tax" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
						</div>
					</div>
					<div class="form-group">
						<label>Tax Amount: &nbsp;</label>
						<div class="input-group">
							<input type="number" class="form-control" id="taxAmount" placeholder="Tax" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
							<div class="input-group-addon">%</div>
						</div>
					</div>
					<div class="form-group">
						<label>Total: &nbsp;</label>
						<div class="input-group">
							<div class="input-group-addon">$</div>
							<input type="number" class="form-control" id="totalAftertax" placeholder="Total" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
						</div>
					</div>
					<div class="form-group">
						<label>Amount Paid: &nbsp;</label>
						<div class="input-group">
							<div class="input-group-addon">$</div>
							<input type="number" class="form-control" id="amountPaid" placeholder="Amount Paid" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
						</div>
					</div>
					<div class="form-group">
						<label>Amount Due: &nbsp;</label>
						<div class="input-group">
							<div class="input-group-addon">$</div>
							<input type="number" class="form-control amountDue" id="amountDue" placeholder="Amount Due" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
						</div>
					</div>
				</form>
			</div>
      	</div>
      	<h2>Notes: </h2>
      	<div class='row'>
      		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
      			<div class="form-group">
					<textarea class="form-control" rows='5' id="notes" placeholder="Your Notes"></textarea>
				</div>
      		</div>
      	</div>		
    </div>

		</div>	

			
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="includes/javascript/jquery.min.js"></script>
	<script src="includes/javascript/bootstrap-select.min.js"></script>
	<script src="includes/javascript/bootstrap.min.js"></script>
	<script src="includes/javascript/jquery.dataTables.min.js"></script>
	<script src="includes/javascript/dataTables.bootstrap.min.js"></script>
	<script src="includes/javascript/Chart.min.js"></script>
	<script src="includes/javascript/fileinput.js"></script>
	<script src="includes/javascript/chartData.js"></script>
	<script src="includes/javascript/main.js"></script>

	 <script src="includes/javascript/jquery.min.js"></script>
    <script src="includes/javascript/jquery-ui.min.js"></script>
    <script src="includes/javascript/bootstrap.min.js"></script>
    <script src="includes/javascript/bootstrap-datepicker.js"></script>
    <script src="includes/javascript/auto.js"></script>

</body>

</html>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST"  && Input::get('btnAdd')){

		$validate = new Validate(); 
    	$validation =  $validate->check( $_POST ,array(

		      'cmbDis' => array('required'=>true), 
		      'cmbDis2' => array('required'=>true), 
		      'cmbDis3' => array('required'=>true), 
		      'txtPprice' => array('required'=>true),
		      'txtEprice' => array('required'=>true),
		      'txtdeposite' => array('required'=>true),
		      'txtTprice' => array('required'=>true),
		      'txtNoinc' => array('required'=>true),
		      'txtinc' => array('required'=>true),
		      'txtReb' => array('required'=>true),
		      'rbtch' => array('required'=>true)


		 ));

    	 if($validation->passed()){
        		
       		 try {
       		 	
       		 	$date = date('Y-m-d', strtotime('+1 month'));

       		 	$user->create('tbl_customer_purchase',array(

       		 		"c_name" => Input::get('cmbDis2'),
		            "pr_name" => Input::get('cmbDis'),
		            "Customer_table_id" => Input::get('cmbDis3'),
		            "perch_price" => Input::get('txtPprice'),
		            "ep_price" => Input::get('txtEprice'),
		            "deposite" => Input::get('txtdeposite'),
		            "tot_price" => Input::get('txtTprice'),
		            "no_installment" => Input::get('txtNoinc'),
		            "installment" => Input::get('txtinc'),
		            "Block_No" => Input::get('txtReb'),
		            "j_Date" => date("Y-m-d H:i:s"),
		            "due_Date" => $date,
		            "payment_type" => Input::get('rbtch')
		   


		            ));
			        //  Session::flash("home","oye");
			          //Redirect::to(404);
		        

       		  	} catch (Exception $e) {
		          die($e-> getMessage());
		        }
		        
		     	}else{
		   		  foreach($validation->error() as $error){

		   		  		if($error == 'txtPpricerequired'){
							echo "<label id='error'>Perch price  is required </label>";
							echo "</br>";
						}elseif($error == 'txtEpricerequired'){
							echo "<label id='error'> Expected price is required </label>";
							echo "</br>";
						}elseif($error == 'txtdepositerequired'){
							echo "<label id='error'> Deposite  is required </label>";
							echo "</br>";
						}elseif($error == 'tot_pricerequired'){
							echo "<label id='error'> Total Price  is required </label>";
							echo "</br>";
						}elseif($error == 'txtDRC5required'){
							echo "<label id='error'> Retaining Walls   is required </label>";
							echo "</br>";
						}elseif($error == 'txtDRC6required'){
							echo "<label id='error'> Sub Total   is required </label>";
							echo "</br>";
						}

		   		  }
		    	
		  		}
 	



		

	}	

	/*if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['btnAdd'])){
		
		$district = $db->escape($_POST['cmbDis']);
		$location = $db->escape($_POST['txtPLoca']);
		$pjname = $db->escape($_POST['txtPName']);
		$tot_area = $db->escape($_POST['txtTotArea']);
		$no_block = $db->escape($_POST['txtNoBlock']);
		
		$sql = "INSERT INTO tbl_project (district_id, location, tot_area,  pj_name, no_of_blocks) 
				VALUES('$district', '$location', '$tot_area',	'$pjname', '$no_block')";
		$res = $db -> query($sql);
		echo $res;
	}*/
}else{
	Redirect::to('index.php');
}

?>