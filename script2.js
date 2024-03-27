/*------ new js --------- */
$(document).ready(function(){
    $('.hero-slider').slick({
      arrows: false, // Disable default arrows
      infinite: true, // Enable infinite loop
      slidesToShow: 1, // Number of slides to show at a time
      slidesToScroll: 1 // Number of slides to scroll
      // You can add more settings and customization options as needed
    });
  
    // Handling slider movement on control icon click
    $('.next').click(function(){
      $('.hero-slider').slick('slickNext'); // Move to the next slide
    });
  
    $('.prev').click(function(){
      $('.hero-slider').slick('slickPrev'); // Move to the previous slide
    });
  });

  $(document).ready(function(){
    $('.testimonial-slider').slick({
      arrows: false, // Disable default arrows
      infinite: true, // Enable infinite loop
      slidesToShow: 1, // Number of slides to show at a time
      slidesToScroll: 1 // Number of slides to scroll
      // You can add more settings and customization options as needed
    });
  
    // Handling slider movement on control icon click
    $('.next1').click(function(){
      $('.testimonial-slider').slick('slickNext'); // Move to the next slide
    });
  
    $('.prev1').click(function(){
      $('.testimonial-slider').slick('slickPrev'); // Move to the previous slide
    });
  });


/*------------slider------------*/
/*$('.hero-slider').slick({
    autoplay: true,
    infinite: false,
    speed: 300,
    nextArrow: $('slick-nxt'),
    prevArrow: $('slick-prv')
})   */

const header = document.querySelector('header');
function fixedNavbar(){
    header.classList.toggle('scrolled',window.pageYOffset > 0)
}
fixedNavbar();
window.addEventListener('scroll', fixedNavbar);

let menu = document.querySelector('#menu-btn');
let userBtn = document.querySelector('#user-btn');

menu.addEventListener('click', function(){
    let nav = document.querySelector('.navbar');
    nav.classList.toggle('active');
})

userBtn.addEventListener('click', function(){
    let userBox = document.querySelector('.user-box');
    userBox.classList.toggle('active');
})
