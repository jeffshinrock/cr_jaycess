(function($){

  $(document).ready(function(){
    
    $('#main-menu-container li a').mouseover(function(){
      $(this).animate({backgroundColor: '#c93e3e'}, 200);
    }).mouseout(function(){
      $(this).animate({backgroundColor: 'rgba(201,62,62,0)'}, 200);
    });
    
  });

})(jQuery);