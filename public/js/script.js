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
    ClassicEditor
        .create(document.querySelector('.ckeditor'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
        })
        .catch(error => {
            console.error(error);
        });
})

$('#min-price-range').change(function () {
    $('.value-min-price').text($(this).val());
})

$('#max-price-range').change(function () {
    $('.value-max-price').text($(this).val());
})

function body_load_complete() {
    $('.pade-loader').fadeOut(500);
    $('body').addClass('animate-bottom');
}