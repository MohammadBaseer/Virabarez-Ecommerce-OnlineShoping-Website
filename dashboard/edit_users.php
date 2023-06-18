<?php 
session_start();
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

<body>
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
<div class="loader-bar"></div>
</div>
<?php 
if ($auth['seller_right'] == 'Super Admin' || $auth['seller_right'] == 'Admin') {
?>
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
<li  class="active">
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
<i class="feather icon-user bg-c-blue"></i>
<div class="d-inline">
<h5>Edit Seller Profile</h5>
<span>Edit Profile</span>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="index"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="#!">Edit Profile</a> </li>
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
<h5>Edit</h5>
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
    
<div class="container">
 
<?php 

 $u_id = $_GET['editusers'] ;


if (isset($_POST['update_det'])) {

$s_fname = $_POST['s_fname'];
$s_lname = $_POST['s_lname'];
$c_title = $_POST['c_title'];
$s_email = $_POST['s_email'];
$s_phone = $_POST['s_phone'];
$s_whatsapp = $_POST['s_whatsapp'];
$s_country = $_POST['s_country'];
$s_city = $_POST['s_city'];
$s_add = $_POST['s_add'];
$u_type =$_POST['u_type'];
$a_status =$_POST['a_status'];
$s_desc = $_POST['s_desc'];

$sql ="UPDATE seller_request_table JOIN seller_profile_table ON seller_request_table.seller_id = seller_profile_table.seller_req_id SET  
 seller_fname = '$s_fname',
 seller_lname = '$s_lname',
 seller_company_title = '$c_title',
 seller_email = '$s_email',
 seller_phone = '$s_phone',
 seller_whatsapp = '$s_whatsapp',
 seller_country = '$s_country',
 seller_city = '$s_city',
 seller_address = '$s_add',
 seller_right = '$u_type',
 account_status = '$a_status',
 seller_details = '$s_desc' wHERE seller_request_table.seller_id = '$u_id' ";



 if (empty($s_fname) || empty($c_title) || empty($s_email) || empty($s_desc)) {
$err ="Some Input Empty*";
}
elseif (empty($u_type)) {
$err ="Please select user type*";
}
else
{

 $result = mysqli_query($conn, $sql);
 $err =  "Record Updated";
// =======

if ($a_status == 'Disabled') {
$err = "Disabled";


$sqll = "DELETE product_wish FROM product_wish JOIN product_table ON product_wish.product_wish_id = product_table.product_id JOIN seller_request_table ON seller_request_table.seller_id = product_table.product_seller_id WHERE seller_request_table.seller_id ='$u_id'  ";

if ( mysqli_query($conn,$sqll)) {
  $err = "Disabled Account";
}
else
{
$err = mysqli_error($conn);
}

}
}
}

$c_query = mysqli_query($conn, "SELECT * FROM seller_request_table JOIN seller_profile_table ON seller_request_table.seller_id = seller_profile_table.seller_req_id  wHERE seller_request_table.seller_id = '$u_id' ");
$row = mysqli_fetch_assoc($c_query);


// ===========================



 ?>
 <div class="row">
 <?php 
 if (isset($_POST['update_det'])) {
echo "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>".$err."</div><br>
";}
 if (isset($_POST['change_logo'])) {
echo "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>".$err."</div><br>
";}
 if (isset($_POST['change_profile'])) {
echo "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>".$err."</div><br>
";}
 if (isset($_POST['change_lisence'])) {
echo "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>".$err."</div><br>
";}
  ?> 
<div class="col-lg-12 col-md-12 mb-3">
<form method="POST" >
<div class="row">

<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Seller Name:</label>
<input class="form-control" type="text" name="s_fname" value="<?php echo $row['seller_fname'];?>">
</div>

<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Seller Last Name:</label>
<input class="form-control" type="text" name="s_lname" value="<?php echo $row['seller_lname'];?>">
</div>


<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Company Title:</label>
<input class="form-control" type="text" name="c_title" value="<?php echo $row['seller_company_title'];?>">
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Email:</label>
<input class="form-control" type="text" name="s_email" value="<?php echo $row['seller_email'];?>">
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Phone:</label>
<input class="form-control" type="text" name="s_phone" value="<?php echo $row['seller_phone'];?>">
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">WhatsApp:</label>
<input class="form-control" type="text" name="s_whatsapp" value="<?php echo $row['seller_whatsapp'];?>">
</div>

<?php 
$sl_sql = mysqli_query($conn,"SELECT * FROM countries_table");
 ?>
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Country:</label>
<select class="custom-select" name="s_country">
  <option value="">Select Country</option>
  <?php 
while ($s_row = mysqli_fetch_assoc($sl_sql)) {
?>
<option value="<?php echo $s_row['country_name'];?>" <?php if($row['seller_country'] == $s_row['country_name']) {echo "selected";} ?> ><?php echo $s_row['country_name'];?></option>";
<?php
 }  
?>
</select>
</div>


<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">City:</label>
<input class="form-control" type="text" name="s_city" value="<?php echo $row['seller_city'];?>">
</div>


<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Address:</label>
<input class="form-control" type="text" name="s_add" value="<?php echo $row['seller_address'];?>">
</div>
<!--  also use it in countery -->
<?php 
$sl_sql = mysqli_query($conn,"SELECT * FROM user_right");
 ?>
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">User Type:</label>
<select class="custom-select" name="u_type">
  <option value="">Select User Type</option>
  <?php 
while ($s_row = mysqli_fetch_assoc($sl_sql)) {
?>
<option value="<?php echo $s_row['user_type'];?>" <?php if($row['seller_right'] == $s_row['user_type']) {echo "selected";} ?> ><?php echo $s_row['user_type'];?></option>";
<?php
 }  
?>
</select>
</div>
<!--  -->

<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2">Account Status:</label>
<select class="custom-select" name="a_status">
  <option value="">Select User Type</option>

<option value="Enabled" <?php if($row['account_status'] == 'Enabled') {echo "selected";} ?> >Enabled</option>
<option value="Disabled" <?php if($row['account_status'] == 'Disabled') {echo "selected";} ?> >Disabled</option>

</select>
</div>
<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2">Description:</label>
<textarea id="editor1" class="form-control" rows="5" name="s_desc" type="text"><?php echo $row['seller_details'];?></textarea>
</div>

<!--  -->


<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
<?php 
if ($auth['seller_right'] == 'Super Admin' || $auth['seller_right'] == 'Admin') {

 ?>

<button name="update_det" type="submit" class="btn btn-primary">Update</button>

<?php 
}
else
{
 ?>

<!-- <button class="btn btn-primary disabled"  >Update</button> -->

<?php } ?>
</div>
</div>
</form>
<br><br>



<hr>

<a href="users" class="btn btn-danger">Back</a>
<a href="edit_users_att?s_id=<?php echo $row['seller_id'];?>&s_title=<?php echo $row['seller_company_title'];?>" class="btn btn-success">Edit More</a>
</div>
</div>
</div>


<!-- ===================================== -->

<!-- =============================== -->
<!--  -->
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
  CKEDITOR.replace( 'editor1' );

$(document).ready(function(){
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
})
// 
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
// ===
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
