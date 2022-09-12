// menu pc

var Logo = document.querySelector('.logo');
var img = document.querySelector('.img_logo');
var imgSrc =  img.getAttribute('data-src');
var homeUrl = document.querySelector('.home-url').href;

Logo.innerHTML = "<a href="+ homeUrl +"><img src='"  + imgSrc +" ' /></a>"

$(document).ready(function() {
    $(window).scroll(function(event) {
        var pos_body = $('html,body').scrollTop();
        if (pos_body > 40) {
            $('.bg-header2').addClass('sticky');
        }
        else {
            $('.bg-header2').removeClass('sticky');
        }
    })
})

$('.search-home2').on('click',function(){
    $('.input-search-home').slideToggle();
});


// menu mobile

$('#btn-bar').on('click',function(){
    $('.menu-mobile2').slideToggle();
});


$('.search-home-mobile').on('click',function(){
    $('.input-search-home-mobile').slideToggle();
});


$(document).ready(function() {
    $(window).scroll(function(event) {
        var pos_body = $('html,body').scrollTop();
        if (pos_body > 40) {
            $('.all-mobile').addClass('sticky');
        }
        else {
            $('.all-mobile').removeClass('sticky');
        }
    })
})

// slider carousel

$('.carousel_1').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText:["<div class='btn-prev'><i class='fas fa-angle-left'></i></div>","<div class='btn-next'><i class='fas fa-angle-right'></i></div>"],

    autoplay:true,
    autoplayTimeout:8000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

// product home

$('.carousel_2').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText:["<div class='btn-prev2'><i class='fas fa-angle-left'></i></div>","<div class='btn-next2'><i class='fas fa-angle-right'></i></div>"],

    autoplay:true,
    autoplayTimeout:8000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})

// sileder page the lovenote

$('.carousel_3').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText:["<div class='btn-prev'><i class='fas fa-angle-left'></i></div>","<div class='btn-next'><i class='fas fa-angle-right'></i></div>"],

    autoplay:true,
    autoplayTimeout:8000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

// sileder page sản phẩm

$('.carousel_4').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText:["<div class='btn-prev'><i class='fas fa-angle-left'></i></div>","<div class='btn-next'><i class='fas fa-angle-right'></i></div>"],

    autoplay:true,
    autoplayTimeout:8000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})


// bộ quà tặng

$('.carousel_5').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText:["<div class='btn-prev2'><i class='fas fa-angle-left'></i></div>","<div class='btn-next2'><i class='fas fa-angle-right'></i></div>"],

    autoplay:true,
    autoplayTimeout:8000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

// slider trang cửa hàng

$('.carousel_6').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText:["<div class='slider-btn previous'>❮</div>","<div class='slider-btn next'>❯</div>"],

    autoplay:true,
    autoplayTimeout:8000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

// dropdowns

// sản phẩm đóng gói

var openSub1 = document.querySelectorAll('ul.category-product > li.menu-item-258 > a');

openSub1.forEach(function (element) {
    element.classList.add('open-sub1')
})

var html = '<span class="dropdowns1"><i class="fas fa-angle-down"></i></span>';

document.getElementsByClassName("open-sub1")[0].insertAdjacentHTML('afterend',html);

// -----------

var subMenu1 = document.querySelectorAll('ul.category-product > li.menu-item-258 > ul');

subMenu1.forEach(function (element) {
    element.classList.add('subMenu1')
})

$('.dropdowns1').on('click',function(){
    $('.subMenu1').slideToggle();
});


// Đồng uống

var openSub2 = document.querySelectorAll('ul.category-product > li.menu-item-262 > a');

openSub2.forEach(function (element) {
    element.classList.add('open-sub2')
})

var html = '<span class="dropdowns2"><i class="fas fa-angle-down"></i></span>';

document.getElementsByClassName("open-sub2")[0].insertAdjacentHTML('afterend',html);

// -----------

var subMenu2 = document.querySelectorAll('ul.category-product > li.menu-item-262 > ul');

subMenu2.forEach(function (element) {
    element.classList.add('subMenu2')
})

$('.dropdowns2').on('click',function(){
    $('.subMenu2').slideToggle();
});


// set quà tặng

var openSub3 = document.querySelectorAll('ul.category-product > li.menu-item-266 > a');

openSub3.forEach(function (element) {
    element.classList.add('open-sub3')
})

var html = '<span class="dropdowns3"><i class="fas fa-angle-down"></i></span>';

document.getElementsByClassName("open-sub3")[0].insertAdjacentHTML('afterend',html);

// -----------

var subMenu3 = document.querySelectorAll('ul.category-product > li.menu-item-266 > ul');

subMenu3.forEach(function (element) {
    element.classList.add('subMenu3')
})

$('.dropdowns3').on('click',function(){
    $('.subMenu3').slideToggle();
});



