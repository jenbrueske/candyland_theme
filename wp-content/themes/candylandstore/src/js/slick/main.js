jQuery(document).ready(function( $ ) {

    console.log('I am from the main.js file, if you see me, this worked');
    
    $('.menu-item-has-children').on('mouseenter', function() {
        console.log('mouse enter');
        $(this).find('.sub-menu').first().show(); 
    });
    $('.menu-item-has-children').on('mouseleave', function() {
        console.log('mouse enter');
        $(this).find('.sub-menu').first().hide(); 
    });

    // When the user scrolls down 20px from the top of the document, slide down the navbar
    // When the user scrolls to the top of the page, slide up the nav (50px out of the top view)
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 250) {
        $('body').addClass('fixedNav');
    } else {
        $('body').removeClass('fixedNav');
    }
    }
    
});