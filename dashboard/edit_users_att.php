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
// ===

$s_id =$_GET['s_id'];
$s_title =$_GET['s_title'];


// ===pass
if (isset($_POST['update'])) {

if (isset($_FILES['logo']['name'])) {
$logof = $_FILES['logo']['name'];
$att1 = $_POST['att1']; 
if (!empty($logof)) {
  $logof = time().'___'.time().'__'.basename($_FILES["logo"]["name"]);
} else {
  $logof = basename($_FILES["logo"]["name"]);
}

            $location = "data_files/logo/".$logof;

$sql_change1 = "UPDATE seller_request_table JOIN seller_profile_table ON seller_request_table.seller_id = seller_profile_table.seller_req_id SET 
seller_logo = '$logof' WHERE seller_request_table.seller_id = '$s_id' AND seller_request_table.seller_company_title = '$s_title' ";


if(!empty($logof)){
if($result = mysqli_query($conn, $sql_change1)){
if (file_exists("data_files/logo/".$att1)){
    @unlink("data_files/logo/".$att1);
    move_uploaded_file($_FILES["logo"]["tmp_name"],$location);
$err = " Updated";
}

$err = "No exist files";


}
}
else
{ 
  $err = "logo update err";
}
}











elseif (isset($_FILES['profile']['name'])) {
$profile = $_FILES['profile']['name'];
$att2 = $_POST['att2']; 
if (!empty($profile)) {
  $profile = time().'___'.time().'__'.basename($_FILES["profile"]["name"]);
} else {
  $profile = basename($_FILES["profile"]["name"]);
}

            $location = "data_files/profiles/".$profile;

$sql_change1 = "UPDATE seller_request_table JOIN seller_profile_table ON seller_request_table.seller_id = seller_profile_table.seller_req_id SET 
seller_profile = '$profile' WHERE seller_request_table.seller_id = '$s_id' AND seller_request_table.seller_company_title = '$s_title' ";


if(!empty($profile)){
if($result = mysqli_query($conn, $sql_change1)){
if (file_exists("data_files/profiles/".$att2)){
    @unlink("data_files/profiles/".$att2);
    move_uploaded_file($_FILES["profile"]["tmp_name"],$location);
$err = " Updated";
}
}
}
else
{ 
  $err = "profile update err";
}
}



elseif (isset($_FILES['lisence']['name'])) {
$lisence = $_FILES['lisence']['name'];
$att3 = $_POST['att3']; 
if (!empty($lisence)) {
  $lisence = time().'___'.time().'__'.basename($_FILES["lisence"]["name"]);
} else {
  $lisence = basename($_FILES["lisence"]["name"]);
}

            $location = "data_files/lisence/".$lisence;

$sql_change1 = "UPDATE seller_request_table JOIN seller_profile_table ON seller_request_table.seller_id = seller_profile_table.seller_req_id SET 
seller_license = '$lisence' WHERE seller_request_table.seller_id = '$s_id' AND seller_request_table.seller_company_title = '$s_title' ";


if(!empty($lisence)){
if($result = mysqli_query($conn, $sql_change1)){
if (file_exists("data_files/lisence/".$att3)){
    @unlink("data_files/lisence/".$att3);
    move_uploaded_file($_FILES["lisence"]["tmp_name"],$location);
$err = " Updated";
}
}
}
else
{ 
  $err = "lisence update err";
}
}
else
{
  $err ="false";
}







}
// ===========






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
if (isset($_POST['update'])) {
echo "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>".$err."</div><br>
";
}
 ?>

</div>
<br><br>
<div class="container">
<?php 

$c_query = mysqli_query($conn, "SELECT * FROM seller_request_table JOIN seller_profile_table ON seller_request_table.seller_id = seller_profile_table.seller_req_id  WHERE seller_request_table.seller_id = '$s_id' AND seller_request_table.seller_company_title = '$s_title' ");
$row = mysqli_fetch_assoc($c_query);


 ?>
<!-- =================================== -->
<div class="row">
<!-- === --> 
<div class="col-lg-3 col-md-3 col-6 mb-3" style="text-align: center;">
    <img src="data_files/logo/<?php echo $row['seller_logo']; ?>" width="150px" height="150px" style="box-shadow: -2px 1px 11px 0px rgb(90 66 66 / 97%);">
