<?php
//Database connection
include_once "includes/conn.php";
//insert into database
if(!empty($_POST)) {
 $p_id = $_POST['p_id'];
 $c_id = $_POST['c_id'];
 
 mysqli_query($conn, "DELETE FROM product_wish WHERE product_wish_id = '$p_id' AND customer_wish_id = '$c_id' "); 
}

echo "<script>$.notify('Removed From Wishlist', 'info');</script>";
?>

