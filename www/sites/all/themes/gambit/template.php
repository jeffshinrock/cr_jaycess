<?php

function gambit_preprocess_page(&$vars){
  //dpm($vars['node']);
}

function gambit_preprocess_node(&$vars){
  //dpm($vars);
  if($vars['type'] == 'event'){
    if(!empty($vars['field_include_map']['und'][0]['value'])){
      $api = variable_get('google_maps_api_key','');
      $path = "https://maps.googleapis.com/maps/api/js?key={$api}&sensor=false";
      $inline = 'function initialize() {
                    
                    geocoder = new google.maps.Geocoder();
                    var latlng = new google.maps.LatLng(-34.397, 150.644);
                    
                    var mapOptions = {
                      center: new google.maps.LatLng(-34.397, 150.644),
                      zoom: 10,
                      mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    
                    map = new google.maps.Map(document.getElementById("map-canvas"),
                        mapOptions);
                        
                    codeAddress();
                  }
   
                  function codeAddress() { 
                    var address = "'.$vars['field_address_of_event']['und'][0]['value'].'";
                    geocoder.geocode( { "address": address}, function(results, status) {
                      if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                         map: map,
                         position: results[0].geometry.location
                        });
                      }else{
                        console.log("fail: "+ status);
                      }
                    });
                  }; 
                  
                  google.maps.event.addDomListener(window, "load", initialize);';
      $css = "#map-canvas{height:500px;width:500px;}";
      drupal_add_js($path,'external');
      drupal_add_js($inline,'inline');
      drupal_add_css($css,'inline');
      $vars['event_map'] = '<div id="map-canvas"></div>';
    }
  }
}

function gambit_preprocess_form(&$vars){
  //dpm($vars);
}