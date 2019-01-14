<?php
  require_once("core/init.php");
$user = new User();
if ($user->hasPermission('executive')) {
   $zid = Input::get('txtid1');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="A basic demo of Cropper.">
  <meta name="keywords" content="HTML, CSS, JS, JavaScript, jQuery plugin, image cropping, image crop, image move, image zoom, image rotate, image scale, front-end, frontend, web development">
  <meta name="author" content="Fengyuan Chen">
  <title>Cropper</title>
  <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../dist/cropper.css">
  <link rel="stylesheet" href="css/main.css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <!-- Header -->
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
  <link rel="stylesheet" href="css/image.css">


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


                 $database = DB:: getinstance()->query("SELECT * FROM users WHERE id=' $id'");

                  if(!$database->count()){
                      die ("no user");
                    }else{
                      
                      foreach($database->results() as $database){

                      echo  '<img src="'.$database->Image.'" class="ts-avatar hidden-side" alt="">';  

                      }}
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
        
        
        <li><a href="../../Exe_home.php"><i class="fa fa-dashboard"></i> Home</a></li>

      

        <li><a href="../../addProperty.php"><i class="fa fa-dashboard"></i> Add New Project</a></li>

        

        <li><a href="../../Add_block_details.php"><i class="fa fa-dashboard"></i> Add Block Price</a></li>

        <li><a href="../../Exe_create_discount.php"><i class="fa fa-dashboard"></i> Add Discount</a></li>

        <li><a href="../../application.php"><i class="fa fa-dashboard"></i> Add Customer</a></li>

        <li><a href="../../Exe_viwe_customer.php"><i class="fa fa-dashboard"></i> View Customer</a></li>

        <li><a href="../../Conti_purchase.php"><i class="fa fa-dashboard"></i> Customer Purchase</a></li>

        <li><a href="../../Conti_payment.php"><i class="fa fa-dashboard"></i> Customer Payment</a></li>

        

      
        <li><a href="../../Exe_resell.php"><i class="fa fa-dashboard"></i> Land Resell</a></li> 
        

        

        <li><a href="../../cost_of_p.php"><i class="fa fa-dashboard"></i> Cost Of Projects</a></li>

        
 
        
    
        
        
        

        <!-- Account from above -->
  

      </ul>
    </nav>
</div>
  <!-- Content -->


  <div class="container" >

  
   <div id='imageD'>



      <h3> Back Page With Road </h3>
        <!-- <h3 class="page-header">Demo:</h3> -->
               
            <?php
    $database = DB:: getinstance()->query("SELECT road_image FROM tbl_customer WHERE c_id='$zid'");

                  if(!$database->count()){
                      die ("no user");
                    }else{
                      
                      foreach($database->results() as $database){
                          $path = '../../'.$database->road_image;
                      echo  '<img width="800" height="600" id="image" src="'.$path.'"  alt="No Image Uploaded">';  
                       $database->road_image;

                      }}
    ?>


         <!-- <img id="image" src="../assets/img/picture.jpg" alt="Picture"> -->
       


    </div>

    <div class="row">
      <div class="col-md-9 docs-buttons">
        <!-- <h3 class="page-header">Toolbar:</h3> -->
        <div class="form-group" id='crop' >
          
        </div>

         <div class="form-group" id='crop2' >
          
        </div>

       </br> </br> </br>

          <div class="btn-group" id='crop4'>
            <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move" title="Move">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setDragMode&quot;, &quot;move&quot;)">
              <span class="fa fa-arrows"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="crop" title="Crop">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setDragMode&quot;, &quot;crop&quot;)">
              <span class="fa fa-crop"></span>
            </span>
          </button>
            <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, 0.1)">
              <span class="fa fa-search-plus"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, -0.1)">
              <span class="fa fa-search-minus"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, -45)">
              <span class="fa fa-rotate-left"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">

            <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, 45)">
              <span class="fa fa-rotate-right"></span>
            </span>
          </button>
          
           <a type="button" class="btn btn-success" href="../../Exe_viwe_customer.php" data-target="Signin">GO back</a>
        </div>

        <!-- Show the cropped image in modal -->
        <div class="modal fade docs-cropped" id="getCroppedCanvasModal" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="getCroppedCanvasTitle">Cropped</h4>
              </div>
              <div class="modal-body"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>

              </div>
            </div>
          </div>
        </div><!-- /.modal -->


      </div><!-- /.docs-buttons -->
          
   
    </div>
  </div>


  <!-- Footer -->


  <!-- Scripts -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../dist/cropper.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
<?php
}
?>