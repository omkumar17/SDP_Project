<!DOCTYPE html>
<html lang="en">
<?php
include 'connection.php';
if($user!=1){
    header("location:login.php");
}
// echo $user;
$page = 0;
$flag = 0;
$proquery="SELECT COUNT(Product_id) FROM `product`";
$prores=$conn->query($proquery);
$row=$prores->fetch_assoc();

$catquery="SELECT COUNT(category_id) FROM `category`";
$catres=$conn->query($catquery);
$row1=$catres->fetch_assoc();
if(isset($_GET['page'])){
    $page=$_GET['page'];    
}
if(isset($_GET['flag'])){
    $flag=$_GET['flag'];   
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="adminpanel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:Arial, Helvetica, sans-serif;
}
.adminnavbar{
    height:50px;
    width:100%;
    /* margin-bottom: 20px; */
}
.navcontainer{
    height:100%;
    width:100%;
    display:flex;
    flex-direction: row;
    background-color: teal;
    color:white;
    
}
.navitems{
    height:100%;
    padding: 5px;
}
.head{
    height:100%;
    width:auto;
    color:white;
    text-align: center;
    /* margin:auto; */
    margin-left: 10px;
    padding-top: 10px;
    font-weight: 600;
    font-size: 25px;
}
.amenu{
    visibility: hidden;
    margin-left: 2%;
}
.menuimg{
    height:90%;
    padding-top: 2px;
    cursor: pointer;
}
.login{
    margin-right:20px;
    cursor: pointer;
}
.admin{
    display:flex;
    flex-direction: row;
    align-items:center ;
    width:auto;
    margin-right: 20px;
    margin-left: auto;
    /* justify-content: flex-end; */

}
.bodypage{
    height:100%;
    width:100%;
    display:flex;
    flex-direction: row;
}
.sidebar{
    width:15%;
    height:93vh;
    background-color: teal;
}
.sidecontainer{
    height:100%;
    width:100%;
    background-color: teal;
    color:white;
    /* padding: 20px 10px 10px 0px; */
    /* padding-right: 10px; */
    padding-left: 0px;
    border-right: 2px solid black;
}

.sideitem1{
    width:calc(100%-10px);
    height:45px;
    /* border:2px solid white; */
    /* text-align:center; */
    padding:10px 0px;
    padding-left: 10px;
    font-size: 14px;
    background-color: teal;
    display: flex;
    align-items: center;
    cursor: pointer;
    margin:0px 0px 5px 0px;
    /* overflow-x:hidden */
}

.sideimg{
    height:65%;
    width:15px;
    margin: 10px 10px 10px 0px;
}
.subprod{
    background-color:black;
    margin: 0;
    padding: 0;
    padding-left: 20px;
    font-size:14px;
    display:none;
}
.main{
    width:85%;
    height:93vh;
    background-color:white;

}
.mainpage{
    height:100%;
    width:100%;
    display:none;

    /* overflow-y: scroll;
    overflow-x:scroll; */
}
.heading{
    height:55px;
    width:85%;
    font-size: 35px;
    padding:  10px 20px 20px 20px;
}
.mainitemcont{
    /* height:100%; */
    padding-left: 10px;
    width:100%;
    display:grid;
    grid-template-columns:auto auto auto auto;
}
.maincontent{
    height:120px;
    /* width:290px; */
    /* background-color: bisque; */
    margin: 10px;
    border-radius: 5px;
    display: flex;
    flex-direction: row;
}
.subcontent{
    width:75%;
    height:100%;
    color:white;
}
.count{
    width:100%;
    height:50%;
    padding:10px 10px 10px 20px;
    font-size:50px;
    font-weight: 500;
    /* text-align: center; */
}
.counttitle{
    width:100%;
    height:50%;
    padding: 15px 10px 10px 20px;
    font-size:18px;
    font-weight: 500;
    /* text-align: center; */
}
.contimg{
    width:25%;
    height:100%;
}
.cmcontainer{
    padding: 0 20px 30px 20px;
    overflow-y:scroll;
    overflow-x:scroll;
    height:100%;
}
.cmheader{
    height:55px;
    /* font-size: 35px; */
    padding:  20px 20px 60px 0px;
    /* margin-bottom: 20px; */
    display:flex;
    flex-direction: row;
    /* flex-wrap: wrap; */
    align-items: center;
    border-bottom: 2px solid black;
    
}
.cmheader .heading{
    padding-left: 0;
}
.add{
    color:white;
    background-color: rgb(29, 1, 1);
    height:40px;
    width:140px;
    /* text-align: center; */
    margin-top: 30px;
    /* width:100px; */
    font-size: 14px;
    padding: 10px 20px;
    border-radius: 15px;
    cursor: pointer;
}
.button{
    color:white;
    background-color: red;
    /* height:20px; */
    /* width:50px; */
    padding: 2px;
    margin: 5px;
    border:1px solid black;
    border-radius: 4px;
    cursor: pointer;
}
.editor{
    display:none;
    height:250px;
    width:250px;
    background-color: blue;
    position:absolute;
    top:0;
    left:auto;
    right:auto;
}
.formcontainer,.addcontainer{
    display:none;
    position:absolute;
    /* top:0; */
    left:15%;
    background-color: white;
    /* height:500px;
    width:500px; */
    z-index: 10;
    border: 2px solid teal;

    /* box-shadow: 2px 2px 30px black; */
    display:flex;
    align-items: center;
    justify-content: center;
    /* padding: 20px; */
}
.formcontainer,.addcontainer{
    display:none;
    position:absolute;
    top:50px;
    background-color: white;
    height:calc(100% - 50px);
    width:calc(85%);
    z-index: 10;
    overflow-y:scroll;
}
.addcat,.addcont{

    width:90%;
    height:95%;
    margin:2.5% 5%;
   }
   .label{
       display:block;
       margin: 5px 10px;
       padding: 5px;
   }
   .input{
       display:block;
       margin: 5px 10px;
       padding: 5px;
       width:90%;
   }
   .submit,.submita{
       display:inline-block;
       width:80px;
       height:40px;
       margin: 10px;
       color:white;
       background:blue;
   }

   .cancel,.cancela{
       display:inline-block;
       width:80px;
       height:40px;
       margin: 10px;
       margin-right: 10px;
       margin-left: auto;
       color:white;
       background:red;
   }
   .cancel:hover,.submit:hover,.cancela:hover,.submita:hover{
       background-color: teal;
   }
   .tblimg{
    height:80px;
    width:100px;
   }
