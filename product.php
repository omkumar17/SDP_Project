<?php
include_once 'connection.php';
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $col=$_GET['color'];
}

?>
<!DOCTYPE html>
<html lang="en">
<!-- background-image: url(&quot;http://localhost/SDP_Project/public/img/1026-1-blu.jpeg&quot;); -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="public\css\home.css">
    <link rel="stylesheet" href="public\css\product.css">
    <style>
        .image-slider {
    width: 40vw;
    height: 40vw;
    position: relative;
    /* background-image: url(''); */
    background-size: contain;
    background-repeat: no-repeat;
    /* box-shadow: 1px 1px 20px black; */
    margin: 0 5%;
    /* position: sticky; */
    top: 0px;
}
.colorpro{
    width:64px;
}
    </style>
</head>

<body>
    <nav class="navbar"><?php include_once 'nav.php'; ?></nav>
    <section class="product-details">
    <?php
        $imgsql="SELECT * FROM `product` JOIN color ON product.Product_id = color.product_id JOIN image ON color.cid = image.cid WHERE product.Product_id=$id";
        $imgres=$conn->query($imgsql);
        $imgrow=$imgres->fetch_assoc();
    ?>
        <div class="image-slider" style="background-image:url('http://localhost/SDP_Project/<?php echo $imgrow['Image_path1']; ?>')">
            <div class="product-images">
                    <img src="<?php echo $imgrow['Image_path1']; ?>" class="active" alt="">
                    <img src="<?php echo $imgrow['Image_path2']; ?>" alt="">
                    <img src="<?php echo $imgrow['Image_path3']; ?>" alt="">
                    <img src="<?php echo $imgrow['Image_path4']; ?>" alt="">
                    <?php
                ?> 
                
            </div>
        </div>

        <!-- image slider -->
        <div class="details">
            <?php
                $sql="SELECT * FROM `product` WHERE `Product_id`='$id'";
                $result=$conn->query($sql);
                $row=$result->fetch_assoc();
            ?>
            <div class="product-brand"><?php echo $row['product_name']; ?></div>
            <p class="product-short-des"><?php echo $row['product_details']; ?></p>
            <span class="product-price"><?php echo "₹".$row['price']; ?></span>
            <span class="product-actual-price"><?php echo "₹".$row['actual_price']; ?></span>
            <span class="product-discount">( 30% off )</span><br><br>
            <?php
            $sum=0;
            $flag="IN STOCK";
                $colsql="SELECT * FROM `color` WHERE `product_id`=$id";
                $colres=$conn->query($colsql);
                while($row=$colres->fetch_assoc())
                {
                    $a=$row['cid'];
                    $prodessql="SELECT `quantity` FROM `product_desc` WHERE `cid`=$a";
                    $prodesres=$conn->query($prodessql);
                    while($row1=$prodesres->fetch_assoc())
                    {
                        $sum+=$row1['quantity'];
                    }

                }
                if($sum>0)
                {
                    $flag="IN STOCK";
                }
                else
                {
                    $flag="OUT OF STOCK";
                }
            ?>
            <span class="avail">Availability: <span class="avail-value"><?php echo $flag; ?></span></span>
            
            <form action="" class="form-container">
                <span>ENTER YOUR SIZE</span>
                <input type="number" class="size-height box" placeholder="Enter your height in cm" name="height">
                <input type="number" class="feet-height box" placeholder="Enter your feet length in cm" name="feet">
                <div class="button">
                    <input type="submit" class="cancel box" name="cancel" value="cancel">
                    <input type="submit" class="submit box" name="submit">
                </div>
                <span class="result box"></span>

            </form>
            <div class="prod-form">
                <form action="addcart.php" method="get">
                    <br><span class="product-sub-heading">select size</span><span class="recommendation">size recommendation</span>
                    <div class="size">
                    <?php
                    
                          $sizesql="SELECT `cid` FROM `color` WHERE `product_id`=$id";
                          $ressize=$conn->query($sizesql);
                          $row3=$ressize->fetch_assoc();
                          
                              $a=$row3['cid'];
                              $prodessql="SELECT `size` FROM `product_desc` WHERE `cid`=$a";
                              $prodesres=$conn->query($prodessql);
                              while($row4=$prodesres->fetch_assoc())
                              {
                                ?>
                                 <input type="radio" name="size" value="<?php echo $row4['size']; ?>" hidden id="<?php echo $row4['size']; ?>-size" required>
                                 <label for="<?php echo $row4['size']; ?>-size" class="size-radio-btn"><?php echo $row4['size']; ?></label>
                                <?php
                              }
          
                          
                         
                    ?>
                    </div>
                        
                    
                        <span class="qty">Quantity: </span><br>
                        <input class="quantity" id="id_form-0-quantity" min="1" name="quantity" value="1" type="number">
                
                        <input type="hidden" value="<?php echo $col;?>" name="color">
                        <input type="hidden" value="<?php echo $id;?>" name="id">

            <br><button class="btn cart-btn">add to cart</button>
            <button class="btn wish-btn">add to wishlist</button>
            </form>
            </div>
        </div>
    </section>
    <section class="detail-des">
        <div class="heading">description</div>
        <p class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae ad illo dolor voluptatem
            facere, eius veritatis consectetur et provident, quia mollitia, enim voluptates. r ipsa sunt maxime minima
            exercitationem non.</p>
    </section>

    <!-- <button class="pre-btn"><img src="" alt="prebtn"></button>
        <button class="nxt-btn"><img src="" alt="nxtbtn"></button> -->
    <section class="product">
        <div class="product-category">best selling</div>
        <button class="pre-btn"><img src="public\img\nextbutton.png" alt="prebtn"></button>
        <button class="nxt-btn"><img src="public\img\nextbutton.png" alt="nextbtn"></button>
        <div class="product-container">
            <a href="product.html" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="" class="product-thumb" alt="">
                        <button class="card-btn">add to whislist</button>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">brand1</div>
                        <p class="product-short-des">a short line about the cloth..</p>
                        <span class="price">$20</span><span class="actual-price">$40</span>
                    </div>
                </div>
            </a>
            <a href="product.html" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="" class="product-thumb" alt="">
                        <button class="card-btn">add to whislist</button>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">brand1</div>
                        <p class="product-short-des">a short line about the cloth..</p>
                        <span class="price">$20</span><span class="actual-price">$40</span>
                    </div>
                </div>
            </a>
            <a href="product.html" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="" class="product-thumb" alt="">
                        <button class="card-btn">add to whislist</button>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">brand1</div>
                        <p class="product-short-des">a short line about the cloth..</p>
                        <span class="price">$20</span><span class="actual-price">$40</span>
                    </div>
                </div>
            </a>
            <a href="product.html" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="" class="product-thumb" alt="">
                        <button class="card-btn">add to whislist</button>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">brand1</div>
                        <p class="product-short-des">a short line about the cloth..</p>
                        <span class="price">$20</span><span class="actual-price">$40</span>
                    </div>
                </div>
            </a>
            <a href="product.html" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="" class="product-thumb" alt="">
                        <button class="card-btn">add to whislist</button>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">brand1</div>
                        <p class="product-short-des">a short line about the cloth..</p>
                        <span class="price">$20</span><span class="actual-price">$40</span>
                    </div>
                </div>
            </a>
            <a href="product.html" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="" class="product-thumb" alt="">
                        <button class="card-btn">add to whislist</button>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">brand1</div>
                        <p class="product-short-des">a short line about the cloth..</p>
                        <span class="price">$20</span><span class="actual-price">$40</span>
                    </div>
                </div>
            </a>
            <a href="product.html" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="" class="product-thumb" alt="">
                        <button class="card-btn">add to whislist</button>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">brand1</div>
                        <p class="product-short-des">a short line about the cloth..</p>
                        <span class="price">$20</span><span class="actual-price">$40</span>
                    </div>
                </div>
            </a>
            <a href="product.html" class="product-link">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="" class="product-thumb" alt="">
                        <button class="card-btn">add to whislist</button>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">brand1</div>
                        <p class="product-short-des">a short line about the cloth..</p>
                        <span class="price">$20</span><span class="actual-price">$40</span>
                    </div>
                </div>
            </a>
        </div>
    </section>
    <footer></footer>
    <script src="public\js\nav.js"></script>
    <script src="public\js\footer.js"></script>
    <script src="public\js\home.js"></script>
    <script src="public\js\product.js"></script>
    <script>
        const productImages = document.querySelectorAll(".product-images img"); // selecting all image thumbs
const productImageSlide = document.querySelector(".image-slider"); // seclecting image slider element

let activeImageSlide = 0; // default slider image

productImages.forEach((item, i) => { // loopinh through each image thumb
    item.addEventListener('click', () => { // adding click event to each image thumbnail
        productImages[activeImageSlide].classList.remove('active'); // removing active class from current image thumb
        item.classList.add('active'); // adding active class to the current or clicked image thumb
        productImageSlide.style.backgroundImage = `url('${item.src}')`; // setting up image slider's background image
        activeImageSlide = i; // updating the image slider variable to track current thumb
    })
})
    </script>
       
</body>

</html>