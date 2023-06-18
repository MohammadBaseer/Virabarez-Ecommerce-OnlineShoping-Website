<?php 
include_once "../../includes/conn.php";
$err ="";
 if (isset($_POST['create']))
 {
// $seller_req_id = $_POST ['seller_req_id'];
$seller_account = $_POST ['seller_account'];
$seller_password = $_POST ['seller_password'];
$seller_country = $_POST ['seller_country'];
$seller_city = $_POST ['seller_city'];
$seller_profile = $_FILES ['seller_profile']['name'];
// $seller_license = $_FILES ['seller_license']['name'];
// $seller_logo = $_FILES ['seller_logo']['name'];
$seller_company_detail = $_POST ['seller_details'];
$status = $_POST ['status'];


//profile file upload
$profile_file = time().'_'.basename($_FILES["seller_profile"]["tmp_name"]);
$fileupload ="data_files/".$profile_file;
// //license file upload
// $license_file = time().'_'.basename($_FILES["seller_license"]["tmp_name"]);
// $fileupload ="data_files/".$license_file;
// //logo upload
// $logo_file = time().'_'.basename($_FILES["seller_logo"]["tmp_name"]);
// $fileupload ="data_files/".$logo_file;

$date = date('Y-M-d');

$sql = "INSERT INTO seller_profile_table
 (`seller_req_id`,
  `seller_user`,
  `seller_password`,
   `seller_country`,
    `seller_city`,
     `seller_profile`,
      `seller_license`,
       `seller_logo`,
        `seller_details`
        , `seller_status`,
             `seller_join_date` )
  VALUES ('1',
 '$seller_account',
  '$seller_password',
   '$seller_country',
   '$seller_city',
   '$profile_file',
    'license_file',
     'logo_file',
      '$seller_company_detail',
       '$status',
        '$date');";

if($result = mysqli_query($conn,$sql))

{
//
move_uploaded_file($_FILES["seller_profile"]["tmp_name"], $fileupload);
//
// move_uploaded_file($_FILES["seller_license"]["tmp_name"], $fileupload);
// //
// move_uploaded_file($_FILES["seller_logo"]["tmp_name"], $fileupload);

  echo "Error: " . $sql . "<br>";




?>

<!--    <script>
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });
      Toast.fire({
        type: 'success',
        title: 'Update successfully.'
      })
    });
</script>
 -->
<?php
$err = "true";
}
else
{
  echo "Error: " . $sql . "<br>" . $conn->error;

  $err ="field";
}

}

echo $err;;
?>

 ?>
<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <title>Customer Records | Afghan Largest | Ecommerce Co LTD</title>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="colorlib" />
      <!-- Favicon icon -->
      <link rel="icon" href="../../files/assets/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="../../files/bower_components/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="../../files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- feather icon -->
      <link rel="stylesheet" type="text/css" href="../../files/assets/icon/feather/css/feather.css">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="../../files/assets/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="../../files/assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- Data Table Css -->
      <link rel="stylesheet" type="text/css" href="../../files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" type="text/css" href="../../files/assets/pages/data-table/css/buttons.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="../../files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="../../files/assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="../../files/assets/css/pages.css">
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
                        <a href="index.php">
                            <img class="img-fluid" src="../../files/assets/images/logo.png" alt="Theme-Logo" />
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
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <span class="badge bg-c-red">5</span>
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius" src="../../files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">John Doe</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="user-profile header-notification">

                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="../../files/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                        <span>John Doe</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>




                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="#!">
                                            <i class="feather icon-settings"></i> Settings

                                        </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                            <i class="feather icon-user"></i> Profile

                                        </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.php">
                                            <i class="feather icon-mail"></i> My Messages

                                        </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.php">
                                            <i class="feather icon-lock"></i> Lock Screen

                                        </a>
                                        </li>
                                        <li>
                                            <a href="auth-sign-in-social.php">
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
                                                <a href="index.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Default</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
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
                                                <a href="our_seller.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Our Sellers</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
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
                                                <a href="index.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Products</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="index.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Order</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="index.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Customers</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
