(function($){
  
  $(document).ready(function(){
    
    //home page carousel
    $("#home-slider").flexslider({
      animation: "slide",
      selector: "#home-slides > li",
    });  
    
    //tab page carousel
    $("#tab-pages").flexslider({
      animation: "slide",
      selector: "#tab-slides > li",
    });

  });

})(jQuery);