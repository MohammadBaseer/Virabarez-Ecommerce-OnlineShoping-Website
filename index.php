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

<head>
    <meta charset="UTF-8">
    <meta name="description" content="ViraBarez E-commerce Marketplace">
    <meta name="keywords" content="ViraBarez, Marketplace">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | E-commerce Marketplace</title>

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
    <script data-ad-client="ca-pub-2736959751592710" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- google ads -->
    <script data-ad-client="ca-pub-2736959751592710" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <style>
    .h2 h2:after {
        margin: 0px;
    }

    .carousel-inner img {
        width: 100%;
        height: 80%;
    }

    body:not(.modal-open) {
        padding-right: 0px !important;
    }

    .btn-danger {
        color: #fff;
    }

    img.set-bg {
        border-radius: 0px 25px;

    }
    .card-body p{
        display: inline;
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
                <li>
                    <!-- <a href="#"> --><i class="fa fa-shopping-bag"></i> <!-- <span>0</span> -->
                    <!-- </a> -->
                </li>
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
        <!-- ================================================= -->
        <?php 
include_once("header.php");
 ?>
        <!-- ================================================== -->
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
                                <a href="" data-toggle="modal" data-target="#modal-order"><i
                                        class="fa fa-heart"></i></a>

                                <?php } ?>

                            </li>
                            <li>
                                <!-- <a href="#"> --><i class="fa fa-shopping-bag"></i> <!-- <span>0</span> -->
                                <!-- </a> -->
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- ============ -->






    <section class="hero">
        <div class="container">
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
                            <li><a href="all_categories" style="font-weight: bold; color: #dc3545;">All Categories</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form" style="width: 100%;">
                            <form action="search" method="post">
                                <div class="hero__search__categories col-lg-2">
                                    All Categories
                                    <span class=""></span>
                                </div>
                                <input type="text" name="term" placeholder="What do you need?">
                                <button type="submit" name="search" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                    </div>

                    <!-- <div style="border: solid;" class="hero__item set-bg" data-setbg="img/hero/banner.jpg"> -->

                    <div class="">

                        <div class="container">

                            <div id="myCarousel" class="carousel slide">


                                <!-- The slideshow -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="img/hero/hero.png" alt="Los Angeles" width="1100" height="500">
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="categories">

        <div class="container">

            <div class="section-title h2" style="text-align: left;">
                <h2>Random Products</h2>
            </div>

            <div class="row">

                <div class="categories__slider owl-carousel">

                    <?php 
