<?php 
include_once('includes/conn.php');

$err = '';

session_start();



//receive msg from reset page
if(isset($_SESSION['p_msg']))
{
    $err = $_SESSION['p_msg'];
   unset($_SESSION['p_msg']);
}


 
 

if(isset($_SESSION['customer_user'])){
    $auth = $_SESSION['customer_user'];
   echo "<script>window.location='index';</script>";
    // echo "true";


 }
 else
 { 
if (isset($_POST['login'])) {

   $username = stripslashes($_POST['user']);
   $username = mysqli_real_escape_string($conn,$username);
   $password = stripslashes(sha1($_POST['password']));
   $password = mysqli_real_escape_string($conn,$password);
   
 $query = "SELECT * FROM customer_table WHERE customer_email = '$username' AND customer_pass = '$password' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);
@$user =$row['customer_email'];
@$pass =$row['customer_pass'];

$username = strtolower($username);
$user = strtolower($user);

if (empty($username) || empty($password)) {
  $err = '<b>Enter user and password*</b>';
} 



elseif ($user !== $username ) {
  $err = '<b>Wrong user*</b>';
}


elseif ($pass !== $password) {
  $err = '<b>Wrong Password*</b>';
}



elseif ($count == 1) {
   $_SESSION['customer_user'] = $username;
   $_SESSION['customer_password'] = $password;

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
<html>
<meta charset="UTF-8">
<meta name="description" content="ViraBarez E-commerce Marketplace">
<meta name="keywords" content="ViraBarez, Marketplace">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Customer Login | E-commerce Marketplace</title>
<link rel="icon" href="img/favicon.ico" type="image/x-icon">


      <link rel="icon" href="dashboard/files/assets/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->     
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="dashboard/files/bower_components/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="dashboard/files/assets/pages/waves/css/waves.min.css" type="text/css" media="all"><!-- feather icon --> <link rel="stylesheet" type="text/css" href="dashboard/files/assets/icon/feather/css/feather.css">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="dashboard/files/assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="dashboard/files/assets/icon/icofont/css/icofont.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="dashboard/files/assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="dashboard/files/assets/css/style.css"><link rel="stylesheet" type="text/css" href="dashboard/files/assets/css/pages.css">
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
                            <img src="img/logo.png" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-danger">Customer Sign In</h3>
                                    </div>
                                </div>
                                <p class="text-muted text-center p-b-5">Sign in with ViraBarez account</p>
                                <div class="form-group form-danger">
                                    <input type="text" name="user" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Username</label>
                                </div>
                                <div class="form-group form-danger">
                                    <input type="password" name="password" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <!-- <div class="checkbox-fade fade-in-danger">
                                            <label>
                                                <input type="checkbox" value="">
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-danger"></i></span>
                                                <span class="text-inverse">Remember me</span>
                                            </label>
                                        </div> -->
                                        <div class="forgot-phone text-right float-right">
                                            <a href="reset-password" class="text-right f-w-600"> Forgot Password?</a>
                                        </div>
                                        <div style=" color: #FF5370;"><?php echo $err; ?></div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="login" class="btn btn-danger btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
                                        <p class="text-inverse text-left">Don't have an account?<a href="sign-up"> <b>Register here </b></a>for free!</p>

                                        <p class="text-inverse text-left"><a href="index"><b>Back to website</b></a></p>
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
<!-- Required Jquery -->
<script type="text/javascript" src="dashboard/files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="dashboard/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="dashboard/files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="dashboard/files/bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- waves js -->
<script src="dashboard/files/assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="dashboard/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="dashboard/files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="dashboard/files/bower_components/modernizr/js/css-scrollbars.js"></script>
<script type="text/javascript" src="dashboard/files/assets/js/common-pages.js"></script>

<script>
  $(document).ready(function(){
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
})
</script>
</body>

</html>
