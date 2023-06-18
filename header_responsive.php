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