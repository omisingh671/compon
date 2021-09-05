
  (function ($) {
  
  "use strict";

    // AOS ANIMATIONS
    AOS.init();

    // NAVBAR
    $('.navbar-nav .nav-link').click(function(){
        $(".navbar-collapse").collapse('hide');
    });

    let pathParts = window.location.pathname.split('/');
    let pathNames = pathParts[2].split('.');
    let pathName = pathNames[0];

    $("#navbarNav ul li.active").removeClass('active');

    switch(pathName){
      case 'index':
        $("#navbarNav ul li a:contains('Home')").parent().addClass('active');
        console.log(pathName);
        break;
      case 'about':
        $("#navbarNav ul li a:contains('About Us')").parent().addClass('active');
        console.log(pathName);
        break;
      case 'publications':
        $("#navbarNav ul li a:contains('Publications')").parent().addClass('active');
        console.log(pathName);
        break;
      case 'case-teams':
        $("#navbarNav ul li a:contains('Case Teams')").parent().addClass('active');
        console.log(pathName);
        break;
      case 'contact':
        $("#navbarNav ul li a:contains('Contact us')").parent().addClass('active');
        console.log(pathName);
        break;
      default:
        $("#navbarNav ul li a:contains('Home')").parent().addClass('active');
        break;
    }

    // $("#navbarNav ul li.active").removeClass('active');

    // $("#navbarNav ul li a:contains('Home')").parent().addClass('active');
    // $("#navbarNav ul li a:contains('About Us')").parent().addClass('active');
    
  })(window.jQuery);

  
