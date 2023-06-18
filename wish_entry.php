<?php
//Database connection
include_once "includes/conn.php";
//insert into database
if(!empty($_POST)) {
 $p_id = $_POST['p_id'];
 $c_id = $_POST['c_id'];
 
$ref_sql = mysqli_query($conn, "SELECT * FROM product_wish WHERE product_wish_id ='$p_id' AND customer_wish_id = '$c_id' ");
$ref_row = mysqli_fetch_assoc($ref_sql);



if($ref_row['product_wish_id'] == "$p_id" AND $ref_row['customer_wish_id'] == "$c_id"){


echo "<script>$.notify('Already in Wishlist', 'error');</script>";
}
else
{


 mysqli_query($conn, "INSERT INTO product_wish (`product_wish_id`, `customer_wish_id`) values ('$p_id', '$c_id')"); 
 

}



echo "<script>$.notify('Added To Wishlist', 'success');</script>";


}



?>