<!--                                             -->
                                <div class="pcoded-navigation-label">SETTINGS</div>
                                
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu active pcoded-trigger">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext">CONFIGURATION</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li>
                                                <a href="index.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Users</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="customer_users.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Customer Users</span>
                                                </a>
                                            </li>
                                            <li  class="active">
                                                <a href="seller_requested.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Seller Requested</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="index.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Seller Users</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                                <!--  -->
                                <div class="pcoded-navigation-label">OTHER</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
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
                                            <h5>Request Records</h5>
                                            <span>Seller Request Records</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.php"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Request Records</a> </li>
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
<!--  -->

<!-- <div style="text-align: left;" class="modal fade" id="modal-edit<?php //echo $row['seller_id']; ?>"> -->
<!-- <div class="modal-dialog modal-lg"> -->
<!-- moded for edid -->
<!-- <div class="modal-content"> -->
<!-- <div class="modal-header">
<h4 class="modal-title"><br>



Create Profile</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div> -->

<form method="POST" enctype="multipart/form-data">

<div class="modal-body">

  <!-- ============== -->

<div class="form-group">
<input type="hidden" class="form-control"  name="seller_req_id" value="<?php echo $row['seller_id']; ?>">
<!--  -->
<div class="row">
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Account User:</label>
<input class="form-control" type="text" placeholder="Account Name" name="seller_account">
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Password:</label>
<input class="form-control" type="Password" placeholder="Password" name="seller_password">
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Country:</label>
<input class="form-control" type="text" placeholder="" name="seller_country">
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">City:</label>
<input class="form-control" type="text" placeholder="City" name="seller_city">
</div>
<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="seller_profile">
    <label class="custom-file-label" for="customFile">Company Profile</label>
  </div>
</div>
<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="seller_license">
    <label class="custom-file-label" for="customFile">License</label>
  </div>
</div>
<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="seller_logo">
    <label class="custom-file-label" for="customFile">Logo</label>
  </div>
</div>

<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2">Company Details:</label>
<textarea class="form-control" rows="5" type="text" placeholder="Detals" name="seller_details">
  </textarea>
</div>
<!-- ---- -->

<div class="form-check-inline ml-5" style="">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="status" value="unlock">Active
  </label>
</div>
<!--  -->
<div class="form-check-inline ml-5" style="">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="status" value="lock" checked>Lock
  </label>
</div>
<!--  -->
</div>
<!--  -->




</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary" name="create">Create</button>
</div>
</div>
</form>
<!-- </div> -->
<!-- /.modal-content -->
<!-- </div> -->
<!-- /.modal-dialog -->
<!-- </div> -->
<?php //echo $err."<br>"; 




?>
<!-- ========================edit modal end ============================================== -->


             
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


                         
<!-- Required Jquery -->
<script type="text/javascript" src="../../files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="../../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../../files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="../../files/bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- waves js -->
<script src="../../files/assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="../../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="../../files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="../../files/bower_components/modernizr/js/css-scrollbars.js"></script>
<!-- waves js -->
<script src="../../files/assets/pages/waves/js/waves.min.js"></script>
<!-- data-table js -->
<script src="../../files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../files/assets/pages/data-table/js/jszip.min.js"></script>
<script src="../../files/assets/pages/data-table/js/pdfmake.min.js"></script>
<script src="../../files/assets/pages/data-table/js/vfs_fonts.js"></script>
<script src="../../files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../../files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../../files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<!-- Custom js -->
<script src="../../files/assets/pages/data-table/js/data-table-custom.js"></script>
<script src="../../files/assets/js/pcoded.min.js"></script>
<script src="../../files/assets/js/vertical/vertical-layout.min.js"></script>
<script src="../../files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="../../files/assets/js/script.js"></script>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</body>


<!-- Mirrored from demo.dashboardpack.com/admindek-html/default/dt-advance.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Jan 2021 13:07:57 GMT -->
</html>
