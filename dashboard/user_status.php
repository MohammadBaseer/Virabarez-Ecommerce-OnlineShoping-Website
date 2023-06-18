
<?php
include_once "includes/conn.php";
@$lock = $_REQUEST['lock'];
// 
@$us_type = $_REQUEST['us_type'];
// 
@$unlock = $_REQUEST['unlock'];

@$s_lock = $_REQUEST['lock'];
// 
@$usr_type = $_REQUEST['usr_type'];
// 

@$s_unlock = $_REQUEST['unlock'];

// 
if (@$lock = $_REQUEST['lock']) {




if ($us_type = 'Seller' ) {

   $sql ="UPDATE seller_profile_table SET seller_status = 'lock' WHERE seller_req_id = '$lock' ";
   mysqli_query($conn,$sql);
   echo "<script>window.location = 'users';</script>"; 
}

else
{
   echo "<script>alert('Super Admin/Admin Cant Lock');</script>";
   echo "<script>window.location = 'users';</script>";
}
     
}
elseif (@$unlock = $_REQUEST['unlock']) {
   $sql ="UPDATE seller_profile_table SET seller_status = 'unlock' WHERE seller_req_id = '$unlock' ";\
   mysqli_query($conn,$sql);
   echo "<script>window.location = 'users';</script>";
   exit();
   
}
// ===
elseif (@$s_lock = $_REQUEST['s_lock']) {








if ($usr_type = 'Seller' ) {
   $sql ="UPDATE seller_profile_table SET seller_status = 'lock' WHERE seller_req_id = '$s_lock' ";
   mysqli_query($conn,$sql);
   echo "<script>window.location = 'our_seller';</script>";
}

else
{
   echo "<script>alert('Super Admin/Admin Cant Lock');</script>";
   echo "<script>window.location = 'users';</script>";
}
 











}






elseif (@$s_unlock = $_REQUEST['s_unlock']) {
   $sql ="UPDATE seller_profile_table SET seller_status = 'unlock' WHERE seller_req_id = '$s_unlock' ";\
   mysqli_query($conn,$sql);
   echo "<script>window.location = 'our_seller';</script>";
   exit();
   
}
// ====


else
{
    echo $err = "faild";
}

 ?>
