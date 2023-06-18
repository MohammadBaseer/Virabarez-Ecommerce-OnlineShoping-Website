
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
<title>Category | E-commerce Marketplace</title>

<!-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&amp;display=swap" rel="stylesheet">
 --><link rel="icon" href="img/favicon.ico" type="image/x-icon">

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
 @media screen and (max-width: 570px) {
  span.small {
    display: none;
  }
}
  @media screen and (max-width: 462px) {
  span.det {
    display: none;
  }
}

 span.fa.fa-heart.wish:hover {
color: #dc3545 !important;
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
  <?php
//  start code from here 
  $gett = $_GET['items']; 
$sqli_cat = mysqli_query($conn,"SELECT * FROM category_table WHERE subcategory = '$gett' ");
$result_row = mysqli_fetch_assoc($sqli_cat);

$item = $result_row['subcategory'];

if ($item == @$_GET['items'])  
{

$result = $result_row['category'];
$result = strtolower($result);
$result = ucwords($result);

echo "<a href='#!' style='color: #C82333'>".$result."</a><span style='color: #C82333'>".$result_row['subcategory']."</span>";
$get =$_GET['items'];

}
else

{
  echo "url Error";
}
 ?>

</div>
</div>
</div>
</div>
</div>
</section>

<div class="result">
</div>
          
<!-- ===================================================== -->

<section class="product spad">
<div class="container">
<div class="col-lg-12">

          <!-- Section: Block Content -->

          <!-- Section: Block Content -->
 <div class="result">
    </div>
          <!--Section: Block Content-->
          <section class="refresh">

            <!-- Grid row -->
            <div class="row mb-4">
<!-- Server coding -->
<?php 
// include_once "includes/conn.php";
// 
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
  } else {
    $page_no = 1;
        }

  $total_records_per_page = 1000;//28
    $offset = ($page_no-1) * $total_records_per_page;
  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;
  $adjacents = "2"; 

  // $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `product_table` Where product_status = 'Publish'");
  
$result_count = mysqli_query($conn,  "SELECT COUNT(*) As total_records FROM seller_profile_table 
 join seller_request_table on seller_request_table.seller_id = seller_profile_table.seller_req_id join product_table on seller_request_table.seller_id = product_table.product_seller_id JOIN category_table ON product_table.seller_product_cat = category_table.category_id WHERE  subcategory = '$get' AND product_table.product_status = 'Publish' AND seller_profile_table.account_status = 'Enabled' ORDER BY product_id  DESC LIMIT $offset, $total_records_per_page");

  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1; // total page minus 1

// 

// @$c_query = mysqli_query($conn, "SELECT * FROM product_table JOIN category_table ON product_table.seller_product_cat = category_table.category_id Where product_status = 'Publish' AND subcategory = '$get' ORDER BY product_id  DESC LIMIT $offset, $total_records_per_page");






// ==============test


 $c_query = mysqli_query($conn, "SELECT * FROM seller_profile_table 
 join seller_request_table on seller_request_table.seller_id = seller_profile_table.seller_req_id join product_table on seller_request_table.seller_id = product_table.product_seller_id JOIN category_table ON product_table.seller_product_cat = category_table.category_id WHERE  subcategory = '$get' AND product_table.product_status = 'Publish' AND seller_profile_table.account_status = 'Enabled' ORDER BY product_id  DESC LIMIT $offset, $total_records_per_page");



// ==================









$count = mysqli_num_rows($c_query);
if ($count > 0) {


  while ($row = mysqli_fetch_assoc($c_query))
{

 ?>

<!-- =====================-==================== -->

<!-- Grid column -->
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


if(strlen($p_name) > 27)
{ 
  echo "<h3 class='mb-0' style='font-size: 14px; line-height: 20px;'>".substr($p_name,0,27)."...</h3>";
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
<button type="button" class="btn btn- btn-sm mr-1 waves-effect waves-light" style="background: #dc3545; margin: 0px;" data-toggle="modal" data-target="#modal-order"><i class="fa fa-shopping-cart" style="color:#fff;"><span class="small">&nbsp;Order</span></i></button>
 <?php } ?>




<a href="view_product?item=<?php echo $row['product_code'];?>&id=<?php echo $row['product_id'];?>" type="button" class="btn btn-light btn-sm waves-effect waves-light" style="margin: 0px;"><i class="fa fa-info-circle" style="color: #dc3545;"></i><span class="det">&nbsp;Details</span></a>
</div>

</div>
<!--  -->
</div>
<!-- Card -->
</div>
<!-- ====================-============================== -->




<?php   
} 
}
else
{

?>

 <div class="container" style="height: 200px; background-color: #cfefea; opacity: 0.2; border-radius: 25px; text-align: center;">
  <h2 style="opacity: 0.9; position: absolute;
    top: 40%;
    left: 35%;">Out of Stock</h2>
</div> 


<?php
}





?>
 





          </section>

        </div>
<!-- <div class="col-12 col-md-12 text-center" style="margin: auto;">
<div class="row" style="display: contents; ">
<div class="product__pagination">


  <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'";} if($page_no <= 1){ echo "class='disabled'"; }  ?> ><i class="fa fa-long-arrow-left"></i></a>
       
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
    
 
  <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; }if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?> ><i class="fa fa-long-arrow-right"></i></a>
    <?php if($page_no < $total_no_of_pages){
    echo "<a href='?page_no=$total_no_of_pages'>Last </a>";
    } ?>

</div>


</div>
</div> -->

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
<script src="css/eco/mdb.ecommerce.min.js"></script>
<script src="css/eco/mdb.min.js"></script>
<script src="css/eco/popper.min.js"></script>
<script src="css/notify/notify.js"></script>
<script src="css/notify/notify.min.js"></script>

<?php 
$ref_sql = mysqli_query($conn, "SELECT * FROM order_table");
$ref_row = mysqli_num_rows($ref_sql);


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

$ref_sql = mysqli_query($conn, "SELECT * FROM order_table WHERE customer_order_id ='$o_c_id' AND product_order_id = '$o_p_id' AND order_status != 'Product Delivered' AND order_status != 'Rejected' AND order_status != 'Canceled' ");
$ref_row = mysqli_fetch_array($ref_sql);


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
                $.notify('quantity faild', 'warn');
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

$(document).ready(function(){
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
})

</script>



</body>

</html>