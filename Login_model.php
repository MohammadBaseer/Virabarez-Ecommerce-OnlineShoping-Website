
<?php 
unset($_POST['cls']);
// sign in
$reg_err = "";
$model_err = "";
@$c_name           = $_POST['c_name'];
@$c_phone          = $_POST['c_phone'];
@$c_whatsapp       = $_POST['c_whatsapp'];
@$c_email          = $_POST['c_email'];
@$c_confirm_pass   = sha1($_POST['c_confirm_pass']);


if (isset($_POST['singup'])) {



$reg_result = mysqli_query($conn, "SELECT * FROM customer_table WHERE customer_email = '$c_email' ");
$reg_row = mysqli_fetch_assoc($reg_result);

// $phonelength= strlen($c_phone);
// $whatsapplength= strlen($c_whatsapp);


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



elseif (empty($c_name) || empty($c_phone) || empty($c_whatsapp) || empty($c_email) || empty($c_password)  ) {
  $model_err = "*Empty Filed";
  
}
// // Phone Lenght Check
// elseif ($phonelength != 12) {
//   $model_err = "*Please Enter You phonr Number With Country Code <br> ex: +937********";
  
// }
// //whatsapp Lenght Check
// elseif ($whatsapplength != 12) {
//   $model_err = "*Please Enter You WhatsApp Number With Country Code <br> ex: +937********";
  
// }
// Email validation
 elseif (!filter_var($c_email, FILTER_VALIDATE_EMAIL)) {
      $model_err = "Invalid email format";
      
    }
// password in cornfirm password same
elseif ($c_password != $c_confirm_pass) {
  $model_err = "*Password Does not Match";
  
}
elseif ($reg_row > 0) {
 $model_err = "*You Have Already an Account";



 
}

// else process
else
{
$date = date('Y-M-d');

  $reg_sql = "INSERT INTO `customer_table` 
   (`customer_name`,
    `customer_phone`,
    `custormer_whatsapp`,
    `customer_joining_date`,
    `customer_email`,
    `customer_pass` )
     VALUES 
     ('$c_name',
      '$c_phone',
      '$c_whatsapp',
      '$date',
      '$c_email',
      '$c_password'  );";


if (mysqli_query($conn,$reg_sql)) {

$reg_result = mysqli_query($conn, "SELECT * FROM customer_table WHERE customer_email = '$c_email' ");
$reg_row = mysqli_fetch_assoc($reg_result);
  $_SESSION['customer_user'] = $reg_row['customer_email'];
  $_SESSION['customer_password'] = $_POST['c_password'];


echo   $_SESSION['customer_user'];
echo  $_SESSION['customer_password'];



echo "<script>window.location.href = window.location.href;</script>";


// login section
// $model_err = "Successful";

 


} else {
  echo "Error: " . $reg_sql . "<br>" . $conn->error;
}



}

}


// ====================================Login
$msg ="";
if (isset($_POST['login'])) {

   $username = stripslashes($_POST['user']);
   $username = mysqli_real_escape_string($conn,$username);
   $password = stripslashes(sha1($_POST['password']));
   $password = mysqli_real_escape_string($conn,$password);
   
 $login_query = "SELECT * FROM customer_table WHERE customer_email = '$username' AND customer_pass = '$password' ";
$login_result = mysqli_query($conn, $login_query);
$login_row = mysqli_fetch_assoc($login_result);
$login_count = mysqli_num_rows($login_result);
@$user =$login_row['customer_email'];
@$pass = $login_row['customer_pass'];

$username = strtolower($username);
$user = strtolower($user);


if (empty($username) || empty($password)) {
  $model_err = '<b>Enter user and password*</b>';
} 
elseif ($user !== $username ) {
  $model_err = '<b>Wrong user*</b>';
}

elseif ($pass !== $password) {
  $model_err = '<b>Wrong Password*</b>';
}

elseif ($login_count == 1) {
   $_SESSION['customer_user'] = $username;
   $_SESSION['customer_password'] = $password;

   echo "<script>window.location = 'http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]';</script>";
exit;
}
else
{
   // echo "<script>alert('Field try again');</script>";
  $model_err ="field to login";

}
}

if ($model_err == "") {
  # code...


 ?>
<div style="text-align: left;" class="modal fade" id="modal-order">

<?php }else{ ?>

<div style="text-align: left; display: block; padding-right: 15px;" class="modal fade show" id="modal-order" aria-modal="true" role="dialog">

<?php } 
if (isset($_POST['cls'])) {
echo "<div style='text-align: left;' class='modal fade' id='modal-order'>";

}


