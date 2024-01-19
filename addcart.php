<?php
include_once 'connection.php';

$prid="";
$size="";
$quantity="";
$color="";
if(isset($_COOKIE['userID'])){
    
    $userID=$_COOKIE['userID'];
    if(isset($_GET['id'])){
        $prid=$_GET['id'];
        $quantity=$_GET['quantity'];
        $size=$_GET['size'];
        $color=$_GET['color'];
       
        $sql="INSERT INTO `cart_tbl`(`user_id`, `product_id`, `p_quantity`, `p_color`, `p_size`, `p_discount`) VALUES ('$userID','$prid','$quantity','$color','$size',0)";
        $result=$conn->query($sql);
        
     }
    
}
else{
    header("Location:login.php");
}


 ?>

