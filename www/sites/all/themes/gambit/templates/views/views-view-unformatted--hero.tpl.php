<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
  
  <?php $slides = ''; ?>
  <?php $control_nav = ''; ?>
  <?php $i = 1; ?>
  
  <?php foreach ($view->result as $id => $row): 
  
    dpm($row);
  
    if($i == 1){
      $initial_text = $row->field_body[0]['raw']['safe_value'];
    }
  
    if(!empty($row->field_field_hero_image_full) && !empty($row->field_field_hero_image_mobile)){
      if(!empty($row->field_field_hero_image_full)){
        $img_full['path'] = file_create_url($row->field_field_hero_image_full[0]['rendered']['#item']['uri']);
        $img_full['attributes'] = array('class' => 'full');
      }
      if(!empty($row->field_field_hero_image_mobile)){
        $img_mobile['path'] = file_create_url($row->field_field_hero_image_mobile[0]['rendered']['#item']['uri']);
        $img_mobile['attributes'] = array('class' => 'mobile');
      }
    }  
    
    if(!empty($row->field_field_call_to_action)){
      $cta = '<div class="btn">' . l("Learn More", $row->field_field_call_to_action[0]['raw']['value']) . '</div>';
    }
  
    $slides .= '<li class="slide">';
        $slides .= '<div class="hero-img">';
          $slides .= (!empty($img_full) ? theme_image($img_full) : '');
          $slides .= (!empty($img_mobile) ? theme_image($img_mobile): '');
        $slides .= '</div>';
        $slides .= '<div class="hero-text">';
          $slides .= $row->field_body[0]['raw']['safe_value'];
          $slides .= (!empty($cta) ? $cta : '');
        $slides .= '</div>';
    $slides .= '</li>';
    
    $control_nav .= "<li><a>$i</a></li>";
    
    $i++;
  
  endforeach; ?>
  
  
<div id="hero-container">
  <div id="hero-inner">
    <div id="right-bar">
      <div id="logo">
        <a href="/"><img src="/<?php print drupal_get_path('theme','gambit')?>/images/logo.png" /></a>
      </div>
      <div id="main-menu-container">
        <?php $menu = menu_tree('main-menu'); ?>
        <?php print drupal_render($menu); ?>
      </div>
      <div id="flex-control-nav">
      </div>
      <div id="slider-message">
        <?php print $initial_text; ?>
      </div>
    </div>
  </div>
</div>  
  
<div id="home-slider">
  <ul id="home-slides">  
    <?php print $slides; ?>
  </ul>
</div>

<?php 
  $flexslider = drupal_get_path('theme','gambit') . '/js/jquery.flexslider-min.js';
  $slideshow_js = drupal_get_path('theme','gambit') . '/js/slideshow.js';
  drupal_add_js($flexslider, 'file');
  drupal_add_js($slideshow_js, 'file');
?>