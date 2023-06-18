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
<title>Home Material | E-commerce Marketplace</title>

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
<link rel="stylesheet" href="css/login style.css" type="text/css">
<link rel="stylesheet" href="css/eco/mdb-pro.min.css" type="text/css">
<link rel="stylesheet" href="css/eco/mdb.ecommerce.min.css" type="text/css">


<style>
	  .carousel-inner img {
    width: 100%;
    height: 80%;
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
	<!-- Space For Logo -->
<!-- <a href="#"><img src="img/logo.png" alt=""></a> -->
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
<li class="active"><a href="index">Home</a></li>
<li><a href="our-seller">Our Seller</a></li>
<li><a href="products">Our Products</a></li>
<li><a href="join_us">Join Us</a></li>
<li><a href="about">About US</a></li>
<li><a href="contact">Contact</a></li>
</ul>
</nav>
<div id="mobile-menu-wrap"></div>




<?php   include_once "res_header.php"; ?>




</div>


<header class="header">
<?php 
include_once("header.php");
 ?>

<div class="container">
<div class="row">
<div class="col-lg-3">
	<!-- Space for Logo -->
<div class="header__logo">
<a href="index"><img src="img/logo.png" alt=""></a>
</div>
</div>
<div class="col-lg-6">
<nav class="header__menu">
<ul>
<li class="active"><a href="index">Home</a></li>
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
<h3 style="color: #C82333"><strong>Catagory</strong></h3>
<div class="breadcrumb__option">
<a href="index" style="color: #C82333">Home</a>
<span style="color: #C82333">Home Material</span>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="">
<div class="container">

 <div id="myCarousel" class="carousel slide">
  
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li class="item1 active" style="background-color: #C82333"></li>
    <li class="item2" style="background-color: #C82333"></li>
    <li class="item3" style="background-color: #C82333"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/hero/h_acc.jpg" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="img/hero/h_acc1.jpg" alt="Chicago" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="img/hero/h_acc2.jpg" alt="New York" width="1100" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#myCarousel">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#myCarousel">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>
</section>

<!-- ======================= -->
<section class="product spad">
<div class="container">
<div class="row">

<!-- =================================================== -->
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="row">
<dir class="col-lg-6 col-md-6 col-sm-06 col-12">
	<div class="col-lg-12 col-md-12 col-sm-12 col-12" style="display: flex; justify-content: center;
	align-items: center; height: 150px; background-color: #cfefea; border-radius: 10px;">
	<div class="col-md-8 col-lg-8 col-8">
		<h4 class="texth2" style="text-transform: uppercase; "><strong>Electronics</strong></h4>
		<a href="category?items=Electronics" class="btn btn-danger" style="margin: 10px 0px;">VIEW PRODUCT</a>
	</div>
	<img class="col-md-4 col-lg-4 col-4" src="img/banner/hm_electronic.png" alt="" width="159px" style="float: right;: ">
</div>
</dir>
<!--  -->
<dir class="col-lg-6 col-md-6 col-sm-06 col-12">
	<div class="col-lg-12 col-md-12 col-sm-12 col-12" style="display: flex; justify-content: center;
	align-items: center; height: 150px; background-color: #cfefea; border-radius: 10px;">
	<div class="col-md-8 col-lg-8 col-8">
		<h4 class="texth2" style="text-transform: uppercase; "><strong>Furniture</strong></h4>
		<a href="category?items=Furniture" class="btn btn-danger" style="margin: 10px 0px;">VIEW PRODUCT</a>
	</div>
	<img class="col-md-4 col-lg-4 col-4" src="img/banner/hm_furniture.png" alt="" width="159px" style="float: right;: ">
</div>
</dir>
<!--  -->
<dir class="col-lg-6 col-md-6 col-sm-06 col-12">
	<div class="col-lg-12 col-md-12 col-sm-12 col-12" style="display: flex; justify-content: center;
	align-items: center; height: 150px; background-color: #cfefea; border-radius: 10px;">
	<div class="col-md-8 col-lg-8 col-8">
		<h4 class="texth2" style="text-transform: uppercase; "><strong>Home Accessories</strong></h4>
		<a href="category?items=Home Accessories" class="btn btn-danger" style="margin: 10px 0px;">VIEW PRODUCT</a>
	</div>
	<img class="col-md-4 col-lg-4 col-4" src="img/banner/hm_other.png" alt="" width="159px" style="float: right;: ">
</div>
</dir>
<!--  -->

</div>
</div>
<!-- ===================================================-->

</div>
</div>
</section>

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

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<script>
$(document).ready(function(){
  // Activate Carousel with a specified interval
  $("#myCarousel").carousel();
        
  // Enable Carousel Indicators
  $(".item1").click(function(){
    $("#myCarousel").carousel(0);
  });
  $(".item2").click(function(){
    $("#myCarousel").carousel(1);
  });
  $(".item3").click(function(){
    $("#myCarousel").carousel(2);
  });
    
  // Enable Carousel Controls
  $(".carousel-control-prev").click(function(){
    $("#myCarousel").carousel("prev");
  });
  $(".carousel-control-next").click(function(){
    $("#myCarousel").carousel("next");
  });
});
</script>

</body>

<!-- Mirrored from preview.colorlib.com/theme/ogani/shop-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Dec 2020 20:08:35 GMT -->
</html>