?> 




<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header">
<form method="post" style="display: contents !important;">
<button name="cls" type="submit" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</form>
</div>
<div class="modal-body">


<ul class="nav nav-tabs nav-justified" role="tablist">
<li class="nav-item">
<a class="nav-link <?php if (isset($_POST['singup'])){echo "";}else{ echo"active";} ?>" data-toggle="tab" href="#log_model" role="tab" aria-selected="true" style="color: #dc3545;">Login</a>
</li>
<li class="nav-item">
<a class="nav-link <?php if (isset($_POST['singup'])) { echo"active";} ?>" data-toggle="tab" href="#log-tabs-2" role="tab" aria-selected="false" style="color: #dc3545;">Register</a>
</li>
</ul>
<div class="tab-content">

<div class="tab-pane <?php if (isset($_POST['singup'])){echo "";}else{ echo"active";} ?>" id="log_model" role="tabpanel">
<div class="product__details__tab__desc">
<!-- ======================================= -->











                    <form class="md-float-material form-material" method="POST">

                                <div class="form-group form-danger">
                                    <label class="float-label">Username</label>
<input type="text" name="user" class="form-control" required="" >
                                                                    </div>
                                <div class="form-group form-danger">
                                    <label class="float-label">Password</label>
                                    <input type="password" name="password" class="form-control" required="">
                                                                        
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-12">

                                        <div class="forgot-phone text-right float-left">
                                            <a href="reset-password" class="text-right f-w-600" style="color: #bd2130;"> Forgot Password?</a>
                                        </div>
                                        <div><br><?php echo $model_err; ?></div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-6">
                                        <button type="submit" id="lgn" name="login" class="btn btn-danger btn-md waves-effect text-center m-b-20" style="color: #fff;">LOGIN</button>
                                    </div>
                                </div>

                    </form>







<!-- ======================================= -->
</div>
</div>

<div class="tab-pane <?php if (isset($_POST['singup'])) { echo"active";} ?>" id="log-tabs-2" role="tabpanel">
<div class="product__details__tab__desc">



<!-- =================================================== -->
<?php 

 ?>

<form class="md-float-material form-material" method="POST">

<div class="form-group form-danger">
<label class="float-label">Full Name</label>
<input type="text" name="c_name" class="form-control <?php //if (isset($_POST['singup'])){echo "fill";} ?>" value="<?php echo $c_name; ?>" >
</div>

<div class="row">

<div class="col-sm-6 col-6">
<div class="form-group form-danger">
<label class="float-label">Phone Number</label>
<input type="text" name="c_phone" class="form-control <?php //if (isset($_POST['singup'])){echo "fill";} ?>" value="<?php echo $c_phone; ?>">
</div>
</div>

<div class="col-sm-6 col-6">
<div class="form-group form-danger">
<label class="float-label">WhatsApp</label>
<input type="text" name="c_whatsapp" class="form-control <?php //if (isset($_POST['singup'])){echo "fill";} ?>" value="<?php echo $c_whatsapp; ?>">
</div>
</div>

</div>

<div class="form-group form-danger">
<label class="float-label">Your Email Address</label>
<input type="text" name="c_email" class="form-control <?php //if (isset($_POST['singup'])){echo "fill";} ?>" value="<?php echo $c_email; ?>">
</div>

<div class="row">
<div class="col-sm-6 col-6">
<div class="form-group form-danger">
<label class="float-label">Password</label>
<input type="password" name="c_password" class="form-control <?php //if (isset($_POST['singup'])){echo "fill";} ?>">
</div>
</div>
<div class="col-sm-6 col-6">
<div class="form-group form-danger">
<label class="float-label">Confirm Password</label>
<input type="password" name="c_confirm_pass" class="form-control <?php //if (isset($_POST['singup'])){echo "fill";} ?>">
</div>
</div>
</div>
  <?php 

if (!empty($model_err)) {
  echo '<div class="p-2 " style="border-radius: 10px; background: #f5758114;">' .$model_err. '</div>'; 
}

  ?>



<div class="row m-t-30">
<div class="col-md-12">
<button class="btn btn-danger btn-md waves-effect text-center m-b-20" name="singup" style="color:#fff;">Sign up now</button>
</div>
</div>

       
                    </form>
<!-- =================================================== -->





</div>
</div>


</div>
</div>

</div>
</div>
</div>





