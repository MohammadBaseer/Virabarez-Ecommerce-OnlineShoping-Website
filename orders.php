
<?php 
$c ="";
session_start();
include_once "includes/conn.php";
if(isset($_SESSION['customer_user'])){
$user = $_SESSION['customer_user'];
$auth_sql = "SELECT * FROM customer_table 
left join product_wish on customer_table.customer_id = product_wish.customer_wish_id WHERE customer_table.customer_email = '$user' ";
$auth_query = mysqli_query($conn, $auth_sql);
$auth = mysqli_fetch_assoc($auth_query);
$c = $auth['customer_id'];
}
 else {
echo "<script>window.location='login.php';</script>";
}
// ===================
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
<title>Orders | E-commerce Marketplace</title>



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


.steps .step {
    display: block;
    width: 100%;
    margin-bottom: 35px;
    text-align: center
}

.steps .step .step-icon-wrap {
    display: block;
    position: relative;
    width: 100%;
    height: 80px;
    text-align: center
}

.steps .step .step-icon-wrap::before,
.steps .step .step-icon-wrap::after {
    display: block;
    position: absolute;
    top: 50%;
    width: 50%;
    height: 3px;
    margin-top: -1px;
    background-color: #e1e7ec;
    content: '';
    z-index: 1
}

.steps .step .step-icon-wrap::before {
    left: 0
}

.steps .step .step-icon-wrap::after {
    right: 0
}

.steps .step .step-icon {
    display: inline-block;
    position: relative;
    width: 80px;
    height: 80px;
    border: 1px solid #e1e7ec;
    border-radius: 50%;
    background-color: #f5f5f5;
    color: #374250;
    font-size: 38px;
    line-height: 81px;
    z-index: 5
}

.steps .step .step-title {
    margin-top: 16px;
    margin-bottom: 0;
    color: #606975;
    font-size: 14px;
    font-weight: 500
}

.steps .step:first-child .step-icon-wrap::before {
    display: none
}

.steps .step:last-child .step-icon-wrap::after {
    display: none
}

.steps .step.completed .step-icon-wrap::before,
.steps .step.completed .step-icon-wrap::after {
    background-color: #dc3545
}

.steps .step.completed .step-icon {
    border-color: #dc3545;
    background-color: #dc3545;
    color: #fff
}

@media (max-width: 576px) {
    .flex-sm-nowrap .step .step-icon-wrap::before,
    .flex-sm-nowrap .step .step-icon-wrap::after {
        display: none
    }
}

@media (max-width: 768px) {
    .flex-md-nowrap .step .step-icon-wrap::before,
    .flex-md-nowrap .step .step-icon-wrap::after {
        display: none
    }
}

@media (max-width: 991px) {
    .flex-lg-nowrap .step .step-icon-wrap::before,
    .flex-lg-nowrap .step .step-icon-wrap::after {
        display: none
    }
}

@media (max-width: 1200px) {
    .flex-xl-nowrap .step .step-icon-wrap::before,
    .flex-xl-nowrap .step .step-icon-wrap::after {
        display: none
    }
}