@media only screen and (max-width:1347px){
    .amenu{
        visibility: visible;
    }
    .sidebar{
        position:absolute;
        width:200px;
        display:none;
        z-index:1;
    }
    .sview{
        display:block;
    }
    .main{
        width:100%;
    }
    .mainitemcont{
        
        grid-template-columns:auto auto auto;
    }

}
@media only screen and (max-width:800px){
    .mainitemcont{
        grid-template-columns:auto auto;
    }
}
@media only screen and (max-width:500px){
    .mainitemcont{
        width:90vw;
        margin-right: 5%;
        margin-left: 5%;
        grid-template-columns:auto;
    }
    .head{
        height:100%;
        width:auto;
        color:white;
        text-align: center;
        /* margin:auto; */
        margin-left: 10px;
        padding-top: 10px;
        font-weight: 600;
        font-size: 15px;
    }
}
.logindrop{
    display:none;
    position:absolute;
    top:50px;
    /* height:100px; */
    width:100px;
    background-color:white;
    border:1px solid teal;
    /* display:block; */
    z-index:10;

}
.logindrop a{
    list-style:none;
    text-decoration:none;
    color:teal;
    /* margin: 2px; */
    text-align:center;
    /* background-color:red; */
    border:1px solid teal;
    /* width:100px; */
    display:block;
    /* padding: 1px; */
}
.logindrop a li{
    padding:5px;
}
.visible{
       display:block;
        visibility:visible;    
        opacity: 1;
    }
    @media only screen and (max-width:1068px){
        .logindrop{
            top:110px;
        } 
        .shopping-cart {
            display:none;
        }
    }
    @media only screen and (max-width:600px){
        .logindrop{
            top:70px;
        } 
    }

</style>
</head>

