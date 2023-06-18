
 <?php 
session_start();
$err ="";
$style ="";
$get_id = $_GET['e5HxuYol1Io8JLdit'];
$get_title =$_GET['c5HxuYol1Io8JL_i'];
$get_token = $_GET['token'];
include_once "includes/conn.php";

 

if(isset($_SESSION['seller_user'])){
$user = $_SESSION['seller_user'];
$auth_sql = "SELECT * FROM seller_profile_table 
left join seller_request_table on seller_request_table.seller_id = seller_profile_table.seller_req_id WHERE seller_profile_table.seller_user = '$user' ";
$auth_query = mysqli_query($conn, $auth_sql);
$auth = mysqli_fetch_assoc($auth_query);
if ($auth['seller_right'] != 'Super Admin' AND $auth['seller_right'] != 'Admin') {
echo "<script>window.location='404';</script>";
}
}
else {
echo "<script>window.location='login';</script>";
}

// ===========
if (isset($_POST['edit'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_discount =$_POST['product_discount'];
    $product_delivery = $_POST['product_delivery'];
    $stock_status = $_POST['stock_status'];
    $seller_product = $_POST['seller_product_cat'];
    $product_desc = $_POST['product_desc'];
    $product_info = $_POST['product_info'];
    $status = $_POST['status'];
    $modify_date = date('d-M-Y');
$sql ="UPDATE product_table JOIN seller_request_table ON seller_request_table.seller_id = product_table.product_seller_id SET  
 product_name = '$product_name',
 product_price = '$product_price',
 product_discount = '$product_discount',
 product_free_delivery = '$product_delivery',
 stock_status = '$stock_status',
 seller_product_cat = '$seller_product',
 product_desc = '$product_desc',
 product_info = '$product_info',
 product_status = '$status',
 product_modify_date = '$modify_date' WHERE product_table.product_id = '$get_id' AND seller_request_table.seller_company_title = '$get_title' ";
 // 
if (empty($product_name) || empty($product_price) || empty($seller_product) || empty($product_desc) || empty($product_info)) {
$style = "style='border: solid 1px red;'";
$err ="Some Input Empty*";
}
else
{
 $result = mysqli_query($conn, $sql);
 $err =  "Record Updated";  
}
}
// ==================================================================
if(isset($_POST['changea']))
{
$product_imag_1 = $_FILES['product_imag_1']['name'];
$att1 = $_POST['att1'];
//
if (!empty($product_imag_1)) {
  $product_imag_1 = time().'_'.time().'___'.basename($_FILES["product_imag_1"]["name"]);
} else {
  $product_imag_1 = basename($_FILES["product_imag_1"]["name"]);
}
            // Valid extension
            $valid_ext = array('png','jpeg','jpg');
            // Location
            $location = "data_files/product_file/".$product_imag_1;
$sql_change1 ="UPDATE product_table JOIN seller_request_table ON seller_request_table.seller_id = product_table.product_seller_id SET  
 product_image_1 = '$product_imag_1' WHERE product_table.product_id = '$get_id' AND seller_request_table.seller_company_title = '$get_title' ";
if(!empty($product_imag_1)){
if($result = mysqli_query($conn, $sql_change1)){
if (file_exists("data_files/product_file/".$att1)){
    @unlink("data_files/product_file/".$att1);
                // file extension
            $file_extension = pathinfo($location, PATHINFO_EXTENSION);
            $file_extension = strtolower($file_extension);
          $err = "Changed";}
// 
if(in_array($file_extension,$valid_ext)){  
                // Compress Image
    compressImage($_FILES['product_imag_1']['tmp_name'],$location,60);
}}}
else{ $err = "empty";}

}//===
//=====================================================================
if(isset($_POST['changeb']))

{
$product_imag_2 = $_FILES['product_imag_2']['name'];
$att2 = $_POST['att2'];
//
if (!empty($product_imag_2)) {
  $product_imag_2 = time().'___'.time().'__'.basename($_FILES["product_imag_2"]["name"]);
} else {
  $product_imag_2 = basename($_FILES["product_imag_2"]["name"]);
}
            // Valid extension
            $valid_ext = array('png','jpeg','jpg');
            // Location
            $location2 = "data_files/product_file/".$product_imag_2;

$sql_change2 ="UPDATE product_table JOIN seller_request_table ON seller_request_table.seller_id = product_table.product_seller_id SET  
 product_image_2 = '$product_imag_2' WHERE product_table.product_id = '$get_id' AND seller_request_table.seller_company_title = '$get_title' ";
if(!empty($product_imag_2)){
if($result = mysqli_query($conn, $sql_change2)){
if (file_exists("data_files/product_file/".$att2)){
    @unlink("data_files/product_file/".$att2);
                // file extension
            $file_extension2 = pathinfo($location2, PATHINFO_EXTENSION);
            $file_extension2 = strtolower($file_extension2);
          $err = "Changed";
      }
// 
if(in_array($file_extension2, $valid_ext)){
                // Compress Image
    compressImage2($_FILES['product_imag_2']['tmp_name'],$location2,60);
}
}}
else{ $err = "empty";}

}//===
//=====================================================================

// ==================================================================
if(isset($_POST['changec']))
{
$product_imag_3 = $_FILES['product_imag_3']['name'];
$att3 = $_POST['att3'];
//
if (!empty($product_imag_3)) {
  $product_imag_3 = time().'__'.time().'___'.basename($_FILES["product_imag_3"]["name"]);
} else {
  $product_imag_3 = basename($_FILES["product_imag_3"]["name"]);
}
            // Valid extension
            $valid_ext = array('png','jpeg','jpg');
            // Location
            $location3 = "data_files/product_file/".$product_imag_3;
$sql_change3 ="UPDATE product_table JOIN seller_request_table ON seller_request_table.seller_id = product_table.product_seller_id SET  
 product_image_3 = '$product_imag_3' WHERE product_table.product_id = '$get_id' AND seller_request_table.seller_company_title = '$get_title' ";
if(!empty($product_imag_3)){
if($result = mysqli_query($conn, $sql_change3)){
if (file_exists("data_files/product_file/".$att3)){
    @unlink("data_files/product_file/".$att3);
                // file extension
            $file_extension3 = pathinfo($location3, PATHINFO_EXTENSION);
            $file_extension3 = strtolower($file_extension3);
          $err = "Changed";}
// 
if(in_array($file_extension3,$valid_ext)){  
                // Compress Image
    compressImage3($_FILES['product_imag_3']['tmp_name'],$location3,60);
}}}
else{ $err = "empty";}

}//===
//=====================================================================
if(isset($_POST['changed']))
{
$product_imag_4 = $_FILES['product_imag_4']['name'];
$att4 = $_POST['att4'];
//
if (!empty($product_imag_4)) {
  $product_imag_4 = time().'_'.time().'__'.basename($_FILES["product_imag_4"]["name"]);
} else {
  $product_imag_4 = basename($_FILES["product_imag_4"]["name"]);
}
            // Valid extension
            $valid_ext = array('png','jpeg','jpg');
            // Location
            $location4 = "data_files/product_file/".$product_imag_4;
$sql_change4 ="UPDATE product_table JOIN seller_request_table ON seller_request_table.seller_id = product_table.product_seller_id SET  
 product_image_4 = '$product_imag_4' WHERE product_table.product_id = '$get_id' AND seller_request_table.seller_company_title = '$get_title' ";
if(!empty($product_imag_4)){
if($result = mysqli_query($conn, $sql_change4)){
if (file_exists("data_files/product_file/".$att4)){
    @unlink("data_files/product_file/".$att4);
                // file extension
            $file_extension4 = pathinfo($location4, PATHINFO_EXTENSION);
            $file_extension4 = strtolower($file_extension4);
          $err = "Changed";}
// 
if(in_array($file_extension4,$valid_ext)){  
                // Compress Image
    compressImage4($_FILES['product_imag_4']['tmp_name'],$location4,60);
}}}
else{ $err = "empty";}

}//===
//=====================================================================


// Compress image
function compressImage($source, $destination, $quality) {

$info = getimagesize($source);

if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source);

elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source);

elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);

