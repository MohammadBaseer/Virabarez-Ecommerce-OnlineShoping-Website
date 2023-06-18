<?php
//Database connection
include_once "includes/conn.php";
//insert into database
if(!empty($_POST)) {
 $o_id = $_POST['o_id'];
 $c_id = $_POST['c_id'];
 

 if(!mysqli_query($conn, "UPDATE order_table SET order_status = 'Rejected' WHERE order_id = '$o_id' AND customer_order_id = '$c_id' "))
 {
// echo "false";
 } 
else
{
echo "<script>$.notify('Order Rejected', 'warn');</script>";
}

}

?>

