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

    $('.btn.myAccount').on('mouseenter', function () {
        console.log('button is being hovered');
    });
    
    });