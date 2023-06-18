
<?php 
session_start();
include_once "includes/conn.php";
if(isset($_SESSION['customer_user'])){
$user = $_SESSION['customer_user'];
$auth_sql = "SELECT * FROM customer_table 
left join product_wish on customer_table.customer_id = product_wish.customer_wish_id WHERE customer_table.customer_email = '$user' ";
$auth_query = mysqli_query($conn, $auth_sql);
$auth = mysqli_fetch_assoc($auth_query);

}
@$c = $auth['customer_id'];


$wish = mysqli_query($conn, "SELECT * FROM product_wish WHERE customer_wish_id = '$c' ");
$wis = mysqli_fetch_assoc($wish);
// 
$var1 = 5;
$var2 = 4;


 ?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="description" content="ViraBarez E-commerce Marketplace">
<meta name="keywords" content="ViraBarez, Marketplace">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Contact | E-commerce Marketplace</title>

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
<link rel="stylesheet" href="css/login style.css" type="text/css">


<style>
  .h2 h2:after
  {
    margin:0px; 
  }

  .carousel-inner img {
    width: 100%;
    height: 80%;
  }



  @media screen and (min-width: 480px) {
  .image {
    height: 80px;
    width: 100%;
  }
}

  @media screen and (min-width: 765px) {
  .image {
    height: 110px;
    width: 100%;
  }
}
  @media screen and (min-width: 900px) {
  .image {
    height: 120px;
    width: 100%;
  }
}
 @media screen and (min-width: 1200px) {
  .image {
    height: 140px;
    width: 100%;
  }
}
body:not(.modal-open){
  padding-right: 0px !important;
}
.btn-danger{
  color: #fff;
}
</style>
<!--  -->
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
<li><!-- <a href="#"> --><i class="fa fa-shopping-bag"></i> <!-- <span>0</span> --><!-- </a> --></li>
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
<li><a href="join_us">Join Us</a></li>
<li><a href="about">About US</a></li>
<li class="active"><a href="contact">Contact</a></li>
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
<li><a href="join_us">Join Us</a></li>
<li><a href="about">About US</a></li>
<li class="active"><a href="contact">Contact</a></li>
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
<li><!-- <a href="#"> --><i class="fa fa-shopping-bag"></i> <!-- <span>0</span> --><!-- </a> --></li>
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
<h3 style="color: #C82333"><strong>Contact</strong></h3>
<div class="breadcrumb__option">
<a href="index" style="color: #C82333">Home</a>
<span style="color: #C82333">Contact</span>
</div>
</div>
</div>
</div>
</div>
</section>



<!-- ========================================================================= -->
<section class="contact spad">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-6 text-center">
<div class="contact__widget">
<span class="icon_phone"></span>
<h4>PHONE</h4>
<p>+93 7062 998 74</p>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 text-center">
<div class="contact__widget">
<span class="fa fa-whatsapp"></span>
<h4>WHATSAPP</h4>
<p>+93 7062 998 74</p>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 text-center">
<div class="contact__widget">
<span class="icon_clock_alt"></span>
 <h4>OPEN TIME</h4>
<p>24/24hr</p>
</div> 
</div>
<div class="col-lg-3 col-md-3 col-sm-6 text-center">
<div class="contact__widget">
<span class="icon_mail_alt"></span>
<h4>EMAIL</h4>
<p><a href="mailto:sales@virabarez.com" style="color: #dc3545" class="__cf_email__" >sales@virabarez.com</a></p>
</div>
</div>
</div>
</div>
</section>

<div class="contact-form spad">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="contact__form__title">
<h2>Leave Message</h2>
</div>
</div>
</div>

<?php 
$var1 = 4;
$var2 = 5;
 @$name = $_POST['name'];
 @$phone = $_POST['phone'];
 @$whatsapp = $_POST['whatsapp'];
 @$email = $_POST['email'];
 @$mesg = $_POST['mesg'];

?>
<form method="POST">

<div class="row">

<div class="col-lg-6 col-md-6">
<label for="name" class="mb-2 mr-sm-2"><span style="font-size: 15px; font-weight: bold;">Name:</span></label>
<input type="text" name="name" value="<?php if($var1 > $var2){echo $name;} ?>" placeholder="Your name">
</div>
<div class="col-lg-6 col-md-6">
  <label for="phone" class="mb-2 mr-sm-2"><span style="font-size: 15px; font-weight: bold;">Phone Number:</span></label>
<input type="text" name="phone" placeholder="Phone" value="<?php if($var1 > $var2){echo $whatsapp;} ?>">
</div>
<div class="col-lg-6 col-md-6">
  <label for="whatsapp" class="mb-2 mr-sm-2"><span style="font-size: 15px; font-weight: bold;">WhatsApp Number:</span></label>
<input type="text" name="whatsapp" placeholder="WhatsApp" value="<?php if($var1 > $var2){echo $whatsapp;} ?>">
</div>
<div class="col-lg-6 col-md-6">
  <label for="pwd2" class="mb-2 mr-sm-2"><span style="font-size: 15px; font-weight: bold;">Email:</span></label>
<input type="email" name="email" value="<?php if($var1 > $var2){echo $email;} ?>" placeholder="Your Email">
</div>
<div class="col-lg-12 text-center">
  <label for="pwd2" class="mb-2 mr-sm-2"><span style="font-size: 15px; font-weight: bold;">Message:</span></label>
<textarea name="mesg" placeholder="Your message" >
  <?php if($var1 > $var2){echo $mesg;} ?>
</textarea>
<button type="submit" name="msg" class="site-btn">SEND MESSAGE</button>
</div>
</div>
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
<script src="css/notify/notify.js"></script>
<script src="css/notify/notify.min.js"></script>

<?php 

if(isset($_POST['msg'])) { 
if(empty($name) || empty($mesg)){
echo "<script>$.notify('empty', 'error');</script>";
}
 elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "<script>$.notify('Invalid email format', 'error');</script>";
    }
else
{



 mysqli_query($conn, "INSERT INTO msg_table (`msg_name`, `msg_phone`, `msg_whatsapp`, `msg_email`, `msg_body`) values ('$name','$phone','$whatsapp','$email','$mesg')"); 
echo "<script>$.notify('Sent', 'success');</script>";

}
}
 ?>
<script>
  $(document).ready(function(){
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
})
</script>
</body>

</html>