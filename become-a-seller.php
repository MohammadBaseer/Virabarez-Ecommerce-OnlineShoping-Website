<?php 
session_start();
include_once "includes/conn.php";
if(isset($_SESSION['customer_user'])){
$user = $_SESSION['customer_user'];
$auth_sql = "SELECT * FROM customer_table 
left join product_wish on customer_table.customer_id = product_wish.wish_id WHERE customer_table.customer_email = '$user' ";
$auth_query = mysqli_query($conn, $auth_sql);
$auth = mysqli_fetch_assoc($auth_query);

}

@$c = $auth['customer_id'];


$wish = mysqli_query($conn, "SELECT * FROM product_wish WHERE customer_wish_id = '$c' ");
$wis = mysqli_fetch_assoc($wish);

//input reset logice
$var1 = 5;
$var2 = 4;

$err = "";
@$s_company_title  = $_POST['s_company_title'];
@$s_fname          = $_POST['s_fname'];
@$s_lname          = $_POST['s_lname'];
@$s_email          = $_POST['s_email'];
@$s_phone          = $_POST['s_phone'];
@$s_whatsapp       = $_POST['s_whatsapp'];
@$s_address        = $_POST['s_address'];
@$s_description    = $_POST['s_description'];


if (isset($_POST['submit'])) {

$result = mysqli_query($conn, "SELECT * FROM seller_request_table WHERE seller_email = '$s_email' || seller_company_title ='$s_company_title' ");
$row = mysqli_fetch_assoc($result);

 
if($row > 0){
$err = "*Dear Seller Your Email/Company Has Already Registered With Our System";
}
//check empty input
elseif (empty($s_fname) || empty($s_phone) || empty($s_whatsapp) || empty($s_address) || empty($s_email) || empty($s_description)) {
  $err = "*Empty Filed";
}
// Email validation
 elseif (!filter_var($s_email, FILTER_VALIDATE_EMAIL)) {
      $err = "Invalid email format";
    }

else
{
// set var for form input reset
$var1 = 4;
$var2 = 5;


$date = date('Y-M-d');

  $sql = "INSERT INTO `seller_request_table` 
   (`seller_company_title`,
    `seller_fname`,
    `seller_lname`,
    `seller_email`,
    `seller_phone`,
    `seller_whatsapp`,
    `seller_address`,
    `seller_description`,
    `request_date` )
     VALUES 
     ('$s_company_title',
     '$s_fname',
      '$s_lname',
      '$s_email',
      '$s_phone',
      '$s_whatsapp',
      '$s_address',
      '$s_description',
      '$date'  );";


if (mysqli_query($conn,$sql)) {

$err = "A Big Thanks to Join US.  Please Wait for our call.";

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
<title>Become-a-Seller | E-commerce Marketplace</title>

<!-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&amp;display=swap" rel="stylesheet"> -->
<link rel="icon" href="img/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
<link rel="stylesheet" href="css/nice-select.css" type="text/css">
<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
<link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
<!--  -->
<link rel="stylesheet" href="css/eco/mdb-pro.min.css" type="text/css">
<link rel="stylesheet" href="css/eco/mdb.ecommerce.min.css" type="text/css">
<!-- sweet plugin -->
<link rel="stylesheet" href="css/login style.css" type="text/css">


<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<script src="plugins/jquery/jquery.min.js"></script>
<!--  -->
<style>
  body:not(.modal-open){
  padding-right: 0px !important;
}
.btn-danger{
  color: #fff;
}
</style>
</head>
<body>



<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
<div class="humberger__menu__logo">
<a href="#"><img src="img/logo.png" alt=""></a>
</div>
<div class="humberger__menu__cart">
<ul>
<li>

 <?php 
if (isset($_SESSION['customer_user'])) {
?>
<a href="wishlist" class="refresha"><i class="fa fa-heart">
<?php 
if($count = mysqli_num_rows($wish)){
  echo "<span>".$count."</span>";
}
?>
</i>
</a>

<?php
}
else
{
 ?>
<a href="" data-toggle="modal" data-target="#modal-order"><i class="fa fa-heart"></i></a>

 <?php } ?>

</li>
<li><i class="fa fa-shopping-bag"></i></li>
</ul>
</div>
<div class="humberger__menu__widget">

<div class="header__top__right__auth">
<?php include_once("header_responsive.php"); ?>

</div>
</div> 


<nav class="humberger__menu__nav mobile-menu">
<ul>
<li><a href="index">Home</a></li>
<li><a href="our-seller">Our Seller</a></li>
<li><a href="products">Our Products</a></li>
<li class="active"><a href="join_us">Join Us</a></li>
<li><a href="about">About US</a></li>
<li><a href="contact">Contact</a></li>
</ul>
</nav>



<div id="mobile-menu-wrap"></div>
<?php 
include_once "res_header.php";
 ?>
</div>


<header class="header">

<?php 
include_once("header.php");
 ?>

<div class="container">
<div class="row">
<div class="col-lg-3">
<div class="header__logo">
<a href="index"><img src="img/logo.png" alt=""></a>
</div>
</div>
<div class="col-lg-6">
<nav class="header__menu">
<ul>
<li><a href="index">Home</a></li>
<li><a href="our-seller">Our Seller</a></li>
<li><a href="products">Our Products</a></li>
<li class="active"><a href="join_us">Join Us</a></li>
<li><a href="about">About US</a></li>
<li><a href="contact">Contact</a></li>
</ul>
</nav>
</div>
<div class="col-lg-3">
<div class="header__cart">
<ul>
<li>

 <?php 
if (isset($_SESSION['customer_user'])) {
?>
<a href="wishlist" class="refresha"><i class="fa fa-heart">
<?php 
if($count = mysqli_num_rows($wish)){
  echo "<span>".$count."</span>";
}
?>
</i>
</a>

<?php
}
else
{
 ?>
<a href="" data-toggle="modal" data-target="#modal-order"><i class="fa fa-heart"></i></a>

 <?php } ?>

</li>
<li><i class="fa fa-shopping-bag"></i></li>
</ul>
</div>
</div>
</div>
<div class="humberger__open">
<i class="fa fa-bars"></i>
</div>
</div>
</header>
<!-- ---------------------------------------------------------- -->

<section class="hero hero-normal">
<div class="container">
  <!-- ===== -->
<div class="row">
 <div class="col-lg-3">
<div class="hero__categories">
<div class="hero__categories__all">
<i class="fa fa-bars"></i>
<span>All Categories</span>
</div>
<ul>
<li><a href="ladies-fashion-cat">Ladies Fashion</a></li>
<li><a href="ladies-dress-cat">Ladies Clothing</a></li>
<li><a href="men-fashion-cat">Men's Fashion</a></li>
<li><a href="mens-dress-cat">Men's Clothing</a></li>
<li><a href="home-material-cat">Home Material</a></li>
<li><a href="technology-cat">Technology</a></li>
<li><a href="jeweller-cat">Jewelry</a></li>
<li><a href="arts">Arts</a></li>
<li><a href="all_categories" style="font-weight: bold; color: #dc3545;">All Categories</a></li>
</ul>
</div>
</div>
<div class="col-lg-9">
<div class="hero__search">
<div class="hero__search__form" style="width: 100%;">
<form action="search" method="post">
<input type="text"  name="term" placeholder="What do you need?" style="width: 100%;">
<button type="submit" name="search" class="site-btn">SEARCH</button>
</form>

</div>
</div>
</div>
</div>
<!-- ====== -->
</div>
</section>


<section class="breadcrumb-section set-bg" style="padding: 0px;">
<div class="container">
<div class="row">
<div class="col-lg-12 text-center">
<div class="breadcrumb__text" style="text-align: left;">
<h3 style="color: #C82333"><strong>Become a Seller</strong></h3>
<div class="breadcrumb__option">
<a href="index" style="color: #C82333">Home</a><span style="color: #C82333">Request for Seller Account</span>
</div>
</div>
</div>
</div>
</div>
</section>



<!-- ======================= -->
<div class="contact-form spad">

<div class="container">
<!-- <div class="row"> -->

<form method="POST">
  <div class="form-group">

  <div class="col-md-12 col-lg-12 col-sm-12  row">
      <?php 

if (!empty($err)) {
  echo '<div class="p-2" style="border-radius: 10px; background: #f5758114; margin: 10px;">' .$err. '</div>'; 
}

  ?>
<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2"><span style="font-size: 15px; font-weight: bold;">Company Title:</span></label>
<input type="text" placeholder="EnterCompany Title" name="s_company_title" value="<?php if($var1 > $var2){echo $s_company_title;}?>">
</div>

<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2"><span style="font-size: 15px; font-weight: bold;">Firs Name:</span></label>
<input type="text" placeholder="Enter First Name" name="s_fname" value="<?php if($var1 > $var2){ echo $s_fname;} ?>">
</div>

<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2"><span style="font-size: 15px; font-weight: bold; margin: 3px;">Last Name:</span></label>
<input type="text" placeholder="Enter Last Name" name="s_lname" value="<?php if($var1 > $var2){ echo $s_lname;} ?>">
</div>

<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2"><span style="font-size: 15px; font-weight: bold;">Email:</span></label>
<input type="text" placeholder="Enter Email" name="s_email" value="<?php if($var1 > $var2){ echo $s_email;} ?>">
</div>

<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2"><span style="font-size: 15px; font-weight: bold;">Phone Number:</span></label>
<input type="text" placeholder="" name="s_phone" value="(+93)-">
</div>

<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2"><span style="font-size: 15px; font-weight: bold;">WhatsApp Number:</span></label>
<input type="text" placeholder="" name="s_whatsapp" value="(+93)-">
</div>

<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2"><span style="font-size: 15px; font-weight: bold;">Address:</span></label>
<input type="text" placeholder="Enter Address" name="s_address" value="<?php if($var1 > $var2){ echo $s_address;} ?>">
</div>

<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2"><span style="font-size: 15px; font-weight: bold;">Description:</span></label>
<textarea rows="5" name="s_description"><?php if($var1 > $var2){ echo $s_description;} ?></textarea>
</div>


</div>
</div>

<button class="btn btn-danger waves-effect waves-light" style="color: #fff;" name="submit">Submit</button>
</form>



  
</div>
</div>
<!-- ---------------------------------------------------------- -->
<br><br><br>
<?php include_once "Login_model.php"; ?>

<?php 
include_once "footer.php";
 ?>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>


<script src="css/eco/mdb.ecommerce.min.js"></script>
<script src="css/eco/mdb.min.js"></script>
<script src="css/eco/popper.min.js"></script>

<script>
  $(document).ready(function(){
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
})
</script>
</body>

</html>