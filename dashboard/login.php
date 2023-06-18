<?php 
include_once('includes/conn.php');

$err = '';

session_start();
if(isset($_SESSION['seller_user'])){
    $auth = $_SESSION['seller_user'];
   echo "<script>window.location='index';</script>";


 }
 else
 { 
if (isset($_POST['login'])) {

   $username = stripslashes($_POST['user']);
   $username = mysqli_real_escape_string($conn,$username);
   $password = stripslashes($_POST['password']);
   $password = mysqli_real_escape_string($conn,$password);
   $passw = sha1($password);

 $query = "SELECT * FROM seller_profile_table WHERE seller_user = '$username' AND seller_password = '$passw' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);
@$user =$row['seller_user'];
@$pass = $row['seller_password'];

$username = strtolower($username);
$user = strtolower($user);



if (empty($username) || empty($passw)) {
  $err = '<b>Enter user and password*</b>';
} 
elseif ($user !== $username) {
  $err = '<b>Wrong user*</b>';

}
elseif ($pass !== $passw) {
  $err = '<b>Wrong Password*</b>';

}
elseif ($row['seller_status'] == 'lock' ) {
  $err = '<b>Your Accoun has Lock, Please Contact to Administrator*</b>';
}
elseif ($row['account_status'] == 'Disabled' ) {
  $err = '<b>Out of System, Please Contact to Administrator*</b>';
}
elseif ($count == 1) {
   $_SESSION['seller_user'] = $username;
   $_SESSION['seller_password'] = sha1($passw);

  echo "<script>window.location='index';</script>";
}
else
{
  $err = "User or Password Invalid";
}
}
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
      <link rel="icon" href="files/assets/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->     
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
      <!--  Fremwork -->
      <link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="files/assets/pages/waves/css/waves.min.css" type="text/css" media="all"><!-- feather icon --> <link rel="stylesheet" type="text/css" href="files/assets/icon/feather/css/feather.css">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="files/assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="files/assets/css/style.css"><link rel="stylesheet" type="text/css" href="files/assets/css/pages.css">
  </head>

  <body themebg-pattern="theme1">
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->
    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <form class="md-float-material form-material" method="POST">
                        <div class="text-center">
                            <img src="files/assets/images/logo.png" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Seller Login</h3>
                                    </div>
                                </div>
                                <p class="text-muted text-center p-b-5">Login account</p>
                                <div class="form-group form-primary">
                                    <input type="text" name="user" class="form-control" value="<?php if(isset($_POST['login'])) echo $_POST['user']; ?>">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Username</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" >
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                </div>
                             <?php echo "<div class='container' style='color:red;'>".$err."<div>"; ?>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-danger btn-md btn-block waves-effect text-center m-b-20" name="login">LOGIN</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

<!-- Warning Section Ends -->
<!--  Jquery -->
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
<script type="text/javascript" src="files/assets/js/common-pages.js"></script>
</body>

</html>
