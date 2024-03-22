<?php
$servername = "localhost";
$user = "root";
$password = "";
$database = "ecomm";

$conn = new mysqli($servername, $user, $password, $database);
if(isset($_POST['category_id'])){
    if(isset($_POST['category_id']) && isset($_POST['Category_name']) && isset($_POST['Category_desc']))
    {
        $category_id=$_POST['category_id'];
        $Category_name=$_POST['Category_name'];
        $Category_desc=$_POST['Category_desc'];
    }
    
    $sql = "UPDATE `category` SET `Category_name`='$Category_name', `Category_desc`='$Category_desc' WHERE `category_id`='$category_id'";
    $result=$conn->query($sql);
    
    if($result)
    {
        echo<<<_END
        <div class="alert alert-success" role="alert">
           Updated
        </div>
        _END;
        header("Location:adminpanel.php?page=1&flag=1");
    }
    else
    {
        echo<<<_END
        <div class="alert alert-success" role="alert">
           NOT Updated
        </div>
        _END;
        header("Location:adminpanel.php?page=1&flag=2");
    }
}
else if(isset($_POST['product_id']))
{
    if(isset($_POST['product_id']) && isset($_POST['Category_id']) && isset($_POST['grp']) && isset($_POST['product_name']) && isset($_POST['product_details']) && isset($_POST['price']))
    {
        $product_id=$_POST['product_id'];
        $Category_id=$_POST['Category_id'];
        $grp=$_POST['grp'];
        $product_name=$_POST['product_name'];
        $product_details=$_POST['product_details'];
        $price=$_POST['price'];
        $actpri=$_POST['actprice'];
    }
    
    $sql = "UPDATE `product` SET `product_id`='$product_id', `Category_id`='$Category_id',`grp`='$grp', `product_name`='$product_name' ,`product_details`='$product_details', `price`='$price',`actual_price`='$actpri' WHERE `product_id`='$product_id'";
    $result=$conn->query($sql);
    
    if($result)
    {
        echo<<<_END
        <div class="alert alert-success" role="alert">
           Updated
        </div>
        _END;
        header("Location:adminpanel.php?page=2&flag=1");
    }
    else
    {
        echo<<<_END
        <div class="alert alert-success" role="alert">
           NOT Updated
        </div>
        _END;
        header("Location:adminpanel.php?page=1&flag=2");
    }
}

if(isset($_GET['header'])=='Product_id' && isset($_GET['value1'])){
    if(isset($_GET['pid']) && isset($_GET['value1']))
    {
        $pid=$_GET['pid'];
        $value=$_GET['value1'];
        $sql="";
        if($value=='Enabled'){
            
            $sql = "UPDATE `product` SET `pro_status`='Disabled' WHERE `product_id`='$pid'";
        }
        else if($value=='Disabled'){
            $sql = "UPDATE `product` SET `pro_status`='Enabled' WHERE `product_id`='$pid'";
        }
        $result=$conn->query($sql);
        header("location:adminpanel.php?page=2");
    }
}
if(isset($_GET['header'])=='Category ID' ){
    if(isset($_GET['pid']) && isset($_GET['value']))
    {
        $pid=$_GET['pid'];
        $value=$_GET['value'];
        $sql="";
        if($value=='Enabled'){
            $sql = "UPDATE `category` SET `cat_status`='Disabled' WHERE `category_id`='$pid'";
        }
        else if($value=='Disabled'){
            $sql = "UPDATE `category` SET `cat_status`='Enabled' WHERE `category_id`='$pid'";
        }
        $result=$conn->query($sql);
        header("location:adminpanel.php?page=1");
    }
}
if(isset($_GET['header'])=='prodesc_ID'){
    if(isset($_GET['pid']) && isset($_GET['value2']))
    {
        $pid=$_GET['pid'];
        $value2=$_GET['value2'];
        $sql="";
        if($value2=='Enabled'){
            $sql = "UPDATE `product_desc` SET `prodesc_status`='Disabled' WHERE `prodesc_ID`='$pid'";
        }
        else if($value2=='Disabled'){
            $sql = "UPDATE `product_desc` SET `prodesc_status`='Enabled' WHERE `prodesc_ID`='$pid'";
        }
        $result=$conn->query($sql);
        header("location:adminpanel.php?page=3");
    }
}
if(isset($_GET['header'])=='cid'){
    if(isset($_GET['pid']) && isset($_GET['value3']))
    {
        $pid=$_GET['pid'];
        $value3=$_GET['value3'];
        $sql="";
        if($value3=='Enabled'){
            $sql = "UPDATE `product_desc` SET `prodesc_status`='Disabled' WHERE `prodesc_ID`='$pid'";
        }
        else if($value3=='Disabled'){
            $sql = "UPDATE `product_desc` SET `prodesc_status`='Enabled' WHERE `prodesc_ID`='$pid'";
        }
        $result=$conn->query($sql);
        header("location:adminpanel.php?page=3");
    }
}
if(isset($_GET['header'])=='offer_id'){
    if(isset($_GET['pid']) && isset($_GET['value4']))
    {
        $pid=$_GET['pid'];
        $value4=$_GET['value4'];
        $sql="";
        if($value4=='Enabled'){
            $sql = "UPDATE `offer` SET `offer_status`='Disabled' WHERE `offer_id`='$pid'";
        }
        else if($value4=='Disabled'){
            $sql = "UPDATE `offer` SET `offer_status`='Enabled' WHERE `offer_id`='$pid'";
        }
        $result=$conn->query($sql);
        header("location:adminpanel.php?page=7");
    }
}
if(isset($_GET['header'])=='user ID'){
    if(isset($_GET['pid']) && isset($_GET['value5']))
    {
        $pid=$_GET['pid'];
        $value5=$_GET['value5'];
        $sql="";
        if($value5=='Active'){
            $sql = "UPDATE `user` SET `usr_status`='Inactive' WHERE `userID`='$pid'";
        }
        else if($value5=='Inactive'){
            $sql = "UPDATE `user` SET `usr_status`='Active' WHERE `userID`='$pid'";
        }
        $result=$conn->query($sql);
        header("location:adminpanel.php?page=5");
    }
}
// elseif()
?>