jQuery.noConflict();

(function ($) {
  const currentTitle = $(document).attr('title').replace(' - Join MPD', '');

  function testimonials() {
    $('#testimonials').slick({
      dots: true,
      autoplay: true,
      autoplaySpeed: 8000,
      infinite: true,
      speed: 500,
      fade: true,
      cssEase: 'linear',
    });
  }

  function mobileNav() {


    //====================================
    // This function controls the mobile
    // navigation.
    //====================================

    const $menu = $('#mobile-menu').mmenu({
      // Style the Menu to Suit the Design
      // More info: http://mmenu.frebsite.nl/

      navbar: {
        title: currentTitle,
      },

      extensions: [
        'fullscreen',
        'fx-menu-zoom',
        'fx-listitems-slide',
        'border-full',
      ],

      navbars: [
        {
          content: [
            // Display the same hamburger nav if you'd like
            '<h3><a href="/">Join MPD</a></h3><button class="my-icon hamburger hamburger--collapse is-active" type="button"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>',
          ],
        },
      ],
    });

    // Call API to open menu from closed state
    var $icon = $('.my-icon');
    var API = $menu.data('mmenu');

    $icon.on('click', function () {
      API.open();
    });

    var $icon = $('.my-icon');
    var API = $menu.data('mmenu');

    $icon.on('click', function () {
      API.close();
    });
    
    // Exit Mobile Navigation
  }

  function loggedIn() {
    if ($('#wpadminbar')[0]) {
      $('#header-container').css('top', '32px');
    }
  }

  function scrollUp() {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        $('.scrollup').fadeIn();
      } else {
        $('.scrollup').fadeOut();
      }
    });

    $('.scrollup').click(function () {
      $('html, body').animate(
        {
          scrollTop: 0,
        },
        600
      );
      return false;
    });
  }

  //--------------------
  // Fade in Stuff
  //--------------------

  function animateStuff() {

    const w = $(window).width();

    if( w > 769 ) {

    $(window).scroll(function () {

      // add classes on page scroll to trigger animations

      // fade in effect
      $('.fade-out').each(function () {
        const bottom_of_object = $(this).offset().top + $(this).outerHeight();
        const bottom_of_window = $(window).scrollTop() + $(window).height();

        if (bottom_of_window > bottom_of_object) {
          $(this).addClass('fade-in');
        }
      });

      // slide in effect
      $('.slide-it').each(function () {
        const bottom_of_object = $(this).offset().top + $(this).outerHeight();
        const bottom_of_window = $(window).scrollTop() + $(window).height() + 550;

        if (bottom_of_window > bottom_of_object) {
          $(this).addClass('slide-left');
        }
      });

      $('.slide-it-right').each(function () {
        const bottom_of_object = $(this).offset().top + $(this).outerHeight();
        const bottom_of_window = $(window).scrollTop() + $(window).height() + 550;
        
        if (bottom_of_window > bottom_of_object) {
          $(this).addClass('slide-right');
        }
      });
    
      
    });

    // load first set of hidden items on short pages
    $('.fade-out').each(function () {
      const bottom_of_object = $(this).offset().top + $(this).outerHeight();
      const bottom_of_window = $(window).scrollTop() + $(window).height();

      if (bottom_of_window > bottom_of_object) {
        $(this).addClass('fade-in');
      }
    });

  }
    
  }

  //-----------------------
  // Randomly add Classes
  //-----------------------

  function randomClasses() {


    // Homepage slide in
    $('.homepage-flexible-content:nth-of-type(odd)').addClass('slide-it');
    $('.homepage-flexible-content:nth-of-type(even)').addClass('slide-it-right');


    const classes = [ 'slide-left', 'slide-right', 'slide-down' ]; // the classes you want to add
		$('.page-hero header h1').each(function(i) { // the element(s) you want to add the class to.
			$(this).addClass(classes[ Math.floor( Math.random()*classes.length ) ] );
		});
  }


  function tabbedNav() {
    $('#benefits-page .benefits-page-content:first-of-type, #hiring-steps .hiring-process-content:first-of-type').addClass('show active');
    $('#benefits-page ul.nav-tabs li:first-of-type a, #hiring-process-tabs.nav-tabs li:first-of-type a').addClass('active').attr("aria-selected", "true");
  }

  function memphisModal() {

    // Set a cookie to show only once per visit
    if (document.cookie.indexOf('modal_shown=') >= 0) {
      //do nothing if modal_shown cookie is present
    } else {
      $('#memphis-popup').modal('show');  //show modal pop up
      document.cookie = 'modal_shown=seen'; //set cookie modal_shown
      //cookie will expire when browser is closed
    }
    
    /* For modal testing & styling comment out in production
    $('#memphis-popup').modal('show');
    */

    $('i.fa-times').click(function() {
      $('#memphis-popup').modal('hide');
    });

  }

  $(document).ready(function () {
    testimonials();
    mobileNav();
    loggedIn();
    scrollUp();
    animateStuff();
    randomClasses();
    tabbedNav();
    memphisModal();
  });

  // End jQuery function
})(jQuery);
