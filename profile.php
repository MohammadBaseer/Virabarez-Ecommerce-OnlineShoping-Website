
<?php 
$err = "";
session_start();
include_once "includes/conn.php";
if(isset($_SESSION['customer_user'])){ 
$user = $_SESSION['customer_user'];
$auth_sql = "SELECT * FROM customer_table 
left join product_wish on customer_table.customer_id = product_wish.customer_wish_id WHERE customer_table.customer_email = '$user' ";
$auth_query = mysqli_query($conn, $auth_sql);
$auth = mysqli_fetch_assoc($auth_query);

}
 else {
echo "<script>window.location='login';</script>";
}
@$c = $auth['customer_id'];
@$c_name =$auth['customer_email'];

$wish = mysqli_query($conn, "SELECT * FROM product_wish WHERE customer_wish_id = '$c' ");
$wis = mysqli_fetch_assoc($wish);
// ====
$p_Sq = mysqli_query($conn, "SELECT * FROM customer_table WHERE customer_email ='$c_name' ");
$p_row = mysqli_fetch_assoc($p_Sq);


 ?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="description" content="ViraBarez E-commerce Marketplace">
<meta name="keywords" content="ViraBarez, Marketplace">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>My Profile | E-commerce Marketplace</title>


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

<!--  -->
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
<li  class="active"><a href="index">Home</a></li>
<li><a href="our-seller">Our Seller</a></li>
<li><a href="products">Our Products</a></li>
<li><a href="join_us">Join Us</a></li>
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
<li  class="active"><a href="index">Home</a></li>
<li><a href="our-seller">Our Seller</a></li>
<li><a href="products">Our Products</a></li>
<li><a href="join_us">Join Us</a></li>
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
<h3 style="color: #C82333"><strong>Profile</strong></h3>
<div class="breadcrumb__option">
<a href="index" style="color: #C82333">Home</a>
<span style="color: #C82333">Profile</span>
</div>
</div>
</div>
</div>
</div>
</section>



<!-- ========================================================================= -->


<div class="contact-form spad">
<div class="container">
<div class="row">
<div class="col-lg-6">
<h3 style="font-weight: bold; color: #C82333;" class="mb-3">Account Information</h3>
</div>
</div>
      <?php 
if (isset($_POST['save'])) {


$fname = $_POST['fullname'];
$whatsapp = $_POST['whatsapp'];
$phone = $_POST['Phone'];
$country = $_POST['country'];
$city = $_POST['city'];
$add = $_POST['add'];
$sh_add = $_POST['sh_add'];
$sh_country = $_POST['sh_country'];
$sh_city = $_POST['sh_city'];
$sh_phone = $_POST['sh_phone'];
@$c_password       = $_POST['pass'];
@$c_confirm_pass   = $_POST['pass1'];


// $phonelength= strlen($phone);
// $whatsapplength= strlen($whatsapp);
@$c_password = sha1($c_password);
@$c_confirm_pass = sha1($c_confirm_pass);

if ($c_password != $c_confirm_pass) {
  $err = "*Password Does not Match";
}

elseif(empty($sh_country) || empty($country))
{
$err = "*Please Select Country";
}
elseif (empty($c_password) AND empty($c_confirm_pass) ) {
  $qq_up =" UPDATE customer_table SET 
customer_name         ='$fname',
customer_phone        ='$phone',
custormer_whatsapp    ='$whatsapp',
customer_country      ='$country',
customer_city         ='$city',
customer_address      ='$add',
sh_add                ='$sh_add',
sh_city               ='$sh_city',
sh_country            ='$sh_country',
sh_phone              ='$sh_phone' WHERE customer_email = '$c_name' ";
  mysqli_query($conn, $qq_up);
  // echo "<script>window.location='profile';</script>";
  $err = "Saved Successfully";
}
else
{
  $qq_up =" UPDATE customer_table SET 
customer_name         ='$fname',
customer_phone        ='$Phone',
custormer_whatsapp    ='$whatsapp',
customer_country      ='$country',
customer_city         ='$city',
customer_address      ='$add',
sh_add                ='$sh_add',
sh_city               ='$sh_city',
sh_country            ='$sh_country',
sh_phone              ='$sh_phone',
customer_pass         ='$c_password' WHERE customer_email = '$c_name' ";
  mysqli_query($conn, $qq_up);
  // echo "<script>window.location='profile';</script>";
  $err = "Saved Successfully";
}

}
  ?>


<?php 
if(isset($_POST['save']))
 {   
echo "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>".$err, "</div>
";
}
?>
<form method="POST" method="POST" class="refresh">
  <div class="form-group">

  <div class="col-md-12 col-lg-12 col-sm-12  row">


<div class="col-lg-12 col-md-12">
<label><span style="font-size: 15px; font-weight: bold;">Email:</span></label>
<input type="text" disabled placeholder="Email" value="<?php echo $p_row['customer_email']; ?>">
</div>

<div class="col-lg-6 col-md-6">
<label><span style="font-size: 15px; font-weight: bold;">Password:</span></label>
<input type="Password" placeholder="Password" name="pass" value="">
</div>

