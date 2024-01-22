<?php
include_once 'connection.php';

$sql="SELECT * FROM `product`";
$result=$conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public\img\ff logo.jpeg" type="image/x-icon">
    <title>Foot Fusion</title>
    <link rel="stylesheet" type="text/css" href="public\css\home.css">
    <style>
  
    </style>
</head>

<body>
    <nav class="navbar">
    <?php
        include_once 'nav.php';
        ?>
</nav>

        
    <!-- hero section -->
    <header class="hero-section">
        <!-- <div class="content">
            <img src="" class="logo" alt="logo">
            <p class="sub-heading">best fashion collection of all time</p>
        </div> -->
        <div class="slider">
            <div class="container">
                <div class="parent">
                    <img src="public\img\banner.jpeg" alt="" class="img" id="img1">
                    <img src="public\img\banner2.webp" alt="" class="img" id="img2">
                    <img src="public\img\banner3.jpg" alt="" class="img" id="img3">
                    <img src="public\img\banner1.jpg" alt="" class="img" id="img4">
                </div>
            </div>
        </div>
    </header>

    <!-- <section class="notice">
        <div class="notice-slider">
            <div class="notice-container">
                <div class="notice-parent">
                    <div class="notice-content"><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora fugiat veniam eaque?</p></div>
                    <div class="notice-content"><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora fugiat veniam eaque?</p></div>
                    <div class="notice-content"><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora fugiat veniam eaque?</p></div>
                    <div class="notice-content"><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora fugiat veniam eaque?</p></div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="product">
        <div class="product-category">best selling</div>
        <button class="pre-btn"><img src="public\img\nextbutton.png" alt="prebtn"></button>
        <button class="nxt-btn"><img src="public\img\nextbutton.png" alt="nxtbtn"></button>

        <div class="product-container">
        <?php
            $row=$result->fetch_assoc();
        ?>
            <a href="product.php?id=1026&color=blue" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">25% off</span>
                        <img src="public\img\1026-1-blu.jpeg" class="product-thumb" alt="">
                        <button class="card-btn">add to whislist</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Paragon</h2>
                        <p class="product-short-des">Paragon K1026G Men Walking Shoes | Athletic Shoes with Comfortable Cushioned Sole for Daily Outdoor Use</p>
                        <span class="price">₹ 999</span><span class="actual-price">₹ 1599</span>
                    </div>
                </div>
            </a>


            <a href="product.php?id=5002" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">10% off</span>
                        <img src="public\img\5002-3-bl.jpeg" class="product-thumb" alt="">
                        <button class="card-btn">add to whislist</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Walkaroo</h2>
                        <p class="product-short-des">WALKAROO MEN SOLID THONG SANDALS ART WG5002</p>
                        <span class="price">₹ 299</span><span class="actual-price">₹ 329</span>
                    </div>
                </div>
            </a>

            <a href="product.php?id=4866" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">20% off</span>
                        <img src="public\img\4866-1-crbr.jpeg" class="product-thumb" alt="">
                        <button class="card-btn">add to whislist</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Walkaroo</h2>
                        <p class="product-short-des">WALKAROO WOMEN FLIP FLOP WC4866</p>
                        <span class="price">₹ 269</span><span class="actual-price">₹ 299</span>
                    </div>
                </div>
            </a>

            <a href="product.php?id=5100" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">25% off</span>
                        <img src="public\img\5100-1-bl.jpeg" class="product-thumb" alt="">
                        <button class="card-btn">add to whislist</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Lee Copper</h2>
                        <p class="product-short-des">Polyurethane Slipon Men's Sport Sandals</p>
                        <span class="price">₹ 1499</span><span class="actual-price">₹ 1999</span>
                    </div>
                </div>
            </a>

            <a href="product.php?id=5109" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">30% off</span>
                        <img src="public\img\5109-1-gr.jpeg" class="product-thumb" alt="">
                        <button class="card-btn">add to whislist</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Lee Copper</h2>
                        <p class="product-short-des">Polyurethane Slipon Men's Sport Sandals</p>
                        <span class="price">₹ 1699</span><span class="actual-price">₹ 2199</span>
                    </div>
                </div>
            </a>

            <a href="product.php?id=5687&color=brown" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">10% off</span>
                        <img src="public\img\5687-4-bro.jpeg" class="product-thumb" alt="">
                        <button class="card-btn">add to whislist</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Walkaroo</h2>
                        <p class="product-short-des">Walkaroo Men Cross strap Slide Sandals - W5687</p>
                        <span class="price">₹ 319</span><span class="actual-price">₹ 354</span>
                    </div>
                </div>
            </a>

            <a href="product.php?id=8004" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">25% off</span>
                        <img src="public\img\8004-4-blu.jpeg" class="product-thumb" alt="">
                        <button class="card-btn">add to whislist</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Paragon</h2>
                        <p class="product-short-des">Paragon EVK8004C Unisex Clogs For Kids | Outdoor and Indoor Casual, Durable Clogs</p>
                        <span class="price">₹ 749</span><span class="actual-price">₹ 999</span>
                    </div>
                </div>
            </a>

            <a href="product.php?id=77075" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">10% off</span>
                        <img src="public\img\77075-1-mar.jpeg" class="product-thumb" alt="">
                        <button class="card-btn">add to whislist</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Paragon</h2>
                        <p class="product-short-des">Women's Solea Maroon Sandal</p>
                        <span class="price">₹ 349</span><span class="actual-price">₹ 399</span>
                    </div>
                </div>
            </a>

        </div>
    </section>
    <!-- collections -->
    <section class="collection-container">
        <a href="#" class="collection">
            <img src="public/img/images (2) (7).jpeg" alt="">
            <!-- <p class="collection-title">women <br> apparels</p> -->
        </a>
        <a href="#" class="collection">
            <img src="public/img/5ca32db482e4e2dedc42c0ea9edc93cc.png" alt="">
            <!-- <p class="collection-title">men <br> apparels</p> -->
        </a>
        <a href="#" class="collection">
            <img src="public/img/images (2) (20).jpeg" alt="">
            <!-- <p class="collection-title">accessories</p> -->
        </a>

    </section>
    <br>
    <h2 class="shopByCat">SHOP BY CATEGORY</h2>
    <section class="product">
        <!-- <div class="product-category">best selling</div>
        <button class="pre-btn"><img src="public\img\nextbutton.png" alt="prebtn"></button>
        <button class="nxt-btn"><img src="public\img\nextbutton.png" alt="nxtbtn"></button> -->
        <div id="myBtnContainer">
            <!-- <button class="btn active" onclick="filterSelection('all')"> Show all</button> -->
            <button class="btn active" onclick="filterSelection('mens')"> mens</button>
            <button class="btn" onclick="filterSelection('aurat')"> womens</button>
            <button class="btn" onclick="filterSelection('kids')"> kids</button>
            <!--  <button class="btn" onclick="filterSelection('colors')"> Colors</button> -->
        </div>
        <div class="productcontainer brands">
            <div class="filterDiv mens">

                <a href="select.php?categ=brands&type=walkaroo&grp=m" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">20% off</span>
                            <img src="public\img\5687-1-bla.jpeg" class="product-thumb" alt="">
                            <!-- <button class="card-btn">add to whislist</button> -->
                        </div>
                        <div class="product-info">
                            <h2 class="product-brand">Walkaroo</h2>
                             <!-- <p class="product-short-des">a short line about the cloth..</p> -->
                             <!--<span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv mens" >

                <a href="select.php?categ=brands&type=paragon&grp=m" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">10% off</span>
                            <img src="public\img\1026-2-wh.jpeg" class="product-thumb" alt="">
                            <!-- <button class="card-btn">add to whislist</button> -->
                        </div>
                        <div class="product-info">
                            <h2 class="product-brand">Paragon</h2>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv kids" >

                <a href="select.php?categ=brands&type=venus&grp=k" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">50% off</span>
                            <img src="public\img\568-1-red.jpeg" class="product-thumb" alt="">
                            <!-- <button class="card-btn">add to whislist</button> -->
                        </div>
                        <div class="product-info">
                            <h2 class="product-brand">Venus</h2>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv aurat" >

                <a href="select.php?categ=brands&type=venus&grp=w" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">50% off</span>
                            <img src="public\img\258-1-ma.jpeg" class="product-thumb" alt="">
                            <!-- <button class="card-btn">add to whislist</button> -->
                        </div>
                        <div class="product-info">
                            <div class="product-brand">Venus</div>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv mens" >

                <a href="select.php?categ=brands&type=lee-copper&grp=m" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">30% off</span>
                            <img src="public\img\5002-2-bl.jpeg" class="product-thumb" alt="">
                            <!-- <button class="card-btn">add to whislist</button> -->
                        </div>
                        <div class="product-info">
                            <h2 class="product-brand">Lee Copper</h2>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv aurat" >

                <a href="select.php?categ=brands&type=paragon&grp=w" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">50% off</span>
                            <img src="public\img\8004-1-blu.jpeg" class="product-thumb" alt="">
                            <!-- <button class="card-btn">add to whislist</button> -->
                        </div>
                        <div class="product-info">
                            <div class="product-brand">Paragon</div>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv kids" >

                <a href="select.php?categ=brands&type=campus&grp=k" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">50% off</span>
                            <img src="public\img\2C-1-bl.jpeg" class="product-thumb" alt="">
                            <!-- <button class="card-btn">add to whislist</button> -->
                        </div>
                        <div class="product-info">
                            <div class="product-brand">Campus</div>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv aurat" >

                <a href="select.php?categ=brands&type=walkaroo&grp=w" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">50% off</span>
                            <img src="public\img\4866-1-crbr.jpeg" class="product-thumb" alt="">
                            <!-- <button class="card-btn">add to whislist</button> -->
                        </div>
                        <div class="product-info">
                            <div class="product-brand">Walkaroo</div>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv aurat" >

                <a href="select.php?categ=brands&type=paragon&grp=w" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">50% off</span>
                            <img src="public\img\77075-2-pi.jpeg" class="product-thumb" alt="">
                            <!-- <button class="card-btn">add to whislist</button> -->
                        </div>
                        <div class="product-info">
                            <div class="product-brand">Paragon</div>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv kids" >

                <a href="select.php?categ=brands&type=venus&grp=k" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">50% off</span>
                            <img src="public\img\897-1-wh.jpeg" class="product-thumb" alt="">
                            <!-- <button class="card-btn">add to whislist</button> -->
                        </div>
                        <div class="product-info">
                            <div class="product-brand">Venus</div>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv kids" >

                <a href="select.php?categ=brands&type=paragon&grp=k" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">50% off</span>
                            <img src="public\img\8004-4-blu.jpeg" class="product-thumb" alt="">
                            <!-- <button class="card-btn">add to whislist</button> -->
                        </div>
                        <div class="product-info">
                            <div class="product-brand">Paragon</div>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="filterDiv mens" >

                <a href="select.php?categ=brands&type=campus&grp=m" class="product-link" >
                    <div class="product-card">
                        <div class="product-image">
                            <span class="discount-tag">50% off</span>
                            <img src="public\img\cam.webp" class="product-thumb" alt="">
                            <!-- <button class="card-btn">add to whislist</button> -->
                        </div>
                        <div class="product-info">
                            <h2 class="product-brand">Campus</h2>
                            <!-- <p class="product-short-des">a short line about the cloth..</p>
                             <span class="price">$20</span><span class="actual-price">$40</span> -->
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    

    <section id="brand-sec">
        <h2>BRANDS</h2>
        <div class="brands">
            <a href="select.php?categ=brands&type=walkaroo" class="product-link" >
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="public\img\walbrand.jpg" class="product-thumb" alt="">
                        <!-- <button class="card-btn">add to whislist</button> -->
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Walkaroo</h2>
                        <!-- <p class="product-short-des">a short line about the cloth..</p>
                         <span class="price">$20</span><span class="actual-price">$40</span> -->
                    </div>
                </div>
            </a>
            <a href="select.php?categ=brands&type=paragon" class="product-link" >
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="public\img\parbrand.jpg" class="product-thumb" alt="">
                        <!-- <button class="card-btn">add to whislist</button> -->
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Paragon</h2>
                        <!-- <p class="product-short-des">a short line about the cloth..</p>
                         <span class="price">$20</span><span class="actual-price">$40</span> -->
                    </div>
                </div>
            </a>
            <a href="select.php?categ=brands&type=campus" class="product-link" >
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="public\img\cambrand.jpeg" class="product-thumb" alt="">
                        <!-- <button class="card-btn">add to whislist</button> -->
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Campus</h2>
                        <!-- <p class="product-short-des">a short line about the cloth..</p>
                         <span class="price">$20</span><span class="actual-price">$40</span> -->
                    </div>
                </div>
            </a>
            <a href="select.php?categ=brands&type=lee-copper" class="product-link" >
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="public\img\leebrand.jpeg" class="product-thumb" alt="">
                        <!-- <button class="card-btn">add to whislist</button> -->
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Lee Copper</h2>
                        <!-- <p class="product-short-des">a short line about the cloth..</p>
                         <span class="price">$20</span><span class="actual-price">$40</span> -->
                    </div>
                </div>
            </a>
            <a href="select.php?categ=brands&type=lehar" class="product-link" >
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="public\img\lehbrand.jpeg" class="product-thumb" alt="">
                        <!-- <button class="card-btn">add to whislist</button> -->
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Lehar</h2>
                        <!-- <p class="product-short-des">a short line about the cloth..</p>
                         <span class="price">$20</span><span class="actual-price">$40</span> -->
                    </div>
                </div>
            </a>
            <a href="select.php?categ=brands&type=nike" class="product-link" >
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="public\img\nikbrand.jpeg" class="product-thumb" alt="">
                        <!-- <button class="card-btn">add to whislist</button> -->
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Nike</h2>
                        <!-- <p class="product-short-des">a short line about the cloth..</p>
                         <span class="price">$20</span><span class="actual-price">$40</span> -->
                    </div>
                </div>
            </a>
            <a href="select.php?categ=brands&type=adidas" class="product-link" >
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="public\img\adibrand.jpeg" class="product-thumb" alt="">
                        <!-- <button class="card-btn">add to whislist</button> -->
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Adidas</h2>
                        <!-- <p class="product-short-des">a short line about the cloth..</p>
                         <span class="price">$20</span><span class="actual-price">$40</span> -->
                    </div>
                </div>
            </a>
            <a href="select.php?categ=brands&type=flite" class="product-link" >
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="public\img\flibrand.jpeg" class="product-thumb" alt="">
                        <!-- <button class="card-btn">add to whislist</button> -->
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Flite</h2>
                        <!-- <p class="product-short-des">a short line about the cloth..</p>
                         <span class="price">$20</span><span class="actual-price">$40</span> -->
                    </div>
                </div>
            </a>
        </div>
    </section>
    <section class="del-icon">
        <div class="del-icon-cont">
            <div class="icons">
                <img src="public\img\shiping-icon.svg" alt="" class="del-img">
                <div class="icon-text">
                    On Time Delivery
                </div>
            </div>
            <div class="icons">
                <img src="public\img\reverse-icon.svg" alt="" class="del-img">
                <div class="icon-text">
                    Easy Replacement
                </div>
            </div>
            <div class="icons">
                <img src="public\img\cod-icon.svg" alt="" class="del-img">
                <div class="icon-text">
                    COD Available
                </div>
            </div>
        </div>
    </section>
    <section class="contactus">
        <div class="contact-cont">
            <input type="email" class="contact-input" placeholder="Enter your Email Address">
            <input type="submit" class="contact-input-btn" value="Submit">
        </div>
    </section>
    <footer>
    </footer>
    <script src="public\js\footer.js"></script>
    <script src="public\js\home.js"></script>
    
    <script>
        
    </script>
</body>

</html>