<?php 
session_start();
include_once "includes/conn.php";
if(isset($_SESSION['seller_user'])){
$user = $_SESSION['seller_user'];



$auth_sql = "SELECT * FROM seller_profile_table 
left join seller_request_table on seller_request_table.seller_id = seller_profile_table.seller_req_id WHERE seller_profile_table.seller_user = '$user'";

$auth_query = mysqli_query($conn, $auth_sql);
$auth = mysqli_fetch_assoc($auth_query);

}
else {
echo "<script>window.location='login';</script>";
}

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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="files/assets/icon/feather/css/feather.css">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="files/assets/css/font-awesome-n.min.css">
    <!-- Chartlist chart css -->
    <link rel="stylesheet" href="files/bower_components/chartist/css/chartist.css" type="text/css" media="all">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="files/assets/css/widget.css">
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
                        <a href="index.html">
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


<!-- ========================================================== -->
         
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

<!-- =========================================================================== -->

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- [ navigation menu ] start -->
<!-- ================================================ -->

                    <nav class="pcoded-navbar">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">
                                <div class="pcoded-navigation-label">NAVIGATIONS</div>

                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu active pcoded-trigger">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
            								<span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext">DASHBOARD</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="active">
                                                <a href="index" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Home</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
 
<?php 
if ($auth['seller_right'] == 'Super Admin' || $auth['seller_right'] == 'Admin') {
?>
                                <!--  -->
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
<?php 
}
 ?>
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
                                        <!--     <li>
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

<!--  -->
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
<!--  -->

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
                                        <i class="feather icon-home bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h5>Dashboard</h5>
                                            <span>Welcom To <strong style="font-weight: bold;"><?php echo $auth['seller_company_title']; ?></strong> Dashboard</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

<div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
 <?php 
