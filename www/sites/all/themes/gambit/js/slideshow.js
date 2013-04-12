(function($){

  function setSliderText(test){
    
  }
  
  $(document).ready(function(){
  
    $text = $("#home-slider ul li .hero-text").each(function(){
      console.log($(this).html());
    });
    
    //home page carousel
    $("#home-slider").flexslider({
      animation: "slide",
      selector: "#home-slides > li",
      slideshow: true,
      slideshowSpeed: 7000, 
    });  
    
    //tab page carousel
    $("#tab-pages").flexslider({
      animation: "slide",
      selector: "#tab-slides > li",
      smoothHeight: true,
    });

  });

})(jQuery);