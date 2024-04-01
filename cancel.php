<?php
include 'connection.php';
?>
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
    <?php


if(!(isset($_POST['oid']) && isset($_POST['cancel']) && isset($_POST['type']))&&isset($_POST['amt'])){
    header("Location:index.php");
}

$oid=$_POST['oid'];
$cancel=$_POST['cancel'];
$type=$_POST['type'];
$amt=$_POST['amt'];

$sql="UPDATE `order_tbl` SET `order_status`='$type' WHERE `order_id`=$oid";
$result=$conn->query($sql);
if($type=="cancel"){
$sql="INSERT INTO `refund`( `order_id`, `refund_date`, `refund_reason`, `refund_amt`, `refund_status`) VALUES ('$oid','','$cancel',$amt,'pending')";
$result=$conn->query($sql);
}

echo<<<_END
        <div class="alert">
        <div class="alerttext">Initiated {$type} request for your order </div><span class="cross" onclick="cross()">✔</span>
        </div>
_END;
header("refresh:3;url=customerpanel.php");

?>
