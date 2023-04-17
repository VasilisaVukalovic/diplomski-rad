let cart = document.querySelector('.cart-items-container');

document.querySelector('#cart-btnn').onclick = function(){
    cart.classList.add('active');
}

document.querySelector('#close-form').onclick =function(){
    cart.classList.remove('active');
}




let nav=document.querySelector('.header .navbar');
let menu=document.querySelector('#menu-btn');
menu.onclick = function()
{
    menu.classList.toggle('fa-times');
    nav.classList.toggle('active');

}

var swiper=new Swiper(".home-slider",{
    grabCursor:true,
    loop:true,
    cnteredSlides:true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});




/*document.querySelector(document).ready(function(){

    document.querySelector('.addToCart').click(function(e)
    {
        e.preventDefault();

        var qty=document.querySelector(this).closest('.box-product-view').querySelector('.number').value;
        //var qty=document.getElementById('number').value
        var prod_id=document.querySelector(this).value;
        alert(prod_id);
    });


});*/


