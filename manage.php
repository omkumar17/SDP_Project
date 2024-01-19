<?php
include 'connection.php';
if(isset($_GET['fname']) && isset($_GET['lname']) && isset($_GET['phone']) && isset($_GET['email'])){
    $fname=$_GET['fname'];
    $lname=$_GET['lname'];
    $email=$_GET['email'];
    $phone=$_GET['phone'];
    $city=$_GET['city'];
    $state=$_GET['state'];
    $zip=$_GET['zip'];
    $paymet=$_GET['paymentmet'];
    $term=$_GET['term'];
}
$sql="SELECT * FROM `cart_tbl` WHERE user_id='$user' AND p_quantity!=0";
$result=$conn->query($sql);
if(isset($_POST['paymentmet'])){
    $paymet=$_POST['paymentmet'];
    if($paymet=='c'){
        $ordins="INSERT INTO `order_tbl`(`user_id`, `order_date`, `order_status`, `order_amount`, `shipping_address`, `shipping_status`) VALUES ('[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')"
        while($row=$result->fetch_assoc()){
            $pid=$row['product_id'];
            $quan=$row['p_quantity'];
            $col=$row['p_color'];
            $size=$row['p_size'];
            $dis=$row['p_discount'];
            $ins="INSERT INTO `order_detail`(`order_id`, `product_id`, `quantity`, `rate`, `discount`, `amount`) VALUES ('[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')"

        }
    }
}
?>