</div>
<div class="col-lg-3 col-md-3 col-6 mb-3">
<span class="btn btn-danger" style="background-color: #dc3545;" data-toggle="modal" data-target="#logo-update">Change Logo</span>
</div>


<!-- chane profile and lisence -->
<div class="col-lg-6 col-md-6 col-12 row">
 
<div class="col-lg-6 col-md-6 col-12 mb-3" style="padding: 0px !important; margin: 0px !important;">
    <p><strong style="font-weight: bold;font-size: 20px;padding: 10px;">Profile:</strong>


<?php 
if (empty($row['seller_profile'])) {
echo "N/A";
}
else
{
  echo "<a href='data_files/profiles/".$row['seller_profile']."'>Download</a> ";
}


 ?>



   </p>
</div>
<div class="col-lg-6 col-md-6 col-12 mb-3" style="padding: 0px; margin: 0px">
    <div class="custom-file">
      <span class="label label-success" style="margin:10px; background-color: #4099ff; cursor: pointer;" data-toggle="modal" data-target="#profile-update">Change Profile</span>

    </div>
</div>
<!--  -->
<div class="col-lg-6 col-md-6 col-12 mb-3" style="padding: 0px !important; margin: 0px !important;">
    <p><strong style="font-weight: bold;font-size: 20px;padding: 10px;">Lisence:</strong> 

<?php 
if (empty($row['seller_license'])) {
echo "N/A";
}
else
{
  echo "<a href='data_files/lisence/".$row['seller_license']."'>Download</a> ";
}


 ?>
    </p>
</div>
<div class="col-lg-6 col-md-6 col-12 mb-3" style="padding: 0px; margin: 0px">
    <div class="custom-file">
      <span class="label label-success" style="margin:10px; background-color: #4099ff; cursor: pointer;" data-toggle="modal" data-target="#lisence-update">Update Lisence</span>
    </div>
</div>

</div> 



<!-- === -->
</div>
<!-- =================================== -->



</div>
<!-- ===================Logo Modal================== -->
<div style="text-align: left;" class="modal fade" id="logo-update">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-body">
<div class="container">
<!-- <h4 class="modal-title" style="color: #dc3545;">Update Password</h4> -->
 <form method="POST" enctype="multipart/form-data"> 
  <br><br>

<div class="custom-file">
 <input type="hidden" name="att1" value="<?php echo $row['seller_logo'];?>">
 <input type="file" class="custom-file-input" id="customFile" name="logo">
 <label class="custom-file-label" for="customFile">Change Logo</label>
</div>
<br><br>
<button type="submit" name="update" class="btn btn-danger btn-sm waves-effect text-center m-b-20 iinntt" style="color:#fff;display: flex;">Update</button>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- =================End Logo Modal============== -->
<!-- ===================Profile Modal================== -->
<div style="text-align: left;" class="modal fade" id="profile-update">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-body">
<div class="container">
<!-- <h4 class="modal-title" style="color: #dc3545;">Update Password</h4> -->
 <form method="POST" enctype="multipart/form-data"> 
    <br><br>
<div class="custom-file">
 <input type="hidden" name="att2" value="<?php echo $row['seller_profile'];?>">
 <input type="file" class="custom-file-input" id="customFile" name="profile">
 <label class="custom-file-label" for="customFile">Change Profile</label>
</div>
<br><br>
<button type="submit" name="update" class="btn btn-danger btn-sm waves-effect text-center m-b-20 iinntt" style="color:#fff;display: flex;">Update</button>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- =================End Profile Modal============== -->
<!-- ===================Profile Modal================== -->
<div style="text-align: left;" class="modal fade" id="lisence-update">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-body">
<div class="container">
<!-- <h4 class="modal-title" style="color: #dc3545;">Update Password</h4> -->
 <form method="POST" enctype="multipart/form-data"> 
<div class="custom-file">
    <br><br>
 <input type="hidden" name="att3" value="<?php echo $row['seller_license'];?>">
 <input type="file" class="custom-file-input" id="customFile" name="lisence">
 <label class="custom-file-label" for="customFile">Change Lisence</label>
</div>
<br><br>
<button type="submit" name="update" class="btn btn-danger btn-sm waves-effect text-center m-b-20 iinntt" style="color:#fff;display: flex;">Update</button>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- =================End Profile Modal============== -->
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
// ====
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
