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
<li class="pcoded-hasmenu active pcoded-trigger">
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

<li class="active">
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
                                            <h5>Category Section</h5>
                                            <span>Categories</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Categories Records</a> </li>
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
<!-- category_table -->
<?php 

if (isset($_POST['add'])) {
$category = $_POST['category'];
$subcategory =$_POST['subcategory'];

$sql_in = "INSERT INTO category_table (`category`,`subcategory`) VALUES ('$category','$subcategory')";

if (!empty($category) AND !empty($subcategory)) {
    mysqli_query($conn,$sql_in);
echo "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>Added</div>";
}
else
{
echo "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>Empty</div>";
}
}




elseif (isset($_POST['edit'])) {
$cat_id = $_POST['cat_id'];
$category = $_POST['category'];
$subcategory =$_POST['subcategory'];
$sql_in = "UPDATE category_table SET category='$category',
                                     subcategory = '$subcategory' 
                                     WHERE category_id = $cat_id ";

if (!empty($category) || !empty($subcategory)) {

if (mysqli_query($conn,$sql_in)) {
echo "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>Updated</div>";
}
 else
 {
    echo("Error description: " . mysqli_error($conn));
 }   


}
else
{
echo "false";
}
}

 ?>
 <br>
      
<button class="btn btn-primary" data-toggle="modal" data-target="#modal-add-category">Add Category</button>
<br><br><br>
<!-- <div class="row"> -->
<div class="col-lg-3">
<h5 style="text-align: center; color:#dc3545;">Dropdown Section Test</h5>
<select  class="form-control">
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


<br><br><br>

<!-- <div class="row"> -->
<!-- <div class="col-lg-4"> -->
<table id="dom-jqry" class="table table-hover" style="font-size: 0.8em;">
<thead>
<tr>
<th>No</th>
<th>Category</th>
<th>Sub-Category</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    <?php 
$i = 1;
$c_query = mysqli_query($conn, "SELECT * FROM category_table ORDER BY category_id DESC");
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
<td><?php echo $row['category']; ?></td>
<td><?php echo $row['subcategory']; ?></td>
<td><?php echo $row['category_date']; ?></td>
<td style="text-align: center;">

<!-- <a type="button" data-toggle="modal" data-target="#modal-edit<?php //echo $row1['newsletters_id']; ?>"> -->

    <a href="" type="button" data-toggle="modal" data-target="#modal-edit-<?php echo $row['category_id']; ?>" >
        <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i>
    </a>

    <a href="" type="button" title="Create User!" >
        <i class="icon feather icon-trash f-w-600 f-16 m-r-15 text-c-red"></i>
    </a>

</td>
</tr>
<!-- edit category -->

<div style="text-align: left;" class="modal fade" id="modal-edit-<?php echo $row['category_id']; ?>">
<div class="modal-dialog modal-lg">
<!-- moded for edid -->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Edit</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST">
<div class="modal-body">
<div class="container">

<div class="row">
<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2">Category:</label>
<input type="hidden" value="<?php echo $row['category_id']; ?>" name="cat_id">
<input class="form-control"  type="text" value="<?php echo $row['category']; ?>" name="category" >
</div>
<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2">Sub-Category:</label>
<input class="form-control"  type="text" value="<?php echo $row['subcategory']; ?>" name="subcategory" >
</div>
</div>

</div>

<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button  name="edit" type="submit" class="btn btn-primary">Update</button >
</div>

</div>
</form>
</div>
</div>
</div>
<!--  -->
<?php 
}
 ?>

</tbody>
<tfoot>
<tr>
<th>No</th>
<th>Category</th>
<th>Sub-Category</th>
<th>Date</th>
<th>Action</th>
</tr>
</tfoot>
</table>
<!-- </div> -->

<!-- </div> -->
</div>
        <!-- <br><br><br><br><br>      -->
<!--  -->      
<!-- <div class="col-lg-2"> -->


<!-- 
    <div class="table-responsive dt-responsive col-lg-5" style="outline: solid 1px; margin: auto; margin-top: 0px;">
<table id="example" class="table table-hover" style="font-size: 0.8em;">
<thead>
<tr>
<th>No</th>
<th>Category</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>

 </tbody>
 </table>

</div> -->

<!-- add category -->

<div style="text-align: left;" class="modal fade" id="modal-add-category">
<div class="modal-dialog modal-lg">
<!-- moded for edid -->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Add Category</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST">
<div class="modal-body">
<div class="container">

<div class="row">
<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2">Category:</label>
<input class="form-control"  type="text" placeholder="Category" name="category" >
</div>
<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2">Sub-Category:</label>
<input class="form-control"  type="text" placeholder="Sub-Category" name="subcategory" >
</div>
</div>

</div>

<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button  name="add" type="submit" class="btn btn-primary">Update</button >
</div>

</div>
</form>
</div>
</div>
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
// Add the following code if you want the name of the file appear on select
// $(".custom-file-input").on("change", function() {
//   var fileName = $(this).val().split("\\").pop();
//   $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
// });
// 
// $(document).ready(function() {
//      var refreshId = setInterval(function() {
//      $("#time").load(" #time");
//           $("#time1").load(" #time1");
//           $("#time2").load(" #time2");
//      }, 3000);
// });
// // 
// function order_noti(e,o_id,c_id) {
// e.preventDefault(e);
// $.ajax
// ({
// type: "POST",
// url: "add_noti",
// data: { o_id:o_id, c_id:c_id},
// success: function (data) {
// $('.result').html(data);
// }
// });
// }
// // 
// function reject_order(e,o_id,c_id) {
// e.preventDefault(e);
// $.ajax
// ({
// type: "POST",
// url: "reject_order",
// data: { o_id:o_id, c_id:c_id},
// success: function (data) {
// $('.result').html(data);
// }
// });
// }
$(document).ready(function() {
    $('#example').DataTable();
} );

$(document).ready(function(){
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
})
</script>
</body>

</html>