.bg-faded, .bg-secondary {
    background-color: #f5f5f5 !important;
}

  <!--  -->
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
  @media screen and (max-width: 620px) {
  .hide {
    display: none;
  }
}
  @media screen and (max-width: 820px) {
  .img {
    height: 40px;
  }
}
  @media screen and (max-width: 745px) {
  .img {
    height: 40px;
  }
}
  @media screen and (max-width: 681px) {
  .img {
    height: 80px;
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
<h3 style="color: #C82333"><strong>Orders</strong></h3>
<div class="breadcrumb__option">
<a href="index" style="color: #C82333">Home</a>
<span style="color: #C82333">Orders</span>
</div>
</div>
</div>
</div>
</div>
</section>



<!-- ========================================================================= -->


<!-- <div class="contact-form spad"> -->
<div class="container">
<!--   <div class="table-responsive dt-responsive"> -->

  <table id="dt-fixed-footer" class="table  containt" style="text-align: center; width:100%">

      <thead>
      <tr>
        <th>No</th>
        <th class="hide"  style="text-align: center;">Code</th>
        <th style="text-align: center;">Image</th>
        <th style="text-align: center;">Product</th>
        <th class="hide" style="text-align: center;">Quantity</th>
        <th style="text-align: center;">Total Price</th>
        <th style="text-align: center;">Status</th>
        <th class="hide"  style="text-align: center;">Order Date</th>
        <th style="text-align: center;">Action</th>
      </tr>
    </thead>
    <tbody>
<?php 
$i = 1;
$q_order = mysqli_query($conn,"SELECT * FROM order_table JOIN product_table ON order_table.product_order_id = product_table.product_id WHERE customer_order_id = '$c' AND order_status != 'Canceled' ");
while ($rows = mysqli_fetch_assoc($q_order)) {

 ?>
 
<!-- ================================================= -->




<!-- ====================== -->
<div class="modal fade" id="ordermodal<?php echo $rows['order_id']; ?>">

<!-- ========================================================= -->

<!-- <div class="container padding-bottom-3x mb-1"> -->
        <div class="card mb-3 modal-dialog modal-lg modal-content">
          <div class="p-4 text-center text-white text-lg rounded-top" style="background-color: #dc3545;"><span class="text-uppercase">Tracking Order No - </span><span class="text-medium"><?php echo $rows['product_code']; ?></span></div>
          <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Shipping Type:</span> COD</div>
            <div class="w-100 text-center py-1 px-2"><span class="text-medium"></span></div>
            <div class="w-100 text-center py-1 px-2"><span class="text-medium"></span></div>
          </div>
          <div class="card-body">
            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
<!-- ================== -->
<?php if ($rows['order_status'] == 'Confirmed Order') {
?>
<div class="step completed">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-cart"></i></div>
</div>
<h4 class="step-title">Confirmed Order</h4>
</div>

<div class="step">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-config"></i></div>
</div>
<h4 class="step-title">Processing Order</h4>
</div>

<div class="step">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-medal"></i></div>
</div>
<h4 class="step-title">Quality Check</h4>
</div>

<div class="step">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-car"></i></div>
</div>
<h4 class="step-title">Product Dispatched</h4>
</div>

<div class="step">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-home"></i></div>
</div>
<h4 class="step-title">Product Delivered</h4>
</div>
<?php
} 
elseif ($rows['order_status'] == 'Processing Order') {
 
?>
<div class="step completed">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-cart"></i></div>
</div>
<h4 class="step-title">Confirmed Order</h4>
</div>

<div class="step completed">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-config"></i></div>
</div>
<h4 class="step-title">Processing Order</h4>
</div>

<div class="step">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-medal"></i></div>
</div>
<h4 class="step-title">Quality Check</h4>
</div>

<div class="step">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-car"></i></div>
</div>
<h4 class="step-title">Product Dispatched</h4>
</div>

<div class="step">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-home"></i></div>
</div>
<h4 class="step-title">Product Delivered</h4>
</div>

<?php
}
elseif ($rows['order_status'] == 'Checking Quality') {
 
?>

<div class="step completed">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-cart"></i></div>
</div>
<h4 class="step-title">Confirmed Order</h4>
</div>

<div class="step completed">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-config"></i></div>
</div>
<h4 class="step-title">Processing Order</h4>
</div>

<div class="step completed">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-medal"></i></div>
</div>
<h4 class="step-title">Quality Check</h4>
</div>

<div class="step">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-car"></i></div>
</div>
<h4 class="step-title">Product Dispatched</h4>
</div>

<div class="step">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-home"></i></div>
</div>
<h4 class="step-title">Product Delivered</h4>
</div>
<?php
}
elseif ($rows['order_status'] == 'Product Dispatched') {
 
?>
<div class="step completed">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-cart"></i></div>
</div>
<h4 class="step-title">Confirmed Order</h4>
</div>

<div class="step completed">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-config"></i></div>
</div>
<h4 class="step-title">Processing Order</h4>
</div>

<div class="step completed">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-medal"></i></div>
</div>
<h4 class="step-title">Quality Check</h4>
</div>

<div class="step completed">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-car"></i></div>
</div>
<h4 class="step-title">Product Dispatched</h4>
</div>

<div class="step">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-home"></i></div>
</div>
<h4 class="step-title">Product Delivered</h4>
</div>

<?php
}
elseif ($rows['order_status'] == 'Product Delivered') {
 
?>
<div class="step completed">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-cart"></i></div>
</div>
<h4 class="step-title">Confirmed Order</h4>
</div>

<div class="step completed">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-config"></i></div>
</div>
<h4 class="step-title">Processing Order</h4>
</div>

<div class="step completed">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-medal"></i></div>
</div>
<h4 class="step-title">Quality Check</h4>
</div>

<div class="step completed">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-car"></i></div>
</div>
<h4 class="step-title">Product Dispatched</h4>
</div>

<div class="step completed">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-home"></i></div>
</div>
<h4 class="step-title">Product Delivered</h4>
</div>

<?php
}
else
{
?>

 <div class="step">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-cart"></i></div>
</div>
<h4 class="step-title">Confirmed Order</h4>
</div>

<div class="step">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-config"></i></div>
</div>
<h4 class="step-title">Processing Order</h4>
</div>

<div class="step">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-medal"></i></div>
</div>
<h4 class="step-title">Quality Check</h4>
</div>

<div class="step">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-car"></i></div>
</div>
<h4 class="step-title">Product Dispatched</h4>
</div>

<div class="step">
<div class="step-icon-wrap">
<div class="step-icon"><i class="pe-7s-home"></i></div>
</div>
<h4 class="step-title">Product Delivered</h4>
</div>             
<?php } ?>
<!-- ================== -->
            </div>
          </div>
        </div>

<!-- ========================================================== -->

</div>


<!-- ================================================== -->  
      <tr>
      <td><?php echo $i++; ?></td>
      <td class="hide" ><?php echo $rows['product_code']; ?></td>
      <td><div class="view zoom z-depth-1 rounded" style="display: contents;"><img src="dashboard/data_files/product_file/<?php echo $rows['product_image_1'];?>" width="100" height="100" style="border-radius: 10px;" class="img"></div></td>
      <td><?php echo $rows['product_name']; ?></td>
      <td><?php echo $rows['order_shipp_qty']; ?></td>



      <td class="hide"><?php $qty=$rows['order_shipp_qty']; $price = $rows['product_price']; $total_p = $qty * $price;  echo $total_p." AFN"; ?></td>
      

      <td>

        <?php 
 

         if($rows['order_status'] == 'Rejected'){
          echo "<label style='background-color:#dc3545; font-size:10px; border-radius:5px; color:#fff; padding:3px;'>Order Rejected</label>";
         }
         elseif ($rows['order_status'] == 'Canceled') {
           echo "<label style='background-color:#dc3545; font-size:10px; border-radius:5px; color:#fff; padding:3px;'>Order Rejected</label>";
         }
         else{
          echo $rows['order_status'];
         }


        ?>
          

        </td>






      <td class="hide" ><?php echo $rows['order_date']; ?></td>
      <td>
        <a href="" data-toggle="modal" data-target="#ordermodal<?php echo $rows['order_id']; ?>"><i class="fa fa-file" style="color: #dc3545; "></i></a>



<?php 
if ($rows['order_status'] != 'Rejected' AND $rows['order_status'] != 'Canceled' AND $rows['order_status'] != 'Checking Quality' AND $rows['order_status'] != 'Product Dispatched' AND $rows['order_status'] != 'Product Delivered') {
?>
<!-- <a onclick="clear_data(event,<?php echo $rows['order_id'];?>,<?php echo $c;?>,<?php echo $rows['product_order_id'];?>); " >&nbsp;&nbsp;<i class="fa fa-trash" style="color: #dc3545;"></i></a> -->
<a onclick="var result = confirm('Are you sure you want to delete???');if (result){clear_data(event,<?php echo $rows['order_id'];?>,<?php echo $c;?>,<?php echo $rows['product_order_id'];?>);}" >&nbsp;&nbsp;<i class="fa fa-trash" style="color: #dc3545;"></i></a>
<?php 
}

// onClick="return confirm('are you sure you want to delete??');"


?>




      </td>
    </tr>

<?php } ?>
    </tbody>


  </table>
<!-- </div> -->

<!--  -->
</div>


<div class="result"></div>
<!-- </div> -->
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
// 

// console.log(clear_data);
// console.log(confirm);
function clear_data(e,order_id,customer_id,product_id) {
  e.preventDefault();


    $.ajax
        ({
          type: "POST",
          url: "order_canceled",
          data: { o_id:order_id,
                  c_id:customer_id,
                  p_id:product_id},
          success: function (data) {
            $('.result').html(data);
          }
        });
            $(".containt").load(" .containt");
            $(".containt").load(" .containt");
}
// 
$(document).ready(function() {
     var refreshId = setInterval(function() {
     $("#time").load(" #time");
          $(".containt").load(" .containt");
     }, 3000);
});
</script>
</body>


</html>