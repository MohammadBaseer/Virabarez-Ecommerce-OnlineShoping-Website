  <?php
$seller_req_id = $auth['seller_req_id'];    
$c_user= $auth['seller_company_title'];



if ($auth['seller_right'] == 'Super Admin' || $auth['seller_right'] == 'Admin') {


$sql_sell = mysqli_query($conn, "SELECT * FROM product_table join seller_request_table ON seller_request_table.seller_id = product_table.product_seller_id join order_table ON order_table.product_order_id = product_table.product_id join customer_table ON order_table.customer_order_id = customer_table.customer_id WHERE order_status = 'Pending' ORDER BY order_table.order_id DESC ");


}
else
{

$sql_sell = mysqli_query($conn, "SELECT * FROM product_table join seller_request_table ON seller_request_table.seller_id = product_table.product_seller_id join order_table ON order_table.product_order_id = product_table.product_id join customer_table ON order_table.customer_order_id = customer_table.customer_id WHERE seller_request_table.seller_id = $seller_req_id AND seller_request_table.seller_company_title = '$c_user' AND order_status = 'Pending' ORDER BY order_table.order_id DESC ");

}







$rcount = mysqli_num_rows($sql_sell);
   ?>
  <li class="header-notification">
      <div class="dropdown-primary dropdown">
          <div class="dropdown-toggle" data-toggle="dropdown">
              <i class="feather icon-bell"></i>
              <span id="time1"><?php if ($rcount > 0){echo "<span class='badge bg-c-red'>".$rcount."</span>";}?></span>
          </div>
          <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn"
              data-dropdown-out="fadeOut" class="scrollbar" id="style-13"
              style="overflow: scroll; max-height: 400px;overflow-x: hidden; top: 50px;">
              <li>
                  <h6>Notifications</h6>
                  <span
                      id="time2"><?php if ($rcount > 0){echo "<label class='label label-danger'>New</label>";}?></span>
              </li>
              <!-- <span id="refresh"></span> -->
              <span id="time">
                  <?php while ($row = mysqli_fetch_assoc($sql_sell)) {?>
                  <li>
                      <div class="media">
                          <img class="img-rounded" src="data_files/product_file/<?php echo $row['product_image_1'];?>"
                              alt="Generic placeholder image">
                          <div class="media-body">

                              <?php 
if ($auth['seller_right'] == 'Super Admin' || $auth['seller_right'] == 'Admin') {
 ?>

                              <h5 class="notification-user" style="color: #e5969e;"><span
                                      style="font-weight: bold; color:#dc3545;">Seller:</span>
                                  <?php echo $row['seller_company_title']; ?>
                              </h5>
                              <?php 
}
 ?>

                              <p class="notification-msg"><span style="font-weight: bold;">Product:</span>
                                  <?php echo $row['product_name']; ?></p>

                              <p class="notification-msg"><span style="font-weight: bold;">Code:</span>
                                  <?php echo $row['product_code']; ?></p>

                              <span class="notification-time"><?php echo $row['order_date']; ?></span>
                              <p style="text-align: right; padding: 0px; margin-bottom: 0px;">
                                  <a href="" class="btn btn-danger"
                                      style="border-radius: 5px; color: #fff; background-color: #FF5370;"
                                      onclick="reject_order(event,<?php echo $row['order_id'];?>,<?php echo $row['customer_id'];?>)">Reject</a>
                                  <a class="btn btn-primary " style="border-radius: 5px; color: #fff;"
                                      onclick="order_noti(event,<?php echo $row['order_id'];?>,<?php echo $row['customer_id'];?>)">Conform</a>
                              </p>
                          </div>
                      </div>
                  </li>
                  <?php } ?>
              </span>
              <!--  -->
          </ul>
          <!-- ============================================================ -->
      </div>
  </li>