if ($auth['seller_right'] == 'Super Admin' || $auth['seller_right'] == 'Admin') {
?>
<div class="row">
    <div class="result"></div>

<!-- product profit start -->
<?php 

// total s 
$sql_s = mysqli_query($conn, "SELECT * FROM seller_profile_table");
$s_count = mysqli_num_rows($sql_s);
// total Active s 
$sql_sl = mysqli_query($conn, "SELECT * FROM seller_profile_table WHERE seller_status = 'unlock' ");
$sl_count = mysqli_num_rows($sql_sl);
// total Deactive s 
$sql_sunl = mysqli_query($conn, "SELECT * FROM seller_profile_table WHERE seller_status = 'lock' ");
$sunl_count = mysqli_num_rows($sql_sunl);

// ===============================
// total customers
$sql_tc = mysqli_query($conn, "SELECT * FROM customer_table");
$tc_count = mysqli_num_rows($sql_tc);
// 
$sql_tco = mysqli_query($conn, "SELECT DISTINCT customer_order_id FROM customer_table JOIN order_table ON customer_table.customer_id = order_table.customer_order_id WHERE customer_table.customer_id = order_table.customer_order_id ");
$tco_count = mysqli_num_rows($sql_tco);
// customer_order_id . DISTINCT
// $sql_tcno = mysqli_query($conn, "SELECT DISTINCT customer_order_id FROM customer_table JOIN order_table ON customer_table.customer_id = order_table.customer_order_id WHERE customer_table.customer_id != order_table.customer_order_id");
// $tcno_count = mysqli_num_rows($sql_tcno); 
// ===============================
// total p
$sql_tp = mysqli_query($conn, "SELECT * FROM product_table");
$t_count = mysqli_num_rows($sql_tp);
// total published p
$sql_tpp = mysqli_query($conn, "SELECT * FROM product_table WHERE product_status = 'Publish' ");
$tp_count = mysqli_num_rows($sql_tpp);
// total not pp
$sql_npub = mysqli_query($conn, "SELECT * FROM product_table WHERE product_status = 'Not Publish' ");
$tnp_count = mysqli_num_rows($sql_npub);
// ===============================
// total order
$sql_o = mysqli_query($conn, "SELECT * FROM order_table");
$o_count = mysqli_num_rows($sql_o);
// total pending order
$sql_po = mysqli_query($conn, "SELECT * FROM order_table WHERE order_status = 'Pending' AND order_status != 'Canceled' ");
$po_count = mysqli_num_rows($sql_po);
// total under proccess order
$sql_uo = mysqli_query($conn, "SELECT * FROM order_table WHERE order_status != 'Canceled' AND order_status != 'Pending' AND order_status != 'Product Delivered' ");
$uo_count = mysqli_num_rows($sql_uo);
// total canceled order
$sql_co = mysqli_query($conn, "SELECT * FROM order_table WHERE order_status = 'Canceled' ");
$co_count = mysqli_num_rows($sql_co);
// total pending order
$sql_do = mysqli_query($conn, "SELECT * FROM order_table WHERE order_status = 'Product Delivered' ");
$do_count = mysqli_num_rows($sql_do);
 ?>
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-red">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Total Seller</h6>
<h3 class="m-b-0 f-w-700 text-white"><?php echo $s_count; ?></h3>
</div>
<div class="col-auto">
<i class="fa fa-home text-c-red f-18"></i>
</div>
</div>
<p class="m-b-0 text-white">Active<span class="label label-danger m-r-10"><?php echo $sl_count; ?></span>  Deactive<span class="label label-danger m-r-10"><?php echo $sunl_count; ?></span></p>
</div>
</div>
</div>
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-yellow">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Total Customers</h6>
<h3 class="m-b-0 f-w-700 text-white"><?php echo $tc_count; ?></h3>
</div>
<div class="col-auto">
<i class="fas fa-users text-c-yellow f-18"></i>
</div>
</div>
<p class="m-b-0 text-white">C-Ordered<span class="label label-warning m-r-10"><?php echo $tco_count; ?></span>  Non-Ordered<span class="label label-warning m-r-10"><?php echo $tcno_count = $tc_count - $tco_count; ?></span></p>
</div>
</div>
</div>
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-blue">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Total Products</h6>
<h3 class="m-b-0 f-w-700 text-white"><?php echo $t_count; ?></h3>
</div>
<div class="col-auto">
<i class="fas fa-tags text-c-blue f-18"></i>
</div>
</div>
<p class="m-b-0 text-white">Published<span class="label label-primary m-r-10"><?php echo $tp_count; ?></span>  Not Published<span class="label label-primary m-r-10"><?php echo $tnp_count; ?></span></p>
</div>
</div>
</div>
<div class="col-xl-3 col-md-6">
<div class="card prod-p-card card-green">
<div class="card-body">
<div class="row align-items-center m-b-10">
<div class="col">
<h6 class="m-b-5 text-white">Total Orders</h6>
<h3 class="m-b-0 f-w-700 text-white"><?php echo $o_count; ?></h3>
</div>
<div class="col-auto">
<i class="fas fa-database text-c-green f-18"></i>
</div>
</div>
<p class="m-b-0 text-white">Pending<span class="label label-success m-r-10"><?php echo $po_count; ?></span>  Under Process<span class="label label-success m-r-10"><?php echo $uo_count; ?></span></p>
<p class="m-b-0 text-white">Canceled<span class="label label-success m-r-10"><?php echo $co_count; ?></span>  Delivered<span class="label label-success m-r-10"><?php echo $do_count; ?></span></p>
</div>
</div>
</div>

<!-- product profit end ---------------------------------------------->

</div>
<?php } ?>

<div class="row">
<?php 
$seller_req_id = $auth['seller_req_id'];    
$c_user= $auth['seller_company_title'];
// total p
$sql_sell = mysqli_query($conn, "SELECT * FROM product_table join seller_request_table ON seller_request_table.seller_id = product_table.product_seller_id WHERE seller_request_table.seller_id = $seller_req_id AND seller_request_table.seller_company_title = '$c_user'");
$p_count = mysqli_num_rows($sql_sell);


