<?php
if(!isset($_COOKIE['userID'])){
    header("location:login.php");
}
else{
$servername = "localhost";
$user = "root";
$password = "";
$database = "ecomm";

$conn = new mysqli($servername, $user, $password, $database);
if(isset($_POST['category_id'])){
    if(isset($_POST['category_id']) && isset($_POST['Category_name']) && isset($_POST['Category_desc'])){
        $category_id=$_POST['category_id'];
        $Category_name=$_POST['Category_name'];
        $Category_desc=$_POST['Category_desc'];
    }
    $sql="SELECT category_id,category_name FROM `category`";
    $result=$conn->query($sql);
    if($result)
    {
        while($row=$result->fetch_assoc())
        {
           if($row['category_id']==$category_id)
           {
                header("location:adminpanel.php?page=1");
           }
        }
        $sql1="INSERT INTO `category`(`category_id`, `Category_name`, `Category_desc`) VALUES ('$category_id','$Category_name','$Category_desc')";
        $result1=$conn->query($sql1);
        if($result1)
        {
            echo "ADDED";
            header("location:adminpanel.php?page=1");
        }
        else
        {
            echo "NOT ADDED";
        }
    }
}
else if(isset($_POST['product_id']))
{
    
}

}
?> 