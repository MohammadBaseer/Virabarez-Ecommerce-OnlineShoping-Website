
<?php 
session_start();
include_once "includes/conn.php";
if(isset($_SESSION['customer_user'])){
$user = $_SESSION['customer_user'];
$auth_sql = "SELECT * FROM customer_table 
left join product_wish on customer_table.customer_id = product_wish.customer_wish_id WHERE customer_table.customer_email = '$user' ";
$auth_query = mysqli_query($conn, $auth_sql);
$auth = mysqli_fetch_assoc($auth_query);
// =====================================================


}
// for product fetch

$plus_query = "SELECT * FROM customer_table join
product_wish on customer_table.customer_id = product_wish.customer_wish_id join
 product_table on product_table.product_id = product_wish.product_wish_id";
$plus_result = mysqli_query($conn, $plus_query);
$plus_rows = mysqli_fetch_assoc($plus_result);




 $p = $_GET['id'];
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
<title>View Product | E-commerce Marketplace</title>

<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&amp;display=swap" rel="stylesheet">
<!-- <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script> -->
<link rel="icon" href="img/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/login style.css" type="text/css">
<link rel="stylesheet" href="css/eco/mdb-pro.min.css" type="text/css">
<link rel="stylesheet" href="css/eco/mdb.ecommerce.min.css" type="text/css">
<link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">

<!--  -->

