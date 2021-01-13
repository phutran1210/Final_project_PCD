$(document).ready(function() {

    var owl = $('#slide-products');
    owl.owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            769: {
                items: 4
            },
            1025: {
                items: 5
            }
        }
    });


});

new WOW().init();

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function() {

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: true,
        centerMode: true,
        focusOnSelect: true
    });
});