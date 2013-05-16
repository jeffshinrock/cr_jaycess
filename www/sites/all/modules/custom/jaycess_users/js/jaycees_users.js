(function ($) {
  
  $(document).ready(function(){
  
    if(!$('#edit-jaycees-users-dues-dates').is(':checked')){
      jaycees_users_toggle('#jaycees_users_group_opts','hide');
    }
    
    if(!$('#edit-jaycees-users-send-mail').is(':checked')){
      jaycees_users_toggle('.form-item-jaycees-users-send-mail-interval','hide');
    }
    
    $('#edit-jaycees-users-dues-dates').change(function(){
      if($('#jaycees_users_group_opts').is(':visible')){
        jaycees_users_toggle('#jaycees_users_group_opts','hide');
      } else {
        jaycees_users_toggle('#jaycees_users_group_opts','show');
      }
    });
    
    $('#edit-jaycees-users-send-mail').change(function(){
      if($('#edit-jaycees-users-send-mail-interval').is(':visible')){
        jaycees_users_toggle('.form-item-jaycees-users-send-mail-interval','hide');
      } else {
        jaycees_users_toggle('.form-item-jaycees-users-send-mail-interval','show');
      }      
    });
    
  });
  
  function jaycees_users_toggle(elements, op){
    if(op == 'hide'){
      $(elements).hide();
    }
    if(op == 'show'){
      $(elements).show();
    }
  }
  
}(jQuery))