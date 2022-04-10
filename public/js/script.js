$(document).ready(function () {
    $('.owl-carousel.home-banner-slider').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        autoPlay: true,
        autoPlaySpeed: 2000,
        autoPlayTimeout: 2000,
        autoplayHoverPause: false,
        pagination: false
    });
})

function body_load_complete() {
    $('.pade-loader').fadeOut(500);
    $('body').addClass('animate-bottom');
}