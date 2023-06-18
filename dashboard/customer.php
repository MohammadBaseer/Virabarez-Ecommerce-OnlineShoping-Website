
<?php 
$err ="";
session_start();
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
 ?>
<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
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
                                           <!--  <li class="active">
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
               







                    <div class="pcoded-content">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="feather icon-file bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h5>Customers</h5>
                                            <span>Customers Records</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Customers</a> </li>
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
                                                        <h5>Records</h5>
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


<!-- =============================================================================================== -->

                            <div class="table-responsive dt-responsive">

                                <?php echo $err;
$seller_req_id = $auth['seller_req_id'];    
$c_user= $auth['seller_company_title'];


// "SELECT *  FROM quotes 
// INNER JOIN quote_items ON 
// quotes.quote_id IN (SELECT DISTINCT quote_id FROM quote_items)
// INNER JOIN accounts ON 
// quotes.account_id = accounts.account_id AND quotes.status = 0 
// WHERE primary_sales_id = 2 AND quotes.quote_id = quote_items.quote_id
// ORDER BY quotes.date_submitted DESC"



// $sql_sell = mysqli_query($conn, "SELECT * FROM product_table join seller_request_table ON seller_request_table.seller_id = product_table.product_seller_id join order_table ON product_table.product_id IN (SELECT DISTINCT customer_order_id FROM order_table) join customer_table ON order_table.customer_order_id = customer_table.customer_id WHERE seller_request_table.seller_id = $seller_req_id AND seller_request_table.seller_company_title = '$c_user'");

// $sql_sell = mysqli_query($conn, "SELECT * FROM product_table join seller_request_table ON seller_request_table.seller_id = product_table.product_seller_id join order_table ON order_table.product_order_id = product_table.product_id join customer_table ON customer_table.customer_id IN (SELECT DISTINCT customer_order_id FROM order_table)  WHERE seller_request_table.seller_id = $seller_req_id AND seller_request_table.seller_company_title = '$c_user'");



// $sql_sell = mysqli_query($conn, "SELECT * FROM product_table join seller_request_table ON seller_request_table.seller_id = product_table.product_seller_id join order_table ON order_table.product_order_id = product_table.product_id join customer_table ON order_table.customer_order_id = customer_table.customer_id WHERE seller_request_table.seller_id = $seller_req_id AND seller_request_table.seller_company_title = '$c_user'");



// $sql_sell = mysqli_query($conn, "SELECT DISTINCT * FROM order_table JOIN customer_table ON customer_table.customer_id IN (SELECT DISTINCT customer_order_id FROM order_table) ");



    // = order_table.customer_order_id 


 // order_table.product_order_id = product_table.product_id join customer_table ON customer_table.customer_id IN (SELECT DISTINCT customer_order_id FROM order_table)  WHERE seller_request_table.seller_id = $seller_req_id AND seller_request_table.seller_company_title = '$c_user'");

// 

// $sql_sell = mysqli_query($conn, "SELECT * FROM  order_table JOIN customer_table ON customer_table.customer_id IN (SELECT DISTINCT customer_order_id FROM order_table) ");

// (SELECT DISTINCT customer_order_id FROM order_table)

// $sql_sell = mysqli_query($conn, "SELECT * FROM product_table join seller_request_table ON seller_request_table.seller_id = product_table.product_seller_id join order_table ON order_table.product_order_id = product_table.product_id join customer_table ON order_table.customer_order_id = customer_table.customer_id WHERE seller_request_table.seller_id = $seller_req_id AND seller_request_table.seller_company_title = '$c_user'");


                                 ?>
<table id="dom-jqry" class="table table-hover" style="text-align: center; font-size: 0.8em;">
<thead>
<tr>
<th>Customer Name</th>
<th>Customer Phone</th>
<th>Customer Email</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
// while ($row = mysqli_fetch_assoc($sql_sell)) {
//     echo "<pre>";
// print_r($row);
//     echo "</pre>";

