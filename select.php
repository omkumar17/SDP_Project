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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery -->
<title>Filtering using Ajax, PHP & MySQL</title>
<link rel="stylesheet" type='text/css' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
<link rel="stylesheet" type='text/css' href="public/css/style.css">  
<link rel="icon" href="public\img\ff logo.jpeg" type="image/x-icon">
<link rel="stylesheet" href="public\css\nav.css">
<style>
    .filtermenu{
        display:none;
    }
    @media screen and (max-width:990px){
    .filtermenu{
        display:block;
        cursor: pointer;
        height:50px;
        font-size:20px;
        text-align:center;
        width:100%;
        border-bottom:5px solid teal;
        padding:10px;
        color:teal;
        font-weight:600;

        }
        aside{
            display:none;
            position:fixed;
            top:0;
            height:85vh;
            overflow-y:scroll;
            z-index:8;
        }
    }
</style>
<!-- <link rel="stylesheet" href="public\css\home.css"> -->
</head>
<body class="">
<div role="navigation" class="navbar navbar-default navbar-static-top">
<nav class="navbar"><?php include_once 'nav.php'; ?></nav>
<script src="public\js\nav.js"></script>
<div class="container">     
<div class="content"> 
	<div class="container-fluid">
        <div class="filtermenu">Filter and sorting
        </div>		
            <form method="post" id="search_form">               
                <div class="row main-container">                    
                    <aside class="col-lg-3 col-md-4">
                    <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">GROUP</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
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
                                            <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($grp['grp']); ?>" checked="checked" name="grp[]" class="sort_rang grp" id="grpcheck"><?php echo ucfirst($grp['grp']);?></label></div>
                                        </li>
                                        <?php 
                                        
                                    }
                                    
                                
                                }
                                else{
                                    ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($grp['grp']); ?>" <?php echo @$grpChecked; ?> name="grp[]" class="sort_rang grp"><?php echo ucfirst($grp['grp']); ?></label></div>
                                    </li>
                                    <?php  
                                }
                            }
                            ?>
                                </ul>
                            </div>
                        </div>						
						<div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Categories</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
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
                                        if(($_GET['categ']===$category['category_name'])){
                                            ?>
                                            <li class="list-group-item">
                                                <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($category['category_id']); ?>" checked="checked" name="category[]" class="sort_rang category"><?php echo ucfirst($category['category_name']); ?></label></div>
                                            </li>
                                        <?php
                                        }
                                    
                                    
                                    }
                                    else{
                                        ?> 
                                        <li class="list-group-item">
                                            <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($category['category_id']); ?>" <?php echo @$categoryCheck; ?> name="category[]" class="sort_rang category"><?php echo ucfirst($category['category_name']); ?></label></div>
                                        </li>
                                        <?php
                                    }
                                } 
                                ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Type</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
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
                                    if( ($_GET['type']===$type['product_type'])){
                                        ?>
                                        <li class="list-group-item">
                                            <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($type['product_type']); ?>" checked="checked" name="type[]" class="sort_rang type" id="typecheck"><?php echo ucfirst($type['product_type']);?></label></div>
                                        </li>
                                        <?php 
                                        
                                    }
                                    
                                
                                }
                                else{
                                    ?>
                                    <li class="list-group-item">
                                        <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($type['product_type']); ?>" <?php echo @$typeChecked; ?> name="type[]" class="sort_rang type"><?php echo ucfirst($type['product_type']); ?></label></div>
                                    </li>
                                    <?php  
                                }
                            }
                            ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Brand</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
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
									<div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($brand['product_name']); ?>" <?php echo @$brandChecked; ?> name="brand[]" class="sort_rang brand"><?php echo ucfirst($brand['product_name']); ?></label></div>
								</li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
						<div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Sort By </h3></div>
                            <div class="panel-body collapse in" id="panelOne">
								<div class="radio disabled">
									<label><input type="radio" name="sorting" value="newest" <?php if(isset($_POST['sorting']) && ($_POST['sorting'] == 'newest' || $_POST['sorting'] == '')) {echo "checked";} ?> class="sort_rang sorting">Newest</label>
								</div> 
								<div class="radio">
									<label><input type="radio" name="sorting" value="low" <?php if(isset($_POST['sorting']) && $_POST['sorting'] == 'low') {echo "checked";} ?> class="sort_rang sorting">Price: Low to High</label>
								</div>
								<div class="radio">
									<label><input type="radio" name="sorting" value="high" <?php if(isset($_POST['sorting']) && $_POST['sorting'] == 'high') {echo "checked";} ?> class="sort_rang sorting">Price: High to Low</label>
								</div>								                              
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelTwo" aria-expanded="true"> Colour</h3></div>
                            <div class="panel-body collapse in" id="panelTwo">
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
                                        <div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($color['color']); ?>" <?php echo @$colorCheck?>  name="color[]" class="sort_rang color"><?php echo ucfirst($color['color']); ?></label></div>
                                    </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelFour" aria-expanded="true">Size</h3></div>
                            <div class="panel-body collapse in" id="panelFour">
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
                                        <div class="checkbox"><label><input type="checkbox" value="<?php echo $productSize['size']; ?>" <?php echo @$sizeCheck; ?>  name="size[]" class="sort_rang size"><?php echo $productSize['size']; ?></label></div>
                                    </li>
									<?php } ?>
                                </ul>
                            </div>
                        </div>
                    </aside>
                    <section class="col-lg-9 col-md-8">
                        <div class="row">
                     
                            <div id="results">
                            </div>
        
                    </section>
                </div>
				<input type="hidden" id="totalRecords" value="<?php echo $totalRecords; ?>">
            </form>
        </div>        
    </div>        
<script src="public/js/script.js"></script>	
<script>
    filter=document.querySelector(".filtermenu");
    aside=document.querySelector("aside");
    filter.addEventListener("click",()=>{
        aside.classList.toggle("visible");
    })
</script>	