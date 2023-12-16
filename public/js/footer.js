const createFooter = () => {
    let footer = document.querySelector('footer');

    footer.innerHTML = `
    <div class="footer-content">
        <div class="about">
            <div class="logo">
                <img src="public/img/logo1.jpg" alt="">
            </div>
            <div class="about-section">
                <div class="intro">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum vitae, quis autem voluptate eaque nesciunt quidem
                    in, aspernatur tempora inventore quod.
                </div>
                <h3 style="color:teal">Follow Us On<h3>
                <div class="social">
                    <ul>
                    <a href="https://www.instagram.com"><li class="instagram">
                    <img src="public/img/instagram.jpg" alt="ins">
                    </li></a>
                    <a href="www.facebook.com"><li class="facebook">
                    <img src="public/img/facebook.jpg" alt="fac">
                    </li></a>
                    <a href="www.linkedin.com"><li class="insta">
                    <img src="public/img/linkedin.jpg" alt="lin">
                    </li></a>
                    </ul>
                </div>
                <div class="contact">
                    <li class="mobile">Mobile: <a href="">9693808798</a></li>
                    <li class="email">Email: omk738774@gmail.com</li>
                </div>
            </div>
        </div>
        <div class="footer-ul-container">
            <ul class="footer-category">
                <li class="category-title">men</li>
                <li><a href="#" class="footer-link">Shoes</a></li>
                <li><a href="#" class="footer-link">Sandals</a></li>
                <li><a href="#" class="footer-link">Sleepers</a></li>
                <li><a href="#" class="footer-link">Boots</a></li>
                <li><a href="#" class="footer-link">Snekers</a></li>
                <li><a href="#" class="footer-link">Formals</a></li>
                <li><a href="#" class="footer-link">Crocs</a></li>
                <li><a href="#" class="footer-link">Sports</a></li>
                <li><a href="#" class="footer-link"></a></li>
                <li><a href="#" class="footer-link"></a></li>
            </ul>
            <ul class="footer-category">
                <li class="category-title">women</li>
                <li><a href="#" class="footer-link">t-shirts</a></li>
                <li><a href="#" class="footer-link">sweatshirts</a></li>
                <li><a href="#" class="footer-link">shirts</a></li>
                <li><a href="#" class="footer-link">jeans</a></li>
                <li><a href="#" class="footer-link">trousers</a></li>
                <li><a href="#" class="footer-link">shoes</a></li>
                <li><a href="#" class="footer-link">casuals</a></li>
                <li><a href="#" class="footer-link">formals</a></li>
                <li><a href="#" class="footer-link">sports</a></li>
                <li><a href="#" class="footer-link">watch</a></li>
            </ul>
            <ul class="footer-category">
                <li class="category-title">men</li>
                <li><a href="#" class="footer-link">Shoes</a></li>
                <li><a href="#" class="footer-link">Sandals</a></li>
                <li><a href="#" class="footer-link">Sleepers</a></li>
                <li><a href="#" class="footer-link">Boots</a></li>
                <li><a href="#" class="footer-link">Snekers</a></li>
                <li><a href="#" class="footer-link">Formals</a></li>
                <li><a href="#" class="footer-link">Crocs</a></li>
                <li><a href="#" class="footer-link">Sports</a></li>
                <li><a href="#" class="footer-link"></a></li>
                <li><a href="#" class="footer-link"></a></li>
            </ul>
            <ul class="footer-category">
                <li class="category-title">men</li>
                <li><a href="#" class="footer-link">Shoes</a></li>
                <li><a href="#" class="footer-link">Sandals</a></li>
                <li><a href="#" class="footer-link">Sleepers</a></li>
                <li><a href="#" class="footer-link">Boots</a></li>
                <li><a href="#" class="footer-link">Snekers</a></li>
                <li><a href="#" class="footer-link">Formals</a></li>
                <li><a href="#" class="footer-link">Crocs</a></li>
                <li><a href="#" class="footer-link">Sports</a></li>
                <li><a href="#" class="footer-link"></a></li>
                <li><a href="#" class="footer-link"></a></li>
            </ul>
        </div>
    </div>
   
    <p class="footer-credit">Clothing, Best apparels online store</p>
    `;
}

createFooter();