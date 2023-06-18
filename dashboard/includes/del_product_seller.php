<?php 
include_once "conn.php";
$pro_id = $_GET['pro'];
// echo "<br>";



$sqll1 = "DELETE FROM product_table WHERE product_id ='$pro_id'  ";
// 2
$sqll2 = "DELETE FROM  product_review WHERE product_review_id ='$pro_id'  ";
// 3
$sqll3 = "DELETE FROM  product_wish WHERE product_wish_id ='$pro_id'  ";
// 4
$sqll4 = "DELETE FROM  order_table WHERE product_order_id ='$pro_id'  ";
// =============

$sqli = mysqli_query($conn, "SELECT * FROM product_table WHERE product_id ='$pro_id' ");
$row = mysqli_fetch_assoc($sqli);
 if (@$row['product_image_1'] || $row['product_image_2'] || $row['product_image_3'] || $row['product_image_4'] ) {
 	$img1 = $row['product_image_1'];
 	$img2 = $row['product_image_2'];
 	$img3 = $row['product_image_3'];
 	$img4 = $row['product_image_4'];
 	unlink("../data_files/product_file/$img1");
 	@unlink("../data_files/product_file/$img2");
 	@unlink("../data_files/product_file/$img3");
 	@unlink("../data_files/product_file/$img4");
 }


if (@mysqli_query($conn,$sqll1)) {
echo "<script>window.history.back();</script>";
}
if (@mysqli_query($conn,$sqll2)) {
echo "<script>window.history.back();</script>";
}
if (@mysqli_query($conn,$sqll3)) {
echo "<script>window.history.back();</script>";
}
if (@mysqli_query($conn,$sqll4)) {
echo "<script>window.history.back();</script>";
}
else
{
echo "Error";
}

 ?>