// } 
while ($row = mysqli_fetch_assoc($sql_sell)) {


 ?>         

        </td>
            <td><?php echo $row['customer_name']; ?></td>
            <td><?php echo $row['customer_phone'];?></td>
            <td><?php echo $row['customer_email'];?></td>

            <td>
                <a href="#">
                    <i class="icon feather icon-file f-w-600 f-16 m-r-15 text-c-yellow" data-toggle="modal" data-target="#modal-edit<?php echo $row['product_id']; ?>"></i>
                </a>
                <a href="customer_order_update?e5HxuYol1Io8JLdit=<?php echo $row['order_id']; ?>&c5HxuYol1Io8JL_i=<?php echo $row['seller_company_title']; ?><?php echo "&token=ya29.5HxuYol1Io8JLeGePDznbfkkwu_PC4uodKwG8_1clFYAn9AgdOV1WGpOTNQP3s76HAsn7Y4zWw"; ?>">
                    <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i>
                </a>
                <a href="#!">
                    <i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i>
                </a>
            </td>
        </tr>
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

<div class="col-lg-6  mb-3" >
<!-- ======= -->
<div id="myCarousel" class="carousel slide z-depth-right-4" data-ride="carousel">

  <!-- Indicators -->
<!--   <ul class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ul> -->
  
  <!-- The slideshow -->
  <div class="carousel-inner">

    <div class="carousel-item active">
      <img src="data_files/product_file/<?php echo $row['product_image_1'];?>" width="100%" height="300">
    </div>
<?php 
if ($row['product_image_2'] !="") {
?>
    <div class="carousel-item">
      <img src="data_files/product_file/<?php echo $row['product_image_2'];?>" width="100%" height="300">
    </div>
<?php
}

if ($row['product_image_3'] !="") {
?>
    <div class="carousel-item">
      <img src="data_files/product_file/<?php echo $row['product_image_3'];?>" width="100%" height="300">
    </div>
<?php
}
if ($row['product_image_4'] !="") {
?>
    <div class="carousel-item">
      <img src="data_files/product_file/<?php echo $row['product_image_4'];?>" width="100%" height="300">
    </div>
<?php
}
 ?>

  </div>
  
  <!-- Left and right controls -->
<!--   <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a> -->
</div>




<!-- ======== -->
</div>

<div class="col-lg-6  mb-3 " style=" padding:5px 45px;">


<div class="row"><h4><span style="width: 40%; font-weight: bold;">Product Name:&nbsp;&nbsp;</span><?php echo $row['product_name']; ?></h4></div>

<div class="row"><h4><span style="width: 40%; font-weight: bold;">Product Code:&nbsp;&nbsp;</span><?php echo $row['product_code']; ?></h4></div>

<div class="row"><h4><span style="width: 40%; font-weight: bold;">Price:&nbsp;&nbsp;</span><?php echo $row['product_price']; ?>-AFN</h4></div>

<div class="row"><h4><span style="width: 40%; font-weight: bold;">Discount:&nbsp;&nbsp;</span><?php echo $row['product_discount']; ?>-AFN</h4></div>

<div class="row"><h4><span style="width: 40%; font-weight: bold;">Free Delivery:&nbsp;&nbsp;</span><?php echo $row['product_free_delivery']; ?></h4></div>

 </div>
 <!-- ======= -->
<!--  -->
 <!-- ======= -->
<div class="col-md-12 col-lg-12 m-t-10">
    <div class="product__details__tab">
<ul class="nav nav-tabs" role="tablist">
<li class="nav-item">
<h4 style="color:#dc3545;">Customer Information:</h4>
</li>
</ul>
<div class="tab-content m-t-10">

<div class="tab-pane active">
<div class="product__details__tab__desc">
<p style="margin: 0px;"><span style="font-weight: bold;">Phone:&nbsp;</span><?php echo $row['customer_phone']; ?></p>
<p style="margin: 0px;"><span style="font-weight: bold;">WhatsApp:&nbsp;</span><?php echo $row['custormer_whatsapp']; ?></p>
<p style="margin: 0px;"><span style="font-weight: bold;">Email:&nbsp;</span><?php echo $row['customer_email']; ?></p>

<p style="margin: 0px;"><span style="font-weight: bold;">Shipping Adrress:&nbsp;</span><?php echo $row['order_shipp_add']; ?></p>
<p style="margin: 0px;"><span style="font-weight: bold;">Shipping Country:&nbsp;</span><?php echo $row['order_shipp_country']; ?></p>
<p style="margin: 0px;"><span style="font-weight: bold;">Shipping City:&nbsp;</span><?php echo $row['order_shipp_city']; ?></p>
<p style="margin: 0px;"><span style="font-weight: bold;">Shipping Phone#:&nbsp;</span><?php echo $row['order_shipp_phone']; ?></p>
</div>
</div>

</div>
</div>
</div>
<!--  -->

</div>
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<a href="customer_order_update?e5HxuYol1Io8JLdit=<?php echo $row['order_id']; ?>&c5HxuYol1Io8JL_i=<?php echo $row['seller_company_title']; ?><?php echo "&token=ya29.5HxuYol1Io8JLeGePDznbfkkwu_PC4uodKwG8_1clFYAn9AgdOV1WGpOTNQP3s76HAsn7Y4zWw"; ?>" type="submit" class="btn btn-primary">Edit</a>
</div>
</div>
<!-- </form> -->
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->


    <?php } ?>
<!--  -->
</tbody>

</table>
                            </div>
             
<!--  -->           
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
                            </div>
                        </div>
                    </div>
                    <!-- [ style Customizer ] start -->
                            
                    <!-- [ style Customizer ] end -->
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
  <script>
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
