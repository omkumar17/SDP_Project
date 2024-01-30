<style>
    .nav{
        width:100%;
    }
     .lighter-text {
            color: #ABB0BE;
        }

        .main-color-text {
            color: $main-color;
        }

        .badge {
            background-color: #6394F8;
            border-radius: 10px;
            color: white;
            display: inline-block;
            font-size: 12px;
            line-height: 1;
            padding: 3px 7px;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
        }

        .shopping-cart {
            margin: 20px 0;
            float: right;
            background: white;
            width: 363px;
            position: absolute;
            top:72px;
            right:47px;
            border-radius: 3px;
            padding: 20px;
            display:none;
            /* border:2px solid black; */
            box-shadow:0px 0px 20px black;
        }


        .shopping-cart-header {
            border-bottom: 1px solid #E8E8E8;
            padding-bottom: 15px;
        }

        .shopping-cart-total {
                float: right;
                }
        

            .shopping-cart-items {

                padding-top: 20px;
            

                li {
                    margin-bottom: 18px;
                    list-style:none;
                }

                img {
                    float: left;
                    margin-right: 12px;
                }

                .item-name {
                    display: block;
                    padding-top: 10px;
                    font-size: 16px;
                }

                .item-price {
                    color: $main-color;
                    margin-right: 8px;
                }

                .item-quantity {
                    color: $light-text;
                }
            }

        

        .shopping-cart:after {
            bottom: 100%;
            left: 89%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: white;
            border-width: 8px;
            margin-left: -8px;
        }

        .cart-icon {
            color: #515783;
            font-size: 24px;
            margin-right: 7px;
            float: left;
        }




        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }
   .search form{
    width:100%;
    display:flex;
    flex-direction:row;
} 
.checkout{
    text-decoration:none;
    background-color:blue;
    color:white;
    height:1000px;
    width:250px;
}
.logindrop{
    display:none;
    position:absolute;
    top:100px;
    /* height:100px; */
    width:150px;
    /* background-color:blue; */
    border:1px solid white;
    /* display:block; */

}
.logindrop a{
    list-style:none;
    text-decoration:none;
    color:black;
    /* margin: 2px; */
    text-align:center;
    /* background-color:red; */
    border:1px solid white;
    /* width:100px; */
    display:block;
    /* padding: 1px; */
}
.logindrop a li{
    padding:7px;
    display:flex;
    flex-direction:row;
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
    /* @media only  screen and (max-width:434px){
        .search{
            top:80px;
        }
    } */
</style>
<?php
include_once 'connection.php';
if(isset($_COOKIE['userID']))
{
    $sql="SELECT * FROM `user` WHERE `userID`='$user'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $name=$row['fname'];
}
?>
<head><link rel="icon" href="public/img/ff logo.jpeg" type="image/x-icon"></head>
<section class="notice">
        <div class="notice-slider">
            <div class="notice-container">
                <div class="notice-parent">
                    <div class="notice-content"><p>Get 50% off on your first order</p></div>
                    <div class="notice-content"><p>Shop great brands at an even better price</p></div>
                    <div class="notice-content"><p>Receive a free gift with purchase</p></div>
                    <div class="notice-content"><p>Great Freedom Festival | Live noe</p></div>
                </div>
            </div>
        </div>
    </section>
        <div class="nav">
            <img src="public/img/logo.jpg" class="brand-logo" alt="">
            <div class="search">
            <form action="search.php" method="get">
                <input type="text" name="search" class="search-box" placeholder="search brand, product" style="text-transform:none" required>
                <button type="submit" class="search-btn">Search</button>
            </form>
                <!-- <input type="text" name="search" class="search-box" placeholder="search brand, product">
                <a href="select.php?" class="search-btn"><button>search</button></a> -->
            </div>
            <div class="right-items">
            
                <div class="usrname">

                </div>
                <img class="login"  src="public/img/login.png" alt="" style="cursor:pointer">
                        <div class="logindrop" style="width:150px;background:white;border-top:4px solid teal;">
                            <?php
                            if(isset($_COOKIE['userID'])){
                                ?>
                                <a><li style="color:teal;font-weight:bold;font-size:15px;border-color:white;">
                                <?php
                                    if($name!="")
                                    {
                                        echo "Logged in as $name";
                                    }
                                ?>
                                </li></a>
                                <a href="customerpanel.php"><li style="border-color:white;"><img src="public\img\square-user-round.png" alt="">&nbsp;&nbsp; Profile</li></a>
                                <a href="logout.php"><li style="border-color:white;"><img src="public\img\logut.png" alt="">&nbsp;&nbsp; Logout</li></a>
                                <?php
                            }
                            else{
                                ?>
                                <a href="register.php"><li style="border-color:white;"><img src="public\img\book-lock.png" alt="">&nbsp;&nbsp; Register</li></a>
                                <a href="login.php"><li style="border-color:white;"><img src="public\img\logn.png" alt="">&nbsp;&nbsp; Login</li></a>
                                <?php
                            }
                            ?>
                            
                        </div>
                        <?php
                           $sql="SELECT * FROM `cart_tbl` WHERE user_id='$user' AND p_quantity!=0";
                           $result=$conn->query($sql);
                           $total=0.0;
                           
                           ?>
                        <a class="cart" href="cart.php"><img src="public/img/cart.jpg" alt=""></a>
                <div class="shopping-cart">
            <ul class="shopping-cart-items">
                        <?php
                        if($result->num_rows !=0){
                           while($row=$result->fetch_assoc())
                           {
                               $crtid=$row['cartID'];
                               $crtsize=$row['p_size'];
                               $crtprid=$row['product_id'];
                               $crtquan=$row['p_quantity'];
                               $crtcol=$row['p_color'];
                               $crtsql="SELECT * FROM `product_desc` INNER JOIN `color` ON color.cid=product_desc.cid  INNER JOIN `image` ON image.cid=color.cid INNER JOIN `product` ON product.Product_id=color.product_id  WHERE product.Product_id='$crtprid' AND product_desc.size='$crtsize' AND color.color='$crtcol'";
                               $crtresult=$conn->query($crtsql);
                               $crtrow=$crtresult->fetch_assoc();   
                                ?>
                <!--end shopping-cart-header -->

                        
                                <li class="clearfix">
                                    <img src="<?php echo $crtrow['Image_path1'];?>" height="100px" alt="item1" />
                                    <span class="item-name"><?php echo $crtrow['product_details'];?></span>
                                    <span class="item-price"><?php echo $crtrow['price'];?></span>
                                    <span class="item-quantity">Quantity: <?php echo $crtquan;?></span>
                                </li>
                            <?php
                            $total=$total+($crtrow['price']*$crtquan);
                           }
                        }
                        else{
                            ?>
                            <div class="emptycart">no items in the cart</div>
                            <?php
                        }
                           ?>
                           <div class="shopping-cart-header">
                <i class="fa fa-shopping-cart cart-icon"></i><span class="badge"><?php echo $result->num_rows;?></span>
                <div class="shopping-cart-total">
                    <span class="lighter-text">Total:</span>
                    <span class="main-color-text"><?php echo $total;?></span>
                </div>
            </div> 
                        </ul>
                    </div> 
                <img src="public/img/menu1.svg" alt="" class="menu">
            </div>
        </div>
        <ul class="links-container" id="link-con">
            <li class="link-item"><a href="index.php" class="link">Home</a></li>
            <li class="link-item"><a href="select.php" class="link">New Arrivals</a></li>
            <li class="link-item women menu-opt"><a  class="link">Women  +</a>
            <ul class="women-drop drop">
            <div class="drop-container">       
            <div class="drop-items">
            <ul class="header-category">
                <li class="header-category-title">SHOES</li>
                <li><a href="select.php?categ=shoes&type=casual&grp=w" class="header-link">Casual</a></li>
                <li><a href="select.php?categ=shoes&type=sports&grp=w" class="header-link">Sports</a></li>
                <li><a href="select.php?categ=shoes&type=loofers&grp=w" class="header-link">Loofers</a></li>
                <li><a href="select.php?categ=shoes&type=sneakers&grp=w" class="header-link">Sneakers</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">SANDAL & CLOGS</li>
                <li><a href="select.php?categ=sandals&type=sports&grp=w" class="header-link">Sports</a></li>
                <li><a href="select.php?categ=sandals&type=sandals&grp=w" class="header-link">Sandal</a></li>
                <li><a href="select.php?categ=sandals&type=clog&grp=w" class="header-link">Clog</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">FLIP-FLOP</li>
                <li><a href="select.php?categ=flip-flop&type=rubber&grp=w" class="header-link">Rubber</a></li>
                <li><a href="select.php?categ=flip-flop&type=slipers&grp=w" class="header-link">Sliders</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">FESTIVE & HANDMADE</li>
                <li><a href="select.php?categ=festival&type=heels&grp=w" class="header-link">Heels</a></li>
                <li><a href="select.php?categ=festival&type=flats&grp=w" class="header-link">Flats</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">BRANDS</li>
                <li><a href="select.php?categ=brands&type=walkaroo&grp=w" class="header-link">Walkaroo</a></li>
                <li><a href="select.php?categ=brands&type=paragon&grp=w" class="header-link">Paragon</a></li>
                <li><a href="select.php?categ=brands&type=lehar&grp=w" class="header-link">Lehar</a></li>
                <li><a href="select.php?categ=brands&type=campus&grp=w" class="header-link">Campus</a></li>
            </ul>
            </div>
            </div>
            <div class="drop-img"><img src="public/img/womandrpimg.jpg" alt=""></div>
            </ul>
            </li>
            <li class="link-item mens menu-opt"><a class="link">Men  +</a>
            <ul class="mens-drop drop">
            <div class="drop-container">
            <span class="cross">X</span>
            <div class="drop-items">
            <ul class="header-category">
                <li class="header-category-title">SHOES</li>
                <li><a href="select.php?categ=shoes&type=casual&grp=m" class="header-link">Casual</a></li>
                <li><a href="select.php?categ=shoes&type=sports&grp=m" class="header-link">Sports</a></li>
                <li><a href="select.php?categ=shoes&typeformals=&grp=m" class="header-link">Formals</a></li>
                <li><a href="select.php?categ=shoes&type=loofers&grp=m" class="header-link">Loofers</a></li>
                <li><a href="select.php?categ=shoes&type=sneakers&grp=m" class="header-link">Sneakers</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">SANDAL & CLOGS</li>
                <li><a href="select.php?categ=sandals&type=sports&grp=m" class="header-link">Sports</a></li>
                <li><a href="select.php?categ=sandals&type=sandals&grp=m" class="header-link">Sandals</a></li>
                <li><a href="select.php?categ=sandals&type=clog&grp=m" class="header-link">Clog</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">FLIP-FLOP</li>
                <li><a href="select.php?categ=flip-flop&type=hawai&grp=m" class="header-link">Hawai</a></li>
                <li><a href="select.php?categ=flip-flop&type=sliders&grp=m" class="header-link">Sliders</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">BRANDS</li>
                <li><a href="select.php?categ=brands&type=walkaroo&grp=m" class="header-link">Walkaroo</a></li>
                <li><a href="select.php?categ=brands&type=paragon&grp=m" class="header-link">Paragon</a></li>
                <li><a href="select.php?categ=brands&type=campus&grp=m" class="header-link">Campus</a></li>
                <li><a href="select.php?categ=brands&type=nike&grp=m" class="header-link">Nike</a></li>
            </ul>
            </div>
            </div>
            <div class="drop-img"><img src="public/img/mendropimg.jpeg.jpg" alt=""></div>
            </ul>
            </li>
            <li class="link-item kids menu-opt"><a  class="link">Kids  +</a>
            <ul class="kids-drop drop">
            <div class="drop-container">
            <span class="cross">X</span>
            <div class="drop-items">
            <ul class="header-category">
                <li class="header-category-title">SHOES</li>
                <li><a href="select.php?categ=shoes&type=kids&grp=k" class="header-link">Kids</a></li>
                <li><a href="select.php?categ=shoes&type=boys&grp=k" class="header-link">Boys</a></li>
                <li><a href="select.php?categ=shoes&type=girls&grp=k" class="header-link">Girls</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">SANDAL & CLOGS</li>
                <li><a href="select.php?categ=sandals&type=kids&grp=k" class="header-link">Kids</a></li>
                <li><a href="select.php?categ=sandals&type=boys&grp=k" class="header-link">Boys</a></li>
                <li><a href="select.php?categ=sandals&type=girls&grp=k" class="header-link">Girls</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">SCHOOL SHOES</li>
                <li><a href="select.php?categ=school&type=kids&grp=k" class="header-link">Kids</a></li>
                <li><a href="select.php?categ=school&type=boys&grp=k" class="header-link">Boys</a></li>
                <li><a href="select.php?categ=school&type=girls&grp=k" class="header-link">Girls</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">BRANDS</li>
                <li><a href="select.php?categ=brands&type=walkaroo&grp=k" class="header-link">Walkaroo</a></li>
                <li><a href="select.php?categ=brands&type=paragon&grp=k" class="header-link">Paragon</a></li>
                <li><a href="select.php?categ=brands&type=campus&grp=k" class="header-link">Campus</a></li>
                <li><a href="select.php?categ=brands&type=venus&grp=k" class="header-link">Venus</a></li>
            </ul>
            </div>
            </div>
            <div class="drop-img"><img src="public/img/kidsdropimg.jpg" alt=""></div>
            </ul>
            </li>
            <li class="link-item access menu-opt"><a class="link">Accessories  +</a>
            <ul class="access-drop drop">
            <div class="drop-container">
            <span class="cross">X</span>
            <div class="drop-items">
            <ul class="header-category">
                <li class="header-category-title">INSOLES</li>
                <li><a href="select.php?categ=insoles&type=cushion" class="header-link">Cushion</a></li>
                <li><a href="select.php?categ=insoles&type=normal" class="header-link">Normal</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">SOCKS</li>
                <li><a href="select.php?categ=socks&type=sports" class="header-link">Sports</a></li>
                <li><a href="select.php?categ=socks&type=long" class="header-link">Long</a></li>
                <li><a href="select.php?categ=socks&type=school" class="header-link">School</a></li>
                <li><a href="select.php?categ=socks&type=cut" class="header-link">Cut Socks</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">LACES</li>
                <li><a href="select.php?categ=laces&type=sports" class="header-link">Sports</a></li>
                <li><a href="select.php?categ=laces&type=school" class="header-link">School</a></li>
                <li><a href="select.php?categ=laces&type=formals" class="header-link">Formals</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">POLISH</li>
                <li><a href="select.php?categ=polish&type=black" class="header-link">Black</a></li>
                <li><a href="select.php?categ=polish&type=brown" class="header-link">Brown</a></li>
                <li><a href="select.php?categ=polish&type=white" class="header-link">White</a></li>
            </ul>
            </div>
            </div>
            <div class="drop-img"><img src="public/img/accessdrop.jpeg.jpg" alt=""></div>
            </ul>
            </li>
            
        </ul>

        <script src="public\js\nav.js"></script>
        <script>
            const login=document.querySelector(".login");
const loginitem=document.querySelector(".logindrop");

login.onclick = function () {
    loginitem.classList.toggle("visible");
    // console.log("Menu button clicked");
    // console.log("link-container class list:", menuitem.classList);
};
if(screen.width> 1068){
var cart=document.querySelector(".cart");
var shopping=document.querySelector(".shopping-cart");
cart.addEventListener("mouseover",()=>{
    shopping.style.display="block";
})
cart.addEventListener("mouseout",()=>{
    shopping.style.display="none";
})
}
        </script>
        