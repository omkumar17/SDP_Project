<?php
include_once 'connection.php';
if(isset($_COOKIE['userID'])){
    $userID=$_COOKIE['userID'];
}
echo "welcome". $userID;
if(isset($_GET['id'])){
    $prid=$_GET['id'];
    $quantity=$_GET['quantity'];
    $size=$_GET['size'];
    $color=$_GET['color'];
    $cart=$cart.$prid.",".$quantity.",".$size.",".$color.",";
 }
 echo $cart;
?>