<script src="public\js\nav.js"></script>
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

<section class="notice">
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
    </section>
        <div class="nav">
            <img src="public/img/logo.jpg" class="brand-logo" alt="">
            <div class="search">
                <input type="text" class="search-box" placeholder="search brand, product">
                <a href="selection.html" class="search-btn"><button>search</button></a>
            </div>
            <div class="right-items">
            
                <div class="usrname">
                    <?php
                        if($name!="")
                        {
                            echo "Welcome ,$name";
                        }
                    ?>
                </div>
                <a class="login" href="login.php"><img  src="public/img/login.png" alt=""></a>
                <a class="cart" href="logout.php"><img src="public/img/cart.jpg" alt=""></a>
                <img src="public/img/menu1.svg" alt="" class="menu">
            </div>
        </div>
        <ul class="links-container" id="link-con">
            <li class="link-item"><a href="index.html" class="link">home</a></li>
            <li class="link-item"><a href="selection.html" class="link">New Arrivals</a></li>
            <li class="link-item women menu-opt"><a  class="link">Women  +</a>
            <ul class="women-drop drop">
            <div class="drop-container">       
            <div class="drop-items">
            <ul class="header-category">
                <li class="header-category-title">SHOES</li>
                <li><a href="#" class="header-link">Sports</a></li>
                <li><a href="#" class="header-link">Casual</a></li>
                <li><a href="#" class="header-link">Loofers</a></li>
                <li><a href="#" class="header-link">Sneakers</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">SANDAL & CLOGS</li>
                <li><a href="#" class="header-link">Sports</a></li>
                <li><a href="#" class="header-link">Sandal</a></li>
                <li><a href="#" class="header-link">Clog</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">FLIP-FLOP</li>
                <li><a href="#" class="header-link">Rubber</a></li>
                <li><a href="#" class="header-link">Sliders</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">FESTIVE & HANDMADE</li>
                <li><a href="#" class="header-link">Heels</a></li>
                <li><a href="#" class="header-link">Flats</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">BRANDS</li>
                <li><a href="#" class="header-link">Walkaroo</a></li>
                <li><a href="#" class="header-link">Paragon</a></li>
                <li><a href="#" class="header-link">Lehar</a></li>
                <li><a href="#" class="header-link">Campus</a></li>
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
                <li><a href="#" class="header-link">Sports</a></li>
                <li><a href="#" class="header-link">Casual</a></li>
                <li><a href="#" class="header-link">Formals</a></li>
                <li><a href="#" class="header-link">Loofers</a></li>
                <li><a href="#" class="header-link">Sneakers</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">SANDAL & CLOGS</li>
                <li><a href="#" class="header-link">Sports</a></li>
                <li><a href="#" class="header-link">Sandal</a></li>
                <li><a href="#" class="header-link">Clog</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">FLIP-FLOP</li>
                <li><a href="#" class="header-link">Hawai</a></li>
                <li><a href="#" class="header-link">Sliders</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">BRANDS</li>
                <li><a href="#" class="header-link">Walkaroo</a></li>
                <li><a href="#" class="header-link">Paragon</a></li>
                <li><a href="#" class="header-link">Campus</a></li>
                <li><a href="#" class="header-link">Nike</a></li>
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
                <li><a href="#" class="header-link">Kids</a></li>
                <li><a href="#" class="header-link">Boys</a></li>
                <li><a href="#" class="header-link">Girls</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">SANDAL & CLOGS</li>
                <li><a href="#" class="header-link">Kids</a></li>
                <li><a href="#" class="header-link">Boys</a></li>
                <li><a href="#" class="header-link">Girls</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">SCHOOL SHOES</li>
                <li><a href="#" class="header-link">Kids</a></li>
                <li><a href="#" class="header-link">Boys</a></li>
                <li><a href="#" class="header-link">Girls</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">BRANDS</li>
                <li><a href="#" class="header-link">Walkaroo</a></li>
                <li><a href="#" class="header-link">Paragon</a></li>
                <li><a href="#" class="header-link">Campus</a></li>
                <li><a href="#" class="header-link">Venus</a></li>
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
                <li><a href="#" class="header-link">Cushion</a></li>
                <li><a href="#" class="header-link">Normal</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">SOCKS</li>
                <li><a href="#" class="header-link">Sports</a></li>
                <li><a href="#" class="header-link">Long</a></li>
                <li><a href="#" class="header-link">School</a></li>
                <li><a href="#" class="header-link">Cut Socks</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">LACES</li>
                <li><a href="#" class="header-link">Sports</a></li>
                <li><a href="#" class="header-link">School</a></li>
                <li><a href="#" class="header-link">Formals</a></li>
            </ul>
            <ul class="header-category">
                <li class="header-category-title">POLISH</li>
                <li><a href="#" class="header-link">Black</a></li>
                <li><a href="#" class="header-link">Brown</a></li>
                <li><a href="#" class="header-link">White</a></li>
            </ul>
            </div>
            </div>
            <div class="drop-img"><img src="public/img/accessdrop.jpeg.jpg" alt=""></div>
            </ul>
            </li>
            
        </ul>

