
<?php
$error ="";
include_once "includes/conn.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="description" content="ViraBarez E-commerce Marketplace">
<meta name="keywords" content="ViraBarez, Marketplace">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>New Password | E-commerce Marketplace</title>

<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="dashboard/files/bower_components/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="dashboard/files/assets/css/style.css"><link rel="stylesheet" type="text/css" href="dashboard/files/assets/css/pages.css">

</head>
<body>



<section class="login-block">
<div class="container-fluid">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">




<form  class="md-float-material form-material" method="post" action="" name="update">
<div class="text-center">
<img src="img/logo.png" alt="logo.png">
</div>
<div class="auth-box card">
<div class="card-block">
<div class="row m-b-20">
<div class="col-md-12">
<h3 class="text-left" style="text-align:center !important; color: #dc3545;">Reset User Password</h3>
</div>
</div>
<div class="form-group form-danger">




<?php



if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
$key = $_GET["key"];
$email = $_GET["email"];
$curDate = date("Y-m-d H:i:s");
$query = mysqli_query($conn, "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `email`='" . $email . "';");
$row = mysqli_num_rows($query);
if ($row == "") {
$error .= '<h2>Invalid Link</h2>';
} else {
$row = mysqli_fetch_assoc($query);
$expDate = $row['expDate'];
if ($expDate >= $curDate) {
?> 
<!-- <h2>Reset Password</h2>    -->


<input type="hidden" name="action" value="update" class="form-control"/>
<div class="form-group form-danger">
<!-- <label><strong>Enter New Password:</strong></label> -->
<input type="password"  name="pass1" class="form-control fill"/>
<span class="form-bar"></span>
<label class="float-label">New Password</label>
</div>
<div class="form-group form-danger">
<!-- <label><strong>Re-Enter New Password:</strong></label> -->
<input type="password"  name="pass2" class="form-control fill"/>
<span class="form-bar"></span>
<label class="float-label">Re-Enter New Password</label>
</div>
<input type="hidden" name="email" value="<?php echo $email; ?>"/>
<div class="form-group">
<input type="submit" id="reset" value="Reset Password"  class="btn btn-danger btn-md btn-block waves-effect text-center m-b-20"/>
</div>



<?php
} else {
$error .= "<h2>Link Expired</h2>";
}
}




if ($error != "") {
echo "<div class='error' style='text-align:center !important;'>" . $error . "</div><br />";
}
}
if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
$error = "";
$pass1 = mysqli_real_escape_string($conn, $_POST["pass1"]);
$pass2 = mysqli_real_escape_string($conn, $_POST["pass2"]);
$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");
if ($pass1 != $pass2) {
$error .= "<p style='text-align:center !important;'>Password do not match, both password should be same.<br /><br /></p>";
}
if ($error != "") {
echo $error;
} else {

if (empty($_POST["pass1"]) && empty($_POST["pass"])) {
$error .= "<p style='text-align:center !important;'>Input is empty.<br /><br /></p>";
}
if ($error != "") {
echo $error;
} else {
$uppercase = preg_match('@[A-Z]@', $pass1);
$lowercase = preg_match('@[a-z]@', $pass1);
$number    = preg_match('@[0-9]@', $pass1);
$specialChars = preg_match('@[^\w]@', $pass1);
if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass1) < 8) {
$error .= "<p style='text-align:center !important;'>Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p>";
}
if ($error != "") {
echo $error;
} else {
$pass1 = sha1($pass1);
mysqli_query($conn, "UPDATE `customer_table` SET `customer_pass` = '" . $pass1 . "', `trn_date` = '" . $curDate . "' WHERE `email` = '" . $email . "'");

mysqli_query($conn, "DELETE FROM `password_reset_temp` WHERE `email` = '$email'");


// here sesseion




session_start();
  $_SESSION['customer_user'] = $_GET["email"];
  $_SESSION['customer_password'] = $pass1;

echo "<script>window.location='profile';</script>";

}
}
}
}
?>



</div>
</div>
</div>
</form>


</div>
<div class="col-md-4"></div>
</div>
</div>
</section>


</body>

<script type="text/javascript" src="dashboard/files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="dashboard/files/bower_components/bootstrap/js/bootstrap.min.js"></script>
<script src="dashboard/files/assets/pages/waves/js/waves.min.js"></script>
<script type="text/javascript" src="dashboard/files/assets/js/common-pages.js"></script>
</body>
<script>
// $(document).ready(function(){
// if ( window.history.replaceState ) {
// window.history.replaceState( null, null, window.location.href );
// }
// })
</script>


</html>