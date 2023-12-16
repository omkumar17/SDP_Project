const createNav = () => {
    let nav = document.querySelector('.navbar');

    nav.innerHTML = `
        <div class="nav">
            <img src="public/img/logo1.jpg" class="brand-logo" alt="">
            <div class="search">
                <input type="text" class="search-box" placeholder="search brand, product">
                <a href="selection.html" class="search-btn"><button>search</button></a>
            </div>
            <div class="right-items">
                <a class="login" href=""><img  src="public/img/login.png" alt=""></a>
                <a class="cart" href=""><img src="public/img/cart.jpg" alt=""></a>
                <img src="public/img/menu.jpg" alt="" class="menu">
            </div>
        </div>
        <ul class="links-container" id="link-con">
            <li class="link-item"><a href="index.html" class="link">home</a></li>
            <li class="link-item"><a href="selection.html" class="link">New Arrivals</a></li>
            <li class="link-item women menu-opt"><a  class="link">women  +</a>
            <ul class="women-drop drop">
            <div class="drop-container">
            <span class="cross">X</span>         
            <div class="drop-items">
            <a href="selection.html"><li>Sandals</li></a>
            <a href="selection.html"><li>Shoes</li></a>
            <a href="selection.html"><li>Flip-Flops</li></a>
            <a href="selection.html"><li>Sleepers</li></a>
            <a href="selection.html"><li>Crocs</li></a>
            </div>
            </div>
            <div class="drop-img"><img src="public/img/logo-footfusion.png" alt=""></div>
            </ul>
            </li>
            <li class="link-item mens menu-opt"><a class="link">men  +</a>
            <ul class="mens-drop drop">
            <div class="drop-container">
            <span class="cross">X</span>
            <div class="drop-items">
            <a href="selection.html"><li>Sandals</li></a>
            <a href="selection.html"><li>Shoes</li></a>
            <a href="selection.html"><li>Sliders</li></a>
            <a href="selection.html"><li>Sleepers</li></a>
            <a href="selection.html"><li>Crocs</li></a>
            </div>
            </div>
            <div class="drop-img"><img src="public/img/logo-footfusion.png" alt=""></div>
            </ul>
            </li>
            <li class="link-item kids menu-opt"><a  class="link">kids  +</a>
            <ul class="kids-drop drop">
            <div class="drop-container">
            <span class="cross">X</span>
            <div class="drop-items">
            <a href="selection.html"><li>Sandals</li></a>
            <a href="selection.html"><li>Shoes</li></a>
            <a href="selection.html"><li>Sliders</li></a>
            <a href="selection.html"><li>Sleepers</li></a>
            <a href="selection.html"><li>Crocs</li></a>
            </div>
            </div>
            <div class="drop-img"><img src="public/img/logo-footfusion.png" alt=""></div>
            </ul>
            </li>
            <li class="link-item access menu-opt"><a class="link">accessories  +</a>
            <ul class="access-drop drop">
            <div class="drop-container">
            <span class="cross">X</span>
            <div class="drop-items">
            <a href="selection.html"><li>Insoles</li></a>
            <a href="selection.html"><li>Socks</li></a>
            <a href="selection.html"><li>Laces</li></a>
            <a href="selection.html"><li>Shoe-Polish</li></a>
            <a href="selection.html"><li>Stickers</li></a>
            </div>
            </div>
            <div class="drop-img"><img src="public/img/logo-footfusion.png" alt=""></div>
            </ul>
            </li>
            <li class="end-links">-------</li>
            
        </ul>

    `;
}

createNav();
// const menuButtons = document.getElementsByClassName("menu");

// for (let i = 0; i < menuButtons.length; i++) {
//     menuButtons[i].onclick = function () {
//         const drop = document.getElementsByClassName("links-container")[i];
//         // readMoreParagraph.style.visibility = "hidden";
//         // readMoreParagraph.style.display = "none";
//         // readMoreParagraph.classList.toggle("hidden");
//         drop.classList.toggle("visible");
//     }
// }
const menubtn = document.querySelector(".menu");
const menuitem = document.querySelector(".links-container");
const menuopt = document.querySelectorAll(".menu-opt");
const drop = document.querySelectorAll(".drop");


menubtn.onclick = function () {
    menuitem.classList.toggle("visible");
    console.log("Menu button clicked");
    console.log("link-container class list:", menuitem.classList);
};
if(screen.width <= 1068){

    for(let i=0;i<menuopt.length;i++){
        menuopt[i].onclick = function () {
            // menuopt[i].classList.toggle("list-style");
            drop[i].classList.toggle("visible");
            console.log("button clicked");
            console.log("link class list:", menuopt[i].classList);
        };
    };
};




