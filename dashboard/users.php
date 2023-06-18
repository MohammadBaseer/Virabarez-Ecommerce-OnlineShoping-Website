<?php 
session_start();
include_once "includes/conn.php";
if(isset($_SESSION['seller_user'])){
$user = $_SESSION['seller_user'];
$auth_sql = "SELECT * FROM seller_profile_table 
left join seller_request_table on seller_request_table.seller_id = seller_profile_table.seller_req_id WHERE seller_profile_table.seller_user = '$user' ";
$auth_query = mysqli_query($conn, $auth_sql);
$auth = mysqli_fetch_assoc($auth_query);

$cc_p = $auth['seller_req_id'];

if ($auth['seller_right'] != 'Super Admin' AND $auth['seller_right'] != 'Admin') {
echo "<script>window.location='404';</script>";
}

}
else {
echo "<script>window.location='login';</script>";
}
 

$c_query = mysqli_query($conn, "SELECT * FROM seller_request_table,seller_profile_table WHERE seller_request_table.seller_id = seller_profile_table.seller_req_id ORDER BY seller_profile_table.seller_profile_id DESC");
// ===

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
<!--  -->
<?php } ?>
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
<!--  -->
<!--                                              -->
<?php 
if ($auth['seller_right'] == 'Super Admin' || $auth['seller_right'] == 'Admin') {
?>
<div class="pcoded-navigation-label">USERS MANAGEMENT</div>

<ul class="pcoded-item pcoded-left-item">
<li class="pcoded-hasmenu active pcoded-trigger">
<a href="javascript:void(0)" class="waves-effect waves-dark">
<span class="pcoded-micon"><i class="feather icon-home"></i></span>
<span class="pcoded-mtext">USERS</span>
</a>
<ul class="pcoded-submenu">
<li class="active">
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
<li class="">
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
<i class="feather icon-user bg-c-blue"></i>
<div class="d-inline">
<h5>Seller Records</h5>
<span>All Seller Records</span>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="index"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="#!">Seller Records</a> </li>
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
<div class="table-responsive dt-responsive">
    <?php 
// if(isset($_POST['lock']))
//  {   
// echo "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>".$err, "</div>
// // ";
// }
     ?>
<table id="dom-jqry" class="table table-hover" style="font-size: 0.8em;">
<thead>
<tr>
    <th>No</th>
<th>Name</th>
<th>Company Title</th>
<th>User Name</th>
<th>Email</th>
<th>Users Status</th>
<th>Action</th>

</tr>
</thead>
<tbody>
<?php 
$i = 1;
while ($row = mysqli_fetch_assoc($c_query))
{ 
?>
<tr>
<td>
<?php
echo $i;
$i++;
?>
</td>
<td><?php echo $row['seller_fname']." ".$row['seller_lname']; ?></td>   
<td><?php echo $row['seller_company_title']; ?></td>
<td><?php echo $row['seller_user']; ?></td>
<td><?php echo $row['seller_email']; ?></td>
<td>
<?php if($row['seller_status'] =='lock'){
echo "<span class='label label-danger'>Lock</span>";
 } 
else
{
echo "<span class='label label-success'>Active</span>";
}
 ?>

    </td>

<td style="text-align: center;" >
 
<a href="#!" data-toggle="modal" data-target="#modal-edit<?php echo $row['seller_req_id']; ?>">
<i class="icon feather icon-file f-w-600 f-16 m-r-15 text-c-green"></i>
</a>
<!--  -->

<a href="edit_users?editusers=<?php echo $row['seller_req_id']; ?>">
<i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i>
</a>
<a href="our_seller_products?seller=<?php echo $row['seller_req_id']; ?>&title=<?php echo $row['seller_company_title']; ?>">
<i class="icon feather icon-package f-w-600 f-16 m-r-15 text-c-green"></i>
</a>






<?php 
if ($row['seller_right'] == 'Seller') {
if($row['seller_status'] =='lock'){
    ?>
<a href="user_status?unlock=<?php echo $row['seller_req_id'];?>&us_type=<?php echo $row['seller_right'];?>" >
<span class="fa fa-unlock f-w-600 f-16 m-r-15 text-c-yellow" style="border: none;
    background: none; outline: none;" name="lock"></span>
</a>

<?php
 } 
else
{
    ?>
<a href="user_status?lock=<?php echo $row['seller_req_id']; ?>" >
<span class="icon feather icon-lock f-w-600 f-16 m-r-15 text-c-red" style="border: none;
    background: none; outline: none;" name="lock"></span>
</a>
<?php
}
}
else
{
     ?>
<a disabled >
<span class="fa fa-ban f-w-600 f-16 m-r-15 text-c-red" disabled style="border: none;
    background: none; outline: none; pointer-events: auto! important;
     cursor: not-allowed! important;" name="lock"></span>
</a>
<?php   
}

 ?>










</td>


</tr>
<!-- ================= -->



<div style="text-align: left;" class="modal fade" id="modal-edit<?php echo $row['seller_req_id']; ?>">
<div class="modal-dialog modal-md">
<!-- moded for edid -->
<div class="modal-content">
<div class="modal-header" style="border: none;">
<h4 class="modal-title" style="color: #dc3545;">Seller Information</h4> 
<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline: none;">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body">
<div class="container">
<div class="row">

<!-- ============= -->
<div class="tab-pane active" style="width: 80%;">
<div class="product__details__tab__desc">

<div class="row">
<div class="col-6" style="text-align: center;">
    <img class="img-fluid p-absolute" src="data_files/logo/<?php echo $row['seller_logo']; ?>" height="100" width="100">
</div>
<div class="col-6">
<p style="margin: 0px;"><span style="font-weight: bold;">Active Products:&nbsp;</span>
<span class="label label-success">

<?php 
$ppp = $row['seller_req_id'];
$cc_oo = mysqli_query($conn, "SELECT * FROM seller_profile_table,product_table WHERE seller_profile_table.seller_req_id = product_table.product_seller_id AND seller_profile_table.seller_req_id = '$ppp' AND product_table.product_status = 'Publish' ");
$num = mysqli_num_rows($cc_oo);
echo $num;
 ?>
</span></p>
<br>
<p style="margin: 0px;"><span style="font-weight: bold;">Deactive Products:&nbsp;</span>
    <span class="label label-danger">
<?php 
$cc_oo = mysqli_query($conn, "SELECT * FROM seller_profile_table,product_table WHERE seller_profile_table.seller_req_id = product_table.product_seller_id AND seller_profile_table.seller_req_id = '$ppp' AND product_table.product_status = 'Not Publish' ");
$num1 = mysqli_num_rows($cc_oo);
echo $num1;
 ?>
</span>
</p>

</div>
</div>

<br><br>
<p style="margin: 0px;"><span style="font-weight: bold;">Company Title:&nbsp;</span><?php echo $row['seller_company_title']; ?></p>

<p style="margin: 0px;"><span style="font-weight: bold;">Seller Name:&nbsp;</span><?php echo $row['seller_fname']." ".$row['seller_lname']; ?></p>

<p style="margin: 0px;"><span style="font-weight: bold;">Phone:&nbsp;</span><?php echo $row['seller_phone']; ?></p>

<p style="margin: 0px;"><span style="font-weight: bold;">WhatsApp:&nbsp;</span><?php echo $row['seller_whatsapp']; ?></p>

<p style="margin: 0px;"><span style="font-weight: bold;">Counter:&nbsp;</span><?php echo $row['seller_country']; ?></p>

<p style="margin: 0px;"><span style="font-weight: bold;">City:&nbsp;</span><?php echo $row['seller_city']; ?></p>

<p style="margin: 0px;"><span style="font-weight: bold;">Address:&nbsp;</span><?php echo $row['seller_address']; ?></p>



<p style="margin: 0px;"><span style="font-weight: bold;">Profile:&nbsp;</span>
<?php 
        if ($row['seller_profile'] == "") {
             echo "N/A";
         } else {
             echo "<a href='data_files/profiles/".$row['seller_profile']."' style='color:#FF5370;'>Download</a>";
         }
          ?>
</p>


<p style="margin: 0px;"><span style="font-weight: bold;">License:&nbsp;</span>
    <?php 
        if ($row['seller_license'] == "") {
             echo "N/A";
         } else {
             echo "<a href='data_files/lisence".$row['seller_license']."' style='color:#FF5370;'>Download</a>";
         }
          ?>
</p>

<p style="margin: 0px;"><span style="font-weight: bold;">Join Date:&nbsp;</span><?php echo $row['seller_join_date']; ?></p>

<p style="margin: 0px;"><span style="font-weight: bold;">Description:&nbsp;</span><?php echo $row['seller_details']; ?></p>




</div>
</div>
<!-- ============= -->
<div class="modal-footer justify-content-between">
<a href="reset_seller_account_password?e5HxuYol1Io8JLdit=<?php echo $row['seller_id']; ?>&c5HxuYol1Io8JL_i=<?php echo $row['seller_company_title']; ?><?php echo "&token=ya29.5HxuYol1Io8JLeGePDznbfkkwu_PC4uodKwG8_1clFYAn9AgdOV1WGpOTNQP3s76HAsn7Y4zWw"; ?>" type="submit" class="btn btn-primary">Reset Password</a>
</div>
</div>
</div>
</div>
</div>
</div>
<br><br>
</div>


<?php 

}
?>

</tbody>
<!-- <tfoot>
<tr>
<th>Name</th>
<th>Phone</th>
<th>WhatsApp</th>
<th>Email</th>
<th>Country</th>
<th>City</th>
<th>Adress</th>
<th>join Date</th>
<th>Action</th>
</tr>
</tfoot> -->
</table>
</div>

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
<!-- [ style Customizer ] start -->
<div id="styleSelector">
</div>
<!-- [ style Customizer ] end -->
</div>
</div>
</div>
</div>
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
