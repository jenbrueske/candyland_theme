jQuery(document).ready(function( $ ) {

console.log('I am from the hero-slider folder, if you see me, this worked');

$('.heroSlides').slick({
    dots: true,
    infinite: true,
    fade: true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 7000

});

});