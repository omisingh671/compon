(function ($) {
  
  "use strict";

  // AOS ANIMATIONS
  //AOS.init();

  // NAVBAR
  $('.navbar-nav .nav-link').click(function(){
      $(".navbar-collapse").collapse('hide');
  });

  var urlRegExp = "";
  var url = window.location.pathname;
  var page = $("body").attr("id");
    
  urlRegExp = new RegExp(url.replace(/\/$/,'') + "$");

  $("#navbarNav ul li a").each(function(){
    $(this).parent().removeClass('active');
    if(page == "home"){
      $("#navbarNav ul li:first-child").addClass('active');
    }
    else{
      if(urlRegExp.test(this.href.replace(/\/$/,''))){
        $(this).parent().addClass('active');
      }
    }
  });
 
})(window.jQuery);