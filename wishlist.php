
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
 else {
echo "<script>window.location='login';</script>";
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
<title>Wishlist | E-commerce Marketplace</title>



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
<a href="wishlist" class="refreshb"><i class="fa fa-heart">
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
<h3 style="color: #C82333"><strong>Wishlist</strong></h3>
<div class="breadcrumb__option">
<a href="index" style="color: #C82333">Home</a>
<span style="color: #C82333">Wishlist</span>
</div>
</div>
</div>
</div>
</div>
</section>



<!-- ========================================================================= -->


<div class="contact-form spad">
<div class="container"  id="btncc">
<div class="row refresh">


<!-- =====================-==================== -->
<!-- Grid column -->
<?php 
$au_sql = "SELECT * FROM customer_table join product_wish on customer_table.customer_id = product_wish.customer_wish_id join product_table on product_table.product_id = product_wish.product_wish_id JOIN seller_request_table ON product_table.product_seller_id = seller_request_table.seller_id JOIN seller_profile_table ON seller_request_table.seller_id = seller_profile_table.seller_req_id WHERE customer_table.customer_id = '$c' AND product_table.product_status = 'Publish' AND seller_profile_table.account_status = 'Enabled' ";


$c_query = mysqli_query($conn, $au_sql);

while ($row = mysqli_fetch_array($c_query))
{
 ?>

<div class="col-md-4 col-lg-3 col-6 mb-3">
<!-- Card -->
<div class="" id="container">
  <!--  -->
<div class="view zoom z-depth-2 rounded">
<img class="img-fluid w-100" src="dashboard/data_files/product_file/<?php echo $row['product_image_1'];?>" alt="Sample" style="height: 170px !important;">
<a href="view_product?item=<?php echo$row['product_code'];?>&id=<?php echo $row['product_id'];?>">
<div class="mask waves-effect waves-light"></div>
</a>
<h6 class="mb-0" style="position: absolute; top: 0px; margin: 3px; font-size: 1rem; font: menu; "><span style="border-radius: 2rem 10rem; width: 85px; background-color: #dc3545 !important" class="badge badge-primary badge-pill badge-news">Off <?php echo $row['product_discount']; ?>&nbsp;؋  </span></h6>
</div>
<!--  -->
<div class="text-center pt-2">


<?php 
$p_name = $row['product_name'];
if(strlen($p_name) > 27)
{ 
  echo "<h5 class='mb-0'>".substr($p_name,0,27)."...</h5>";
}
else
{
 echo "<h5 class='mb-0'>".$p_name."</h5>";
}
//
$p_code = $row['product_code'];
if(strlen($p_code) > 32)
{ 
  echo "<h5 class='mb-0'>".substr($p_code,0,32)."...</h5>";
}
else
{
  echo "<h5 class='mb-0'>".$p_code."</h5>";
}
 ?>
<h6 class="mb-1">&nbsp; ؋ <?php echo $row['product_price']; ?> </h6>
<div class="row justify-content-center">
<button type="button" class="btn btn- btn-sm mr-1 waves-effect waves-light" style="background: #dc3545; margin: 0px;" onclick="delete_data(event,<?php echo $row['product_id'];?>,<?php echo $c; ?>)"><i class="fa fa-trash" style="color:#fff;"></i></button>

<a href="view_product?item=<?php echo$row['product_code'];?>&id=<?php echo$row['product_id'];?>" type="button" class="btn btn-light btn-sm waves-effect waves-light" style="margin: 0px;"><i class="fa fa-info-circle" style="color: #dc3545;"></i>&nbsp;Details</a>
</div>
</div>
<!--  -->
</div>
<!-- Card -->
</div>
<?php } ?>
</div>
<hr>


<button type="button" class="btn btn- btn-sm mr-1 waves-effect waves-light" style="background: #dc3545; color: #fff;" onclick="clear_data(event,<?php echo $c; ?>)" <?php if (!mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM product_wish WHERE customer_wish_id = '$c' "))) {echo $btn = "disabled";} ?> ><i class="fa fa-trash" style="">&nbsp;</i>Remove All</button>







<button type="button" class="btn btn-light btn-sm waves-effect waves-light" style="background: #dc3545;">Continue Shopping</button>
</div>
</div>
 <div class="result">
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
<script src="css/notify/notify.js"></script>
<script src="css/notify/notify.min.js"></script>

<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
 <script>
    // $(document).ready(function () {
    //   $('.mdb-select').materialSelect();
    //   $('.select-wrapper.md-form.md-outline input.select-dropdown').bind('focus blur', function () {
    //     $(this).closest('.select-outline').find('label').toggleClass('active');
    //     $(this).closest('.select-outline').find('.caret').toggleClass('active');
    //   });
    // });


function delete_data(e,pro_id,user_id) {
  e.preventDefault();
  console.log(pro_id)

    $.ajax
        ({
          type: "POST",
          url: "wish_remove",
          data: { p_id:pro_id, c_id:user_id},
          success: function (data) {
            $('.result').html(data);
          }
        });
            $(".refresh").load(" .refresh");
                $(".refresh").load(" .refresh");
                $(".refresha").load(" .refresha");
                        $(".refreshb").load(" .refreshb");
                                          $("#btncc").load(" #btncc");






}

function clear_data(e,user_id) {
  e.preventDefault();

    $.ajax
        ({
          type: "POST",
          url: "wishlist_clear",
          data: { c_id:user_id},
          success: function (data) {
            $('.result').html(data);
          }
        });
            $(".refresh").load(" .refresh");
                $(".refresh").load(" .refresh");
                $(".refresha").load(" .refresha");
                        $(".refreshb").load(" .refreshb");
                            $("#btncc").load(" #btncc");

}


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