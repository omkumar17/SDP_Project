<?php 
include("prod.php");
$product = new Product();
$grp=$product->getGrp();
$categories = $product->getCategories();
$type = $product->getType();
$brands = $product->getBrand();
$colors = $product->getcolor();
$productSizes = $product->getProductSize();
$totalRecords = $product->getTotalProducts();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" type='text/css' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
    <link rel="stylesheet" type='text/css' href="public/css/style.css">  
    <link rel="icon" href="public\img\ff logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="public\css\nav.css">
    <link rel="stylesheet" href="public\css\home.css">
    <title>Document</title>
    <style>
         .filtermenu{
        display:none;
    }
    
        .filtercontent{
            width:90%;
            margin:auto;
            display:flex;
            flex-direction:row;
            justify-content:center;
            /* align-items:center; */
        }
        .aside{
            /* position:fixed; */
            width:20%;
            /* top:100px; */
            /* background-color:red; */
            /* height:100vh; */
            border-right:1px solid black;
            margin-right:20px;
        }
        #results {
            display: grid;
            grid-template-columns: auto auto auto;
        }
        .maincontent{
            width:80%;
            margin: 0 auto;
            /* height: 100vh; */
        }
        .formcontainer{
            display:flex;
            flex-direction:column;
            /* align-items:center; */
            justify-content:flex-start;
            /* padding:0 50px; */
            font-size:18px;
        }
        .head{
            text-align:left;
            margin: 20px 0;
            font-size:20px;
        }
        .radio{
            margin:10px 0;
        }
        .list-group{
            list-style:none;
            text-align:left;
        }
        .list-group-item{
            margin-top: 20px;
        }
        .lab{
            margin-left: 20px;
        }
        .checkbox input[type="checkbox"]{
            height:18px;
            width:18px;
        }
        @media screen and (max-width:990px){
            .selectcontainer{
            margin-top:20px;
        }
    .filtermenu{
        position:sticky;
        display:block;
        top:170px;
        cursor: pointer;
        height:50px;
        font-size:18px;
        text-align:center;
        width:100%;
        border-bottom:5px solid teal;
        padding:10px;
        color:teal;
        font-weight:600;
        z-index: 7;

        }
        .aside{
            display:none;
            position:fixed;
            top:220px;
            height:85vh;
            width:95vw;
            overflow-y:scroll;
            z-index:8;
            margin-right:0;
            border:1px solid black;
            padding:0px 50px 100px 50px;
        }
        .maincontent{
            width:100%;
        }
    }
        @media only screen and (max-width:752px) {
            .filtercontent{
                margin: 0;
                width:96%;
                margin:0% 2% 0% 2%;
            }
            .maincontent{
                width:100%;
            }
            .aside{
                margin: 0;
            }
        .product-card {
        height: 75vw;
        width: 100%;
        }

    .product-link {
        width: 45vw;
        margin: 0 2% 0 2%;
        height: 80vw;
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

       
    @media only screen and (max-width:600px){
        .selectcontainer{
            margin-top:20px;
        }
        .filtermenu{
            top:110px;
        }
        .aside{
            top:160px;
        }
    }
    @media only  screen and (max-width:434px){
        .selectcontainer{
            margin-top:30px;
        }
        .filtermenu{
            top:120px;
        }
        .aside{
            top:170px;
        }
    }
    @media screen and (max-width:1362px) {
  .container{
    margin:10px auto;
  }
  
  #results {
    grid-template-columns: auto auto;
    justify-content:space-around;
  }
}

    </style>
</head>
<body>
<nav class="navbar"><?php include_once 'nav.php'; ?></nav>

        <div class="selectcontainer">
            <div class="filtermenu">Filter and sorting </div>
            <div class="filtercontent">
                <div class="aside">
                    <form method="post" id="search_form">
                        <div class="formcontainer">
                        <div class="head">GROUP</div>
                        <ul class="list-group">
                            <?php 
                            foreach ($grp as $key => $grp) {
                                if(isset($_POST['grp'])) {
                                    if(in_array($product->cleanString($grp['grp']),$_POST['grp'])) {
                                        $grpChecked ='checked="checked"';
                                    } else {
                                        $grpChecked ="";
                                    }
                                }
                                if(isset($_GET['grp'])){
                                    if( ($_GET['grp']===$grp['grp'])){
                                        ?>
                                        <li class="list-group-item">
                                            <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($grp['grp']); ?>" checked="checked" name="grp[]" class="sort_rang grp" id="grpcheck"><span class="lab"><?php echo ucfirst($grp['grp']);?></span></label></div>
                                        </li>
                                        <?php 
                                        
                                    }
                                    
                                
                                }
                                else{
                                    ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($grp['grp']); ?>" <?php echo @$grpChecked; ?> name="grp[]" class="sort_rang grp"><span class="lab"><?php echo ucfirst($grp['grp']); ?></span></label></div>
                                    </li>
                                    <?php  
                                }
                            }
                            ?>
                        </ul>
                        <div class="head">CATEGORY</div>
                        <ul class="list-group">
                        <?php 
                        foreach ($categories as $key => $category) {
                            if(isset($_POST['category'])) {
                                if(in_array($product->cleanString($category['category_id']),$_POST['category'])) {
                                    $categoryCheck ='checked="checked"';
                                } else {
                                    $categoryCheck="";
                                }
                            }
                                if(isset($_GET['categ'])){
                                    if(($_GET['categ']===$category['Category_name'])){
                                        ?>
                                        <li class="list-group-item">
                                            <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($category['category_id']); ?>" checked="checked" name="category[]" class="sort_rang category"><span class="lab"><?php echo ucfirst($category['Category_name']); ?></span></label></div>
                                        </li>
                                    <?php
                                    }
                                
                                
                                }
                                else{
                                    ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($category['category_id']); ?>" <?php echo @$categoryCheck; ?> name="category[]" class="sort_rang category"><span class="lab"><?php echo ucfirst($category['Category_name']); ?></span></label></div>
                                    </li>
                                    <?php
                                }
                        } 
                        ?>
                        
                        </ul>
                        <div class="head">TYPE</div>
                        <ul class="list-group">
                        <?php 
                        foreach ($type as $key => $type) {
                            if(isset($_POST['type'])) {
                                if(in_array($product->cleanString($type['product_type']),$_POST['type'])) {
                                    $typeChecked ='checked="checked"';
                                } else {
                                    $typeChecked ="";
                                }
                            }
                        if(isset($_GET['categ']) && $_GET['type']){
                            if( ($_GET['type']===$type['product_type']) ){
                                ?>
                                <li class="list-group-item">
                                    <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($type['product_type']); ?>" checked="checked" name="type[]" class="sort_rang type" id="typecheck"><span class="lab"><?php echo ucfirst($type['product_type']);?></span></label></div>
                                </li>
                                <?php 
                                
                            }
                            
                        
                        }
                        else{
                            ?>
                            <li class="list-group-item">
                                <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($type['product_type']); ?>" <?php echo @$typeChecked; ?> name="type[]" class="sort_rang type"><span class="lab"><?php echo ucfirst($type['product_type']); ?></span></label></div>
                            </li>
                            <?php  
                        }
                    }
                    ?>
                        </ul>
                        <div class="head">BRAND</div>
                        <ul class="list-group">
                        <?php 
                        foreach ($brands as $key => $brand) {
                            if(isset($_POST['brand'])) {
                                if(in_array($product->cleanString($brand['product_name']),$_POST['brand'])) {
                                    $brandChecked ='checked="checked"';
                                } else {
                                    $brandChecked="";
                                }
                            }
                        ?>
                        <li class="list-group-item">
                            <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($brand['product_name']); ?>" <?php echo @$brandChecked; ?> name="brand[]" class="sort_rang brand"><span class="lab"><?php echo ucfirst($brand['product_name']); ?></span></label></div>
                        </li>
                        <?php 
                    } ?>
                        
                        </ul>
                        <div class="head">SORTING</div>
                        <div class="radio disabled">
                            <label><input type="radio" name="sorting" value="newest" <?php if(isset($_POST['sorting']) && ($_POST['sorting'] == 'newest' || $_POST['sorting'] == '')) {echo "checked";} ?> class="sort_rang sorting"><span class="lab">Newest</span></label>
                        </div> 
                        <div class="radio">
                            <label><input type="radio" name="sorting" value="low" <?php if(isset($_POST['sorting']) && $_POST['sorting'] == 'low') {echo "checked";} ?> class="sort_rang sorting"><span class="lab">Price: Low to High</span></label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="sorting" value="high" <?php if(isset($_POST['sorting']) && $_POST['sorting'] == 'high') {echo "checked";} ?> class="sort_rang sorting"><span class="lab">Price: High to Low</span></label>
                        </div>
                        

                        <div class="head">COLOUR</div>
                        <ul class="list-group">
                        <?php 
                        foreach ($colors as $key => $color) {
                            if(isset($_POST['color'])) {
                                if(in_array($product->cleanString($color['color']),$_POST['color'])) {
                                    $colorCheck='checked="checked"';
                                } else { 
                                    $colorCheck="";
                                }
                            }
                        ?>
                            <li class="list-group-item">
                                <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($color['color']); ?>" <?php echo @$colorCheck?>  name="color[]" class="sort_rang color"><span class="lab"><?php echo ucfirst($color['color']); ?></span></label></div>
                            </li>
                        <?php
                        } 
                        ?>
                        </ul>
                        <div class="head">SIZE</div>
                        <ul class="list-group">
                            <?php foreach ($productSizes as $key => $productSize) {
                                if(isset($_POST['size'])){
                                    if(in_array($productSize['size'],$_POST['size'])) {
                                        $sizeCheck='checked="checked"';
                                    } else {
                                        $sizeCheck="";
                                    }
                                }
                            ?>
                            <li class="list-group-item">
                                <div class="checkbox"><label><input type="checkbox" value="<?php echo $productSize['size']; ?>" <?php echo @$sizeCheck; ?>  name="size[]" class="sort_rang size"><span class="lab"><?php echo $productSize['size']; ?></span></label></div>
                            </li>
                            <?php } ?>
                        </ul>
                        </div>
                    
                </div>
                <div class="maincontent">
                <div id="results">
                </div>
                </div>
                <input type="hidden" id="totalRecords" value="<?php echo $totalRecords; ?>">
            </div>
            </form>
        </div>
        <footer>
    </footer>
    <script src="public\js\footer.js"></script>
    <script src="public\js\nav.js"></script>        
<script src="public\js\script.js"></script>	

<script>
    filter=document.querySelector(".filtermenu");
    aside=document.querySelector(".aside");
    filter.addEventListener("click",()=>{
        aside.classList.toggle("visible");
    })
</script>	
</body>
</html>