
<div class="header__top">
<div class="container">
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="header__top__left">
<ul>
<li><i class="fa fa-envelope"></i> <a href="mailto:sales@virabarez.com" style="color: #dc3545" class="__cf_email__" >sales@virabarez.com</a></li>
<li>



<!-- <span><strong><i class="fa fa-phone"></i><a href="tel:+93-706299874" style="color: #dc3545">+93-706299874</a> / <a href="tel:+93-787625935" style="color: #dc3545">+93-787625935</a> </strong> (24/7 Daily)</span> -->


</li>
</ul>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="header__top__right">
<div class="header__top__right__social">
<a href="https://www.facebook.com/virabarez" target="https://www.facebook.com/virabarez"><i class="fa fa-facebook"></i></a>
<a href="https://www.instagram.com/virabarez" target="https://www.instagram.com/virabarez"><i class="fa fa-instagram"></i></a>
</div>

<div class="header__top__right__auth" id="fresh">
<?php 
if(isset($_SESSION['customer_user'])){
 ?>
<div class="header_user_info e-scale" style="padding: 0px; float: none;">
    <a href="#" title="Login Account"><i class="fa fa-user"> <?php echo " ".$auth['customer_name']; ?></i></a>
  <div class="popup-content"  style="text-align: left;">
    <ul class="links list-unstyled">
      
      <li>
        <a href="profile" title="Login"><i class="fa fa-user"></i> Profiles</a>
      </li>
      <li>
        <a href="orders" title="Order"><i class="fa fa-shopping-bag"></i> Order</a>
      </li>
      
      <li>
        <a href="wishlist" title="Wishlist"><i class="fa fa-heart"></i> Wishlist</a>
      </li>
      



      <li>
        <a href="logout" title="LogOut"><i class="fa fa-lock"></i>Logout</a>
      </li>
    </ul>
  </div>
</div>





<?php 
}
else
{
echo "<a href='login'><i class='fa fa-user'></i> Login</a>";
}
 ?>

</div>
</div>
</div>
</div>
</div>
</div>