(function($){

  function setSliderText(){
    $text = $("#home-slider .flex-active-slide .hero-text").html();
    $('#slider-message').fadeOut(200, function(){
      $(this).html($text).fadeIn(200);
    });
  }
  
  $(document).ready(function(){
  
    $text = $("#home-slider ul li .hero-text").each(function(){
      //console.log($(this).html());
      $(this).hide();
      console.log($(this));
    });
    
    //home page carousel
    $("#home-slider").flexslider({
      animation: "slide",
      selector: "#home-slides > li",
      slideshow: true,
      slideshowSpeed: 7000, 
      controlNav: true,
      directionNav: false, 
      controlsContainer: "#flex-control-nav",
      after: function(slider){
        setSliderText();
      }
    });  
    
    //tab page carousel
    $("#tab-pages").flexslider({
      animation: "slide",
      selector: "#tab-slides > li",
      smoothHeight: true,
      manualControls: "#tab-titles > li", 
      directionNav: false,
    });

  });

})(jQuery);