<?php
include_once 'connection.php';
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $col=$_GET['color'];
}
if(isset($_GET['upd'])){
    $upd=$_GET['upd'];
    if($upd=='e'){
        $quant=$_GET['quant'];
        echo<<<_END
        <script>
            alert("quantity must be less than {$quant} ");
        </script>
        _END;
        
    }
    if($upd=='u'){
        ?>
        <script>
            alert("Your cart is updated successfully!");
        </script>
        <?php
    }
    if($upd=='s'){
        ?>
        <script>
            alert("You have already added this item");
        </script>
        <?php
    }
    if($upd=='i'){
        ?>
        <script>
            alert("Your item is added to cart successfully!");
        </script>
        <?php
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<!-- background-image: url(&quot;http://localhost/SDP_Project/public/img/1026-1-blu.jpeg&quot;); -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon">
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
.recommendation{
    line-height:14px;
} 
@media only screen and (max-width:500px){
    .image-slider{
        width: 60vw;
        height: 60vw;
    }
    .form-container{
        height:70vh;
        top:15%;
    }
}

    </style>
    <style>

        .qa-container {
            margin-bottom: 20px;
        }

        .question, .answer {
            padding: 15px;
            border-radius: 5px;
        }

        .question {
            cursor: pointer;
            background-color: #f0f0f0;
            transition: background-color 0.3s ease-in-out;
        }

        .answer {
            display: none;
            background-color: #D5F5E3;
            color:teal;
            margin-left: 0;
            animation: fadeIn 0.5s ease-in-out;
        }
        .faq-container {
            font-size: 18px;
            line-height: 1.5;
        }
        .faq {
            max-width: 1300px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .cartbtn:hover{
            color:white;
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
            
            <form action="" class="form-container" style="top:5%;z-index:14;overflow-y:scroll">
                <div class="imgchart" style="width:100%;height:400px"><img style="width:100%;height:100%;border:2px solid black" src="public\img\sizechart.jpg" alt=""></div>
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
                <form id="myForm" action="addcart.php" method="get">
                    <br><span class="product-sub-heading">Size Chart :</span><span class="recommendation">size recommendation</span>
                    <div class="size">
                    <?php
                    
                          $sizesql="SELECT `cid` FROM `color` WHERE `product_id`=$id";
                          $ressize=$conn->query($sizesql);
                          $row3=$ressize->fetch_assoc();
                            $i=0;
                              $a=$row3['cid'];
                              $prodessql="SELECT `size` FROM `product_desc` WHERE `cid`=$a";
                              $prodesres=$conn->query($prodessql);
                              while($row4=$prodesres->fetch_assoc())
                              {
                                ?>
                                 <input type="radio" name="size" value="<?php echo $row4['size']; ?>" hidden id="<?php echo $row4['size']; ?>-size" required <?php if ($i == 0) echo "checked"; ?>>
                                 <label for="<?php echo $row4['size']; ?>-size" class="size-radio-btn <?php if ($i == 0) echo "check"; ?>"><?php echo $row4['size']; ?></label>
                                <?php
                                $i+=1;
                              }
          
                          
                         
                    ?>
                    </div>
                        <span class="qty">Quantity: </span><br>
                        <input class="quantity" id="id_form-0-quantity" min="1" name="quantity" value="1" type="number">
                        <input type="hidden" value="<?php echo $col;?>" name="color">
                        <input type="hidden" value="<?php echo $id;?>" name="id">

            <br>
            <input type="submit" class="btn cart-btn cartbtn" value="Add to cart">
            <button class="btn wish-btn" onclick="changeFormAction('wishlist.php')">Add to wishlist</button>

            </form>
            </div>
        </div>
    </section>
    <section class="faq-container faq">
    <div class="qa-container">
            <div class="question" onclick="toggleAnswer('q1')">More Information<span style="float:right;font-size:20px;font-weight:800;">+</span></div>
            <div class="answer" id="q1">   
                  <p><strong>Material:</strong> High-quality leather</p>
                    <p><strong>Color:</strong> Brown</p>
                    <p><strong>Size Options:</strong> Available in various sizes</p>
                    <p><strong>Features:</strong> Waterproof, comfortable insole, durable sole</p></div>
            </div>
    <div class="qa-container">
            <div class="question" onclick="toggleAnswer('q2')">Product Details<span style="float:right;font-size:20px;font-weight:800;">+</span></div>
            <div class="answer" id="q2"> 
            <p>The waterproof design ensures that you can confidently wear them in any weather conditions. The cushioned insole provides maximum comfort, making these shoes ideal for long walks or daily use. The durable rubber sole guarantees long-lasting performance.
        Available in a range of US sizes from 6 to 12, the ComfortStride 2000 caters to different foot sizes. Whether you're heading to the office, a casual outing, or a special event, these shoes complement your style effortlessly.
        Enjoy the convenience of free shipping on all orders, and rest assured with our 30-day return policy. The XYZ Shoes ComfortStride 2000 comes with a 1-year warranty for added peace of mind.</p>
  
            </div>
        </div>
    <div class="qa-container">
            <div class="question" onclick="toggleAnswer('q3')">Return & Exchange Policy<span style="float:right;font-size:20px;font-weight:800;">+</span></div>
            <div class="answer" id="q3">Our return policy allows you to return items within 30 days of purchase. Please see our <a href="return.php">return policy</a> for more details.</div>
        </div>
     </section>
    <section class="product">
        <div class="product-category">You may also like</div>
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


            <a href="product.php?id=5002&color=blue" class="product-link">
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

    function changeFormAction(actions) {
        document.querySelector('#myForm').action = actions;
    }
    </script>
    <script>
    
        function toggleAnswer(questionId) {
            const answer = document.getElementById(questionId);
            if (answer.style.display === "block") {
                answer.style.display = "none";
            } else {
                answer.style.display = "block";
            }
        }
    </script>
</body>

</html>