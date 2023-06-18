<?php
session_start();

if (isset($_SESSION['customer_user']))
{
    unset($_SESSION['customer_user']);
}
echo "<script>window.location='index';</script>";
?>

