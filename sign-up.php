<?php 
include_once "includes/conn.php";

$err = "";
@$c_name           = $_POST['c_name'];
@$c_phone          = $_POST['c_phone'];
@$c_whatsapp       = $_POST['c_whatsapp'];
@$c_country        = $_POST['c_country'];
@$c_city           = $_POST['c_city'];
@$c_address        = $_POST['c_address'];
@$c_email          = $_POST['c_email'];
@$c_confirm_pass   = sha1($_POST['c_confirm_pass']);


if (isset($_POST['singup'])) {



$result = mysqli_query($conn, "SELECT * FROM customer_table WHERE customer_email = '$c_email' ");
$row = mysqli_fetch_assoc($result);


   $pass = stripslashes($_POST['c_password']);
   $pass = mysqli_real_escape_string($conn,$pass);
   $c_password = sha1($pass);
// Validate password strength
$uppercase = preg_match('@[A-Z]@', $pass);
$lowercase = preg_match('@[a-z]@', $pass);
$number    = preg_match('@[0-9]@', $pass);
$specialChars = preg_match('@[^\w]@', $pass);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
    $err = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
}

elseif (empty($c_name) || empty($c_phone) || empty($c_whatsapp) || empty($c_country) || empty($c_city) || empty($c_address) || empty($c_email) || empty($c_password)  ) {
  $err = "*Empty Filed";
}
// // Phone Lenght Check
// elseif ($phonelength != 12) {
//   $err = "*Please Enter You phonr Number With Country Code <br> ex: +937********";
// }
// //whatsapp Lenght Check
// elseif ($whatsapplength != 12) {
//   $err = "*Please Enter You WhatsApp Number With Country Code <br> ex: +937********";
// }
// Email validation
 elseif (!filter_var($c_email, FILTER_VALIDATE_EMAIL)) {
      $err = "Invalid email format";
    }
// password in cornfirm password same
elseif ($c_password != $c_confirm_pass) {
  $err = "*Password Does not Match";
}
elseif ($row > 0) {
 $err = "*You Have Already an Account";
}

// else process
else
{
$date = date('Y-M-d');

  $sql = "INSERT INTO `customer_table` 
   (`customer_name`,
    `customer_phone`, 
    `custormer_whatsapp`,
    `customer_country`,
    `customer_city`,
    `customer_address`,
    `customer_joining_date`,
    `customer_email`,
    `customer_pass` )
     VALUES 
     ('$c_name',
      '$c_phone',
      '$c_whatsapp',
      '$c_country',
      '$c_city',
      '$c_address',
      '$date',
      '$c_email',
      '$c_password'  );";


if (mysqli_query($conn,$sql)) {



$err = "Successful";
echo "<script>window.location='login';</script>";







} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
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
<title>Signup | E-commerce Marketplace</title>

<link rel="icon" href="img/favicon.ico" type="image/x-icon">


      <!-- Favicon icon -->
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
                                        <h3 class="text-center txt-danger">Sign up</h3>
                                    </div>
                                </div>

                                <p class="text-muted text-center p-b-5">Sign up with your regular account</p>
                                <div class="form-group form-danger">
                                    <input type="text" name="c_name" class="form-control <?php if (isset($_POST['singup'])){echo "fill";} ?>" value="<?php echo $c_name; ?>" >
                                    <span class="form-bar"></span>
                                    <label class="float-label">Full Name</label>
                                </div>
<div class="row">
<div class="col-sm-6">
<div class="form-group form-danger">
<input type="text" name="c_phone" class="form-control <?php if (isset($_POST['singup'])){echo "fill";} ?>" value="<?php echo $c_phone; ?>">
<span class="form-bar"></span>
<label class="float-label">Phone Number</label>
</div>

</div>
<div class="col-sm-6">
<div class="form-group form-danger">
<input type="text" name="c_whatsapp" class="form-control <?php if (isset($_POST['singup'])){echo "fill";} ?>" value="<?php echo $c_whatsapp; ?>">
<span class="form-bar"></span>
<label class="float-label">WhatsApp</label>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">









<?php 
$sl_sql =mysqli_query($conn,"SELECT * FROM countries_table");
 ?>
<select name="c_country" class="form-control form-control-danger fill">

  <option>Select Country</option>
  <?php 
while ($s_row = mysqli_fetch_assoc($sl_sql)) {
echo "  <option value='".$s_row['country_name']."'>".$s_row['country_name']."</option>";
}  
?>
</select>










</div>
<div class="col-sm-6">
<div class="form-group form-danger">
<input type="text" name="c_city" class="form-control <?php if (isset($_POST['singup'])){echo "fill";} ?>" value="<?php echo $c_city; ?>">
<span class="form-bar"></span>
<label class="float-label">City</label>
</div>
</div>
</div>




<div class="form-group form-danger">
<input type="text" name="c_address" class="form-control <?php if (isset($_POST['singup'])){echo "fill";} ?>" value="<?php echo $c_address; ?>">
<span class="form-bar"></span>
<label class="float-label">Address</label>
</div>


<div class="form-group form-danger">
<input type="text" name="c_email" class="form-control <?php if (isset($_POST['singup'])){echo "fill";} ?>" value="<?php echo $c_email; ?>">
<span class="form-bar"></span>
<label class="float-label">Your Email Address</label>
</div>

<div class="row">
<div class="col-sm-6">
<div class="form-group form-danger">
<input type="password" name="c_password" class="form-control <?php if (isset($_POST['singup'])){echo "fill";} ?>">
<span class="form-bar"></span>
<label class="float-label">Password</label>
</div>
</div>
<div class="col-sm-6">
<div class="form-group form-danger">
<input type="password" name="c_confirm_pass" class="form-control <?php if (isset($_POST['singup'])){echo "fill";} ?>">
<span class="form-bar"></span>
<label class="float-label">Confirm Password</label>
</div>
</div>
</div>
  <?php 

if (!empty($err)) {
  echo '<div class="p-2 " style="border-radius: 10px; background: #f5758114;">' .$err. '</div>'; 
}

  ?>





                                <div class="row m-t-30">
                                    <div class="col-md-12">
              <button class="btn btn-danger btn-md btn-block waves-effect text-center m-b-20" name="singup">Sign up now</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Thank you.</p>
                                        <p class="text-inverse text-left"><a href="index"><b>Back to website</b></a></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

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
<!-- i18next.min.js -->
<script type="text/javascript" src="dashboard/files/bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="dashboard/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="dashboard/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="dashboard/files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<script type="text/javascript" src="dashboard/files/assets/js/common-pages.js"></script>
</body>

<script>
  $(document).ready(function(){
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
})
</script>

</html>
