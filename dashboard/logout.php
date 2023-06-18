<?php
session_start();

if (isset($_SESSION['seller_user']))
{
    unset($_SESSION['seller_user']);
}
echo "<script>window.location='login';</script>";
?>

