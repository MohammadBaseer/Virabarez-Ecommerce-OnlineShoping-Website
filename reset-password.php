<?php
session_start();
?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="description" content="ViraBarez E-commerce Marketplace">
<meta name="keywords" content="ViraBarez, Marketplace">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reset Password | E-commerce Marketplace</title>
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
 
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
                        <?php
                        $error ="";
                    include_once "includes/conn.php";

//Define name spaces

//Include required PHPMailer files
  require 'includes/mailer/PHPMailer.php';
  require 'includes/mailer/SMTP.php';
  require 'includes/mailer/Exception.php';
//Define name spaces
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

 

                    if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
                        $email = $_POST["email"];
                        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                        if (!$email) {
                            $error .="Invalid email address";
                        } else {
                            $sel_query = "SELECT * FROM `customer_table` WHERE customer_email='" . $email . "'";
                            $results = mysqli_query($conn, $sel_query);
                            $row = mysqli_num_rows($results);
                            if ($row == "") {
                                $error .= "User Not Found*";
                            }
                        }
                        if ($error != "") {
                           $error;
                        } else {

                            $output = '';

                            $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
                            $expDate = date("Y-m-d H:i:s", $expFormat);
                            $key = md5(time());
                            $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                            $key = $key . $addKey;
                            // Insert Temp Table
                            mysqli_query($conn, "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');");


                            $output.='<p>Please click on the following link to reset your password.</p>';
                            //replace the site url 

                            $output.='<p>
                            <a href="http://localhost/Virabarez Gitlab Projects/Git Server ViraBarez/new-password?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">Click to Reset</a>
                            </p>';


                            $body = $output;
                            $subject = "Password Recovery";

                            $email_to = $email;





//Create instance of PHPMailer
    $mail = new PHPMailer();
//Set mailer to use smtp
    $mail->isSMTP();
//Define smtp host
    $mail->Host = "virabarez.com";
//Enable smtp authentication
    $mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
    $mail->SMTPSecure = "auto";
//Port to connect smtp
    $mail->Port = "587";
//Set gmail username
    $mail->Username = "no-reply@virabarez.com";
//Set gmail password
    $mail->Password = "Vira@Barez@12345";
//Email subject
    $mail->Subject = $subject;
//Set sender email
    $mail->setFrom("no-reply@virabarez.com");
//Enable HTML
    $mail->isHTML(true);
//Attachment
    // $mail->addAttachment('img/attachment.png');
//Email body
    $mail->Body = $body;
//Add recipient
    $mail->addAddress($email_to);
//Finally send email
    if ( $mail->send() ) {
        // $error = "An email has been sent";
        $_SESSION['p_msg'] = "Reset link has been sent";
        echo "<script>window.location='login';</script>";


    }else{
        $error = "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
    }
//Closing smtp connection
    $mail->smtpClose();

// =====================================================
                        }
                    }
                    ?>
                    <form class="md-float-material form-material" method="post" name="reset">
                        <div class="text-center">
                            <img src="img/logo.png" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left">Forget password</h3>
                                    </div>
                                </div>
                                
                                <div class="form-group form-danger">
                                    <input type="email" name="email" class="form-control">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Your Email Address</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- <button type="button" class="btn btn-danger btn-md btn-block waves-effect text-center m-b-20">Reset Password</button> -->
                                        <input type="submit" id="reset" value="Reset Password" class="btn btn-danger btn-md btn-block waves-effect text-center m-b-20">
                                    </div>
                                </div>
                                <p style="color: #dc3545;"><?php echo $error; ?></p>
                                <p class="f-w-600 text-right">Back to <a href="login">Login.</a></p>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Thank you.</p>
                                        <p class="text-inverse text-left"><a href="index"><b>Back to website</b></a></p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
 
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

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
</body>
<script>
  $(document).ready(function(){
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
})
</script>

</html>
