<?php
include_once 'connection.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public\css\footer.css">
    <link rel="stylesheet" href="public\css\home.css">
    <style>
       @import 'nav.css';
    .product{
        display:flex;
        flex-direction:row;
        padding-top: 0;
    }
       .leftfilter{
        width:20%;
        background-color:red;
       }
       .product-container{
        display:grid;
        grid-template-columns:auto auto auto;
        justify-content:space-evenly;
        width:80%;
        padding:0 3%;
        /* margin: auto; */
       }
       @media only screen and (max-width:1316px){
        .product{
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
         }  
        .leftfilter{
            display:block;
            width:100%;
            position:fixed;
            top:120px;
            height:50px;
            z-index:10;
        }
        .product-container{
            width:100%;
            margin:auto;
            padding:6%;
       }
       }
       @media only screen and (max-width:1123px){
        .product-container{
        display:grid;
        grid-template-columns:auto auto;
        justify-content:space-evenly;
        width:100%;
        /* margin: 5%; */
        padding: 10%;
       }
       @media only screen and (max-width:790px){
        .product{
            padding-top: 10px;
        }
        .product-container{
            display:grid;
            grid-template-columns:auto auto;
            justify-content:space-evenly;
            /* flex-direction:row; */
            /* flex-wrap:wrap; */
            width:100%;
            padding:12%;
            /* margin-top: 20px; */
            /* margin: auto; */
        }
        .product-container {
        padding: 0;
        box-sizing: border-box;
        /* margin-top: 10px; */
        padding: 200px 20px 20px 8px;

    }

    .product-card {
        height: 80vw;
        width: 100%;
    }

    .product-link {
        width: 40vw;
        margin: 3% 3% 3% 3%;
        height: 90vw;
    }
    .product-image {
        height: 70%;
    }

    .product-info {
        height: auto;
        padding-left: 0;
    }

    .product-brand {
        height: 20px;
        margin: 5px;
        padding: 0;
        /* width:80%; */
        /* text-align: center; */
    }

    .product-short-des {
        height: 24px;
        margin: 5px;
        padding: 0;
        font-size: 90%;
    }

    .price,
    .actual-price {
        font-size: 100%;
        height: auto;
        margin: 5px;
    }

       }
       }
       @media only screen and (max-width:326px){
        .product{
            padding-top: 10px;
        }
        .product-container{
            display:grid;
            grid-template-columns:auto auto;
            justify-content:space-evenly;
            /* flex-direction:row; */
            /* flex-wrap:wrap; */
            width:100%;
            padding:12%;
            /* margin-top: 20px; */
            /* margin: auto; */
        }
        .product-container {
        padding: 0;
        box-sizing: border-box;
        /* margin-top: 10px; */
        padding: 20px 20px 20px 8px;

    }

    .product-card {
        height: 100vw;
        width: 100%;
    }

    .product-link {
        width: 40vw;
        margin: 3% 3% 3% 3%;
        height: 105vw;
    }
    .product-image {
        height: 55%;
    }

    .product-info {
        height: auto;
        padding-left: 0;
    }

    .product-brand {
        height: 20px;
        margin: 5px;
        padding: 0;
        /* width:80%; */
        /* text-align: center; */
    }

    .product-short-des {
        height: 24px;
        margin: 5px;
        padding: 0;
        font-size: 90%;
    }

    .price,
    .actual-price {
        font-size: 100%;
        height: auto;
        margin: 5px;
    }

       }
    </style>
</head>

<body>
    
<?php
        if(isset($_GET['type']) && isset($_GET['cat']) && isset($_GET['title']) && isset($_GET['size']) && isset($_GET['color']))
        {
            $type=$_GET['type'];
            $cat=$_GET['cat'];
            $title=$_GET['title'];
            $size=$_GET['size'];
            $color=$_GET['color'];
        }
        $sqlselect="SELECT * FROM `product` JOIN color ON product.Product_id = color.product_id JOIN image ON color.cid = image.cid JOIN category ON category.category_id=product.Category_ID JOIN product_desc ON product_desc.cid=color.cid WHERE product.grp='$cat' AND product_desc.product_type='$type' AND category.Category_name='$title' AND product_desc.size='$size' AND color.color='$color'";
        $result=$conn->query($sqlselect);
    ?>
    <nav class="navbar"><?php include_once 'nav.php'; ?></nav>
   
    <!-- hero section -->

    <section class="product">
    <section class="leftfilter" >
        </section>
        <div class="product-container">
            <?php
                while($selectrow=$result->fetch_assoc())
                {
                    echo<<<_END

                    <a href="product.php?id={$selectrow['Product_id']}" class="product-link">
                        <div class="product-card">
                            <div class="product-image">
                                <span class="discount-tag">50% off</span>
                                <img src="{$selectrow['Image_path1']}" class="product-thumb" alt="">
                                <button class="card-btn">add to whislist</button>
                            </div>
                            <div class="product-info">
                                <div class="product-brand">{$selectrow['product_name']}</div>
                                <p class="product-short-des">{$selectrow['product_details']}}</p>
                                <span class="price">{$selectrow['price']}</span><span class="actual-price">{$selectrow['actual_price']}}</span>
                            </div>
                        </div>
                    </a>
                    _END;
                }

            ?>

    <!-- <footer>
    </footer> -->
    <script src="public\js\footer.js"></script>
    <script src="public\js\home.js"></script>


</body>

</html>