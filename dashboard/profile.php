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
$user = $auth['seller_user'];
}
else {
echo "<script>window.location='login';</script>";
}


$c_query = mysqli_query($conn, "SELECT * FROM seller_request_table JOIN seller_profile_table ON seller_request_table.seller_id= seller_profile_table.seller_req_id  WHERE seller_profile_table.seller_user = '$user' ");
$rw = mysqli_fetch_assoc($c_query);

// ===pass
if (isset($_POST['update'])) {


   $pass = stripslashes($_POST['pass']);
   $pass = mysqli_real_escape_string($conn,$pass);
   $password = sha1($pass);


// Validate password strength
$uppercase = preg_match('@[A-Z]@', $pass);
$lowercase = preg_match('@[a-z]@', $pass);
$number    = preg_match('@[0-9]@', $pass);
$specialChars = preg_match('@[^\w]@', $pass);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
    $err = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
}
elseif (empty($pass)) {
  $err = "empty";
}
else
{
  $qq_up =" UPDATE seller_profile_table SET seller_password = '$password' WHERE seller_user = '$user' ";
  mysqli_query($conn, $qq_up);
$err = "Password Changed";
}
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
<?php 
if ($auth['seller_right'] == 'Super Admin' || $auth['seller_right'] == 'Admin') {
?>
<!--                                             -->
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
<i class="feather icon-user bg-c-blue"></i>
<div class="d-inline">
<h5>Profile</h5>
<span>Seller Profile</span>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="index"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="#!">Seller Profile</a> </li>
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
<h5>Detatils</h5>
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
if (isset($_POST['update'])) {
echo "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>".$err."</div><br>
";
}
 ?>
    <div class="row">

            <div class="col-lg-5">
                <img src="data_files/logo/<?php echo $rw['seller_logo']; ?>" width="150" height="150" class="img-radius"><br>

<p style="margin: 15px 0px 0px 0px;"><strong style="font-weight:bold; color:#dc3545; bold; width: 150px; display: inline-block;">Company Title:</strong> <?php echo $rw['seller_company_title']; ?></p>
<div class="bot-border" style="border-top: solid 1px;"></div>
<p style="margin: 15px 0px 0px 0px;"><strong style="font-weight:bold; color:#dc3545; bold; width: 150px; display: inline-block;">Full Name:</strong> <?php echo $rw['seller_fname']." ".$rw['seller_lname']; ?></p>
<div class="bot-border" style="border-top: solid 1px;"></div>
<p style="margin: 15px 0px 0px 0px;"><strong style="font-weight:bold; color:#dc3545; bold; width: 150px; display: inline-block;">Email:</strong> <?php echo $rw['seller_email']; ?></p>
<div class="bot-border" style="border-top: solid 1px;"></div>
<p style="margin: 15px 0px 0px 0px;"><strong style="font-weight:bold; color:#dc3545; bold; width: 150px; display: inline-block;">Phone:</strong> <?php echo $rw['seller_phone']; ?></p>
<div class="bot-border" style="border-top: solid 1px;"></div>
<p style="margin: 15px 0px 0px 0px;"><strong style="font-weight:bold; color:#dc3545; bold; width: 150px; display: inline-block;">WhatsApp:</strong> <?php echo $rw['seller_whatsapp']; ?></p>
<div class="bot-border" style="border-top: solid 1px;"></div>
<p style="margin: 15px 0px 0px 0px;"><strong style="font-weight:bold; color:#dc3545; bold; width: 150px; display: inline-block;">Address:</strong> <?php echo $rw['seller_address']; ?></p>
<div class="bot-border" style="border-top: solid 1px;"></div>
<p style="margin: 15px 0px 0px 0px;"><strong style="font-weight:bold; color:#dc3545; bold; width: 150px; display: inline-block;">Country:</strong> <?php echo $rw['seller_country']; ?></p>
<div class="bot-border" style="border-top: solid 1px;"></div>
<p style="margin: 15px 0px 0px 0px;"><strong style="font-weight:bold; color:#dc3545; bold; width: 150px; display: inline-block;">City:</strong> <?php echo $rw['seller_city']; ?></p>
<div class="bot-border" style="border-top: solid 1px;"></div>
<p style="margin: 15px 0px 0px 0px;"><strong style="font-weight:bold; color:#dc3545; bold; width: 150px; display: inline-block;">Profile:</strong> <?php 
        if ($rw['seller_profile'] == "") {
             echo "N/A";
         } else {
             echo "<a href='data_files/profiles/".$rw['seller_profile']."' style='color:#FF5370;'>Download</a>";
         }
          ?></p>
<div class="bot-border" style="border-top: solid 1px;"></div>
<p style="margin: 15px 0px 0px 0px;"><strong style="font-weight:bold; color:#dc3545; bold; width: 150px; display: inline-block;">License:</strong> <?php 
        if ($rw['seller_license'] == "") {
             echo "N/A";
         } else {
             echo "<a href='data_files/lisence/".$rw['seller_license']."' style='color:#FF5370;'>Download</a>";
         }
          ?></p>
<div class="bot-border" style="border-top: solid 1px;"></div>
<p style="margin: 15px 0px 0px 0px;"><strong style="font-weight:bold; color:#dc3545; bold; width: 150px; display: inline-block;">Company Details:</strong> <?php echo $rw['seller_details']; ?></p>
<div class="bot-border" style="border-top: solid 1px;"></div>
        </div>



    </div>
</div>
<br><br>
<div class="container">
<a href="index" class="btn btn-success">Home</a>
<span class="btn btn-danger" style="background-color: #dc3545;" data-toggle="modal" data-target="#pass-update<?php echo $rw['seller_user']; ?>">Reset Password</span>
</div>
<!-- ===================================== -->
<div style="text-align: left;" class="modal fade" id="pass-update<?php echo $rw['seller_user']; ?>">
<div class="modal-dialog modal-sm">
<div class="modal-content">

<div class="modal-body">
<div class="container">
<h4 class="modal-title" style="color: #dc3545;">Update Password</h4>
<form method="POST"> 
 <label>New Password</label>
 <input type="password" class="form-control" name="pass" placeholder="Type Password">
<br>
<button type="submit" name="update" class="btn btn-danger btn-sm waves-effect text-center m-b-20 iinntt" style="color:#fff;display: flex;">Update</button>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- =============================== -->
<!--  -->
<br><br><br>
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
$(document).ready(function(){
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
})
// 
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
