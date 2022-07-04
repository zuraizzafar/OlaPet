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
    $('.set-banner-for-ad').click(function (e) {
        e.preventDefault();
        $('#ad_banner_image').click();
    })

    $("#ad_banner_image").change(function () {
        readURL(this, '.set-banner-for-ad')
    });

    $('.btn-add-images').click(function (e) {
        e.preventDefault();
        $('#ad_images').click();
    })

    $("#ad_images").change(function () {
        if (this.files) {
            var filesAmount = this.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#selected-images-banner').append(
                        '<div class="item"><img src="' + e.target.result + '"></div>'
                    )
                }

                reader.readAsDataURL(this.files[i]);
            }
        }
    });
})

function readURL(input, target) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(target).css('background-image', 'url(' + e.target.result + ')');
        }

        reader.readAsDataURL(input.files[0]);
    }
}

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