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
    $addr=$_GET['addr'];
    $total=$_GET['total'];
}   
$sql="SELECT * FROM cart_tbl WHERE user_id='$user' AND p_quantity!=0";
$result=$conn->query($sql);
if(isset($_GET['paymentmet'])){
    $paymet=$_GET['paymentmet'];
    if($paymet=='c'){
        $ordins="INSERT INTO `order_tbl`(user_id, order_status, order_amount, shipping_address, shipping_status) VALUES ('$user','pending','$total','$addr','processing')";
        $orderres=$conn->query($ordins);
        $ordsel="SELECT order_id FROM `order_tbl` WHERE user_id='$user' ORDER BY order_id DESC LIMIT 1";
        $selres=$conn->query($ordsel);
        $row=$selres->fetch_assoc();
        $order_id=$row['order_id'];
        while($row=$result->fetch_assoc()){
            $pid=$row['product_id'];
            $quan=$row['p_quantity'];
            $col=$row['p_color'];
            $size=$row['p_size'];
            $dis=$row['p_discount'];
            $sqljoi="SELECT price FROM `product` WHERE product_id='$pid'";
            $resjoi=$conn->query($sqljoi);
            $row=$resjoi->fetch_assoc();
            $price=$row['price'];
            $tot=($quan*$price)-$dis;
            $ins="INSERT INTO order_detail(order_id, product_id, quantity, rate, discount, amount) VALUES ('$order_id','$pid','$quan','$price','$dis','$tot')";
            $rein=$conn->query($ins);
        }
    }
    $sql="DELETE FROM `cart_tbl` WHERE user_id='$user'";
    $result=$conn->query($sql);
    echo "Order Placed Successfully";
    header("Refresh:2;url=index.php");
}
else
{
    echo "sfffffffffffffffffffffffffff";
}
?>