<div class="col-lg-6 col-md-6">
<label><span style="font-size: 15px; font-weight: bold;">Password:</span></label>
<input type="Password" placeholder="Password" name="pass1" value="">
</div>

<!-- <div class="row"> -->
<div class="col-lg-12">
<h3 style="font-weight: bold; color: #C82333;" class="mb-3">Personal Information</h3>
</div>
<!-- </div> -->

<div class="col-lg-12 col-md-12">
<label><span style="font-size: 15px; font-weight: bold;">Full Name:</span></label>
<input type="text" placeholder="First Name" name="fullname" <?php if (isset($_POST['save'])){echo "value='".$fname."'";} else{ ?> value="<?php echo $p_row['customer_name'];}?>">
</div>


<div class="col-lg-6 col-md-6">
<label><span style="font-size: 15px; font-weight: bold;">WhatsApp:</span></label>
<input type="text" placeholder="WhatsApp" name="whatsapp" <?php if (isset($_POST['save'])){echo "value='".$whatsapp."'";} else{ ?> value="<?php echo $p_row['custormer_whatsapp'];}?>">
</div>

<div class="col-lg-6 col-md-6">
<label><span style="font-size: 15px; font-weight: bold;">Phone:</span></label>
<input type="text" placeholder="Phone" name="Phone" <?php if (isset($_POST['save'])){echo "value='".$phone."'";} else{ ?> value="<?php echo $p_row['customer_phone'];}?>">
</div>

<div class="col-lg-6 col-md-6">





<?php 
$sl_sql = mysqli_query($conn,"SELECT * FROM countries_table");
 ?>
<label>
  <span style="font-size: 15px; font-weight: bold;">Country:</span>
</label>
        <select class="custom-select custom-select-lg" name="country">
  <option value="">Select Country</option>
  <?php 
while ($s_row = mysqli_fetch_assoc($sl_sql)) {
?>
<option value="<?php echo $s_row['country_name'];?>" <?php if($p_row['customer_country'] == $s_row['country_name']) {echo "selected";} ?> ><?php echo $s_row['country_name'];?></option>";
<?php
 }  
?>
</select>







</div>

<div class="col-lg-6 col-md-6">
<label><span style="font-size: 15px; font-weight: bold;">City:</span></label>
<input type="text" placeholder="City" name="city" <?php if (isset($_POST['save'])){echo "value='".$city."'";} else{ ?> value="<?php echo $p_row['customer_city'];}?>">
</div>

<div class="col-lg-12 col-md-12">
<label><span style="font-size: 15px; font-weight: bold;">Address:</span></label>
<input type="text" placeholder="Address" name="add" <?php if (isset($_POST['save'])){echo "value='".$add."'";} else{ ?> value="<?php echo $p_row['customer_address'];}?>">
</div>

<!-- <div class="row"> -->
<div class="col-lg-12">
<h3 style="font-weight: bold; color: #C82333;" class="mb-3">Shipping Address</h3>
</div>
<!-- </div> -->

<div class="col-lg-12 col-md-12">
<label><span style="font-size: 15px; font-weight: bold;">Address:</span></label>
<input type="text" placeholder="Shipping Address" name="sh_add" <?php if (isset($_POST['save'])){echo "value='".$sh_add."'";} else{ ?> value="<?php echo $p_row['sh_add'];}?>">
</div>










<div class="col-lg-6 col-md-6">






<?php 
$sl_sql = mysqli_query($conn,"SELECT * FROM countries_table");
 ?>
<label><span style="font-size: 15px; font-weight: bold;">Country:</span></label>
        <select class="custom-select custom-select-lg" name="sh_country">
  <option value="">Select Country</option>
  <?php 
while ($s_row = mysqli_fetch_assoc($sl_sql)) {
?>
<option value="<?php echo $s_row['country_name'];?>" <?php if($p_row['sh_country'] == $s_row['country_name']) {echo "selected";} ?> ><?php echo $s_row['country_name'];?></option>";
<?php
 }  
?>
</select>





</div>











<div class="col-lg-6 col-md-6">
<label><span style="font-size: 15px; font-weight: bold;">City:</span></label>
<input type="text" placeholder="Shipping City" name="sh_city" <?php if (isset($_POST['save'])){echo "value='".$sh_city."'";} else{ ?> value="<?php echo $p_row['sh_city'];}?>">
</div>

<div class="col-lg-12 col-md-12">
<label><span style="font-size: 15px; font-weight: bold;">Phone:</span></label>
<input type="text" placeholder="Shipping Phone" name="sh_phone" <?php if (isset($_POST['save'])){echo "value='".$sh_phone."'";} else{ ?> value="<?php echo $p_row['sh_phone'];}?>">
</div>


</div>
</div>

<h5 style="text-align: center;"><button class="btn btn-danger btn-sm waves-effect waves-light sub" name="save" style="background-color:#dc3545; ">Save</button></h5>


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

<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
 <script>
$(document).ready(function(){
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
})
            $(".refresh").load(" .refresh");

  </script>

<script src="css/eco/mdb.ecommerce.min.js"></script>
<script src="css/eco/mdb.min.js"></script>
<script src="css/eco/popper.min.js"></script>

</body>
</html>