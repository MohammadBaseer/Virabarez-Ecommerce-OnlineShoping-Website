 <?php 
session_start();

$err ="";
$style ="";
$var1 = 5;
$var2 = 6;
include_once "includes/conn.php";
if(isset($_SESSION['seller_user'])){
$user = $_SESSION['seller_user'];
$auth_sql = "SELECT * FROM seller_profile_table 
left join seller_request_table on seller_request_table.seller_id = seller_profile_table.seller_req_id WHERE seller_profile_table.seller_user = '$user' ";
$auth_query = mysqli_query($conn, $auth_sql);
$auth = mysqli_fetch_assoc($auth_query);

}
else {
echo "<script>window.location='login';</script>";
}
// ============
if (isset($_POST['add'])) {

    $seller_id = $_POST['seller_id'];
    $product_name = $_POST['product_name'];
    $product_code = $_POST['product_code'];
    $product_price = $_POST['product_price'];
    $product_discount =$_POST['product_discount'];
    $product_delivery = $_POST['product_delivery'];
    $stock_status = $_POST['stock_status'];
    $seller_product = $_POST['seller_product_cat'];
    $product_imag_1 = $_FILES['product_imag_1']['name'];
    $product_imag_2 = $_FILES['product_imag_2']['name'];
    $product_imag_3 = $_FILES['product_imag_3']['name'];
    $product_imag_4 = $_FILES['product_imag_4']['name'];
    $product_desc = $_POST['product_desc'];
    $product_info = $_POST['product_info'];
    $status = $_POST['status'];
$join_date = date('d-M-Y');


if (!empty($product_imag_1)) {
  $product_imag_1 = time().'_'.time().'_'.basename($_FILES["product_imag_1"]["name"]);
} else {
  $product_imag_1 = basename($_FILES["product_imag_1"]["name"]);
}

if (!empty($product_imag_2)) {
  $product_imag_2 = time().'___'.time().'_'.basename($_FILES["product_imag_2"]["name"]);
} else {
  $product_imag_2 = basename($_FILES["product_imag_2"]["name"]);
}

if (!empty($product_imag_3)) {
  $product_imag_3 = time().'_'.time().'___'.time().'_'.basename($_FILES["product_imag_3"]["name"]);
} else {
  $product_imag_3 = basename($_FILES["product_imag_3"]["name"]);
}

if (!empty($product_imag_4)) {
  $product_imag_4 = time().'___'.basename($_FILES["product_imag_4"]["name"]);
} else {
  $product_imag_4 = basename($_FILES["product_imag_4"]["name"]);
}


            // Valid extension
            $valid_ext = array('png','jpeg','jpg');

            // Location
            $location = "data_files/product_file/".$product_imag_1;
            $location2 = "data_files/product_file/".$product_imag_2;
            $location3 = "data_files/product_file/".$product_imag_3;
            $location4 = "data_files/product_file/".$product_imag_4;




// =========
$var1 = 6;
$var2 = 5;
$sql ="INSERT INTO product_table (
`product_seller_id`,
`product_name`,
`product_code`,
`product_price`,
`product_discount`,
`product_free_delivery`,
`stock_status`,
`seller_product_cat`,
`product_image_1`,
`product_image_2`,
`product_image_3`,
`product_image_4`,
`product_desc`,
`product_info`,
`product_status`,
`product_entry_date`
) VALUES (
'$seller_id',
'$product_name',
'$product_code',
'$product_price',
'$product_discount',
'$product_delivery',
'$stock_status',
'$seller_product',
'$product_imag_1',
'$product_imag_2',
'$product_imag_3',
'$product_imag_4',
'$product_desc',
'$product_info',
'$status',
'$join_date'
)";
//
// =========
$result = mysqli_query($conn, "SELECT * FROM product_table WHERE product_code = '$product_code' ");
$row = mysqli_fetch_assoc($result);


// $specialChars = preg_match('@[^\w]@', $product_name);
// $specialChars1 = preg_match('@[^\w]@', $product_code);
// $specialChars2 = preg_match('@[^\w]@', $product_delivery);
// $specialChars3 = preg_match('@[^\w]@', $product_desc);
// $specialChars4 = preg_match('@[^\w]@', $product_info);


if($row > 0){
$err = "Product Code Already in System";
$style = "style='border: solid 1px red;'";

}
// =============================

elseif (empty($product_name) || empty($product_code) || empty($product_price) || empty($seller_product) || empty($product_imag_1)) {
$style = "style='border: solid 1px red;'";
$err ="Some Input Empty*";

}
else
{//
if($result = mysqli_query($conn, $sql))
{

            // file extension
            $file_extension = pathinfo($location, PATHINFO_EXTENSION);
            $file_extension = strtolower($file_extension);
// file extension
            $file_extension2 = pathinfo($location2, PATHINFO_EXTENSION);
            $file_extension2 = strtolower($file_extension2);
            // file extension
            $file_extension3 = pathinfo($location3, PATHINFO_EXTENSION);
            $file_extension3 = strtolower($file_extension3);
            // file extension
            $file_extension4 = pathinfo($location4, PATHINFO_EXTENSION);
            $file_extension4 = strtolower($file_extension4);



            // Check extension
if(in_array($file_extension,$valid_ext)){  
                // Compress Image
    compressImage($_FILES['product_imag_1']['tmp_name'],$location,60);
                }


if (in_array($file_extension2,$valid_ext)) {

    compressImage2($_FILES['product_imag_2']['tmp_name'],$location2,60);
} 
if (in_array($file_extension3,$valid_ext)) {
// 
    compressImage3($_FILES['product_imag_3']['tmp_name'],$location3,60);
}
if (in_array($file_extension4,$valid_ext)) {
// 
    compressImage4($_FILES['product_imag_4']['tmp_name'],$location4,60);}


            else{
                $err = "Invalid file type.";
            }
        


        // 
$err = "success";
echo "<script>window.location='seller_products';</script>";

}
//
}
}// 
// else 
// {
//     $err = "else";
// }
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
<style>
    /*#cke_82, #cke_179, #cke_193, #cke_96 {*/
        /*display: none;*/
    /*}*/

    #cke_160, #cke_210, #cke_110, #cke_59 {
        display: none;
    }


    