imagejpeg($image, $destination, $quality);

}
                // Compress image
        function compressImage2($source, $destination, $quality) {

            $info = getimagesize($source);

            if ($info['mime'] == 'image/jpeg') 
                $image = imagecreatefromjpeg($source);

            elseif ($info['mime'] == 'image/gif') 
                $image = imagecreatefromgif($source);

            elseif ($info['mime'] == 'image/png') 
                $image = imagecreatefrompng($source);

            imagejpeg($image, $destination, $quality);

        }
        // Compress image
        function compressImage3($source, $destination, $quality) {

            $info = getimagesize($source);

            if ($info['mime'] == 'image/jpeg') 
                $image = imagecreatefromjpeg($source);

            elseif ($info['mime'] == 'image/gif') 
                $image = imagecreatefromgif($source);

            elseif ($info['mime'] == 'image/png') 
                $image = imagecreatefrompng($source);

            imagejpeg($image, $destination, $quality);

        }
        // Compress image
                function compressImage4($source, $destination, $quality) {

            $info = getimagesize($source);

            if ($info['mime'] == 'image/jpeg') 
                $image = imagecreatefromjpeg($source);

            elseif ($info['mime'] == 'image/gif') 
                $image = imagecreatefromgif($source);

            elseif ($info['mime'] == 'image/png') 
                $image = imagecreatefrompng($source);

            imagejpeg($image, $destination, $quality);

        }

