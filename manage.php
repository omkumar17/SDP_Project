<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .alert{
            position:absolute;
            top:35px;
            left:30vw;
            line-height:30px;
            height:auto;
            border:1px solid teal;
            border-radius:15px;
            width:40vw;
            background-color:rgba(0,0,0,0.8);
            color:white;
            display:flex;
            flex-direction:row;
            /* justify-content:center; */
            align-items:center;
            padding:10px 10px;
            z-index:100;
            /* opacity:0.5; */

        }
        /* .alert::before{
            content:'';
            position:relative;
            top:0;
            left:0;
            width:100%;
            height:100%;
            opacity:0.5;
            background:black;
        } */
        .alerttext{
            display:flex;
            align-items:center;
            height:100%;
            width:100%;
            padding:5px;
            font-size:20px;
            font-weight:600;
        }
        .crossed{
            float:right;
            font-size:20px;
            font-weight:600;
            cursor:pointer;
        }
    </style>
</head>
<body>
    
</body>
</html>
<?php
include 'connection.php';
if(!isset($_COOKIE['userID'])){
    header("Location:login.php");
}
if(isset($_COOKIE['userID']) && $user!=""){
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
$pid="";
$size="";
$col="";
$quan="";  
$sql="SELECT * FROM cart_tbl WHERE user_id='$user' AND p_quantity!=0";
$result=$conn->query($sql);
if(isset($_GET['paymentmet'])){
    $paymet=$_GET['paymentmet'];
    if($paymet=='c'){
        $ordins="INSERT INTO `order_tbl`(user_id, order_status, order_amount,fname,lname,mobile,email, shipping_address, shipping_status) VALUES ('$user','pending','$total','$fname','$lname','$phone','$email','$addr','processing')";
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
            $ins="INSERT INTO order_detail(order_id, product_id, size, color ,quantity, rate, discount, amount) VALUES ('$order_id','$pid','$size','$col','$quan','$price','$dis','$tot')";
            $rein=$conn->query($ins);
            $sql="SELECT * FROM `product_desc` JOIN `color` ON color.cid=product_desc.cid JOIN `product` ON product.Product_id=color.product_id WHERE product.Product_id='$pid' AND product_desc.size='$size' AND color.color='$col' ";
            $res=$conn->query($sql);
            $row=$res->fetch_assoc();
            $quanty=$row['quantity'];
            $prodescid=$row['prodesc_ID'];
            $orquant=$quanty-$quan;
            $sql="UPDATE `product_desc` SET quantity='$orquant' WHERE prodesc_ID='$prodescid'";
            $res=$conn->query($sql);
            
        }
    }
    $sql="DELETE FROM `cart_tbl` WHERE user_id='$user'";
    $result=$conn->query($sql);
    echo<<<_END
    <div class="alert">
        <div class="alerttext">Order Placed successfully!</div><span class="crossed" >✔</span>
    </div>
    _END;
    
    header("Refresh:2;url=index.php");

}
else
{
    echo<<<_END
    <div class="alert">
        <div class="alerttext">error occured</div><span class="crossed" >✔</span>
    </div>
    _END;
}
}
else{
    header("Location:select.php");
}


?>