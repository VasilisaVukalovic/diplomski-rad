<?php 


include './header.php';
?>
<!--home slider-->
<section class="home" id="home">
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
        <div class="swiper-slide slide" style="background: url(./foods_image/home.jpg) no-repeat;">
            <div class="content">
                <h3 style="
                    font-size: 4rem;
                    font-family: 'Dancing Script', cursive;
                    ">Welcome to <br/>Online delicious  food ordering
                </h3>
            </div>
        </div>
        <div class="swiper-slide slide" style="background: url(./foods_image/slide2.jpg) no-repeat;">
            <div class="content">
                <h3 style="
                    font-size: 4rem;
                    font-family: 'Dancing Script', cursive;
                    ">Welcome to <br/>Online delicious  food ordering
                </h3>
            </div>
        </div>
        </div>
        <div class="swiper-button-next" style="color:white;"></div>
        <div class="swiper-button-prev" style="color:white;"></div>
    </div>
</section>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="./javascript.js"></script>
<!--home end-->
<!--about--> 
<section class="about" id="about">

    <h1 class="heading"><span>about</span>  us</h1>
    <div class="row">
        <div class="image" >
            <img src="./foods_image/about1.jpg" style="border-radius:20px;">
        </div>
        <div class="content">
            <h3>Good things come to those <span>who cook</span> for others</h3>
            <p>Here you can find top-quality burgers, sandwiches, 
                pizzas or salads made from top-quality and fresh ingredients and many other dishes that you can enjoy every day.
            </p>
            <p>All that is needed for the finest food are quality and fresh ingredients, skilled hands and a little love.
                <br/>We are waiting for you. 🙂
            </p>
        </div>
    </div>
</section>
<!--about end-->

<!--footer--> 
<section class="footer">
    <div class="box-container-footer">
        <div class="box-footer">
            <span class="icon">
                <i class="fa-solid fa-utensils"  style="font-size: 2.4rem;"></i>
            </span>
             <span class="title" style="font-family: 'Dancing Script', cursive; font-size:2.5rem; font-weight:bold; color:var(--secondary-color);"> Food Delicious</span>
            <div class="share">
                <a href="http://www.facebook.com" target="_blank" class="fab fa-facebook-f"></a>
                <a href="http://www.twitter.com" target="_blank" class="fab fa-twitter"></a>
                <a href="http://
                www.instagram.com" target="_blank" class="fab fa-instagram"></a>
            </div>
        </div>
        <div class="box-footer">
            <h3>Address</h3>
            <p>Vuka Karadzica 30</p>
            <p>Lukavica 71123</p>
            <p>Bosna i Hercegovina</p>
            <p>fooddelivery@gmail.com</p>
            <p>+387 66 123 098</p>
        </div>
        <div class="box-footer">
            <h3>Links</h3>
            <ul type="none" class="link">
                <li><a href="#">Home</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Category</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>

        <div class="box-footer">
            <h3>Opening hours</h3>
            <p>Monday - Friday 9:00 - 23:00<br/>Saturday 8:00 - 24:00</p>
            <p>+387 65 123 098</p>
        </div>
    </div>

    <div class="create">Vasilisa Vukalovic Diplomski rad 2023,<span> All rights reserved</span></div>
</section>
<!--footer end--> 