// ============
// $q_edit = mysqli_query($conn,"SELECT * FROM product_table WHERE product_id = '$get_id' ");
// ====


// ============
 ?>


<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <title>ViraBarez | Admin Dashboard</title>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Favicon icon -->
      <link rel="icon" href="files/assets/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- feather icon -->
      <link rel="stylesheet" type="text/css" href="files/assets/icon/feather/css/feather.css">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="files/assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- Data Table Css -->
      <link rel="stylesheet" type="text/css" href="files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" type="text/css" href="files/assets/pages/data-table/css/buttons.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="files/assets/css/pages.css">
      <link rel="stylesheet" type="text/css" href="files/assets/css/scrollbar.css">
            <script src="files/ckeditor1/ckeditor.js"></script>

    </head>

    <body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <!-- [ Pre-loader ] end -->
<?php 
if ($auth['seller_right'] == 'Super Admin' || $auth['seller_right'] == 'Admin') {
?>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- [ Header ] start -->
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="index">
                            <img class="img-fluid" src="files/assets/images/logo.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu icon-toggle-right"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">

                        <ul class="nav-right">
<?php include_once "notifications.php"; ?>   


                            <li class="user-profile header-notification">

                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="data_files/logo/<?php echo $auth['seller_logo']; ?>" class="img-radius" alt="User-Profile-Image">
                                        <span><?php echo $auth['seller_fname']." ". $auth['seller_lname']; ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>




                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="settings">
                                            <i class="feather icon-settings"></i> Settings

                                        </a>
                                        </li>
                                        <li>
                                            <a href="profile">
                                            <i class="feather icon-user"></i> Profile

                                        </a>
                                        </li>
                                        
                                        <li>
                                            <a href="logout">
                                            <i class="feather icon-log-out"></i> Logout

                                        </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>

<!-- ========================== -->




                    </div>
                </div>
            </nav>



            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- [ navigation menu ] start -->
                    <nav class="pcoded-navbar">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">
                                <div class="pcoded-navigation-label">NAVIGATIONS</div>

                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext">DASHBOARD</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li>
                                                <a href="index" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Home</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                                <!--  -->
<?php 
if ($auth['seller_right'] == 'Super Admin' || $auth['seller_right'] == 'Admin') {
?>
                            <div class="pcoded-navigation-label">COMPANIES</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu active pcoded-trigger">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext">OUR SELLERS</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="active">
                                                <a href="our_seller" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Our Sellers</span>
                                                </a>
                                            </li>
<li>
<a href="seller_order" class="waves-effect waves-dark">
<span class="pcoded-mtext">Seller Order</span>
</a>
</li>
                                        </ul>
                                    </li>
                                </ul>
<?php } ?>
                                <!--  -->
                                 <div class="pcoded-navigation-label">SHOP SECTION</div>
                                
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext">SHOP</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li>
                                                <a href="seller_products" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Products</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="customer_order" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Order</span>
                                                </a>
                                            </li>
                                            <!-- <li>
                                                <a href="customer" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Customers</span>
                                                </a>
                                            </li> -->

                                        </ul>
                                    </li>
                                </ul>
<!--                                             -->
 <!--                                             -->
<?php 
if ($auth['seller_right'] == 'Super Admin' || $auth['seller_right'] == 'Admin') {
?> 
 <div class="pcoded-navigation-label">USERS MANAGEMENT</div>

<ul class="pcoded-item pcoded-left-item">
<li class="pcoded-hasmenu">
<a href="javascript:void(0)" class="waves-effect waves-dark">
<span class="pcoded-micon"><i class="feather icon-home"></i></span>
<span class="pcoded-mtext">USERS</span>
</a>
<ul class="pcoded-submenu">
<li>
<a href="users" class="waves-effect waves-dark">
<span class="pcoded-mtext">Seller Users</span>
</a>
</li>
<li>
<a href="customer_users" class="waves-effect waves-dark">
<span class="pcoded-mtext">Customer Users</span>
</a>
</li>
<li>
<a href="seller_requested" class="waves-effect waves-dark">
<span class="pcoded-mtext">Seller Requested</span>
</a>
</li>


</ul>
</li>
</ul>
 <div class="pcoded-navigation-label">WEBSITE MANAGEMENT</div>
<ul class="pcoded-item pcoded-left-item">
<li class="pcoded-hasmenu">
<a href="javascript:void(0)" class="waves-effect waves-dark">
<span class="pcoded-micon"><i class="feather icon-home"></i></span>
<span class="pcoded-mtext">WEBSITE CONFIG</span>
</a>
<ul class="pcoded-submenu">

<li>
<a href="slider" class="waves-effect waves-dark">
<span class="pcoded-mtext">Home Slider</span>
</a>
</li>

<li>
<a href="categories" class="waves-effect waves-dark">
<span class="pcoded-mtext">Categories</span>
</a>
</li>

<li>
<a href="feedback" class="waves-effect waves-dark">
<span class="pcoded-mtext">Public MSG/Feedback</span>
</a>
</li>

</ul>

</li>
</ul>
<?php } ?>
<!--  -->
<!--                                             -->
<div class="pcoded-navigation-label">SETTINGS</div>

<ul class="pcoded-item pcoded-left-item">
<li class="pcoded-hasmenu">
<a href="javascript:void(0)" class="waves-effect waves-dark">
<span class="pcoded-micon"><i class="feather icon-home"></i></span>
<span class="pcoded-mtext">CONFIGURATION</span>
</a>
<ul class="pcoded-submenu">
<li>
<a href="settings" class="waves-effect waves-dark">
<span class="pcoded-mtext">Settings</span>
</a>
</li>

</ul>
</li>
</ul>

                                <!--  -->
                                <div class="pcoded-navigation-label">OTHER</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="logout">
                                        <a href="logout" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-power"></i>
                                                <b>D</b>
                                            </span>
                                            <span class="pcoded-mtext">LOGOUT</span>
                                        </a>
                                    </li>
                               </ul>
                                
                            </div>
                        </div>
                    </nav>
                    <!-- [ navigation menu ] end -->


<?php 


$q_edit = mysqli_query($conn, "SELECT * FROM product_table join seller_request_table ON seller_request_table.seller_id = product_table.product_seller_id JOIN category_table ON product_table.seller_product_cat = category_table.category_id WHERE seller_request_table.seller_id = product_table.product_seller_id AND seller_request_table.seller_company_title = '$get_title' AND product_table.product_id = '$get_id' ");

$row= mysqli_fetch_assoc($q_edit);

 ?>
                    <div class="pcoded-content">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="feather icon-file bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h5><?php echo $row['seller_company_title']; ?>&nbsp;Products Edit</h5>
                                            <span>Edit Products Records</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Edit Seller Products</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <!-- [ page content ] start -->
                                        <div class="row">
                                            <!-- testimonial and top selling start -->
                                            <div class="col-md-12">
                                                <div class="card table-card">
                                                    <div class="card-header">
                                                        <h5>Record ID: <?php echo $row['product_id']; ?></h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                                                <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                                                <li><i class="feather icon-trash close-card"></i></li>
                                                                <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
<?php 

// echo "<pre>";
// print_r($row);
// echo "</pre>";





$token_var = "ya29.5HxuYol1Io8JLeGePDznbfkkwu_PC4uodKwG8_1clFYAn9AgdOV1WGpOTNQP3s76HAsn7Y4zWw";
if ($get_token === $token_var AND $row['seller_company_title'] == $get_title) 
{ 


 ?>
                                                    <div class="card-block p-b-0">
<?php 


 ?>

 <!-- button -->
<?php 




if(isset($_POST['edit']))
 {   
echo "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>".$err, "</div>
";
}
// 
if(isset($_POST['changea']))
 {   
echo "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>".$err, "</div><br>
";

}
if(isset($_POST['changeb']))
 {   
echo "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>".$err, "</div>
";
}
if(isset($_POST['changec']))
 {   
echo "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>".$err, "</div>
";
}
if(isset($_POST['changed']))
 {   
echo "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>".$err, "</div>
";
}

// echo "<pre>";
// print_r($auth);
// echo "</pre>";
 ?> 
<form method="POST" enctype="multipart/form-data">

<div class="modal-body">

  <!-- ==================================================================== -->

<div class="form-group">
<!-- 
<input type="hidden" name="att2" value="<?php echo $row['product_image_2'];?>">
<input type="hidden" name="att3" value="<?php echo $row['product_image_3'];?>">
<input type="hidden" name="att4" value="<?php echo $row['product_image_4'];?>"> -->
 
<div class="row">
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Product Name:</label>
<input class="form-control" disabled type="text" value="<?php echo $row['product_name'];?>">
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Product Code:</label>
<input class="form-control" type="text"disabled value="<?php echo $row['product_code'];?>">
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Price:</label>
<input class="form-control" type="number" disabled value="<?php echo $row['product_price'];?>">
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Discount:</label>
<input class="form-control" type="number" disabled value="<?php echo $row['product_discount'];?>">
</div>
<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2">Free Delivery:</label>
<input class="form-control" type="text" disabled value="<?php echo $row['product_free_delivery']; ?>">
</div>
<!--  -->
<!-- <div class="row"> -->
<div class="col-sm-6 col-lg-6 m-b-30" >
<label class="mb-2 mr-sm-2">Select Stock Status :</label>
<select class="custom-select" disabled >

<option value="In Stock" <?php if($row['stock_status']=="In Stock"){echo "selected";}?>>In Stock</option>
<option value="Out Stock" <?php if($row['stock_status']=="Out Stock"){echo"selected";} ?>>Out Stock</option>

</select>
</div>
<!--  -->
<div class="col-sm-6 col-lg-6 m-b-30" >
<label class="mb-2 mr-sm-2">Select Product Categories :</label>
<select disabled class="custom-select" >
<option value=""><?php echo $row['subcategory']; ?></option>
</select>
</div>
<!-- </div> -->
<!--  -->

<!-- 
 -->

<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2">Product Desciption:</label>
<textarea id="editor1" class="form-control" rows="5" type="text" disabled><?php echo $row['product_desc'];?>
  </textarea>
</div>
<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2">Product Information:</label>
<textarea id="editor2" class="form-control" rows="5" type="text" disabled><?php echo $row['product_info'];?>
  </textarea>
</div>
<!-- ---- -->

<div class="form-check-inline ml-5">
  <label class="<?php if($row['product_status'] == "Publish"){ echo 'label label-success';}else{echo 'label label-danger';} ?>"><?php echo $row['product_status'];?></label>
</div>
<!--  -->

</div>
<!--  -->
<br>
<div class="ltr" dir="ltr">

<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit<?php echo $row['product_id']; ?>" >Edit</a>
</div>


<!-- Model -->
<div style="text-align: left;" class="modal fade" id="modal-edit<?php echo $row['product_id']; ?>">
<div class="modal-dialog modal-lg">
<!-- moded for edid -->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><br>
<?php echo $row['product_name']; ?></h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="container">

<div class="row">
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Product Name:</label>
<input class="form-control"  type="text" placeholder="Product Name" name="product_name" value="<?php echo $row['product_name'];?>" <?php echo $style; ?>>
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Product Code:</label>
<input class="form-control" type="text" disabled placeholder="Product Code" name="product_code" value="<?php echo $row['product_code'];?>" <?php echo $style;?> >
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Price:</label>
<input class="form-control" type="number" placeholder="Price in AFN Only" name="product_price" value="<?php echo $row['product_price'];?>" <?php echo $style;?> >
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Discount:</label>
<input class="form-control" type="number" placeholder="Price in AFN Only" name="product_discount" value="<?php echo $row['product_discount'];?>" <?php echo $style;?> >
</div>
<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2">Free Delivery:</label>
<input class="form-control" type="text" placeholder="Delivery (Kabul, Herat...)" name="product_delivery" value="<?php echo $row['product_free_delivery']; ?>" <?php echo $style;?> >
</div>
<!--  -->
<!-- <div class="row"> -->
<div class="col-sm-6 col-lg-6 m-b-30" >
<label class="mb-2 mr-sm-2">Select Stock Status :</label>
<select class="custom-select" <?php echo $style;?> name="stock_status">

<option value="In Stock" <?php if($row['stock_status']=="In Stock"){echo "selected";}?>>In Stock</option>
<option value="Out Stock" <?php if($row['stock_status']=="Out Stock"){echo"selected";} ?>>Out Stock</option>

</select>
</div>
<!--  -->
<div class="col-sm-6 col-lg-6 m-b-30" >
<label class="mb-2 mr-sm-2">Select Product Categories:</label>
<select <?php echo $style;?> name="seller_product_cat" class="custom-select" >

<?php
// ADD Category
// ==
$categories="SELECT subcategory,category,category_id FROM category_table ORDER BY category ASC, subcategory ASC;";
$query_categories=mysqli_query($conn,$categories);

$currentMainCategory = null;
while($rows_categories=mysqli_fetch_array($query_categories)){
// check if your current category was diferent of row category
if($currentMainCategory != $rows_categories['category']) {
// check if is not null (for close </optgroup>)
if(!is_null($currentMainCategory)) {
echo '</optgroup>';
}
// set your new current category for this loop
$currentMainCategory = $rows_categories['category'];
echo '<optgroup label="'. $rows_categories['category'] .'">';
}
// do not forget put value of this category if you needed

?>

<option value="<?php echo $rows_categories['category_id'];?>" <?php if($rows_categories['category_id'] == $row['seller_product_cat']) {echo "selected";} ?>   ><?php echo $rows_categories['subcategory'];?></option>";

<?php
}
// then check again for close last optgroup if is opened
if(!is_null($currentMainCategory)) {
echo '</optgroup>';
}
?>
</select>
</div>
<!-- </div> -->
<!--  -->




<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2">Product Desciption:</label>
<textarea id="editor3" class="form-control" rows="5" type="text" name="product_desc" <?php echo $style;?>><?php echo $row['product_desc'];?>
  </textarea>
</div>
<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2">Product Information:</label>
<textarea id="editor4" class="form-control" rows="5" type="text" name="product_info" <?php echo $style;?> ><?php echo $row['product_info'];?>
  </textarea>
</div>
<!-- ---- -->

<div class="form-check-inline ml-5" style="">
  <label class="form-check-label">
<input type="radio" class="form-check-input" name="status" value="Publish" <?php if($row['product_status'] == "Publish"){echo "checked";}?> >Publish
  </label>
</div>
<!--  -->
<div class="form-check-inline ml-5" style="">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="status" value="Not Publish" <?php if($row['product_status'] == "Not Publish"){echo "checked";}?>>Not Publish
  </label>
</div>
<!--  -->
</div>
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button  name="edit" type="submit" class="btn btn-primary">Update</button >
</div>
</div>

</div>
</div>
</div>
<!--End Model -->






</div></div></form>


<hr>
<!-- images section -->
 <section class="image">
    <div class="row">  


<div class="col-lg-3 col-md-3 col-6 mb-3" style="text-align: center;">
    <img src="data_files/product_file/<?php echo $row['product_image_1'];?>" width="150px" height="150px" style="box-shadow: -2px 1px 11px 0px rgb(90 66 66 / 97%);">
</div>
<div class="col-lg-3 col-md-3 col-6 mb-3">
    <div class="custom-file">
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-changea">Change</a>
    </div>
</div>
<div style="text-align: left;" class="modal fade" id="modal-changea">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Change Image 1</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="container">

<div class="col-lg-12 col-md-12 col-12 mb-3">
<form method="POST" enctype="multipart/form-data">

    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="product_imag_1">
<input type="hidden" name="att1" value="<?php echo $row['product_image_1'];?>">
    <label class="custom-file-label" for="customFile">Image-1</label>
  </div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button  name="changea" type="submit" class="btn btn-primary">Update</button >
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

<!--  -->
<div class="col-lg-3 col-md-3 col-6 mb-3" style="text-align: center;">
    <img src="data_files/product_file/<?php echo $row['product_image_2'];?>" width="150px" height="150px" style="box-shadow: -2px 1px 11px 0px rgb(90 66 66 / 97%);">
</div>
<div class="col-lg-3 col-md-3 col-6 mb-3">
    <div class="custom-file">
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-changeb">Change</a>
    </div>
</div>
<div style="text-align: left;" class="modal fade" id="modal-changeb">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Change Image 3</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="container">

<div class="col-lg-12 col-md-12 col-12 mb-3">
<form method="POST" enctype="multipart/form-data">

    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="product_imag_2">
    <input type="hidden" name="att2" value="<?php echo $row['product_image_2'];?>">
    <label class="custom-file-label" for="customFile">Image-2</label>
  </div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button name="changeb" type="submit" class="btn btn-primary">Update</button >
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

<!--  -->
<div class="col-lg-3 col-md-3 col-6 mb-3" style="text-align: center;">
    <img src="data_files/product_file/<?php echo $row['product_image_3'];?>" width="150px" height="150px" style="box-shadow: -2px 1px 11px 0px rgb(90 66 66 / 97%);">
</div>
<div class="col-lg-3 col-md-3 col-6 mb-3">
    <div class="custom-file">
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-changec">Change</a>
    </div>
</div>
<div style="text-align: left;" class="modal fade" id="modal-changec">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Change Image 3</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="container">
<form method="POST" enctype="multipart/form-data">

<div class="col-lg-12 col-md-12 col-12 mb-3">

    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="product_imag_3">
        <input type="hidden" name="att3" value="<?php echo $row['product_image_3'];?>">

    <label class="custom-file-label" for="customFile">Image-3</label>
  </div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button  name="changec" type="submit" class="btn btn-primary">Update</button >
</div>
</div>
 </form> 

</div>
</div>
</div>
</div>
</div>

<!--  -->
<div class="col-lg-3 col-md-3 col-6 mb-3" style="text-align: center;">
    <img src="data_files/product_file/<?php echo $row['product_image_4'];?>" width="150px" height="150px" style="box-shadow: -2px 1px 11px 0px rgb(90 66 66 / 97%);">
</div>
<div class="col-lg-3 col-md-3 col-6 mb-3">
    <div class="custom-file">
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-changed">Change</a>
    </div>
</div>
<div style="text-align: left;" class="modal fade" id="modal-changed">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Change Image 1</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="container">

<div class="col-lg-12 col-md-12 col-12 mb-3">
<form method="POST" enctype="multipart/form-data">

    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="product_imag_4">
        <input type="hidden" name="att4" value="<?php echo $row['product_image_4'];?>">

    <label class="custom-file-label" for="customFile">Image-4</label>
  </div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button  name="changed" type="submit" class="btn btn-primary">Update</button >
</div>
 </form> 

</div>
</div>
</div>
</div>
</div>
</div>

<!--  -->
</div>
</section>
<!-- ================ -->
</div>
<div class="modal-footer justify-content-between">
<a  href="seller_products" class="btn btn-danger" onclick="window.history.back()">Close</a>
<!-- <button type="submit" class="btn btn-primary" name="edit" value='Upload'>Update</button>
 --></div>
</div>


<!-- =============================================================================================== -->
       
</div>
  






                                                </div>
                                            </div>
                                            <!-- testimonial and top selling end -->



                                            <!-- lettest acivity and statustic card start -->

                                            <!-- lettest acivity and statustic card end -->

                                        </div>
                                        <!-- [ page content ] end -->
                                    </div>
                                </div>



<?php 
}

 ?>

                            </div>
                        </div>
                    </div>
                    <!-- [ style Customizer ] start -->
                            
                    <!-- [ style Customizer ] end -->
                </div>
            </div>
<!--         </div>
    </div>
 -->
<div class="result"></div>
<?php } ?>                         
<!-- Required Jquery -->
<script type="text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- waves js -->
<script src="files/assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="files/bower_components/modernizr/js/css-scrollbars.js"></script>
<!-- waves js -->
<script src="files/assets/pages/waves/js/waves.min.js"></script>
<!-- data-table js -->
<script src="files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="files/assets/pages/data-table/js/jszip.min.js"></script>
<script src="files/assets/pages/data-table/js/pdfmake.min.js"></script>
<script src="files/assets/pages/data-table/js/vfs_fonts.js"></script>
<script src="files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<!-- Custom js -->
<script src="files/assets/pages/data-table/js/data-table-custom.js"></script>
<script src="files/assets/js/pcoded.min.js"></script>
<script src="files/assets/js/vertical/vertical-layout.min.js"></script>
<script src="files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="files/assets/js/script.js"></script>
<script src="files/assets/notification/notify.min.js"></script>
<script src="files/assets/notification/notify.js"></script>

<script>
CKEDITOR.replace( 'editor1' );
CKEDITOR.replace( 'editor2' );
CKEDITOR.replace( 'editor3' );
CKEDITOR.replace( 'editor4' );

$(document).ready(function(){
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
})
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
// =========
$(document).ready(function() {
     var refreshId = setInterval(function() {
     $("#time").load(" #time");
          $("#time1").load(" #time1");
          $("#time2").load(" #time2");
     }, 3000);
});
// 
function order_noti(e,o_id,c_id) {
e.preventDefault(e);
$.ajax
({
type: "POST",
url: "add_noti",
data: { o_id:o_id, c_id:c_id},
success: function (data) {
$('.result').html(data);
}
});
}
// 
function reject_order(e,o_id,c_id) {
e.preventDefault(e);
$.ajax
({
type: "POST",
url: "reject_order",
data: { o_id:o_id, c_id:c_id},
success: function (data) {
$('.result').html(data);
}
});
}
</script>
</body>


</html>