<!--  -->
<style type="text/css">

  .label-success {
    background: #2ed8b6;}
  .label-danger {
    background: #FF5370;
}


.label-success, .label-danger {
  line-height: 1;
    margin-bottom: 0;
    text-transform: capitalize;
  border-radius: 4px;
    font-size: 75%;
    padding: 4px 7px;
    margin-right: 5px;
    font-weight: 400;
    color: #fff;}

 @media screen and (max-width: 600px) {
  .related {
    display: none;
  }
}
 span.fa.fa-heart.wish:hover {
color: #dc3545 !important;

}
body:not(.modal-open){
  padding-right: 0px !important;
}
body:not(.modal-open){
  padding-right: 0px !important;
}
.btn-danger{
  color: #fff;
}
/*span .dec .qtybtn{
display: none;
}*/
</style>
</head>
<body style="padding-right: 0px !important; ">

<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
<div class="humberger__menu__logo">
<a href="#"><img src="img/logo.png" alt=""></a>
</div>
<div class="humberger__menu__cart" id="wishcount1">
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
<li class="active"><a href="index">Home</a></li>
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
<li class="active"><a href="our-seller">Our Seller</a></li>
<li><a href="products">Our Products</a></li>
<li><a href="join_us">Join Us</a></li>
<li><a href="about">About US</a></li>
<li><a href="contact">Contact</a></li>
</ul>
</nav>
</div>
<div class="col-lg-3">
<div class="header__cart" id="wishcount">
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
<h3 style="color: #C82333"><strong>Catagory</strong></h3>
<div class="breadcrumb__option">



<!-- working -->

<?php 
$item = $_GET['item'];
$id = $_GET['id'];

  $c_query = mysqli_query($conn, "SELECT * FROM seller_profile_table 
 join seller_request_table on seller_request_table.seller_id = seller_profile_table.seller_req_id join product_table on seller_request_table.seller_id = product_table.product_seller_id JOIN category_table ON product_table.seller_product_cat = category_table.category_id WHERE product_table.product_id = '$id' AND product_table.product_code = '$item'");
$row = mysqli_fetch_assoc($c_query);

 ?>


<a href="our-seller" style="color: #C82333">Our Seller</a>
<a href="seller_product?seller=<?php echo $row['seller_company_title'];?>&cmp=<?php echo $row['seller_req_id'];?>" style="color: #C82333"><?php echo $row['seller_company_title']; ?></a>
<a href="category?items=<?php echo $row['subcategory']; ?>" style="color: #C82333"><?php echo $row['subcategory']; ?></a> 
<span style="color: #C82333">Details</span>




<!-- working end -->


</div>
</div>
</div>
</div>
</div>
</section>

 


<!-- ========================================================================= -->
<?php 

if ($row['product_code'] == "$item" AND $row['product_id'] == "$id") {

 ?>
<div class="container">
  <section class="mb-5 mt-5">

        <div class="row">
          <div class="col-md-6 mb-4 mb-md-0" style="display: inline-table; padding: 5px;">
<!-- =============== -->
<div class="col-lg-12 mb-2 imagevv" style="padding: 0px; ">
  <img href="dashboard/data_files/product_file/<?php echo $row['product_image_1'];?>" id="image" src="dashboard/data_files/product_file/<?php echo $row['product_image_1'];?>" alt="" style="width: 100%;height: 450px; box-shadow: -2px 1px 11px 0px rgb(90 66 66 / 97%);border-radius: 10px;">
  <!-- ============================================ -->

  <!-- ============================================ -->
</div>

  <div class="col-md-12">
    <div id="thumbs" class="row" style="padding: 5px;">
<!--  -->
      <div class="col-lg-3 col-md-3 col-sm-3 col-3 mask waves-effect waves-light view zoom" style="padding: 5px;">
<a href="dashboard/data_files/product_file/<?php echo $row['product_image_1'];?>"><img style="width: 100%; height: 86px; box-shadow: -3px 4px 4px 2px rgb(90 66 66 / 97%); border-radius: 5px;" src="dashboard/data_files/product_file/<?php echo $row['product_image_1'];?>" alt=""></a>       
      </div>
      <!--  -->
<?php 
if ($row['product_image_2'] !="") {
?>
     <div class="col-lg-3 col-md-3 col-sm-3 col-3 mask waves-effect waves-light view zoom" style="padding: 5px;">
<a href="dashboard/data_files/product_file/<?php echo $row['product_image_2'];?>"><img style="width: 100%; height: 86px; box-shadow: -3px 4px 4px 2px rgb(90 66 66 / 97%); border-radius: 5px;" src="dashboard/data_files/product_file/<?php echo $row['product_image_2'];?>" alt=""></a>         
      </div>
<?php 
}
if ($row['product_image_3'] !="") {
?>

      <!--  -->
      <div class="col-lg-3 col-md-3 col-sm-3 col-3 mask waves-effect waves-light view zoom" style="padding: 5px;">
<a href="dashboard/data_files/product_file/<?php echo $row['product_image_3'];?>"><img style="width: 100%; height: 86px; box-shadow: -3px 4px 4px 2px rgb(90 66 66 / 97%); border-radius: 5px;" src="dashboard/data_files/product_file/<?php echo $row['product_image_3'];?>" alt=""></a>         
      </div>

<?php 
}
if ($row['product_image_4'] !="") {
?>
      <!--  -->
      <div class="col-lg-3 col-md-3 col-sm-3 col-3 mask waves-effect waves-light view zoom" style="padding: 5px;">
<a href="dashboard/data_files/product_file/<?php echo $row['product_image_4'];?>"><img style="width: 100%; height: 86px; box-shadow: -3px 4px 4px 2px rgb(90 66 66 / 97%); border-radius: 5px;" src="dashboard/data_files/product_file/<?php echo $row['product_image_4'];?>" alt=""></a>         
      </div>

<?php 
} ?>

    </div>
  </div>


<!-- =============== -->
          </div>
          <div class="view overlay rounded z-depth-1 gallery-item hoverable col-md-6" style="padding: 65px;">
            <h4><strong><?php echo $row['product_name']; ?></strong></h4>
            <p class="mb-2 text-muted text-uppercase small">Off <?php echo $row['product_discount']; ?>&nbsp;؋  </p>


            <div class="table-responsive">
              <table class="table table-sm table-borderless mb-0">
                <tbody>
                  <tr>
                    <th class="pl-0 w-25" scope="row"><strong>Price:</strong></th>
                    <td><?php echo $row['product_price']; ?>&nbsp;؋  </td>
                  </tr>
                  <tr>
                    <th class="pl-0 w-25" scope="row"><strong>Code</strong></th>
                    <td><?php echo $row['product_code']; ?></td>
                  </tr>
                  <tr>
                    <th class="pl-0 w-25" scope="row"><strong>Free Delivery</strong></th>
                    <td><?php echo $row['product_free_delivery']; ?></td>
                  </tr>
                  <tr>
                    <th class="pl-0 w-25" scope="row"><strong>Category</strong></th>
                    <td><?php echo $row['subcategory']; ?></td>
                  </tr>
<tr>
 <th class="pl-0 w-25" scope="row"><strong>Stock</strong></th>
 <td>
<?php
if ($row['stock_status'] == "In Stock") {
echo "<label class='label label-success'>".$row['stock_status']."</label>";
} 
else
{
echo "<label class='label label-danger'>".$row['stock_status']."</label>"; 
}
?>
</td>  
</tr>              
            </td>
<!--                   <tr>
                    <th class="pl-0 w-25" scope="row" style="padding: 20px;"><strong>Quantity:</strong></th>
                    <td>
                      <div class="quantity">
<div class="pro-qty">

<input type="number" id="quantity" name="quantity" min="1"  value="1">

</div>
</div>
                    </td>
                  </tr> -->


                </tbody>
              </table>


            </div>

<div style="display: grid;">
  
<?php 
@$wish1 = mysqli_query($conn, "SELECT * FROM product_wish WHERE product_wish_id ='$p' AND customer_wish_id = '$c' ");
$wis1 = mysqli_fetch_assoc($wish1);


if (isset($_SESSION['customer_user'])) {
 ?>


<button type="button" class="btn btn- btn-md mr-1 mb-2 waves-effect waves-light " style="color:#fff; background: #dc3545;" data-toggle="modal" data-target="#ordermodal<?php echo $pp_id =$row['product_id']; ?>">Order now</button>


 <!-- =============================================================== -->
 <!-- modal-1 here -->
  <div class="modal fade" id="ordermodal<?php echo $pp_id =$row['product_id']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Order:<?php echo $row['product_name']; ?></h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
         <div class="modal-body" style="text-align: left;">
            <div class="container">

<form method="POST">

<!--  -->
<div class="form-group form-danger">
<label class="float-label">Shipping Address</label>
<input type="hidden" hidden value="<?php echo $row['product_id']; ?>" name="o_shipp_product" required>
<input type="text" class="form-control o_shipp_add" name="o_shipp_add" required>
</div>
<!--  -->
<div class="row">
<div class="col-lg-6">
<div class="form-group form-danger">
<label class="float-label">Shipping Country</label>
<?php 
$sl_sql = mysqli_query($conn,"SELECT * FROM countries_table");
 ?>
<select class="form-control o_shipp_country" name="o_shipp_country" style="padding: 0px 5px;">
  <?php 
while ($s_row = mysqli_fetch_assoc($sl_sql)) {
?>
<option value="<?php echo $s_row['country_name'];?>"><?php echo $s_row['country_name'];?></option>";
<?php
 }  
?>
</select>
</div>
</div>

<div class="col-lg-6">
<div class="form-group form-danger">
<label class="float-label">Shipping City</label>
<input type="text" class="form-control o_shipp_city" name="o_shipp_city" required>
</div>
</div>
</div>
<!--  -->
<!--  -->
<div class="form-group form-danger">
<label class="float-label">Phone Number</label>
<input type="text" class="form-control o_ship_phone" name="o_ship_phone" required>
</div>


<!--  -->
<div class="container form-group form-danger">
<div class="quantity">
<div class="pro-qty">
<label class="float-label">Quantity </label>
<input type="number" class="o_ship_qty" min="1" max="10" value="1" name="o_ship_qty" required>
</div>
</div>        
</div>
<!--  -->
<div class="col-md-12 o_now_btn" style="padding-bottom: 25px; direction: rtl;">
<button type="submit" name="submit" class="btn btn-danger btn-sm waves-effect text-center m-b-20 iinntt" style="color:#fff;display: flex;" >Order Now</button>
</div>
<!--  -->
</form>

</div>
</div>

 </div>
</div>
</div>

<!-- =========================================================== -->




<?php 
}
else{
 ?>
<button type="button" class="btn btn- btn-md mr-1 mb-2 waves-effect waves-light " style="color:#fff; background: #dc3545;" data-toggle="modal" data-target="#modal-order">Order now</button>
 <?php } ?>








           
<form  id="refreshfr" action="#" method="POST" style="/**display: contents; display: flex;**/">
    <input type="text" hidden name="p_id" id="p_id" value="<?php echo @$row['product_id']; ?>"> 
    <input type="text" hidden name="c_id" id="c_id" value="<?php echo @$auth['customer_id']; ?>"> 
<div class="row justify-content-center" id="refresh">


<?php 



if (isset($_SESSION['customer_user'])) {
// echo "isset true";
if($wis1['product_wish_id'] != "$p" AND $wis1['customer_wish_id'] != "$c"){
// echo "if true";

  ?>

<button type="button" class="btn btn-light btn-md mr-1 mb-2 subs subs1" id="subs"><span style="-webkit-text-stroke: 1px #dc3545;" class=""><span class="fa fa-heart wish" style="color: #e0e0e0;"></span></span>&nbsp;Add To Wishlist</button>
<?php
}
}
else
{
  // echo "else true";
?>

<button type="button" class="btn btn-light btn-md mr-1 mb-2 " id="xyz" data-toggle="modal" data-target="#modal-order"><span style="-webkit-text-stroke: 1px #dc3545;" data-toggle="modal" data-target="#modal-order"><span class="fa fa-heart wish" style="color: #e0e0e0;"></span></span>&nbsp;Add To Wishlist </button>

<?php
}

 ?>


<button type="button" disabled class="btn btn-light btn-md mr-1 mb-2 waves-effect waves-light" 
<?php if(@$wis1['product_wish_id'] == "$p" AND @$wis1['customer_wish_id'] == "$c"){ echo "style='width: 91%;'";} ?> 
><i class="fa fa-shopping-cart pr-2"></i>Add to cart</button>



</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
 -->
</form>

</div>
            


              <hr>
<h5 style="font-weight: bolder; "><strong>Seller: </strong><a href="seller_product?seller=<?php echo $row['seller_company_title'];?>&cmp=<?php echo $row['seller_req_id'];?>" style="color:#dc3545;"> <?php echo $row['seller_company_title']; ?></a></h5>

<table class="table table-sm table-borderless mb-0">
<tbody>
<tr>

<th class="pl-0 w-25" scope="row">
 <img src="dashboard/data_files/logo/<?php echo $row['seller_logo'];?>" class="img-fluid" style="width: 100%; height: 90px;">
</th>
<td><p style="line-height: 18px; font-size: 14px; "><?php echo $row['seller_details'];?></p> </td>

</tr>
</tbody>
</table>

</div>



<!-- ---------------------------------------------------- -->
        
</div>
      </section>
      <div class="result">
    </div>
<!-- ======================================================================== -->
<?php include_once "Login_model.php"; ?>
<!-- ======================================================================== -->
<div class="col-lg-12">
<div class="product__details__tab">
<ul class="nav nav-tabs" role="tablist">
<li class="nav-item">
<a class="nav-link  <?php if (!isset($_POST['review'])) {echo " active";}else{echo"";} ?>" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="<?php if (!isset($_POST['review'])) {echo " true";}else{echo"false";} ?>">Description</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Information</a>
</li>
<li class="nav-item">
<a class="nav-link <?php if (isset($_POST['review'])) {echo " active";}else{echo"";} ?>" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="<?php if (isset($_POST['review'])) {echo " true";}else{echo"false";} ?>">Reviews 
  <span>(
    <?php 
$pp_id = $row['product_id'];
$coun_sql = mysqli_query($conn,"SELECT * FROM  product_review WHERE product_review_id = '$pp_id' ");
$row_count = mysqli_num_rows ( $coun_sql );
echo $row_count;
     ?>
  )</span>
</a>
</li>
</ul>
<div class="tab-content">
<div class="tab-pane <?php if (!isset($_POST['review'])) {echo " active";}else{echo"";} ?> " id="tabs-1" role="tabpanel">
<div class="product__details__tab__desc">
<h6>Products Describtions</h6>
<p><?php echo $row['product_desc']; ?></p>
</div>
</div>
<div class="tab-pane" id="tabs-2" role="tabpanel">
<div class="product__details__tab__desc">
<h6>Products Infomation</h6>
<p><?php echo $row['product_info']; ?></p>
</div>
</div>
<div class="tab-pane <?php if (isset($_POST['review'])) {echo " active";} ?>" id="tabs-3" role="tabpanel">
<div class="product__details__tab__desc">
<h6>Reviews</h6>
<!--  -->
<div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 10px;">
<div class="container">
<div id="col-lg-12">
  <i class="fa fa-star f-12 text" style="color: #dc3545"></i>
  <i class="fa fa-star f-12 text" style="color: #dc3545"></i>
  <i class="fa fa-star f-12 text" style="color: #dc3545"></i>
  <i class="fa fa-star f-12 text" style="color: #dc3545"></i>
  <i class="fa fa-star f-12 text" style="color: #dc3545"></i>

<?php 
$pp_id = $row['product_id'];
$coun_sql = mysqli_query($conn,"SELECT * FROM  product_review WHERE product_review_id = '$pp_id' AND reviewer_rate = '5' ");
$row_count = mysqli_num_rows ( $coun_sql );
$rvw = mysqli_fetch_assoc($coun_sql);
echo "(".$row_count.")";
 ?>

  <br>
  <i class="fa fa-star f-12 text" style="color: #dc3545"></i>
  <i class="fa fa-star f-12 text" style="color: #dc3545"></i>
  <i class="fa fa-star f-12 text" style="color: #dc3545"></i>
  <i class="fa fa-star f-12 text" style="color: #dc3545"></i>
  <i class="fa fa-star f-12 text" style="color: #a1a09f;"></i>
  
<?php 
$pp_id = $row['product_id'];
$coun_sql = mysqli_query($conn,"SELECT * FROM  product_review WHERE product_review_id = '$pp_id' AND reviewer_rate = '4' ");
$row_count = mysqli_num_rows ( $coun_sql );
$rvw = mysqli_fetch_assoc($coun_sql);
echo "(".$row_count.")";
 ?>

    <br>
  <i class="fa fa-star f-12 text" style="color: #dc3545"></i>
  <i class="fa fa-star f-12 text" style="color: #dc3545"></i>
  <i class="fa fa-star f-12 text" style="color: #dc3545"></i>
  <i class="fa fa-star f-12 text" style="color: #a1a09f;"></i>
  <i class="fa fa-star f-12 text" style="color: #a1a09f;"></i>
  
<?php 
$pp_id = $row['product_id'];
$coun_sql = mysqli_query($conn,"SELECT * FROM  product_review WHERE product_review_id = '$pp_id' AND reviewer_rate = '3' ");
$row_count = mysqli_num_rows ( $coun_sql );
$rvw = mysqli_fetch_assoc($coun_sql);
echo "(".$row_count.")";
 ?>

    <br>
  <i class="fa fa-star f-12 text" style="color: #dc3545"></i>
  <i class="fa fa-star f-12 text" style="color: #dc3545"></i>
  <i class="fa fa-star f-12 text" style="color: #a1a09f;"></i>
  <i class="fa fa-star f-12 text" style="color: #a1a09f;"></i>
  <i class="fa fa-star f-12 text" style="color: #a1a09f;"></i>
  
<?php 
$pp_id = $row['product_id'];
$coun_sql = mysqli_query($conn,"SELECT * FROM  product_review WHERE product_review_id = '$pp_id' AND reviewer_rate = '2' ");
$row_count = mysqli_num_rows ( $coun_sql );
$rvw = mysqli_fetch_assoc($coun_sql);
echo "(".$row_count.")";
 ?>

    <br>
  <i class="fa fa-star f-12 text" style="color: #dc3545"></i>
  <i class="fa fa-star f-12 text" style="color: #a1a09f;"></i>
  <i class="fa fa-star f-12 text" style="color: #a1a09f;"></i>
  <i class="fa fa-star f-12 text" style="color: #a1a09f;"></i>
  <i class="fa fa-star f-12 text" style="color: #a1a09f;"></i>
  
<?php 
$pp_id = $row['product_id'];
$coun_sql = mysqli_query($conn,"SELECT * FROM  product_review WHERE product_review_id = '$pp_id' AND reviewer_rate = '1' ");
$row_count = mysqli_num_rows ( $coun_sql );
$rvw = mysqli_fetch_assoc($coun_sql);
echo "(".$row_count.")";
 ?>
<br>

<br>

</div>
<script type="text/javascript">
  
</script>
<hr>

<div class="col-lg-12">
<?php 
// 


// 


if (isset($_POST['review'])) {
  $product_id = $_POST['product_id'];
  $name = $_POST['name'];
  $rate = $_POST['rate'];
  $review = $_POST['comment'];

$join_date = date('d-M-Y');

  $review_sql ="INSERT INTO product_review (`product_review_id`,`reviewer_name`,`reviewer_rate`,`reviewer_comment`,`reviewer_date`) VALUES ('$product_id','$name','$rate','$review','$join_date')";
  // 
// $re_sql = mysqli_query($conn,"SELECT * FROM product_review WHERE reviewer_email = '$email' ");
// $compair = mysqli_fetch_assoc($re_sql);
 if (empty($name) || empty($review)) {
echo   "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>Empty</div>";
}
//  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
// echo  $err = "<div class='p-2' style='border-radius: 10px; background: #f5758114;'>Invalid email format</div>";
//     }
else
{
mysqli_query($conn, $review_sql);
}
}
 ?>
<form method="POST">
<div class="form-group">
<input type="hidden" class="form-control" placeholder="Your Name" name="product_id" value="<?php echo $row['product_id']; ?>">

<label for="email">*Name</label>
<input type="text" class="form-control" placeholder="Your Name" name="name">
</div>
<!-- <div class="form-group">
<label for="pwd">*Youe Email</label>
<input type="text" class="form-control" placeholder="Your Email" name="email">
</div> -->






<div class="form-group">
  <label for="pwd">*Rate</label><br>

    <p>
      <select id="combostar" name="rate">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </p>





</div>








<div class="form-group">
<label class="form-check-label">*Review</label>
  <textarea class="form-control" rows="3" type="text" name="comment"></textarea>
</div>
<button name="review" class="btn btn- btn-md mr-1 mb-2 waves-effect waves-light" style="color:#fff; background: #dc3545;">Rate</button>
</form>
</div>
</div>
</div>
<!--  -->
<?php 
  $p_id = $row['product_id'];
$rev_sql = mysqli_query($conn,"SELECT * FROM product_review WHERE product_review_id = '$p_id' ");
while ($rev_row = mysqli_fetch_assoc($rev_sql))
{
 ?>
<!--  -->
  <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 5px; box-shadow: 0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12)!important; padding: 20px;">
    <h4><strong style="color:#dc3545; ">Reviewed by:</strong> <?php echo $rev_row['reviewer_name']; ?></h4>
    <p>On Date of <?php echo $rev_row['reviewer_date']; ?>
      <br>





      <?php


       if($rev_row['reviewer_rate'] == '5'){
echo "  <i class='fa fa-star f-12 text' style='color: #dc3545'></i>
  <i class='fa fa-star f-12 text' style='color: #dc3545'></i>
  <i class='fa fa-star f-12 text' style='color: #dc3545'></i>
  <i class='fa fa-star f-12 text' style='color: #dc3545'></i>
  <i class='fa fa-star f-12 text' style='color: #dc3545'></i>";
       }
       elseif ($rev_row['reviewer_rate'] == '4') {
echo "  <i class='fa fa-star f-12 text' style='color: #dc3545'></i>
  <i class='fa fa-star f-12 text' style='color: #dc3545'></i>
  <i class='fa fa-star f-12 text' style='color: #dc3545'></i>
  <i class='fa fa-star f-12 text' style='color: #dc3545'></i>
  <i class='fa fa-star f-12 text' style='color: #a1a09f;'></i>";
        }elseif ($rev_row['reviewer_rate'] == '3') {
echo "<i class='fa fa-star f-12 text' style='color: #dc3545'></i>
  <i class='fa fa-star f-12 text' style='color: #dc3545'></i>
  <i class='fa fa-star f-12 text' style='color: #dc3545'></i>
  <i class='fa fa-star f-12 text' style='color: #a1a09f;'></i>
  <i class='fa fa-star f-12 text' style='color: #a1a09f;'></i>";
        } elseif ($rev_row['reviewer_rate'] == '2') {
echo "<i class='fa fa-star f-12 text' style='color: #dc3545'></i>
  <i class='fa fa-star f-12 text' style='color: #dc3545'></i>
  <i class='fa fa-star f-12 text' style='color: #a1a09f;></i>
  <i class='fa fa-star f-12 text' style='color: #a1a09f;'></i>
  <i class='fa fa-star f-12 text' style='color: #a1a09f;'></i>";
        } else{
echo "  <i class='fa fa-star f-12 text' style='color: #dc3545'></i>
  <i class='fa fa-star f-12 text' style='color: #a1a09f;'></i>
  <i class='fa fa-star f-12 text' style='color: #a1a09f;'></i>
  <i class='fa fa-star f-12 text' style='color: #a1a09f;'></i>
  <i class='fa fa-star f-12 text' style='color: #a1a09f;'></i>";
        }  
      ?>

    </p>
    <p style="color: #645454; padding: 0px 10px;" ><?php echo $rev_row['reviewer_comment']; ?></p>
  </div>
<?php } ?>
<!--  -->
</div>
</div>
</div>
</div>
</div>


<hr>

</div><!--  -->
<!-- ----------========Recomented Products -->
<div class="container related">
  <section class="mb-5 mt-5 refresh">


 <section class="categories">


  <h3><b>Related Products</b></h3>
<br><br>

<div class="row">

<!-- <div class="categories__slider owl-carousel"> -->

<?php 
$term = $row['seller_product_cat'];

$sql = mysqli_query($conn, "SELECT * FROM product_table WHERE product_id != '$id' AND seller_product_cat LIKE '%".$term."%'  ORDER BY RAND()LIMIT 8;");


while ($row = mysqli_fetch_assoc($sql)) {
  
 ?>
<!-- ============================================================================== -->


<div class="col-md-4 col-lg-3 col-6 mb-4">
<!-- Card -->
<div class="" id="container">
  <!--  -->


<div class="view zoom z-depth-1 rounded">
<img class="img-fluid w-100" src="dashboard/data_files/product_file/<?php echo $row['product_image_1'];?>" alt="Sample" style="height: 170px !important;">
<a href="view_product?item=<?php echo $row['product_code'];?>&id=<?php echo $row['product_id'];?>">
<div class="mask waves-effect waves-light"></div>
</a>
<h6 class="mb-0" style="position: absolute; top: 0px; margin: 3px; font-size: 1rem; font: menu; "><span style="border-radius: 2rem 10rem; width: 85px; background-color: #dc3545 !important" class="badge badge-primary badge-pill badge-news">Off <?php echo $row['product_discount']; ?>&nbsp;؋  </span>
</h6>

<!-- ================================================ -->
<?php 
$p = $row['product_id'];
@$c = $auth['customer_id'];
@$wish1 = mysqli_query($conn, "SELECT * FROM product_wish WHERE product_wish_id ='$p' AND customer_wish_id = '$c' ");
$wis1 = mysqli_fetch_assoc($wish1);


if (isset($_SESSION['customer_user'])) {
// echo "isset true";
if($wis1['product_wish_id'] != "$p" AND $wis1['customer_wish_id'] != "$c"){

// echo "if true";
 ?>
  <a onclick="save_data(event,<?php echo $row['product_id'];?>,<?php echo $c; ?>)">
  <span style="position: absolute; bottom: 0px; margin: 5px; margin-left: 14px; -webkit-text-stroke: 1px #dc3545;">
  <span class="fa fa-heart wish" style="color: #fff;"></span></span>
</a> 
<?php 
}
else
{
?>
<a href="" onclick="delete_data(event,<?php echo $row['product_id'];?>,<?php echo $c; ?>)">
  <span style="position: absolute; bottom: 0px; margin: 5px; margin-left: 14px; -webkit-text-stroke: 1px #dc3545;" class="">
  <span class="fa fa-heart wish" style="color: #dc3545;"></span></span></a>
<?php
}
}
else
{
 ?>
  <a href="" data-toggle="modal" data-target="#modal-order"> 
  <span style="position: absolute; bottom: 0px; margin: 5px; margin-left: 14px; -webkit-text-stroke: 1px #dc3545;" class="">
  <span class="fa fa-heart wish" style="color: #fff;"></span></span></a>
<?php } ?>







</div>

<!--  -->
<div class="text-center pt-2">


<?php 

$p_name = $row['product_name'];


if(strlen($p_name) > 90)
{ 
  echo "<h3 class='mb-0' style='font-size: 14px; line-height: 20px;'>".substr($p_name,0,90)."...</h3>";
}
else
{
  echo "<h3 class='mb-0' style='font-size: 14px; line-height: 20px;'>".$p_name."</h3>";
 
}

//
$p_code = $row['product_code'];


if(strlen($p_code) > 32)
{ 
  echo "<p class='mb-0' style='font-size: 14px; line-height: 15px;'>".substr($p_code,0,32)."...</p>";
}
else
{
  echo "<p class='mb-0' style='font-size: 14px; line-height: 15px;'>".$p_code."</p>";
 
}
 ?>







<p class="mb-1" style="font-size: 14px; line-height: 15px;">&nbsp; ؋ <?php echo $row['product_price']; ?> </p>
<!-- justify-content-center -->
<div class="row" style="display: flow-root;" >
<?php 
if (isset($_SESSION['customer_user'])) {
 ?>

<a type="button" class="btn btn- btn-sm mr-1 waves-effect waves-light" style="background: #dc3545; margin: 0px;" data-toggle="modal" data-target="#ordermodal<?php echo $pp_id =$row['product_id']; ?>"><i class="fa fa-shopping-cart" style="color:#fff;"><span class="small">&nbsp;Order</span></i></a>


 <?php //include_once "includes/order_q.php"; ?>
 <!-- =============================================================== -->
 <!-- modal-1 here -->
  <div class="modal fade" id="ordermodal<?php echo $pp_id =$row['product_id']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Order:<?php echo $row['product_name']; ?></h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
         <div class="modal-body" style="text-align: left;">
            <div class="container">

<form method="POST">

<!--  -->
<div class="form-group form-danger">
<label class="float-label">Shipping Address</label>
<input type="hidden" hidden value="<?php echo $row['product_id']; ?>" name="o_shipp_product" required>
<input type="text" class="form-control o_shipp_add" name="o_shipp_add" required>
</div>
<!--  -->
<div class="row">
<div class="col-lg-6">
<div class="form-group form-danger">
<label class="float-label">Shipping Country</label>
<select class="form-control o_shipp_country" name="o_shipp_country" style="padding: 0px 5px;">
  <option value="Afghanistan">Afghanistan</option>
</select>
</div>
</div>

<div class="col-lg-6">
<div class="form-group form-danger">
<label class="float-label">Shipping City</label>
<input type="text" class="form-control o_shipp_city" name="o_shipp_city" required>
</div>
</div>
</div>
<!--  -->
<!--  -->
<div class="form-group form-danger">
<label class="float-label">Phone Number</label>
<input type="text" class="form-control o_ship_phone" name="o_ship_phone" required>
</div>


<!--  -->
<div class="container form-group form-danger">
<div class="quantity">
<div class="pro-qty">
<label class="float-label">Quantity </label>
<input type="number" class="o_ship_qty" min="1" max="10" value="1" name="o_ship_qty" required>
</div>
</div>        
</div>
<!--  -->
<div class="col-md-12 o_now_btn" style="padding-bottom: 25px; direction: rtl;">
<button type="submit" name="submit" class="btn btn-danger btn-sm waves-effect text-center m-b-20 iinntt" style="color:#fff;display: flex;" >Order Now</button>
</div>
<!--  -->
</form>

</div>
</div>

 </div>
</div>
</div>

<!-- =========================================================== -->


<?php 
}
else{
 ?>
<button type="button" class="btn btn- btn-sm mr-1 waves-effect waves-light" style="background: #dc3545; margin: 0px;" data-toggle="modal" data-target="#modal-order"><i class="fa fa-shopping-cart" style="color:#fff;"><span class="small">&nbsp;Order</span></i></button>
 <?php } ?>




<a href="view_product?item=<?php echo $row['product_code'];?>&id=<?php echo $row['product_id'];?>" type="button" class="btn btn-light btn-sm waves-effect waves-light" style="margin: 0px;"><i class="fa fa-info-circle" style="color: #dc3545;"></i><span class="det">&nbsp;Details</span></a>
</div>

</div>
<!--  -->
</div>
<!-- Card -->
</div>

<!-- =============================================================================== -->
<?php } ?>

<!-- </div> -->



</div>
</section>


</section>
</div>
<!-- ----------========end Recomented Products -->

<!-- ---------------------------------------------------------- -->
<br><br><br>
<?php 
  // echo "true";
}
else{ 



  echo "<div class='container'>Error 404<br><br><br><br><br><br><br><br><br><br</div>";



}


 ?>

<?php 
include_once "footer.php";
 ?>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>

<script>
$('#thumbs').on('click', 'a', function(event) {
  $('#image').attr('src', this.href);
  return false;
})
</script>

<script src="css/eco/mdb.ecommerce.min.js"></script>
<script src="css/eco/mdb.min.js"></script>
<script src="css/eco/popper.min.js"></script>

<script src="css/notify/notify.js"></script>
<script src="css/notify/notify.min.js"></script>
   <script src="css/src/jquery.combostars.js"></script>
    

<?php 
$ref_sql = mysqli_query($conn, "SELECT * FROM order_table");
$ref_row = mysqli_num_rows($ref_sql);

// echo "<pre>";
// print_r($ref_row);
// echo "</pre>";


if (isset($_POST['submit'])) {
 $o_c_id = $c;
 $o_p_id = $_POST['o_shipp_product'];
$o_shipp_add = $_POST['o_shipp_add'];
$o_shipp_country = $_POST['o_shipp_country'];
$o_shipp_city = $_POST['o_shipp_city'];
$o_ship_phone = $_POST['o_ship_phone'];
$o_ship_qty = $_POST['o_ship_qty'];
$o_status = "Pending";
$date = date('D, M jS, Y');
// ======================

$ref_sql = mysqli_query($conn, "SELECT * FROM order_table WHERE customer_order_id ='$o_c_id' AND product_order_id = '$o_p_id' AND order_status != 'Product Delivered' AND order_status != 'Rejected' AND order_status != 'Canceled'");
$ref_row = mysqli_fetch_array($ref_sql);

// echo "<pre>";
// print_r($ref_row);
// echo "</pre>";

if($ref_row > 0){


echo "<script>$.notify('Already Ordered', 'info');</script>";
}
else
{

if (empty($o_shipp_add) || empty($o_shipp_country) || empty($o_shipp_city) || empty($o_ship_phone) || empty($o_ship_qty)) {
echo "<script>
                $.notify('field empty*', 'warn');
        </script>";}
elseif ($o_ship_qty < 1) {
  echo "<script>
                $.notify('quantity failed', 'warn');
        </script>";
}
else
{
if (!mysqli_query($conn, "INSERT INTO order_table (`customer_order_id`, `product_order_id`,`order_shipp_add`,`order_shipp_country`,`order_shipp_city`,`order_shipp_phone`,`order_shipp_qty`,`order_status`,`order_date`) 
  values ('$o_c_id', '$o_p_id','$o_shipp_add','$o_shipp_country','$o_shipp_city','$o_ship_phone','$o_ship_qty','$o_status','$date')")) {
  echo("CodeError: " . mysqli_error($conn));

}
else
{
  echo "<script>
                $.notify('Order Send', 'success');
        </script>";

}

}



}

// ==============
}



 ?> 

<script>
function save_data(e,pro_id,user_id) {
  e.preventDefault();
  console.log(pro_id)

    $.ajax
        ({
          type: "POST",
          url: "wish_entry",
          data: { p_id:pro_id, c_id:user_id},
          success: function (data) {
            $('.result').html(data);

          }
        });
            $(".refresh").load(" .refresh");
                $(".refresh").load(" .refresh");
                $(".refresha").load(" .refresha");
                        $(".refreshb").load(" .refreshb");

}
// =====
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




}


</script>
 <script>
  // $(document).ready(function () {
    $("#subs").click(function (e) {
      e.preventDefault();
      var p_id = $('#p_id').val();
      var c_id = $('#c_id').val();
      $.ajax
        ({
          type: "POST",
          url: "wish_entry",
          data: { p_id:p_id, c_id:c_id},
          success: function (data) {
            $('.result').html(data);
            // $('#contactform')[0].reset();
//             setInterval(function() {

$("#refresh").load(" #refresh > *");


// window.location.reload();


//             $("#refreshfr")[0].reset();

          }

        });
    });
  // });
$(".subs").click(function(){
  // alert("Wishlist Updates");
  // setInterval(function() { 
    $("#wishcount").load(" #wishcount");
        $("#wishcount").load(" #wishcount");

$(".refresha").load(" .refresha");
$(".refreshb").load(" .refreshb");

// }, 1000); 
})

$(".subs1").click(function(){
  // alert("Wishlist Updates");
  // setInterval(function() { 
    $("#wishcount1").load(" #wishcount1");
        $("#wishcount1").load(" #wishcount1");

// }, 1000); 
})
// ===================
$(document).ready(function(){
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
})
</script>
    
    <script>
      $(function () {
        $('#combostar').on('change', function () {
          $('#starcount').text($(this).val());
        });
        $('#combostar').combostars();
      });
    </script>
  </body>

</html>