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
                <li class="category-title">ABOUT COMPANY</li>
                <li><a href="#" class="footer-link">About Us</a></li>
                <li><a href="#" class="footer-link">Contact Us</a></li>
                <li><a href="#" class="footer-link">Store Locator</a></li>
                <li><a href="#" class="footer-link">Blog</a></li>
                <li><a href="#" class="footer-link"></a></li>
            </ul>
            <ul class="footer-category">
                <li class="category-title">ONLINE SHOPPING</li>
                <li><a href="#" class="footer-link">New Arrival</a></li>
                <li><a href="#" class="footer-link">Men</a></li>
                <li><a href="#" class="footer-link">Women</a></li>
                <li><a href="#" class="footer-link">Kids</a></li>
                <li><a href="#" class="footer-link">Brands</a></li>
            </ul>
            <ul class="footer-category">
                <li class="category-title">POLICIES</li>
                <li><a href="#" class="footer-link">Return Policy</a></li>
                <li><a href="#" class="footer-link">Privacy Policy</a></li>
                <li><a href="#" class="footer-link">Terms & Conditions</a></li>
                <li><a href="#" class="footer-link">Shipping Information</a></li>
            </ul>
            <ul class="footer-category">
                <li class="category-title">CUSTOMER SERVICE</li>
                <li><a href="#" class="footer-link">FAQ</a></li>
                <li><a href="#" class="footer-link">Return Request</a></li>
            </ul>
        </div>
    </div>
   
    <p class="footer-credit">Footwear, Best footwear online store</p>
    `;
}

createFooter();