<?php
//Database connection
include_once "includes/conn.php";
//insert into database
if(!empty($_POST)) {
 $c_id = $_POST['c_id'];
 
 mysqli_query($conn, "DELETE FROM product_wish WHERE customer_wish_id = '$c_id' "); 
}

echo "<script>$.notify('Removed All Items From Wishlist', 'info');</script>";
?>

