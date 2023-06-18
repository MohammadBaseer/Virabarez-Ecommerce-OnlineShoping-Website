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

 ?>
 <!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="description" content="ViraBarez E-commerce Marketplace">
<meta name="keywords" content="ViraBarez, Marketplace">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Delivery Information | E-commerce Marketplace</title>

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
<?php include_once("header_responsive.php"); ?></div>
</div> 


<nav class="humberger__menu__nav mobile-menu">
<ul>
<li><a href="index">Home</a></li>
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
<li><a href="index">Home</a></li>
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
<h3 style="color: #C82333"><strong>Information</strong></h3>
<div class="breadcrumb__option">
<a href="index" style="color: #C82333">Delivery Infomation</a>
</div>
</div>
</div>
</div>
</div>
</section>



<br><br><br>
<!-- ======================= -->
<div class="container">

  <div class="company-detail">


<p style="margin-left: 15px;"><i class="fa fa-check">&nbsp;&nbsp;&nbsp;</i>After your order, ViraBarez vendor will confirm the order within 24 to 48 hours.<br>
<i class="fa fa-check">&nbsp;&nbsp;&nbsp;</i>If there is an issue with your order (out of stock, special handling, customs requirements or other), we will contact you and if necessary, cancel the order. <br><i class="fa fa-check">&nbsp;&nbsp;&nbsp;</i>
Timing of delivery to our  Forwarder facility in Afghanistan depends upon the vendor from which the product is purchased (these timings are typically stated on the store online website)
<br><i class="fa fa-check">&nbsp;&nbsp;&nbsp;</i>
Typically, the freight forward partnerships timing is the same day or next business day.
<br><i class="fa fa-check">&nbsp;&nbsp;&nbsp;</i>
Shipping interval to the destination Province's can be affected by product size and weight, the shipping method, and especially if there are special customs conditions at the destination country. For ordinary conditions delivery to Kabul is typically achieved in 1-3 days.
<br><i class="fa fa-check">&nbsp;&nbsp;&nbsp;</i>
In Kabul first delivery attempt is estimated to be achieved in 1-3 days.
<br><i class="fa fa-check">&nbsp;&nbsp;&nbsp;</i>
As above, your products should be delivered to you within 1 to 3 business days from the moment we confirm your payment. This may vary in some cases for example if weather conditions to your province, the time taken to transit Customs in your country, delays of shipping by the provider or saturation of shipping during season high purchase, etc. ViraBarez does not guarantee a definite delivery time nor is it responsible for delays. The status of your order can be gained by contacting us or via the <a href="//www.virabarez.com" target="_blank" style="color:#dc3545;">www.virabarz.com</a> website.
<br><i class="fa fa-check">&nbsp;&nbsp;&nbsp;</i>
You will be informed of the estimated delivery on a product by product basis at the time of order. We do not guarantee delivery of products within the estimated transit time or by the estimated delivery date.
<br><i class="fa fa-check">&nbsp;&nbsp;&nbsp;</i>
Efforts are made to manage products that are restricted; that is, where local conditions may require special documentation or special license, ViraBarez seller will make reasonable best endeavors to ensure delivery in the most efficient manner and that you will be kept informed.
<br><i class="fa fa-check">&nbsp;&nbsp;&nbsp;</i>
Shipments will be made to the address indicated by you. Two attempts will be made to deliver to the address and in the event, the product cannot be delivered as agreed you will be advised of a pickup address.
<br><i class="fa fa-check">&nbsp;&nbsp;&nbsp;</i>
Our carriers usually do not pick-up or deliver packages on weekends or holidays.
</p>

</div>

</div>
<!-- ---------------------------------------------------------- -->
<br><br><br>
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