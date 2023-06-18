<?php
//Database connection
include_once "includes/conn.php";
//insert into database
if(!empty($_POST)) {
 $o_id = $_POST['o_id'];
 $c_id = $_POST['c_id'];
 $p_id = $_POST['p_id'];

 mysqli_query($conn, "UPDATE order_table SET order_status = 'Canceled' WHERE order_id = '$o_id' AND product_order_id = '$p_id' AND customer_order_id = '$c_id' "); 
}

echo "<script>$.notify('Order Canceled', 'warn');</script>";
?>