<body>
    <section class="adminnavbar">
        <div class="navcontainer">
            <div class="navitems head">Admin Panel</div>
            <div class="navitems amenu"><img src="public/img/menu.png" alt="" class="menuimg"></div>
            <div class="navitems admin">
                <div class="login" onclick="logfunction()"><img src="public/img/log-out.png" alt="" class="logimg"></div>
                <div class="subtitle" >Administrator</div>
                <div class="logindrop" style="width:120px">
                            <?php
                            if(isset($_COOKIE['userID'])){
                                ?>
                                <a href="user.html"><li><img src="public\img\circle-user-round.png" alt="">&nbsp;&nbsp; Profile</li></a>
                                <a href="logout.php"><li><img src="public\img\log-out-profile.png" alt="">&nbsp;&nbsp; Logout</li></a>
                                <?php
                            }
                            ?>
                            
                        </div>
            </div>
        </div>
    </section>
    <section class="bodypage">
        <section class="sidebar">
            <ul class="sidecontainer">
                <li class="sideitem1 sideitem"><img src="layout-dashboard.png" alt="" class="sideimg"><span class="itemdesc">Dashboard</span></li>
                <li class="sideitem1 sideitem"><img src="layers-3.png" alt="" class="sideimg"><span class="itemdesc">Category
                        Management</span>
                </li>
                <li class="sideitem1" id="prod"><img src="shopping-bag.png" alt="" class="sideimg"><span class="itemdesc">Product Management</span>
                </li>
                <li class="sideitem1 sideitem subprod"><img src="shopping-cart (1).png" alt="" class="sideimg" style="height:50%;width:20px;"><span class="itemdesc">Product</span></li>
                 <li class="sideitem1 sideitem subprod"><img src="book-text.png" alt="" class="sideimg" style="height:50%; width:20px;"><span class="itemdesc">Product description</span></li> 
                 <li class="sideitem1 sideitem subprod"><img src="crop.png" alt="" class="sideimg" style="height:50%;width:20px;"><span class="itemdesc">Image</span></li> 
                 <li class="sideitem1 sideitem subprod"><img src="palette.png" alt="" class="sideimg" style="height:50%;width:20px;"><span class="itemdesc">Color</span></li>

                <li class="sideitem1 " id="prod1"><img src="book-check.png" alt="" class="sideimg"><span class="itemdesc">Order Management</span></li>
                <li class="sideitem1 sideitem subprod"><img src="list-ordered.png" alt="" class="sideimg" style="height:50%;width:20px;"><span class="itemdesc">Orders</span></li> 
                 <li class="sideitem1 sideitem subprod"><img src="book-user.png" alt="" class="sideimg" style="height:50%;width:20px;"><span class="itemdesc">Order Details</span></li>

                <li class="sideitem1 sideitem"><img src="file-question.png" alt="" class="sideimg"><span class="itemdesc">Feedback</span></li>
                <li class="sideitem1 sideitem"><img src="user-round-plus.png" alt="" class="sideimg"><span class="itemdesc">Customer
                        Management</span>
                </li>
                <li class="sideitem1 sideitem"><img src="badge-indian-rupee.png" alt="" class="sideimg"><span class="itemdesc">Refund</span></li>
                <li class="sideitem1 sideitem"><img src="badge-percent.png" alt="" class="sideimg"><span class="itemdesc">Offer</span></li>
                <li class="sideitem1 sideitem"><img src="paym.png" alt="" class="sideimg"><span class="itemdesc">Payment</span></li>
                <!-- <li class="sideitem1 sideitem"><img src="" alt="" class="sideimg"><span class="itemdesc"></span></li>
            <li class="sideitem1 sideitem"><img src="" alt="" class="sideimg"><span class="itemdesc"></span></li>
            <li class="sideitem1 sideitem"><img src="" alt="" class="sideimg"><span class="itemdesc"></span></li> -->
            </ul>
        </section>
        <section class="main">
            <div class="mainpage" id="dbpage">
                <div class="heading">Dashboard</div>
                <div class="mainitemcont">
                    <div class="maincontent" style="background:rgb(88, 88, 255)">
                        <div class="subcontent">
                            <div class="count"><?php echo $row['COUNT(Product_id)']; ?></div>
                            <div class="counttitle">Products</div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                    <div class="maincontent" style="background:rgb(255, 37, 37)">
                        <div class="subcontent">
                            <div class="count">0</div>
                            <div class="counttitle">Pending Orders</div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                    <div class="maincontent" style="background:rgb(169, 251, 45)">
                        <div class="subcontent">
                            <div class="count">4</div>
                            <div class="counttitle">Completed Orders</div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                    <div class="maincontent" style="background:rgb(4, 230, 255)">
                        <div class="subcontent">
                            <div class="count">3</div>
                            <div class="counttitle">Completed Shipping</div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                    <div class="maincontent" style="background:rgb(255, 166, 0)">
                        <div class="subcontent">
                            <div class="count">1</div>
                            <div class="counttitle">Pending Shipping</div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                    <div class="maincontent" style="background:rgb(255, 105, 240)">
                        <div class="subcontent">
                            <div class="count">10</div>
                            <div class="counttitle">Active Customers</div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                    <div class="maincontent" style="background:rgb(213, 213, 51)">
                        <div class="subcontent">
                            <div class="count">6</div>
                            <div class="counttitle">Subscriber</div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                    <div class="maincontent" style="background:rgb(0, 183, 67)">
                        <div class="subcontent">
                            <div class="count">4</div>
                            <div class="counttitle">Total Shippings</div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                    <div class="maincontent" style="background:rgb(56, 112, 255)">
                        <div class="subcontent">
                            <div class="count"><?php echo $row1['COUNT(category_id)']; ?></div>
                            <div class="counttitle">Categories</div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                    <div class="maincontent" style="background:rgb(249, 41, 26)">
                        <div class="subcontent">
                            <div class="count"></div>
                            <div class="counttitle"></div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                    <div class="maincontent" style="background:rgb(127, 74, 252)">
                        <div class="subcontent">
                            <div class="count"></div>
                            <div class="counttitle"></div>
                        </div>
                        <div class="contimg"></div>
                    </div>
                </div>
            </div>
            <div class="mainpage" id="cmpage">
                <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">Categories</div>
                        <div class="add">Add Category</div>
                    </div>
                    <?php
                    // $servername = "localhost";
                    // $user = "root";
                    // $password = "";
                    // $database = "ecomm";

                    // $conn = new mysqli($servername, $user, $password, $database);
                    $sql = "SELECT * FROM `category`"; 
                    $result = $conn->query($sql);
                    $row="";
                   
                    if ($result) {
                        echo <<< _END
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>category_id</th>
                                    <th>Category_name</th>
                                    <th>Category_desc</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                    _END;
                 
                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    <td>{$row['category_id']}</td>
                                    <td>{$row['Category_name']}</td>
                                    <td>{$row['Category_desc']}</td>
                                    <td><span class="button edit">Edit</span><span class="button">Disable</span></td>
                                </tr>
                    _END;
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    // $result2=$conn->query("SELECT * FROM category WHERE category_id='"cat_id");
                    // $row2=$result2->fetch_assoc();
                    ?>
                    <div class="formcontainer">
                    <form class="addcat" action="update.php" method="POST">
                        <label for="" style="font-size:20px;font-weight:600">Category Details</label>
                        <label for="cat-id" class="label">Category Id</label>
                        <input type="text" id="cat-id" class="input" name="category_id">
                        <label for="cat-name" class="label">Category Name</label>
                        <input type="text" id="cat-name" class="input" name="Category_name" >
                        <label for="cat-desc" class="label">Category desc</label>
                        <input type="text" id="cat-desc" class="input" name="Category_desc" >
                        <input type="submit" class="submit" value="submit">
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                    <div class="addcontainer">
                    <form class="addcont" action="insert.php" method="POST">
                        <label for="" style="font-size:20px;font-weight:600">Add Category Details</label>
                        <label for="cat-id" class="label">Category Id</label>
                        <input type="text" id="cat-id" class="input" name="category_id">
                        <label for="cat-name" class="label">Category Name</label>
                        <input type="text" id="cat-name" class="input" name="Category_name" >
                        <label for="cat-desc" class="label">Category desc</label>
                        <input type="text" id="cat-desc" class="input" name="Category_desc" >
                        <input type="submit" class="submita" value="submit">
                        <input type="submit" class="cancela" value="Cancel">
                    </form>
                    </div>
                   
                </div>
            </div>
            <div class="mainpage" id="pmpage">
            <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">Product</div>
                        <div class="add">Add product</div>
                    </div>
                <?php
                    $sql = "SELECT * FROM `product`"; 
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="product" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Product_id</th>
                                    <th>Category_ID</th>
                                    <th>grp</th>
                                    <th>product_name</th>
                                    <th>product_details</th>
                                    <th>price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    <td>{$row['Product_id']}</td>
                                    <td>{$row['Category_ID']}</td>
                                    <td>{$row['grp']}</td>
                                    <td>{$row['product_name']}</td>
                                    <td>{$row['product_details']}</td>
                                    <td>{$row['price']}</td>
                                    <td><span class="button edit">Edit</span><span class="button">Disable</span></td>
                                </tr>
                             _END;
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    
                    ?>
                    <div class="formcontainer">
                    <form class="addcat" action="update.php" method="POST">
                       <label for="" style="font-size:20px;font-weight:600">Product Details</label>
                        <label for="prod-id" class="label">Product Id</label>
                        <input type="text" id="prod-id" class="input" name="product_id" >
                        <label for="catg_id" class="label">Category Id</label>
                        <input type="text" id="catg_id" class="input" name="Category_id">
                        <label for="grp" class="label">Group</label>
                        <input type="text" id="grp" class="input" name="grp" >
                        <label for="prod_name" class="label">Product name</label>
                        <input type="text" id="prod_name" class="input" name="product_name" >
                        <label for="prod_det" class="label">Product Detail</label>
                        <input type="text" id="prod_det" class="input" name="product_details" >
                        <label for="pprice" class="label">Price</label>
                        <input type="text" id="pprice" class="input" name="price" >
                        <input type="submit" class="submit" value="submit" >
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                    <div class="addcontainer">
                    <form class="addcont" action="insert.php" method="POST">
                        <label for="" style="font-size:20px;font-weight:600">ADD Product Details</label>
                        <label for="prod-id" class="label">Product Id</label>
                        <input type="text" id="prod-id" class="input" name="product_id" >
                        <label for="catg_id" class="label">Category Id</label>
                        <input type="text" id="catg_id" class="input" name="Category_id">
                        <label for="grp" class="label">Group</label>
                        <input type="text" id="grp" class="input" name="grp" >
                        <label for="prod_name" class="label">Product name</label>
                        <input type="text" id="prod_name" class="input" name="product_name" >
                        <label for="prod_det" class="label">Product Detail</label>
                        <input type="text" id="prod_det" class="input" name="product_details" >
                        <label for="pprice" class="label">Price</label>
                        <input type="text" id="pprice" class="input" name="price" >
                        <input type="submit" class="submita" value="submit" >
                        <input type="submit" class="cancela" value="Cancel">
                    </form>
                    </div>
                    
            </div>
            </div>
            
            <div class="mainpage" id="pmpage">
            <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">Product Description</div>
                        <div class="add">Add product DESC</div>
                    </div>
                <?php
                    $sql = "SELECT * FROM `product_desc`"; 
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="product" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>prodesc_ID</th>
                                    <th>cid</th>
                                    <th>product_type</th>
                                    <th>size</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    <td>{$row['prodesc_ID']}</td>
                                    <td>{$row['cid']}</td>
                                    <td>{$row['product_type']}</td>
                                    <td>{$row['size']}</td>
                                    <td><span class="button edit">Edit</span><span class="button">Disable</span></td>
                                </tr>
                             _END;
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    ?>
                    <div class="formcontainer">
                    <form class="addcat" action="update.php" method="post">
                        <label for="" style="font-size:20px;font-weight:600">Product Description</label>
                        <label for="proddesc-id" class="label">	prodesc_ID </label>
                        <input type="text" id="proddesc-id" class="input" name="prodesc_ID" >
                        <label for="color_id" class="label">	cid</label>
                        <input type="text" id="color_id" class="input" name="cid">
                        <label for="pro_type" class="label">product_type</label>
                        <input type="text" id="pro_type" class="input" name="product_type" >
                        <label for="size" class="label">size</label>
                        <input type="text" id="size" class="input" name="size" >
                        <input type="submit" class="submit" value="submit" >
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                    <div class="addcontainer">
                    <form class="addcont" action="insert.php" method="post">
                    <label for="" style="font-size:20px;font-weight:600">add Product Description</label>
                    <label for="proddesc-id" class="label">	prodesc_ID </label>
                        <input type="text" id="proddesc-id" class="input" name="prodesc_ID" >
                        <label for="color_id" class="label">	cid</label>
                        <input type="text" id="color_id" class="input" name="cid">
                        <label for="pro_type" class="label">product_type</label>
                        <input type="text" id="pro_type" class="input" name="product_type" >
                        <label for="size" class="label">size</label>
                        <input type="text" id="size" class="input" name="size" >
                        <input type="submit" class="submita" value="submit" >
                        <input type="submit" class="cancela" value="Cancel">
                    </form>
                    </div>
                    
            </div>
            </div>
            <div class="mainpage" id="pmpage">
            <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">image</div>
                        <div class="add">Add Image</div>
                    </div>
                <?php
                    $sql = "SELECT * FROM `image`"; 
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="product" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image_ID</th>
                                    <th>cid</th>
                                    <th>Image_path1</th>
                                    <th>Image_path2</th>
                                    <th>Image_path3</th>
                                    <th>Image_path4</th>
                                    <th>Image_desc</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    <td>{$row['Image_ID']}</td>
                                    <td>{$row['cid']}</td>
                                    <td><img src="{$row['Image_path1']}" class="tblimg"><br>{$row['Image_path1']}</td>
                                    <td><img src="{$row['Image_path2']}" class="tblimg"><br>{$row['Image_path2']}</td>
                                    <td><img src="{$row['Image_path3']}" class="tblimg"><br>{$row['Image_path3']}</td>
                                    <td><img src="{$row['Image_path4']}" class="tblimg"><br>{$row['Image_path4']}</td>
                                    <td>{$row['Image_desc']}</td>
                                    <td><span class="button edit">Edit</span><span class="button">Disable</span></td>
                                </tr>
                             _END;
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    ?>
                    <div class="formcontainer">
                    <form class="addcat" action="update.php" method="post">
                        <label for="" style="font-size:20px;font-weight:600">IMAGE</label>
                        <label for="img_id" class="label">	Image_ID</label>
                        <input type="text" id="img_id" class="input" name="Image_ID" >
                        <label for="col_id" class="label">cid</label>
                        <input type="text" id="col_id" class="input" name="cid">
                        <label for="p1" class="label">Image_path1</label>
                        <input type="text" id="p1" class="input" name="Image_path1" >
                        <label for="p2" class="label">Image_path2</label>
                        <input type="text" id="p2" class="input" name="Image_path2" >
                        <label for="p3" class="label">Image_path3</label>
                        <input type="text" id="p3" class="input" name="Image_path3" >
                        <label for="p4" class="label">Image_path4</label>
                        <input type="text" id="p4" class="input" name="Image_path4" >
                        <label for="img_desc" class="label">Image_desc</label>
                        <input type="text" id="img_desc" class="input" name="Image_desc" >
                        <input type="submit" class="submit" value="submit" >
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                    <div class="addcontainer">
                    <form class="addcont" action="insert.php" method="post">
                    <label for="" style="font-size:20px;font-weight:600">ADD IMAGE</label>
                        <label for="img_id" class="label">	Image_ID</label>
                        <input type="text" id="img_id" class="input" name="Image_ID" >
                        <label for="col_id" class="label">cid</label>
                        <input type="text" id="col_id" class="input" name="cid">
                        <label for="p1" class="label">Image_path1</label>
                        <input type="text" id="p1" class="input" name="Image_path1" >
                        <label for="p2" class="label">Image_path2</label>
                        <input type="text" id="p2" class="input" name="Image_path2" >
                        <label for="p3" class="label">Image_path3</label>
                        <input type="text" id="p3" class="input" name="Image_path3" >
                        <label for="p4" class="label">Image_path4</label>
                        <input type="text" id="p4" class="input" name="Image_path4" >
                        <label for="img_desc" class="label">Image_desc</label>
                        <input type="text" id="img_desc" class="input" name="Image_desc" >
                        <input type="submit" class="submita" value="submit" >
                        <input type="submit" class="cancela" value="Cancel">
                    </form>
                </div>    
            </div>
            </div>
            <div class="mainpage" id="pmpage">
            <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">color</div>
                        <div class="add">Add color</div>
                    </div>
                <?php
                    $sql = "SELECT * FROM `color`"; 
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="product" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>cid</th>
                                    <th>Product_id</th>
                                    <th>color</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    <td>{$row['cid']}</td>
                                    <td>{$row['product_id']}</td>
                                    <td>{$row['color']}</td>
                                    <td><span class="button edit">Edit</span><span class="button">Disable</span></td>
                                </tr>
                             _END;
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    ?>
                    <div class="formcontainer">
                    <form class="addcat" action="update.php" method="post">
                        <label for="" style="font-size:20px;font-weight:600">IMAGE</label>
                        <label for="cid" class="label">	Color id</label>
                        <input type="text" id="cid" class="input" name="color_id" >
                        <label for="product_id" class="label">Product id</label>
                        <input type="text" id="product_id" class="input" name="pro_id">
                        <label for="color" class="label">color</label>
                        <input type="text" id="color" class="input" name="color" >
                        <input type="submit" class="submit" value="submit" >
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                    <div class="addcontainer">
                    <form class="addcont" action="insert.php" method="post">
                    <!-- <label for="" style="font-size:20px;font-weight:600">ADD IMAGE</label> -->
                    <label for="" style="font-size:20px;font-weight:600">ADD COLOR</label>
                        <label for="cid" class="label">	Color id</label>
                        <input type="text" id="cid" class="input" name="color_id" >
                        <label for="product_id" class="label">Product id</label>
                        <input type="text" id="product_id" class="input" name="pro_id">
                        <label for="color" class="label">color</label>
                        <input type="text" id="color" class="input" name="color" >
                        <input type="submit" class="submita" value="submit" >
                        <input type="submit" class="cancela" value="Cancel">
                    </form>
                </div>    
            </div>
            </div>
            <div class="mainpage" id="ompage">
            <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">Order</div>
                        <div class="add">Add order</div>
                    </div>
                <?php
                    $sql = "SELECT * FROM `order_tbl`"; 
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="order" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>order_id</th>
                                    <th>user_id</th>
                                    <th>order_date</th>
                                    <th>order_status</th>
                                    <th>order_amount</th>
                                    <th>shipping_address</th>
                                    <th>shipping_status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    <td>{$row['order_id']}</td>
                                    <td>{$row['user_id']}</td>
                                    <td>{$row['order_date']}</td>
                                    <td>{$row['order_status']}</td>
                                    <td>{$row['order_amount']}</td>
                                    <td>{$row['shipping_address']}</td>
                                    <td>{$row['shipping_status']}</td>
                                    <td><span class="button" id="edit">Edit</span></td>
                                </tr>
                             _END;
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    ?>
                    <div class="formcontainer">
                    <form class="addcat" action="update.php" method="post">
                        <label for="" style="font-size:20px;font-weight:600">order</label>
                        <label for="oid" class="label">	Order_id</label>
                        <input type="text" id="odid" class="input" name="orderdesc_id">
                        <label for="uid" class="label">User_id</label>
                        <input type="text" id="uid" class="input" name="user_id" >
                        <label for="od" class="label">Order_date</label>
                        <input type="text" id="od" class="input" name="order_date" >
                        <label for="os" class="label">order_status</label>
                        <input type="text" id="os" class="input" name="order_status" >
                        <label for="amt" class="label">order_amount</label>
                        <input type="text" id="amt" class="input" name="order_amount" >
                        <label for="sadd" class="label">shipping_address</label>
                        <input type="text" id="sadd" class="input" name="shipping_address" >
                        <label for="sstat" class="label">shipping_status</label>
                        <input type="text" id="sstat" class="input" name="shipping_status" >
                        <input type="submit" class="submit" value="submit" >
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                    <div class="addcontainer">
                    <form class="addcont" action="insert.php" method="post">
                    <label for="" style="font-size:20px;font-weight:600">order</label>
                        <label for="oid" class="label">	Order_id</label>
                        <input type="text" id="oid" class="input" name="order_id" >
                        <label for="uid" class="label">User_id</label>
                        <input type="text" id="uid" class="input" name="user_id" >
                        <label for="od" class="label">Order_date</label>
                        <input type="text" id="od" class="input" name="order_date" >
                        <label for="os" class="label">order_status</label>
                        <input type="text" id="os" class="input" name="order_status" >
                        <label for="amt" class="label">order_amount</label>
                        <input type="text" id="amt" class="input" name="order_amount" >
                        <label for="sadd" class="label">shipping_address</label>
                        <input type="text" id="sadd" class="input" name="shipping_address" >
                        <label for="sstat" class="label">shipping_status</label>
                        <input type="text" id="sstat" class="input" name="shipping_status" >
                        <input type="submit" class="submita" value="submit" >
                        <input type="submit" class="cancela" value="Cancel">
                    </form>
                </div>    
            </div>
            </div>
            <div class="mainpage" id="ompage">
            <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">Order detail</div>
                        <div class="add">Add order</div>
                    </div>
                <?php
                    $sql = "SELECT * FROM `order_detail`"; 
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="order" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>orderdetail_id</th>
                                    <th>order_id</th>
                                    <th>product_id</th>
                                    <th>quantity</th>
                                    <th>rate</th>
                                    <th>discount</th>
                                    <th>amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    
                                    <td>{$row['orderdetail_id']}</td>
                                    <td>{$row['order_id']}</td>
                                    <td>{$row['product_id']}</td>
                                    <td>{$row['quantity']}</td>
                                    <td>{$row['rate']}</td>
                                    <td>{$row['discount']}</td>
                                    <td>{$row['amount']}</td>
                                    <td><span class="button" id="edit">Edit</span></td>
                                </tr>
                             _END;
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    ?>
                    <div class="formcontainer">
                    <form class="addcat" action="update.php" method="post">
                        <label for="" style="font-size:20px;font-weight:600">order</label>
                        <label for="odid" class="label">OrderDesc_id</label>
                        <input type="text" id="odid" class="input" name="orderdesc_id">
                        <label for="oid" class="label">	Order_id</label>
                        <input type="text" id="oid" class="input" name="order_id" >
                        <label for="product_id" class="label">product_id</label>
                        <input type="text" id="product_id" class="input" name="product_id" >
                        <label for="quantity" class="label">quantity</label>
                        <input type="text" id="quantity" class="input" name="quantity" >
                        <label for="rate" class="label">rate</label>
                        <input type="text" id="rate" class="input" name="rate" >
                        <label for="discount" class="label">discount</label>
                        <input type="text" id="discount" class="input" name="discount" >
                        <label for="amount" class="label">amount</label>
                        <input type="text" id="amount" class="input" name="amount" >
                        <input type="submit" class="submit" value="submit" >
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                    <div class="addcontainer">
                    <form class="addcont" action="insert.php" method="post">
                    <label for="" style="font-size:20px;font-weight:600">order</label>
                    <label for="odid" class="label">OrderDesc_id</label>
                        <input type="text" id="odid" class="input" name="orderdesc_id">
                        <label for="oid" class="label">	Order_id</label>
                        <input type="text" id="oid" class="input" name="order_id" >
                        <label for="product_id" class="label">product_id</label>
                        <input type="text" id="product_id" class="input" name="product_id" >
                        <label for="quantity" class="label">quantity</label>
                        <input type="text" id="quantity" class="input" name="quantity" >
                        <label for="rate" class="label">rate</label>
                        <input type="text" id="rate" class="input" name="rate" >
                        <label for="discount" class="label">discount</label>
                        <input type="text" id="discount" class="input" name="discount" >
                        <label for="amount" class="label">amount</label>
                        <input type="text" id="amount" class="input" name="amount" >
                        <input type="submit" class="submita" value="submit" >
                        <input type="submit" class="cancela" value="Cancel">
                    </form>
                </div>    
            </div>
            </div>
            <div class="mainpage" id="feedpage">
            <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">Feedback</div>
                        <div class="add">Add Feedback</div>
                    </div>
                <?php
                    $sql = "SELECT * FROM `feedback`"; 
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="feedback" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>feedback_id</th>
                                    <th>user_id</th>
                                    <th>product_id</th>
                                    <th>feedback_rating</th>
                                    <th>feedback_desc</th>
                                    <th>feedback_date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    <td>{$row['feedback_id']}</td>
                                    <td>{$row['user_id']}</td>
                                    <td>{$row['product_id']}</td>
                                    <td>{$row['feedback_rating']}</td>
                                    <td>{$row['feedback_desc']}</td>
                                    <td>{$row['feedback_date']}</td>
                                    <td><span class="button" id="edit">Edit</span></td>
                                </tr>
                             _END;
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    ?>
                    <div class="formcontainer">
                    <form class="addcat" action="update.php" method="post">
                        <label for="" style="font-size:20px;font-weight:600">IMAGE</label>
                        <label for="img_id" class="label">	Image_ID</label>
                        <input type="text" id="img_id" class="input" name="Image_ID" >
                        <label for="col_id" class="label">cid</label>
                        <input type="text" id="col_id" class="input" name="cid">
                        <label for="p1" class="label">Image_path1</label>
                        <input type="text" id="p1" class="input" name="Image_path1" >
                        <label for="p2" class="label">Image_path2</label>
                        <input type="text" id="p2" class="input" name="Image_path2" >
                        <label for="p3" class="label">Image_path3</label>
                        <input type="text" id="p3" class="input" name="Image_path3" >
                        <label for="p4" class="label">Image_path4</label>
                        <input type="text" id="p4" class="input" name="Image_path4" >
                        <label for="img_desc" class="label">Image_desc</label>
                        <input type="text" id="img_desc" class="input" name="Image_desc" >
                        <input type="submit" class="submit" value="submit" >
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                    <div class="addcontainer">
                    <form class="addcont" action="insert.php" method="post">
                    <label for="" style="font-size:20px;font-weight:600">ADD IMAGE</label>
                        <label for="img_id" class="label">	Image_ID</label>
                        <input type="text" id="img_id" class="input" name="Image_ID" >
                        <label for="col_id" class="label">cid</label>
                        <input type="text" id="col_id" class="input" name="cid">
                        <label for="p1" class="label">Image_path1</label>
                        <input type="text" id="p1" class="input" name="Image_path1" >
                        <label for="p2" class="label">Image_path2</label>
                        <input type="text" id="p2" class="input" name="Image_path2" >
                        <label for="p3" class="label">Image_path3</label>
                        <input type="text" id="p3" class="input" name="Image_path3" >
                        <label for="p4" class="label">Image_path4</label>
                        <input type="text" id="p4" class="input" name="Image_path4" >
                        <label for="img_desc" class="label">Image_desc</label>
                        <input type="text" id="img_desc" class="input" name="Image_desc" >
                        <input type="submit" class="submita" value="submit" >
                        <input type="submit" class="cancela" value="Cancel">
                    </form>
                </div>    
            </div>
            </div>
            <div class="mainpage" id="cumpage">
            <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">Customer</div>
                        <div class="add">Add Feedback</div>
                    </div>
                <?php
                    $sql = "SELECT * FROM `user`"; 
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="user" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>userID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>gender</th>
                                    <th>password</th>
                                    <th>Address</th>
                                    <th>PIN</th>
                                    <th>City</th>
                                    <th>Registration_date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    <td>{$row['userID']}</td>
                                    <td>{$row['fname']}</td>
                                    <td>{$row['lname']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['phone']}</td>
                                    <td>{$row['gender']}</td>
                                    <td>{$row['pass']}</td>
                                    <td>{$row['address']}</td>
                                    <td>{$row['pin']}</td>
                                    <td>{$row['city']}</td>
                                    <td>{$row['registration_date']}</td>
                                    <td><span class="button" id="edit">Edit</span></td>
                                </tr>
                             _END;
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    ?>
                    <div class="formcontainer">
                    <form class="addcat" action="update.php" method="post">
                        <label for="" style="font-size:20px;font-weight:600">IMAGE</label>
                        <label for="img_id" class="label">	Image_ID</label>
                        <input type="text" id="img_id" class="input" name="Image_ID" >
                        <label for="col_id" class="label">cid</label>
                        <input type="text" id="col_id" class="input" name="cid">
                        <label for="p1" class="label">Image_path1</label>
                        <input type="text" id="p1" class="input" name="Image_path1" >
                        <label for="p2" class="label">Image_path2</label>
                        <input type="text" id="p2" class="input" name="Image_path2" >
                        <label for="p3" class="label">Image_path3</label>
                        <input type="text" id="p3" class="input" name="Image_path3" >
                        <label for="p4" class="label">Image_path4</label>
                        <input type="text" id="p4" class="input" name="Image_path4" >
                        <label for="img_desc" class="label">Image_desc</label>
                        <input type="text" id="img_desc" class="input" name="Image_desc" >
                        <input type="submit" class="submit" value="submit" >
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                    <div class="addcontainer">
                    <form class="addcont" action="insert.php" method="post">
                    <label for="" style="font-size:20px;font-weight:600">ADD IMAGE</label>
                        <label for="img_id" class="label">	Image_ID</label>
                        <input type="text" id="img_id" class="input" name="Image_ID" >
                        <label for="col_id" class="label">cid</label>
                        <input type="text" id="col_id" class="input" name="cid">
                        <label for="p1" class="label">Image_path1</label>
                        <input type="text" id="p1" class="input" name="Image_path1" >
                        <label for="p2" class="label">Image_path2</label>
                        <input type="text" id="p2" class="input" name="Image_path2" >
                        <label for="p3" class="label">Image_path3</label>
                        <input type="text" id="p3" class="input" name="Image_path3" >
                        <label for="p4" class="label">Image_path4</label>
                        <input type="text" id="p4" class="input" name="Image_path4" >
                        <label for="img_desc" class="label">Image_desc</label>
                        <input type="text" id="img_desc" class="input" name="Image_desc" >
                        <input type="submit" class="submita" value="submit" >
                        <input type="submit" class="cancela" value="Cancel">
                    </form>
                </div>    
            </div>
            </div>
            <div class="mainpage" id="subpage">
            <div class="cmcontainer">
            <div class="cmheader">
                        <div class="heading">Refund</div>
                        <div class="add">Add Refund</div>
                    </div>
                <?php
                    $sql = "SELECT * FROM `refund`"; 
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="refund" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>refund_id</th>
                                    <th>order_id</th>
                                    <th>request_date</th>
                                    <th>refund_date</th>
                                    <th>refund_reason</th>
                                    <th>refund_amt</th>
                                    <th>refund_status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    <td>{$row['refund_id']}</td>
                                    <td>{$row['order_id']}</td>
                                    <td>{$row['request_date']}</td>
                                    <td>{$row['refund_date']}</td>
                                    <td>{$row['refund_reason']}</td>
                                    <td>{$row['refund_amt']}</td>
                                    <td>{$row['refund_status']}</td>
                                    <td><span class="button" id="edit">Edit</span><span class="button">Disable</span></td>
                                </tr>
                             _END;
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    ?>
                    <div class="formcontainer">
                    <form class="addcat" action="update.php" method="post">
                        <label for="" style="font-size:20px;font-weight:600">REFUND</label>
                        <label for="refund_id" class="label">refund_id</label>
                        <input type="text" id="refund_id" class="input" name="refund_id" >
                        <label for="order_id" class="label">order_id</label>
                        <input type="text" id="order_id" class="input" name="order_id">
                        <label for="request_date" class="label">request_date</label>
                        <input type="text" id="request_date" class="input" name="request_date" >
                        <label for="refund_date" class="label">refund_date</label>
                        <input type="text" id="refund_date" class="input" name="refund_date" >
                        <label for="refund_reason" class="label">refund_reason</label>
                        <input type="text" id="refund_reason" class="input" name="refund_reason" >
                        <label for="refund_amt" class="label">refund_amt</label>
                        <input type="text" id="refund_amt" class="input" name="refund_amt" >
                        <label for="refund_status" class="label">refund_status</label>
                        <input type="text" id="refund_status" class="input" name="refund_status" >
                        <input type="submit" class="submit" value="submit" >
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                    <div class="addcontainer">
                    <form class="addcont" action="insert.php" method="post">
                    <label for="" style="font-size:20px;font-weight:600">REFUND</label>
                        <label for="refund_id" class="label">refund_id</label>
                        <input type="text" id="refund_id" class="input" name="refund_id" >
                        <label for="order_id" class="label">order_id</label>
                        <input type="text" id="order_id" class="input" name="order_id">
                        <label for="request_date" class="label">request_date</label>
                        <input type="text" id="request_date" class="input" name="request_date" >
                        <label for="refund_date" class="label">refund_date</label>
                        <input type="text" id="refund_date" class="input" name="refund_date" >
                        <label for="refund_reason" class="label">refund_reason</label>
                        <input type="text" id="refund_reason" class="input" name="refund_reason" >
                        <label for="refund_amt" class="label">refund_amt</label>
                        <input type="text" id="refund_amt" class="input" name="refund_amt" >
                        <label for="refund_status" class="label">refund_status</label>
                        <input type="text" id="refund_status" class="input" name="refund_status" >
                        <input type="submit" class="submita" value="submit" >
                        <input type="submit" class="cancela" value="Cancel">
                    </form>
                </div>    
            </div>
            </div> 
            </div>
            <div class="mainpage" id="ofpage">
            <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">Offer</div>
                        <div class="add">Add Offer</div>
                    </div>
                <?php
                    $sql = "SELECT * FROM `offer`"; 
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="offer" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>offer_id</th>
                                    <th>user_id</th>
                                    <th>product_id</th>
                                    <th>offer_details</th>
                                    <th>offer_status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    <td>{$row['offer_id']}</td>
                                    <td>{$row['user_id']}</td>
                                    <td>{$row['product_id']}</td>
                                    <td>{$row['offer_details']}</td>
                                    <td>{$row['offer_status']}</td>
                                    <td><span class="button" id="edit">Edit</span><span class="button">Disable</span></td>
                                </tr>
                             _END;
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    ?>
                    <div class="formcontainer">
                    <form class="addcat" action="update.php" method="post">
                        <label for="" style="font-size:20px;font-weight:600">OFFER</label>
                        <label for="offer_id" class="label">offer_id</label>
                        <input type="text" id="offer_id" class="input" name="offer_id" >
                        <label for="user_id" class="label">user_id</label>
                        <input type="text" id="user_id" class="input" name="user_id">
                        <label for="product_id" class="label">product_id</label>
                        <input type="text" id="p1" class="input" name="product_id" >
                        <label for="offer_details" class="label">offer_details</label>
                        <input type="text" id="p2" class="input" name="offer_details" >
                        <label for="offer_status" class="label">offer_status</label>
                        <input type="text" id="offer_status" class="input" name="offer_status" >
                        <input type="submit" class="submit" value="submit" >
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                    <div class="addcontainer">
                    <form class="addcont" action="insert.php" method="post">
                    <label for="" style="font-size:20px;font-weight:600">OFFER</label>
                        <label for="offer_id" class="label">offer_id</label>
                        <input type="text" id="offer_id" class="input" name="offer_id" >
                        <label for="user_id" class="label">user_id</label>
                        <input type="text" id="user_id" class="input" name="user_id">
                        <label for="product_id" class="label">product_id</label>
                        <input type="text" id="p1" class="input" name="product_id" >
                        <label for="offer_details" class="label">offer_details</label>
                        <input type="text" id="p2" class="input" name="offer_details" >
                        <label for="offer_status" class="label">offer_status</label>
                        <input type="text" id="offer_status" class="input" name="offer_status" >
                        <input type="submit" class="submita" value="submit" >
                        <input type="submit" class="cancela" value="Cancel">
                    </form>
                </div>    
            </div>
            </div>
            <div class="mainpage" id="paypage">
            <div class="cmcontainer">
                    <div class="cmheader">
                        <div class="heading">Payment</div>
                        <div class="add">Add payment</div>
                    </div>
                <?php
                    $sql = "SELECT * FROM `payment`"; 
                    $result = $conn->query($sql);

                    if ($result) {
                        echo <<< _END
                        <table id="offer" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>transaction_id</th>
                                    <th>order_id</th>
                                    <th>payment_mode</th>
                                    <th>payment_date</th>
                                    <th>payment_status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        _END;

                        while ($row = $result->fetch_assoc()) {
                            echo <<< _END
                                <tr>
                                    <td>{$row['transaction_id']}</td>
                                    <td>{$row['order_id']}</td>
                                    <td>{$row['payment_mode']}</td>
                                    <td>{$row['payment_date']}</td>
                                    <td>{$row['payment_status']}</td>
                                    <td><span class="button" id="edit">Edit</span></td>
                                </tr>
                             _END;
                        }

                        echo <<< _END
                            </tbody>
                        </table>
                    _END;
                    }
                    ?>
                    <div class="formcontainer">
                    <form class="addcat" action="update.php" method="post">
                    <label for="" style="font-size:20px;font-weight:600">PAYMENT</label>
                        <label for="transaction_id" class="label">transaction_id</label>
                        <input type="text" id="transaction_id" class="input" name="transaction_id" >
                        <label for="order_id" class="label">order_id</label>
                        <input type="text" id="order_id" class="input" name="order_id">
                        <label for="payment_mode" class="label">payment_mode</label>
                        <input type="text" id="payment_mode" class="input" name="payment_mode" >
                        <label for="payment_date" class="label">payment_date</label>
                        <input type="text" id="payment_date" class="input" name="payment_date" >
                        <label for="payment_status" class="label">payment_status</label>
                        <input type="text" id="payment_status" class="input" name="payment_status" >
                        <input type="submit" class="submit" value="submit" >
                        <input type="submit" class="cancel" value="Cancel">
                    </form>
                    </div>
                    <div class="addcontainer">
                    <form class="addcont" action="insert.php" method="post">
                    <label for="" style="font-size:20px;font-weight:600">PAYMENT</label>
                        <label for="transaction_id" class="label">transaction_id</label>
                        <input type="text" id="transaction_id" class="input" name="transaction_id" >
                        <label for="order_id" class="label">order_id</label>
                        <input type="text" id="order_id" class="input" name="order_id">
                        <label for="payment_mode" class="label">payment_mode</label>
                        <input type="text" id="payment_mode" class="input" name="payment_mode" >
                        <label for="payment_date" class="label">payment_date</label>
                        <input type="text" id="payment_date" class="input" name="payment_date" >
                        <label for="payment_status" class="label">payment_status</label>
                        <input type="text" id="payment_status" class="input" name="payment_status" >
                        <input type="submit" class="submita" value="submit" >
                        <input type="submit" class="cancela" value="Cancel">
                    </form>
                </div>    
            </div>
            </div>
        </section>
    </section>
    <script src="adminpanel.js" type="text/javascript"></script>
    <script>
        var title = document.querySelectorAll(".sideitem");
        var subtitle = document.querySelectorAll(".mainpage");
        var menu = document.querySelector(".amenu");
        var sidebar = document.querySelector(".sidebar");
        var prod=document.querySelector("#prod");
        var prod1=document.querySelector("#prod1");

    
        menu.addEventListener("click", () => {
            sidebar.classList.toggle("sview");
        })
        <?php
        if(isset($_GET['page'])){
            ?>
        subtitle[<?php echo $page; ?>].style.display = "block";
        title[<?php echo $page; ?>].style.background = "grey";
        <?php
        }
        else{
        ?>
        subtitle[0].style.display = "block";
        title[0].style.background = "grey";
        <?php
        }
        if($page==2 || $page==3 || $page==4 || $page==5){
            ?>
            title[2].style.display="block";
            title[3].style.display="block";
            title[4].style.display="block";
            title[5].style.display="block";
            
            <?php
        }
        if($page==6 || $page==7){
        ?>
         title[6].style.display="block";
            title[7].style.display="block";
            <?php
        }
        ?>

        for (let i = 0; i < title.length; i++) {
            prod.addEventListener("click",()=>{
                prod.style.margin="0px";
            title[2].style.display="block";
            title[3].style.display="block";
            title[2].style.background="black";
            title[4].style.display="block";
            title[4].style.background="black";
            title[3].style.background="black";
            title[5].style.display="block";
            title[5].style.background="black";
        })
        prod1.addEventListener("click",()=>{
            prod1.style.margin="0px";
            title[6].style.display="block";
            title[7].style.display="block";
            title[6].style.background="black";
            title[7].style.background="black";
        })
            title[i].addEventListener("click", () => {
                window.location.href = "adminpanel.php?page=" + i;
                
                for (let j = 0; j < subtitle.length; j++) {
                    subtitle[j].style.display = "none";
                    title[j].style.background = "teal";
                }
                if(i==2 || i==3 || i==4 || i==5){
                    title[2].style.background="black";
            title[3].style.background="black";
            title[4].style.background="black";
            title[5].style.background="black";
                }
                if(i==6 || i==7){
                    title[6].style.background="black";
            title[7].style.background="black";
                }
                title[i].style.background = "grey";
                subtitle[i].style.display = "block";
                
                if(i!=2 && i!=3 && i!=4 && i!=5){
                    prod.style.margin="0px 0px 5px 0px";
                    title[2].style.display="none";
                    title[3].style.display="none";
                    title[4].style.display="none";
                    title[5].style.display="none";
                }
                if(i!=6 && i!=7){
                    prod1.style.margin="0px 0px 5px 0px";
                    title[6].style.display="none";
                    title[7].style.display="none";
                }
            });
        }
        // new DataTable('#example');
        // new DataTable('#product');
        // new DataTable('#order');
        new DataTable('.table');
        var formcontainer=document.querySelectorAll(".formcontainer");
        var addcontainer=document.querySelectorAll(".addcontainer");
        var edit=document.querySelectorAll(".edit");
        // var form=document.querySelector(".addcat");
        var cancel=document.querySelectorAll(".cancel");
        var submit=document.querySelectorAll(".submit");
        var cancela=document.querySelectorAll(".cancela");
        var submita=document.querySelectorAll(".submita")
        var add=document.querySelectorAll(".add");

        
        function logfunction() {
        window.location.href="logout.php";
    }
    function profile(){
        windows.location.href="user.html";
    }

        console.log(addcontainer[0]);
        for(let k=0;k<addcontainer.length;k++){
            console.log(k);
            add[k].addEventListener("click",()=>{
            addcontainer[k].style.display="block";
             })
            submita[k].addEventListener("click",()=>{
            addcontainer[k].style.display = "none";
             })
            cancela[k].addEventListener("click", (event) => {
            event.preventDefault();
            // box.childNodes[6].reset();
            addcontainer[k].style.display="none";
            });
         }
        for(let i=0;i<edit.length;i++){
            edit[i].addEventListener("click",(e)=>{
                // e.preventDefault();
                
                var len=e.currentTarget.parentNode.parentNode.getElementsByTagName('td').length;
                console.log(len);
                var arr = new Array(len-1);
                for(var j=0;j<len-1;j++){
                
                
                
                var box=e.currentTarget.parentNode.parentNode.getElementsByTagName('td')[j].parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
                console.log(box);
                console.log(box.childNodes[5]);
                box.childNodes[5].style.display="block";
                for(var k=0;k<cancel.length;k++){
                    submit[k].addEventListener("click",()=>{
                        box.childNode[5].style.display = "none";
                     })
                    cancel[k].addEventListener("click", (event) => {
                        event.preventDefault();
                        // box.childNodes[6].reset();
                        box.childNodes[5].style.display="none";
                    });
                }
                // console.log(box.childNodes[5]);
                arr[j]=e.currentTarget.parentNode.parentNode.getElementsByTagName('td')[j].textContent;
                console.log(arr[j]);
                box.querySelectorAll(".input")[j].value=arr[j];
            }

           })
        }
        const login=document.querySelector(".subtitle");
const loginitem=document.querySelector(".logindrop");

login.onclick = function () {
    loginitem.classList.toggle("visible");
    // console.log("Menu button clicked");
    // console.log("link-container class list:", menuitem.classList);
};
    </script>
</body>

</html>