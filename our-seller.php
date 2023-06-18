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
<title>Our Seller | E-commerce Marketplace</title>


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
<!-- google ads -->
<script data-ad-client="ca-pub-2736959751592710" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!--  -->
<style>
  .h2 h2:after
  {
    margin:0px; 
  }

  .carousel-inner img {
    width: 100%;
    height: 78%;
  }



  @media screen and (min-width: 480px) {
  .image {
    height: 70px;
    width: 58%;
  }
}

  @media screen and (min-width: 765px) {
  .image {
    height: 80px;
    width: 58%;
  }
}
  @media screen and (min-width: 900px) {
  .image {
    height: 80px;
    width: 58%;
  }
}
 @media screen and (min-width: 1200px) {
  .image {
    height: 80px;
    width: 58%;
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
<li><a href="index">Home</a></li>
<li class="active"><a href="our-seller">Our Seller</a></li>
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
<li class="active"><a href="our-seller">Our Seller</a></li>
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
<h3 style="color: #C82333"><strong>Our Seller</strong></h3>
<div class="breadcrumb__option">
<a href="index" style="color: #C82333">Home</a>
<span style="color: #C82333">Our Seller</span>
</div>
</div>
</div>
</div>
</div>
</section>




<!-- ========================================================================= -->
<section class="mt-5">

  <div class="container">
<!-- php start -->
<?php 
include_once "includes/conn.php";
// 
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
  } else {
    $page_no = 1;
        }

  $total_records_per_page = 6;
    $offset = ($page_no-1) * $total_records_per_page;
  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;
  $adjacents = "2"; 

  $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `seller_profile_table`");
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1; // total page minus 1

// 
// $c_query = mysqli_query($conn, "SELECT * FROM `product_table` LIMIT $offset, $total_records_per_page");

  $c_query = mysqli_query($conn, "SELECT * FROM seller_profile_table 
left join seller_request_table on seller_request_table.seller_id = seller_profile_table.seller_req_id ORDER BY seller_profile_id DESC LIMIT $offset, $total_records_per_page");


while ($row = mysqli_fetch_assoc($c_query))
{

 ?>


    <div class="row" style="padding: 0px 25px;">
      <div class="col-lg-2 col-md-3 col-sm-3 col-3 mask waves-effect waves-light view zoom" style="padding: 0px;">
        <a style="color: #dc3545;" href="seller_product?seller=<?php echo $row['seller_company_title'];?>&cmp=<?php echo $row['seller_req_id'];?>">
        <img class="image" alt="" src="dashboard/data_files/logo/<?php echo $row['seller_logo'];?>">
      </a>
      </div>
      <div class="col-lg-10 col-md-9 col-sm-9 col-9">
        <div class="row">
          <div class="col-lg-12 "><h5><a style="color: #dc3545;" href="seller_product?seller=<?php echo $row['seller_company_title'];?>&cmp=<?php echo $row['seller_req_id'];?>"><strong><?php echo $row['seller_company_title'];?></strong></a></h5></div>
          <div class="col-lg-12"><?php echo $row['seller_details'];?></div>
        </div>
      </div>
    </div>
    <hr>
<?php   } ?>

<div class="col-12 col-md-12 text-center" style="margin: auto;">
<div class="row" style="display: contents; ">
<div class="product__pagination">
<!-- <ul class="pagination"> -->
  <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

 <!--  <a href="#"><i class="fa fa-long-arrow-left">
    
  </i></a>  
 -->
  <!-- <a href="#" <?php //if($page_no <= 1){ echo "class='disabled'"; } ?>> -->
  <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'";} if($page_no <= 1){ echo "class='disabled'"; }  ?> ><i class="fa fa-long-arrow-left"></i></a>
  <!-- </a> -->
       
    <?php 
  if ($total_no_of_pages <= 10){     
    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
      if ($counter == $page_no) {
       echo "<a class='active' style='background-color: #dc3545;'>$counter</a>";  
        }else{
           echo "<a href='?page_no=$counter'>$counter</a>";
        }
        }
  }
  elseif($total_no_of_pages > 10){
    
  if($page_no <= 4) {     
   for ($counter = 1; $counter < 8; $counter++){     
      if ($counter == $page_no) {
       echo "<a class='active' style='background-color: #dc3545;'>$counter</a>";  
        }else{
           echo "<a href='?page_no=$counter'>$counter</a>";
        }
        }
    echo "<a>...</a>";
    echo "<a href='?page_no=$second_last'>$second_last</a>";
    echo "<a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a>";
    }

   elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {     
    echo "<a href='?page_no=1'>1</a>";
    echo "<a href='?page_no=2'>2</a>";
        echo "<a>...</a>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {     
           if ($counter == $page_no) {
       echo "<a class='active' style='background-color: #dc3545;'>$counter</a>";  
        }else{
           echo "<a href='?page_no=$counter'>$counter</a>";
        }                  
       }
       echo "<a>...</a>";
     echo "<a href='?page_no=$second_last'>$second_last</a>";
     echo "<a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a>";      
            }
    
    else {
        echo "<a href='?page_no=1'>1</a>";
    echo "<a href='?page_no=2'>2</a>";
        echo "<a>...</a>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
       echo "<a class='active' style='background-color: #dc3545;'>$counter</a>";  
        }else{
           echo "<a href='?page_no=$counter'>$counter</a>";
        }                   
                }
            }
  }
?>
    
  <!-- <a <?php //if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>> -->
  <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; }if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?> ><i class="fa fa-long-arrow-right"></i></a>
  <!-- </a> -->
    <?php if($page_no < $total_no_of_pages){
    echo "<a href='?page_no=$total_no_of_pages'>Last </a>";
    } ?>

</div>


</div>
</div>


  </div>
</section>

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

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  -->
 <script>
$(document).ready(function(){
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
})
  </script>

<script src="css/eco/mdb.ecommerce.min.js"></script>
<script src="css/eco/mdb.min.js"></script>
<script src="css/eco/popper.min.js"></script>

</body>

</html>