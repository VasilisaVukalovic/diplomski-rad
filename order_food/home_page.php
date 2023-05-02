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

<?php include './footer.php';?>

<!--footer end--> 