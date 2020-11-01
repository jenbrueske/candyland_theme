jQuery(document).ready(function( $ ) {

    console.log('I am from the product carousel folder, if you see me, this worked');
    
    $('.productSlides').slick({
        dots: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        // autoplay: true,
        autoplaySpeed: 7000
    
    });
    
    });