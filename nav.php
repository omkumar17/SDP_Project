<style>
    
.logindrop{
    display:none;
    position:absolute;
    top:90px;
    /* height:100px; */
    width:100px;
    /* background-color:blue; */
    border:1px solid teal;
    /* display:block; */

}
.logindrop a{
    list-style:none;
    text-decoration:none;
    color:teal;
    /* margin: 2px; */
    text-align:center;
    background-color:red;
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
    }
    @media only screen and (max-width:600px){
        .logindrop{
            top:70px;
        } 
    }
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
                <img class="login"  src="public/img/login.png" alt="" style="cursor:pointer">
                        <div class="logindrop">
                            <?php
                            if(isset($_COOKIE['userID'])){
                                ?>
                                <a href=""><li>Profile</li></a>
                                <a href="logout.php"><li>Logout</li></a>
                                <?php
                            }
                            else{
                                ?>
                                <a href="register.php"><li>Register</li></a>
                                <a href="login.php"><li>Login</li></a>
                                <?php
                            }
                            ?>
                            
                        </div>
                <a class="cart" href=""><img src="public/img/cart.jpg" alt=""></a>
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
        </script>