// published p
$sql_pub = mysqli_query($conn, "SELECT * FROM product_table join seller_request_table ON seller_request_table.seller_id = product_table.product_seller_id WHERE seller_request_table.seller_id = $seller_req_id AND seller_request_table.seller_company_title = '$c_user' AND product_status = 'Publish' ");
$pb_count = mysqli_num_rows($sql_pub);

// Not Published p
$sql_npub = mysqli_query($conn, "SELECT * FROM product_table join seller_request_table ON seller_request_table.seller_id = product_table.product_seller_id WHERE seller_request_table.seller_id = $seller_req_id AND seller_request_table.seller_company_title = '$c_user' AND product_status = 'Not Publish' ");
$npb_count = mysqli_num_rows($sql_npub);


// total my order
// total order / DISTINCT customer_order_id
$sql_mo = mysqli_query($conn, "SELECT * FROM order_table JOIN product_table ON order_table.product_order_id = product_table.product_id JOIN customer_table ON order_table.customer_order_id = customer_table.customer_id join seller_request_table ON seller_request_table.seller_id = product_table.product_seller_id WHERE seller_request_table.seller_id = $seller_req_id AND seller_request_table.seller_company_title = '$c_user'");
$m_count = mysqli_num_rows($sql_mo);


 ?>

<div class="col-xl-6 col-md-6">
<div class="card prod-p-card card-blue">
<div class="card-body" style="padding: 25px;">
<div class="row align-items-center m-b-29">
<div class="col">
<h6 class="m-b-5 text-white">My Products</h6>
<h3 class="m-b-0 f-w-700 text-white"><?php echo $p_count; ?></h3>
</div>
<div class="col-auto">
<i class="fas fa-tags text-c-blue f-18"></i>
</div>
</div>
<p class="m-b-0 text-white">Published<span class="label label-primary m-r-10"><?php echo $pb_count; ?></span>  Not Published<span class="label label-primary m-r-10"><?php echo $npb_count; ?></span></p>
</div>
</div>
</div>

<div class="col-xl-6 col-md-6">
<div class="card prod-p-card card-green">
<div class="card-body">
<div class="row align-items-center m-b-30">
<div class="col">
<h6 class="m-b-5 text-white">Customer Orders</h6>
<h3 class="m-b-0 f-w-700 text-white"><?php echo $m_count; ?></h3>
</div>
<div class="col-auto">
<i class="fas fa-database text-c-green f-18"></i>
</div>
</div>

</div>
</div>
</div>




</div>





                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- [ style Customizer ] start -->
                    <div id="styleSelector">
                    </div>
                    <!-- [ style Customizer ] end -->
                </div>
            </div>
        </div>
    </div>

    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- waves js -->
    <script src="files/assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- Float Chart js -->
    <script src="files/assets/pages/chart/float/jquery.flot.js"></script>
    <script src="files/assets/pages/chart/float/jquery.flot.categories.js"></script>
    <script src="files/assets/pages/chart/float/curvedLines.js"></script>
    <script src="files/assets/pages/chart/float/jquery.flot.tooltip.min.js"></script>
    <!-- Chartlist charts -->
    <script src="files/bower_components/chartist/js/chartist.js"></script>
    <!-- amchart js -->
    <script src="files/assets/pages/widget/amchart/amcharts.js"></script>
    <script src="files/assets/pages/widget/amchart/serial.js"></script>
    <script src="files/assets/pages/widget/amchart/light.js"></script>
    <!-- Custom js -->
    <script src="files/assets/js/pcoded.min.js"></script>
    <script src="files/assets/js/vertical/vertical-layout.min.js"></script>
    <script type="text/javascript" src="files/assets/pages/dashboard/custom-dashboard.min.js"></script>
    <script type="text/javascript" src="files/assets/js/script.min.js"></script>
<script src="files/assets/notification/notify.min.js"></script>
<script src="files/assets/notification/notify.js"></script>

<!--  -->


</body>

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

</html>
