(function($){

  $(document).ready(function(){
    
    $('#main-menu-container li a').mouseover(function(){
      $(this).animate({padding: '.2em',  color: '#c93e3e'}, 200);
    }).mouseout(function(){
      $(this).animate({padding: '0em', color: '#f3f3f3'}, 200);
    });
    
  });

})(jQuery);