$sql = mysqli_query($conn, "SELECT * FROM seller_profile_table 
 join seller_request_table on seller_request_table.seller_id = seller_profile_table.seller_req_id join product_table on seller_request_table.seller_id = product_table.product_seller_id WHERE  product_table.product_status = 'Publish' AND seller_profile_table.account_status = 'Enabled' ORDER BY RAND()LIMIT 10;");

// $sql = mysqli_query($conn, "SELECT * FROM product_table WHERE  ORDER BY RAND()LIMIT 10;");


while ($row = mysqli_fetch_assoc($sql)) {
  

 ?>

                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="">


                            <img class="categories__item set-bg"
                                src="dashboard/data_files/product_file/<?php echo $row['product_image_1'] ?>" alt="">


                            <h6 class="mb-0"
                                style="position: absolute; top: 0px; margin: 3px; font-size: 1rem; font: menu; "><span
                                    style="padding: 5px; border-radius: 2rem 10rem; width: 85px; background-color: #dc3545 !important"
                                    class="badge badge-primary badge-pill badge-news"><?php echo $row['product_price']; ?>&nbsp;؋
                                </span></h6>


                            <h6 class="mb-0"
                                style="position: absolute; top: 20px; margin: 3px; font-size: 1rem; font: menu; "><span
                                    style="border-radius: 2rem 10rem; background-color: #fe7a70 !important"
                                    class="badge badge-primary badge-pill badge-news">Off
                                    <?php echo $row['product_discount']; ?>&nbsp;؋ </span></h6>


                            <h5><a href="view_product?item=<?php echo $row['product_code'];?>&id=<?php echo $row['product_id'];?>"
                                    class="btn btn-danger btn-sm waves-effect waves-light"
                                    style="background-color:#dc3545; "><i class="fa fa-shopping-cart"
                                        style="color:#fff; ">&nbsp;Order</i></a></h5>
                        </div>
                    </div>
                    <?php 
                  
                  // echo "<pre>";
                  // print_r($row);
                  
                  // echo "</pre";
                  
                  } ?>

                </div>



            </div>
        </div>
    </section>


    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>CATEGORY</h2>
                    </div>

                </div>
            </div>


        </div>
    </section>
    <!-- ---------------------------------------------------------- -->
    <section class="product spad">
        <div class="banner">
            <div class="container">
                <div class="row" style="justify-content: center;">

                    <!--  -->
                    <div class="col-lg-6 col-md-6 col-sm-06 col-12 p-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="display: flex; justify-content: center;
  align-items: center; height: 200px; background-color: #f8ebcb; border-radius: 10px;">
                            <div class="col-md-8 col-lg-8 col-8">
                                <h4 class="texth2" style="text-transform: uppercase; "><strong>Ladies Fashion</strong>
                                </h4>
                                <a href="ladies-fashion-cat" class="btn btn-danger" style="margin: 10px 0px;">VIEW SUB
                                    CATEGORY</a>
                            </div>
                            <img class="col-md-4 col-lg-4 col-4" src="img/banner/copy.png" alt=""
                                style="float: right; width:159px; ">
                        </div>
                    </div>


                    <!--  -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="display: flex; justify-content: center;
  align-items: center; height: 200px; background-color: #f8ebcb; border-radius: 10px;">
                            <div class="col-md-8 col-lg-8 col-8">
                                <h4 class="texth2" style="text-transform: uppercase; "><strong>Ladies Clothing</strong>
                                </h4>
                                <a href="ladies-dress-cat" class="btn btn-danger" style="margin: 10px 0px;">VIEW SUB
                                    CATEGORY</a>
                            </div>
                            <img class="col-md-4 col-lg-4 col-4" src="img/banner/dress.png" alt=""
                                style="float: right; width:159px; ">
                        </div>
                    </div>
                    <!--  -->

                    <!--  -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="display: flex; justify-content: center;
  align-items: center; height: 200px; background-color: #f8ebcb; border-radius: 10px;">
                            <div class="col-md-8 col-lg-8 col-8">
                                <h4 class="texth2" style="text-transform: uppercase;"><strong>Men's Clothing</strong>
                                </h4>
                                <a href="mens-dress-cat" class="btn btn-danger" style="margin: 10px 0px;">VIEW SUB
                                    CATEGORY</a>
                            </div>
                            <img class="col-md-4 col-lg-4 col-4" src="img/banner/man_dress.png" alt=""
                                style="float: right; width:159px; ">
                        </div>
                    </div>


                    <!--  -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="display: flex; justify-content: center;
  align-items: center; height: 200px; background-color: #f8ebcb; border-radius: 10px;">
                            <div class="col-md-8 col-lg-8 col-8">
                                <h4 class="texth2" style="text-transform: uppercase; "><strong>Men's Fashion</strong>
                                </h4>
                                <a href="men-fashion-cat" class="btn btn-danger" style="margin: 10px 0px;">VIEW SUB
                                    CATEGORY</a>
                            </div>
                            <img class="col-md-4 col-lg-4 col-4" src="img/banner/man_fashion.png" alt=""
                                style="float: right; width:159px; ">
                        </div>
                    </div>


                    <!--  -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="display: flex; justify-content: center;
  align-items: center; height: 200px; background-color: #f8ebcb; border-radius: 10px;">
                            <div class="col-md-8 col-lg-8 col-8">
                                <h4 class="texth2" style="text-transform: uppercase; "><strong>Technology</strong></h4>
                                <a href="technology-cat" class="btn btn-danger" style="margin: 10px 0px;">VIEW SUB
                                    CATEGORY</a>
                            </div>
                            <img class="col-md-4 col-lg-4 col-4" src="img/banner/technology.png" alt=""
                                style="float: right; width:159px; ">
                        </div>
                    </div>
                    <!--  -->

                    <!--  -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="display: flex; justify-content: center;
  align-items: center; height: 200px; background-color: #f8ebcb; border-radius: 10px;">
                            <div class="col-md-8 col-lg-8 col-8">
                                <h4 class="texth2" style="text-transform: uppercase; "><strong>Jewelry</strong></h4>
                                <a href="jeweller-cat" class="btn btn-danger" style="margin: 10px 0px;">VIEW SUB
                                    CATEGORY</a>
                            </div>
                            <img class="col-md-4 col-lg-4 col-4" src="img/banner/j_other.png" alt=""
                                style="float: right; width:159px; ">
                        </div>
                    </div>


                    <!--  -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="display: flex; justify-content: center;
  align-items: center; height: 200px; background-color: #f8ebcb; border-radius: 10px;">
                            <div class="col-md-8 col-lg-8 col-8">
                                <h4 class="texth2" style="text-transform: uppercase; "><strong>Home Material</strong>
                                </h4>
                                <a href="home-material-cat" class="btn btn-danger" style="margin: 10px 0px;">VIEW SUB
                                    CATEGORY</a>
                            </div>
                            <img class="col-md-4 col-lg-4 col-4" src="img/banner/home.png" alt=""
                                style="float: right; width:159px; ">
                        </div>
                    </div>
                    <!--  -->

                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="display: flex; justify-content: center;
  align-items: center; height: 200px; background-color: #f8ebcb; border-radius: 10px;">
                            <div class="col-md-8 col-lg-8 col-8">
                                <h4 class="texth2" style="text-transform: uppercase; "><strong>Arts</strong></h4>
                                <a href="arts" class="btn btn-danger" style="margin: 10px 0px;">VIEW SUB CATEGORY</a>
                            </div>
                            <img class="col-md-4 col-lg-4 col-4" src="img/banner/arts.png" alt=""
                                style="float: right; width:159px; ">
                        </div>
                    </div>
                    <!--  -->


                </div>
            </div>
        </div>
    </section>

    <section class="latest-product spad">
        <div class="container">
            <div class="section-title h2" style="text-align: left;">
                <h2>Our Seller</h2>
            </div>
            <div class="row">
                <!-- =========================================================================== -->

                <div class="categories__slider owl-carousel">
                    <!--  -->
                    <?php 
$sql_p = mysqli_query($conn, "SELECT * FROM seller_profile_table 
 join seller_request_table on seller_request_table.seller_id = seller_profile_table.seller_req_id ORDER BY RAND()LIMIT 10;");
// $row = mysqli_fetch_assoc($sql_p);

while ($row1 = mysqli_fetch_assoc($sql_p)) {

 ?>
                    <div class="col-lg-3 col-md-2 col-sm-2">
                        <div class="container">
                            <div class="card" style="border: solid 1px #dc3545;">
                                <img class="card-img-top"
                                    src="dashboard/data_files/logo/<?php echo $row1['seller_logo']; ?>" alt="Card image"
                                    style="width:100%; height: 209px;">
                                <div class="card-body">
                                    <h6 class="card-title">

                                        <?php 
$p_name = $row1['seller_company_title'];


if(strlen($p_name) > 20)
{ 
  echo substr($p_name,0,20)."...";
}
else
{
  echo $p_name;
 
}
 ?>
                                    </h6>
                                    <p class="card-text" style="font-size: 12px;"><strong>About:&nbsp;</strong>

                                        <?php 
$d_name = $row1['seller_details'];


if(strlen($d_name) > 20)
{ 
  echo substr($d_name,0,20)."...";
}
else
{
  echo $d_name;
 
}
 ?>
                                    </p>

                                    <h5 style="text-align: center;"><a
                                            href="seller_product?seller=<?php echo $row1['seller_company_title'];?>&cmp=<?php echo $row1['seller_req_id'];?>"
                                            class="btn btn-danger btn-sm waves-effect waves-light"
                                            style="background-color:#dc3545; ">View</a></h5>


                                </div>
                            </div>
                        </div>

                    </div>
                    <?php 
}
 ?>

                </div>

                <!-- =========================================================================== -->
            </div>
        </div>
    </section>

    <?php include_once "Login_model.php"; ?>
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

    <script>
    $(document).ready(function() {
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    })
// 

    // $(document).ready(function() {
    //     $('.owl-carousel').carousel();
    //     loop: false;
    // });
    // $(document).ready(function() {
    //     // Activate Carousel with a specified interval
    //     $("#myCarousel").carousel();

    //     // Enable Carousel Indicators
    //     $(".item1").click(function() {
    //         $("#myCarousel").carousel(0);
    //     });
    //     $(".item2").click(function() {
    //         $("#myCarousel").carousel(1);
    //     });
    //     $(".item3").click(function() {
    //         $("#myCarousel").carousel(2);
    //     });

    //     // Enable Carousel Controls
    //     $(".carousel-control-prev").click(function() {
    //         $("#myCarousel").carousel("prev");
    //     });
    //     $(".carousel-control-next").click(function() {
    //         $("#myCarousel").carousel("next");
    //     });
    // });
    </script>

</body>

</html>