</style>

    </head>

    <body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <!-- [ Pre-loader ] end -->
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
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext">OUR SELLERS</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li>
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
                                    <li class="pcoded-hasmenu active pcoded-trigger">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext">SHOP</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="active">
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







                    <div class="pcoded-content">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="feather icon-file bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h5>Products</h5>
                                            <span>Seller Products Records</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Seller Products</a> </li>
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
                                                        <h5>Items</h5>
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

                                                    <div class="card-block p-b-0">
 <!-- button -->
<?php 
if(isset($_POST['add']))
 {   
echo "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>".$err, "</div>
";
}
// 


// echo "<pre>";
// print_r($auth);
// echo "</pre>";
 ?> 
<!-- <div class="editor"> -->
<form method="POST" enctype="multipart/form-data">

<div class="modal-body">

  <!-- ==================================================================== -->

<div class="form-group">



<input type="hidden" class="form-control"  name="seller_id" value="<?php echo $auth['seller_id']; ?>">
 
<div class="row">
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Product Name:</label>
<input class="form-control" type="text" placeholder="Product Name" name="product_name" value="<?php if($var1 > $var2){echo $product_name;}?>" <?php echo $style; ?>>
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Product Code:</label>
<input class="form-control" type="text" placeholder="Product Code" name="product_code" value="<?php if($var1 > $var2){echo $product_code;}?>" <?php echo $style;?> >
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Price:</label>
<input class="form-control" type="number" min="0" placeholder="Price in AFN Only" name="product_price" value="<?php if($var1 > $var2){echo $product_price;}?>" <?php echo $style;?> >
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Discount:</label>
<input class="form-control" type="number" min="0" placeholder="Price in AFN Only" name="product_discount" value="<?php if($var1 > $var2){echo $product_discount;}?>" <?php echo $style;?> >
</div>
<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2">Free Delivery:</label>
<input class="form-control" type="text" placeholder="Delivery (Kabul, Herat...)" name="product_delivery" value="<?php if($var1 > $var2){echo $product_delivery;}?>" <?php echo $style;?> >
</div>
<!--  -->
<!-- <div class="row"> -->
<div class="col-sm-6 col-lg-6 m-b-30" >
<label class="mb-2 mr-sm-2">Select Stock Status :</label>
<select <?php echo $style;?> name="stock_status" class="custom-select" >
<option value="In Stock">In Stock</option>
<option value="Out Stock">Out Stock</option>
</select>
</div>
<!--  -->
<div class="col-sm-6 col-lg-6 m-b-30" >
<label class="mb-2 mr-sm-2">Select Product Categories :</label>
<select <?php echo $style;?> name="seller_product_cat" class="custom-select" >
<option>Select Category</option>
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
echo"<option value='". $rows_categories['category_id'] ."'>" . $rows_categories['subcategory'] . "</option>";  
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
<div class="col-lg-12 col-md-12 mb-3">
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="product_imag_1"  <?php echo $style;?> >
    <label class="custom-file-label" for="customFile" <?php echo $style; ?> >Product Image-1</label>
  </div>
</div>
<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="product_imag_2">
    <label class="custom-file-label" for="customFile">Product Image-2(Optional)</label>
  </div>
</div>
<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="product_imag_3">
    <label class="custom-file-label" for="customFile">Product Image-3(Optional)</label>
  </div>
</div>
<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="product_imag_4">
    <label class="custom-file-label" for="customFile">Product Image-4(Optional)</label>
  </div>
</div>
<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2">Product Desciption:</label>
<textarea id='editor1' class="form-control" rows="5" type="text" name="product_desc" <?php echo $style;?> ><?php if($var1 > $var2){echo $product_desc;}?></textarea>
</div>
<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2">Product Information:</label>
<textarea id='editor2' class="form-control" rows="5" type="text" name="product_info" <?php echo $style;?>><?php if($var1 > $var2){echo $product_info;}?></textarea>
</div>
<!-- ---- -->

<div class="form-check-inline ml-5" style="">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="status" value="Publish" checked>Publish
  </label>
</div>
<!--  -->
<div class="form-check-inline ml-5" style="">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="status" value="Not Publish" >Not Publish
  </label>
</div>
<!--  -->
</div>
<!--  -->

<!-- ================ -->



</div>
<div class="modal-footer justify-content-between">
<a  href="seller_products" class="btn btn-danger" data-dismiss="modal">Close</a>
<button type="submit" class="btn btn-primary" name="add" value='Upload'>Create</button>
</div>
</div>
</form>
<!-- </div> -->

<!-- =============================================================================================== -->
       
</div>
  






                                                </div>
                                            </div>

                                        </div>
                                        <!-- [ page content ] end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<div class="result"></div>
                         
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
<!-- ===================== -->

  <script>
 
CKEDITOR.replace( 'editor1' );
CKEDITOR.replace( 'editor2' );

// 
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
//===========
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
