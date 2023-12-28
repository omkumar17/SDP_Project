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
    }
    
    $sql = "UPDATE `product` SET `product_id`='$product_id', `Category_id`='$Category_id',`grp`='$grp', `product_name`='$product_name' ,`product_details`='$product_details', `price`='$price' WHERE `product_id`='$product_id'";
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
?>